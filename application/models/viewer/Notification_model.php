<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification_model extends CI_Model{
    public function fetch_notification($user_id, $start, $length){
        $this->db->select('a.*, b.name as sender_name, c.name receiver_name');
        $this->db->where(array('a.receiver_id'=>$user_id));
        $this->db->from('webina_notification a');
        $this->db->join('webina_customer b', 'b.id=a.sender_id');
        $this->db->join('webina_customer c', 'c.id=a.receiver_id');
        return $this->db->order_by('id', 'desc')->limit($length, $start)->get()->result();
    }
    public function add_notification($data){
        return $this->db->insert('webina_notification', $data);
    }
    public function save_fcm_token($user_id, $fcm_token){
        if($this->db->where(array('id'=>$user_id, 'fcm_token'=>$fcm_token))->from('webina_customer')->count_all_results()==0){
            return $this->db->where('id', $user_id)->update('webina_customer', array('fcm_token'=>$fcm_token));
        }else{
            return true;
        }
    }
    public function check_subscribe_email($email){
        if($this->db->where('email', $email)->get('webina_subscribe_email')->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }
	public function subscribe_email($email){
		$data=array(
            'email'=>$email,
            'status'=>'on'
        );
        if($this->db->insert('webina_subscribe_email', $data)){
            return true;
        }else{
            return false;
        }
    }
    public function un_subscribe_email($email){
        if($this->db->where('email', $email)->delete('webina_subscribe_email')){
            return true;
        }else{
            return false;
        }
    }

    
    
}
