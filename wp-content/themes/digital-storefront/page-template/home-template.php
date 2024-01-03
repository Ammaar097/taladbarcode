<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider" slider-loop="<?php echo esc_html(get_theme_mod('digital_storefront_slider_loop')); ?>">
    <?php if(get_theme_mod('digital_storefront_slider_section_setting') != ''){ ?>
    <?php $digital_storefront_slide_pages = array();
      for ( $digital_storefront_count = 1; $digital_storefront_count <= 3; $digital_storefront_count++ ) {
        $digital_storefront_mod = intval( get_theme_mod( 'digital_storefront_top_slider_page' . $digital_storefront_count ));
        if ( 'page-none-selected' != $digital_storefront_mod ) {
          $digital_storefront_slide_pages[] = $digital_storefront_mod;
        }
      }
      if( !empty($digital_storefront_slide_pages) ) :
        $digital_storefront_args = array(
          'post_type' => 'page',
          'post__in' => $digital_storefront_slide_pages,
          'orderby' => 'post__in'
        );
        $digital_storefront_query = new WP_Query( $digital_storefront_args );
        if ( $digital_storefront_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $digital_storefront_query->have_posts() ) : $digital_storefront_query->the_post(); ?>
        <div class="slider-box">
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="slider-inner-box">
            <h1><?php the_title(); ?></h1>
            <div class="my-4">
              <a href="<?php the_permalink(); ?>"><?php esc_html_e('VIEW MORE','digital-storefront'); ?></a>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <?php }?>
  </section>

  <?php if(get_theme_mod('digital_storefront_services_on_off') != ''){ ?>
    <section id="serve-sec">
      <div class="container">
        <div class="row serv-bg-box">
          <?php
            $digital_storefront_catData = get_theme_mod('digital_storefront_services','');
            if($digital_storefront_catData){
              $digital_storefront_page_query = new WP_Query(array( 'category_name' => esc_html($digital_storefront_catData,'digital-storefront')));
              while( $digital_storefront_page_query->have_posts() ) : $digital_storefront_page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="serv-box text-center">
                    <?php the_post_thumbnail(); ?>
                    <h4><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                    <p class="mb-0"><?php $digital_storefront_excerpt = get_the_excerpt(); echo esc_html( digital_storefront_string_limit_words( $digital_storefront_excerpt,8 ) ); ?></p>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php if(get_theme_mod('digital_storefront_about_setting') != ''){ ?>
  <section id="about_sec" class="py-5">
    <div class="container">
      <?php $digital_storefront_about_pages = array();
        $digital_storefront_mod = intval( get_theme_mod( 'digital_storefront_about_page' ));
        if ( 'page-none-selected' != $digital_storefront_mod ) {
          $digital_storefront_about_pages[] = $digital_storefront_mod;
        }
        if( !empty($digital_storefront_about_pages) ) :
          $digital_storefront_args = array(
            'post_type' => 'page',
            'post__in' => $digital_storefront_about_pages,
            'orderby' => 'post__in'
          );
          $digital_storefront_query = new WP_Query( $digital_storefront_args );
          if ( $digital_storefront_query->have_posts() ) :
      ?>
      <?php  while ( $digital_storefront_query->have_posts() ) : $digital_storefront_query->the_post(); ?>
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-inner-box">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
              <div class="my-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('VIEW MORE','digital-storefront'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </div>
  </section>
  <?php }?>

  <section id="content-section" class="container">
    <div class="py-5">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
