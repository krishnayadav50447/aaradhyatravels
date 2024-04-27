<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo site_title(); ?> | Welcome Admin</title>
    <?php echo $link_script; ?>
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

            <div class="board">
                <div class="col-lg-12">
                    <div class="bg-white p-3 mb-2">
                        <button type="button" class="btn btn-primary btn-sm" onclick="open_email_form()">New Email</button>
                    </div>
                    
                    <div class="table-responsive bg-white p-3">
                        <table class="table table-sm history-wrapper" id="email_datatable" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Heading</th>
                                    <th>Message</th>
                                    <th>DateTime</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>From</th>
                                   <th>To</th>
                                    <th>Heading</th>
                                    <th>Message</th>
                                    <th>DateTime</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

var site_title="<?php echo site_title(); ?>";
var phone_1="<?php echo get_phone_list(1); ?>";
var phone_2="<?php echo get_phone_list(2); ?>";

$(document).ready(function(e) {
    //datatable loading
    $('#email_datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "ajax":{
            data:{[csrfName]:csrfHash},
            url:"<?php echo base_url('admin/admin_view_notification/fetch_all_email'); ?>",  
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
function open_email_form(){
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
        url:base_url+"/admin/admin_view_notification/save_send_email", 
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
function resend_email(email_id){
    open_email_form();
    $.ajax({
        url:base_url+"/admin/admin_view_notification/get_saved_email_fetch",
        method:"POST",
        data:{[csrfName]:csrfHash, id:email_id},
        dataType: "JSON",
        success:function(data){
            $.each(data, function(i, row) {
                if(i=="email_message"){
                    $("#email_message_div").html(row);
                }else{
                    $('#send_email_form [name="' + i + '"]').val(row);
                }
            });            
        }
    });
}
function delete_send_email(email_id){
    if(window.confirm("Are you sure to delete?")){
        $.ajax({
            url:base_url+"/admin/admin_view_notification/delete_send_email",
            method:"POST",
            data:{[csrfName]:csrfHash, id:email_id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#email_datatable");  
                }         
            }
        });
    }
}

</script>
</body>
</html>



