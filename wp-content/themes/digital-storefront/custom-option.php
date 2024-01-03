<?php

    $digital_storefront_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $digital_storefront_scroll_position = get_theme_mod( 'digital_storefront_scroll_top_position','Right');
    if($digital_storefront_scroll_position == 'Right'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='right: 20px;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_scroll_position == 'Left'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='left: 20px;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_scroll_position == 'Center'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='right: 50%;left: 50%;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/

    $digital_storefront_slider_img_opacity = get_theme_mod( 'digital_storefront_slider_opacity_color','');
    if($digital_storefront_slider_img_opacity == '0'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.1'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.1';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.2'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.2';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.3'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.3';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.4'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.4';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.5'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.5';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.6'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.6';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.7'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.7';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.8'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.8';
        $digital_storefront_theme_css .='}';
        }else if($digital_storefront_slider_img_opacity == '0.9'){
        $digital_storefront_theme_css .='.slider-box img{';
            $digital_storefront_theme_css .='opacity:0.9';
        $digital_storefront_theme_css .='}';
        }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $digital_storefront_product_sale = get_theme_mod( 'digital_storefront_woocommerce_product_sale','Right');
    if($digital_storefront_product_sale == 'Right'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='left: auto; right: 15px;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_product_sale == 'Left'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='left: 15px; right: auto;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_product_sale == 'Center'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='right: 50%;left: 50%;';
        $digital_storefront_theme_css .='}';
    }