<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_transaction extends CI_Controller{
	public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
            redirect(base_url('admin-logout'));
        }
        $this->load->library('form_validation');
        $this->load->model('admin/admin_view_transaction_model', 'current_model');
    }
    /******Start ALl Customer********/
	public function index(){
    }

    public function user_transaction(){
        $type=$this->input->get('type');
        if(empty($type)){
            $data['type']='success';
        }else{
            $data['type']=$type;
        }
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
	    $this->load->view('admin/admin_view_transaction', $data);
	}
    public function fetch_all_user_transaction(){
        $draw=intval($this->input->post("draw"));
        $start=intval($this->input->post("start"));
        $length=intval($this->input->post("length"));
        $search=trim(strip_tags($this->input->post("search")['value']));
        $order=$this->input->post("order")[0];
        $filter=$this->input->post("columns");

        $type=$this->input->post('type');

        $data=array();
        $data_list=$this->current_model->fetch_all_user_transaction($type, $start, $length, $search, $order, $filter);
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]='<p>'.$row->id.'</p>';
            $sub_array[]='<div class="_wtMinWidth"><p><i class="fas fa-user fs_10 me-1"></i> '.$row->name.'</p><p><i class="fas fa-envelope fs_10 me-1"></i> '.$row->email.'</p><p><i class="fas fa-phone-alt fs_10 me-1"></i> '.$row->phone.'</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p style="width:200px;"><i class="fas fa-map-marker-alt fs_10 me-1"></i> '.$row->from_pickup.'</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p style="width:200px;"><i class="fas fa-map-marker-alt fs_10 me-1"></i> '.$row->to_drop.'</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p>'.$row->service_type.''.$row->package_type.'</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p>'.$row->vehicle_name.'</p><p>'.$row->vehicle_brand.', '.$row->vehicle_seater.'seater</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p><i class="fas fa-clock fs_10 me-1"></i> '.date('h:i a', strtotime($row->pickup_time)).'</p><p><i class="fas fa-calendar fs_10 me-1"></i> '.date('D jS M, Y', strtotime($row->pickup_date)).'</p></div>';
            $sub_array[]='<div class="_wtMinWidth"><p>Total: &#8377;'.get_price_format($row->total_amount).'</p><p>Paid: &#8377;'.get_price_format($row->paid_amount).'</p><p>Due: &#8377;'.get_price_format($row->total_amount-$row->paid_amount).'</p><p>'.$row->tran_id.'</p></div>';

            if($row->cancel_status=='canceled'){
                $sub_array[]='<div class="_wtMinWidth"><p>'.$row->status.'</p><p class="text-danger">(Canceled Time:<br>'.date('D jS M, Y', strtotime($row->pickup_date)).', '.date('h:i a', strtotime($row->pickup_time)).')</p></div>';
            }else{
                if($row->status=='success'){
                    $sub_array[]='<div class="_wtMinWidth"><p>'.$row->status.'</p><p class="text-success">(Paid)</p></div>';
                }else{
                    $sub_array[]='<div class="_wtMinWidth"><p>'.$row->status.'</p><p class="text-danger">(Not Paid)</p></div>';
                }
            }

            $sub_array[]='<div class="_wtMinWidth"><p>'.date('d M, Y', strtotime($row->create_date)).'<br><small><i class="fas fa-clock fs_10 me-1"></i>'.date('h:i a', strtotime($row->create_date)).'</small></p></div>';
            $sub_array[]="<div><button class='btn btn-sm btn-success'>Complete</button></div>";
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



    

}