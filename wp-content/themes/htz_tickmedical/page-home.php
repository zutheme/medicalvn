<?php
/**
 *  Template Name: Home template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eleaning
 */
get_header(); ?>

<?php 
get_template_part('layout/slider-tick');
get_template_part('layout/work-time');
get_template_part('layout/search-block');
get_template_part('layout/about');
get_template_part('layout/our-services');
//get_template_part('layout/portfolio-video');
get_template_part('layout/slider-video-multi');
//get_template_part('layout/doctor');
get_template_part('layout/about1');
get_template_part('layout/chuyen-vien');
//get_template_part('layout/call-service');
get_template_part('layout/testimonial');
//get_template_part('layout/event');
get_template_part('layout/uu-dai');
//get_template_part('layout/video-client');
//get_template_part('layout/portfolio');
//get_template_part('layout/blog');
get_template_part('layout/blog-news');
//get_template_part('layout/blog-chuyengia');
//get_template_part('layout/blog-hoidap');
//get_template_part('layout/portfolio-menu');
get_template_part('layout/register-form');
get_template_part('layout/register-form-gift');
//get_template_part('layout/partner'); ?>

<?php get_footer(); ?>

