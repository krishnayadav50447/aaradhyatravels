<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_customer_model extends CI_Model{
    public function fetch_all_customer($start, $length, $search, $order, $filter){
        $orderableColumns=array('a.id', '', 'a.name', 'a.email', '', 'a.city', 'a.create_date', '');
        $searchableColumns=array('a.id', '', 'a.name', 'a.email', '', 'a.city', 'a.create_date', '');
        $this->db->select('a.*');
        if($search!=""){
            $this->db->where("(`a`.`id` LIKE '%$search%' ESCAPE '!' OR `a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`city` LIKE '%$search%' ESCAPE '!' OR `a`.`state` LIKE '%$search%' ESCAPE '!' OR `a`.`country` LIKE '%$search%' ESCAPE '!')");
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
        $this->db->from('webina_user a');
        
        $data=$this->db->group_by('a.id')->order_by($orderableColumns[$order['column']], $order['dir'])->limit($length, $start)->get()->result();
        
        //reord count
        $this->db->select('a.id');
        if($search!=""){
            $this->db->where("(`a`.`id` LIKE '%$search%' ESCAPE '!' OR `a`.`name` LIKE '%$search%' ESCAPE '!' OR `a`.`phone` LIKE '%$search%' ESCAPE '!' OR `a`.`email` LIKE '%$search%' ESCAPE '!' OR `a`.`city` LIKE '%$search%' ESCAPE '!' OR `a`.`state` LIKE '%$search%' ESCAPE '!' OR `a`.`country` LIKE '%$search%' ESCAPE '!')");
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
        $this->db->from('webina_user a');

        $count_rows = $this->db->count_all_results();
        $recordsTotal=$count_rows;
        $recordsFiltered=$count_rows;

        return array('data'=>$data, 'recordsTotal'=>$recordsTotal, 'recordsFiltered'=>$recordsFiltered);
    }
    public function status_data($id, $status){
        return $this->db->where("id", $id)->update('webina_user', array('status'=>$status));
    }
    public function delete_data($id){
        $temp_img=$this->db->select('img')->where('id', $id)->get('webina_user')->row();
        if(!empty($temp_img)){
            if(!empty($temp_img->img)){
                if(file_exists('./uploads/profile_media/'.$temp_img->img)){
                    unlink('./uploads/profile_media/'.$temp_img->img);
                }
            }
            if(!empty($temp_img->img)){
                if(file_exists('./uploads/thumb_profile_media/'.$temp_img->img)){
                    unlink('./uploads/thumb_profile_media/'.$temp_img->img);
                }
            }
        }

        return $this->db->where('id',$id)->delete('webina_user');
    }






    

}