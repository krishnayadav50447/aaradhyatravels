<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo site_title(); ?> | Welcome Admin</title>
    <?php echo $link_script; ?>

    <!-- start include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- end include summernote css/js -->
</head>
<body>
<?php echo $header; ?>
<?php echo $left_nav; ?>
<?php echo $right_nav; ?>
<section class="main_board">
    <div class="container-fluid">
        <div class="row">
            <div class="board fixed_box display_none open_faq_form">
                <form id="add_faq_form" method="post">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Add faq <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_faq_form()">&times;</span></h5>
                            <small>Dashboard > Add faq</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Title*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Description*</label>
                                        <textarea rows="8" class="form-control summernote" placeholder="Describe your faq content here..." name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_faq_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Add Faq</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="board fixed_box display_none open_up_faq_form">
                <form id="up_faq_form">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="id">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Edit & Update faq <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_up_faq_form()">&times;</span></h5>
                            <small>Dashboard > Edit & Update faq</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Title*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Description*</label>
                                        <textarea rows="8" class="form-control summernote" placeholder="Describe your faq content here..." name="description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_up_faq_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Update Faq</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="board">
                <div class="col-lg-12">
                    <div class="bg-white p-3 my-2">
                        <button type="button" class="_wtBtnMd bg_theme_1" onclick="open_faq_form()">Add Faq</button>
                    </div>
                    <div class="table-responsive bg-white p-3">
                        <table class="table table-sm history-wrapper" id="faq_datatable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot class="d-none">
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
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

$(document).ready(function(e) {
    $('.summernote').summernote();

    //datatable loading
    $('#faq_datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "ajax":{
            data:{[csrfName]:csrfHash},
            url:"<?php echo base_url('admin/Admin_dynamic_data/fetch_all_faq'); ?>",  
            type:"POST"
        },  
        "columnDefs":[
            {  
                "orderable":false, "targets":[2,4],  
            },  
        ],  
    });
});
function reload_data_table(element){
    $(element).DataTable().ajax.reload();
}
function open_faq_form(){
    $(".open_faq_form").show();
}
function close_faq_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#add_faq_form").find("input[type='text'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#add_faq_form .summernote").summernote('code', "");
    $("#add_faq_form").find(".showImg").attr("src", "");
    $(".open_faq_form").hide();
}
function open_up_faq_form(){
    $(".open_up_faq_form").show();
}
function close_up_faq_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#up_faq_form").find("input[type='text'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#up_faq_form .summernote").summernote('code', "");
    $("#up_faq_form").find(".showImg").attr("src", "");
    $(".open_up_faq_form").hide();
}
$(document).on('submit', '#add_faq_form', function(event){ 
    event.preventDefault(); 
    $(this).find("textarea").each(function(key, value){
        $(this).val(urlify($(this).val()));
    });
    $.ajax({  
        url:"<?php echo base_url('admin/Admin_dynamic_data/add_faq'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_faq_form();
                reload_data_table("#faq_datatable");
            }
        }
    });
});
$(document).on('submit', '#up_faq_form', function(event){ 
    event.preventDefault();  
    $(this).find("textarea").each(function(key, value){
        $(this).val(urlify($(this).val()));
    });
    $.ajax({  
        url:"<?php echo base_url('admin/Admin_dynamic_data/update_faq'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_up_faq_form();
                reload_data_table("#faq_datatable");
            }
        }
    });   
});
function faq_status_data(id){
    if($("#"+id+"_status").is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({  
        url:base_url+"/admin/Admin_dynamic_data/faq_status_data", 
        method:'POST',  
        data:{[csrfName]:csrfHash, id:id, status:status},
        dataType: 'JSON',
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type!='success'){
                reload_data_table("#product_datatable");
            }
        }
    });
}
function update_all_details(id){
    open_up_faq_form();
    $.ajax({
        url:"<?php echo base_url('admin/Admin_dynamic_data/update_faq_fetch'); ?>",
        method:"POST",
        data:{[csrfName]:csrfHash, id:id},
        dataType: "JSON",
        success:function(data){
            $.each(data, function(i, row) {
                if(i=="description"){
                    $("#up_faq_form .summernote").summernote('code', row);
                }else{
                    $('#up_faq_form [name="' + i + '"]').val(removeTags(row));
                }
            });            
        }
    });
}
function delete_faq(id){
    if(window.confirm("Are you sure to delete it?")){
        $.ajax({
            url:"<?php echo base_url('admin/Admin_dynamic_data/delete_faq'); ?>",
            method:"POST",
            data:{[csrfName]:csrfHash, id:id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#faq_datatable");
                }
            }
        })
    }
}

</script>

</body>
</html>



