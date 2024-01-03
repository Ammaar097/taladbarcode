/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-digital_storefront_options-';
		
		// Label
		function digital_storefront_customizer_label( id, title ) {

			// Colors

			if ( id === 'digital_storefront_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'digital_storefront_header_offer_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'digital_storefront_preloader_hide' || id === 'digital_storefront_sticky_header' || id === 'digital_storefront_scroll_hide' || id === 'digital_storefront_products_per_row' || id === 'digital_storefront_scroll_top_position' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'digital_storefront_woocommerce_product_sale' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'digital_storefront_facebook_icon' || id === 'digital_storefront_twitter_icon' || id === 'digital_storefront_twitter_icon' || id === 'digital_storefront_linkedin_icon' || id === 'digital_storefront_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'digital_storefront_slider_section_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Services

			if ( id === 'digital_storefront_services_on_off' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// About Us

			if ( id === 'digital_storefront_about_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'digital_storefront_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'digital_storefront_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'digital_storefront_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'digital_storefront_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'digital_storefront_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-digital_storefront_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		digital_storefront_customizer_label( 'digital_storefront_theme_color', 'Theme Color' );
		digital_storefront_customizer_label( 'background_color', 'Colors' );
		digital_storefront_customizer_label( 'background_image', 'Image' );

		// Site Identity
		digital_storefront_customizer_label( 'custom_logo', 'Logo Setup' );
		digital_storefront_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		digital_storefront_customizer_label( 'digital_storefront_header_offer_text', 'Header Text' );

		// General Setting
		digital_storefront_customizer_label( 'digital_storefront_preloader_hide', 'Preloader' );
		digital_storefront_customizer_label( 'digital_storefront_sticky_header', 'Sticky Header' );
		digital_storefront_customizer_label( 'digital_storefront_scroll_hide', 'Scroll To Top' );
		digital_storefront_customizer_label( 'digital_storefront_products_per_row', 'Woocommerce Setting' );
		digital_storefront_customizer_label( 'digital_storefront_scroll_top_position', 'Scroll to top Position' );
		digital_storefront_customizer_label( 'digital_storefront_woocommerce_product_sale', 'Woocommerce Product Sale Positions' );

		// Social Icon
		digital_storefront_customizer_label( 'digital_storefront_facebook_icon', 'Facebook' );
		digital_storefront_customizer_label( 'digital_storefront_twitter_icon', 'Twitter' );
		digital_storefront_customizer_label( 'digital_storefront_intagram_icon', 'Intagram' );
		digital_storefront_customizer_label( 'digital_storefront_linkedin_icon', 'Linkedin' );
		digital_storefront_customizer_label( 'digital_storefront_pintrest_icon', 'Pinterest' );

		//Slider
		digital_storefront_customizer_label( 'digital_storefront_slider_section_setting', 'Slider' );

		//Services
		digital_storefront_customizer_label( 'digital_storefront_services_on_off', 'Services' );

		//About Us
		digital_storefront_customizer_label( 'digital_storefront_about_setting', 'About Us' );

		//Header Image
		digital_storefront_customizer_label( 'header_image', 'Header Image' );

		//Footer
		digital_storefront_customizer_label( 'digital_storefront_footer_text_setting', 'Footer' );

		//Single Post Setting
		digital_storefront_customizer_label( 'digital_storefront_single_post_thumb', 'Single Post Setting' );
		digital_storefront_customizer_label( 'digital_storefront_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		digital_storefront_customizer_label( 'digital_storefront_post_page_title', 'Post Setting' );

		// Page Setting
		digital_storefront_customizer_label( 'digital_storefront_single_page_title', 'Page Setting' );
	

	}); // wp.customize ready

})( jQuery );
