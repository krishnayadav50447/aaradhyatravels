<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $all_banner=get_banner_images('home'); ?>
<?php $all_review=get_review('testimonial', 'testimonial'); ?>
<?php $all_faq=get_all_faq(); ?>

<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtVCFvjcSYniAI-VZB9vo2umYggxa5kzI&libraries=places"></script>
<style type="text/css">
    .pac-container{z-index: 9999;}
    #googleMap{height: 300px; margin: 15px 0px;}


    /*read more*/
    .txt_contid {
        font-size : 12px;
    }
    .txt_more {
        display : none;
        font-size : 20px;
    }
    .txt_rdmore{cursor:pointer;}
</style>

<section class="banner_home">
    <div class="banner">
        <div class="banner_img">
            <div class="travel_city"></div>
            <div class="car green_car"><img src="<?php echo base_url(); ?>/viewer_assets/images/green-car.png"></div>     
            <div class="car red_car"><img src="<?php echo base_url(); ?>/viewer_assets/images/red-car.png"></div>
            <div class="car blue_car"><img src="<?php echo base_url(); ?>/viewer_assets/images/blue-car.png"></div>
            <div class="banner_info">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-2 col-lg-8 text-center">
                            <h4>We'll Get You Where You Want To Go!</h4>
                            <p>Local & Outstation Cars available at best price.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="next_prev d-none">
        <div class="bnnrSlide bnnrLeft"><img src="<?php echo base_url(); ?>/viewer_assets/images/chevron-left.png"></div>
        <span class="banner_count">1/3</span>
        <div class="bnnrSlide bnnrRight"><img src="<?php echo base_url(); ?>/viewer_assets/images/chevron-right.png"></div>
    </div>
</section>

<section class="content_sec bg_1 py-lg-3 py-md-3">
	<div class="container mb-lg-3 mb-md-3">
		<div class="row">
			<div class="col-12 mb-2 text-center">
				<h1 class="main_heading mb-0">Rent cabs with best drivers in your city</h1>
			</div>
			
            <div class="col-12 mt-2">
                <div class="trip_grid">
                    <div class="select_trip select_ow" data-modal="#locationModal" data-type="outstation_oneway" onclick="open_location(this)">
                        <div>
                            <h6>Outstation (One Way)</h6>
                            <p class="mb-0">Travel outside your city</p>
                        </div>
                    </div>
                    
                    <div class="select_trip select_rt" data-modal="#locationModal" data-type="outstation_roundtrip" onclick="open_location(this)">
                        <div>
                            <h6>Outstation (Round Trip)</h6>
                            <p class="mb-0">Travel outside your city</p>
                        </div>
                    </div>
                    
                    <div class="select_trip select_at" data-modal="#locationModal" data-type="airport_transfer" onclick="open_location(this)">
                        <div>
                            <h6>Airport Transfers</h6>
                            <p class="mb-0">Pickup and Drop</p>
                        </div>
                    </div>
                    
                    <div class="select_trip select_cp" data-modal="#locationModal" data-type="city_pickupdrop" onclick="open_location(this)">
                        <div>
                            <h6>City Pickup & Drop</h6>
                            <p class="mb-0">Travel within your city</p>
                        </div>
                    </div>
                    
                    <div class="select_trip select_hr" data-modal="#locationModal" data-type="hourly_rental" onclick="open_location(this)">
                        <div>
                            <h6>Hourly Rental</h6>
                            <p class="mb-0">Travel within your city</p>
                        </div>
                    </div>
                </div>
            </div>          
		</div>
	</div>
</section>

<section class="bg-white py-lg-4 py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h5 class="mb-0" style="font-weight: 600;">We do provide cab service for tour packages from source to various destinations across the country. For more details ping us!! <a style="position: relative; top: -2px;" href="https://wa.me/<?php echo str_replace(' ', '', get_phone_list(1)); ?>" target="_blank">&nbsp;<img src="<?php echo base_url();?>/viewer_assets/images/whatsapp.svg"></a></h5>
            </div>
        </div>
    </div>
</section>

