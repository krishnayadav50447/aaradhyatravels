<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="dashboard_sec">
	<div class="container-fluid ps-lg-0">
		<div class="row">
			<div class="offset-lg-2 col-lg-8 mt-lg-5 px-lg-3 px-md-3 px-0">
                <div class="dashboard_center">
                    <div class="dashboard_heading px-3">
                        <h6 class="mb-0"><b>History</b></i></b></h6>
                        <a href="<?php echo base_url('dashboard');?>" class="text-dark"><i class="fas fa-long-arrow-left"></i></a>
                    </div>

                    <div class="details_box d-block">
                        <div class="car_list my-lg-3 my-md-3">
                            <?php foreach ($booking_data as $key => $value) { 
                                if($value->status=="pending"){ ?>
                                    <div class="car_box booking_pending">
                                        <div class="d-flex align-items-center justify-content-between mb-2 w-100">
                                            <h6 class="fs_14 text-danger mb-0">Pending</h6>
                                            <p class="fs_13 mb-0"><b><?php echo date('D jS M, Y', strtotime($value->pickup_date)); ?> <?php echo date('h:i a', strtotime($value->pickup_time)); ?></b></p>
                                        </div>
                                        <div class="loc_map">
                                            <img src="<?php echo base_url('viewer_assets/images/map_img.png'); ?>">
                                        </div>
                                        <div class="car_details ps-lg-3 ps-md-3">
                                            <h6 class="mb-3"><b><?php echo $value->vehicle_name; ?></b></h6>
                                            <div class="div_from_to">
                                                <i class="fa-solid fa-arrow-down-long"></i>
                                                <div class="from_to" style="min-height: 35px;">
                                                    <strong>From: </strong><p><?php echo $value->from_pickup; ?></p>
                                                </div>
                                                <div class="from_to mb-0">
                                                    <strong>To: </strong><p><?php echo $value->to_drop; ?></p>
                                                </div>
                                                
                                                <div class="d-flex mt-3">
                                                    <p class="mb-0 fs_14 me-4"><b>Total: &#8377;<?php echo get_price_format($value->total_amount); ?></b></p>
                                                    <p class="mb-0 fs_14"><b>Due: &#8377;<?php echo get_price_format($value->total_amount); ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ 
                                    if($value->status=="success" && $value->cancel_status==""){ ?>
                                        <div class="car_box booking_success">
                                            <div class="d-flex align-items-center justify-content-between mb-2 w-100">
                                                <h6 class="fs_14 text-success mb-0">Success</h6>
                                                <p class="fs_13 mb-0"><b><?php echo date('D jS M, Y', strtotime($value->pickup_date)); ?> <?php echo date('h:i a', strtotime($value->pickup_time)); ?></b></p>
                                            </div>
                                            <div class="loc_map">
                                                <img src="<?php echo base_url('viewer_assets/images/map_img.png'); ?>">
                                            </div>
                                            <div class="car_details ps-lg-3 ps-md-3">
                                                <h6 class="mb-3"><b><?php echo $value->vehicle_name; ?></b></h6>
                                                <div class="div_from_to">
                                                    <i class="fa-solid fa-arrow-down-long"></i>
                                                    <div class="from_to" style="min-height: 35px;">
                                                        <strong>From: </strong><p><?php echo $value->from_pickup; ?></p>
                                                    </div>
                                                    <div class="from_to mb-0">
                                                        <strong>To: </strong><p><?php echo $value->to_drop; ?></p>
                                                    </div>
                                                    
                                                    <div class="d-flex mt-3 w-100">
                                                        <p class="mb-0 fs_14 me-4"><b>Total: &#8377;<?php echo get_price_format($value->total_amount); ?></b></p>
                                                        <p class="mb-0 fs_14 me-4"><b>Paid: &#8377;<?php echo get_price_format($value->paid_amount); ?></b></p>
                                                        <p class="mb-0 fs_14"><b>Due: &#8377;<?php echo get_price_format($value->total_amount-$value->paid_amount); ?></b></p>
                                                    </div>
                                                    <?php 
                                                    $cur_datetime = new DateTime(date('Y-m-d H:i:s')); 
                                                    $pickup_datetime = new DateTime(date('Y-m-d H:i:s', strtotime($value->pickup_date.' '.$value->pickup_time))); 
                                                    if($pickup_datetime>$cur_datetime){ ?>
                                                        <h6 class="text-end mt-3 w-100 mb-0"><button type="button" data-id="<?php echo $value->id; ?>" onclick="cancel_booking(this)" class="btn btn-sm btn-warning">Cancel Booking</button></h6>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <?php if($value->status=="success" && $value->cancel_status=="canceled"){ ?>
                                            <div class="car_box booking_canceled">
                                                <div class="d-flex align-items-center justify-content-between mb-2 w-100">
                                                    <h6 class="fs_14 text-danger mb-0">Canceled</h6>
                                                    <p class="fs_13 mb-0"><b><?php echo date('D jS M, Y', strtotime($value->pickup_date)); ?> <?php echo date('h:i a', strtotime($value->pickup_time)); ?></b></p>
                                                </div>
                                                <div class="loc_map">
                                                    <img src="<?php echo base_url('viewer_assets/images/map_img.png'); ?>">
                                                </div>
                                                <div class="car_details ps-lg-3 ps-md-3">
                                                    <h6 class="mb-3"><b><?php echo $value->vehicle_name; ?></b></h6>
                                                    <div class="div_from_to">
                                                        <i class="fa-solid fa-arrow-down-long"></i>
                                                        <div class="from_to" style="min-height: 35px;">
                                                            <strong>From: </strong><p><?php echo $value->from_pickup; ?></p>
                                                        </div>
                                                        <div class="from_to mb-0">
                                                            <strong>To: </strong><p><?php echo $value->to_drop; ?></p>
                                                        </div>
                                                        
                                                        <div class="d-flex mt-3">
                                                            <p class="mb-0 fs_14 me-4"><b>Total: &#8377;<?php echo get_price_format($value->total_amount); ?></b></p>
                                                            <p class="mb-0 fs_14 me-4"><b>Paid: &#8377;<?php echo get_price_format($value->paid_amount); ?></b></p>
                                                            <p class="mb-0 fs_14"><b>Due: &#8377;<?php echo get_price_format($value->total_amount-$value->paid_amount); ?></b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }else{ 
                                            echo "no data found!";
                                        } 
                                    } 
                                } 
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>

<div class="new_modal" id="cancel_booking_modal">
    <form class="modal_content mw_500 mobile_fix" id="cancel_booking_form">
        <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
        <input type="hidden" name="booking_id">
        <div class="modal_head">
            <h6 class="mb-0">Cancel This Booking</h6>
            <i class="fas fa-times" onclick="close_cancel_modal(this)"></i>
        </div>
        <div class="modal_body">
            <div class="form_input">
                <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                <select class="form-control" name="cancel_reason" required>
                    <option value="">--select--</option>
                    <option value="Wrong Destination">Wrong Destination</option>
                    <option value="Wrong Date or Time">Wrong Date or Time</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="modal_footer">
            <button type="button" class="btn btn-sm btn-danger py-1" onclick="close_cancel_modal(this)">Close</button>
            <button type="submit" class="btn btn-sm btn-success py-1">Submit</button>
        </div>
    </form>
</div>

<script type="text/javascript">
function open_cancel_modal(){
    $("body").addClass("no_scroll");
    $("#cancel_booking_modal").addClass("modal_open");
}
function close_cancel_modal(self){
    $("body").removeClass("no_scroll");
    $(self).closest(".modal_open").removeClass("modal_open");
    $("#cancel_booking_form").find('input[name="booking_id"]').val("");
}
function cancel_booking(self) {
    open_cancel_modal();
    $("#cancel_booking_form").find('input[name="booking_id"]').val($(self).data('id'));
}
$(document).on('submit', '#cancel_booking_form', function(e){
    e.preventDefault();
    $.ajax({  
        url:base_url+"/cancel-booking", 
        method:'POST',
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type:data.type, message:data.message});
            if(data.type=="success"){
                location.reload();
            }
        }
    });
});
</script>