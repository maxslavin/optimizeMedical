<?php
add_action( 'widgets_init','webriti_recent_works'); 
   function webriti_recent_works() { return   register_widget( 'webritihc_footer_recent_works' ); }

/**
 * Adds widget for recent work in footer.
 */
class webritihc_footer_recent_works extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'webritihc_footer_recent_works', // Base ID
			__('Health Center Footer Recent Works', 'health'), // Name
			array( 'description' => __( 'The Recent post display on your site ', 'health' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number_of_posts = apply_filters( 'widget_title', $instance['number_of_posts'] );
		if($number_of_posts=='') { $number_of_posts = 5; }
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title']; ?>		
		<?php $loop = new WP_Query(array( 'post_type' => 'post', 'showposts' => $number_of_posts ));
			if( $loop->have_posts() ) : 
			while ( $loop->have_posts() ) : $loop->the_post();?>				
					<div class="media hc_footer_widget_post">
                        <?php $defalt_arg =array('class' => "media-object hc_footer_widget_post_img " )?>
							<?php if(has_post_thumbnail()):?>
							<a class="hc_footer_widget_move" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"  ><?php the_post_thumbnail('health_center_recentpostwidget', $defalt_arg); ?></a>
							<?php endif;?>
                        <div class="media-body">
							<h3><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
							<span class="hc_footer_widget_date"><?php echo get_the_date( 'F j, Y' ); ?></span>
						</div>
                    </div>					
			<?php endwhile; ?>		
			<?php endif; ?>		
		<?php		
		echo $args['after_widget']; // end of sidbar usefull links widget		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )  && isset( $instance[ 'number_of_posts' ] )) {
			$title = $instance[ 'title' ];
			$number_of_posts = $instance[ 'number_of_posts' ];
		}
		else {
			$title = __( 'Latest News', 'health' );
			$number_of_posts = 5;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','health' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of pages to show:','health' ); ?></label> 
		<input size="3" maxlength="2"id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $number_of_posts ); ?>" />
		</p>		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';
		return $instance;
	}

} // class Foo_Widget
?>