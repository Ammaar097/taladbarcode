<?php
/**
 * Supermarket Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Supermarket Zone
 */

if ( ! defined( 'DIGITAL_STOREFRONT_URL' ) ) {
    define( 'DIGITAL_STOREFRONT_URL', esc_url( 'https://www.themagnifico.net/themes/retailer-wordpress-theme/', 'supermarket-zone') );
}
if ( ! defined( 'DIGITAL_STOREFRONT_TEXT' ) ) {
    define( 'DIGITAL_STOREFRONT_TEXT', __( 'Supermarket Pro','supermarket-zone' ));
}

if ( ! defined( 'DIGITAL_STOREFRONT_BUY_TEXT' ) ) {
    define( 'DIGITAL_STOREFRONT_BUY_TEXT', __( 'Buy Supermarket Pro','supermarket-zone' ));
}

if ( ! defined( 'DIGITAL_STOREFRONT_LINK' ) ) {
    define( 'DIGITAL_STOREFRONT_LINK', esc_url( 'https://www.themagnifico.net/themes/retailer-wordpress-theme/', 'supermarket-zone') );
}

function supermarket_zone_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');
    $parentcss = 'digital-storefront-style';
    $theme = wp_get_theme(); wp_enqueue_style( $parentcss, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));
    wp_enqueue_style( 'supermarket-zone-style', get_stylesheet_uri(), array( $parentcss ), $theme->get('Version'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'supermarket_zone_enqueue_styles' );

function supermarket_zone_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'supermarket-zone-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'supermarket_zone_admin_scripts' );

function supermarket_zone_customize_register($wp_customize){

    // Pro Version
    class Supermarket_Zone_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( DIGITAL_STOREFRONT_BUY_TEXT,'supermarket-zone' ) .'<strong></a>';
            echo '</a>';
        }
    }


    //Product
    $wp_customize->add_section('supermarket_zone_new_product',array(
        'title' => esc_html__('New Arrival Product','supermarket-zone'),
        'description' => esc_html__('Here you have to select product category which will display perticular new arrival product in the home page.','supermarket-zone')
    ));

    $wp_customize->add_setting('supermarket_zone_new_product_setting', array(
        'default' => 0,
        'sanitize_callback' => 'digital_storefront_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'supermarket_zone_new_product_setting',array(
        'label'          => __( 'Enable Disable Product', 'supermarket-zone' ),
        'section'        => 'supermarket_zone_new_product',
        'settings'       => 'supermarket_zone_new_product_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('supermarket_zone_new_product_title',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('supermarket_zone_new_product_title',array(
        'label' => esc_html__('Title','supermarket-zone'),
        'section' => 'supermarket_zone_new_product',
        'setting' => 'supermarket_zone_new_product_title',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('supermarket_zone_new_product_text',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('supermarket_zone_new_product_text',array(
        'label' => esc_html__('Text','supermarket-zone'),
        'section' => 'supermarket_zone_new_product',
        'setting' => 'supermarket_zone_new_product_text',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('supermarket_zone_new_product_number',array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('supermarket_zone_new_product_number',array(
        'label' => esc_html__('No of Product','supermarket-zone'),
        'section' => 'supermarket_zone_new_product',
        'setting' => 'supermarket_zone_new_product_number',
        'type'  => 'number'
    ));

    $digital_storefront_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
    $categories = get_categories( $digital_storefront_args );
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }
    $wp_customize->add_setting('supermarket_zone_new_product_category',array(
        'sanitize_callback' => 'supermarket_zone_sanitize_select',
    ));
    $wp_customize->add_control('supermarket_zone_new_product_category',array(
        'type'    => 'select',
        'choices' => $cats,
        'label' => __('Select Product Category','supermarket-zone'),
        'section' => 'supermarket_zone_new_product',
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_product_pro_option', array(
        'sanitize_callback' => 'Digital_Storefront_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Supermarket_Zone_Pro_Version ( $wp_customize,'pro_version_product_pro_option', array(
        'section'     => 'supermarket_zone_new_product',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'supermarket-zone' ),
        'description' => esc_url( DIGITAL_STOREFRONT_LINK ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'supermarket_zone_customize_register');

if ( ! function_exists( 'supermarket_zone_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function supermarket_zone_setup() {

        add_theme_support( 'responsive-embeds' );

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

        add_image_size('supermarket-zone-featured-header-image', 2000, 660, true);

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
            'default-color' => '',
            'default-image' => '',
        ) ) );

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

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'supermarket_zone_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function supermarket_zone_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'supermarket-zone' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'supermarket-zone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'supermarket_zone_widgets_init' );

function supermarket_zone_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

if ( ! defined( 'DIGITAL_STOREFRONT_CONTACT_SUPPORT' ) ) {
define('DIGITAL_STOREFRONT_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/supermarket-zone','supermarket-zone'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_REVIEW' ) ) {
define('DIGITAL_STOREFRONT_REVIEW',__('https://wordpress.org/support/theme/supermarket-zone/reviews/#new-post','supermarket-zone'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_LIVE_DEMO' ) ) {
define('DIGITAL_STOREFRONT_LIVE_DEMO',__('https://www.themagnifico.net/demo/supermarket-zone/','supermarket-zone'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_GET_PREMIUM_PRO' ) ) {
define('DIGITAL_STOREFRONT_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/retailer-wordpress-theme/','supermarket-zone'));
}
if ( ! defined( 'DIGITAL_STOREFRONT_PRO_DOC' ) ) {
define('DIGITAL_STOREFRONT_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/supermarket-zone-pro-doc/','supermarket-zone'));
}

/**
 * Enqueue theme color style.
 */
function supermarket_zone_theme_color() {

    $theme_color_css = '';
    $digital_storefront_theme_color = get_theme_mod('digital_storefront_theme_color');
    $digital_storefront_preloader_bg_color = get_theme_mod('digital_storefront_preloader_bg_color');
    $digital_storefront_preloader_dot_1_color = get_theme_mod('digital_storefront_preloader_dot_1_color');
    $digital_storefront_preloader_dot_2_color = get_theme_mod('digital_storefront_preloader_dot_2_color');

    if(get_theme_mod('digital_storefront_preloader_bg_color') == '') {
        $digital_storefront_preloader_bg_color = '#000';
    }
    if(get_theme_mod('digital_storefront_preloader_dot_1_color') == '') {
        $digital_storefront_preloader_dot_1_color = '#fff';
    }
    if(get_theme_mod('digital_storefront_preloader_dot_2_color') == '') {
        $digital_storefront_preloader_dot_2_color = '#ef8b59';
    }

    $theme_color_css = '
    span.cart-value, .sidebar h5, .comment-respond input#submit, #button, .sidebar input[type="submit"], .sidebar button[type="submit"], #colophon, .post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .main-navigation .sub-menu, .wp-block-button__link, .about-inner-box a, .pro-button a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .woocommerce-ordering select, .woocommerce-account .woocommerce-MyAccount-navigation ul li, .btn-primary, #top-slider button.owl-next:hover, #top-slider button.owl-prev:hover, .toggle-nav i, .sidebar .tagcloud a:hover{
        background: '.esc_attr($digital_storefront_theme_color).';
     }
     @media screen and (max-width:1000px){
	         .sidenav {
	        background: '.esc_attr($digital_storefront_theme_color).';
	 		}
		}
     a, .social-link i:hover, .article-box a, p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-message::before, .woocommerce-info::before, .sidebar ul li a:hover, .widget a:hover, .widget a:focus{
        color: '.esc_attr($digital_storefront_theme_color).';
      }
     #new-products hr{
        border-color: '.esc_attr($digital_storefront_theme_color).';
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
    wp_add_inline_style( 'supermarket-zone-style',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'supermarket_zone_theme_color' );
