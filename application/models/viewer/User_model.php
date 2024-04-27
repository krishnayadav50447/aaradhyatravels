<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{
    public function check_user_exist($username){
        if(is_numeric($username)){
            if($this->db->select('id')->where(array('phone'=>$username))->from('webina_user')->count_all_results()>0){
                return true;
            }else{
                return false;
            }
        }else{
            if($this->db->select('id')->where(array('email'=>$username))->from('webina_user')->count_all_results()>0){
                return true;
            }else{
                return false;
            }
        }
    }
    public function check_user_data($username){
        if(is_numeric($username)){
            $query=$this->db->select('id, name, email, phone, status, img')->where(array('phone'=>$username))->get('webina_user');
            if($query->num_rows()>0){
                return array('type'=>'success', 'user_id'=>$query->row()->id, 'user_name'=>$query->row()->name, 'user_phone'=>$query->row()->phone, 'user_email'=>$query->row()->email, 'status'=>$query->row()->status, 'img'=>$query->row()->img);
            }else{
                return array('type'=>'error');
            }
        }else{
            $query=$this->db->select('id, name, email, phone, status, img')->where(array('email'=>$username))->get('webina_user');
            if($query->num_rows()>0){
                return array('type'=>'success', 'user_id'=>$query->row()->id, 'user_name'=>$query->row()->name, 'user_phone'=>$query->row()->phone, 'user_email'=>$query->row()->email, 'status'=>$query->row()->status, 'img'=>$query->row()->img);
            }else{
                return array('type'=>'error');
            }
        }
    }
    public function checkUpdatePhone($phone){
        if($this->db->select('id')->where_not_in('id',$this->session->userdata('user_id'))->where(array('phone'=>$phone))->from('webina_user')->count_all_results()>0){
            return true;
        }else{
            return false;
        }
    }
    public function checkUpdateEmail($email){
        if($this->db->select('id')->where_not_in('id',$this->session->userdata('user_id'))->where(array('email'=>$email))->from('webina_user')->count_all_results()>0){
            return true;
        }else{
            return false;
        }
    }
    public function login_data($username, $password){
        if(is_numeric($username)){
            $query=$this->db->select('id, name, email, phone, status, img')->where(array('phone'=>$username, 'password'=>$password))->get('webina_user');
            if($query->num_rows()>0){
                return array('login'=>'success', 'user_id'=>$query->row()->id, 'user_name'=>$query->row()->name, 'user_phone'=>$query->row()->phone, 'user_email'=>$query->row()->email, 'status'=>$query->row()->status, 'img'=>$query->row()->img);
            }else{
                return array('login'=>'error');
            }
        }else{
            $query=$this->db->select('id, name, email, phone, status, img')->where(array('email'=>$username, 'password'=>$password))->get('webina_user');
            if($query->num_rows()>0){
                return array('login'=>'success', 'user_id'=>$query->row()->id, 'user_name'=>$query->row()->name, 'user_phone'=>$query->row()->phone, 'user_email'=>$query->row()->email, 'status'=>$query->row()->status, 'img'=>$query->row()->img);
            }else{
                return array('login'=>'error');
            }
        }
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
    public function user_data($user_id){
        $this->db->select('a.*');
        $this->db->from("webina_user a");
        $this->db->where('a.id', $user_id);
        return $this->db->get()->row();
    }
    public function change_profile_data($user_id, $data){
        return $this->db->where('id', $user_id)->update('webina_user', $data);
    }
    public function upload_profile_img($user_id, $img, $data){
        $old_img=$this->db->select('img')->where('id', $user_id)->get('webina_user')->row()->img;
        if(!empty($old_img)){
            if(file_exists('uploads/thumb_profile_media/'.$old_img)){
                unlink('uploads/thumb_profile_media/'.$old_img);
            }
            if(file_exists('uploads/profile_media/'.$old_img)){
                unlink('uploads/profile_media/'.$old_img);
            }
        }
        $this->db->trans_begin();
        $this->db->where('id', $user_id)->update('webina_user', array('img'=>$img));
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
    public function remove_profile_img($user_id){
        $old_img=$this->db->select('img')->where('id', $user_id)->get('webina_user')->row()->img;
        if(!empty($old_img)){
            if(file_exists('uploads/thumb_profile_media/'.$old_img)){
                unlink('uploads/thumb_profile_media/'.$old_img);
            }
            if(file_exists('uploads/profile_media/'.$old_img)){
                unlink('uploads/profile_media/'.$old_img);
            }
        }
        return $this->db->where('id', $user_id)->update('webina_user', array('img'=>''));
    }



    /************************/
    public function change_password($user_id, $password, $old_password){
        if($this->db->where('id', $user_id)->get('webina_user')->row()->password==$old_password){
            if($this->db->where('id', $user_id)->update('webina_user',array('password'=>sha1($password)))){
                return array('type'=>'success', 'text'=>'Successfully updated');
            }else{
                return array('type'=>'error', 'text'=>'something error');
            }
        }else{
            return array('type'=>'warning', 'text'=>'Old password is incorrect!');
        }
    }
    public function recover_pass_account($username, $data){
        if(is_numeric($username)){
            if($this->db->select('id')->where(array('phone'=>$username))->from('webina_user')->count_all_results()>0){
                return $this->db->where('phone', $username)->update('webina_user', $data);
            }else{
                return false;
            }
        }else{
            if($this->db->select('id')->where(array('email'=>$username))->from('webina_user')->count_all_results()>0){
                return $this->db->where('email', $username)->update('webina_user', $data);
            }else{
                return false;
            }
        }
    }


    /***********Order/Booking Transation/History**********/
    public function get_booking_row($transactionId){
        $this->db->select('a.*, b.name, b.phone, b.email, c.name as vehicle_name, c.brand as vehicle_brand, c.seater as vehicle_seater, d.service_type, d.package_type, d.fare, d.extra_km, d.extra_hr, d.min_hr, d.min_km');
        $this->db->from("webina_user_booking a");
        $this->db->join("webina_user b", "b.id=a.user_id");
        $this->db->join("webina_vehicle c", "c.id=a.vehicle_id");
        $this->db->join("webina_vehicle_service d", "d.id=a.service_id");
        $this->db->where('a.tran_id', $transactionId);
        return $this->db->order_by("a.id", "desc")->get()->row();
    }
    public function get_booking_data($user_id){
        $this->db->select('a.*, b.name, b.phone, b.email, c.name as vehicle_name, c.brand as vehicle_brand, c.seater as vehicle_seater, d.service_type, d.package_type, d.fare, d.extra_km, d.extra_hr, d.min_hr, d.min_km');
        $this->db->from("webina_user_booking a");
        $this->db->join("webina_user b", "b.id=a.user_id");
        $this->db->join("webina_vehicle c", "c.id=a.vehicle_id");
        $this->db->join("webina_vehicle_service d", "d.id=a.service_id");
        $this->db->where('a.user_id', $user_id);
        return $this->db->order_by("a.id", "desc")->get()->result();
    }

    
}