<section class="content_sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-lg-0 mb-3">
                <h6 class="sub_heading mb-3 para_yellow">About Us</h6>
                <h3 class="main_heading mb-3">Welcome to Aaradhaya Travels,</h3>
                <p class="para text-justify">your reliable and trusted partner for all your travel needs. We are a leading online cab booking service provider, offering a wide range of comfortable and affordable outstation and local car rental services across India. Our aim is to make travel hassle-free and enjoyable, so you can focus on your journey while leaving the details to us.</p>
                <p class="para text-justify">At Aaradhaya Travels, we understand that travel can be for a variety of reasons, whether it's for tourism, leisure activities like picnics, field trips, and excursions, or for formal requirements like corporate events, meetings, weddings, and more. That's why we offer a range of vehicles for every occasion and every need, whether you require a whole day rental or just a few hours. With our easy online booking system, you can book a cab in just a few clicks and be on your way in no time.</p>
                <a href="<?php echo base_url('about-us');?>" class="button_1"><i class="fas fa-arrow-right fs_12"></i> Read More</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="<?php echo base_url(); ?>/viewer_assets/images/cars.png" alt="About Us" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- <section class="content_sec pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-2 text-center">
                <h4 class="main_heading mb-2">Book in 3 easy steps</h4>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="easy_steps select_o">
                    <span>1</span>
                    <h6 class="mb-0">Give us your trip details</h6>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="easy_steps select_hr">
                    <span>2</span>
                    <h6 class="mb-0">See the wide range of vehicles</h6>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="easy_steps select_at">
                    <span>3</span>
                    <h6 class="mb-0">Get what you book and go places</h6>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="car_dashboard">
    <div class="car_steering"><img id="steer" src="<?php echo base_url(); ?>/viewer_assets/images/steering.png"></div>
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-2 col-6 text-lg-start text-center">
                <h6 class="text-black fs_20 mb-1"><b>50000+</b></h6>
                <p class="mb-0 text-black fs_14">Kms</p>
            </div>
            <div class="col-lg-2 col-6 text-lg-start text-center">
                <h6 class="text-black fs_20 mb-1"><b>100+</b></h6>
                <p class="mb-0 text-black fs_14">Cities</p>
            </div>
            <div class="col-lg-2 col-6 text-lg-start text-center">
                <h6 class="text-black fs_20 mb-1"><b>1000+</b></h6>
                <p class="mb-0 text-black fs_14">Customers</p>
            </div>
            <div class="col-lg-2 col-6 text-lg-start text-center">
                <h6 class="text-black fs_20 mb-1"><b>50+</b></h6>
                <p class="mb-0 text-black fs_14">Luxury Cars</p>
            </div>
            
            
        </div>
    </div>
</section>

