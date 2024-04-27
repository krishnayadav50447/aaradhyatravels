<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_transaction_model extends CI_Model{
    public function fetch_all_user_transaction($type, $start, $length, $search, $order, $filter){
        $orderableColumns=array('a.id', 'b.name', 'a.from_pickup', 'a.to_drop', 'd.service_type', 'c.name', 'a.pickup_date', 'a.pickup_time', 'a.paid_amount', 'a.status', 'a.create_date', '');
        $searchableColumns=array('a.id', 'b.name', 'a.from_pickup', 'a.to_drop', 'd.service_type', 'c.name', 'a.pickup_date', 'a.pickup_time', 'a.paid_amount', 'a.status', 'a.create_date', '');

        $this->db->select('a.*, b.name, b.phone, b.email, c.name as vehicle_name, c.brand as vehicle_brand, c.seater as vehicle_seater, d.service_type, d.package_type, d.fare, d.extra_km, d.extra_hr, d.min_hr, d.min_km');
        $this->db->from("webina_user_booking a");
        $this->db->join("webina_user b", "b.id=a.user_id");
        $this->db->join("webina_vehicle c", "c.id=a.vehicle_id");
        $this->db->join("webina_vehicle_service d", "d.id=a.service_id");

        if($type=="canceled"){
            $this->db->where(array('a.cancel_status'=>'canceled'));
        }else{
            $this->db->where(array('a.cancel_status'=>'', 'a.status'=>$type));
        }

        if($search!=""){
            $this->db->where("(`a`.`id` LIKE '%$search%' ESCAPE '!' OR `b`.`name` LIKE '%$search%' ESCAPE '!' OR `b`.`email` LIKE '%$search%' ESCAPE '!' OR `b`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`paid_amount` LIKE '%$search%' ESCAPE '!' OR `a`.`tran_id` LIKE '%$search%' ESCAPE '!')");
        }
        for($i=0; $i<count($filter); $i++){
            if(array_key_exists($filter[$i]['data'], $searchableColumns)){
                $column=$searchableColumns[$filter[$i]['data']];
                $srch=$filter[$i]['search']['value'];
                if(!empty($srch)){
                    $this->db->where("$column LIKE '%$srch%' ESCAPE '!'");
                }
            }
        }

        $data=$this->db->group_by('a.id')->order_by($orderableColumns[$order['column']], $order['dir'])->limit($length, $start)->get()->result();
        


        //reord count
        $this->db->select('a.id');
        $this->db->from("webina_user_booking a");
        $this->db->join("webina_user b", "b.id=a.user_id");
        $this->db->join("webina_vehicle c", "c.id=a.vehicle_id");
        $this->db->join("webina_vehicle_service d", "d.id=a.service_id");

        if($type=="canceled"){
            $this->db->where(array('a.cancel_status'=>'canceled'));
        }else{
            $this->db->where(array('a.cancel_status'=>'', 'a.status'=>$type));
        }
        
        if($search!=""){
            $this->db->where("(`a`.`id` LIKE '%$search%' ESCAPE '!' OR `b`.`name` LIKE '%$search%' ESCAPE '!' OR `b`.`email` LIKE '%$search%' ESCAPE '!' OR `b`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`paid_amount` LIKE '%$search%' ESCAPE '!' OR `a`.`tran_id` LIKE '%$search%' ESCAPE '!')");
        }
        for($i=0; $i<count($filter); $i++){
            if(array_key_exists($filter[$i]['data'], $searchableColumns)){
                $column=$searchableColumns[$filter[$i]['data']];
                $srch=$filter[$i]['search']['value'];
                if(!empty($srch)){
                    $this->db->where("$column LIKE '%$srch%' ESCAPE '!'");
                }
            }
        }
        
        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;

        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }


    

}