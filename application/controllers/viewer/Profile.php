<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once(APPPATH."libraries/php_email/vendor/autoload.php");

class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('user_id')==FALSE){
        	$url=base_url('login');
        	redirect($url);
        }
        
        // $this->load->library('email');
        // $config['mailtype'] = 'html';
        // $this->email->initialize($config);
        
        $this->desktop_width=400;
        $this->mobile_width=300;
        $this->common_width=350;
        $this->profile_thumb_width=50;

        $this->load->library('upload');

        $this->load->library('form_validation');
        $this->load->model('viewer/user_model', 'current_model');
        
    }
    public function send_email($data){
        /*$data=array(
            'smtp_host'=>$smtp_host,
            'smtp_user'=>$smtp_user,
            'smtp_pass'=>$smtp_pass,
            'from'=>$from,
            'from_name'=>$from_name,
            'to'=>$to,
            'to_name'=>$to_name,
            'reply_to'=>$reply_to,
            'reply_to_name'=>$reply_to_name,
            'subject'=>$subject,
            'html'=>$html,
        );*/
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;                               //Enable verbose debug output
            $mail->isSMTP();                                        //Send using SMTP
            $mail->Host       = $data['smtp_host'];                 //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                               //Enable SMTP authentication
            $mail->Username   = $data['smtp_user'];                 //SMTP username
            $mail->Password   = $data['smtp_pass'];                 //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        //Enable implicit TLS encryption
            $mail->Port       = 465;                                //ENCRYPTION_STARTTLS => 587 & ENCRYPTION_SMTPS => 465
            
            // $mail->SMTPOptions = array(
            //     'ssl' => array(
            //         'verify_peer' => false,
            //         'verify_peer_name' => false,
            //         'allow_self_signed' => true
            //     )
            // );
            
            //Recipients
            $mail->setFrom($data['from'], $data['from_name']);
            if(is_array($data['to'])){
                foreach($data['to'] as $email => $name){
                    if(empty($name)){
                        $mail->addAddress($email);
                    }else{
                        $mail->addAddress($email, $name);
                    }
                }
            }else{
                if(empty($data['to_name'])){
                    $mail->addAddress($data['to']);
                }else{
                    $mail->addAddress($data['to'], $data['to_name']);
                }
            }
            
            $mail->addReplyTo($data['reply_to'], $data['reply_to_name']);
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');                //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');           //Optional name
        
            //Content
            $mail->isHTML(true);                                            
            $mail->Subject = $data['subject'];
            $mail->Body    = $data['html'];
            $mail->AltBody = '';
        
            $response=$mail->send();
            $mail->clearAddresses();
            $mail->clearAttachments();
            if($response){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
    }
    private function set_upload_options($upload_path){   
        //upload an image options
        $config=array();
        $config['upload_path']=$upload_path;
        $config['allowed_types']='gif|jpg|png|jpeg|mp4|3gp';
        $config['overwrite']=TRUE;
        if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'], 0755, TRUE);
        }
        return $config;
    }
    public function index(){
        exit("no view!");
    }
    public function dashboard(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/profile_navigation', $data);
        $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
        $data['user_data']=$this->current_model->user_data($this->session->userdata('user_id'));
        $this->load->view('viewer/dashboard', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function profile(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/profile_navigation', $data);
        $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
        $data['user_data']=$this->current_model->user_data($this->session->userdata('user_id'));
        $this->load->view('viewer/profile', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function support(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/profile_navigation', $data);
        $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
        $this->load->view('viewer/support', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function setting(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/profile_navigation', $data);
        $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
        $this->load->view('viewer/setting', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function change_password(){ 
        $this->form_validation->set_rules('old_password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('con_password', 'Confirm password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE) { 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{ 
            exit(json_encode($this->current_model->change_password($this->session->userdata('user_id'), $this->input->post('password'), sha1($this->input->post('old_password')))));
        }
    }
    public function personal_form(){ 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|numeric|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        if($this->form_validation->run() == FALSE) { 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{ 
            $data=array(
                'name'=>$this->input->post('name'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'update_date'=>date('Y-m-d H:i:s'),
            );
            if($this->current_model->change_profile_data($this->session->userdata('user_id'), $data)){
                $this->session->set_userdata(array(
                    'user_name'=>$data['name'],
                    'user_phone'=>$data['phone'],
                    'user_email'=>$data['email'],
                ));
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully Updated!')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        } 
    }
    public function contact_form(){ 
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|callback_checkUpdatePhone');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_checkUpdateEmail');
        if($this->form_validation->run() == FALSE) { 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{ 
            $data=array(
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'update_date'=>date('Y-m-d H:i:s'),
            );
            if($this->current_model->change_profile_data($this->session->userdata('user_id'), $data)){
                exit(json_encode(array('type'=>'success', 'text'=>'Successfully updated!')));
            }else{
                exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
            }
        } 
    }
    public function checkUpdatePhone($phone){
        if($this->current_model->checkUpdatePhone($phone)==true){
            $this->form_validation->set_message('checkUpdatePhone', 'The Mobile No. is already exists!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function checkUpdateEmail($email){
        if($this->current_model->checkUpdateEmail($email)==true){
            $this->form_validation->set_message('checkUpdateEmail', 'The Email is already exists!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function remove_profile_img(){
        $user_id=$this->session->userdata('user_id');
        if($this->current_model->remove_profile_img($user_id)){
            exit(json_encode(array('type'=>'success', 'message'=>'Successfully Removed!')));
        }else{
            exit(json_encode(array('type'=>'error', 'message'=>'something went wrong!')));
        }
    }
    public function upload_profile_img(){
        if(isset($_FILES['profile_image'])){
            $user_id=$this->session->userdata('user_id');
            $_FILES['profile_image']['name']= time().'.'.pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $this->upload->initialize($this->set_upload_options('uploads/profile_media/'));
            if(!$this->upload->do_upload('profile_image')){
                $error=$this->upload->display_errors();
                exit(json_encode(array('type'=>'error', 'message'=>$error)));
            }else{
                $upload_data=$this->upload->data();
                $profile_media=$upload_data["file_name"];
                $thumb=true; $timeline_post=true;
                $image_width=$upload_data['image_width'];
                if($image_width < $this->common_width){
                    if($upload_data['file_size']>100){
                        $image_process=true;
                        $image_process_size=$this->common_width;
                    }else{
                        $image_process=false;
                    }
                }else{
                    $image_process=true;
                    $image_process_size=$this->common_width;
                }
                if($image_process){
                    $this->load->library('image_lib');
                    $image_config["source_image"]=$upload_data["full_path"];
                    $image_config['create_thumb']=FALSE;
                    $image_config['maintain_ratio']=TRUE;
                    $image_config['overwrite']=TRUE;
                    $image_config['new_image']=$upload_data["file_path"] . $upload_data["file_name"];
                    $image_config['quality']="90%";
                    $image_config['width']=$image_process_size;
                    $image_config['height']=1;
                    $dim=(intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                    $image_config['master_dim']=($dim > 0)? "height" : "width";         
                    $this->image_lib->initialize($image_config);
                    if(!$this->image_lib->resize()){
                        $error=$this->image_lib->display_errors();
                        exit(json_encode(array('type'=>'error', 'message'=>$error)));
                    }else{      
                        /*
                            //Ratio Mentioned No Need This
                            $image_config['image_library']='gd2';
                            $image_config['source_image']=$upload_data["file_path"] . $upload_data["file_name"];
                            $image_config['new_image']=$upload_data["file_path"]. $upload_data["file_name"];
                            $image_config['quality']="90%";
                            $image_config['maintain_ratio']=TRUE;
                            $image_config['width']=480;
                            $image_config['height']=1;
                            $image_config['x_axis']='0';
                            $image_config['y_axis']='0';
                            $this->image_lib->clear();
                            $this->image_lib->initialize($image_config); 
                            if (!$this->image_lib->crop()){
                                $error=$this->image_lib->display_errors();      
                                echo "pos3<br>".$error;         
                            }else{
                                echo "Image Uploaded successfully";
                            }
                        */
                    }
                }
                if($thumb){
                    $this->load->library('image_lib');
                    $image_config["source_image"]=$upload_data["full_path"];
                    $image_config['create_thumb']=FALSE;
                    $image_config['maintain_ratio']=TRUE;
                    $image_config['overwrite']=TRUE;
                    $image_config['new_image']='uploads/thumb_profile_media/'.$upload_data["file_name"];
                    $image_config['quality']="90%";
                    $image_config['width']=$this->profile_thumb_width;
                    $image_config['height']=1;
                    $dim=(intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
                    $image_config['master_dim']=($dim > 0)? "height" : "width";         
                    $this->image_lib->initialize($image_config);
                    if (!$this->image_lib->resize()){
                        $error=$this->image_lib->display_errors();
                        exit(json_encode(array('type'=>'error', 'message'=>$error)));
                    }else{      
                        /*
                            //Ratio Mentioned No Need This
                            $image_config['image_library']='gd2';
                            $image_config['source_image']=$upload_data["file_path"] . $upload_data["file_name"];
                            $image_config['new_image']=$upload_data["file_path"]. $upload_data["file_name"];
                            $image_config['quality']="90%";
                            $image_config['maintain_ratio']=TRUE;
                            $image_config['width']=480;
                            $image_config['height']=1;
                            $image_config['x_axis']='0';
                            $image_config['y_axis']='0';
                            $this->image_lib->clear();
                            $this->image_lib->initialize($image_config); 
                            if (!$this->image_lib->crop()){
                                $error=$this->image_lib->display_errors();      
                                echo "pos3<br>".$error;         
                            }else{
                                echo "Image Uploaded successfully";
                            }
                        */
                    }
                }           
            }
            $data=array(
                'user_id'=>$user_id,
                'img'=>$profile_media,
                'update_date'=>date('Y-m-d H:i:s'),
            );
            $result=$this->current_model->upload_profile_img($user_id, $profile_media, $data);
            if($result){
                $this->session->set_userdata('user_profile_media', $profile_media);
                exit(json_encode(array('type'=>'success', 'message'=>'Successfully Uploaded!')));
            }else{
                exit(json_encode(array('type'=>'error', 'message'=>'something went wrong!')));
            }
        }
    }


    /***********Order/Booking Transation/History**********/
    public function transaction(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $this->load->view('viewer_includes/header');
        $this->load->view('viewer_includes/profile_navigation', $data);
        $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
        $data['booking_data']=$this->current_model->get_booking_data($this->session->userdata('user_id'));
        $this->load->view('viewer/transaction', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }




    


}