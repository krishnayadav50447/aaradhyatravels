<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo "<pre>"; print_r($all_vehicle); die(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtVCFvjcSYniAI-VZB9vo2umYggxa5kzI&libraries=places"></script>

<section class="banner_other banner_form" id="bannerForm">
    <div class="banner">
        <div class="banner_img">
            <div class="banner_info">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <form class="modal_content w_600 mobile_fix" action="<?php echo base_url('vehicle-list'); ?>" method="get" id="locationForm">
                                <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                                <input type="hidden" name="vehicle_id" value="">
                                <input type="hidden" name="service_id" value="">
                                <div class="search_sec">
                                    <div class="search_flex">
                                        <div class="input_flex">
                                            <span><img src="<?php echo base_url(); ?>/viewer_assets/images/city.png"></span>
                                            <label class="label_top">Travel Type</label>
                                            <select name="trip_name">
                                                <option value="outstation_oneway" <?php if($all_param['trip_name']=="outstation_oneway"){echo "selected";} ?>>Outstation (One Way)</option>
                                                <option value="outstation_roundtrip" <?php if($all_param['trip_name']=="outstation_roundtrip"){echo "selected";} ?>>Outstation (Round Trip)</option>
                                                <option value="hourly_rental" <?php if($all_param['trip_name']=="hourly_rental"){echo "selected";} ?>>Hourly Rental</option>
                                                <option value="airport_transfer" <?php if($all_param['trip_name']=="airport_transfer"){echo "selected";} ?>>Airport Transfers</option>
                                                <option value="city_pickupdrop" <?php if($all_param['trip_name']=="city_pickupdrop"){echo "selected";} ?>>City Pickup & Drop</option>
                                            </select>
                                        </div>

                                        <div class="input_flex cmnClss city_pickupdrop"<?php if((array_key_exists('city', $all_param)==false || empty($all_param['city']))){echo " style='display:none;'";} ?>>
                                            <span><img src="<?php echo base_url(); ?>/viewer_assets/images/city.png"></span>
                                            <label class="label_top">Select City</label>
                                            <select name="city">
                                                <option selected disabled value="">Select City</option>
                                                <option value="Delhi" <?php if(array_key_exists("city", $all_param) && $all_param['city']=="Delhi"){echo "selected";} ?>>Delhi</option>
                                                <option value="Ahmedabad" <?php if(array_key_exists("city", $all_param) && $all_param['city']=="Ahmedabad"){echo "selected";} ?>>Ahmedabad</option>
                                                <option value="Udaipur" <?php if(array_key_exists("city", $all_param) && $all_param['city']=="Udaipur"){echo "selected";} ?>>Udaipur</option>
                                                <option value="Jaipur" <?php if(array_key_exists("city", $all_param) && $all_param['city']=="Jaipur"){echo "selected";} ?>>Jaipur</option>
                                                <option value="Kota" <?php if(array_key_exists("city", $all_param) && $all_param['city']=="Kota"){echo "selected";} ?>>Kota</option>
                                            </select>
                                        </div>

                                        <!-- from address fileds -->
                                        <input type="hidden" id="from_area" name="from_area" value="<?php echo $all_param['from_area']; ?>">
                                        <input type="hidden" id="from_city" name="from_city" value="<?php echo $all_param['from_city']; ?>">
                                        <input type="hidden" id="from_district" name="from_district" value="<?php echo $all_param['from_district']; ?>">
                                        <input type="hidden" id="from_state" name="from_state" value="<?php echo $all_param['from_state']; ?>">
                                        <input type="hidden" id="from_country" name="from_country" value="<?php echo $all_param['from_country']; ?>">
                                        <input type="hidden" id="from_address" name="from_address" value="<?php echo $all_param['from_address']; ?>">
                                        <input type="hidden" id="from_postcode" name="from_postcode" value="<?php echo $all_param['from_postcode']; ?>">

                                        <!-- to address fileds -->
                                        <input type="hidden" id="to_area" name="to_area" value="<?php echo $all_param['to_area']; ?>">
                                        <input type="hidden" id="to_city" name="to_city" value="<?php echo $all_param['to_city']; ?>">
                                        <input type="hidden" id="to_district" name="to_district" value="<?php echo $all_param['to_district']; ?>">
                                        <input type="hidden" id="to_state" name="to_state" value="<?php echo $all_param['to_state']; ?>">
                                        <input type="hidden" id="to_country" name="to_country" value="<?php echo $all_param['to_country']; ?>">
                                        <input type="hidden" id="to_address" name="to_address" value="<?php echo $all_param['to_address']; ?>">
                                        <input type="hidden" id="to_postcode" name="to_postcode" value="<?php echo $all_param['to_postcode']; ?>">

                                        <div class="input_flex">
                                            <span><img src="<?php echo base_url(); ?>/viewer_assets/images/cabpickup.svg"></span>
                                            <label class="label_top">Pickup Location</label>
                                            <input type="text" id="from" name="from_pickup" value="<?php echo $all_param['from_pickup']; ?>">
                                        </div>
                                        <div class="input_flex">
                                            <span><img src="<?php echo base_url(); ?>/viewer_assets/images/cabdrop.svg"></span>
                                            <label class="label_top">Drop Location</label>
                                            <input type="text" id="to" name="to_drop" value="<?php echo $all_param['to_drop']; ?>">
                                        </div>
                                        <div class="input_flex">
                                            <span><img src="<?php echo base_url(); ?>/viewer_assets/images/date.png"></span>
                                            <label class="label_top">Pickup Date & Time</label>
                                            <input type="date" id="fromDate" name="pickup_date" value="<?php echo date('Y-m-d', strtotime($all_param["pickup_date"])); ?>">
                                            <input type="time" name="pickup_time" value="<?php echo date('H:i:s', strtotime($all_param["pickup_time"])); ?>">
                                        </div>
                                        <!--<div class="input_flex cmnClss outstation_roundtrip"<?php //if((array_key_exists('drop_date', $all_param)==false || empty($all_param['drop_date'])) || (array_key_exists('drop_time', $all_param)==false || empty($all_param['drop_time']))){echo " style='display:none;'";} ?>>-->
                                        <!--    <span><img src="<?php //echo base_url(); ?>/viewer_assets/images/date.png"></span>-->
                                        <!--    <label class="label_top">Drop Date & Time</label>-->
                                        <!--    <input type="text" id="toDate" name="drop_date" value="<?php //if(array_key_exists('drop_date', $all_param)){echo date('Y-m-d', strtotime($all_param['drop_date'])); } ?>">-->
                                        <!--    <input type="time" name="drop_time" value="<?php //if(array_key_exists('drop_time', $all_param)){echo date('H:i:s', strtotime($all_param["drop_time"])); } ?>">-->
                                        <!--</div>-->
                                        <button type="submit" class="btn">Book Cab</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content_sec bg-white p-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 px-lg-3 px-md-3 px-sm-3 px-0">
                <!-- allVehicleList -->
                <div class="car_list my-lg-3 my-md-3 my-2" id="allVehicleList">

                </div>
            </div>
            <div class="col-lg-5 px-0">
                <div class="google_map_box">
                    <div class="google_map" id="googleMap">

                    </div>
                    <div class="output" id="output">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">-->

<script type="text/javascript" src="<?php echo base_url('viewer_assets/jquery/auto_suggestion.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('viewer_assets/jquery/calculate_map.js'); ?>"></script>

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

$(document).on("change", "#locationForm select[name='trip_name']", function(){
    $("#locationForm").find(".cmnClss").hide();
    $("#locationForm").find(".cmnClss").find("input, select, textarea").val("");
    $("#locationForm").find("."+$(this).find('option:selected').val()).show();
    $("#from, #to").removeAttr("placeholder");
});
function get_all_vehicle(){
    var total_km_txt=document.getElementById("map_distance").value;
    var total_time_txt=document.getElementById("map_duration").value;
    var trip_name="<?php echo $all_param['trip_name']; ?>";
    $.ajax({  
        url:base_url+"/get-all-vehicle",
        method:'POST',  
        data:{[csrfName]:csrfHash, trip_name:trip_name, total_km_txt:total_km_txt, total_time_txt:total_time_txt},
        dataType: 'JSON', 
        success:function(data){
            $("#allVehicleList").html(data.list);
        }
    });
}

function book_now(self){
    $("#locationForm").find("input[name='vehicle_id']").val($(self).data('id'));
    $("#locationForm").find("input[name='service_id']").val($(self).data('service_id'));
    $("#locationForm").attr("action", base_url+"/vehicle-details").submit();
}

if($(window).width()>991){
    window.onscroll = function() {myFunction()};
    var fixed = document.getElementById("bannerForm");
    var sticky = fixed.offsetTop;
    var w = $(".google_map_box").width();
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            $(".google_map_box").css({"position" : "fixed", "top" : "60px", "bottom" : "0", "width" : (w+20)})
        } else {
            $(".google_map_box").css({"position" : "inherit", "top" : "inherit", "bottom" : "inherit", "width" : "100%"})
        }
    }
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
function select_hr_pkg(self){
    if($(self).hasClass("active")){
        $("#allVehicleList").find(".cmnHrPgk").each(function(index){
            $(this).closest("a").show(); 
        });
        $(".package_box_item").removeClass("active");
    }else{
        $("#allVehicleList").find(".cmnHrPgk").each(function(index){
            $(this).closest("a").hide(); 
        });
        $("#allVehicleList").find("."+$(self).data('class')).closest("a").show();
        $(".package_box_item").removeClass("active");
        $(self).addClass("active");
    }
}
$(document).ready(function(){
    calculateRoute("fetch_vehicle");
    off_prev_date();
    $("#from, #to").removeAttr("placeholder");
});
</script>