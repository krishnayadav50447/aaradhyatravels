<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (empty($title)?site_title():$title); ?></title>

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>viewer_assets/images/favicons/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>viewer_assets/images/favicons/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>viewer_assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>viewer_assets/images/favicons/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>viewer_assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="<?php echo base_url(); ?>viewer_assets/images/favicons/manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>viewer_assets/images/favicons/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />
    <!-- FAVICONS END -->

    <meta name="description" content="<?php echo (empty($meta_des)?default_meta_des():$meta_des); ?>"/>
    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="keywords" content="<?php echo (empty($meta_key)?default_meta_key():$meta_key); ?>" />
    <meta name="author" content="<?php site_title(); ?>">
    
    <meta property="og:title" content="<?php echo (empty($title)?site_title():$title); ?>" />
    <meta property="og:url" content="<?php echo get_full_url(); ?>" />
    <meta property="og:description" content="<?php echo (empty($meta_des)?default_meta_des():$meta_des); ?>" />
    <meta property="og:image" content="<?php echo (empty($meta_og_img)?default_og_img():$meta_og_img); ?>" />
    <meta property="og:image:url" content="<?php echo (empty($meta_og_img)?default_og_img():$meta_og_img); ?>" />
    <!--<meta property="og:image:width" content="1200" />-->
    <!--<meta property="og:image:height" content="600" />-->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/viewer_assets/css/animate.css" type="text/css"/>

    <link rel="stylesheet" href="<?php echo base_url('viewer_assets/css/style.css?v=').get_version(); ?>" type="text/css"/>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
</head>
<body>
<div style='position: fixed; top: 0; left: 0; right:0; bottom:0; z-index:99999999; display:grid; align-items:center; justify-content:center; background-color:#c0c0c038;' id='preloader'><div class="pre_loader"></div></div>

<header></header>

