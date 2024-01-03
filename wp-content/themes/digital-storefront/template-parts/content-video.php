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

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<div class="col-lg-6 col-md-6 col-sm-6">
  <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?> 
    <header class="entry-header pt-3">
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