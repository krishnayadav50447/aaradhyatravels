<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

// $time=time();
// echo $time."<br>".sha1($time);
// die();

function function_name(){
	$ci=& get_instance();
	return $ci->db->where('condition')->get('table_name')->row();
}
function get_version(){
    return '1.2.2';
}
function base_api($extra=null){
    // $api="http://localhost/webinaServiceApi/";
    $api="https://www.webinatech.in/webinaServiceApi/";
    if(empty($extra)){
        return $api;
    }else{
        return $api.trim($extra, '/');
    }
}
function base_reg_id(){
	return "1680331716";
}
function base_reg_key(){
	return "8b9a1bfc64ecad499a05670b33072cca4674afb1";
}
function site_title(){
	return "Aaradhaya Travels";
}
function get_clean_txt($str){
	$str=preg_replace('/[[:^print:]]/', '', $str);
	return strip_tags(str_replace ("\n", " ", trim($str)));
}
function get_price_format($price){
	if(empty($price)){
		return 0;
	}else{
		return number_format((float)$price, 2, '.', '')*1;
	}
}
function get_offer($price, $sell_price){
	return get_price_format(($price-$sell_price)*100/$sell_price);
}
function number_in_word($number=null){
	if(empty($number)){
		return "";
	}else{
		$no = floor($number);
		$point = round($number - $no, 2) * 100;
		$hundred = null;
		$digits_1 = strlen($no);
		$i = 0;
		$str = array();
		$words = array('0' => '', '1' => 'one', '2' => 'two',
		'3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
		'7' => 'seven', '8' => 'eight', '9' => 'nine',
		'10' => 'ten', '11' => 'eleven', '12' => 'twelve',
		'13' => 'thirteen', '14' => 'fourteen',
		'15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
		'18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
		'30' => 'thirty', '40' => 'forty', '50' => 'fifty',
		'60' => 'sixty', '70' => 'seventy',
		'80' => 'eighty', '90' => 'ninety');
		$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
		while ($i < $digits_1) {
		 $divider = ($i == 2) ? 10 : 100;
		 $number = floor($no % $divider);
		 $no = floor($no / $divider);
		 $i += ($divider == 10) ? 1 : 2;
		 if ($number) {
		    $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
		    $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		    $str [] = ($number < 21) ? $words[$number] .
		        " " . $digits[$counter] . $plural . " " . $hundred
		        :
		        $words[floor($number / 10) * 10]
		        . " " . $words[$number % 10] . " "
		        . $digits[$counter] . $plural . " " . $hundred;
		 } else $str[] = null;
		}
		$str = array_reverse($str);
		$result = implode('', $str);
		$points = ($point) ?
		"." . $words[$point / 10] . " " . 
		      $words[$point = $point % 10] : '';
		return $result . "rupees  " . $points . " paise";
	}
}
function clean_string($string) {
   return trim(strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $string))), "-");
}
function get_full_url(){
	$parameters=explode("?", $_SERVER['REQUEST_URI']);
	if(count($parameters)>1){
		return current_url()."?".$parameters[1];
	}else{
		return current_url();
	}
}
function default_meta_des(){
	return "Book Your Car";
}
function default_meta_key(){
	return "Book Your Car";
}
function default_og_img(){
	return base_url('viewer_assets/images/logo.png');
}
function get_first_name($full_name){
	$name_arr=explode(' ', $full_name);
	return $name_arr[0];
}
function get_email_list(){
	$ci=& get_instance();
	return $ci->db->get('webina_email_list')->result();
}
function get_email_host(){
	return "smtp.hostinger.com";
}
function get_email_name($name){
	if(empty($name)){
		return "info@aaradhayatravels.com";
	}else{
		return $name."@aaradhayatravels.com";
	}
}
function get_email_pass($name){
	switch ($name) {
		case 'service':
			return "Service@122@!@#%^&";
			break;
			
		case 'noreply':
			return "Noreply@122@!@#%^&";
			break;

		case 'info':
			return "Info@122@!@#%^&";
			break;
		
		default:
			return "";
			break;
	}
}
function get_gmail_host(){
	return "smtp.google.com";
}
function get_gmail_name($name){
	if(empty($name)){
		return "aaradhayatravelskota@gmail.com";
	}else{
		return $name."@gmail.com";
	}
}
function get_gmail_pass($name){
	switch ($name) {
		case 'sample':
			return "Sample@!#123";
			break;
		
		default:
			return "";
			break;
	}
}
function get_social_page($for){
	switch ($for) {
		case 'facebook':
			return "https://www.facebook.com/";
			break;
		case 'linkedin':
			return "https://www.linkedin.com/";
			break;
		case 'twitter':
			return "https://twitter.com/";
			break;
		case 'youtube':
			return "https://youtube.com/";
			break;
		case 'instagram':
			return "https://instagram.com/";
			break;
		
		default:
			return "https://www.google.com";
			break;
	}
}
function get_phone_list($i){
	switch ($i) {
		case '1':
			return "+91 9928761299";
			break;

		case '2':
			return "+91 9928761299";
			break;
		
		default:
			return "";
			break;
	}
}
function get_address_list($i){
	switch ($i) {
		case 'footer_1':
			return "Shrinath Puram, Kota, Rajasthan 324010";
			break;

		case 'footer_2':
			return "Shrinath Puram, Kota, Rajasthan 324010";
			break;

		case 'contact':
			return "Shrinath Puram, Kota, Rajasthan 324010";
			break;
		
		default:
			return "";
			break;
	}
}
function get_page_list(){
	$all_page=array(
		'home'=>'Home',
		'about-us'=>'About Us',
		'contact-us'=>'Contact Us',
	);
	return $all_page;
}
function get_banner_images($page){
	$ci=& get_instance();
	return $ci->db->where('status', '1')->where('page', $page)->order_by('position', 'asc')->get('webina_banner')->result();
}
function get_single_banner_images($page){
	$ci=& get_instance();
	$temp=$ci->db->where('status', '1')->where('page', $page)->limit('1')->get('webina_banner');
	if($temp->num_rows()>0){
	    return $temp->row();
	}else{
	    return array();
	}
}
function get_all_faq(){
    $ci=& get_instance();
	return $ci->db->get('webina_faq')->result();
}
function get_review($ref_name, $ref_id, $length=10){
	$ci=& get_instance();
	return $ci->db->where(array('ref_name'=>$ref_name, 'ref_id'=>$ref_id, 'status'=>1))->order_by('position', 'asc')->get('webina_review')->result();
}
function get_youtube_vdo_src($url){
    preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);
    return "//www.youtube.com/embed/".$results[6];
}
function convertYoutube($string) {
    return preg_replace(
        "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        $string
    );
}
function time_dif_cal($start, $end) {
	$start_datetime = new DateTime($start); 
	$diff = $start_datetime->diff(new DateTime($end)); 
	 
	$data['days']=$diff->days.' Days total'; 
	$data['y']=$diff->y.' Years'; 
	$data['m']=$diff->m.' Months'; 
	$data['d']=$diff->d.' Days'; 
	$data['h']=$diff->h.' Hours'; 
	$data['i']=$diff->i.' Minutes'; 
	$data['s']=$diff->s.' Seconds';
	return $data;
}
function get_sort_name($name){
    $name_arr=explode(" ", $name);
    return $name_arr[0];
}

