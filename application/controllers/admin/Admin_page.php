<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_page extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
            redirect(base_url('admin'));
        }
        $this->load->library('form_validation');
        $this->load->model('admin/admin_page_model', 'current_model');
    }
    /*****SEO Page******/
	public function seo_manage(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_page_seo',$data);
	}
    public function add_page(){
        $this->form_validation->set_rules('page_id', 'Page', 'trim|required');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'Description', 'trim|required');
        $this->form_validation->set_rules('meta_des', 'Description', 'trim|required');
        $this->form_validation->set_rules('meta_key', 'Description', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            $data=array(
                'page_id' => $this->input->post('page_id'),
                'name' => $this->input->post('name'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_des' => $this->input->post('meta_des'),
                'meta_key' => $this->input->post('meta_key'),
                'status'=>'1',
                'create_by'=>$this->session->userdata('admin_id'),
                'create_date'=>date('Y-m-d H:i:s')
            );
            if(!empty($this->input->post('image'))){
                $folder='./uploads/media/page/';
                if(!is_dir($folder)){ mkdir($folder, 0755, true); }
                $img_data=$this->input->post('image');
                $image_array_1=explode(";", $img_data);
                $image_array_2=explode(",", $image_array_1[1]);
                $img_data=base64_decode($image_array_2[1]);
                $image_name=time().'.'.$this->input->post('img_extention');
                if(file_put_contents($folder.$image_name, $img_data)!== false){
                    $data['img']="page/".$image_name;
                }
            }
            if($this->current_model->add_page($data)==true){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Inserted')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
            }
        }
    }
    public function page_action_table($status, $id){
        if($status>0){$checked="checked";}else{$checked="";}
        $btn="<div class='_wtRange'><small class='fs_11'>Approve </small><div class='form-check form-switch mb-0'><input type='checkbox' ".$checked." onclick=page_status_data('".$id."') id='".$id."_status' class='form-check-input'><label class='form-check-label p-0' for='".$id."_status'></label></div></div>";
        return $btn.'<div class="btn-group">
            <button class="btn btn-sm btn-success" onclick="update_all_details('.$id.')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger" onclick="delete_page('.$id.')"><i class="fa fa-trash"></i></button>
        </div>';
    }
    public function fetch_all_page(){
        $draw=intval($this->input->post("draw"));
        $data=array();
        $data_list=$this->current_model->fetch_all_page();
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            if(empty($row->img)){
                $sub_array[]='<i class="fa fa-file"></i>';
            }else{
                $sub_array[]='<img src="'.base_url("uploads/media/").$row->img.'" style="width:50px;">';
            }
            $sub_array[]='<p class="clip_txt_2 showFullTxt">'.$row->page_id.'</p>';
            $sub_array[]='<p class="clip_txt_2 showFullTxt">'.$row->name.'</p>';
            $sub_array[]='<p class="clip_txt_3 showFullTxt">'.$row->meta_key.'</p>';
            $sub_array[]='<p class="clip_txt_3 showFullTxt">'.$row->meta_des.'</p>';
            $sub_array[]=date('l, d M, Y', strtotime($row->create_date));
            $sub_array[]=$this->page_action_table($row->status, $row->id);
            $data[]=$sub_array;
        }
        $output=array(
            "draw" => $draw,
            "recordsTotal" => $data_list['recordsTotal'],
            "recordsFiltered" => $data_list['recordsFiltered'],
            "data" => $data
        );
        exit(json_encode($output));
    }
    public function update_page_fetch(){
        exit(json_encode($this->current_model->update_page_fetch($this->input->post('id'))));
    }
    public function update_page(){
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('page_id', 'Page', 'trim|required');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'Description', 'trim|required');
        $this->form_validation->set_rules('meta_des', 'Description', 'trim|required');
        $this->form_validation->set_rules('meta_key', 'Description', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }
        else{
            $data=array(
                'page_id' => $this->input->post('page_id'),
                'name' => $this->input->post('name'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_des' => $this->input->post('meta_des'),
                'meta_key' => $this->input->post('meta_key'),
                'edit_by'=>$this->session->userdata('admin_id'),
                'edit_date'=>date('Y-m-d H:i:s')
            );
            if(!empty($this->input->post('image'))){
                $folder='./uploads/media/page/';
                if(!is_dir($folder)){ mkdir($folder, 0755, true); }
                $img_data=$this->input->post('image');
                $image_array_1=explode(";", $img_data);
                $image_array_2=explode(",", $image_array_1[1]);
                $img_data=base64_decode($image_array_2[1]);
                $image_name=time().'.'.$this->input->post('img_extention');
                if(file_put_contents($folder.$image_name, $img_data)!== false){
                    $data['img']="page/".$image_name;
                }
            }
            if($this->current_model->update_page($this->input->post('id'), $data)==true){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Updated')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Error.!')));
            }
        }
    }
    public function page_status_data(){
        if($this->input->post('id')!="" && $this->input->post('status')!=""){
            if($this->current_model->page_status_data($this->input->post('id'), $this->input->post('status'))){
                exit(json_encode(array('type'=>'success', 'text'=>'successfully status updated')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        }
    }
    public function delete_page(){
        exit(json_encode($this->current_model->delete_page($this->input->post('id'))));
    }
}

