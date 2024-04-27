<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_notification_model extends CI_Model{
    public function fetch_web_contact(){
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $search = trim(strip_tags($this->input->post("search")['value']));
        $this->db->select('a.*');
        $this->db->from('webina_contact a');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`message` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`address` LIKE '%$search%' ESCAPE '!')");
        }
        $data = $this->db->order_by('a.id', 'desc')->limit($length, $start)->get()->result();
        
        //reord count
        $this->db->select('a.id');
        $this->db->from('webina_contact a');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`message` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`address` LIKE '%$search%' ESCAPE '!')");
        }
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;
        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    public function delete_web_contact($id){
        if($this->db->where('id',$id)->delete('webina_contact')){
            exit(json_encode(array('type'=>'success','text'=>'Deleted')));
        }else{
            exit(json_encode(array('type'=>'warning','text'=>'Error..!')));
        }
    }

    public function save_send_email($data){
        if($this->db->insert('webina_email', $data)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_send_email($id){
        if($this->db->where('id',  $id)->delete('webina_email')){
            return array('type'=>'success', 'text'=>'Successfully Deleted');
        }else{
            return array('type'=>'error', 'text'=>'something went wrong!');
        }
    }
    public function fetch_all_email(){
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $search = trim(strip_tags($this->input->post("search")['value']));
        $this->db->select('a.*');
        $this->db->from('webina_email a');
        if($search!=""){
            $this->db->where("(`a`.`email_to` LIKE '%$search%' ESCAPE '!' OR `a`.`email_from` LIKE '%$search%' ESCAPE '!' OR `a`.`email_subject` LIKE '%$search%' ESCAPE '!')");
        }
        $data = $this->db->order_by('a.id', 'desc')->limit($length, $start)->get()->result();
        
        //reord count
        $this->db->select('a.id');
        $this->db->from('webina_email a');
        if($search!=""){
            $this->db->where("(`a`.`email_to` LIKE '%$search%' ESCAPE '!' OR `a`.`email_from` LIKE '%$search%' ESCAPE '!' OR `a`.`email_subject` LIKE '%$search%' ESCAPE '!')");
        }
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;
        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    public function get_saved_email_fetch($id){
        return $this->db->where('id',$id)->get('webina_email')->row_array();
    }
    public function fetch_all_subscribed_email(){
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $search = trim(strip_tags($this->input->post("search")['value']));
        $this->db->select('a.*');
        $this->db->from('webina_subscribe_email a');
        if($search!=""){
            $this->db->where( "(`a`.`email` LIKE '%$search%' ESCAPE '!')");
        }
        $data = $this->db->order_by('a.id', 'desc')->limit($length, $start)->get()->result();
        
        //reord count
        $this->db->select('a.id');
        $this->db->from('webina_subscribe_email a');
        if($search!=""){
            $this->db->where( "(`a`.`email` LIKE '%$search%' ESCAPE '!')");
        }
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;
        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    
    /********Reviews*********/
    public function fetch_all_review(){
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $search = trim(strip_tags($this->input->post("search")['value']));
        $this->db->select('a.*');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!')");
        }
        $this->db->from('webina_review a');
        $data = $this->db->order_by('a.id', 'desc')->limit($length, $start)->get()->result();
        
        //reord count
        $this->db->select('a.id');
        $this->db->from('webina_review a');
        if($search!=""){
            $this->db->where( "(`a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!')");
        }
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;
        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    public function add_review($data){
        return $this->db->insert('webina_review', $data);
    }
    public function update_review_fetch($id){
        return $this->db->where('id', $id)->get('webina_review')->row_array();
    }
    public function update_review($id, $data){
        if(array_key_exists('img', $data)){
            $folder='./uploads/media/';
            $temp_img=$this->db->select('img')->where('id', $id)->get('webina_review')->row()->img;
            if(!empty($temp_img)){
                unlink($folder.$temp_img);
            }
        }
        return $this->db->where('id', $id)->update('webina_review', $data);
    }
    public function status_data($id, $status){
        return $this->db->where("id", $id)->update('webina_review', array('status'=>$status));
    }
    public function delete_review($id){
        $folder='./uploads/media/';
        $temp_img=$this->db->select('img')->where('id', $id)->get('webina_review')->row()->img;
        if(!empty($temp_img)){
            unlink($folder.$temp_img);
        }
        if($this->db->where('id',$id)->delete('webina_review')){
            exit(json_encode(array('type'=>'success','text'=>'Deleted')));
        }else{
            exit(json_encode(array('type'=>'warning','text'=>'Error..!')));
        }
    }
    

}
