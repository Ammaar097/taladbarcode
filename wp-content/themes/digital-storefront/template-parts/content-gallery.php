<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digital Storefront
 */

$digital_storefront_post_page_title =  get_theme_mod( 'digital_storefront_post_page_title', 1 );
$digital_storefront_post_page_thumb = get_theme_mod( 'digital_storefront_post_page_thumb', 1 );
$digital_storefront_post_page_cat = get_theme_mod( 'digital_storefront_post_page_cat', 1 );

?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the gallery.
          if ( get_post_gallery() ) {
            echo '<div class="entry-gallery">';
              echo ( get_post_gallery() );
            echo '</div>';
          };
        };
      ?>
      <header class="entry-header">
        <?php if ($digital_storefront_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
      </header>
      <div class="entry-summary">
        <?php
          the_excerpt();

          wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'digital-storefront'),
            'after' => '</div>',
          ));
        ?>
      </div>
      <?php if ($digital_storefront_post_page_cat == 1 ) {?>
        <footer class="entry-footer">
          <?php digital_storefront_entry_footer(); ?>
        </footer>
      <?php }?>
    </article>
  </div>