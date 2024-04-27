<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pages_model extends CI_Model{
    public function visitor_count($ref_id, $ip_address, $view_date){
        if($this->db->select('id')->from('webina_count_visitor')->where(array('ref_id'=>$ref_id, 'ip_address'=>$ip_address))->count_all_results()==0){
            $this->db->insert('webina_count_visitor', array('ref_id'=>$ref_id, 'ip_address'=>$ip_address, 'view_date'=>$view_date));
            $this->db->where('ref_id', $ref_id)->set('total_count', 'total_count + 1', false)->update('webina_total_visitor');
        }
        $total_visitor=$this->db->select('total_count')->where(array('ref_id'=>$ref_id))->get('webina_total_visitor')->row()->total_count;
        return array('type'=>'success', 'total_visitor'=>$total_visitor);
    }
    
    /*********Page Data********/
    public function get_page_data($page_id){
        $temp=$this->db->where('page_id', $page_id)->get('webina_page');
        if($temp->num_rows()>0){
            return $temp->row_array();
        }else{
            return array(
                'name'=>'',
                'meta_des'=>'',
                'meta_key'=>'',
                'img'=>'',
            );
        }
    }

    


}
