<div class="left_nav">
    <!-- <ul>
        <li class="nav_label"><a href="javascript:void(0)">Sample Title</a></li>
        <li><a href="javascript:void(0)"><span>Sample List</span><i class="fas fa-angle-down fs_11"></i></a>
            <ul class="sub_menu">
                <li><a href="#"><i class="fa fa-list"></i><span> Sample 1</span></a></li>
                <li><a href="#"><i class="fa fa-list"></i><span> Sample 2</span></a></li>
            </ul>
        </li>
    </ul> -->
    <ul>
        <li><a style="color: #ffeb3b; background-color: #185abd;" href="<?php echo base_url(); ?>" target="_blank"><i class="fas fa-globe"></i> <span>View Website</span></a></li>
        <li class="nav_label"><a href="javascript:void(0)">Menu</a></li>
        <li><a href="<?php echo base_url('admin'); ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>

        <!--<li><a href="<?php echo base_url('admin/page') ?>"><i class="fas fa-file"></i> <span>Pages</span></a></li>-->
        <li><a href="<?php echo base_url('admin/all-vehicle') ?>"><i class="fas fa-car"></i> <span>All Vehicle</span></a></li>
        <li><a href="<?php echo base_url('admin/all-users') ?>"><i class="fas fa-users"></i> <span>All Users</span></a></li>
        
        <!-- <li><a href="<?php //echo base_url('admin/email-data') ?>"><i class="fa fa-envelope"></i><span> Mails </span></a></li> -->
        <!-- <li><a href="<?php //echo base_url('admin/contact-data') ?>"><i class="fa fa-envelope"></i><span> Website Contact </span></a></li> -->
    </ul>
    <ul>
        <li class="nav_label"><a href="javascript:void(0)">Users Booking</a></li>
        <li><a href="<?php echo base_url('admin/user-transaction?type=success') ?>"><i class="fas fa-exchange-alt"></i> <span>Success</span></a></li>
        <li><a href="<?php echo base_url('admin/user-transaction?type=canceled') ?>"><i class="fas fa-exchange-alt"></i> <span>Canceled</span></a></li>
        <li><a href="<?php echo base_url('admin/user-transaction?type=pending') ?>"><i class="fas fa-exchange-alt"></i> <span>Pending</span></a></li>
    </ul>
    <ul>
        <li class="nav_label"><a href="javascript:void(0)">Faq & Reviews</a></li>
        <li><a href="<?php echo base_url('admin/faq') ?>"><i class="fas fa-question-circle"></i><span> FAQ </span></a></li>
        <li><a href="<?php echo base_url('admin/review-contact') ?>"><i class="fa fa-star"></i><span> Reviews </span></a></li>
    </ul>
    <ul>
        <li class="nav_label"><a href="javascript:void(0)">Settings</a></li>
        <li><a href="<?php echo base_url('admin/my-profile') ?>"><i class="fa fa-cogs"></i> <span> Site Settings </span></a></li>
        <li><a href="<?php echo base_url('admin/my-profile') ?>"><i class="fa fa-user"></i> <span> My Profile </span></a></li>
        <li><a href="<?php echo base_url('admin/change-password'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/lock.png"> <span>Change Password</span></a></li>
        <li><a href="<?php echo base_url('admin/admin-logout'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/logout.png"> <span>Logout</span></a></li>
    </ul>
</div>