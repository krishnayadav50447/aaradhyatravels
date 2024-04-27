<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo site_title(); ?> | Welcome Admin</title>
    <?php echo $link_script; ?>
    <style type="text/css">
        table.dataTable .fa-star {color: #aaa; margin: 0 3px;}
        table.dataTable .checked {color: #fcc322;}
    </style>
</head>
<body>
<?php echo $header; ?>
<?php echo $left_nav; ?>
<?php echo $right_nav; ?>
<section class="main_board">
    <div class="container-fluid">
        <div class="row">
            <div class="board fixed_box display_none open_email_form">
                <form id="send_email_form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3 mb-2">
                            <h3 class="heading">Compose New Email <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_email_form()">&times;</span></h3>
                            <small>Dashboard > Compose New Email</small>
                        </div>

                        <div class="bg-white px-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>To</label>
                                        <input type="text" name="email_to" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>From</label>
                                        <select name="email_from" class="form-control" required>
                                            <option value="">----</option>
                                            <?php foreach(get_email_list() as $key => $value) { ?>
                                                <option value="<?php echo $value->email; ?>"><?php echo $value->email; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Subject</label>
                                        <input type="text" name="email_subject" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Message</label>
                                        <div id="email_message_div" style="border: 1px solid #767676; min-height: 100px; padding: 5px 10px;" class="form-control" contenteditable>
                                            
                                        </div>
                                        <textarea style="display: none;" name="email_message" value=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_email_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="board fixed_box display_none open_review_form">
                <form id="add_review_form" method="post">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="ref_name" value="testimonial">
                    <input type="hidden" name="ref_id" value="testimonial">
                    <input type="hidden" name="designation">
                    <input type="hidden" name="phone">
                    <input type="hidden" name="email">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Add Review <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_review_form()">&times;</span></h5>
                            <small>Dashboard > Add Review</small>
                        </div>

                        <div class="bg-white px-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Date*</label>
                                        <input type="date" name="create_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Name*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Location*</label>
                                        <input type="text" name="location" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="w-100 mb-3">
                                        <label>Review*</label>
                                        <input type="number" name="review" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="w-100 mb-3">
                                        <label>Position*</label>
                                        <input type="number" name="position" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Image</label>
                                        <input type="hidden" name="img_extention">
                                        <input type="text" name="image" class="_imgUploadLink form-control" placeholder="Click to Upload Image" onclick="_wtImgCompressorOpenModal()" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Image Preview</label>
                                        <img src="" class="showImg" width="100px">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Message*</label>
                                        <textarea rows="8" class="form-control summernote" placeholder="Describe your message here..." name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_review_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Add Review</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="board fixed_box display_none open_up_review_form">
                <form id="up_review_form" method="post">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="ref_name" value="testimonial">
                    <input type="hidden" name="ref_id" value="testimonial">
                    <input type="hidden" name="designation">
                    <input type="hidden" name="phone">
                    <input type="hidden" name="email">
                    <input type="hidden" name="id">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Edit & Update Review <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_up_review_form()">&times;</span></h5>
                            <small>Dashboard > Edit & Update Review</small>
                        </div>

                        <div class="bg-white px-3">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Date*</label>
                                        <input type="date" name="create_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Name*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Location*</label>
                                        <input type="text" name="location" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="w-100 mb-3">
                                        <label>Review*</label>
                                        <input type="number" name="review" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="w-100 mb-3">
                                        <label>Position*</label>
                                        <input type="number" name="position" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Image</label>
                                        <input type="hidden" name="img_extention">
                                        <input type="text" name="image" class="_imgUploadLink form-control" placeholder="Click to Upload Image" onclick="_wtImgCompressorOpenModal()" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Image Preview</label>
                                        <img src="" class="showImg" width="100px">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Message*</label>
                                        <textarea rows="8" class="form-control summernote" placeholder="Describe your message here..." name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_up_review_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Update Review</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="board">
                <div class="col-lg-12">
                    <div class="bg-white p-3 my-2">
                        <button type="button" class="_wtBtnMd bg_theme_1" onclick="open_review_form()">Add Review</button>
                    </div>
                    <div class="table-responsive bg-white p-3">
                        <table class="table table-sm history-wrapper" id="review_datable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Location</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script data-base_url="<?php echo base_url() ?>" data-base_api="<?php echo base_api() ?>" data-reg_id="<?php echo base_reg_id() ?>" data-reg_key="<?php echo base_reg_key() ?>" data-csrfName="" data-csrfHash="" src="<?php echo base_api('assets/webinaImgCompressor/_webinaImgCompressor.js'); ?>" id="webinaImgCompressorScript"></script>


<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).on("change", "select[name='email_from']", function(){
    var email=$(this).val();
    var name=site_title;
    switch(email){
        case "case_here":
            name="name_here";
            break;
        default:
            name="";

    }
    $(this).closest("form").find("#mail_sign").html('<br><br><br><div class="pre">'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Regards</strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>'+site_title+'</strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>'+name+'</strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Website</strong>: <a style="color: #999999;" href="'+base_url+'">'+base_url+'</a></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Phone</strong>: <span style="font-family: arial, helvetica, sans-serif;"><a href="tel:'+phone_1+'" style="color: #999999;">'+phone_1+'</a> / <a href="tel:'+phone_2+'" style="color: #999999;">'+phone_2+'</a></span></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Email</strong>: <a style="color: #999999;" href="mailto:'+email+'">'+email+'</a></span></p>'+
        '<p><img src="'+base_url+'/viewer_assets/images/logo.png" style="width:150px;"></p>'+
    '</div>');
});
function open_email_form(self){
    var email=$(self).data('email');
    $("#send_email_form").find("input[name='email_to']").val(email);
    
    $("#email_message_div").html('<div id="mail_sign"><br><br><br><div class="pre">'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Regards</strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>'+site_title+'</strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong></strong></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Website</strong>: <a style="color: #999999;" href="'+base_url+'">'+base_url+'</a></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Phone</strong>: <span style="font-family: arial, helvetica, sans-serif;"><a href="tel:'+phone_1+'" style="color: #999999;">'+phone_1+'</a> / <a href="tel:'+phone_2+'" style="color: #999999;">'+phone_2+'</a></span></span></p>'+
        '<p><span style="font-family: georgia, palatino, serif; color: #999999;"><strong>Email</strong>: <a style="color: #999999;" href="mailto:<?php echo get_email_name('info'); ?>"><?php echo get_email_name('info'); ?></a></span></p>'+
        '<p><img src="'+base_url+'/viewer_assets/images/logo.png" style="width:150px;"></p>'+
    '</div></div>');
    
    $(".open_email_form").fadeIn();
}
function close_email_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#send_email_form").find("input[type='text'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#email_message_div").html("");
    $(".open_email_form").fadeOut();
}
$(document).on('submit', '#send_email_form', function(event){ 
    event.preventDefault();
    $("#send_email_form textarea").val($("#email_message_div").html());
    $.ajax({  
        url:base_url+"/admin/admin_view_notification/send_email", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_email_form();
                reload_data_table("#email_datatable");
            }
        }
    });
});

