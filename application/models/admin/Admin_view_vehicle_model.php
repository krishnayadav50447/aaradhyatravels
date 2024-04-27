<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_vehicle_model extends CI_Model{
    /************vehicle****************/
    public function add_vehicle($data){
        if($this->db->insert('webina_vehicle', $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    public function add_service($data){
        return $this->db->insert_batch('webina_vehicle_service', $data);
    }
    public function update_service($vehicle_id, $data){
        $this->db->trans_begin();
        for($i=0; $i < count($data); $i++){
            if(empty($vehicle_id) || empty($data[$i]['service_type'])){
                //skip there's nothing to do so.
            }else{
                if($this->db->select('id')->where(array('vehicle_id'=>$vehicle_id, 'service_type'=>$data[$i]['service_type'], 'package_type'=>$data[$i]['package_type']))->from('webina_vehicle_service')->count_all_results()>0){
                    $this->db->where(array('vehicle_id'=>$vehicle_id, 'service_type'=>$data[$i]['service_type'], 'package_type'=>$data[$i]['package_type']))->update('webina_vehicle_service', $data[$i]);
                }else{
                    $this->db->insert('webina_vehicle_service', $data[$i]);
                }
            }
        }
        if($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
    public function vehicle_status_data($id, $status){
        return $this->db->where("id", $id)->update('webina_vehicle', array('status'=>$status));
    }
    public function fetch_all_vehicle($start, $length, $search, $order, $filter){
        $orderableColumns=array('a.id', 'a.type', 'a.name', 'a.brand', 'a.seater', '', '');
        $searchableColumns=array('a.id', 'a.type', 'a.name', 'a.brand', 'a.seater', '', '');

        $this->db->select('a.*');
        $this->db->from('webina_vehicle a');
        if($search!=""){
            $this->db->where( "(`a`.`type` LIKE '%$search%' ESCAPE '!' OR `a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`brand` LIKE '%$search%' ESCAPE '!')");
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
        $this->db->from('webina_vehicle a');
        if($search!=""){
            $this->db->where( "(`a`.`type` LIKE '%$search%' ESCAPE '!' OR `a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`brand` LIKE '%$search%' ESCAPE '!')");
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
    public function get_vehicle_img($id){
        return $this->db->select('main_img, other_img')->where('id', $id)->get('webina_vehicle')->row();
    }
    public function update_vehicle_img($id, $media){
        return $this->db->where('id', $id)->update('webina_vehicle', $media);
    }
    public function update_vehicle_fetch($id){
        $data1=$this->db->where('id', $id)->get('webina_vehicle')->row_array();
        $data2=$this->db->where('vehicle_id', $id)->get('webina_vehicle_service')->result_array();
        return array('data1'=>$data1, 'data2'=>$data2);
    }
    public function update_vehicle($id, $data){
        if($this->db->where('id', $id)->update('webina_vehicle', $data)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_vehicle($id){
        $temp_media=$this->db->select('main_img,other_img')->where('id', $id)->get('webina_vehicle')->row();
        if(!empty($temp_media)){
            if(!empty($temp_media->main_img)){
                if(file_exists('./uploads/vehicle/'.$temp_media->main_img)){
                    unlink('./uploads/vehicle/'.$temp_media->main_img);
                }
            }
            if(!empty($temp_media->other_img)){
                $other_img=explode("|", $temp_media->other_img);
                for($i=0; $i < count($other_img); $i++){
                    if(file_exists('./uploads/vehicle/'.$other_img[$i])){
                        unlink('./uploads/vehicle/'.$other_img[$i]);
                    }
                }
            }
        }

        if($this->db->where('id', $id)->delete('webina_vehicle')){
            return true;
        }else{
            return false;
        }
    }


    




}
