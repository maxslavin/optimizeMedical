<?php 
add_action( 'widgets_init','webriti_footer_widget_contact'); 
   function webriti_footer_widget_contact() { return   register_widget( 'webritihc_footer_contact_widget' ); }
/**
 * Adds HC footer contact  widget.
 */
class webritihc_footer_contact_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'webritihc_footer_contact_widget', // Base ID
			__('Health Center Footer Contact', 'health'), // Name
			array( 'description' => __( 'Your contact details display', 'health' ), ) // Args
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
		$Contact_address = apply_filters( 'widget_title', $instance['Contact_address'] );
		$Contact_address_2 = apply_filters( 'widget_title', $instance['Contact_address_2'] );		
		$Contact_phone_number = apply_filters( 'widget_title', $instance['Contact_phone_number'] );
		$fax_number = apply_filters( 'widget_title', $instance['fax_number'] );
		$Contact_email_address = apply_filters( 'widget_title', $instance['Contact_email_address'] );
		
		
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title']; 
		
		?>
		<address>
			
			<?php if($Contact_address) { echo $Contact_address; } else { echo _('25, Lorem Lis Street','health'); } ?>
			<br />
			<?php if($Contact_address_2) { echo $Contact_address_2; } else { echo _('Dhanmandi California US','health'); } ?>
			<br />
			<abbr title="Phone"><?php _e('Phone:','health');?></abbr><?php if($Contact_phone_number) { echo $Contact_phone_number; } else { echo _('420-300-3850','health'); } ?><br />
			<abbr title="Phone"><?php _e('Fax:','health');?></abbr><?php if($fax_number) { echo $fax_number; } else { echo _('420-300-3850','health'); } ?><br />			
			<abbr title="Phone"><?php _e('Email:','health');?></abbr><a href="mailto:<?php if($Contact_email_address) { echo $Contact_email_address; } else { echo _('info@webriti.com','health'); } ?>"><?php if($Contact_email_address) { echo $Contact_email_address; } else { echo _('info@webriti.com','health'); } ?></a>
			
		</address>		
		<?php		
		echo $args['after_widget']; // end of footer usefull links widget		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )) { $title = $instance[ 'title' ];	}
		else {	$title = __( 'Contact Info', 'health' );		}
		
		if ( isset( $instance[ 'Contact_address' ] )) { $Contact_address = $instance[ 'Contact_address' ];	}
		else {	$Contact_address = __( 'New York City, USA ', 'health' );		}
		if ( isset( $instance[ 'Contact_address_2' ] )) { $Contact_address_2 = $instance[ 'Contact_address_2' ];	}
		else {	$Contact_address_2 = __( 'Dhanmandi California, US ', 'health' );		}
		
		if ( isset( $instance[ 'Contact_phone_number' ] )) { $Contact_phone_number = $instance[ 'Contact_phone_number' ];	}
		else {	$Contact_phone_number = __( '420-300-3850', 'health' );		}
		
		if ( isset( $instance[ 'fax_number' ] )) { $fax_number = $instance[ 'fax_number' ];	}
		else {	$fax_number = __( '420-300-3850', 'health' );		}
		
		if ( isset( $instance[ 'Contact_email_address' ] )) { $Contact_email_address = $instance[ 'Contact_email_address' ];	}
		else {	$Contact_email_address = __( 'info@webriti.com ', 'health' );		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:','health' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'Contact_address' ); ?>"><?php _e( 'Contact address:','health' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_address' ); ?>" name="<?php echo $this->get_field_name( 'Contact_address' ); ?>" type="text" value="<?php echo $Contact_address; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'Contact_address_2' ); ?>"><?php _e( 'Contact address Line Two:','health' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_address_2' ); ?>" name="<?php echo $this->get_field_name( 'Contact_address_2' ); ?>" type="text" value="<?php echo $Contact_address_2; ?>" />
		</p>
		<p>	<label for="<?php echo $this->get_field_id( 'Contact_phone_number' ); ?>"><?php _e( 'Contact phone number:','health' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_phone_number' ); ?>" name="<?php echo $this->get_field_name( 'Contact_phone_number' ); ?>" type="text" value="<?php echo $Contact_phone_number ; ?>" />
		</p>
		<p>	<label for="<?php echo $this->get_field_id( 'fax_number' ); ?>"><?php _e( 'Fax Number:','health' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'fax_number' ); ?>" name="<?php echo $this->get_field_name( 'fax_number' ); ?>" type="text" value="<?php echo $fax_number ; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'Contact_email_address' ); ?>"><?php _e( 'Contact email address:','health' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'Contact_email_address' ); ?>" name="<?php echo $this->get_field_name( 'Contact_email_address' ); ?>" type="text" value="<?php echo $Contact_email_address; ?>" />
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
		$instance['Contact_address'] = ( ! empty( $new_instance['Contact_address'] ) ) ? strip_tags( $new_instance['Contact_address'] ) : '';$instance['Contact_address_2'] = ( ! empty( $new_instance['Contact_address_2'] ) ) ? strip_tags( $new_instance['Contact_address_2'] ) : '';
		$instance['fax_number'] = ( ! empty( $new_instance['fax_number'] ) ) ? strip_tags( $new_instance['fax_number'] ) : '';
		$instance['Contact_phone_number'] = ( ! empty( $new_instance['Contact_phone_number'] ) ) ? strip_tags( $new_instance['Contact_phone_number'] ) : '';	
		$instance['Contact_email_address'] = ( ! empty( $new_instance['Contact_email_address'] ) ) ? strip_tags( $new_instance['Contact_email_address'] ) : '';	
		return $instance;
	}

} // class Foo_Widget
?>