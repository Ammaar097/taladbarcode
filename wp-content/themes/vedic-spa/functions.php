<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function vedic_spa_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'vedic-spa', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'vedic_spa_theme_setup' );

function vedic_spa_styles() {

    wp_enqueue_style( 'vedic-spa-parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'vedic_spa_styles', 10 );

//Remove a function from the parent theme
function vedic_spa_remove_parent_filters(){ //Have to do it after theme setup, because child theme functions are loaded first
    remove_action( 'customize_register', 'blossom_spa_customizer_theme_info' );
    remove_action( 'customize_register', 'blossom_spa_customize_register_appearance' );
    remove_action( 'wp_enqueue_scripts', 'blossom_spa_dynamic_css', 99 );
}
add_action( 'init', 'vedic_spa_remove_parent_filters' );

function vedic_spa_customize_register( $wp_customize ) {
    
    $wp_customize->add_section( 'theme_info', array(
        'title'       => __( 'Demo & Documentation' , 'vedic-spa' ),
        'priority'    => 6,
    ) );
    
    /** Important Links */
    $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<p>';
    $theme_info .= sprintf( __( 'Demo Link: %1$sClick here.%2$s', 'vedic-spa' ),  '<a href="' . esc_url( 'https://blossomthemes.com/theme-demo/?theme=vedic-spa' ) . '" target="_blank">', '</a>' ); 
    $theme_info .= '</p><p>';
    $theme_info .= sprintf( __( 'Documentation Link: %1$sClick here.%2$s', 'vedic-spa' ),  '<a href="' . esc_url( 'https://docs.blossomthemes.com/vedic-spa/' ) . '" target="_blank">', '</a>' ); 
    $theme_info .= '</p>';

    $wp_customize->add_control( new Blossom_Spa_Note_Control( $wp_customize,
        'theme_info_theme', 
            array(
                'section'     => 'theme_info',
                'description' => $theme_info
            )
        )
    );

    /** Site Title Font */
    $wp_customize->add_setting( 
        'site_title_font', 
        array(
            'default' => array(                                         
                'font-family' => 'DM Serif Display',
                'variant'     => 'regular',
            ),
            'sanitize_callback' => array( 'Blossom_Spa_Fonts', 'sanitize_typography' )
        ) 
    );

    $wp_customize->add_control( 
        new Blossom_Spa_Typography_Control( 
            $wp_customize, 
            'site_title_font', 
            array(
                'label'       => __( 'Site Title Font', 'vedic-spa' ),
                'description' => __( 'Site title and tagline font.', 'vedic-spa' ),
                'section'     => 'title_tagline',
                'priority'    => 60, 
            ) 
        ) 
    );
    
    /** Site Title Font Size*/
    $wp_customize->add_setting( 
        'site_title_font_size', 
        array(
            'default'           => 30,
            'sanitize_callback' => 'blossom_spa_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Slider_Control( 
            $wp_customize,
            'site_title_font_size',
            array(
                'section'     => 'title_tagline',
                'label'       => __( 'Site Title Font Size', 'vedic-spa' ),
                'description' => __( 'Change the font size of your site title.', 'vedic-spa' ),
                'priority'    => 65,
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 200,
                    'step'  => 1,
                )                 
            )
        )
    );
    
    /** Appearance Settings */
    $wp_customize->add_panel( 
        'appearance_settings',
         array(
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Appearance Settings', 'vedic-spa' ),
            'description' => __( 'Customize Color, Typography & Background Image', 'vedic-spa' ),
        ) 
    );

    /** Typography Settings */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography Settings', 'vedic-spa' ),
            'priority' => 20,
            'panel'    => 'appearance_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font',
        array(
            'default'           => 'DM Sans',
            'sanitize_callback' => 'blossom_spa_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Select_Control(
            $wp_customize,
            'primary_font',
            array(
                'label'       => __( 'Primary Font', 'vedic-spa' ),
                'description' => __( 'Primary font of the site.', 'vedic-spa' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_spa_get_all_fonts(),   
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font',
        array(
            'default'           => 'DM Serif Display',
            'sanitize_callback' => 'blossom_spa_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Blossom_Spa_Select_Control(
            $wp_customize,
            'secondary_font',
            array(
                'label'       => __( 'Secondary Font', 'vedic-spa' ),
                'description' => __( 'Secondary font of the site.', 'vedic-spa' ),
                'section'     => 'typography_settings',
                'choices'     => blossom_spa_get_all_fonts(),   
            )
        )
    );  

    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_spa_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Slider_Control( 
            $wp_customize,
            'font_size',
            array(
                'section'     => 'typography_settings',
                'label'       => __( 'Font Size', 'vedic-spa' ),
                'description' => __( 'Change the font size of your site.', 'vedic-spa' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                )                 
            )
        )
    );

    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Load Google Fonts Locally', 'vedic-spa' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'vedic-spa' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'blossom_spa_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Preload Local Fonts', 'vedic-spa' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'vedic-spa' ),
                'active_callback' => 'blossom_spa_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'vedic-spa' ); ?></span>
        
        <input type="button" class="button button-primary blossom-spa-flush-local-fonts-button" name="blossom-spa-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'vedic-spa' ); ?>" />
    <?php
    $vedic_spa_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'vedic-spa' ),
            'section'       => 'typography_settings',
            'description'   => $vedic_spa_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'blossom_spa_ed_localgoogle_fonts'
        )
    );

    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel              = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority           = 10;
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 15;


    /** Header Layout */
    $wp_customize->add_section(
        'header_layout',
        array(
            'title'    => __( 'Header Layout', 'vedic-spa' ),
            'panel'    => 'layout_settings',
            'priority' => 10,
        )
    );
    
    $wp_customize->add_setting( 
        'header_layout_option', 
        array(
            'default'           => 'two',
            'sanitize_callback' => 'blossom_spa_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Radio_Image_Control(
            $wp_customize,
            'header_layout_option',
            array(
                'section'     => 'header_layout',
                'label'       => __( 'Header Layout', 'vedic-spa' ),
                'description' => __( 'This is the layout for header.', 'vedic-spa' ),
                'choices'     => array(                 
                    'one'   => get_stylesheet_directory_uri() . '/images/header/one.jpg',
                    'two'   => get_stylesheet_directory_uri() . '/images/header/two.jpg',
                )
            )
        )
    );

    /** Shopping Cart */
    $wp_customize->add_setting( 
        'ed_shopping_cart', 
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_spa_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Blossom_Spa_Toggle_Control( 
            $wp_customize,
            'ed_shopping_cart',
            array(
                'section'         => 'header_settings',
                'label'           => __( 'Shopping Cart', 'vedic-spa' ),
                'description'     => __( 'Enable to show Shopping cart in the header.', 'vedic-spa' ),
                'active_callback' => 'blossom_spa_is_woocommerce_activated'
            )
        )
    );
}
add_action( 'customize_register', 'vedic_spa_customize_register', 99 );

