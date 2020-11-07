<?php
// Register and load the widget
function htz_video_play_fixed() {
    register_widget( 'htz_video_plays' );
}
add_action( 'widgets_init', 'htz_video_play_fixed' );
// Creating the widget 
class htz_video_plays extends WP_Widget  {
 
function __construct() {
    parent::__construct(  
        // Base ID of your widget
        'htz_video_plays',       
        // hatazu video_play  will appear in UI
        __('video_play htz', 'htz_video_play_domain'),         
        // Widget description
        array( 'description' => __( 'video_play htz', 'htz_video_play_domain' ), ) 
        );
    }
 
    // Creating widget front-end
     
    public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
             
            // before and after widget arguments are defined by themes
            //echo $args['before_widget'];
            //if ( ! empty( $title ) )
            //echo $args['before_title'] . $title . $args['after_title'];
             
            // This is where you run the code and display the output
            //echo __( 'Hello, World!', 'htz_video_play_domain' ); ?>
            <div class="vedio_wrapper" style="background:url('<?php echo esc_attr( get_option('home-client-background') ); ?>') 50% 0 repeat-y;">
            <div class="vedio_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="vedio_heading_wrapper wow fadeInDown" data-wow-delay="0.5s">
                            <h1 class="med_bottompadder20">Video khách hàng</h1>
                            <img src="<?php bloginfo('template_directory');?>/images/Icon_team.png" alt="line" class="med_bottompadder20">
                            <p>Chia sẽ những câu chuyện có thật của khách hàng</p>
                            <h4><a class="popup-youtube" href="https://www.youtube.com/embed/xImpyYRVGOc"><img src="<?php bloginfo('template_directory');?>/images/Play-Icon.png" alt="Play"> play video</a></h4>
                            <div class="video_btn_wrapper right">
                                <ul>
                                    <li><a class="btn" href="#">Về chúng tôi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php //echo $args['after_widget'];
        }
             
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'New title', 'htz_video_play_domain' );
        }
        // Widget admin form
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
} ?>
