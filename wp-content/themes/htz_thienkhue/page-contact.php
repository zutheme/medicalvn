<?php
/**
 *  Template Name: Contact
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
<?php //$banner = get_field('banner_single','customizer'); ?>
<!--med_tittle_section-->
<!-- <div class="med_tittle_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="med_tittle_cont_wrapper">
                        <div class="med_tittle_cont">
                            <h1><?php //the_title(); ?></h1>
                            <?php //custom_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div> -->
<!-- med_tittle_section End -->
<?php get_template_part('layout/contact-us');
get_template_part('layout/partner');
get_template_part('layout/lucky');
get_footer();
?>

