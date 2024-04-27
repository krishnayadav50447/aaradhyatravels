<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_customer extends CI_Controller{
	public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
            redirect(base_url('admin-logout'));
        }
        $this->load->library('form_validation');
        $this->load->model('admin/admin_view_customer_model', 'current_model');
    }
    /******Start ALl Customer********/
	public function index(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
	    $this->load->view('admin/admin_view_customer', $data);
	}
    public function fetch_all_customer(){
        $draw=intval($this->input->post("draw"));
        $start=intval($this->input->post("start"));
        $length=intval($this->input->post("length"));
        $search=trim(strip_tags($this->input->post("search")['value']));
        $order=$this->input->post("order")[0];
        $filter=$this->input->post("columns");

        $data=array();
        $data_list=$this->current_model->fetch_all_customer($start, $length, $search, $order, $filter);
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]='<p>'.$row->id.'</p>';
            if(empty($row->img)){
                $img=base_url("uploads/thumb_profile_media/profile_media.png");
            }else{
                $img=base_url("uploads/thumb_profile_media/").$row->img;
            }
            $sub_array[]='<div class="img"><img src='.$img.'></div>';
            $sub_array[]='<div class="_wtMinWidth"><p>'.$row->name.'</p></div>';
            $sub_array[]='<div class="_wtMinWidth">'.(empty($row->email)?'':'<p><a class="_link" href="mailto:'.$row->email.'"><i class="fas fa-envelope fs_11 me-1"></i>'.$row->email.'</a></p>').(empty($row->phone)?'':'<p><a class="_link" href="tel:'.$row->phone.'"><i class="fas fa-phone-alt fs_11 me-1"></i>'.$row->phone.'</a></p>').'</div>';
            $sub_array[]='<div><img src='.base_url('uploads/kyc/').$row->aadhaar_img.' style="max-width:80px;max-height:80px;"></div>';
            $sub_array[]='<div class="_wtMinWidth showFullHtml">'.(empty($row->city)?'':'<p>'.$row->city.'</p>').(empty($row->state)?'':'<p>'.$row->state.'</p>').(empty($row->country)?'':'<p>'.$row->country.'</p>').'</div>';
            $sub_array[]='<div class="_wtMinWidth"><p>'.date('d M, Y', strtotime($row->create_date)).'<br><small><i class="fas fa-clock fs_10 me-1"></i>'.date('h:i a', strtotime($row->create_date)).'</small></p></div>';

            if($row->status>0){$checked="checked";}else{$checked="";}
            $statusChk="<div class='form-check form-switch'><input type='checkbox' ".$checked." onclick=status_data('".$row->id."') id='".$row->id."_status' class='form-check-input'><label class='form-check-label' for='".$row->id."_status'></label></div>";
            $sub_array[]=$statusChk;

            $sub_array[]='<div class="btn-group"><button class="btn btn-sm btn-primary d-none" onclick="open_email_form(this)" data-email="'.$row->email.'"><i class="fa fa-envelope"></i></button><button class="btn btn-sm btn-danger" onclick=delete_data("'.$row->id.'")><i class="fa fa-trash"></i></button></div>';

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
    public function status_data(){
        if($this->input->post('id')!="" && $this->input->post('status')!=""){
            if($this->current_model->status_data($this->input->post('id'), $this->input->post('status'))){
                exit(json_encode(array('type'=>'success', 'text'=>'successfully status updated')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        }
    }
    public function delete_data(){
        if($this->current_model->delete_data($this->input->post('id'))){
            exit(json_encode(array('type'=>'success', 'text'=>'successfully deleted!')));
        }else{
            exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
        }
    }





    

}