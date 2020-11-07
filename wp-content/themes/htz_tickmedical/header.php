<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="izqZdZy0VITwqHUGnxebJZtyge2Dn_NYhUoscW1fQ14" />
  <meta name="facebook-domain-verification" content="2hkt24aepaqqb9dvwc809kyqmzoqfm">
  <?php if ( is_front_page() || is_home() ) { ?>
      <meta name="keywords" content="<?php echo get_field('keywords','customizer'); ?>">
  <?php } ?>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	 <!--start theme style -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/owl.theme.default.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_directory');?>/css/flaticon.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_directory');?>/css/fonts.css"> -->
   <!--  <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_directory');?>/css/style_2.css?v=0.1.8.1"> -->
    <!-- favicon link-->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/responsive.css?v=0.0.1.7">
   <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/multimenu.css?v=0.0.2.5">
    <!-- <link rel="stylesheet" type="text/css" href="<?php //bloginfo('template_directory');?>/fontawesome-free-5.14.0-web/css/fontawesome.min.css"> -->
    <!-- favicon link-->
    <?php $favicon = get_field('favicon','customizer'); ?>
    <link rel="shortcut icon" type="image/icon" href="<?php echo $favicon['url']; ?>">
	<?php wp_head(); ?>
</head>

<body>
  <!-- preloader Start -->
    <div id="preloader">
        <div id="status">
            <img src="<?php bloginfo('template_directory');?>/images/preloader.gif" id="preloader_image" alt="loader">
        </div>
    </div>
    <?php if ( is_front_page() || is_home() ) { 
       get_template_part('layout/header-home');
      }else { 
        get_template_part('layout/header-single');
      } ?>
  