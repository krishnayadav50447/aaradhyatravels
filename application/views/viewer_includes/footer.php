<footer>
	<div class="container">
		<div class="row mx-lg-0 footer_box">
			<div class="col-lg-6 col-md-4 ps-lg-0 ps-md-0 mb-lg-0 mb-md-0 mb-2">
				<a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>/viewer_assets/images/logo.png?v=<?php echo get_version();?>" alt="Logo"></a>
			</div>
			<div class="col-lg-6 col-md-8 pe-lg-0 pe-md-0">
				<ul class="footer_ul">
					<li><a href="<?php echo base_url('help'); ?>">Help</a></li>
					<li><a href="<?php echo base_url('terms-condition'); ?>">Terms & Condition</a></li>
					<li><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></li>
					<li><a href="<?php echo base_url('return-and-refund'); ?>">Cancelation & Refund</a></li>
				</ul>
			</div>
		</div>
		<div class="row mx-lg-0 footer_box border-bottom-0">
			<div class="col-lg-5 ps-lg-0 py-lg-3 mb-lg-0 mb-4">
				<h6>About Us</h6>
				<p class="para_dark mb-0">At Aaradhaya Travels, we understand that travel can be for a variety of reasons, whether it's for tourism, leisure activities like picnics, field trips, and excursions, or for formal requirements like corporate events, meetings, weddings, and more.</p>
			</div>
			<div class="col-lg-7 pe-lg-0 py-lg-3">
				<div class="row">
					<div class="col-lg-6 col-md-6 mb-4 order-1">
						<h6>Support</h6>
						<h5><?php echo get_phone_list(1); ?></h5>
					</div>
					<div class="col-lg-6 col-md-6 mb-lg-0 mb-md-0 mb-4 order-lg-2 order-md-2 order-sm-3 order-3">
						<h6>Address</h6>
						<h5><?php echo get_address_list('footer_1'); ?></h5>
					</div>
					
					<div class="col-lg-6 col-md-6 mb-lg-0 mb-md-0 mb-4 order-lg-3 order-md-3 order-sm-2 order-2">
						<h6>Email</h6>
						<h5><?php echo get_email_name('info'); ?></h5>
					</div>
					<div class="col-lg-6 col-md-6 order-4">
						<!--<h6>Links</h6>-->
						<!--<ul class="social_ul">-->
						<!--	<li><a href="<?php //echo get_social_page('facebook'); ?>"><i class="fab fa-facebook"></i></a></li>-->
						<!--	<li><a href="<?php //echo get_social_page('instagram'); ?>"><i class="fab fa-instagram"></i></a></li>-->
						<!--	<li><a href="<?php //echo get_social_page('linkedin'); ?>"><i class="fab fa-linkedin"></i></a></li>-->
						<!--</ul>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>