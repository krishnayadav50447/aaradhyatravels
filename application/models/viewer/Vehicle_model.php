<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Vehicle_model extends CI_Model{
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
    public function get_all_vehicle($trip_name, $total_km){
        $this->db->select("a.*, b.id as service_id, b.service_type, b.fare, b.extra_km, b.extra_hr, b.min_hr, b.min_km");
        $this->db->from("webina_vehicle a");
        $this->db->join("webina_vehicle_service b", "b.vehicle_id=a.id");
        $this->db->where(array("a.status"=>1));
        $this->db->where(array("b.service_type"=>$trip_name, "b.fare!="=>0));
        if($trip_name=="hourly_rental"){
            $this->db->where(array("b.min_km>="=>$total_km));
            $this->db->order_by('b.min_km');
        }
        return $this->db->get()->result();
    }
    public function get_vehicle_for_details($trip_name, $total_km, $vehicle_id, $service_id){
        $this->db->select("a.*, b.service_type, b.fare, b.extra_km, b.extra_hr, b.min_hr, b.min_km");
        $this->db->from("webina_vehicle a");
        $this->db->join("webina_vehicle_service b", "b.vehicle_id=a.id");
        $this->db->where(array("a.id"=>$vehicle_id, "a.status"=>1));
        $this->db->where(array("b.id"=>$service_id, "b.service_type"=>$trip_name, "b.fare!="=>0));
        return $this->db->get()->row();
    }


}
