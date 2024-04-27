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
            <div class="col-lg-12">
                <div class="bg-white p-3 mb-2">
                    <h6>All Customer</h6>
                </div>
                <div class="table-responsive p-3 _scrollDx">
                    <table class="table" id="customer_datatable">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Pic</th>
                                <th>Name</th>
                                <th>Info</th>
                                <th>Document</th>
                                <th>Address</th>
                                <th>Create Date</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";

$(document).ready(function() {
    $('#customer_datatable').DataTable({
        "pageLength" : 50,
        "lengthMenu" : [10, 20, 50, 100, 200],
        "language": {
            "lengthMenu": '_MENU_',
            "sSearch": "",
            "searchPlaceholder": "Search records"
        },
        "processing" : true,
        "serverSide" : true,
        "ajax":{
            url:base_url+"/admin/Admin_view_customer/fetch_all_customer",  
            type:"POST",
            data:{[csrfName]:csrfHash}
        },
        "columnDefs":[
            {"orderable":false, "targets":[1,4,7,8]}
        ], 
        "order":[[0,"desc"]]
    });
});
function reload_data_table(ele){
    $(ele).DataTable().ajax.reload();
}
function status_data(id){
    if($("#"+id+"_status").is(":checked")){
        var status=1;
    }else{
        var status=0;
    }
    $.ajax({  
        url:base_url+"/admin/Admin_view_customer/status_data", 
        method:'POST',  
        data:{[csrfName]:csrfHash, id:id, status:status},
        dataType: 'JSON',
        success:function(data){
            webinaToast({type: data.type, message: data.text});
            if(data.type=='success'){
                reload_data_table("#customer_datatable");
            }
        }
    });
}
function delete_data(id){
    if(window.confirm("Are you sure to delete it?")){
        $.ajax({
            url:base_url+"/admin/Admin_view_customer/delete_data", 
            method:"POST",
            data:{[csrfName]:csrfHash, id:id},
            dataType: "JSON",
            success:function(data){
                webinaToast({type: data.type, message: data.text});
                if(data.type=='success'){
                    reload_data_table("#customer_datatable");
                }
            }
        });
    }
}
</script>
</body>
</html>