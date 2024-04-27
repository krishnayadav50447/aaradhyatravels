<header>
    <div class="header_ul">
        <ul class="nav_width">
            <li><a href="javascript:void(0)" class="ope_mob_nav"><img src="<?php echo base_url(); ?>admin_assets/images/icons/grid.png"></a></li>
            <li><a class="no_hvr fs_16 text-white">Webina Tech</a></li>
            <li class="ms-auto ope_icon"><a href="javascript:void(0)" class="px-0 no_hvr"><img src="<?php echo base_url(); ?>admin_assets/images/icons/back.png"></a></li>
        </ul>
        <ul>
            <li class="px-lg-5 px-md-3"><a class="no_hvr input_li" style="position: relative;"><img class="search_icon" src="<?php echo base_url(); ?>admin_assets/images/icons/search.png"> <input type="search" placeholder="Search"></a></li>
        </ul>

        <ul class="ms-auto _admin_assets">
            <li><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>admin_assets/images/icons/email.png"></a>
                <div class="other_apps">
                    <p class="mb-0 fs_14 d-flex">4 New Messages <a href="javascript:void(0)" class="a_btn ms-auto fs_12">View All</a></p>
                    <ul class="notice_ul message_icon">
                        <li><a href="#"><img src="<?php echo base_url(); ?>/uploads/profile_media/profile_media.png">
                            <span class="clip_txt_2">Leonardo De Caprio<br><small style="color: #999; position: relative; top: -3px;">Project Submitted</small></span>
                            <small class="ms-auto" style="position:relative; top:-11px; color: #999">1 min</small></a></li>

                        <li><a href="#"><img src="<?php echo base_url(); ?>/uploads/profile_media/profile_media.png">
                        <span class="clip_txt_2">Asif Ali<br><small style="color: #999; position: relative; top: -3px;">Project Updated</small></span>
                        <small class="ms-auto" style="position:relative; top:-11px; color: #999">1 hrs</small></a></li>

                        <li><a href="#"><img src="<?php echo base_url(); ?>/uploads/profile_media/profile_media.png">
                        <span class="clip_txt_2">Mofijul Hasan Ali<br><small style="color: #999; position: relative; top: -3px;">Meeting Fixed</small></span>
                        <small class="ms-auto" style="position:relative; top:-11px; color: #999">2 hrs</small></a></li>

                        <li><a href="#"><img src="<?php echo base_url(); ?>/uploads/profile_media/profile_media.png">
                            <span class="clip_txt_2">Leonardo De Caprio<br><small style="color: #999; position: relative; top: -3px;">Project Submitted</small></span>
                            <small class="ms-auto" style="position:relative; top:-11px; color: #999">1 min</small></a></li>
                    </ul>
                </div>
            </li>
            <li><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/bell.png"></a></li>
             <li><a href="<?php echo base_url('admin/change-password'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/settings.png"></a></li> 
            <li><a href="javascript:void(0)"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/user.png" style="height: 14px; margin-right: 8px;">  <?php echo $session_data['admin_name']; ?></a>
                <div class="other_apps">
                    <div class="user_info">
                        <div><img src="<?php echo empty($session_data['admin_profile_img'])?base_url('uploads/profile_media/profile_media.png'):$session_data['admin_profile_img']; ?>"></div>
                        <h6><?php echo $session_data['admin_name']; ?><br><small><?php echo $session_data['admin_email']; ?></small></h6>
                    </div>
                    <ul class="notice_ul notice_icon">
                        <li><a href="<?php echo base_url('admin/my-profile'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/user.png"><span> Profile</span></a></li>
                        <li><a href="<?php echo base_url('admin/my-profile'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/edit.png"><span> Edit Profil</span></a></li>
                        <li><a href="<?php echo base_url('admin/admin-logout'); ?>"><img src="<?php echo base_url(); ?>/admin_assets/images/icons/logout-1.png"><span> Logout</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>

<script type="text/javascript">
var base_url="<?php echo base_url(); ?>";
var csrfName="<?php echo $csrfName; ?>";
var csrfHash="<?php echo $csrfHash; ?>";
</script>