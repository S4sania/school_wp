<?php
/**
 * Newsletter Widget
 *
 * @package Theme Palace
 * @subpackage Academic Pro
 * @since 1.0
 */
if ( ! class_exists( 'Academic_Pro_Newsletter' ) ) :
/**
 * Main plugin class.
 *
 */
class Academic_Pro_Newsletter extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor. Set the default widget options and create widget.
	 *
	 * @since 1.0
	 */
	function __construct() {
		$this->defaults = array(
			'title'            => '',
			'service'          => '',
			'open_same_window' => 0,
			'fname_field'      => '',
			'lname_field'      => '',
			'email_field'      => '',
			'hidden_fields'    => '',
			'fname_text'       => esc_html__( 'First Name', 'academic-pro' ),
			'lname_text'       => esc_html__( 'Last Name', 'academic-pro' ),
			'email_text'       => esc_html__( 'Email', 'academic-pro' ),
			'button_text'      => esc_html__( 'Subscribe', 'academic-pro' ),
			'feedburner_id'    => '',
			'action'           => '',
			'mailpoet_check'   => esc_html__( 'Check your inbox or spam folder now to confirm your subscription.', 'academic-pro' ),
			'mailpoet_subbed'  => esc_html__( 'You\'ve successfully subscribed.', 'academic-pro' ),
		);

		$widget_ops = array(
			'classname'   => 'academic-pro-newsletter',
			'description' => esc_html__( 'Display newsletter.', 'academic-pro' ),
		);

		$control_ops = array(
			'id_base' => 'academic-pro-newsletter',
		);

		parent::__construct(
			'academic-pro-newsletter', // Base ID
			esc_html__( 'TP: Newsletter', 'academic-pro' ), // Name
			$widget_ops,
			$control_ops
		);
	}

	/**
	 * Echo the settings update form.
	 *
	 * @since 1.0
	 *
	 * @param array $instance Current settings.
	 */
	function form( $instance ) {
		// Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		$style = 'style="display: none;"';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'academic-pro' ); ?>:</label><br />
			<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'service' ) ); ?>"><?php esc_html_e( 'Service', 'academic-pro' ); ?>:</label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'service' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'service' ) ); ?>" class="academic-pro-newsletter-service widefat">
				<?php
					$post_type_choices = array(
						''           => esc_html__( '--Select One--', 'academic-pro' ),
						'feedburner' => esc_html__( 'Google/Feedburner', 'academic-pro' ),
						'mailchimp'  => esc_html__( 'MailChimp', 'academic-pro' ),
						'mailpoet'   => esc_html__( 'MailPoet', 'academic-pro' ),
						'custom'     => esc_html__( 'Custom', 'academic-pro' ),
					);

				foreach ( $post_type_choices as $key => $value ) {
					echo '<option value="' . esc_attr( $key ) . '" '. selected( $key, $instance['service'], false ) .'>' . esc_html( $value ) .'</option>';
				}
				?>
			</select>
			<span class="description"><?php esc_html_e( 'Save widget after changing Service value to show relevant options', 'academic-pro' ); ?></span>
		</p>

		<div class="academic-pro-service-options" <?php if( '' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>

			<?php
			if ( class_exists( 'WYSIJA' ) ) {
				$mp_model_list = WYSIJA::get( 'list','model' );
				$mp_lists = $mp_model_list->get( array( 'name','list_id' ), array(
					'is_enabled' => 1,
				) );
				?>
				<div class="academic-pro-box">
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( 'mailpoet-list' ) ); ?>"><?php esc_html_e( 'MailPoet List', 'academic-pro' ); ?>:</label>
						<fieldset>
							<ul>
								<?php foreach ( $mp_lists as $mp_list ) : ?>
								<li>
									<label>
										<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'mailpoet-list' ) ); ?>[]" value="<?php echo esc_attr( $mp_list['list_id'] ); ?>" <?php if ( isset( $instance['mailpoet-list'] ) ) { checked( in_array( $mp_list['list_id'], (array) $instance['mailpoet-list'] ) ); } ?> />
										<?php echo esc_html( $mp_list['name'] ); ?>
									</label>
								</li>
								<?php endforeach; ?>
							</ul>

							<small>
								<?php esc_html_e( 'Show Fields:', 'academic-pro' ); ?><br/>
								<label>
									<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'mailpoet-show-fname' ) ); ?>" value="1" <?php checked( isset( $instance['mailpoet-show-fname'] ) ); ?> />
									<?php esc_html_e( 'First Name', 'academic-pro' ); ?>
								</label>
								<label>
									<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'mailpoet-show-lname' ) ); ?>" value="1" <?php checked( isset( $instance['mailpoet-show-lname'] ) ); ?> />
									<?php esc_html_e( 'Last Name', 'academic-pro' ); ?>
								</label>

							</small>

							<p>
								<label for="<?php echo esc_attr( $this->get_field_id( 'mailpoet_check' ) ); ?>"><?php esc_html_e( 'Text Displayed If Confirmation Needed', 'academic-pro' ); ?>:</label><br />
								<textarea id="<?php echo esc_attr( $this->get_field_id( 'mailpoet_check' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mailpoet_check' ) ); ?>" class="widefat" rows="6" cols="4"><?php echo htmlspecialchars( $instance['mailpoet_check'] ); ?></textarea>
							</p>
							<p>
								<label for="<?php echo esc_attr( $this->get_field_id( 'mailpoet_subbed' ) ); ?>"><?php esc_html_e( 'Text Displayed If Subscribed', 'academic-pro' ); ?>:</label><br />
								<textarea id="<?php echo esc_attr( $this->get_field_id( 'mailpoet_subbed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mailpoet_subbed' ) ); ?>" class="widefat" rows="6" cols="4"><?php echo htmlspecialchars( $instance['mailpoet_subbed'] ); ?></textarea>
							</p>
						</fieldset>
					</p>
				</div><!-- .academic-pro-box -->
			<?php
			} //endif class_exists check
			?>

			<p class="academic-pro-feedburner-id" <?php if( 'feedburner' != $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
				<label for="<?php echo esc_attr( $this->get_field_id( 'feedburner_id') ); ?>"><?php esc_html_e( 'Google/Feedburner ID', 'academic-pro' ); ?>:</label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'feedburner_id') ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'feedburner_id') ); ?>" value="<?php echo esc_attr( $instance['feedburner_id'] ); ?>" class="widefat" /><br />
			</p>

			<div class="academic-pro-box" <?php if( 'feedburner' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
				<p <?php if( 'mailpoet' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'action' ) ); ?>"><?php esc_html_e( 'Form Action', 'academic-pro' ); ?>:</label>
					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'action' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'action' ) ); ?>" value="<?php echo esc_attr( $instance['action'] ); ?>" class="widefat" />
				</p>

				<h2 <?php if( 'mailpoet' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>><?php esc_html_e( ' Text Field Values', 'academic-pro' ); ?> </h2>

				<p <?php if( 'mailpoet' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'fname_field' ) ); ?>"><?php esc_html_e( 'First Name Field', 'academic-pro' ); ?>:</label>
					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'fname_field' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fname_field' ) ); ?>" value="<?php echo esc_attr( $instance['fname_field'] ); ?>" class="widefat" />
				</p>

				<p <?php if( 'mailpoet' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'lname_field' ) ); ?>"><?php esc_html_e( 'Last Name Field', 'academic-pro' ); ?>:</label>
					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'lname_field' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lname_field' ) ); ?>" value="<?php echo esc_attr( $instance['lname_field'] ); ?>" class="widefat" />
				</p>

				<p <?php if( 'mailpoet' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'email_field' ) ); ?>"><?php esc_html_e( 'E-Mail Field', 'academic-pro' ); ?>:</label>
					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'email_field' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email_field' ) ); ?>" value="<?php echo esc_attr( $instance['email_field'] ); ?>" class="widefat" />
				</p>

				<p <?php if( 'mailchimp'== $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'hidden_fields' ) ); ?>"><?php esc_html_e( 'Hidden Fields', 'academic-pro' ); ?>:</label>
					<textarea id="<?php echo esc_attr( $this->get_field_id( 'hidden_fields' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hidden_fields' ) ); ?>" class="widefat"><?php echo esc_html( $instance['hidden_fields'] ); ?></textarea>
					<br><small><?php esc_html_e( 'Not all services use hidden fields.', 'academic-pro'); ?></small>
				</p>

				<p <?php if( 'mailpoet' == $instance['service'] || 'mailchimp'== $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<input id="<?php echo esc_attr( $this->get_field_id( 'open_same_window' ) ); ?>" type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'open_same_window' ) ); ?>" value="1" <?php checked( $instance['open_same_window'] ); ?>/>
					<label for="<?php echo esc_attr( $this->get_field_id( 'open_same_window' ) ); ?>"><?php esc_html_e( 'Open confirmation page in same window?', 'academic-pro' ); ?></label>
				</p>
			</div><!-- .academic-pro-box -->

			<div class="academic-pro-box">
				<h2><?php esc_html_e( 'Text Field Labels', 'academic-pro' ); ?> </h2>

				<p class="academic-pro-fname-text" <?php if( 'feedburner' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'fname_text' ) ); ?>"><?php esc_html_e( 'First Name Label', 'academic-pro' ); ?>:</label>

					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'fname_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fname_text' ) ); ?>" value="<?php echo esc_attr( $instance['fname_text'] ); ?>" class="widefat"/>
				</p>

				<p <?php if( 'feedburner' == $instance['service'] ) { echo wp_kses_post( $style ); } ?>>
					<label for="<?php echo esc_attr( $this->get_field_id( 'lname_text' ) ); ?>"><?php esc_html_e( 'Last Name Label', 'academic-pro' ); ?>:</label>

					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'lname_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'lname_text' ) ); ?>" value="<?php echo esc_attr( $instance['lname_text'] ); ?>" class="widefat"/>
				</p>

				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>"><?php esc_html_e( 'E-Mail Label', 'academic-pro' ); ?>:</label>

					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'email_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email_text' ) ); ?>" value="<?php echo esc_attr( $instance['email_text'] ); ?>" class="widefat"/>
				</p>

				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php esc_html_e( 'Subscribe Button Text', 'academic-pro' ); ?>:</label>

					<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" value="<?php echo esc_attr( $instance['button_text'] ); ?>" class="widefat" />
				</p>
			</div><!-- .academic-pro-box -->
		</div><!-- .academic-pro-service-options -->
	<?php
	}

	/**
	 * Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If false is returned, the instance won't be saved / updated.
	 *
	 * @since 1.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form().
	 * @param array $old_instance Old settings for this instance.
	 *
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {

		$new_instance['title']            = strip_tags( $new_instance['title'], "<i>" );
		$new_instance['hidden_fields']    = strip_tags( $new_instance['hidden_fields'], "<div>, <fieldset>, <input>, <label>, <legend>, <option>, <optgroup>, <select>, <textarea>" );
		$new_instance['open_same_window'] = academic_pro_sanitize_checkbox( $new_instance['open_same_window']);
		$new_instance['fname_field']      = sanitize_text_field( $new_instance['fname_field']);
		$new_instance['lname_field']      = sanitize_text_field( $new_instance['lname_field']);
		$new_instance['email_field']      = sanitize_text_field( $new_instance['email_field']); // Use sanitize_text_field, do not use sanitize_email as this is field name
		$new_instance['fname_text']       = sanitize_text_field( $new_instance['fname_text']);
		$new_instance['lname_text']       = sanitize_text_field( $new_instance['lname_text']);
		$new_instance['email_text']       = sanitize_text_field( $new_instance['email_text']);// Use sanitize_text_field, do not use sanitize_email as this is field label
		$new_instance['button_text']      = sanitize_text_field( $new_instance['button_text']);

		$new_instance['feedburner_id']  = str_replace( 'http://feeds.feedburner.com/', '', $new_instance['feedburner_id'] );

		$new_instance['action']  = $new_instance['action']; //No sanitization as if done so, will certainly break some url forms

		if ( isset( $new_instance['mailpoet_check'] ) ) {
			$new_instance['mailpoet_check'] = wp_kses_post( $new_instance['mailpoet_check'] );
		}

		if ( isset( $new_instance['mailpoet_subbed'] ) ) {
			$new_instance['mailpoet_subbed']  = wp_kses_post( $new_instance['mailpoet_subbed'] );
		}

		return $new_instance;
	}

	/**
	 * Echo the widget content.
	 *
	 * @since 1.0
	 *
	 * @param array $args     Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// // Merge with defaults
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		if ( ! empty( $instance['title'] ) )
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

		if ( 'feedburner' == $instance['service'] ) {
			if ( ! empty( $instance['feedburner_id'] ) ) { ?>
				<div class="hentry academic-pro-newsletter-wrap newsletter-google">
					<form id="subscribe-<?php echo esc_attr( $this->id ); ?>" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_js( $instance['feedburner_id'] ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" name="<?php echo esc_attr( $this->id ); ?>">

						<label for="subbox" class="screen-reader-text"><?php echo esc_html( $instance['email_text'] ); ?></label>

						<input type="email" value="" id="subbox" class="academic-pro-newsletter-subbox" placeholder="<?php echo esc_attr( $instance['email_text'] ); ?>" name="email" required="required"/>

						<input type="hidden" name="uri" value="<?php echo esc_attr( $instance['feedburner_id'] ); ?>" />

						<input type="hidden" name="loc" value="<?php echo esc_attr( get_locale() ); ?>" />

						<button type="submit" class="btn btn-blue"><?php echo esc_html( $instance['button_text'] ); ?><i class="fa fa-angle-right"></i></button>
					</form>
				</div><!-- .academic-pro-newsletter-wrap.newsletter-google -->
			<?php
			}// end feedburner_id check
		} // end feedburner check
		else if ( 'mailpoet' == $instance['service'] ) {
			// Checks if MailPoet exists. If so, a check for form submission wil take place.
			if ( class_exists( 'WYSIJA' ) && isset( $_POST['submission-type'] ) && 'mailpoet' == $_POST['submission-type'] && ! empty( $instance['mailpoet-list'] ) ) {
				$subscriber_data = array(
					'user' => array(
						'firstname' => isset( $_POST['mailpoet-firstname'] ) ? $_POST['mailpoet-firstname'] : '',
						'lastname' 	=> isset( $_POST['mailpoet-lastname'] ) ? $_POST['mailpoet-lastname'] : '',
						'email' 	=> isset( $_POST['mailpoet-email'] ) ? $_POST['mailpoet-email'] : '',
					),
					'user_list' => array(
						'list_ids' => array_values( $instance['mailpoet-list'] )
					),
				);

	    		$mailpoet_subscriber_id = WYSIJA::get( 'user', 'helper' )->addSubscriber( $subscriber_data );
			}

		 	// Establishes current URL for MailPoet action fields.
			$current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

			if ( ! empty( $instance['mailpoet-list'] ) && 'disabled' != $instance['mailpoet-list'] ) { ?>
				<div class="hentry academic-pro-newsletter-wrap newsletter-mailpoet">
					<form id="subscribe<?php echo $this->id; ?>" action="<?php echo esc_url( $current_url ); ?>" method="post" onsubmit="if ( subbox1.value == '<?php echo esc_js( $instance['fname_text'] ); ?>') { subbox1.value = ''; } if ( subbox2.value == '<?php echo esc_js( $instance['lname_text'] ); ?>') { subbox2.value = ''; }" name="<?php echo esc_attr( $this->id ); ?>">

						<?php

						if ( ! empty( $mailpoet_subscriber_id ) && is_int( $mailpoet_subscriber_id ) ) {
							// confirmation message phrasing depends on whether the user has to verify his subscription or not
							$mailpoet_needs_confirmation = WYSIJA::get( 'config','model' )->getValue( 'confirm_dbleoptin' ); // bool
							$success_message = $mailpoet_needs_confirmation ? $instance['mailpoet_check'] : $instance['mailpoet_subbed'];
							?>

							<div class="mailpoet-message mailpoet-success <?php echo esc_attr( $mailpoet_needs_confirmation ) ? 'mailpoet-needs-confirmation' : 'mailpoet-confirmed'; ?>">
								<?php echo esc_html( $success_message ); ?>
							</div>
						<?php
						} //end if ( ! empty( $mailpoet_subscriber_id ) && is_int( $mailpoet_subscriber_id ) )
						?>

						<?php
						if ( isset( $instance['mailpoet-show-fname'] ) ) { ?>
							<label for="subbox1" class="screen-reader-text"><?php echo esc_html( $instance['fname_text'] ); ?></label>

							<input type="text" id="subbox1" class="academic-pro-newsletter-subbox" value="" placeholder="<?php echo esc_attr( $instance['fname_text'] ); ?>" name="mailpoet-firstname" />
						<?php
						} //end if ( isset( $instance['mailpoet-show-fname'] ) )
						?>

						<?php if ( isset( $instance['mailpoet-show-lname'] ) ) { ?>
							<label for="subbox2" class="screen-reader-text">
								<?php echo esc_html( $instance['lname_text'] ); ?>
							</label>

							<input type="text" id="subbox2" class="academic-pro-newsletter-subbox" value="" placeholder="<?php echo esc_attr( $instance['lname_text'] ); ?>" name="mailpoet-lastname" />
						<?php
						} //end if ( isset( $instance['mailpoet-show-lname'] ) )
						?>

						<label for="subbox" class="screen-reader-text">
							<?php echo esc_attr( $instance['email_text'] ); ?>
						</label>

						<input type="email" value="" id="subbox" class="academic-pro-newsletter-subbox" placeholder="<?php echo esc_attr( $instance['email_text'] ); ?>" name="mailpoet-email" required="required"/>

						<?php echo esc_textarea( $instance['hidden_fields'] ); ?>

						<input type="hidden" name="submission-type" value="mailpoet" />

						<input type="submit" value="<?php echo esc_attr( $instance['button_text'] ); ?>" id="subbutton" />
					</form>
				</div><!-- .academic-pro-newsletter-wrap.newsletter-mailpoet -->
			<?php
			}
		} //end mailpoet check
		else {
			if ( ! empty( $instance['action'] ) ) { ?>
				<div class="hentry academic-pro-newsletter-wrap newsletter-action <?php echo esc_attr( $instance['service'] );?>">
					<form id="subscribe<?php echo $this->id; ?>" action="<?php echo esc_attr( $instance['action'] ); ?>" method="post" <?php if ($instance['open_same_window'] == 0 ) : ?> target="_blank"<?php endif; ?> onsubmit="if ( subbox1.value == '<?php echo esc_js( $instance['fname_text'] ); ?>') { subbox1.value = ''; } if ( subbox2.value == '<?php echo esc_js( $instance['lname_text'] ); ?>') { subbox2.value = ''; }" name="<?php echo esc_attr( $this->id ); ?>">

						<label for="subbox" class="screen-reader-text">
							<?php echo esc_attr( $instance['email_text'] ); ?>
						</label>

						<input type="email" value="" id="subbox" class="academic-pro-newsletter-subbox" placeholder="<?php echo esc_attr( $instance['email_text'] ); ?>" name="<?php echo esc_js( $instance['email_field'] ); ?>" required="required"/>

						<?php echo esc_textarea( $instance['hidden_fields'] );?>
						<button type="submit" class="btn btn-blue"><?php echo esc_html( $instance['button_text'] ); ?><i class="fa fa-angle-right"></i></button>
					</form>
				</div><!-- .academic-pro-newsletter-wrap.newsletter-action -->
		<?php
			} // end if ( ! empty( $instance['action'] ) )
		} //end main if

		echo $after_widget;
	}
}
endif;