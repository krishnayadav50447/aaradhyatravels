<nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-7">
                <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>/viewer_assets/images/logo.png?v=<?php echo get_version();?>" alt="Logo"></a>
            </div>
            <div class="col-lg-9 col-md-9 col-5">
                <ul class="menu">
                    <li class="nav_title toggleNav"><i class="fas fa-long-arrow-left ps-3 text-white"></i>&nbsp; <a href="javascript:void(0)" class="logo"><img src="<?php echo base_url(); ?>/viewer_assets/images/logo.png?v=<?php echo get_version();?>"></a></li>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
                    <li><a href="<?php echo base_url('tarrif'); ?>">Tarrif</a></li>
                    <li><a href="<?php echo base_url('why-us'); ?>">Why Us</a></li>
                    <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
                    
                    <?php if(empty($session_data['user_id']) || empty($session_data['user_name'])){ ?>
                    <span class="not_login">
                        <li class="d-none"><a href="javascript:void(0)"></a></li>
                        <li><a href="<?php echo base_url('login'); ?>">Log in</a></li>
                        <li><a href="<?php echo base_url('register'); ?>">Sign up</a></li>
                    </span>
                    <?php }else{ ?>
                    <span class="when_login">
                        <li class="d-none"><a href="javascript:void(0)"></a></li>
                        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fas fa-user fs_12"></i>&nbsp; <?php echo get_sort_name($session_data['user_name']); ?></a></li>
                        <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                    </span>
                    <?php } ?>
                </ul>
                <div class="bars toggleNav"><img src="viewer_assets/images/bars.png"></div>
            </div>
        </div>
    </div>
</nav>

<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var site_title="<?php echo site_title(); ?>";
var current_url="<?php echo current_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";
var cur_user_id="<?php echo (empty($session_data['user_id'])?'':$session_data['user_id']); ?>";
</script>

<style type="text/css">
/*footer {display: none !important;}*/
/*.footer_bottom {display: none !important;}*/

.dashboard_sec {height: 100vh; overflow-y: auto; top: 0; left: 0; width: 100%; display: flex; justify-content: center; background-color: #fff;}
.dashboard_center {width: 100%;}
.dashboard_heading {display: flex; align-items: center; justify-content: space-between; padding: 15px 0; margin-bottom: 20px;}
.dashboard_heading h6 {font-size: 24px;}
.dashboard_grid ul {display: grid; grid-gap: 10px; grid-template-columns: repeat(4, 1fr);}
.dashboard_grid ul li a {background-color: #e3ded9; padding: 30px; display: block; text-align: center; color: #222;}
.dashboard_grid ul li a i {font-size: 22px; margin-bottom: 8px;}

.details_box {display: flex; grid-gap: 15px;}
.upload_img {position: relative; height: 150px; width: 150px; margin: 0 auto;}
.user_img {width: 150px; height: 150px; border-radius: 50%; overflow: hidden; background-color: #fff;}
.user_img img {height: 100%; width: 100%; object-fit: contain;}
.upload_img small {position: absolute; left: 0; top: 0; right: 0; bottom: 0; cursor: pointer; display: grid; align-content: end; justify-items: end;}
.user_info {width: calc(100% - 150px); padding-left: 40px;}
.user_info div {border-bottom: 1px solid #ddd; padding: 20px 0;}
.user_info div h6 {margin-bottom: 3px; color: #000;}
.user_info div p {margin-bottom: 0; color: #555;}
.dashboard_form input, .dashboard_form textarea, .dashboard_form select {width: 100%; padding: 12px 15px; border: 1px solid #ddd; font-size: 14px; color: #111;}
.dashboard_form label {font-size: 14px; font-weight: 600;}

.car_box {display: flex; flex-wrap: wrap; grid-gap: 0; align-items: center;}
.loc_map {width: 110px; height: 110px;}
.loc_map img {width: 100%; height: 100%; object-fit: cover;}
.car_details {width: calc(100% - 110px);}



@media only screen and (max-width:767px) {
    .dashboard_grid ul {grid-template-columns: repeat(2, 1fr);}
    .details_box {display: block;}
    .user_info {width: 100%; padding-left: 0;}
    .dashboard_heading {margin-bottom: 0; position: sticky; top: 0; background-color: #fff; z-index: 999; border-bottom: 1px solid #ddd;}
    .car_box {display: block; padding-top: 15px; padding-bottom: 20px; margin-bottom: 5px;}
    .loc_map {width: 100%; height: 140px; margin-bottom: 10px;}
    .car_details {width: 100%;}
}
</style>