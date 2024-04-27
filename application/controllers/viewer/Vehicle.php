<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {
    public function __construct(){
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model('viewer/vehicle_model', 'current_model');
    }
    /***********************CAPCHA GENERATE DATA********************/
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function contact_reload_captcha(){
        $captcha['word']=$this->generateRandomString(6);
        $captcha['image']='<input type="text" readonly value="'.$captcha['word'].'">';
        $this->session->set_tempdata('contact_captcha', $captcha['word'], 600);
        echo $captcha['image']."<span onclick='reload_captcha()' class='reload_icn'>&#8635;</span>";
    }
    /***********************CAPCHA GENERATE DATA********************/

    public function vehicle_list(){
        $all_param=$_GET;
        // echo "<pre>";
        // print_r($all_param);
        // die();
        if(empty($all_param)){
            exit("something went wrong!");
        }
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('vehicle');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $data['all_param']=$all_param;
        $this->load->view('viewer/vehicle_list', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function get_all_vehicle(){
        $trip_name=$this->input->post("trip_name");
        
        $total_km_txt=$this->input->post("total_km_txt");
        $total_km_arr=explode(" km", str_replace(",", "", $total_km_txt));
        $total_km=$total_km_arr[0];

        $total_time_txt=$this->input->post("total_time_txt");

        $all_vehicle=$this->current_model->get_all_vehicle($trip_name, $total_km);
        // print_r($all_vehicle);
        // echo $this->db->last_query();
        // die();
        $list="";
        foreach ($all_vehicle as $key => $value) {
            if($trip_name=="hourly_rental"){
                if($total_km<=$value->min_km){
                    $show_list=true;
                }else{
                    $show_list=false;
                }
                $cost=get_price_format($value->fare);
                $show_cost='<tr>
                    <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                    <td>
                        <div class="package_box">
                            <div class="cmnHrPgk showing_'.get_price_format($value->min_hr).'hrs'.get_price_format($value->min_km).'kms">'.get_price_format($value->min_hr).'hrs & '.get_price_format($value->min_km).'kms - &#8377;'.$cost.'</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                    <td>- &#8377;'.get_price_format($value->extra_km).'/km after '.get_price_format($value->min_km).' km</td>
                </tr>
                <tr style="display:none;">
                    <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                    <td>- &#8377;'.get_price_format($value->extra_hr).'/km</td>
                </tr>
                ';
            }else{
                if($trip_name=="city_pickupdrop"){
                    $show_list=true;
                    if($value->min_km>=$total_km){
                        $cost=get_price_format($value->fare);
                    }else{
                        $cost=get_price_format(($value->fare+(($total_km-$value->min_km)*$value->extra_km)));
                    }
                    $show_cost='<tr>
                        <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                        <td>- &#8377;'.get_price_format($value->fare).' in first '.get_price_format($value->min_km).' km</td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                        <td>- &#8377;'.get_price_format($value->extra_km).'/km after '.get_price_format($value->min_km).' km</td>
                    </tr>
                    <tr style="display:none;">
                        <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                        <td>- &#8377;'.get_price_format($value->extra_hr).'/km</td>
                    </tr>';
                }else{
                    if($trip_name=="outstation_roundtrip"){
                        $show_list=true;
                        $total_full_km=$total_km*2;
                        if($total_full_km>=$value->min_km){
                            $cost=get_price_format($value->fare*$total_full_km);
                        }else{
                            $cost=get_price_format($value->fare*$value->min_km);
                        }
                        $show_cost='<tr>
                            <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                            <td>- &#8377;'.get_price_format($value->fare).' in first '.get_price_format($value->min_km).' km</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                            <td>- &#8377;'.get_price_format($value->extra_km).'/km after '.get_price_format($value->min_km).' km</td>
                        </tr>
                        <tr style="display:none;">
                            <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                            <td>- &#8377;'.get_price_format($value->extra_hr).'/km</td>
                        </tr>';
                    }else{
                        $show_list=true;
                        $cost=get_price_format(($value->fare*$total_km));
                        $show_cost='<tr>
                            <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                            <td>- &#8377;'.get_price_format($value->fare).'/km</td>
                        </tr>
                        <tr>
                            <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                            <td>- &#8377;'.get_price_format($value->extra_km).'/km after '.get_price_format($total_km).' km</td>
                        </tr>
                        <tr style="display:none;">
                            <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                            <td>- &#8377;'.get_price_format($value->extra_hr).'/km</td>
                        </tr>';
                    }
                }
            }
            if($show_list){
                $list.='<a href="javascript:void(0)" data-id="'.$value->id.'" data-service_id="'.$value->service_id.'" onclick="book_now(this)" class="car_box">
    
                    <div class="carsel">
                        <div class="car_img">
                            <img src="'.base_url('uploads/vehicle/'.$value->main_img).'" alt="'.$value->name.'">
                        </div>
                    </div>
                    <div class="car_info">
                        <div class="car_title_flex">
                            <div class="car_title">
                                <h5 class="mb-2">'.$value->brand.', '.$value->name.'</h5>
                                <ul>
                                    <li>'.$value->type.'</li>
                                    <li class="fs_18">&bull;</li>
                                    <li>'.$value->ac_nonac.'</li>
                                    <li class="fs_18">&bull;</li>
                                    <li>'.$value->seater.' Seater</li>
                                </ul>
                            </div>
                            <div class="ratings d-none">
                                <h6>4.2</h6>
                                <small>217 ratings</small>
                            </div>
                        </div>
                        <div class="car_features mt-3">
                            <h6><b>Specious Car</b></h6>
                            <table>
                                '.$show_cost.'
                                <tr>
                                    <td><i class="fa-solid fa-gas-pump"></i> Fuel Type</td>
                                    <td>- '.$value->fuel_type.'</td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-xmark"></i> Cancellation</td>
                                    <td>- Free Cancellation 6 hours before journey</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="car_fare d-grid">
                        <div class="mb-2">
                            <small class="text-danger d-none">'.get_offer($cost, $cost).'% off</small>
                            <h6 class="mb-0"><small><strike class="d-none">&#8377;'.$cost.'</strike> &nbsp;</small>&#8377;'.$cost.'</h6>
                            <h6 class="mb-0 fs_14 d-lg-block d-md-block d-none" style="line-height: 18px;"><small class="text-success">Pay just &#8377;'.get_price_format(($cost*30/100)).' to book, pay rest later</small></h6>
                        </div>
                        <button class="button_4 mb-2 mt-auto ms-auto">Book Now</button>
                    </div>
                    <div class="ratings w-100 d-none">
                        <h6>4.2</h6>
                        <small>217 ratings</small>
                    </div>
    
                </a>';
            }
        }
        if($list==""){
            $list="No vehicle found!";
        }
        if($trip_name=="hourly_rental"){
            $hrPkg='';
            $temp_arr=array();
            foreach ($all_vehicle as $key => $value) {
                $cls='showing_'.get_price_format($value->min_hr).'hrs'.get_price_format($value->min_km).'kms';
                if(in_array($cls, $temp_arr)==false){
                    $temp_arr[]=$cls;
                    $hrPkg.='<div class="package_box_item" data-class="'.$cls.'" onclick="select_hr_pkg(this)">'.get_price_format($value->min_hr).'hrs & '.get_price_format($value->min_km).'kms</div>';
                }
            }
            $pre_html='<div class="hrly_package">
                <h6 class="mt-3 mb-2"><small>Package</small></h6>
                <div class="package_box">
                    '.$hrPkg.'
                </div>
            </div>';
        }else{
            $pre_html="";
        }
        exit(json_encode(array('type'=>'success', 'list'=>$pre_html.$list)));

    }
    public function vehicle_details(){
        $all_param=$_GET;
        // echo "<pre>";
        // print_r($all_param);
        // die();
        if(empty($all_param)){
            exit("something went wrong!");
        }
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('vehicle');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $data['all_param']=$all_param;
        $this->load->view('viewer/vehicle_details', $data);
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    public function get_vehicle_for_details(){
        $vehicle_id=$this->input->post("vehicle_id");
        $service_id=$this->input->post("service_id");
        $pickup_date=$this->input->post("pickup_date");
        $pickup_time=$this->input->post("pickup_time");
        
        if(empty($vehicle_id)){
            exit("something went wrong!");
        }
        $trip_name=$this->input->post("trip_name");
        
        $total_km_txt=$this->input->post("total_km_txt");
        $total_km_arr=explode(" km", str_replace(",", "", $total_km_txt));
        $total_km=$total_km_arr[0];

        $total_time_txt=$this->input->post("total_time_txt");

        $vehicle=$this->current_model->get_vehicle_for_details($trip_name, $total_km, $vehicle_id, $service_id);
        
        if($trip_name=="hourly_rental"){
            if($total_km<=$vehicle->min_km){
                $show_list=true;
            }else{
                $show_list=false;
            }
            $cost=get_price_format($vehicle->fare);
            $show_cost='<tr>
                <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                <td>
                    <div class="package_box">
                        <div class="cmnHrPgk showing_'.get_price_format($vehicle->min_hr).'hrs'.get_price_format($vehicle->min_km).'kms">'.get_price_format($vehicle->min_hr).'hrs & '.get_price_format($vehicle->min_km).'kms - &#8377;'.$cost.'</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                <td>- &#8377;'.get_price_format($vehicle->extra_km).'/km after '.get_price_format($vehicle->min_km).' km</td>
            </tr>
            <tr style="display:none;">
                <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                <td>- &#8377;'.get_price_format($vehicle->extra_hr).'/km</td>
            </tr>
            ';
        }else{
            if($trip_name=="city_pickupdrop"){
                $show_list=true;
                if($vehicle->min_km>=$total_km){
                    $cost=get_price_format($vehicle->fare);
                }else{
                    $cost=get_price_format(($vehicle->fare+(($total_km-$vehicle->min_km)*$vehicle->extra_km)));
                }
                $show_cost='<tr>
                    <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                    <td>- &#8377;'.get_price_format($vehicle->fare).' in first '.get_price_format($vehicle->min_km).' km</td>
                </tr>
                <tr>
                    <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                    <td>- &#8377;'.get_price_format($vehicle->extra_km).'/km after '.get_price_format($vehicle->min_km).' km</td>
                </tr>
                <tr style="display:none;">
                    <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                    <td>- &#8377;'.get_price_format($vehicle->extra_hr).'/km</td>
                </tr>';
            }else{
                if($trip_name=="outstation_roundtrip"){
                    $show_list=true;
                    $total_km=$total_km*2;
                    if($total_km>=$vehicle->min_km){
                        $cost=get_price_format($vehicle->fare*$total_km);
                    }else{
                        $cost=get_price_format($vehicle->fare*$vehicle->min_km);
                    }
                    $show_cost='<tr>
                        <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->fare).' in first '.get_price_format($vehicle->min_km).' km</td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->extra_km).'/km after '.get_price_format($vehicle->min_km).' km</td>
                    </tr>
                    <tr style="display:none;">
                        <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->extra_hr).'/km</td>
                    </tr>';
                }else{
                    $show_list=true;
                    $cost=get_price_format(($vehicle->fare*$total_km));
                    $show_cost='<tr>
                        <td><i class="fa-solid fa-map-pin"></i> Base Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->fare).'/km</td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-map-pin"></i> Extra Km Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->extra_km).'/km after '.get_price_format($total_km).' km</td>
                    </tr>
                    <tr style="display:none;">
                        <td><i class="fa-solid fa-map-pin"></i> Extra Hour Fare</td>
                        <td>- &#8377;'.get_price_format($vehicle->extra_hr).'/km</td>
                    </tr>';
                }
            }
        }
        
        if($show_list){
        $details='
            <div class="car_list mb-lg-2 mb-md-2 mb-0" style="min-height: inherit;">
                <div class="car_box">
                    <div class="carsel">
                        <div class="car_img">
                            <img src="'.base_url('uploads/vehicle/'.$vehicle->main_img).'" alt="'.$vehicle->name.'">
                        </div>
                    </div>
                    <div class="car_info flex-fill">
                        <div class="car_title_flex mb-lg-0 mb-md-0 mb-3">
                            <div class="car_title">
                                <h5 class="mb-2">'.$vehicle->brand.', '.$vehicle->name.'</h5>
                                <ul>
                                    <li>'.$vehicle->type.'</li>
                                    <li class="fs_18">&bull;</li>
                                    <li>'.$vehicle->ac_nonac.'</li>
                                    <li class="fs_18">&bull;</li>
                                    <li>'.$vehicle->seater.' Seater</li>
                                </ul>
                            </div>
                            <div class="ratings d-none">
                                <h6>4.2</h6>
                                <small>217 ratings</small>
                            </div>
                        </div>
                        <div class="car_features mt-3">
                            <h6><b>Specious Car</b></h6>
                            <table>
                                '.$show_cost.'
                                <tr>
                                    <td><i class="fa-solid fa-gas-pump"></i> Fuel Type</td>
                                    <td>- '.$vehicle->fuel_type.'</td>
                                </tr>
                                <tr>
                                    <td><i class="fa-solid fa-xmark"></i> Cancellation</td>
                                    <td>- Free Cancellation 6 hours before journey</td>
                                </tr>
                            </table>
                        </div>
                    </div>
    
                </div>
            </div>
    
            <div class="car_box d-block mb-lg-2 mb-md-2 mb-0" style="background-color: #f0f3f6;">
                <h6 class="small_heading mb-2"><b>Vehicle & Driver details</b></h6>
                <p class="mb-0">You will receive driver and vehicle details 1 hour before your journey.</p>
            </div>
    
            <div class="include_exclude mb-lg-2 mb-md-2 mb-1">
                <div class="ie_50">
                    <h4 class="small_heading mb-3"><i class="fas fa-check text-success"></i>&nbsp; <b>Inclusions</b> (Included in the Price)</h4>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>'.$total_km.' Kms Included.</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Only one Pickup and Drop</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Driver Allowance</p>
                    </div>
                </div>
                <div class="ie_50 ps-lg-4 ps-md-4">
                    <h4 class="small_heading mb-3"><i class="fas fa-times text-danger"></i>&nbsp; <b>Exclusions</b> (Extra Charges)</h4>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Night Charges</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Parking Charges</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>State Tax</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Toll Charges</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Waiting Charges after 30 mins, Rs.2/min.</p>
                    </div>
                    <div class="icon_text">
                        <span>&bull;</span>
                        <p>Fare beyond '.$total_km.'km is Rs.'.get_price_format($vehicle->extra_km).'/km</p>
                    </div>
                </div>
            </div>
    
            <div class="include_exclude mb-lg-2 mb-md-2 mb-1">
                <div class="ie_50 w-100 border-end-0">
                    <h4 class="small_heading mb-3"><i class="fa-solid fa-user-shield"></i>&nbsp; <b>Safety</b> (Your safety is our top priority)</h4>
                    <div class="row g-0">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <div class="icon_text align-items-center">
                                <img src="'.base_url().'/viewer_assets/images/driverWithMask.svg">
                                <p>Drivers with Masks</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <div class="icon_text align-items-center">
                                <img src="'.base_url().'/viewer_assets/images/handSanitizer.svg">
                                <p>Hand Sanitizers</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="icon_text align-items-center">
                                <img src="'.base_url().'/viewer_assets/images/sanitizedVehicle.svg">
                                <p>Sanitized Vehicles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="include_exclude mb-lg-2 mb-md-2 mb-1">
                <div class="ie_50 w-100 border-end-0">
                    <h4 class="small_heading mb-3"><i class="fa-solid fa-circle-info"></i>&nbsp; <b>General Information</b></h4>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Fare</b></h6>
                        <p>Charges for extra Kms/extra hours can be paid online or to driver in cash</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Less Usage</b></h6>
                        <p>No refund for usage lesser than 297 Kms</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Smoking/Alcohol</b></h6>
                        <p>Smoking and consumption of alcohol not allowed</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Pets</b></h6>
                        <p>Pets/animals not allowed inside the vehicle</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Cab Category</b></h6>
                        <p>The booking will be for cab type HATCHBACK OR SEDAN OR SUV and we do not commit on providing the preferred cab model UNLESS OTHERWISE MENTIONED.</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Hilly Regions</b></h6>
                        <p>AC will be switched off in hilly areas</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Luggage Policy</b></h6>
                        <p>HATCHBACK has space for 1 Luggage Bag. In case the car happens to be CNG, the luggage space will be lesser. However, depending on the number of passengers, luggage can be adjusted in seating area with driver consent.</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Stops</b></h6>
                        <p>This is a point-to-point booking and only one stop for meals is included.</p>
                    </div>
                    <div class="mb-3">
                        <h6 class="fs_13 mb-0"><b>Delays</b></h6>
                        <p>Due to traffic or any other unavoidable reason, pickup may be delayed by 30 mins.</p>
                    </div>
                </div>
            </div>';
    
            if($this->session->has_userdata('user_id')==FALSE){
                $user_details_form='
                <div class="input_flex w-100">
                    <span><img src="'.base_url('viewer_assets/images/name.svg').'"></span>
                    <label>Full Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input_flex w-100">
                    <span><img src="'.base_url('viewer_assets/images/email.svg').'"></span>
                    <label>Email Address *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input_flex w-100">
                    <span><img src="'.base_url('viewer_assets/images/phone.svg').'"></span>
                    <label>Mobile Number *</label>
                    <input type="number" id="phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" name="phone" required>
                </div>';
            }else{
                $user_details_form='';
            }

            $full_payment=$cost;
            $part_payment=get_price_format(($cost*30/100));
            
            $before_6hr=date(date('Y-m-d H:i:s', strtotime($pickup_date.' '.$pickup_time.'-6 hours')));
    
            $pay_details='
            <div class="free_cancel">
                <i class="fas fa-check"></i>
                <p>&nbsp; Free cancellation before '.date('D jS M, Y', strtotime($before_6hr)).' '.date('h:i a', strtotime($before_6hr)).'</p>
            </div>
            <div class="pay_box">
                '.$user_details_form.'
                <div class="pay_now">
                    <button type="button" class="btn pay_btn">PAY &#8377;<span class="payNow">'.$part_payment.'</span> NOW</button>
                </div>
                <div class="pay_now pay_now_fixed">
                    <button type="button" class="btn pay_btn">PAY &#8377;<span class="payNow">'.$part_payment.'</span> NOW</button>
                </div>
    
                <div class="pay_info">
                    <label class="choose_pay checked">
                        <input type="radio" checked name="pay_amount" value="'.$part_payment.'">
                        <h6>Make part payment now<br><small>Pay rest later to the driver</small></h6>
                        <h6 class="price">&#8377;'.$part_payment.'</h6>
                    </label>
                    <label class="choose_pay align-items-center">
                        <input type="radio" name="pay_amount" value="'.$full_payment.'">
                        <h6>Make full payment now</h6>
                        <h6 class="price">&#8377;'.$full_payment.'</h6>
                    </label>
                    <hr class="mb-0 mt-0">
                    <div class="choose_pay">
                        <h6>Total Amount<br><small>inc. of tolls and taxes</small></h6>
                        <h6 class="price fs_24">&#8377;'.$full_payment.'</h6>
                    </div>
                    <hr class="mb-0 mt-0">
                    <div class="choose_pay py-2">
                        <p class="fs_13 mb-0"><small>Cancellation charges will apply if the trip is cancelled within 6 hours of the pick-up time. Cancellation charges is 20% of the booked amount.</small></p>
                    </div>
                </div>
            </div>';
        }

        exit(json_encode(array('type'=>'success', 'details'=>$details, 'pay_details'=>$pay_details, 'part_amount'=>$part_payment, 'full_amount'=>$full_payment)));

    }



    public function checkout(){
        $data['session_data']=$this->session->all_userdata();
        $data['csrfHash']=$this->security->get_csrf_hash();
        $data['csrfName']=$this->security->get_csrf_token_name();
        $page_data=$this->current_model->get_page_data('vehicle');
        $header_data['title']=$page_data['name'];
        $header_data['meta_des']=$page_data['meta_des'];
        $header_data['meta_key']=$page_data['meta_key'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $header_data['meta_og_img']=base_url('uploads/media/').$page_data['img'];
        $this->load->view('viewer_includes/header', $header_data);
        $this->load->view('viewer_includes/navigation', $data);
        $this->load->view('viewer/checkout');
        $this->load->view('viewer_includes/footer');
        $this->load->view('viewer_includes/footer_bottom');
    }
    
    









}