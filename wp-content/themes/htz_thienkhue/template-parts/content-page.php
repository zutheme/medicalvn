<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package htz_thienkhue
 */

?>
<?php
$id_post = get_the_ID();
$media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
  //$media = wp_get_attachment_image_src( get_post_thumbnail_id($id_post), 'media', false );
the_content();

		