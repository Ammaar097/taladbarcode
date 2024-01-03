<?php
/**
 * Digital Storefront functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Digital Storefront
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Digital_Storefront_Loader.php' );

$digital_storefront_loader = new \WPTRT\Autoload\Digital_Storefront_Loader();

$digital_storefront_loader->digital_storefront_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$digital_storefront_loader->digital_storefront_register();

if ( ! function_exists( 'digital_storefront_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function digital_storefront_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('digital-storefront-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','digital-storefront' ),
	        'footer'=> esc_html__( 'Footer Menu','digital-storefront' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'digital_storefront_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'digital_storefront_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digital_storefront_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digital_storefront_content_width', 1170 );
}
add_action( 'after_setup_theme', 'digital_storefront_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digital_storefront_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'digital-storefront' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'digital-storefront' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'digital-storefront' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'digital-storefront' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'digital-storefront' ),
		'id'            => 'digital-storefront-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'digital-storefront' ),
		'id'            => 'digital-storefront-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'digital-storefront' ),
		'id'            => 'digital-storefront-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'digital_storefront_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function digital_storefront_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'digital-storefront-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');

	wp_enqueue_style( 'digital-storefront-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'digital-storefront-style',$digital_storefront_theme_css );

	wp_style_add_data('digital-storefront-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', esc_url(get_template_directory_uri()).'/assets/css/fontawesome/css/all.css' );

	wp_enqueue_style( 'owl.carousel-style', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.css' );

    wp_enqueue_script('owl.carousel-js', esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js', array('jquery'), '', true );

    wp_enqueue_script('digital-storefront-theme-js', esc_url(get_template_directory_uri()) . '/assets/js/theme-script.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digital_storefront_scripts' );

/**
 * Enqueue theme color style.
 */
function digital_storefront_theme_color() {

    $digital_storefront_theme_color_css = '';
    $digital_storefront_theme_color = get_theme_mod('digital_storefront_theme_color');
		$digital_storefront_theme_color_2 = get_theme_mod('digital_storefront_theme_color_2');
    $digital_storefront_preloader_bg_color = get_theme_mod('digital_storefront_preloader_bg_color');
    $digital_storefront_preloader_dot_1_color = get_theme_mod('digital_storefront_preloader_dot_1_color');
    $digital_storefront_preloader_dot_2_color = get_theme_mod('digital_storefront_preloader_dot_2_color');
    $digital_storefront_logo_max_height = get_theme_mod('digital_storefront_logo_max_height');

	if(get_theme_mod('digital_storefront_logo_max_height') == '') {
		$digital_storefront_logo_max_height = '24';
	}

	if(get_theme_mod('digital_storefront_preloader_bg_color') == '') {
		$digital_storefront_preloader_bg_color = '#000';
	}
	if(get_theme_mod('digital_storefront_preloader_dot_1_color') == '') {
		$digital_storefront_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('digital_storefront_preloader_dot_2_color') == '') {
		$digital_storefront_preloader_dot_2_color = '#ff6868';
	}

	$digital_storefront_theme_color_css = '
	.custom-logo-link img{
				max-height: '.esc_attr($digital_storefront_logo_max_height).'px;
			 }
		span.cart-value,.sidebar h5,.comment-respond input#submit,#button,.sidebar input[type="submit"], .sidebar button[type="submit"],#colophon,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.main-navigation .sub-menu,.wp-block-button__link,.slider-inner-box a, .about-inner-box a,.pro-button a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce .woocommerce-ordering select,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.btn-primary,#top-slider button.owl-next:hover, #top-slider button.owl-prev:hover,.toggle-nav i,a.added_to_cart.wc-forward{
			background: '.esc_attr($digital_storefront_theme_color).';
		}
		@media screen and (max-width:1000px){
	         .sidenav {
	        background: '.esc_attr($digital_storefront_theme_color).';
	 		}
		}
		a,.social-link i:hover,.article-box a,p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-message::before, .woocommerce-info::before,.sidebar ul li a:hover,.widget a:hover, .widget a:focus{
			color: '.esc_attr($digital_storefront_theme_color).';
		}
		.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote,.woocommerce-message, .woocommerce-info,.btn-primary{
			border-color: '.esc_attr($digital_storefront_theme_color).';
		}
		#top-slider button.owl-next,#top-slider button.owl-prev,.slider-inner-box a:hover, .about-inner-box a:hover,.pro-button a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,a.added_to_cart.wc-forward:hover{
	 	background: '.esc_attr($digital_storefront_theme_color_2).';
		}
		.social-link i.fas.fa-shopping-cart,.navbar-brand a,.slider-inner-box h1 a,.serv-box h4 a,.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.top-info p,.social-link span,.product-asset i{
		color: '.esc_attr($digital_storefront_theme_color_2).';
		}
	 	{
		border-color: '.esc_attr($digital_storefront_theme_color_2).';
		}
		.loading{
			background-color: '.esc_attr($digital_storefront_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($digital_storefront_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($digital_storefront_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'digital-storefront-style',$digital_storefront_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'digital_storefront_theme_color' );

/**
 * Enqueue S Header.
 */
function digital_storefront_sticky_header() {

  $digital_storefront_sticky_header = get_theme_mod('digital_storefront_sticky_header');

  $digital_storefront_custom_style= "";

  if($digital_storefront_sticky_header != true){

    $digital_storefront_custom_style .='.stick_header{';

      $digital_storefront_custom_style .='position: static;';

    $digital_storefront_custom_style .='}';
  }

  wp_add_inline_style( 'digital-storefront-style',$digital_storefront_custom_style );

}
add_action( 'wp_enqueue_scripts', 'digital_storefront_sticky_header' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*dropdown page sanitization*/
function digital_storefront_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*radio button sanitization*/
function digital_storefront_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

 //Float
function digital_storefront_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

//slect
function digital_storefront_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function digital_storefront_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function digital_storefront_sanitize_checkbox( $input ) {
  // Boolean check
  return ( ( isset( $input ) && true == $input ) ? true : false );
}
function digital_storefront_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'digital_storefront_shop_per_page', 9 );
function digital_storefront_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'digital_storefront_product_per_page', 9 );
	return $cols;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'digital_storefront_loop_columns');
