<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_page_model extends CI_Model{
	/************SEO Page****************/
    public function fetch_all_page(){
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $search = trim(strip_tags($this->input->post("search")['value']));
        $this->db->select('a.*');
        $this->db->from('webina_page a');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`description` LIKE '%$search%' ESCAPE '!')");
        }
        $data = $this->db->limit($length, $start)->order_by('id', 'desc')->get()->result();
        
        //reord count
        $this->db->select('a.id');
        $this->db->from('webina_page a');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`description` LIKE '%$search%' ESCAPE '!')");
        }
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;
        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    public function add_page($data){
        return $this->db->insert('webina_page', $data);
    }
    public function update_page_fetch($id){
        return $this->db->where('id', $id)->get('webina_page')->row_array();
    }
    public function update_page($id, $data){
        if(array_key_exists('img', $data)){
            $folder='./uploads/media/';
            $temp_img=$this->db->select('img')->where('id', $id)->get('webina_page')->row()->img;
            if(!empty($temp_img)){
                unlink($folder.$temp_img);
            }
        }
        return $this->db->where('id', $id)->update('webina_page', $data);
    }
    public function page_status_data($id, $status){
        return $this->db->where("id", $id)->update('webina_page', array('status'=>$status));
    }
    public function delete_page($id){
        $folder='./uploads/media/';
        $temp_img=$this->db->select('img')->where('id', $id)->get('webina_page')->row()->img;
        if(!empty($temp_img)){
            unlink($folder.$temp_img);
        }
        if($this->db->where('id', $id)->delete('webina_page')){
            return array('type'=>'success','text'=>'Deleted');
        }else{
            return array('type'=>'warning','text'=>'Error..!');
        }
    }
    


}
