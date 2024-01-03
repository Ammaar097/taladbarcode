<?php
/**
 * The template for displaying the footer
 *
 * @package Supermarket Store
 */

?>

	<footer id="colophon" class="site-footer">
		<?php 
			if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
				?>
				<section class="footer-top">
					<div class="container">
						<div class="flex-row">
							<?php
							if (is_active_sidebar('footer-1')) {
							?>
								<div class="footer-col">
									<?php dynamic_sidebar('footer-1'); ?>
								</div>
							<?php
							}
							if (is_active_sidebar('footer-2')) {
							?>	
								<div class="footer-col">
									<?php dynamic_sidebar('footer-2'); ?>
								</div>
							<?php
							}
							if (is_active_sidebar('footer-3')) {
							?>
								<div class="footer-col">
									<?php dynamic_sidebar('footer-3'); ?>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</section>
			<?php
			}
		?>

		<div class="footer-bottom">
			<div class="container">
				<?php 
				$footer_social = absint(get_theme_mod('supermarket_store_footer_social_menu', 1));
				if($footer_social == 1){ 
				?>
				<div class="social-links">
					<?php
						supermarket_store_social_menu();
					?>
				</div>
				<?php 
				} 
				?>
				<div class="site-info">
					<div>
					<?php
			            if (!get_theme_mod('supermarket_store_copyright_option') ) { ?>
			              <a href="<?php echo esc_url('https://www.revolutionwp.com/wp-themes/free-supermarket-wordpress-theme/'); ?>" target="_blank">
			              <?php esc_html_e('Supermarket WordPress Theme By Revolution WP ','supermarket-store'); ?></a>
			            <?php } else {
			              echo esc_html(get_theme_mod('supermarket_store_copyright_option'));
			            }
			          ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php 
	$footer_go_to_top = absint(get_theme_mod('supermarket_store_enable_go_to_top_option', 1));
	if($footer_go_to_top == 1){ 
		?>
		<a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fas fa-chevron-up"></i></a>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
