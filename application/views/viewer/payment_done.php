<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="dashboard_sec">
	<div class="container-fluid ps-lg-0">
		<div class="row">
			<div class="offset-lg-2 col-lg-8 mt-lg-5">
                <div class="dashboard_center">
                    <div class="dashboard_heading">
                        <h6 class="mb-0"><b></b></i></b></h6>
                    </div>

                    <div class="details_box d-block">
                        
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>

<script type="text/javascript">
$(document).ready(function(){
	webinaFire({
	    icon: "success",
	    title: "Payment Successfully Done!",
	    cancelButton: "Ok",
	    message: "Booking Successfully Done!"
	});
	setTimeout(function(){
		location.replace('transaction');
	}, 3000);
});
</script>