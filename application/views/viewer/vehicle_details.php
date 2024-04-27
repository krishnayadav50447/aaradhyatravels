<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php //echo "<pre>"; print_r($all_vehicle); die(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtVCFvjcSYniAI-VZB9vo2umYggxa5kzI&libraries=places"></script>

<section class="content_sec bg-white pt-lg-3 pt-md-3 pt-sm-2 pt-0 pb-lg-3 pb-md-3 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="modal_content w_600 mobile_fix" id="locationForm" style="display:none;">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="name">
                    <input type="hidden" name="email">
                    <input type="hidden" name="phone">
                    <input type="hidden" name="amount">
                    <input type="hidden" name="total_amount">
                    <input type="hidden" name="vehicle_id" value="<?php echo $all_param['vehicle_id']; ?>">
                    <input type="hidden" name="service_id" value="<?php echo $all_param['service_id']; ?>">

                    <!-- from address fileds -->
                    <input type="hidden" name="trip_name" value="<?php echo $all_param['trip_name']; ?>">
                    <input type="hidden" name="city" value="<?php if(array_key_exists('city', $all_param)){echo $all_param['city']; } ?>">

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

                    <input type="hidden" id="from" name="from_pickup" value="<?php echo $all_param['from_pickup']; ?>">
                    <input type="hidden" id="to" name="to_drop" value="<?php echo $all_param['to_drop']; ?>">

                    <input type="date" style="display:none;" name="pickup_date" value="<?php echo date('Y-m-d', strtotime($all_param["pickup_date"])); ?>">
                    <input type="time" style="display:none;" name="pickup_time" value="<?php echo date('H:i:s', strtotime($all_param["pickup_time"])); ?>">
                    <input type="date" style="display:none;" name="drop_date" value="<?php if(array_key_exists('drop_date', $all_param)){echo date('Y-m-d', strtotime($all_param['drop_date'])); } ?>">
                    <input type="time" style="display:none;" name="drop_time" value="<?php if(array_key_exists('drop_time', $all_param)){echo date('H:i:s', strtotime($all_param["drop_time"])); } ?>">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 px-lg-3 px-md-3 px-sm-3 px-0" id="VehicleDetails">
                
            </div>
            <div class="col-lg-4 px-lg-3 px-md-3 px-sm-3 px-0">
                <div class="book_box" id="VehiclePayDetails">

                    <div class="google_map_box">
                        <div class="google_map" id="googleMap">

                        </div>
                        <div class="output" id="output">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- <script type="text/javascript" src="<?php //echo base_url('viewer_assets/jquery/auto_suggestion.js'); ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('viewer_assets/jquery/calculate_map.js'); ?>"></script>

<script type="text/javascript">
function get_vehicle_for_details(){
    var total_km_txt=document.getElementById("map_distance").value;
    var total_time_txt=document.getElementById("map_duration").value;
    var trip_name="<?php echo $all_param['trip_name']; ?>";
    var vehicle_id="<?php echo $all_param['vehicle_id']; ?>";
    var service_id="<?php echo $all_param['service_id']; ?>";
    var pickup_date="<?php echo $all_param['pickup_date']; ?>";
    var pickup_time="<?php echo $all_param['pickup_time']; ?>";
    $.ajax({  
        url:base_url+"/get-vehicle-for-details",
        method:'POST',  
        data:{[csrfName]:csrfHash, vehicle_id:vehicle_id, service_id:service_id, trip_name:trip_name, total_km_txt:total_km_txt, total_time_txt:total_time_txt, pickup_date:pickup_date, pickup_time:pickup_time},
        dataType: 'JSON', 
        success:function(data){
            $("#VehicleDetails").html(data.details);
            $("#VehiclePayDetails").prepend(data.pay_details);
            $("#locationForm input[name='amount']").val(data.part_amount);
            $("#locationForm input[name='total_amount']").val(data.full_amount);
        }
    });
}

$(document).on("click", ".choose_pay", function(){
    $(this).addClass("checked").siblings(".choose_pay").removeClass("checked");
    $(".payNow").text($(this).find("input[type='radio']").val());
    $("#locationForm input[name='amount']").val($(this).find("input[type='radio']").val());
});
$(document).on("click", ".pay_btn", function(){
    if(cur_user_id==""){
        if($("#VehiclePayDetails #name").val()=="" || $("#VehiclePayDetails #email").val()=="" || $("#VehiclePayDetails #phone").val()==""){
            webinaFire({
                icon: "error",
                title: "Please Enter Name, Email & Phone!",
                cancelButton: "Ok",
                message: ""
            });
        }else{
            $("#locationForm input[name='name']").val($("#VehiclePayDetails #name").val());
            $("#locationForm input[name='email']").val($("#VehiclePayDetails #email").val());
            $("#locationForm input[name='phone']").val($("#VehiclePayDetails #phone").val());
            $("#locationForm").submit();
        }
    }else{
        $("#locationForm").submit();
    }
});
$(document).on('submit', '#locationForm', function(e){
    e.preventDefault();
    $.ajax({  
        url:"<?php echo base_url('make-payment'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            if(data.type=='success'){
                location.href=data.payment_url;
            }else{
                webinaFire({
                    icon: data.type,
                    title: "Try Again!",
                    cancelButton: "Ok",
                    message: data.text
                });
            }
        }
    });
});






$(document).ready(function(){
    calculateRoute("fetch_vehicle_details");
});
</script>