/**
 * Header Start
*/
function blossom_spa_header(){ 
    
    $header_layout = get_theme_mod( 'header_layout_option', 'two' ); 
    
    if( $header_layout == 'one' ) { ?>
        <header id="masthead" class="site-header" itemscope itemtype="http://schema.org/WPHeader">
            <div class="container">
                <div class="header-main">
                    <?php blossom_spa_site_branding(); ?>
                    <?php blossom_spa_header_contact(); ?>
                </div><!-- .header-main -->
                <div class="nav-wrap">
                    <?php blossom_spa_primary_nagivation(); ?>
                    <?php if( blossom_spa_social_links( false ) || blossom_spa_header_search( false ) ) : ?>
                        <div class="nav-right">
                            <?php blossom_spa_social_links(); ?>
                            <?php blossom_spa_header_search(); ?>
                        </div><!-- .nav-right -->   
                    <?php endif; ?>
                </div><!-- .nav-wrap -->
            </div><!-- .container -->    
        </header>
    <?php }else{ 
        $ed_cart   = get_theme_mod( 'ed_shopping_cart', true ); ?>
        <header id="masthead" class="site-header header-two" itemscope itemtype="http://schema.org/WPHeader">
            <?php if( blossom_spa_header_contact( false ) || blossom_spa_social_links( false ) || ( blossom_spa_is_woocommerce_activated() && $ed_cart ) ) : ?>
                <div class="header-t">
                    <div class="container">
                        <?php blossom_spa_header_contact( true, false ); ?>
                        <?php blossom_spa_social_links(); ?>
                        <?php if( blossom_spa_header_search( false ) ) : blossom_spa_header_search(); 
                         endif; ?>
                        <?php if( blossom_spa_is_woocommerce_activated() && $ed_cart ) vedic_spa_wc_cart_count(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="header-main">
                <div class="container">
                    <?php blossom_spa_site_branding(); ?>
                </div>
            </div>
            <div class="nav-wrap">
                <div class="container">
                    <?php blossom_spa_primary_nagivation(); ?>
                    
                </div>
            </div><!-- .nav-wrap -->
        </header>
<?php }
}

function blossom_spa_get_home_sections(){
    $ed_banner     = get_theme_mod( 'ed_banner_section', 'static_banner' );
    $disable_all_section = get_theme_mod( 'disable_all_section', false );
    $sections = array( 
        'service'     => array( 'sidebar' => 'service' ),
        'about'       => array( 'sidebar' => 'about' ),
        'service_two' => array( 'sidebar' => 'service-two' ),
        'testimonial' => array( 'sidebar' => 'testimonial' ),
        'cta_two'     => array( 'sidebar' => 'cta-two' ),
        'team'        => array( 'sidebar' => 'team' ),
        'blog'        => array( 'section' => 'blog' )
    );
    
    $enabled_section = array();
    
    if( $ed_banner == 'static_banner' ) array_push( $enabled_section, 'banner' );

    
    foreach( $sections as $k => $v ){
        if( array_key_exists( 'sidebar', $v ) ){
            if( is_active_sidebar( $v['sidebar'] ) ) array_push( $enabled_section, $k );
        }else{
            if( get_theme_mod( 'ed_' . $v['section'] . '_section', true ) ) array_push( $enabled_section, $v['section'] );
        }
    }

    if( $disable_all_section ) {
        $enabled_section = array();
    } 
    
    return apply_filters( 'blossom_spa_home_sections', $enabled_section );
}
/**
 * Woocommerce Cart Count
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header 
*/
function vedic_spa_wc_cart_count(){
    $count = WC()->cart->cart_contents_count; ?>
    <div class="cart">                                      
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="woo-cart" title="<?php esc_attr_e( 'View your shopping cart', 'vedic-spa' ); ?>">
            <span><i class="fa fa-shopping-cart"></i></span>
            <span class="count"><?php echo esc_html( $count ); ?></span>
        </a>
    </div>    
    <?php
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header
 */
function vedic_spa_add_to_cart_fragment( $fragments ){
    ob_start();
    $count = WC()->cart->cart_contents_count; ?>
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="woo-cart" title="<?php esc_attr_e( 'View your shopping cart', 'vedic-spa' ); ?>">
        <i class="fas fa-shopping-cart"></i>
        <span class="number"><?php echo absint( $count ); ?></span>
    </a>
    <?php
 
    $fragments['a.woo-cart'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'vedic_spa_add_to_cart_fragment' );

/**
 * Returns Google Fonts Url
*/ 
function blossom_spa_fonts_url(){
    $fonts_url = '';    
    $primary_font       = get_theme_mod( 'primary_font', 'DM Sans' );
    $ig_primary_font    = blossom_spa_is_google_font( $primary_font );    
    $secondary_font     = get_theme_mod( 'secondary_font', 'DM Serif Display' );
    $ig_secondary_font  = blossom_spa_is_google_font( $secondary_font );    
    $site_title_font    = get_theme_mod( 'site_title_font', array( 'font-family'=>'Marcellus', 'variant'=>'regular' ) );
    $ig_site_title_font = blossom_spa_is_google_font( $site_title_font['font-family'] );
            
    /* Translators: If there are characters in your language that are not
    * supported by respective fonts, translate this to 'off'. Do not translate
    * into your own language.
    */
    $primary    = _x( 'on', 'Primary Font: on or off', 'vedic-spa' );
    $secondary  = _x( 'on', 'Secondary Font: on or off', 'vedic-spa' );
    $site_title = _x( 'on', 'Site Title Font: on or off', 'vedic-spa' );
    
    if ( 'off' !== $primary || 'off' !== $secondary || 'off' !== $site_title ) {
        
        $font_families = array();
     
        if ( 'off' !== $primary && $ig_primary_font ) {
            $primary_variant = blossom_spa_check_varient( $primary_font, 'regular', true );
            if( $primary_variant ){
                $primary_var = ':' . $primary_variant;
            }else{
                $primary_var = '';    
            }            
            $font_families[] = $primary_font . $primary_var;
        }
         
        if ( 'off' !== $secondary && $ig_secondary_font ) {
            $secondary_variant = blossom_spa_check_varient( $secondary_font, 'regular', true );
            if( $secondary_variant ){
                $secondary_var = ':' . $secondary_variant;    
            }else{
                $secondary_var = '';
            }
            $font_families[] = $secondary_font . $secondary_var;
        }
        
        if ( 'off' !== $site_title && $ig_site_title_font ) {
            
            if( ! empty( $site_title_font['variant'] ) ){
                $site_title_var = ':' . blossom_spa_check_varient( $site_title_font['font-family'], $site_title_font['variant'] );    
            }else{
                $site_title_var = '';
            }
            $font_families[] = $site_title_font['font-family'] . $site_title_var;
        }
        
        $font_families = array_diff( array_unique( $font_families ), array('') );
        
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),            
        );
        
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    if( get_theme_mod( 'ed_localgoogle_fonts', false ) ) {
        $fonts_url = blossom_spa_get_webfont_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
    }
     
    return esc_url_raw( $fonts_url );
}


function vedic_spa_dynamic_css(){
    
    $primary_font    = get_theme_mod( 'primary_font', 'DM Sans' );
    $primary_fonts   = blossom_spa_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'DM Serif Display' );
    $secondary_fonts = blossom_spa_get_fonts( $secondary_font, 'regular' );
    $font_size       = get_theme_mod( 'font_size', 18 );


    $site_title_font      = get_theme_mod( 'site_title_font', array( 'font-family'=>'DM Serif Display', 'variant'=>'regular' ) );
    $site_title_fonts     = blossom_spa_get_fonts( $site_title_font['font-family'], $site_title_font['variant'] );
    $site_title_font_size = get_theme_mod( 'site_title_font_size', 30 );
    $primary_color = '#76a2a2';    

    echo "<style type='text/css' media='all'>"; ?>

    :root {
    --primary-font: <?php echo esc_html( $primary_fonts['font'] ); ?>;
    --secondary-font: <?php echo esc_html( $secondary_fonts['font'] ); ?>;
    }

    body,
    button,
    input,
    select,
    optgroup,
    textarea {        
        font-size: <?php echo absint( $font_size ); ?>px;
    }

    /*Typography*/

    .site-branding .site-title{
        font-size   : <?php echo absint( $site_title_font_size ); ?>px;
        font-family : <?php echo esc_html( $site_title_fonts['font'] ); ?>;
        font-weight : <?php echo esc_html( $site_title_fonts['weight'] ); ?>;
        font-style  : <?php echo esc_html( $site_title_fonts['style'] ); ?>;
    }

    a.btn-readmore:hover:before, .btn-cta:hover:before, 
    a.btn-readmore:hover:after, .btn-cta:hover:after {
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512"><path fill="<?php echo blossom_spa_hash_to_percent23( blossom_spa_sanitize_hex_color( $primary_color ) ); ?>" d="M187.8 264.5L41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z" class=""></path></svg>');    
    } 

    .widget_bttk_testimonial_widget .bttk-testimonial-inner-holder:before, 
    blockquote:before {
        background-image: url('data:image/svg+xml; utf-8, <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 24"><path fill="<?php echo blossom_spa_hash_to_percent23( blossom_spa_sanitize_hex_color( $primary_color ) ); ?>" d="M33.54,28.5a8,8,0,1,1-8.04,8,16,16,0,0,1,16-16A15.724,15.724,0,0,0,33.54,28.5Zm-12.04,8a8,8,0,0,1-16,0h0a16,16,0,0,1,16-16,15.724,15.724,0,0,0-7.96,8A7.989,7.989,0,0,1,21.5,36.5Z" transform="translate(-5.5 -20.5)"/></svg>');
    };
           
    <?php echo "</style>";
           
}
add_action( 'wp_head', 'vedic_spa_dynamic_css', 100 );

/**
 * Footer Bottom
*/
function blossom_spa_footer_bottom(){ ?>
    <div class="footer-b">
        <div class="container">
            <div class="copyright">           
            <?php
                blossom_spa_get_footer_copyright();

                esc_html_e( ' Vedic Spa | Developed By ', 'vedic-spa' );
                echo '<a href="' . esc_url( 'https://blossomthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( ' Blossom Themes', 'vedic-spa' ) . '</a>.';
                
                printf( esc_html__( ' Powered by %s', 'vedic-spa' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'vedic-spa' ) ) .'" target="_blank">WordPress</a>. ' );
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
            <?php blossom_spa_social_links( true, false ); ?>
            <button aria-label="<?php esc_attr_e( 'go to top', 'vedic-spa' ); ?>" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
            </button>
        </div>
    </div>
    <?php
}