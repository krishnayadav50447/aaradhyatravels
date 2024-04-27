<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="dashboard_sec">
	<div class="container-fluid ps-lg-0">
		<div class="row">
			<div class="offset-lg-2 col-lg-8 mt-lg-5">
                <div class="dashboard_center">
                    <div class="dashboard_heading">
                        <h6 class="mb-0"><b>Support</b></i></b></h6>
                        <a href="<?php echo base_url('dashboard');?>" class="text-dark"><i class="fas fa-long-arrow-left"></i></a>
                    </div>

                    <div class="details_box d-block">
                        <div class="user_info w-100 ps-0">
                            <div>
                                <h6>Helpline Number</h6>
                                <p><?php echo get_phone_list(1); ?></p>
                            </div>
                            <div>
                                <h6>Email</h6>
                                <p><?php echo get_email_name('support'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</section>

<script type="text/javascript">
if ($(window).width()<767) {$("body").addClass("no_scroll");}
</script>