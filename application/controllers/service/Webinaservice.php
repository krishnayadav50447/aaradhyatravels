<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Webinaservice extends CI_Controller {
  public function __construct(){
    parent::__construct();
    // if($this->session->has_userdata('admin_id')==FALSE){
    //     redirect(base_url('admin'));
    // }
    $this->load->library('form_validation');
    $this->load->model('service/Webinaservice_model', 'current_model');
  }
  public function get_img_compressor(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
         CURLOPT_URL => base_api("get-img-compressor"),
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => "c_base_url=".base_url()."&reg_key=".base_reg_key()."&reg_id=".base_reg_id(),
         CURLOPT_HTTPHEADER => array(
           "cache-control: no-cache",
           "content-type: application/x-www-form-urlencoded",
           "postman-token: b2cb8379-148e-b9c1-e7e8-ed19720e2336"
         ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
         echo "cURL Error #:" . $err;
      }else {
        // $result=json_decode($response);
        // exit(json_encode(array('type'=>$result->type, 'data'=>$result->data)));
        exit($response);
      }
  }

  public function get_uploader(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
         CURLOPT_URL => base_api("get-uploader"),
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS => "c_base_url=".base_url()."&reg_key=".base_reg_key()."&reg_id=".base_reg_id()."&c_multi_select=false",
         CURLOPT_HTTPHEADER => array(
             "cache-control: no-cache",
             "content-type: application/x-www-form-urlencoded",
             "postman-token: b2cb8379-148e-b9c1-e7e8-ed19720e2336"
         ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
         echo "cURL Error #:" . $err;
      }else {
          // $result=json_decode($response);
          // exit(json_encode(array('type'=>$result->type, 'data'=>$result->data)));
          exit($response);
      }
  }
  public function uploader_upload(){
      // <input type="hidden" name="_uploader_files">
      // <input type="text" class="_UploadLink" onclick="_wtUploaderOpenModal()" placeholder="Click to Upload" readonly>
      if (empty($_FILES) || $_FILES['file']['error']) {
        die('{"OK": 0, "info": "Failed to move uploaded file."}');
      }

      $folder='./uploads/uploader/';
      if(!is_dir($folder)){ mkdir($folder, 0755, true); }

      $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
      $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
       
      $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
      $filePath = "$folder$fileName";

      //if file name with additional field
      $fileName = isset($_REQUEST["newFileName"]) ? $_REQUEST["newFileName"] : $fileName;
      $extensionArr=explode(".", $_REQUEST["name"]);
      $extension=end($extensionArr);

      $filePath = "$folder$fileName.$extension";

      // Open temp file
      $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
      if($out){
        // Read binary input stream and append it to temp file
        $in = @fopen($_FILES['file']['tmp_name'], "rb");
       
        if ($in){
          while ($buff = fread($in, 4096)){
            fwrite($out, $buff);
          }
        }else{
          die('{"OK": 0, "info": "Failed to open input stream."}');
        }
       
        @fclose($in);
        @fclose($out);
       
        @unlink($_FILES['file']['tmp_name']);
      }else{
        die('{"OK": 0, "info": "Failed to open output stream."}');
      }
       
       
      // Check if file has been uploaded
      if (!$chunks || $chunk == $chunks - 1) {
        // Strip the temp .part suffix off
        rename("{$filePath}.part", $filePath);
      }
       
      die('{"OK": 1, "info": "Upload successful."}');
  }





  public function get_countries(){
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => base_api("get-countries?domain=".base_url()),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: eb45e194-1092-23fc-38be-2e403f3ddd44"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);
      if ($err) {
         echo "cURL Error #:" . $err;
      }else {
        // $result=json_decode($response);
        // exit(json_encode(array('type'=>$result->type, 'data'=>$result->data)));
        exit($response);
      }
  }
  public function get_states(){
      $c_id=$_GET['c_id'];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => base_api("get-states?domain=".base_url()."&c_id=".$c_id),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: eb45e194-1092-23fc-38be-2e403f3ddd44"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      if ($err) {
         echo "cURL Error #:" . $err;
      }else {
        // $result=json_decode($response);
        // exit(json_encode(array('type'=>$result->type, 'data'=>$result->data)));
        exit($response);
      }
  }
  public function get_cities(){
      $c_id=$_GET['c_id'];
      $s_id=$_GET['s_id'];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => base_api("get-cities?domain=".base_url()."&c_id=".$c_id."&s_id=".$s_id),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: eb45e194-1092-23fc-38be-2e403f3ddd44"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      if ($err) {
         echo "cURL Error #:" . $err;
      }else {
        // $result=json_decode($response);
        // exit(json_encode(array('type'=>$result->type, 'data'=>$result->data)));
        exit($response);
      }
  }




}
