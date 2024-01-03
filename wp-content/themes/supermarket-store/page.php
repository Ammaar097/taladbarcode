<?php
/**
 * The template for displaying all pages
 *
 * @package Supermarket Store
 */

get_header();
?>

<div class="container">
	<div class="site-wrapper">
		<main id="primary" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'revolution/template-parts/content', 'page' );

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main>
	</div>
</div>

<?php
get_footer();