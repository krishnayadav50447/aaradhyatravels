<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboard_model extends CI_Model{
    public function get_total_count_visitor($ref_id){
        return $this->db->select('total_count')->where(array('ref_id'=>$ref_id))->get('webina_total_visitor')->row()->total_count;
    }
    public function get_total_send_email(){
        return $this->db->select('id')->from('webina_email')->count_all_results();
    }
    public function get_total_user(){
        return $this->db->select('id')->from('webina_user')->count_all_results();
    }




}
