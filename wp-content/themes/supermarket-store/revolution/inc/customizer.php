<?php
/**
 * Supermarket Store Theme Customizer
 *
 * @package Supermarket Store
 */

function supermarket_store_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'supermarket_store_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'supermarket_store_customize_partial_blogdescription',
			)
		);
	}

	/*
    * Theme Options Panel
    */
	$wp_customize->add_panel('supermarket_store_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Supermarket Store Theme Options', 'supermarket-store'),
	));

	/*
	* Customizer top header section
	*/
	/*Top Header Options*/
	$wp_customize->add_section('supermarket_store_header_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Top Header Options', 'supermarket-store'),
		'panel'       => 'supermarket_store_panel',
	));

	/*Top header section enable*/
	$wp_customize->add_setting(
		'supermarket_store_enable_top_header',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_top_header',
		array(
			'label'       => __('Enable Top Header', 'supermarket-store'),
			'description' => __('Checked to show the top header section.', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'checkbox',
		)
	);

	/*Menu 1*/
	$wp_customize->add_setting(
		'supermarket_store_menu1_text_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_menu1_text_option',
		array(
			'label'       => __('Edit Menu 1 Text', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'text',
		)
	);

	/*Menu 1*/
	$wp_customize->add_setting(
		'supermarket_store_menu1_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_menu1_option',
		array(
			'label'       => __('Edit Menu 1 Link', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'url',
		)
	);


	/*Menu 2*/
	$wp_customize->add_setting(
		'supermarket_store_menu2_text_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_menu2_text_option',
		array(
			'label'       => __('Edit Menu 2 Text', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'text',
		)
	);

	/*Menu 2*/
	$wp_customize->add_setting(
		'supermarket_store_menu2_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_menu2_option',
		array(
			'label'       => __('Edit Menu 2 Link', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'url',
		)
	);

	/*Order tracking section enable*/
	$wp_customize->add_setting(
		'supermarket_store_enable_order_tracking',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_order_tracking',
		array(
			'label'       => __('Enable Order Tracking', 'supermarket-store'),
			'description' => __('Checked to show the order tracking.', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'checkbox',
		)
	);

	/*currency switcher section enable*/
	$wp_customize->add_setting(
		'supermarket_store_enable_currency_switcher',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_currency_switcher',
		array(
			'label'       => __('Enable Currency Switcher', 'supermarket-store'),
			'description' => __('Checked to show the currency switcher.', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'checkbox',
		)
	);

	/*google translator section enable*/
	$wp_customize->add_setting(
		'supermarket_store_enable_google_translator',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 0,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_google_translator',
		array(
			'label'       => __('Enable Google Translator', 'supermarket-store'),
			'description' => __('Checked to show the google translator.', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'checkbox',
		)
	);

	/*Phone Number*/
	$wp_customize->add_setting(
		'supermarket_store_phone_number',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_phone_number',
		array(
			'label'       => __('Edit Phone Number', 'supermarket-store'),
			'section'     => 'supermarket_store_header_section',
			'type'        => 'text',
		)
	);

	/*
	* Customizer main slider section
	*/
	/*Main Slider Options*/
	$wp_customize->add_section('supermarket_store_slider_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Main Slider Options', 'supermarket-store'),
		'panel'       => 'supermarket_store_panel',
	));

	/*Main Slider Enable Option*/
	$wp_customize->add_setting(
		'supermarket_store_enable_slider',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_slider',
		array(
			'label'       => __('Enable Main Slider', 'supermarket-store'),
			'description' => __('Checked to show the main slider', 'supermarket-store'),
			'section'     => 'supermarket_store_slider_section',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'supermarket_store_slide_number',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_slide_number',
		array(
			'label'       => __('Number of slide to show', 'supermarket-store'),
			'section'     => 'supermarket_store_slider_section',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 1,     
				'max' => 3,   
			)
		)
	);

	$slide_count = (int)get_theme_mod('supermarket_store_slide_number');

	for ($m=1; $m <= $slide_count; $m++) {


		/*Main Slider Image*/
		$wp_customize->add_setting(
			'supermarket_store_slider_image'.$m,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'supermarket_store_slider_image'.$m, 
				array(
			        'label' => __('Edit Slider Image ', 'supermarket-store') .$m,
			        'description' => __('Edit the slider image.', 'supermarket-store'),
			        'section' => 'supermarket_store_slider_section',
				)
			)
		);

		/*Main Slider Extra Heading*/
		$wp_customize->add_setting(
			'supermarket_store_slider_extra_heading'.$m,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_slider_extra_heading'.$m,
			array(
				'label'       => __('Edit Extra Heading Text ', 'supermarket-store') .$m,
				'description' => __('Edit the slider heading text.', 'supermarket-store'),
				'section'     => 'supermarket_store_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Heading*/
		$wp_customize->add_setting(
			'supermarket_store_slider_heading'.$m,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_slider_heading'.$m,
			array(
				'label'       => __('Edit Heading Text ', 'supermarket-store') .$m,
				'description' => __('Edit the slider heading text.', 'supermarket-store'),
				'section'     => 'supermarket_store_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Content*/
		$wp_customize->add_setting(
			'supermarket_store_slider_text'.$m,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_slider_text'.$m,
			array(
				'label'       => __('Edit Content Text ', 'supermarket-store') .$m,
				'description' => __('Edit the slider content text.', 'supermarket-store'),
				'section'     => 'supermarket_store_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 Text*/
		$wp_customize->add_setting(
			'supermarket_store_slider_button1_text'.$m,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_slider_button1_text'.$m,
			array(
				'label'       => __('Edit Button #1 Text ', 'supermarket-store') .$m,
				'description' => __('Edit the slider button text.', 'supermarket-store'),
				'section'     => 'supermarket_store_slider_section',
				'type'        => 'text',
			)
		);

		/*Main Slider Button1 URL*/
		$wp_customize->add_setting(
			'supermarket_store_slider_button1_link'.$m,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_slider_button1_link'.$m,
			array(
				'label'       => __('Edit Button #1 URL ', 'supermarket-store') .$m,
				'description' => __('Edit the slider button url.', 'supermarket-store'),
				'section'     => 'supermarket_store_slider_section',
				'type'        => 'url',
			)
		);
	}

	/*
	* Customizer Product Category section
	*/
	/*Product Category Options*/
	$wp_customize->add_section('supermarket_store_product_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Product Category Options', 'supermarket-store'),
		'panel'       => 'supermarket_store_panel',
	));

	/*Product Category Enable Option*/
	$wp_customize->add_setting(
		'supermarket_store_enable_project',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_project',
		array(
			'label'       => __('Enable Product Category Section', 'supermarket-store'),
			'description' => __('Checked to show the category', 'supermarket-store'),
			'section'     => 'supermarket_store_product_section',
			'type'        => 'checkbox',
		)
	);

	for ($i=1; $i <= 6; $i++) { 

		/*Category Image*/
		$wp_customize->add_setting(
			'supermarket_store_category_image'.$i,
			array(
				'capability'    => 'edit_theme_options',
		        'default'       => '',
		        'transport'     => 'postMessage',
		        'sanitize_callback' => 'esc_url_raw',
	    	)
	    );

		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 
				'supermarket_store_category_image'.$i, 
				array(
			        'label' => __('Edit Category Image ', 'supermarket-store') .$i,
			        'description' => __('Edit the category image.', 'supermarket-store'),
			        'section' => 'supermarket_store_product_section',
				)
			)
		);

		/*Category Image Link*/
		$wp_customize->add_setting(
			'supermarket_store_category_image_url'.$i,
			array(
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'supermarket_store_category_image_url'.$i,
			array(
				'label'       => __('Edit Product Category Link ', 'supermarket-store') .$i,
				'description' => __('Edit the category link.', 'supermarket-store'),
				'section'     => 'supermarket_store_product_section',
				'type'        => 'url',
			)
		);
	}

	/*
	* Customizer Footer Section
	*/
	/*Footer Options*/
	$wp_customize->add_section('supermarket_store_footer_section', array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __('Footer Options', 'supermarket-store'),
		'panel'       => 'supermarket_store_panel',
	));


	/*Footer Social Menu Option*/
	$wp_customize->add_setting(
		'supermarket_store_footer_social_menu',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_footer_social_menu',
		array(
			'label'       => __('Enable Footer Social Menu', 'supermarket-store'),
			'description' => __('Checked to show the footer social menu. Go to Dashboard >> Appearance >> Menus >> Create New Menu >> Add Custom Link >> Add Social Menu >> Checked Social Menu >> Save Menu.', 'supermarket-store'),
			'section'     => 'supermarket_store_footer_section',
			'type'        => 'checkbox',
		)
	);	

	/*Go To Top Option*/
	$wp_customize->add_setting(
		'supermarket_store_enable_go_to_top_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => 1,
			'sanitize_callback' => 'supermarket_store_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_enable_go_to_top_option',
		array(
			'label'       => __('Enable Go To Top', 'supermarket-store'),
			'description' => __('Checked to enable Go To Top option.', 'supermarket-store'),
			'section'     => 'supermarket_store_footer_section',
			'type'        => 'checkbox',
		)
	);

	/*Footer Copyright Text Enable*/
	$wp_customize->add_setting(
		'supermarket_store_copyright_option',
		array(
			'capability'        => 'edit_theme_options',
			'transport'         => 'refresh',
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'supermarket_store_copyright_option',
		array(
			'label'       => __('Edit Copyright Text', 'supermarket-store'),
			'description' => __('Edit the Footer Copyright Section.', 'supermarket-store'),
			'section'     => 'supermarket_store_footer_section',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'supermarket_store_customize_register' );



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function supermarket_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function supermarket_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function supermarket_store_customize_preview_js() {
	wp_enqueue_script( 'supermarket-store-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), SUPERMARKET_STORE_VERSION, true );
}
add_action( 'customize_preview_init', 'supermarket_store_customize_preview_js' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Supermarket_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/revolution/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Supermarket_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Supermarket_Store_Customize_Section_Pro( $manager,'supermarket_store_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Supermarket Pro', 'supermarket-store' ),
			'pro_text' => esc_html__( 'Buy Pro', 'supermarket-store' ),
			'pro_url'  => esc_url('https://www.revolutionwp.com/wp-themes/supermarket-wordpress-theme/'),
		) )	);		
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'supermarket-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'supermarket-store-customize-controls', trailingslashit( get_template_directory_uri() ) . '/revolution/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Supermarket_Store_Customize::get_instance();