$(document).ready(function(e) {
    //datatable loading
    $('#review_datable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "ajax":{
            data:{[csrfName]:csrfHash},
            url:base_url+"/admin/admin_view_notification/fetch_all_review",  
            type:"POST"
        },  
        "columnDefs":[
            {  
                "orderable":false, "targets":[0,1,2,3,4,5],  
            },  
        ],  
    });
});
function reload_data_table(ele){
    $(ele).DataTable().ajax.reload();
}
function open_review_form(){
    $(".open_review_form").fadeIn();
    // $('body').css({'overflow-y' : 'hidden'});
}
function close_review_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#add_review_form").find("input[type='text'],input[type='date'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#add_review_form").find(".showImg").attr("src", "");
    $(".open_review_form").fadeOut();
}
function open_up_review_form(){
    $(".open_up_review_form").fadeIn();
}
function close_up_review_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#up_review_form").find("input[type='text'],input[type='date'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#up_review_form").find(".showImg").attr("src", "");
    $(".open_up_review_form").fadeOut();
}
$(document).on('submit', '#add_review_form', function(event){ 
    event.preventDefault();  
    $.ajax({  
        url:base_url+"/admin/admin_view_notification/add_review", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_review_form();
                reload_data_table("#review_datable");
            }
        }
    });
});
$(document).on('submit', '#up_review_form', function(event){ 
    event.preventDefault();  
    $.ajax({  
        url:base_url+"/admin/admin_view_notification/update_review", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_up_review_form();
                reload_data_table("#review_datable");
            }
        }
    });   
});
function status_data(id){
    if($("#"+id+"_status").is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({  
        url:base_url+"/admin/admin_view_notification/status_data", 
        method:'POST',  
        data:{[csrfName]:csrfHash, id:id, status:status},
        dataType: 'JSON',
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                reload_data_table("#product_datatable");
            }
        }
    });
}
function update_all_details(id){
    open_up_review_form();
    $.ajax({
        url:base_url+"admin/admin_view_notification/update_review_fetch",
        method:"POST",
        data:{[csrfName]:csrfHash, id:id},
        dataType: "JSON",
        success:function(data){
            $.each(data, function(i, row) {
                $('#up_review_form [name="' + i + '"]').val(row);
                if(i=='create_date'){
                    var newDate = new Date(row);
                    var day = ("0" + newDate.getDate()).slice(-2);
                    var month = ("0" + (newDate.getMonth() + 1)).slice(-2);
                    var setDate = newDate.getFullYear()+"-"+(month)+"-"+(day) ;
                    $('#up_review_form [name="' + i + '"]').val(setDate);
                }
                if(i=="img"){
                    $("#up_review_form .showImg").attr("src", "<?php echo base_url('uploads/media/'); ?>"+row);
                }
            });            
        }
    });
}
function delete_review(id){
    if(window.confirm("Are you sure to delete it?")){
        $.ajax({
            url:base_url+"/admin/admin_view_notification/delete_review",
            method:"POST",
            data:{[csrfName]:csrfHash, id:id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#review_datable");
                }
            }
        })
    }
}
</script>

</body>
</html>
