<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
        	redirect(base_url('admin'));
        }
        $this->load->model('admin/admin_dashboard_model', 'current_model');
    }
	public function index(){
	    $data['total_homepage_visitor']=$this->current_model->get_total_count_visitor('homepage_visitor');
        $data['total_user']=$this->current_model->get_total_user();
		$data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
		$this->load->view('admin/admin_dashboard', $data);
	}


}

