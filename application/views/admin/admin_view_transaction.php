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
                    <h5>All User's Booking Transaction</h5>
                </div>
                <div class="table-responsive p-3 _scrollDx">
                    <table class="table" id="transaction_datatable">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Details</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Type</th>
                                <th>Vehicle</th>
                                <th>Pickup Time</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Date</th>
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
    $('#transaction_datatable').DataTable({
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
            url:base_url+"/admin/Admin_view_transaction/fetch_all_user_transaction",  
            type:"POST",
            data:{[csrfName]:csrfHash, type:"<?php echo $type; ?>"}
        },
        "columnDefs":[
            {"orderable":false, "targets":[10]}
        ],
        "order":[[0,"desc"]]
    });
});
function reload_data_table(ele){
    $(ele).DataTable().ajax.reload();
}
</script>
</body>
</html>