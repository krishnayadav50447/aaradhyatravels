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