if (!function_exists('digital_storefront_loop_columns')) {
	function digital_storefront_loop_columns() {
		$columns = get_theme_mod( 'digital_storefront_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

/**
 * Get CSS
 */

function digital_storefront_getpage_css($hook) {
	if ( 'appearance_page_digital-storefront-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'digital-storefront-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'digital_storefront_getpage_css' );

if ( ! defined( 'DIGITAL_STOREFRONT_CONTACT_SUPPORT' ) ) {
define('DIGITAL_STOREFRONT_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/digital-storefront/','digital-storefront'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_REVIEW' ) ) {
define('DIGITAL_STOREFRONT_REVIEW',__('https://wordpress.org/support/theme/digital-storefront/reviews/#new-post','digital-storefront'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_LIVE_DEMO' ) ) {
define('DIGITAL_STOREFRONT_LIVE_DEMO',__('https://themagnifico.net/demo/digital-storefront-pro/','digital-storefront'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_GET_PREMIUM_PRO' ) ) {
define('DIGITAL_STOREFRONT_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/storefront-wordpress-theme/','digital-storefront'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_PRO_DOC' ) ) {
define('DIGITAL_STOREFRONT_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/digital-storefront-pro-doc/','digital-storefront'));
}

add_action('admin_menu', 'digital_storefront_themepage');
function digital_storefront_themepage(){
	$digital_storefront_theme_info = add_theme_page( __('Theme Options','digital-storefront'), __('Theme Options','digital-storefront'), 'manage_options', 'digital-storefront-info.php', 'digital_storefront_info_page' );
}

function digital_storefront_info_page() {
	$user = wp_get_current_user();
	$digital_storefront_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap digital-storefront-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','digital-storefront'); ?><?php echo esc_html( $digital_storefront_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "digital-storefront"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Digital Storefront , feel free to contact us for any support regarding our theme.", "digital-storefront"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "digital-storefront"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "digital-storefront"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "digital-storefront"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "digital-storefront"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "digital-storefront"); ?></h3>
						<p><?php esc_html_e("If You love Digital Storefront theme then we would appreciate your review about our theme.", "digital-storefront"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "digital-storefront"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","digital-storefront"); ?></h2>
		<div class="digital-storefront-button-container">
			<a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "digital-storefront"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "digital-storefront"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "digital-storefront"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "digital-storefront"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "digital-storefront"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "digital-storefront"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "digital-storefront"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "digital-storefront"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "digital-storefront"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="digital-storefront-button-container">
			<a target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "digital-storefront"); ?>
			</a>
		</div>
	</div>
	<?php
}


//Admin Notice For Getstart
function digital_storefront_custom_admin_notice() {
    ?>
    <div class="notice notice-success is-dismissible" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
    	<div class="tm-admin-image">
    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
    	</div>
    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
    		<style type="text/css">
    			.blink_text {
					 animation-name: blinker;
					 animation-duration: 1s;
					 animation-timing-function: linear;
					 animation-iteration-count: infinite;
				}
				@keyframes blinker {  
					 0% { opacity: 1.0; }
					 50% { opacity: 0.0; }
					 100% { opacity: 1.0; }
				}
    		</style>
    		<h2 style="font-weight: 400;line-height: 1.3;color: #f15b26; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'digital-storefront'); ?><span class="blink_text" style="color: #4cc2c0;"><?php echo wp_get_theme(); ?></span><h2>
    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'digital-storefront'); ?><p>
        	<a class="admin-notice-btn" style="font-size: 14px;font-weight: 400; min-height: 46px; line-height: 3.14285714; border-radius: 3px;padding: 15px 36px;background: #f15b26; color: #fff; text-decoration: none;" href="<?php echo esc_url( admin_url( 'themes.php?page=digital-storefront-info.php' )); ?>"><?php esc_html_e( 'Get started', 'digital-storefront' ) ?></a>
        	<a class="admin-notice-btn" style="margin-left: 10px;font-weight: 400; font-size: 14px; min-height: 46px; line-height: 3.14285714; border-radius: 3px;padding: 15px 36px;background: #f15b26; color: #fff; text-decoration: none;" target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_PRO_DOC ); ?>"><?php esc_html_e( 'Documentation', 'digital-storefront' ) ?></a>
        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
        	<span class="dashicons dashicons-admin-links"></span>
        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( DIGITAL_STOREFRONT_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'digital-storefront' ) ?></a>
        	</span>
    	</div>
    </div>
    <?php
}
add_action('admin_notices', 'digital_storefront_custom_admin_notice');