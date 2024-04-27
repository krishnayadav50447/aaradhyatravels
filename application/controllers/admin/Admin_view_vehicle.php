<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_vehicle extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
            redirect(base_url('admin'));
        }

        $this->product_width=500;
        $this->load->library('upload');

        $this->load->library('form_validation');
        $this->load->model('admin/Admin_view_vehicle_model', 'current_model');
    }
    private function set_upload_options($upload_path){   
        //upload an image options
        $config=array();
        $config['upload_path']=$upload_path;
        // $config['allowed_types']='gif|jpg|jpeg|png';
        $config['allowed_types']='*';
        $config['overwrite']=TRUE;
        if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'], 0755, TRUE);
        }
        return $config;
    }
    private function upload_product($all_files){
        $folder='./uploads/vehicle/';
        if(!is_dir($folder)){ mkdir($folder, 0755, true); }
        
        $media_file=array(); $temp_error_file=array();
        for($i=0; $i < count($all_files); $i++){ 
            if(empty($_FILES[$all_files[$i]]['name'])){
                $img_data=$this->input->post($all_files[$i]."_link");
                if(!empty($img_data)){
                    $image_array_1=explode(";", $img_data);
                    $image_array_2=explode(",", $image_array_1[1]);
                    $img_data=base64_decode($image_array_2[1]);
                    $new_file_name=$all_files[$i].'_'.time().'_'.($i+1).'.jpg';
                    if(file_put_contents($folder.$new_file_name, $img_data)!== false){
                        $media_file[]=$new_file_name;
                    }
                }
            }else{
                $img_extension=pathinfo($_FILES[$all_files[$i]]['name'], PATHINFO_EXTENSION);
                $new_file_name=$all_files[$i].'_'.time().'_'.($i+1).'.'.$img_extension;
                $_FILES['cur_media']['name']=$new_file_name;
                $temp_error_file[]=$new_file_name;
                $_FILES['cur_media']['type']= $_FILES[$all_files[$i]]['type'];
                $_FILES['cur_media']['tmp_name']= $_FILES[$all_files[$i]]['tmp_name'];
                $_FILES['cur_media']['error']= $_FILES[$all_files[$i]]['error'];
                $_FILES['cur_media']['size']= $_FILES[$all_files[$i]]['size'];    

                if($this->upload->do_upload('cur_media')==FALSE){
                    $error=$this->upload->display_errors();
                    if(!empty($temp_error_file)){
                        foreach ($temp_error_file as $temp_key => $temp_value) {
                            if(file_exists($folder.$temp_value)){
                                unlink($folder.$temp_value);
                            }
                        }
                    }
                    return array('type'=>'error', 'message'=>$error, 'media'=>$media_file);
                }else{
                    $upload_data=$this->upload->data();
                    $media_file[]=$upload_data["file_name"];
                    if($img_extension=="webp"){
                        //dont need to do anything with this format cz this gd library does not support any function with webp
                    }else{
                        /*if(empty($upload_data['image_width']) || empty($upload_data['image_height']) || empty($upload_data['is_image'])){
                            $size_details=getimagesize($folder.$new_file_name);
                            $upload_data['is_image']=1;
                            $upload_data['image_type']=$img_extension;
                            $upload_data['image_width']=$size_details[0];
                            $upload_data['image_height']=$size_details[1];
                            $upload_data['image_size_str']=$size_details[3];
                        }*/
                        $image_width=$upload_data['image_width'];
                        if($image_width < $this->product_width){
                            if($upload_data['file_size']>300){
                                $image_process=true;
                                $image_process_size=$image_width;
                            }else{
                                $image_process=false;
                            }
                        }else{
                            $image_process=true;
                            $image_process_size=$this->product_width;
                        }
                        if($image_process){
                            $this->load->library('image_lib');
                            $image_config["image_library"]="gd2";
                            $image_config["source_image"]=$upload_data["full_path"];
                            $image_config['create_thumb']=FALSE;
                            $image_config['maintain_ratio']=TRUE;
                            $image_config['overwrite']=TRUE;
                            $image_config['new_image']=$upload_data["file_path"].$upload_data["file_name"];
                            $image_config['quality']="90%";
                            $image_config['width']=$image_process_size;
                            $image_config['height']=1;
                            $dim=(intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                            $image_config['master_dim']=($dim > 0)? "height" : "width";         
                            $this->image_lib->initialize($image_config);
                            if($this->image_lib->resize()==FALSE){
                                $error=$this->image_lib->display_errors();
                                exit(json_encode(array('type'=>'error', 'message'=>$error)));
                            }
                        }   
                    }
                }
            }
        }
        if(empty($media_file)){
            return array('type'=>'error', 'message'=>"No files are uploaded!", 'media'=>$media_file);
        }else{
            return array('type'=>'error', 'message'=>"Successfully Uploaded!", 'media'=>$media_file);
        }
    }
    /********vehicle*********/
    public function vehicle(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_view_vehicle',$data);
    }
    public function add_vehicle(){
        $this->form_validation->set_rules('type', 'Type', 'trim|required'); 
        $this->form_validation->set_rules('name', 'Name', 'trim|required'); 
        //$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
        $this->form_validation->set_rules('fuel_type', 'Fuel Type', 'trim|required');
        $this->form_validation->set_rules('ac_nonac', 'Ac / Non Ac', 'trim|required');
        if($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            $this->upload->initialize($this->set_upload_options('uploads/vehicle/'));
            $data=array(
                'type'=>$this->input->post('type'),
                'name'=>$this->input->post('name'),
                'brand'=>$this->input->post('brand'),
                'fuel_type'=>$this->input->post('fuel_type'),
                'ac_nonac'=>$this->input->post('ac_nonac'),
                'seater'=>$this->input->post('seater'),
                'description'=>$this->input->post('description'),
                'main_img'=>'',
                'other_img'=>'',
                'status'=>0,
                'create_by'=>$this->session->userdata('admin_id'),
                'create_date'=>date('Y-m-d H:i:s')
            );

            $main_uploaded_media=$this->upload_product(array('main_img'));
            if(empty($main_uploaded_media['media'])){
                exit(json_encode(array('type'=>'error', 'text'=>$main_uploaded_media['message'])));
            }else{
                $data['main_img']=$main_uploaded_media['media'][0];
                $totalImgList=array('1_img', '2_img', '3_img', '4_img', '5_img');
                $other_uploaded_media=$this->upload_product($totalImgList);
                $data['other_img'].=trim(implode("|", $other_uploaded_media['media']), "|");
            }

            $vehicle_id=$this->current_model->add_vehicle($data);
            if($vehicle_id){
                $service_data=array();
                for($i=0; $i < 8; $i++){ 
                    $service_data[]=array(
                        'vehicle_id'=>$vehicle_id,
                        'service_type'=>empty($this->input->post('service_type[]')[$i])?'':$this->input->post('service_type[]')[$i],
                        'package_type'=>$this->input->post('package_type[]')[$i],
                        'fare'=>empty($this->input->post('fare[]')[$i])?'':$this->input->post('fare[]')[$i],
                        'extra_km'=>empty($this->input->post('extra_km[]')[$i])?'':$this->input->post('extra_km[]')[$i],
                        'extra_hr'=>empty($this->input->post('extra_hr[]')[$i])?'':$this->input->post('extra_hr[]')[$i],
                        'min_hr'=>empty($this->input->post('min_hr[]')[$i])?'':$this->input->post('min_hr[]')[$i],
                        'min_km'=>empty($this->input->post('min_km[]')[$i])?'':$this->input->post('min_km[]')[$i],
                    );
                }
                if($this->current_model->add_service($service_data)){
                    exit(json_encode(array('type'=>'success', 'text'=>'Successfully Inserted')));
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
                }
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
            }
        }
    }
    public function vehicle_action_table($status, $id){
        if($status>0){$checked="checked";}else{$checked="";}
        $btn="<div class='_wtRange'><small class='fs_11'>Approve </small><div class='form-check form-switch mb-0'><input type='checkbox' ".$checked." onclick=vehicle_status_data('".$id."') id='".$id."_status' class='form-check-input'><label class='form-check-label p-0' for='".$id."_status'></label></div></div>";
        return $btn.'<div class="btn-group">
            <button class="btn btn-sm btn-success" onclick="update_all_details('.$id.')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger" onclick="vehicle_delete_data('.$id.')"><i class="fa fa-trash"></i></button>
        </div>';
    }
    public function fetch_all_vehicle(){
        $draw=intval($this->input->post("draw"));
        $start=intval($this->input->post("start"));
        $length=intval($this->input->post("length"));
        $search=trim(strip_tags($this->input->post("search")['value']));
        $order=$this->input->post("order")[0];
        $filter=$this->input->post("columns");

        $data=array();
        $data_list=$this->current_model->fetch_all_vehicle($start, $length, $search, $order, $filter);
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]='<img src='.base_url("uploads/vehicle/").$row->main_img.' style="width:100px;">';
            $sub_array[]='<p class="clip_txt_2">'.$row->type.'</p>';
            $sub_array[]='<p class="clip_txt_2">'.$row->name.'</p>';
            $sub_array[]='<p class="clip_txt_2">'.$row->brand.'</p>';
            $sub_array[]='<p class="clip_txt_2">'.$row->seater.'</p>';
            $sub_array[]='<p class="clip_txt_3 showFullTxt">'.$row->description.'</p>';
            $sub_array[]=$this->vehicle_action_table($row->status, $row->id);
            $data[]=$sub_array;
        }
        $output=array(
            "draw"=>$draw,
            "recordsTotal"=>$data_list['recordsTotal'],
            "recordsFiltered"=>$data_list['recordsFiltered'],
            "data"=>$data
        );
        exit(json_encode($output));
    }
    public function update_vehicle_fetch(){
        exit(json_encode($this->current_model->update_vehicle_fetch($this->input->post('id'))));
    }
    public function update_vehicle_img(){
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('img_pos', 'Img Position', 'trim|required');
        if($this->form_validation->run()){
            $this->upload->initialize($this->set_upload_options('uploads/vehicle/'));
            $singleImgList=array($this->input->post('img_pos'));
            $uploaded_media=$this->upload_product($singleImgList);
            if(empty($uploaded_media['media'])){
                exit(json_encode(array('type'=>'error', 'text'=>$uploaded_media['message'])));
            }else{
                $all_old_img=$this->current_model->get_vehicle_img($this->input->post('id'));
                if($this->input->post('img_pos')=="main_img"){
                    if(file_exists('uploads/vehicle/'.$all_old_img->main_img)){
                        unlink('uploads/vehicle/'.$all_old_img->main_img);
                    }
                    $media=array(
                        'main_img'=>$uploaded_media['media'][0],
                    );
                }else{
                    if(empty($this->input->post('old_img'))){
                        $media=array(
                            'other_img'=>trim($all_old_img->other_img.'|'.$uploaded_media['media'][0], "|"),
                        );
                    }else{
                        $all_old_other_img_arr=explode("|", $all_old_img->other_img);
                        for ($i=0; $i < count($all_old_other_img_arr); $i++) { 
                            if($this->input->post('old_img')==$all_old_other_img_arr[$i]){
                                if(file_exists('uploads/vehicle/'.$all_old_other_img_arr[$i])){
                                    unlink('uploads/vehicle/'.$all_old_other_img_arr[$i]);
                                }
                                $all_old_other_img_arr[$i]=$uploaded_media['media'][0];
                            }
                        }
                        $media=array(
                            'other_img'=>trim(implode("|", $all_old_other_img_arr), "|"),
                        );
                    }
                }
                if($this->current_model->update_vehicle_img($this->input->post('id'), $media)){
                    exit(json_encode(array('type'=>'success', 'img'=>$uploaded_media['media'][0], 'text'=>'successfully updated!')));
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                }
            }
        }else{
            exit(json_encode(array('type'=>'error', 'text'=>validation_errors())));
        }
    }
    public function delete_vehicle_img(){
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        if($this->form_validation->run()){
            $all_old_img=$this->current_model->get_vehicle_img($this->input->post('id'));
            $all_old_other_img_arr=explode("|", $all_old_img->other_img);
            for ($i=0; $i < count($all_old_other_img_arr); $i++) { 
                if($this->input->post('old_img')==$all_old_other_img_arr[$i]){
                    if(file_exists('uploads/vehicle/'.$all_old_other_img_arr[$i])){
                        unlink('uploads/vehicle/'.$all_old_other_img_arr[$i]);
                    }
                    unset($all_old_other_img_arr[$i]);
                }
            }
            $media=array(
                'other_img'=>trim(implode("|", $all_old_other_img_arr), "|"),
            );
            if($this->current_model->update_vehicle_img($this->input->post('id'), $media)){
                exit(json_encode(array('type'=>'success', 'text'=>'successfully deleted!')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        }else{
            exit(json_encode(array('type'=>'error', 'text'=>validation_errors())));
        }
    }
    public function update_vehicle(){
        if(empty($this->input->post('service_type[]')) || empty($this->input->post('fare[]')) || empty($this->input->post('extra_km[]')) || empty($this->input->post('extra_hr[]'))){
            exit(json_encode(array('type'=>'error', 'text'=>'Service Details Invalid!')));
        }
        $this->form_validation->set_rules('type', 'Type', 'trim|required'); 
        $this->form_validation->set_rules('name', 'Name', 'trim|required'); 
        //$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
        $this->form_validation->set_rules('fuel_type', 'Fuel Type', 'trim|required');
        $this->form_validation->set_rules('ac_nonac', 'Ac / Non Ac', 'trim|required');
        if($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            $data=array(
                'type'=>$this->input->post('type'),
                'name'=>$this->input->post('name'),
                'brand'=>$this->input->post('brand'),
                'seater'=>$this->input->post('seater'),
                'fuel_type'=>$this->input->post('fuel_type'),
                'ac_nonac'=>$this->input->post('ac_nonac'),
                'description'=>$this->input->post('description'),
                'edit_by'=>$this->session->userdata('admin_id'),
                'edit_date'=>date('Y-m-d H:i:s')
            );
            if($this->current_model->update_vehicle($this->input->post('id'), $data)){
                $service_data=array();
                for($i=0; $i < 8; $i++){
                    $service_data[]=array(
                        'vehicle_id'=>$this->input->post('id'),
                        'service_type'=>empty($this->input->post('service_type[]')[$i])?'':$this->input->post('service_type[]')[$i],
                        'package_type'=>$this->input->post('package_type[]')[$i],
                        'fare'=>empty($this->input->post('fare[]')[$i])?'':$this->input->post('fare[]')[$i],
                        'extra_km'=>empty($this->input->post('extra_km[]')[$i])?'':$this->input->post('extra_km[]')[$i],
                        'extra_hr'=>empty($this->input->post('extra_hr[]')[$i])?'':$this->input->post('extra_hr[]')[$i],
                        'min_hr'=>empty($this->input->post('min_hr[]')[$i])?'':$this->input->post('min_hr[]')[$i],
                        'min_km'=>empty($this->input->post('min_km[]')[$i])?'':$this->input->post('min_km[]')[$i],
                    );
                }
                if($this->current_model->update_service($this->input->post('id'), $service_data)){
                    exit(json_encode(array('type'=>'success', 'text'=>'Successfully Updated')));
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
                }
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Error.!')));
            }
        }
    }
    public function vehicle_status_data(){
        if($this->input->post('id')!="" && $this->input->post('status')!=""){
            if($this->current_model->vehicle_status_data($this->input->post('id'), $this->input->post('status'))){
                exit(json_encode(array('type'=>'success', 'text'=>'successfully status updated')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        }
    }
    public function delete_vehicle(){
        if($this->current_model->delete_vehicle($this->input->post('id'))){
            exit(json_encode(array('type'=>'success','text'=>'Deleted')));
        }else{
            exit(json_encode(array('type'=>'warning','text'=>'Error..!')));
        }
    }
    


}