<section class="content_sec bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <h6 class="sub_heading mb-3 para_yellow">Why Choose Us?</h6>
                <h3 class="main_heading mb-0">It's All About Quality - Our Difference is Clear</h3>
                <br>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/hidden-charges.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>No Hidden Charges</b></h6>
                        <p class="text-muted">We understand that hidden charges can be really frustrating. That's why we provide transparent billing, with no hidden fees or extra charges. What you see is what you pay — no surprises!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/safe-clean-cars.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>Clean and Safest Cars - TAXI</b></h6>
                        <p class="text-muted">We believe in providing the most hygenic and clean cars to our customers so that your journey is healthy and safe. Our cars are equipped with best in class safety features to make sure you are always safe.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/door-step.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>Doorstep Pickups</b></h6>
                        <p class="text-muted">No more waiting in queues or struggling to find a cab. We offer convenient doorstep pickups that are always on time - so you can travel in comfort at all times!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/top-rated-drives.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>Top Rated Driver-Partners</b></h6>
                        <p class="text-muted">We take safety very seriously. All our driver-partners are background verified and trained to deliver only the highest level of service - making sure you have a safe ride every time!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/one-way.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>One Way Fare</b></h6>
                        <p class="text-muted">We offer one-way fares, so you don't have to worry about paying extra for a return trip. Our one way fare policy ensures that you only pay for the trip and not for the return journey of the driver.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="why_us">
                    <div class="why_img"><img src="<?php echo base_url(); ?>/viewer_assets/images/long-distance.png?v=<?php echo get_version();?>"></div>
                    <div class="why_info">
                        <h6 class="text-dark fs_18"><b>Long Distance - ROUTE</b></h6>
                        <p class="text-muted">Looking for a reliable taxi service to take you from city to city or even state to state? Look no further than us! We offer long distance taxi services that are reliable and efficient. So whether you're looking to travel for business or pleasure, we've got you covered!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content_sec pb-4 bg_4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="">
                    <h6 class="sub_heading mb-3 para_yellow">TESTIMONIAL</h6>
                    <h3 class="main_heading mb-3">The People's Choice!</h3>
                </div>
                <div class="testimonial_slide" id="testimonialSlide">
                    <?php foreach ($all_review as $key => $value) { ?>
                    <div class="testimonial_box">
                        <div class="quotation"><img src="<?php echo base_url('viewer_assets/images/quotation.png'); ?>"></div>
                        <div calss="txt_contid">
                            <?php echo $first_100=substr($value->message, 0, 100); ?>
                            <span class="txt_limit"> ..... </span>
                            <span class="txt_more" style = "font-size : 15px;">
                            <?php $last_other_all=explode($first_100, $value->message); echo $last_other_all[1] ?>
                            </span>
                            <a class="txt_rdmore fs_13">Read More</a>
                        </div>
                        <div class="user_info">
                            <div class="user_img">
                                <img src="<?php echo (empty($value->img)?base_url('uploads/media/review/user.png'):base_url('uploads/media/'.$value->img)); ?>">
                            </div>
                            <div>
                                <h6 class="mb-1"><b><?php echo $value->name; ?></b></h6>
                                <!-- <p class="mb-0">Designation Here</p> -->
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="content_sec bg_2">
    <div class="container">
        <div class="row gx-lg-5 faqRow">
            <div class="col-12">
                <h4 class="main_heading mb-3">FAQ</h4>
                <h5 class="sub_heading mb-3">Answering Your Questions</h5>
            </div>
            <?php foreach ($all_faq as $key => $value) { ?>
                <div class="col-lg-6 faqCol">   
                    <div class="faq_box">
                        <h6 class="faq_question"><?php echo $value->name; ?> <i class="fas fa-angle-down"></i></h6>
                        <div class="faq_answer">
                            <p><?php echo $value->description; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!--All Modals-->
<div class="new_modal" id="locationModal">
    <form class="modal_content w_600 mobile_fix" action="<?php echo base_url('vehicle-list'); ?>" method="get" id="locationForm">
        <!-- <input type="hidden" name="<?php //echo $csrfName; ?>" value="<?php //echo $csrfHash; ?>"> -->

        <!-- from address fileds -->
        <input type="hidden" id="from_area" name="from_area">
        <input type="hidden" id="from_city" name="from_city">
        <input type="hidden" id="from_district" name="from_district">
        <input type="hidden" id="from_state" name="from_state">
        <input type="hidden" id="from_country" name="from_country">
        <input type="hidden" id="from_address" name="from_address">
        <input type="hidden" id="from_postcode" name="from_postcode">

        <!-- to address fileds -->
        <input type="hidden" id="to_area" name="to_area">
        <input type="hidden" id="to_city" name="to_city">
        <input type="hidden" id="to_district" name="to_district">
        <input type="hidden" id="to_state" name="to_state">
        <input type="hidden" id="to_country" name="to_country">
        <input type="hidden" id="to_address" name="to_address">
        <input type="hidden" id="to_postcode" name="to_postcode">

        <div class="modal_head">
            <h6 class="mb-0">Make Your Trip</h6>
            <input type="hidden" name="trip_name">
            <i class="fas fa-times" onclick="close_modal(this)"></i>
        </div>
        <div class="modal_body">
            <div class="row gx-2 form_input">
                <div class="col-12 mb-3 cmnClss city_pickupdrop">
                    <div class="input_flex w-100">
                        <span><img src="<?php echo base_url();?>/viewer_assets/images/city.png"></span>
                        <label class="label_top">City</label>
                        <select name="city">
                            <option selected disabled value="">Select City</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Udaipur">Udaipur</option>
                            <option value="Jaipur">Jaipur</option>
                            <option value="Kota">Kota</option>
                        </select>
                    </div>
                </div>
            	<div class="col-12 mb-3">
            		<div class="input_flex w-100">
            			<span><img src="<?php echo base_url();?>/viewer_assets/images/cabpickup.svg"></span>
            			<label>Pickup Location</label>
                        <input type="text" name="from_pickup" id="from" required>
            		</div>
            	</div>
            	<div class="col-12 mb-3">
            		<div class="input_flex w-100">
            			<span><img src="<?php echo base_url();?>/viewer_assets/images/cabdrop.svg"></span>
            			<label>Drop Location</label>
                        <input type="text" name="to_drop" id="to" required>
            		</div>
            	</div>
            	<div class="col-lg-7 col-7">
            		<div class="input_flex w-100 mb-0">
						<span><img src="<?php echo base_url();?>/viewer_assets/images/date.png"></span>
						<label class="label_top fix_top">Pickup Date</label>
						<input type="date" name="pickup_date" required id="fromDate">
					</div>
            	</div>
                <div class="col-lg-5 col-5">
                    <div class="input_flex w-100 mb-0">
                        <span><img src="<?php echo base_url();?>/viewer_assets/images/clock.png"></span>
                        <label class="label_top">Pickup Time</label>
                        <input type="time" name="pickup_time" required>
                    </div>
                </div>
                <!--<div class="col-lg-7 col-7 mt-3 cmnClss outstation_roundtrip">-->
                <!--    <div class="input_flex w-100 mb-0">-->
                <!--        <span><img src="<?php //echo base_url();?>/viewer_assets/images/date.png"></span>-->
                <!--        <label class="label_top fix_top">Drop Date</label>-->
                <!--        <input type="text" name="drop_date" id="toDate">-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-lg-5 col-5 mt-3 cmnClss outstation_roundtrip">-->
                <!--    <div class="input_flex w-100 mb-0">-->
                <!--        <span><img src="<?php //echo base_url();?>/viewer_assets/images/clock.png"></span>-->
                <!--        <label class="label_top">Drop Time</label>-->
                <!--        <input type="time" name="drop_time">-->
                <!--    </div>-->
                <!--</div>-->
                <!-- <div class="col-12">
                    <div id="googleMap">

                    </div>
                </div>
                <div class="col-12">
                    <div id="output">

                    </div>
                </div> -->
            </div>
        </div>
        <div class="modal_footer">
            <!-- <button type="button" id="calculateRouteId" class="button_1 w-100" onclick="calculateRoute()"><i class="fas fa-map-signs"></i>&nbsp; Calculate</button> -->
            <!-- <button type="submit" id="submitFormId" class="button_1 w-100"><i class="fas fa-arrow-right fs_12" style="display:none;"></i>&nbsp; Continue</button> -->

            <button type="submit" class="button_1 w-100"><i class="fas fa-arrow-right fs_12"></i>&nbsp; Continue</button>
        </div>
    </form>
</div>

<!--All Modals Ends-->
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">-->

<script type="text/javascript" src="<?php echo base_url('viewer_assets/jquery/auto_suggestion.js'); ?>"></script>
<!-- <script type="text/javascript" src="<?php //echo base_url('viewer_assets/jquery/calculate_map.js'); ?>"></script> -->
<!--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>-->
  
<script type="text/javascript">
// var dateToday = new Date();
// var dates = $("#fromDate, #toDate").datepicker({
//     defaultDate: "+1w",
//     changeMonth: true,
//     numberOfMonths: 1,
//     minDate: dateToday,
//     onSelect: function(selectedDate) {
//         var option = this.id == "fromDate" ? "minDate" : "maxDate",
//             instance = $(this).data("datepicker"),
//             date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
//         dates.not(this).datepicker("option", option, date);
//     }
// });


function submitForm(self){
    $(self).closest("form").submit();
}
function open_location(self){
    $("#locationModal").find(".cmnClss").hide();
    $("#locationModal").find(".cmnClss").find("input, select, textarea").val("");
    $("#locationModal").find("."+$(self).data('type')).show();
    $("#locationForm").find("input[name='trip_name']").val($(self).data('type'));
    $("#calculateRouteId").show();
    $("#submitFormId").hide();
    $("#from, #to").removeAttr("placeholder");
    open_modal($(self).data('modal'));
}
function visitor_count(){
    $.ajax({  
        url:base_url+"/visitor-count", 
        method:'POST',
        data:{[csrfName]:csrfHash, ref_id: "<?php echo 'homepage_visitor'; ?>"},
        dataType: 'JSON',
        success:function(data){
            if(data.type=="success"){
                console.log(data.total_visitor);
            }
        }
    });
}
function testimonialSlide(){
    $('#testimonialSlide').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
        {
           breakpoint: 1200,
           settings: { slidesToShow: 3, }
        },
        {
           breakpoint: 992,
           settings: { slidesToShow: 2, }
        },
        {
           breakpoint: 767,
           settings: { slidesToShow: 1, }
        }
       ]
    });
}
$(document).on("click", ".faq_question", function(){
    $(this).closest(".faqCol").siblings(".faqCol").find("i").removeClass("ri");
    $(this).find("i").toggleClass("ri");
    $(this).closest(".faqCol").siblings(".faqCol").find(".faq_answer").slideUp();
    $(this).next(".faq_answer").slideToggle();
    $(this).closest(".faqCol").siblings(".faqCol").find(".faq_question").removeClass("active");
    $(this).toggleClass("active");
});
window.onscroll = function (){
    scrollRotate();
}
function scrollRotate() {
    let image = document.getElementById("steer");
    image.style.transform = "rotate(" + window.pageYOffset/7 + "deg)";
}
function off_prev_date(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10){
        month = '0' + month.toString();
    }
    if(day < 10){
        day = '0' + day.toString();
    }
    var minDate= year + '-' + month + '-' + day;

    $('input[type="date"]').attr('min', minDate);
}
$(document).ready(function(){
    visitor_count();
    testimonialSlide();
    off_prev_date();
    $("#from, #to").removeAttr("placeholder");
});

//readmore
$(document).on("click", ".txt_rdmore", function(){
    $(this).siblings('.txt_limit').toggle();
    if($(this).text() == 'Read More'){
        $(this).text( 'Read Less' );
        $(this).prev().toggle();
    }else{
        $(this).text( 'Read More' );
        $(this).prev().toggle();
    }
});
</script>