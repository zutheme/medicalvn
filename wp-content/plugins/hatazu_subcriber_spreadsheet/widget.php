<?php
/* Register and load the widget */
function htz_subscriber_fixed() {
    register_widget( 'htz_subscribers' );
}
add_action( 'widgets_init', 'htz_subscriber_fixed' );
// Creating the widget 
class htz_subscribers extends WP_Widget  {
 
function __construct() {
    parent::__construct(  
        // Base ID of your widget
        'htz_subscribers',       
        // hatazu subscriber  will appear in UI
        __('subscriber htz', 'htz_subscriber_domain'),         
        // Widget description
        array( 'description' => __( 'subscriber htz', 'htz_subscriber_domain' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
            $desc_subscriber = $instance[ 'desc_subscriber'];
            //before and after widget arguments are defined by themes
            //echo $args['before_widget'];
            //if ( ! empty( $title ) )
            //echo $args['before_title'] . $title . $args['after_title'];
            //echo __( 'Hello, World!', 'htz_subscriber_domain' );
           ?>
          <form class="register-frm">
                <ul>
                    <li class="name">
                        <label>Họ <span></span></label>
                        <input type="text" name="lastname" placeholder="Họ">
                    </li>
                    <li class="name">
                        <label>Tên <span></span></label>
                        <input type="text" name="firstname" placeholder="Tên">
                    </li>
                    <li>
                        <label>Điện thoại <span>*</span></label>
                        <input type="number" name="phone" placeholder="Điện thoại">
                    </li>
                    <li>
                        <label>Email <span>*</span></label>
                        <input type="email" name="email" placeholder="Email">
                    </li>
					
                    <li>
                        <!--<label>Ngành học <span>*</span></label>-->
                        <?php $args = array(
                        'show_option_all'    => 'Chọn khóa học',
                        'show_option_none'   => '',
                        'orderby'            => 'ID',
                        'order'              => 'ASC',
                        'show_count'         => 0,
                        'hide_empty'         => 0,
                        'child_of'           => 0,
                        'exclude'            => '1,5',
                        'echo'               => 1,
                        'selected'           => 0,
                        'hierarchical'       => 0,
                        'name'               => 'sel-course',
                        'id'                 => 'id_course',
                        'class'              => '',
                        'depth'              => 1,
                        'tab_index'          => 0,
                        'taxonomy'           => 'group_course',
                        'hide_if_empty'      => false,
                             ); ?>
                <?php //wp_dropdown_categories( $args ); ?>
						 <label>Khóa học <span>*</span></label>
                        <?php $course = get_field('course_general','customizer'); ?>
						<select name="sel-course">
							<option value="">Khóa học</option>
							<?php if ($course) :?>
							<?php foreach ($course as $value) :?>
								<option value="<?php  echo $value['course_text']; ?>"><?php  echo $value['course_text']; ?></option> 				
							<?php endforeach;?>           
							<?php endif;?>						
						</select>
                    </li>
                    <li>
						<?php $nation = get_field('nation_general','customizer'); ?>
                        <select id="id_course" name="sel-course">
                        <option value="">Quốc gia</option>
						<?php if ($nation) :?>
						<?php foreach ($nation as $value) :?>
							<option value="<?php  echo $value['nation_text']; ?>"><?php  echo $value['nation_text']; ?></option> 				
						<?php endforeach;?>           
						<?php endif;?>						
						</select>
                       
                    </li>
                    <!-- <li>
                        <label>DATE <span>*</span></label>
                        <input type="text" placeholder="FROM" class="deat">
                        <input type="text" placeholder="TO" class="deat2">
                    </li> -->
                    <li>
                        <label>Nội dung <span>*</span></label>
                       <textarea class="control" col="10" rows="3" name="note"></textarea>
                    </li>
                </ul>
                <div class="next-page text-center">
                <a href="javascript:void(0);" class="btn-register">Xác nhận</a>
            </div>
            </form>
            <?php 
            //echo $args['after_widget'];
        }
             
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'htz_subscriber_domain' );
        }
        if ( isset( $instance[ 'desc_subscriber' ] ) ) {
            $desc_subscriber = $instance[ 'desc_subscriber'];
        }else {
            $desc_subscriber = __( 'description', 'htz_subscriber_domain' );
        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
         <p>
        <label for="<?php echo $this->get_field_id( 'desc_subscriber' ); ?>"><?php _e( 'description: ' ); ?></label> 
        <textarea col='2' row='10' class="widefat" id="<?php echo $this->get_field_id( 'desc_subscriber' ); ?>" name="<?php echo $this->get_field_name( 'desc_subscriber' ); ?>"><?php echo esc_attr( $desc_subscriber ); ?></textarea>
        </p>
    <?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
         $instance['desc_subscriber'] = ( ! empty( $new_instance['desc_subscriber'] ) ) ? strip_tags( $new_instance['desc_subscriber'] ) : '';
        return $instance;
    }
} ?>
