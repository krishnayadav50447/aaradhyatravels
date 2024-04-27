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
            <div class="board fixed_box display_none open_page_form">
                <form id="add_page_form" method="post">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Add Page SEO <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_page_form()">&times;</span></h5>
                            <small>Dashboard > Add Page</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>Select Page*</label>
                                        <select class="form-control" name="page_id">
                                            <?php $all_page=get_page_list(); ?>
                                            <?php foreach ($all_page as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>Page Title*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>page Image</label>
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
                                        <label>Meta Title <code>(60 words)</code></label>
                                        <textarea rows="1" class="form-control summernote" placeholder="Describe your meta title for this page here..." name="meta_title"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Meta Description  <code>(160 words)</code></label>
                                        <textarea rows="3" class="form-control summernote" placeholder="Describe your meta description for this page here..." name="meta_des"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Meta Keywords  <code>(10% of that page)</code></label>
                                        <textarea rows="3" class="form-control summernote" placeholder="Describe your meta keywords for this page here..." name="meta_key"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_page_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Add Page</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="board fixed_box display_none open_up_page_form">
                <form id="up_page_form">
                    <input type="hidden" name="<?php echo $csrfName; ?>" value="<?php echo $csrfHash; ?>">
                    <input type="hidden" name="id">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="bg-white p-3">
                            <h5 class="heading">Edit & Update Page SEO <span style="float:right; padding: 5px; cursor: pointer; font-size:35px; color:red;" onclick="close_up_page_form()">&times;</span></h5>
                            <small>Dashboard > Edit & Update Page</small>
                        </div>

                        <div class="bg-white p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>Select Page*</label>
                                        <select class="form-control" name="page_id">
                                            <?php $all_page=get_page_list(); ?>
                                            <?php foreach ($all_page as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="w-100 mb-3">
                                        <label>Page Title*</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="w-100 mb-3">
                                        <label>Meta Image</label>
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
                                        <label>Meta Title <code>(60 words)</code></label>
                                        <textarea rows="1" class="form-control summernote" placeholder="Describe your meta title for this page here..." name="meta_title"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Meta Description  <code>(160 words)</code></label>
                                        <textarea rows="3" class="form-control summernote" placeholder="Describe your meta description for this page here..." name="meta_des"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="w-100 mb-3">
                                        <label>Meta Keywords  <code>(10% of that page)</code></label>
                                        <textarea rows="3" class="form-control summernote" placeholder="Describe your meta keywords for this page here..." name="meta_key"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-3 text-end">
                            <button type="button" onclick="close_up_page_form()" class="_wtBtnMd bg_gray">Cancel</button>
                            <button type="submit" class="_wtBtnMd bg_theme_2">Update Page SEO</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="board">
                <div class="col-lg-12">
                    <div class="bg-white p-3 my-2">
                        <button type="button" class="_wtBtnMd bg_theme_1" onclick="open_page_form()">Add Page SEO</button>
                    </div>
                    <div class="table-responsive bg-white p-3">
                        <table class="table table-sm history-wrapper" id="page_datatable">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot class="d-none">
                                <tr>
                                    <th>Image</th>
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
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

<script data-base_url="<?php echo base_url() ?>" data-base_api="<?php echo base_api() ?>" data-reg_id="<?php echo base_reg_id() ?>" data-reg_key="<?php echo base_reg_key() ?>" data-csrfName="" data-csrfHash="" src="<?php echo base_api('assets/webinaImgCompressor/_webinaImgCompressor.js'); ?>" id="webinaImgCompressorScript"></script>

<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).ready(function(e) {
    //datatable loading
    $('#page_datatable').DataTable({
        "processing" : true,
        "serverSide" : true,
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "ajax":{
            data:{[csrfName]:csrfHash},
            url:"<?php echo base_url('admin/admin_page/fetch_all_page'); ?>",  
            type:"POST"
        },  
        "columnDefs":[
            {  
                "orderable":false, "targets":[0,2,3,4,5,6],  
            },  
        ],  
    });
});
function reload_data_table(element){
    $(element).DataTable().ajax.reload();
}
function open_page_form(){
    $(".open_page_form").show();
}
function close_page_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#add_page_form").find("input[type='text'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#add_page_form").find(".showImg").attr("src", "");
    $(".open_page_form").hide();
}
function open_up_page_form(){
    $(".open_up_page_form").show();
}
function close_up_page_form(){
    $('.fixed_box').animate({scrollTop:0},300);
    $("#up_page_form").find("input[type='text'],input[type='file'],input[type='number'],select,textarea").val("");
    $("#up_page_form").find(".showImg").attr("src", "");
    $(".open_up_page_form").hide();
}
$(document).on('submit', '#add_page_form', function(event){ 
    event.preventDefault(); 
    $(this).find("textarea").each(function(key, value){
        $(this).val(urlify($(this).val()));
    });
    $.ajax({  
        url:"<?php echo base_url('admin/admin_page/add_page'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_page_form();
                reload_data_table("#page_datatable");
            }
        }
    });
});
$(document).on('submit', '#up_page_form', function(event){ 
    event.preventDefault();  
    $(this).find("textarea").each(function(key, value){
        $(this).val(urlify($(this).val()));
    });
    $.ajax({  
        url:"<?php echo base_url('admin/admin_page/update_page'); ?>", 
        method:'POST',  
        data:new FormData(this),
        dataType: 'JSON',
        contentType:false,  
        processData:false,  
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                close_up_page_form();
                reload_data_table("#page_datatable");
            }
        }
    });   
});
function page_status_data(id){
    if($("#"+id+"_status").is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({  
        url:base_url+"/admin/admin_page/page_status_data", 
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
    open_up_page_form();
    $.ajax({
        url:"<?php echo base_url('admin/admin_page/update_page_fetch'); ?>",
        method:"POST",
        data:{[csrfName]:csrfHash, id:id},
        dataType: "JSON",
        success:function(data){
            $.each(data, function(i, row) {
                $('#up_page_form [name="' + i + '"]').val(removeTags(row));
                if(i=="img"){
                    $("#up_page_form .showImg").attr("src", "<?php echo base_url('uploads/media/'); ?>"+row);
                }
            });            
        }
    });
}
function delete_page(id){
    if(window.confirm("Are you sure to delete it?")){
        $.ajax({
            url:"<?php echo base_url('admin/admin_page/delete_page'); ?>",
            method:"POST",
            data:{[csrfName]:csrfHash, id:id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#page_datatable");
                }
            }
        })
    }
}

$(document).on('click', 'table tr td .showFullTxt', function(event){
    $("#showFullTxt").html($(this).html());
    alert_box_open('text_prev_modal');
});
$(document).on('click', 'table tr>td>img', function(event){
    $('#img01').attr('src', $(this).attr('src'));
    $('#img_link').val($(this).prop('src'));
    $('#caption').html($(this).attr('alt'));
    alert_box_open('img_prev_modal');
});

</script>

</body>
</html>



