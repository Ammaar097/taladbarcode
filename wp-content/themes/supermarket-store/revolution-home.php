<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

<main id="primary">

    <?php
    $slide_count = get_theme_mod('supermarket_store_slide_number');
    $main_slider_wrap = absint(get_theme_mod('supermarket_store_enable_slider', 1));
    if($main_slider_wrap == 1){ 
    ?>

    <section id="main-slider-wrap">
        <div class="owl-carousel">
            <?php for ($i=1; $i<=$slide_count; $i++) { ?>
                <div class="main-slider-inner-box">
                    <?php if ( get_theme_mod('supermarket_store_slider_image'.$i) ) : ?>
                        <img src="<?php echo esc_url( get_theme_mod('supermarket_store_slider_image'.$i) ); ?>">
                        <div class="main-slider-content-box">
                            <?php if ( get_theme_mod('supermarket_store_slider_extra_heading'.$i) ) : ?><h4><?php echo esc_html( get_theme_mod('supermarket_store_slider_extra_heading'.$i) ); ?></h4><?php endif; ?>
                            <?php if ( get_theme_mod('supermarket_store_slider_heading'.$i) ) : ?><h3><?php echo esc_html( get_theme_mod('supermarket_store_slider_heading'.$i) ); ?></h3><?php endif; ?>
                            <?php if ( get_theme_mod('supermarket_store_slider_text'.$i) ) : ?><p><?php echo esc_html( get_theme_mod('supermarket_store_slider_text'.$i) ); ?></p><?php endif; ?>
                            <div class="main-slider-button">
                                <?php if ( get_theme_mod('supermarket_store_slider_button1_link'.$i) ||  get_theme_mod('supermarket_store_slider_button1_text'.$i )) : ?><a href="<?php echo esc_url( get_theme_mod('supermarket_store_slider_button1_link'.$i) ); ?>"><?php echo esc_html( get_theme_mod('supermarket_store_slider_button1_text'.$i) ); ?></a><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
        </div>
    </section>

    <?php } ?>

    <?php 
    $main_expert_wrap = absint(get_theme_mod('supermarket_store_enable_project', 1));
    if($main_expert_wrap == 1){ 
    ?>

    <section id="main-expert-wrap">
        <div class="container">
            <div class="grid-container">
                <?php for ($i=1; $i <= 6; $i++) { ?>
                    <div class="grid-item">
                        <?php if ( get_theme_mod('supermarket_store_category_image'.$i) ) : ?><a href="<?php echo esc_url( get_theme_mod('supermarket_store_category_image_url'.$i) ); ?>"><img src="<?php echo esc_url( get_theme_mod('supermarket_store_category_image'.$i) ); ?>"></a><?php endif; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php } ?>
    
</main>

<?php
get_footer();