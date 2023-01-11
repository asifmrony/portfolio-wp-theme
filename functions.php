<?php

function load_styles_and_scripts() {
    /* Javascript libs */
    wp_enqueue_script('fancybox-js', get_theme_file_uri('/js/libs/jquery.fancybox.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('animsition-js', get_theme_file_uri('/js/libs/animsition.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('aos-js', get_theme_file_uri('/js/libs/aos.js'), array('jquery'), NULL, true);
    wp_enqueue_script('swiper-bundle-js', get_theme_file_uri('/js/libs/swiper-bundle.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('easy-number-animate-js', get_theme_file_uri('/js/libs/jquery.easy_number_animate.js'), array('jquery'), NULL, true);
    wp_enqueue_script('marquee-js', get_theme_file_uri('/js/libs/jquery.marquee.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('isotope-js', get_theme_file_uri('/js/libs/isotope.pkgd.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('packery-js', get_theme_file_uri('/js/libs/packery.pkgd.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('packery-mode-js', get_theme_file_uri('/js/libs/packery-mode.pkgd.min.js'), array('jquery'), NULL, true);
    wp_enqueue_script('pagepiling-js', get_theme_file_uri('/js/libs/jquery.pagepiling.js'), array('jquery'), NULL, true);
    wp_enqueue_script('simpleParallax-js', get_theme_file_uri('/js/libs/simpleParallax.min.js'), array('jquery'), NULL, true);
    // /* JavaScript */
    wp_enqueue_script('main_portfolio_js', get_theme_file_uri('js/main.js'),  array('jquery'), '1.0', true);
    wp_enqueue_script( 'contact-form', get_theme_file_uri('js/contact-form.js'), array(), '', true );
    /* CSS */
    wp_enqueue_style('bootstrap-grid-system', get_theme_file_uri('/css/bootstrap-grid.min.css'));
    wp_enqueue_style('custom-styles', get_theme_file_uri('/css/main.css'), array(), '1.0', false);
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

/* Favicon Loading way is not correct - need fix/attention */
function load_favicons() {
    /* favicon */
?>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_stylesheet_directory_uri();?>/favicons/apple-touch-icon.png" />
<?php
    echo "<link rel='icon' sizes='32x32' href='" . get_stylesheet_directory_uri() . "favicons/favicon-32x32.png' />" . "\n";
    echo "<link rel='icon' sizes='16x16' href='" . get_stylesheet_directory_uri() . "favicons/favicon-16x16.png' />" . "\n";
    echo "<link rel='manifest' href='" . get_stylesheet_directory_uri() . "favicons/site.webmanifest' />" . "\n";
    echo "<link rel='mask-icon' href='" . get_stylesheet_directory_uri() . "favicons/safari-pinned-tab.svg' color='#5bbad5' />" . "\n";
}
add_action('wp-head', 'load_favicons');


/* Theme Supports */
add_theme_support( 'post-thumbnails' );


/* Service Archive page default URL based query manipulation */
function portfolio_adjust_queries($query) {
    if(!is_admin() AND is_post_type_archive('service') AND $query->is_main_query()) {
        $query->set('posts_per_page', '4');
    }
    if(!is_admin() AND is_post_type_archive('project') AND $query->is_main_query()) {
        $query->set('posts_per_page', '8');
    }
}
add_action('pre_get_posts', 'portfolio_adjust_queries');

/*
Need Fix/Attention: Not working the way expected
Javascript based filter in blog archive page
Assign Multiple category based classes to single post
*/
function add_categories( $classes = '' ) {

    $categories = get_the_category();
    foreach( $categories as $category ) {
        $classes[] = '__js_'.$category->slug;
    }
    return $classes;
}

/* Contact Form */
add_shortcode( 'contact-form', 'display_contact_form' );
/**
 * This function displays the validation messages, the success message, the container of the validation messages, and the
 * contact form.
 */
function display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid name.', 'ronyportfolio' );
		}

		if ( strlen( $email ) === 0 or
		     ! is_email( $email ) ) {
			$validation_messages[] = esc_html__( 'Please enter a valid email address.', 'ronyportfolio' );
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid message.', 'ronyportfolio' );
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$mail    = get_option( 'admin_email' );
			$subject = 'New message from ' . $full_name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $subject, $message );

			$success_message = esc_html__( 'Your message has been successfully sent.', 'ronyportfolio' );

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>

    <!-- Echo a container used that will be used for the JavaScript validation -->
    <div id="validation-messages-container"></div>

    <form action="<?php echo esc_url( get_permalink() ); ?>" method="post" id="contact-form">
         
        <input type="hidden" name="contact_form">

        <div class="row justify-content-between gx-0">
            <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                <label class="discuss-project__field field">
                    <input type="text" name="name" id="name">
                    <span class="field__hint">Name</span>
                </label>
            </div>
            <div class="discuss-project__field-wrapper col-12 col-md-6" data-aos="fade-up">
                <label class="discuss-project__field field">
                    <input type="email" name="email" id="email">
                    <span class="field__hint">Email</span>
                </label>
            </div>
            <div class="col-12" data-aos="fade-up">
                <label class="discuss-project__field discuss-project__field--textarea field">
                    <textarea name="message" id="message" required></textarea>
                    <span class="field__hint">Message</span>
                </label>
            </div>
            <div class="discuss-project__bottom col-12">
                <div class="discuss-project__file file-upload" data-aos="fade-up">
                <label class="file-upload__label">
                    <input class="visually-hidden" type="file">
                    <span class="file-upload__icon">
                        <svg width="16" height="16">
                            <use xlink:href="#paper-clip"></use>
                        </svg>
                    </span>
                    <span class="file-upload__text">Attach a file</span>
                </label>
                </div>
                <button class="discuss-project__send btn--theme-black btn" type="submit" value="<?php echo esc_attr( 'Submit', 'ronyportfolio' ); ?>" id="contact-form-submit" data-aos="fade-up">
                    <span class="btn__text">Submit</span>
                    <span class="btn__icon">
                        <svg width="19" height="19">
                        <use xlink:href="#link-arrow"></use>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </form>

	<?php

}
function dummy_display_contact_form() {

	$validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid name.', 'twentytwentyone' );
		}

		if ( strlen( $email ) === 0 or
		     ! is_email( $email ) ) {
			$validation_messages[] = esc_html__( 'Please enter a valid email address.', 'twentytwentyone' );
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid message.', 'twentytwentyone' );
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$mail    = get_option( 'admin_email' );
			$subject = 'New message from ' . $full_name;
			$message = $message . ' - The email address of the customer is: ' . $mail;

			wp_mail( $mail, $subject, $message );

			$success_message = esc_html__( 'Your message has been successfully sent.', 'twentytwentyone' );

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>

    <!-- Echo a container used that will be used for the JavaScript validation -->
    <div id="validation-messages-container"></div>

    <form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
          method="post">

        <input type="hidden" name="contact_form">

        <div class="form-section">
            <label for="full-name"><?php echo esc_html( 'Full Name', 'twentytwentyone' ); ?></label>
            <input type="text" id="full-name" name="full_name">
        </div>

        <div class="form-section">
            <label for="email"><?php echo esc_html( 'Email', 'twentytwentyone' ); ?></label>
            <input type="text" id="email" name="email">
        </div>

        <div class="form-section">
            <label for="message"><?php echo esc_html( 'Message', 'twentytwentyone' ); ?></label>
            <textarea id="message" name="message"></textarea>
        </div>

        <input type="submit" id="contact-form-submit" value="<?php echo esc_attr( 'Submit', 'twentytwentyone' ); ?>">

    </form>

	<?php

}