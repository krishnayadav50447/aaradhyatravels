<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Extra_pages extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model('viewer/pages_model', 'current_model');
    }
    public function sample(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('home');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/sample');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }








}