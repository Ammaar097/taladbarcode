<?php
/**
 * The header for our theme
 *
 * @package Supermarket Store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'supermarket-store' ); ?></a>

	<header id="masthead" class="site-header">

		<?php 
		$top_header = absint(get_theme_mod('supermarket_store_enable_top_header', 1));

		$has_header_image = has_header_image();

		if($top_header == 1){ 
			?>
			<div class="top-header-wrap">
				<div class="container">
					<div class="flex-row">
						<div class="top-header-left">
							<?php if ( get_theme_mod('supermarket_store_menu1_text_option') ) : ?><a href="<?php echo esc_url(get_theme_mod('supermarket_store_menu1_option', '')); ?>"><?php echo esc_html(get_theme_mod('supermarket_store_menu1_text_option', '')); ?></a><?php endif; ?>
							<?php if ( get_theme_mod('supermarket_store_menu2_text_option') ) : ?><a href="<?php echo esc_url(get_theme_mod('supermarket_store_menu2_option', '')); ?>"><?php echo esc_html(get_theme_mod('supermarket_store_menu2_text_option', '')); ?></a><?php endif; ?>
						</div>
						<div class="top-header-right">
							<?php if( get_theme_mod( 'supermarket_store_enable_order_tracking') != '') { ?><?php if(class_exists('woocommerce')){ ?><div class="order-track"><span><?php esc_html_e('Order Tracking','supermarket-store'); ?></span><div class="order-track-hover"><?php echo do_shortcode( '[woocommerce_order_tracking]' ); ?></div></div><?php }?><?php }?>

			              	<?php if( get_theme_mod( 'supermarket_store_enable_currency_switcher') != '') { ?><?php if(class_exists('woocommerce')){ ?><div class="currency-box"><?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?></div><?php } ?><?php }?>

			              	<?php if( get_theme_mod( 'supermarket_store_enable_google_translator') != '') { ?><div class="translate-lang"><?php echo do_shortcode( '[gtranslate]' );?></div><?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="main-header-wrap">
			<div class="top-box" <?php if (!empty($has_header_image)) { ?> style="background-image: url(<?php echo header_image(); ?>);" <?php } ?>>	
				<div class="header-wrap">
					<div class="container">
						<div class="flex-row">
							<div class="main-header main-header-box">
								<div class="site-branding">
									<?php
									the_custom_logo();
									if ( is_front_page() && is_home() ) :
										?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php
									else :
										?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php
									endif;
									$supermarket_store_description = get_bloginfo( 'description', 'display' );
									if ( $supermarket_store_description || is_customize_preview() ) :
										?>
										<p class="site-description"><?php echo $supermarket_store_description; ?></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="main-search-box">
								<?php if(class_exists('woocommerce')){ ?>
						          	<div class="search-box">
						            	<?php get_product_search_form(); ?>
						          	</div>       
						          	<div class="product-cat-box">
						            	<button class="product-btn"><?php esc_html_e('All Categories','supermarket-store'); ?><i class="fas fa-chevron-down"></i></button>
							            <div class="product-cat">
							              	<?php
							                $args = array(
								                'orderby'    => 'title',
								                'order'      => 'ASC',
								                'hide_empty' => 0,
								                'parent'  => 0
							                );
							                $product_categories = get_terms( 'product_cat', $args );
							                $count = count($product_categories);
							                if ( $count > 0 ){
							                    foreach ( $product_categories as $product_category ) {
							                    	$product_cat_id   = $product_category->term_id;
							                    	$cat_link = get_category_link( $product_cat_id );
							                    	if ($product_category->category_parent == 0) { ?>
							                    <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
							                    <?php
							                	}
							                	echo esc_html( $product_category->name ); ?></a></li>
							              	<?php } } ?>
							            </div>
						          	</div>
						        <?php }?>
						    </div>
						    <div class="main-woo-box">
						    	<div class="flex-row">
								    <?php if(class_exists('woocommerce')){ ?>
									    <div class="account-box">
							                <?php if ( is_user_logged_in() ) { ?>
							                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','supermarket-store'); ?>"><i class="fas fa-sign-in-alt"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','supermarket-store' );?></span></a>
							                <?php }
							                else { ?>
							                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','supermarket-store'); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','supermarket-store' );?></span></a>
							                <?php } ?>
							            </div>
							            <div class="cart-no-box">
							                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','supermarket-store' ); ?>"><i class="fas fa-shopping-basket"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','supermarket-store' );?></span></a>
							                <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span>
						              	</div>
						              	<div class="wishlist-box">
							                <?php if(defined('YITH_WCWL')){ ?>
							                  	<a class="wishlist_view position-relative" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="far fa-heart"></i>
							                  	<?php $wishlist_count = YITH_WCWL()->count_products(); ?>
							                  	<span class="wishlist-counter"><?php echo $wishlist_count; ?></span></a>
							                <?php }?>
						              	</div>
						            <?php }?>
					           	</div>
					        </div>
						</div>
					</div>
				</div>
				<div class="nav-box">
					<div class="container">
						<div class="flex-row">
							<div class="nav-box-header-left">
								<div class="section-nav main-header-box">
									<nav id="site-navigation" class="main-navigation">
										<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
										<?php
											wp_nav_menu(
												array(
													'theme_location' => 'menu-1',
													'menu_id'        => 'primary-menu',
												)
											);
										?>
									</nav>
								</div>
							</div>
							<div class="nav-box-header-right">
								<?php if( get_theme_mod('supermarket_store_phone_number') != ''){ ?><p class="phone_no"><?php esc_html_e('Hotline:','supermarket-store');?> <a href="tel:<?php echo esc_attr( get_theme_mod('supermarket_store_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('supermarket_store_phone_number',''));?></a></p><?php } ?>
							</div>
						</div>
					</div>
		    	</div>
			</div>
		</div>
	</header>