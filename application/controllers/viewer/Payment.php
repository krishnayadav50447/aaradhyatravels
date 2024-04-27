<?php defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once(APPPATH."libraries/php_email/vendor/autoload.php");

class Payment extends CI_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model("viewer/Payment_model", 'current_model');
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
    public function send_sms($numbers_arr,$txt){
        $apiKey=urlencode('MzQ1MjczNmU2NjQ2MzQ3MzU2NGQzMTczMzU3YTc2NGE=');
        $sender=urlencode('AARTVL');
        $message=rawurlencode($txt);
        $numbers=implode(',', $numbers_arr);
        $data=array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
        $ch=curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($ch);
        curl_close($ch);
        // echo $response;
        // die;
        $result=json_decode($response);
        if($result->status=="success"){
            // echo "successfully sent sms";
            return true;
        }else{
            // echo "something went wrong!";
            return false;
        }
    }

    public $merchantId="AARADHAYAONLINE";
    public $saltKey="1ac116ee-c66d-46d0-988a-a1fc7955d815";
    public $curlApiUrl="https://api.phonepe.com/apis/hermes/pg/v1/pay";
    public $curlRefundApiUrl="https://api.phonepe.com/apis/hermes/pg/v1/refund";
    public $curlStatusApiUrl="https://api.phonepe.com/apis/hermes/pg/v1/status";
    
    // public $merchantId="MERCHANTUAT";
    // public $saltKey="099eb0cd-02cf-4e2a-8aca-3e6c6aff0399";
    // public $curlApiUrl="https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay";
    // public $curlRefundApiUrl="https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/refund";
    // public $curlStatusApiUrl="https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status";

    public function make_payment(){
        $this->form_validation->set_rules('amount', 'amount', 'trim|required'); 
        $this->form_validation->set_rules('vehicle_id', 'vehicle_id', 'trim|required');
        $this->form_validation->set_rules('service_id', 'service_id', 'trim|required');
        $this->form_validation->set_rules('from_pickup', 'from_pickup', 'trim|required');
        $this->form_validation->set_rules('to_drop', 'to_drop', 'trim|required');
        if($this->form_validation->run() == FALSE){ 
            exit(json_encode(array('type'=>'warning','text'=>validation_errors())));
        }else{
            if($this->session->has_userdata('user_id')==FALSE){
                $register_data=array(
                    'name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                    'email'=>$this->input->post('email'),
                    'password'=>sha1($this->input->post('password')),
                    'create_date'=>date('Y-m-d H:i:s'),
                    'reffer_code'=>time(),
                    'status'=>1,
                );
                $result=$this->current_model->register_data("", $register_data);
                if($result['type']=='success'){
                    $this->session->set_userdata(array(
                        'user_id'=>$result['user_id'],
                        'user_name'=>$result['user_name'],
                        'user_phone'=>$result['user_phone'],
                        'user_email'=>$result['user_email'],
                        'user_profile_media'=>$result['img'],
                    ));
                }else{
                    if($result['type']=='warning'){
                        exit(json_encode(array('type'=>$result['type'], 'text'=>$result['text'])));
                    }else{
                        if($result['type']=='error'){
                            exit(json_encode(array('type'=>'error', 'text'=>$result['text'])));
                        }else{
                            exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                        }
                    }
                }
            }

            $user_id=$this->session->userdata('user_id');
            $user_phone=$this->session->userdata('user_phone');
            $user_email=$this->session->userdata('user_email');

            $booking_data=array(
                'vehicle_id'=>$this->input->post('vehicle_id'),
                'service_id'=>$this->input->post('service_id'),
                'user_id'=>$user_id,
                'from_pickup'=>$this->input->post('from_pickup'),
                'to_drop'=>$this->input->post('to_drop'),
                'from_postcode'=>$this->input->post('from_postcode'),
                'from_city'=>$this->input->post('from_city'),
                'from_state'=>$this->input->post('from_state'),
                'from_country'=>$this->input->post('from_country'),
                'to_postcode'=>$this->input->post('to_postcode'),
                'to_city'=>$this->input->post('to_city'),
                'to_state'=>$this->input->post('to_state'),
                'to_country'=>$this->input->post('to_country'),
                'pickup_date'=>$this->input->post('pickup_date'),
                'pickup_time'=>$this->input->post('pickup_time'),
                'drop_date'=>$this->input->post('drop_date'),
                'drop_time'=>$this->input->post('drop_time'),
                'total_amount'=>$this->input->post('total_amount'),
                'paid_amount'=>$this->input->post('amount'),
                'create_date'=>date('Y-m-d H:i:s'),
            );

            $uniq_id=time();
            $req_data=array(
                "merchantId"=>$this->merchantId,
                "merchantTransactionId"=>"TRAN".$uniq_id."_".$user_id,
                "merchantUserId"=>"USER".$uniq_id."_".$user_id,
                "amount"=>($booking_data['paid_amount']*100),
                "redirectUrl"=>base_url('verify-payment'),
                "redirectMode"=>"POST",
                "callbackUrl"=>base_url('verify-payment'),
                "mobileNumber"=>$user_phone,
                "paymentInstrument"=>array(
                    "type"=>"PAY_PAGE"
                ),
            );

            $req_base64=base64_encode(json_encode($req_data));

            $x_verify=hash("sha256", $req_base64."/pg/v1/pay".$this->saltKey)."###1";

            // echo $req_base64;
            // echo "<br>";
            // echo $x_verify;
            // die();

            $post_body=json_encode(array('request'=>$req_base64));

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => $this->curlApiUrl,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $post_body,
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-Verify: $x_verify",
                    "accept: application/json",
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if($err){
              echo "cURL Error #:" . $err;
            }else{
                // echo "<pre>";
                // echo $response;
                // die();

                $response=json_decode($response);
                if($response->success==1 && $response->code=="PAYMENT_INITIATED"){
                    $merchantTransactionId=$response->data->merchantTransactionId;
                    $payment_url=$response->data->instrumentResponse->redirectInfo->url;

                    $booking_data['tran_id']=$merchantTransactionId;
                    $booking_data['status']="pending";
                    if($this->current_model->save_booking_data($booking_data)){
                        exit(json_encode(array('type'=>'success', 'merchantTransactionId'=>$merchantTransactionId, 'payment_url'=>$payment_url)));
                    }else{
                        exit(json_encode(array('type'=>'error', 'text'=>'Something went wrong! Server error!')));
                    }
                }
            }
        }
    }
    public function verify_payment(){
        // echo "<pre>";
        // print_r($_POST);
        if($this->input->post('code')=="PAYMENT_SUCCESS"){
            $transactionId=$this->input->post('transactionId');
            if($this->current_model->update_booking_data($transactionId)){
                $booking_data=$this->current_model->get_booking_row($transactionId);

                /********Send Alert To User**********/
                $user_name=$booking_data->name;
                $user_phone=$booking_data->phone;
                $user_email=$booking_data->email;

                /*****Send SMS*****/
                if(empty($user_phone)==false && is_numeric($user_phone) && strlen(trim($user_phone))==10){
                    $user_message="Hi ".get_first_name($user_name).", Your booking is successfully done in Aaradhaya Travels. Your booking ID is: ".$booking_data->id.". Enjoy your experience with us! For more details contact: ".get_phone_list(1);
                    $user_send_phone=$this->send_sms(array($user_phone), $user_message);
                }

                /*****Send Email*****/
                $user_subject="Your booking is successfully done - ".site_title();
                $user_message="<h3>Dear ".get_first_name($user_name).", you have booked our service with the given below details.</h3>
                <div>
                    <h4>Details:</h4>
                    <p><strong>Booking No: </strong>".$booking_data->id."</p>
                    <p><strong>Type: </strong>".$booking_data->service_type.$booking_data->package_type."</p>
                    <p><strong>Vehicle: </strong>".$booking_data->vehicle_name."</p>
                    <p><strong>From: </strong>".$booking_data->from_pickup."</p>
                    <p><strong>To: ".$booking_data->to_drop."</strong> </p>
                    <p><strong>Pickup Date: </strong>".date('D jS F, Y', strtotime($booking_data->pickup_date))."</p>
                    <p><strong>Pickup Time: </strong>".date('h:i a', strtotime($booking_data->pickup_time))."</p>
                    <p><strong>Total Aount: </strong>".get_price_format($booking_data->total_amount)."</p>
                    <p><strong>Paid Amount: </strong>".get_price_format($booking_data->paid_amount)."</p>
                    <p><strong>Due Amount: </strong>".get_price_format($booking_data->total_amount-$booking_data->paid_amount)."</p>
                    <p><strong>Tran Id: </strong>".$booking_data->tran_id."</p>
                </div>
                <div>
                    <br><br><br>
                    <p>Thanks & Regards</p>
                    <p>".site_title()."</p>
                    <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                    <p><b>".site_title()."</b></p>
                    <p><b>Phone</b> ".get_phone_list(1)."</p>
                    <p><b>Email</b> ".get_email_name('info')."</p>
                </div>";
                $user_email_data=array(
                    'smtp_host'=>get_email_host(),
                    'smtp_user'=>get_email_name('service'),
                    'smtp_pass'=>get_email_pass('service'),
                    'from'=>get_email_name('service'),
                    'from_name'=>site_title(),
                    'to'=>$user_email,
                    'to_name'=>$user_name,
                    'reply_to'=>get_email_name('noreply'),
                    'reply_to_name'=>site_title(),
                    'subject'=>$user_subject,
                    'html'=>$user_message,
                );
                $user_send_email=$this->send_email($user_email_data);


                /********Send Alert To Admin**********/
                $admin_name="Admin";
                $admin_phone="9928761299";
                $admin_email=get_gmail_name('aaradhayatravelskota');

                /****Send SMS*****/
                if(empty($admin_phone)==false && is_numeric($admin_phone) && strlen(trim($admin_phone))==10){
                    $admin_message="A new booking is received in Aaradhaya Travels. Name: ".$user_name.", Phone: ".$user_phone.", Booking ID: ".$booking_data->id.". Please check the admin dashboard for more details. Thank you!";
                    $admin_send_phone=$this->send_sms(array($admin_phone), $admin_message);
                }

                /*****Send Email******/
                $admin_subject=get_first_name($user_name)." has booked a service successfully - ".site_title();
                $admin_message="<h3>Dear $admin_name, you have a new booking service with the given below details.</h3>
                <div>
                    <h4>Details:</h4>
                    <p><strong>Booking No: </strong>".$booking_data->id."</p>
                    <p><strong>Name: </strong>".$user_name."</p>
                    <p><strong>Phone: </strong>".$user_phone."</p>
                    <p><strong>Email: </strong>".$user_email."</p>
                    <p><strong>Type: </strong>".$booking_data->service_type.$booking_data->package_type."</p>
                    <p><strong>Vehicle: </strong>".$booking_data->vehicle_name."</p>
                    <p><strong>From: </strong>".$booking_data->from_pickup."</p>
                    <p><strong>To: </strong>".$booking_data->to_drop."</p>
                    <p><strong>Pickup Date: </strong>".date('D jS F, Y', strtotime($booking_data->pickup_date))."</p>
                    <p><strong>Pickup Time: </strong>".date('h:i a', strtotime($booking_data->pickup_time))."</p>
                    <p><strong>Total Aount: </strong>&#8377;".get_price_format($booking_data->total_amount)."</p>
                    <p><strong>Paid Amount: </strong>&#8377;".get_price_format($booking_data->paid_amount)."</p>
                    <p><strong>Due Amount: </strong>&#8377;".get_price_format($booking_data->total_amount-$booking_data->paid_amount)."</p>
                    <p><strong>Tran Id: </strong>".$booking_data->tran_id."</p>
                </div>
                <div>
                    <br><br><br>
                    <p>Thanks & Regards</p>
                    <p>".site_title()."</p>
                    <a href='".base_url()."'><img src='".base_url('viewer_assets/images/logo.png')."'></a>
                    <p><b>".site_title()."</b></p>
                    <p><b>Phone</b> ".get_phone_list(1)."</p>
                    <p><b>Email</b> ".get_email_name('info')."</p>
                </div>";
                $admin_email_data=array(
                    'smtp_host'=>get_email_host(),
                    'smtp_user'=>get_email_name('service'),
                    'smtp_pass'=>get_email_pass('service'),
                    'from'=>get_email_name('service'),
                    'from_name'=>site_title(),
                    'to'=>$admin_email,
                    'to_name'=>$admin_name,
                    'reply_to'=>get_email_name('noreply'),
                    'reply_to_name'=>site_title(),
                    'subject'=>$admin_subject,
                    'html'=>$admin_message,
                );
                $admin_send_email=$this->send_email($admin_email_data);

                $data['session_data']=$this->session->all_userdata();
                $data['csrfHash']=$this->security->get_csrf_hash();
                $data['csrfName']=$this->security->get_csrf_token_name();
                $this->load->view('viewer_includes/header');
                $this->load->view('viewer_includes/profile_navigation', $data);
                $data['profile_side_nav']=$this->load->view('viewer_includes/profile_side_nav', null, true);
                $data['user_data']=$this->current_model->user_data($this->session->userdata('user_id'));
                $this->load->view('viewer/payment_done', $data);
                $this->load->view('viewer_includes/footer');
                $this->load->view('viewer_includes/footer_bottom');
            }
        }else{
            exit("something went wrong!");
        }
    }
    public function cancel_booking(){
        $booking_id=$this->input->post('booking_id');
        $cancel_reason=$this->input->post('cancel_reason');
        if(empty($booking_id) || empty($cancel_reason)){
            exit(json_encode(array('type'=>'error', 'text'=>'booking_id & cancel_reason missing!')));
        }else{
            $user_id=$this->session->userdata('user_id');
            $user_name=$this->session->userdata('user_name');
            $user_phone=$this->session->userdata('user_phone');
            $user_email=$this->session->userdata('user_email');
            
            $admin_name="Admin";
            $admin_phone="9928761299";
            
            $booking_data=$this->current_model->get_booking_details($booking_id, $user_id);
            
            $start_datetime = new DateTime(date('Y-m-d H:i:s')); 
            $time_dif_arr = $start_datetime->diff(new DateTime(date('Y-m-d H:i:s', strtotime($booking_data->pickup_date.' '.$booking_data->pickup_time)))); 
            if($time_dif_arr->y>0 || $time_dif_arr->m>0 || $time_dif_arr->d>0 || $time_dif_arr->h>5){
                $cancel_array=array(
                    'cancel_reason'=>$cancel_reason,
                    'cancel_status'=>'canceled',
                    'cancel_date'=>date('Y-m-d H:i:s')
                );
                if($this->current_model->cancel_booking($booking_id, $cancel_array)){
                    if(empty($user_phone)==false && is_numeric($user_phone) && strlen(trim($user_phone))==10){
                        $user_message="Hey ".get_first_name($user_name)."! your Booking ID: ".$booking_id." with Aaradhaya Travels has been cancelled as per your request. Thanks for booking with us!";
                        $user_send_phone=$this->send_sms(array($user_phone), $user_message);
                    }
                    if(empty($admin_phone)==false && is_numeric($admin_phone) && strlen(trim($admin_phone))==10){
                        $admin_message=get_first_name($user_name)." has been cancelled the booking with Booking ID: ".$booking_id." with Aaradhaya Travels.";
                        $admin_send_phone=$this->send_sms(array($admin_phone), $admin_message);
                    }
                    exit(json_encode(array('type'=>'success', 'text'=>'Your cancel request has been done!')));
                }else{
                    exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                }
            }else{
                $uniq_id=time();
    
                $refund_amount=$booking_data->paid_amount*80/100;
    
                $req_data=array(
                    "merchantId"=>$this->merchantId,
                    "merchantTransactionId"=>"TRAN".$uniq_id."_".$user_id,
                    "originalTransactionId"=>$booking_data->tran_id,
                    "amount"=>($refund_amount*100),
                    "callbackUrl"=>base_url('verify-refund-payment'),
                );
    
                $req_base64=base64_encode(json_encode($req_data));
    
                $x_verify=hash("sha256", $req_base64."/pg/v1/refund".$this->saltKey)."###1";
    
                // echo $req_base64;
                // echo "<br>";
                // echo $x_verify;
                // die();
    
                $post_body=json_encode(array('request'=>$req_base64));
    
                $curl = curl_init();
    
                curl_setopt_array($curl, [
                    CURLOPT_URL => $this->curlRefundApiUrl,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $post_body,
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "X-Verify: $x_verify",
                        "accept: application/json",
                    ],
                ]);
    
                $response = curl_exec($curl);
                $err = curl_error($curl);
    
                curl_close($curl);
    
                if($err){
                  echo "cURL Error #:" . $err;
                }else{
                    // echo "<pre>";
                    // echo $response;
                    // die();
    
                    $response=json_decode($response);
                    if($response->success==true && $response->code=="PAYMENT_PENDING"){
                        $cancel_array=array(
                            'cancel_reason'=>$cancel_reason,
                            'cancel_status'=>'canceled',
                            'cancel_amount'=>$refund_amount,
                            'cancel_tran_id'=>$response->data->merchantTransactionId,
                            'cancel_date'=>date('Y-m-d H:i:s')
                        );
                        if($this->current_model->cancel_booking($booking_id, $cancel_array)){
                            if(empty($user_phone)==false && is_numeric($user_phone) && strlen(trim($user_phone))==10){
                                $user_message="Hello ".get_first_name($user_name)."! Your Booking ID: ".$booking_id." in Aaradhaya Travels has been cancelled as per your request. Thanks for booking with us! For more details contact: ".get_phone_list(1);
                                $user_send_phone=$this->send_sms(array($user_phone), $user_message);
                            }
                            if(empty($admin_phone)==false && is_numeric($admin_phone) && strlen(trim($admin_phone))==10){
                                $admin_message="A booking is canceled in Aaradhaya Travels. Name: ".get_first_name($user_name).", Phone: ".$user_phone.", Booking ID: ".$booking_id.". Please check the admin dashboard for more details. Thank you!";
                                $admin_send_phone=$this->send_sms(array($admin_phone), $admin_message);
                            }
                            exit(json_encode(array('type'=>'success', 'text'=>'Your cancel request has been done!')));
                        }else{
                            exit(json_encode(array('type'=>'error', 'text'=>'something went wrong!')));
                        }
                    }
                }
            }
        }
    }
    public function verify_refund_payment(){

    }
    public function check_payment_status(){
        if(isset($_GET['tran_id'])==false || empty($_GET['tran_id'])){
            exit("Please provide Transaction Id");
        }else{
            $tran_id=$_GET['tran_id'];
            $x_verify=hash("sha256", "/pg/v1/status/".$this->merchantId."/".$tran_id.$this->saltKey)."###1";
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $this->curlStatusApiUrl."/".$this->merchantId."/".$tran_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Content-Type: application/json",
                    "X-Verify: $x_verify",
                    "accept: application/json",
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            }else {
                $response=json_decode($response);
                // echo "<pre>";
                // print_r($response);
                if($response->success==1){
                    echo "<div>";
                        echo "<h3>Transaction Id: ".$response->data->merchantTransactionId."</h3>";
                        echo "<h3>Status: ".$response->code."</h3>";
                        echo "<h3>Message: ".$response->message."</h3>";
                        echo "<h3>State: ".$response->data->state."</h3>";
                    echo "</div>";
                }else{
                    exit("something went wrong!");
                }
            }
        }
    }
  








}