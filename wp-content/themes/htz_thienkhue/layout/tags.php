<?php $defaults = array(
    'smallest'   => 5,
    'largest'    => 10,
    'unit'       => 'pt',
    'number'     => 7,
    'format'     => 'list',
    'separator'  => "",
    'orderby'    => 'name',
    'order'      => 'ASC',
    'exclude'    => '',
    'include'    => '',
    'link'       => 'view',
    'taxonomy'   => 'post_tag',
    'post_type'  => '',
    'echo'       => true,
    'show_count' => 0,
);?>

<?php //wp_tag_cloud($defaults); ?>
	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="right_blog_category_wrapper">
    <h4 class="med_bottompadder10">Thẻ khóa</h4>
    <img src="<?php bloginfo('template_directory');?>/images/line.png" alt="img" class="img-responsive">
    <div class="gc_blog_cloud_side_menu">
        
        	<?php wp_tag_cloud($defaults); ?>
            <!-- <li><a href="#">java srcipt</a>
            </li>
            <li><a href="#">Html</a>
            </li>
            <li><a href="#">dmax</a>
            </li>
            <li><a href="#">money</a>
            </li>
            <li><a href="#">theme</a>
            </li>
            <li><a href="#">insta</a>
            </li>
            <li><a href="#">jquery</a>
            </li>
            <li><a href="#">Money</a>
            </li>
            <li><a href="#">update</a>
            </li> -->

           
        </div>
    </div>
</div>