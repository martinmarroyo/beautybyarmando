<?php
function elemento_photography_enqueue_styles() {

    $parent_style = 'elemento-style'; 

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'elemento_photography_enqueue_styles' );


if( ! function_exists('elemento_photography_bg_data') ):

    function elemento_photography_bg_data(){
        $bg1    = esc_url( get_theme_mod( 'bg_image_3' ) );
        

    return $bg;

}

endif;



// Add Footer callout section to admin appearance customize screen
if( ! function_exists('elemento_photography_footer_callout') ):

function elemento_photography_footer_callout($wp_customize) {
    $wp_customize->add_section('lwp-footer-callout-section', array(
        'title' => __('Parallax Template Options', 'elemento-photography' ),
        'description'   => __('This option will work when you use parallax page template.', 'elemento-photography'), 
    ));

    

    $wp_customize->add_setting('lwp-footer-callout-headline', array(
        'default' => __('Your Heading','elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline-control', array(
            'label' => __('Parallax Row 1 Heading','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-headline',
            'priority'       => 1,
        )));

    $wp_customize->add_setting('lwp-footer-callout-text', array(
        'default' => __('Enter your own text here.','elemento-photography'),
        'sanitize_callback' => 'sanitize_textarea_field'
    ));
    

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-text-control', array(
            'label' => __('Text','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-text',
            'type' => 'textarea',
            'priority'       => 3,
        )));
        
    $wp_customize->add_setting('lwp-footer-callout-link-text', array(
        'default' => __('Call to Action Text' ,'elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-text-control', array(
            'label' => __('Link Text','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-link-text',
            'priority'       => 5,
        )));
    
    $wp_customize->add_setting('lwp-footer-callout-link',
        array(
            'default' => __('#','elemento-photography'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-link-control', array(
            'label' => __('Link', 'elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-link',
            'priority'       => 6,
            
        )));
    
    
        
    
    $wp_customize->add_setting(
        'bg_image_3',
        array(
            'default' => get_template_directory_uri().'/assets/images/polynesia-3021072_1280.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'bg_image_3',
            array(
               'label'          => __( 'Parallax Row 1 Image', 'elemento-photography' ),
               'description'   => __('For best results please use an image with resolution  1200px x 800px or more', 'elemento-photography'),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'bg_image_3',
               'priority'       => 19,
            )
        )
    );
    
    $wp_customize->add_setting('lwp-footer-callout-headline2', array(
        'default' => __('ENTER YOUR TEXT HERE','elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-headline2-control', array(
            'label' => __('Parallax Row 2 Heading','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-headline2',
            'priority'       => 30,
        )));
    
    $wp_customize->add_setting(
        'bg_image_4',
        array(
            'default' => get_template_directory_uri().'/assets/images/candle-2062861_1920.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'bg_image_4',
            array(
               'label'          => __( 'Parallax Row 2 Image', 'elemento-photography' ),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'bg_image_4',
               'priority'       => 33,
            )
        )
    );
    
    
    $wp_customize->add_setting(
        'right_color',
        array(
            'default'           => '#ed5b4b',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'right_color',
            array(
                'label' => __('Right column color', 'elemento-photography'),
                'section' => 'lwp-footer-callout-section',
                'priority' => 20
            )
        )
    );
    
    $wp_customize->add_setting(
        'tt_color',
        array(
            'default'           => '#f4f4f4',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tt_color',
            array(
                'label' => __('Parallax Row 1 Heading Color', 'elemento-photography'),
                'section' => 'lwp-footer-callout-section',
                'priority' => 2
            )
        )
    );
    
    $wp_customize->add_setting(
        'p_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'p_color',
            array(
                'label' => __('Paragraph Text Color', 'elemento-photography'),
                'section' => 'lwp-footer-callout-section',
                'priority' => 4
            )
        )
    );
    
    $wp_customize->add_setting(
        'link_color',
        array(
            'default'           => '#6CED4B',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label' => __('Link color', 'elemento-photography'),
                'section' => 'lwp-footer-callout-section',
                'priority' => 7
            )
        )
    );
    
    $wp_customize->add_setting(
        'tt2_color',
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tt2_color',
            array(
                'label' => __('Row 2 Heading Color', 'elemento-photography'),
                'section' => 'lwp-footer-callout-section',
                'priority' => 32
            )
        )
    );
    
    
    
    $wp_customize->add_setting('lwp-footer-callout-so-link1',
        array(
            'default' => __('#','elemento-photography'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-link1-control', array(
            'label' => __('Socail Icon Link 1', 'elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-link1',
            'priority'       => 61,
            
        )));
    
    $wp_customize->add_setting('lwp-footer-callout-so-link2',
        array(
            'default' => __('#','elemento-photography'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-link2-control', array(
            'label' => __('Socail Icon Link 2', 'elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-link2',
            'priority'       => 62,
            
        )));
        
    $wp_customize->add_setting('lwp-footer-callout-so-link3',
        array(
            'default' => __('#','elemento-photography'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-link3-control', array(
            'label' => __('Socail Icon Link 3', 'elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-link3',
            'priority'       => 63,
            
        )));
        
    $wp_customize->add_setting('lwp-footer-callout-so-link4',
        array(
            'default' => __('#','elemento-photography'),
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-link4-control', array(
            'label' => __('Socail Icon Link 4', 'elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-link4',
            'priority'       => 64,
            
        )));
        
    $wp_customize->add_setting( 'elemento_photography_collage_section_enable', array(
            'sanitize_callback' => 'esc_url_raw',
            'default'           => false,
        ) );
        
        $wp_customize->add_control(
            new WP_Customize_Control($wp_customize,'elemento_photography_collage_section_enable',array(
                'description'   => __('Please enable this section if you want to use Photo Collage section', 'elemento-photography'),
				'label'    => __( 'Enable Photo Collage Section', 'elemento-photography' ),
                'section'  => 'lwp-footer-callout-section',
                'settings' => 'elemento_photography_collage_section_enable',
                'type'     => 'checkbox',
                'priority'       => 66,
            ) ) );
	
	 $wp_customize->add_setting(
        'col_image_1',
        array(
            'default' => get_template_directory_uri().'/assets/images/candle-2062861_1920.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'col_image_1',
            array(
               'label'          => __( 'Collage Image 1', 'elemento-photography' ),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'col_image_1',
               'priority'       => 67,
            )
        )
    );
	$wp_customize->add_setting(
        'col_image_2',
        array(
            'default' => get_template_directory_uri().'/assets/images/candle-2062861_1920.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'col_image_2',
            array(
               'label'          => __( 'Collage Image 2', 'elemento-photography' ),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'col_image_2',
               'priority'       => 68,
            )
        )
    );
	$wp_customize->add_setting(
        'col_image_3',
        array(
            'default' => get_template_directory_uri().'/assets/images/candle-2062861_1920.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'col_image_3',
            array(
               'label'          => __( 'Collage Image 3', 'elemento-photography' ),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'col_image_3',
               'priority'       => 69,
            )
        )
    );
	
	$wp_customize->add_setting(
        'col_bg_image',
        array(
            'default' => get_template_directory_uri().'/assets/images/candle-2062861_1920.jpg',
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'col_bg_image',
            array(
               'label'          => __( 'Collage Section BG Image', 'elemento-photography' ),
               'type'           => 'image',
               'section'        => 'lwp-footer-callout-section',
               'settings'       => 'col_bg_image',
               'priority'       => 66,
            )
        )
    );
	
	$wp_customize->add_setting('lwp-footer-callout-so-ind1', array(
        'default' => __('0','elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-ind1-control', array(
            'label' => __('Z-index value for image 1','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-ind1',
            'priority'       => 67,
        )));
	
	 $wp_customize->add_setting('lwp-footer-callout-so-ind2', array(
        'default' => __('0','elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-ind2-control', array(
            'label' => __('Z-index value for image 2','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-ind2',
            'priority'       => 68,
        )));
	
	$wp_customize->add_setting('lwp-footer-callout-so-ind3', array(
        'default' => __('0','elemento-photography'),
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'lwp-footer-callout-so-ind3-control', array(
            'label' => __('Z-index value for image 3','elemento-photography'),
            'section' => 'lwp-footer-callout-section',
            'settings' => 'lwp-footer-callout-so-ind3',
            'priority'       => 69,
        )));
    
}
add_action('customize_register', 'elemento_photography_footer_callout');

endif;



if( ! function_exists('elemento_photography_photo_dynamic_css') ):
function elemento_photography_photo_dynamic_css(){
    ob_start();

    ?>
    <style>
    
    .right-col {
                background:<?php echo esc_attr( get_theme_mod('right_color') ); ?>
            
        }
    .para-text h2 {
                color:<?php echo esc_attr( get_theme_mod('tt_color') ); ?>
            
        }
        .para-text p {
                color:<?php echo esc_attr( get_theme_mod('p_color') ); ?>
            
        }
        .para-text h4 a {
                color:<?php echo esc_attr( get_theme_mod('link_color') ); ?>
            
        }
        
        .gallery-title {
            color:<?php echo esc_attr( get_theme_mod('tt2_color') ); ?>
            
        }
		
		.photo-collage {
		background: url('<?php echo esc_attr( get_theme_mod('col_bg_image') ); ?>') no-repeat;   
		background-size: auto;
		background-position: center;
		background-size: cover;
		}
		.ptc-1 {
		z-index: <?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-ind1') ); ?>;
		}
        .ptc-2 {
		z-index: <?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-ind2') ); ?>;
		}
		.ptc-3 {
		z-index: <?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-ind3') ); ?>;
		}
            <?php
            if (  esc_url( get_theme_mod( 'bg_image_3' ) ) ) {
                $about_row_background_image_url = esc_url( get_theme_mod( 'bg_image_3' ) );
            } else {
                $about_row_background_image_url = esc_url( get_stylesheet_directory_uri() . '/assets/images/polynesia-3021072_1280.jpg');
            }
            ?>
            .about-row {
                background-image: url( <?php echo $about_row_background_image_url; ?> );
            }
       
        
        
        
                <?php
            if (  get_theme_mod( 'bg_image_4' )  ) {
                $full_wd_background_image_url = esc_url( get_theme_mod( 'bg_image_4' ) );
            } else {
                $full_wd_background_image_url = esc_url( get_stylesheet_directory_uri() . '/assets/images/candle-2062861_1920.jpg');
            }
             ?>
            .full-wd {
                background-image: url( <?php echo $full_wd_background_image_url; ?> );
            }
        
        
        
    </style>
    <?php 
    echo ob_get_clean();
}
add_action( 'wp_head' , 'elemento_photography_photo_dynamic_css' , 55 );
endif;



add_editor_style('editor-style.css');




require 'inc/activation.php';


