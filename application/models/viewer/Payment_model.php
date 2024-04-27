<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payment_model extends CI_Model{
    public function user_data($user_id){
        $this->db->select('a.*');
        $this->db->from("webina_user a");
        $this->db->where('a.id', $user_id);
        return $this->db->get()->row();
    }
	public function register_data($reffer_code, $data){
        if(!empty($reffer_code)){
            $temp=$this->db->select('id')->where('reffer_code', $reffer_code)->get('webinatech_user');
            if($temp->num_rows()>0){
                $create_by=$temp->row()->id;
            }else{
                $create_by="";
            }
        }else{
            $create_by="";
        }
        $data['create_by']=$create_by;
        $this->db->trans_begin();
        $this->db->insert('webina_user', $data);
        $user_id=$this->db->insert_id();
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return array('type'=>'error', 'text'=>'something went wrong!');
        }else{
            $this->db->trans_commit();
            return array('type'=>'success', 'text'=>'Successfully Registerd', 'user_id'=>$user_id, 'user_name'=>$data['name'], 'user_email'=>$data['email'], 'user_phone'=>$data['phone'], 'img'=>'');
        }
    }
    public function save_booking_data($booking_data){
    	return $this->db->insert('webina_user_booking', $booking_data);
    }
    public function update_booking_data($transactionId){
    	return $this->db->where('tran_id', $transactionId)->update('webina_user_booking', array('status'=>'success'));
    }
    public function get_booking_row($transactionId){
        $this->db->select('a.*, b.name, b.phone, b.email, c.name as vehicle_name, c.brand as vehicle_brand, c.seater as vehicle_seater, d.service_type, d.package_type, d.fare, d.extra_km, d.extra_hr, d.min_hr, d.min_km');
        $this->db->from("webina_user_booking a");
        $this->db->join("webina_user b", "b.id=a.user_id");
        $this->db->join("webina_vehicle c", "c.id=a.vehicle_id");
        $this->db->join("webina_vehicle_service d", "d.id=a.service_id");
        $this->db->where('a.tran_id', $transactionId);
        return $this->db->order_by("a.id", "desc")->get()->row();
    }
    public function get_booking_details($booking_id, $user_id){
        return $this->db->where(array('id'=>$booking_id, 'user_id'=>$user_id))->get('webina_user_booking')->row();
    }
    public function cancel_booking($booking_id, $cancel_array){
        return $this->db->where('id', $booking_id)->update('webina_user_booking', $cancel_array);
    }
    
}
