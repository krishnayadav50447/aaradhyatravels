<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_view_notification extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('admin_id')==FALSE){
            redirect(base_url('admin'));
        }
        $this->load->library('email');
        $this->load->library('form_validation');
        $this->load->model('admin/admin_view_notification_model', 'current_model');
    }
    /******Start Web Contact*****/
    public function index(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_web_contact', $data);
    }
    public function fetch_web_contact(){
        $draw=intval($this->input->post("draw"));
        $data=array();
        $data_list=$this->current_model->fetch_web_contact();
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]=$row->name;
            $sub_array[]=$row->company_name;
            $sub_array[]=$row->email;
            $sub_array[]=$row->phone;
            $sub_array[]=$row->designation;
            $sub_array[]=$row->address;
            $sub_array[]='<div class="clip_txt_2 showFullHtml" style="width:300px;">'.$row->message.'</div>';
            $sub_array[]='<div class="_wtDtInfo">'.date('l, d M, Y', strtotime($row->create_date)).'</div>';
            $sub_array[]='<div class="btn-group">
                                <button class="btn btn-sm btn-success" onclick="open_email_form(this)" data-email="'.$row->email.'"><i class="fa fa-envelope"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="delete_web_contact('.$row->id.')"><i class="fa fa-trash"></i></button>
                            </div>';
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
    public function delete_web_contact(){
        exit(json_encode($this->current_model->delete_web_contact($this->input->post('id'))));
    }

    /******End Web Contact*****/


    /******Start Email*****/
    public function email_data(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_view_email', $data);
    }
    public function fetch_all_email(){
        $draw=intval($this->input->post("draw"));
        $data=array();
        $data_list=$this->current_model->fetch_all_email();
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]=$row->email_from;
            $sub_array[]=implode("<br>",explode(",", $row->email_to));
            $sub_array[]=$row->email_subject;
            $sub_array[]='<div class="clip_txt_2 showFullHtml">'.$row->email_message.'</div>';
            $sub_array[]=$row->create_date;
            $sub_array[]="<div class='btn-group'><button class='btn btn-sm btn-primary' onclick='resend_email(".$row->id.")'><i class='fa fa-envelope'></i></button><button class='btn btn-sm btn-danger' onclick='delete_send_email(".$row->id.")'><i class='fa fa-trash'></i></button></div>";
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
    public function send_email(){
        $this->form_validation->set_rules('email_to', 'To', 'trim|required');
        $this->form_validation->set_rules('email_from', 'From', 'trim|required');
        $this->form_validation->set_rules('email_subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('email_message', 'Message', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }
        else{
            $data=array(
                'email_to'=>$this->input->post('email_to'),
                'email_from'=>$this->input->post('email_from'),
                'email_subject'=>$this->input->post('email_subject'),
                'email_message'=>$this->input->post('email_message'),
            );
            //sending email
            $config['mailtype']='html';
            $this->email->initialize($config);
            $this->email->from($data['email_from'], site_title());
            $this->email->to($data['email_from']);
            $this->email->bcc($data['email_to']);
            $this->email->subject($data['email_subject']);
            $this->email->message($data['email_message']);
            $this->email->send();
            if($this->current_model->save_send_email($data)==true){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Send & Saved Your Email')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
            }
        }
    }
    public function get_saved_email_fetch(){
        exit(json_encode($this->current_model->get_saved_email_fetch($this->input->post('id'))));
    }
    public function delete_send_email(){
        exit(json_encode($this->current_model->delete_send_email($this->input->post('id'))));
    }
    public function subscribe_email_data(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_view_subscribe_email', $data);
    }
    public function fetch_all_subscribed_email(){
        $draw=intval($this->input->post("draw"));
        $data=array();
        $data_list=$this->current_model->fetch_all_subscribed_email();
        $i=0;
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $sub_array[]=++$i;
            $sub_array[]=$row->email;
            $sub_array[]='<div class="_wtDtInfo">'.date('l, d M, Y', strtotime($row->create_date)).'</div>';
            $sub_array[]="<input value='".$row->email."' type='checkbox' class='mailCheckBox'>";
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
    /********End Email*********/

    /********Reviews*********/
    public function review_contact(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $data['link_script']=$this->load->view('admin_includes/admin_link_script', NULL, TRUE);
        $data['header']=$this->load->view('admin_includes/admin_header', array('session_data'=>$data['session_data'], 'csrfName'=>$data['csrfName'], 'csrfHash'=>$data['csrfHash']), TRUE);
        $data['left_nav']=$this->load->view('admin_includes/admin_left_nav', array('session_data'=>$data['session_data']), TRUE);
        $data['right_nav']=$this->load->view('admin_includes/admin_right_nav', NULL, TRUE);
        $this->load->view('admin/admin_review_contact', $data);
    }
    public function review_action_table($status, $id){
        if($status>0){$checked="checked";}else{$checked="";}
        $btn="<div class='_wtRange'><small class='fs_11'>Approve </small><div class='form-check form-switch mb-0'><input type='checkbox' ".$checked." onclick=status_data('".$id."') id='".$id."_status' class='form-check-input'><label class='form-check-label p-0' for='".$id."_status'></label></div></div>";
        return $btn.'<div class="btn-group">
            <button class="btn btn-sm btn-success" onclick="update_all_details('.$id.')"><i class="fa fa-edit"></i></button>
            <button class="btn btn-sm btn-danger" onclick="delete_review('.$id.')"><i class="fa fa-trash"></i></button>
        </div>';
    }
    public function fetch_all_review(){
        $draw=intval($this->input->post("draw"));
        $data=array();
        $data_list=$this->current_model->fetch_all_review();
        foreach($data_list['data'] as $row) {
            $sub_array=array();
            $rating="";
            for ($i=0; $i < $row->review; $i++) {
                $rating.='<span class="fa fa-star checked"></span>';
            } 
            for ($j=$i; $j < 5; $j++) { 
                $rating.='<span class="fa fa-star"></span>';
            }
            if(empty($row->img)){
                $sub_array[]='<p class="text-center"><img src="'.base_url('uploads/media/review/user.png').'" width="70px"></p><p class="text-center">'.$row->name.'</p><p>'.$rating.'</p>';
            }else{
                $sub_array[]='<p class="text-center"><img src="'.base_url('uploads/media/').$row->img.'" width="70px"></p><p class="text-center">'.$row->name.'</p><p>'.$rating.'</p>';
            }
            $sub_array[]=$row->position;
            $sub_array[]=$row->location;
            $sub_array[]='<p>'.$row->designation.'</p><p class="clip_txt_2 showFullTxt">'.$row->message.'</p>';
            $sub_array[]='<div class="_wtDtInfo">'.date('l, d M, Y', strtotime($row->create_date)).'</div>';
            $sub_array[]=$this->review_action_table($row->status, $row->id);
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
    public function add_review(){
        $this->form_validation->set_rules('ref_name', 'Ref. Name', 'trim|required');
        $this->form_validation->set_rules('ref_id', 'Ref. Id', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('review', 'Review', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('create_date', 'Date', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            $data=array(
                'ref_id' => $this->input->post('ref_id'),
                'ref_name' => $this->input->post('ref_name'),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'location' => $this->input->post('location'),
                'designation' => $this->input->post('designation'),
                'review' => $this->input->post('review'),
                'position' => $this->input->post('position'),
                'message' => $this->input->post('message'),
                'ip_address'=>$_SERVER['REMOTE_ADDR'],
                'status'=>1,
                'create_by'=>$this->session->userdata('admin_id'),
                'create_date'=>$this->input->post('create_date')
            );
            if(!empty($this->input->post('image'))){
                $folder='./uploads/media/review/';
                if(!is_dir($folder)){ mkdir($folder, 0755, true); }
                $img_data=$this->input->post('image');
                $image_array_1=explode(";", $img_data);
                $image_array_2=explode(",", $image_array_1[1]);
                $img_data=base64_decode($image_array_2[1]);
                $image_name=time().'.'.$this->input->post('img_extention');
                if(file_put_contents($folder.$image_name, $img_data)!== false){
                    $data['img']="review/".$image_name;
                }
            }
            if($this->current_model->add_review($data)==true){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Inserted')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Server Error.!')));
            }
        }
    }
    public function update_review_fetch(){
        exit(json_encode($this->current_model->update_review_fetch($this->input->post('id'))));
    }
    public function update_review(){
        $this->form_validation->set_rules('id', 'ID', 'trim|required');
        $this->form_validation->set_rules('ref_name', 'Ref. Name', 'trim|required');
        $this->form_validation->set_rules('ref_id', 'Ref. Id', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('location', 'Location', 'trim|required');
        $this->form_validation->set_rules('review', 'Review', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');
        $this->form_validation->set_rules('create_date', 'Date', 'trim|required');
        if ($this->form_validation->run() == FALSE){
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }
        else{
            $data=array(
                'ref_name' => $this->input->post('ref_name'),
                'ref_id' => $this->input->post('ref_id'),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'location' => $this->input->post('location'),
                'designation' => $this->input->post('designation'),
                'review' => $this->input->post('review'),
                'position' => $this->input->post('position'),
                'message' => $this->input->post('message'),
                'ip_address'=>$_SERVER['REMOTE_ADDR'],
                'create_date'=>$this->input->post('create_date'),
                'edit_by'=>$this->session->userdata('admin_id'),
                'edit_date'=>date('Y-m-d H:i:s')
            );
            if(!empty($this->input->post('image'))){
                $folder='./uploads/media/review/';
                if(!is_dir($folder)){ mkdir($folder, 0755, true); }
                $img_data=$this->input->post('image');
                $image_array_1=explode(";", $img_data);
                $image_array_2=explode(",", $image_array_1[1]);
                $img_data=base64_decode($image_array_2[1]);
                $image_name=time().'.'.$this->input->post('img_extention');
                if(file_put_contents($folder.$image_name, $img_data)!== false){
                    $data['img']="review/".$image_name;
                }
            }
            if($this->current_model->update_review($this->input->post('id'), $data)==true){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Updated')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'Error.!')));
            }
        }
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
    public function delete_review(){
        exit(json_encode($this->current_model->delete_review($this->input->post('id'))));
    }
    

}
