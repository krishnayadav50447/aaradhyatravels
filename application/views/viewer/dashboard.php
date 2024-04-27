<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="dashboard_sec">
	<div class="container">
		<div class="row">
			<div class="offset-lg-2 col-lg-8 mt-lg-5">
				<div class="dashboard_center">
					<div class="dashboard_heading">
						<h6 class="mb-0">Hi, <b><i><?php echo $user_data->name; ?></i></b></h6>
					</div>
					<div class="dashboard_grid">
						<ul>
							<li><a href="<?php echo base_url('profile');?>"><i class="fa-solid fa-address-card"></i><br>Profile</a></li>
							<li><a href="<?php echo base_url('transaction');?>"><i class="fa-solid fa-clock-rotate-left"></i><br>History</a></li>
							<li><a href="<?php echo base_url('support');?>"><i class="fa-solid fa-phone"></i><br>Support</a></li>
							<li><a href="<?php echo base_url('setting');?>"><i class="fa-solid fa-screwdriver-wrench"></i><br>Setting</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>