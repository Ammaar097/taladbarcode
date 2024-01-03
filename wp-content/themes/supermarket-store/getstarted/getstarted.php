<?php
//about theme info
add_action( 'admin_menu', 'supermarket_store_gettingstarted' );
function supermarket_store_gettingstarted() {    	
	add_theme_page( esc_html__('About Supermarket Store', 'supermarket-store'), esc_html__('About Supermarket Store', 'supermarket-store'), 'edit_theme_options', 'supermarket_store_guide', 'supermarket_store_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function supermarket_store_admin_theme_style() {
   wp_enqueue_style('supermarket-store-custom-admin-style', esc_url(get_template_directory_uri()) . '/getstarted/getstarted.css');
   wp_enqueue_script('supermarket-store-tabs', esc_url(get_template_directory_uri()) . '/getstarted/js/tab.js');
}
add_action('admin_enqueue_scripts', 'supermarket_store_admin_theme_style');

//guidline for about theme
function supermarket_store_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'supermarket-store' );
?>
<?php $supermarket_store_theme = wp_get_theme(); ?>
<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Supermarket Store Theme', 'supermarket-store' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('Our WordPress themes are designed to be cutting-edge, ensuring that they incorporate the latest design trends and technologies. They offer an uncluttered and user-friendly experience, making it easy for users to navigate and understand the content. These themes are fully responsive, adapting seamlessly to various devices, and are SEO-friendly to enhance search engine visibility. Packed with a wide array of features, they cater to bloggers, designers, and other creative professionals, offering versatility and convenience in website development. Whether you are a blogger looking for a clean, modern design or a designer seeking feature-rich options, these themes provide the tools you need to create a website that meets your unique requirements.','supermarket-store'); ?></p>
    </div>
    <div class="col-right">
 		<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $supermarket_store_theme->get_screenshot() ); ?>" />
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="supermarket_store_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Lite Theme Details', 'supermarket-store' ); ?></button>
		  	<button class="tablinks" onclick="supermarket_store_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'supermarket-store' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="lite_theme" class="tabcontent open">
			<div class="lite-theme-tab" style="">
				<h3><?php esc_html_e( 'Lite Theme Information', 'supermarket-store' ); ?></h3>
				<hr class="h3hr">
		  		<p><?php
						$supermarket_store_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'revolutionwp_theme_description', esc_html( $supermarket_store_theme->get( 'Description' ) ) ) );
					?></p>
			  	<div class="col-left-inner">
					<h4><?php esc_html_e('Theme Customizer', 'supermarket-store'); ?></h4>
					<p> <?php esc_html_e('click here to customize your website.', 'supermarket-store'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'supermarket-store'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Experiencing Issues? Require Assistance?', 'supermarket-store'); ?></h4>
					<p> <?php esc_html_e('Our committed team is fully equipped to assist you with any questions or concerns you may have about our theme.', 'supermarket-store'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url(SUPERMARKET_STORE_FREE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'supermarket-store'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Customer Reviews and Testimonials', 'supermarket-store'); ?></h4>
					<p> <?php esc_html_e('Every aspect and feature of this WordPress Theme is exceptional. I would highly recommend this theme to everyone.', 'supermarket-store'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( SUPERMARKET_STORE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'supermarket-store'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Go For Premium', 'supermarket-store'); ?></h4>
					<p> <?php esc_html_e('Premium themes usually receive regular updates to stay compatible with the latest versions of WordPress.', 'supermarket-store'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( SUPERMARKET_STORE_PRO_THEME ); ?>" target="_blank"><?php esc_html_e('Get Premium', 'supermarket-store'); ?></a>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','supermarket-store'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','supermarket-store'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','supermarket-store'); ?></span><?php esc_html_e(' Go to ','supermarket-store'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','supermarket-store'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Home Page".','supermarket-store'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/getstarted/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','supermarket-store'); ?></span><?php esc_html_e(' Go to ','supermarket-store'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','supermarket-store'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','supermarket-store'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/getstarted/images/set-front-page.png" alt="" />
	                </ul>
			  	</div>
		  	</div>
		</div>
		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'supermarket-store' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Supermarket WordPress Theme is an exceptional, feature-rich template meticulously designed to cater exclusively to online supermarkets, grocery stores, and food retailers. It represents the pinnacle of website design, offering a comprehensive and sophisticated solution to empower businesses in establishing a robust and competitive online presence. This premium theme caters to a diverse range of businesses operating within the food and grocery industry, regardless of their scale. Whether you are a small local grocer or a renowned supermarket chain, this theme is thoughtfully designed to help expand your market reach and enhance your e-commerce capabilities. What truly distinguishes the Supermarket WordPress Theme is its status as a premium theme. It brings a multitude of benefits to the table, including enhanced functionality and customization options compared to free themes. This premium status also ensures dedicated customer support and regular updates, guaranteeing that your online store remains up-to-date and well-maintained.','supermarket-store'); ?></p>
		    <div class="pro-links">
			    	<a href="<?php echo esc_url( SUPERMARKET_STORE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'supermarket-store'); ?></a>
					<a class="buy-pro" href="<?php echo esc_url( SUPERMARKET_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'supermarket-store'); ?></a>
					<a href="<?php echo esc_url( SUPERMARKET_STORE_PRO_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Premium Suppport', 'supermarket-store'); ?></a>
				</div>
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'supermarket-store' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'supermarket-store'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'supermarket-store'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Customizing the theme', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Adaptive Layout', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Uploading a Logo', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Links to Social Media', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Quantity of Slides', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'supermarket-store'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'supermarket-store'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'supermarket-store'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Sections of the theme', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'supermarket-store'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'supermarket-store'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'supermarket-store'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'supermarket-store'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates and Layout', 'supermarket-store'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'supermarket-store'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates and Layout', 'supermarket-store'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'supermarket-store'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Scheme for Specific Sections', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Enable Setting Site Title, Tagline, and Logo', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Toggle On/Off Options for All Sections and Logo', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Up-to-Date Compatibility with the Latest WordPress Version', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Compatibility with WooCommerce', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support for Third-Party Plugins', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Programming', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Unique Features', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Affordable Value', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('High-Priority Error Resolution', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Effortless Customer Support', 'supermarket-store'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( SUPERMARKET_STORE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'supermarket-store'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

<?php } ?>

