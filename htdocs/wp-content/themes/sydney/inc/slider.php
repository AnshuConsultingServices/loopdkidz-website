<?php
/**
 * Slider template
 *
 * @package Sydney
 */

//Slider template
if ( ! function_exists( 'sydney_slider_template' ) ) :
function sydney_slider_template() {

    if ( (get_theme_mod('front_header_type','slider') == 'slider' && is_front_page()) || (get_theme_mod('site_header_type') == 'slider' && !is_front_page()) ) {

    //Get the slider options
    $speed      = get_theme_mod('slider_speed', '4000');
    $text_slide = get_theme_mod('textslider_slide', 0);
    $button     = sydney_slider_button();
    $mobile_slider = get_theme_mod('mobile_slider', 'responsive');

    //Slider text
    if ( !function_exists('pll_register_string') ) {
    	$titles = array(
    		'slider_title_1' => get_theme_mod('slider_title_1', 'Welcome to Sydney'),
    		'slider_title_2' => get_theme_mod('slider_title_2', 'Ready to begin your journey?'),
    		'slider_title_3' => get_theme_mod('slider_title_3'),
    		'slider_title_4' => get_theme_mod('slider_title_4'),
    		'slider_title_5' => get_theme_mod('slider_title_5'),
    	);
    	$subtitles = array(
    		'slider_subtitle_1' => get_theme_mod('slider_subtitle_1', 'Feel free to look around'),
    		'slider_subtitle_2' => get_theme_mod('slider_subtitle_2', 'Feel free to look around'),
    		'slider_subtitle_3' => get_theme_mod('slider_subtitle_3'),
    		'slider_subtitle_4' => get_theme_mod('slider_subtitle_4'),
    		'slider_subtitle_5' => get_theme_mod('slider_subtitle_5'),    		
    	);
    } else {
    	$titles = array(
    		'slider_title_1' => pll__( get_theme_mod('slider_title_1', 'Welcome to Sydney') ),
    		'slider_title_2' => pll__( get_theme_mod('slider_title_2', 'Ready to begin your journey?') ),
    		'slider_title_3' => pll__( get_theme_mod('slider_title_3') ),
    		'slider_title_4' => pll__( get_theme_mod('slider_title_4') ),
    		'slider_title_5' => pll__( get_theme_mod('slider_title_5') ),
    	);
    	$subtitles = array(
    		'slider_subtitle_1' => pll__( get_theme_mod('slider_subtitle_1', 'Feel free to look around') ),
    		'slider_subtitle_2' => pll__( get_theme_mod('slider_subtitle_2', 'Feel free to look around') ),
    		'slider_subtitle_3' => pll__( get_theme_mod('slider_subtitle_3') ),
    		'slider_subtitle_4' => pll__( get_theme_mod('slider_subtitle_4') ),
    		'slider_subtitle_5' => pll__( get_theme_mod('slider_subtitle_5') ),    		
    	);
    }
    $images = array(
    		'slider_image_1' => get_theme_mod('slider_image_1', get_template_directory_uri() . '/images/1.jpg'),
    		'slider_image_2' => get_theme_mod('slider_image_2', get_template_directory_uri() . '/images/2.jpg'),
    		'slider_image_3' => get_theme_mod('slider_image_3'),
    		'slider_image_4' => get_theme_mod('slider_image_4'),
    		'slider_image_5' => get_theme_mod('slider_image_5'),
    );

    ?>

    <div id="slideshow" class="header-slider" data-speed="<?php echo esc_attr($speed); ?>" data-mobileslider="<?php echo esc_attr($mobile_slider); ?>">
        <div class="slides-container">

        <?php $c = 1; ?>
        <?php foreach ( $images as $image ) {
        	if ( $image ) {

                $image_alt = sydney_get_image_alt( $image );
        		?>
                <div class="slide-item slide-item-<?php echo $c; ?>" style="background-image:url('<?php echo esc_url( $image ); ?>');">
                    <img class="mobile-slide preserve" src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>"/>
                    <div class="slide-inner">
                        <div class="contain animated fadeInRightBig text-slider">
                        <h2 class="maintitle"><?php echo wp_kses_post( $titles['slider_title_' . $c] ); ?></h2>
                        <p class="subtitle"><?php echo esc_html( $subtitles['slider_subtitle_' . $c] ); ?></p>
                        </div>
                        <?php echo $button; ?>
						<?php es_subbox($namefield = "YES", $desc = "", $group = "Public"); ?>
                    </div>
                </div>
                <?php
        	}
        	$c++;
        }
        ?>

        </div>  
        <?php if ( $text_slide ) : ?>
            <?php echo sydney_stop_text(); ?>
        <?php endif; ?>
    </div>

    <?php
    }
}
endif;

function sydney_slider_button() {

    if ( !function_exists('pll_register_string') ) {
        $slider_button      = get_theme_mod('slider_button_text', 'Click to begin');
        $slider_button_url  = get_theme_mod('slider_button_url','#primary');        
    } else {
        $slider_button      = pll__(get_theme_mod('slider_button_text', 'Click to begin'));
        $slider_button_url  = pll__(get_theme_mod('slider_button_url','#primary'));
    }

    if ($slider_button) {
        return '<a href="' . esc_url($slider_button_url) . '" class="roll-button button-slider">' . esc_html($slider_button) . '</a>';
    }

}

function sydney_stop_text() {

    if ( !function_exists('pll_register_string') ) {
        $slider_title_1     = get_theme_mod('slider_title_1', 'Welcome to Sydney');
        $slider_subtitle_1  = get_theme_mod('slider_subtitle_1','Feel free to look around');
    } else {
        $slider_title_1     = pll__(get_theme_mod('slider_title_1', 'Welcome to Sydney'));
        $slider_subtitle_1  = pll__(get_theme_mod('slider_subtitle_1','Feel free to look around')); 
    }

    ?>    
    <div class="slide-inner text-slider-stopped" >
        <div class="contain text-slider">
            <h2 class="maintitle"><?php echo esc_html($slider_title_1); ?></h2>
            <p class="subtitle"><?php echo esc_html($slider_subtitle_1); ?></p>
			       <form class="es_shortcode_form" data-es_form_id="es_shortcode_form">

<div class="container">
              <div class="sidebar-column col-md-4">
          <div class="es_textbox"><input type="text" id="es_txt_name_pg" class="es_textbox_class" name="es_txt_name_pg" value="" placeholder="Please enter your name here" maxlength="225" style="width: 300px;"></div>      </div>
        
              <div class="sidebar-column col-md-4">
          <div class="es_textbox"><input type="text" id="es_txt_email_pg" class="es_textbox_class" name="es_txt_email_pg" onkeypress="if(event.keyCode==13) es_submit_pages(event, 'http://www.loopdkidz.com')" value="" placeholder="Please enter your email here" maxlength="225" style="width: 300px;"></div>      </div>
        
              <div class="sidebar-column col-md-4">
         <div class="es_button" style="
"><input type="button" id="es_txt_button_pg" class="es_textbox_button es_submit_button" name="es_txt_button_pg" onclick="return es_submit_pages(event, 'http://www.loopdkidz.com')" value="SIGN UP" style="
    width: 150px;
"></div><div class="es_msg" id="es_shortcode_msg"><span id="es_msg_pg"></span></div><input type="hidden" id="es_txt_group_pg" name="es_txt_group_pg" value="Public">      </div>
        
        
    </div>
</form>
        </div>
		

    </div>   
    <?php 
}