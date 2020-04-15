<?php
/**
 * Customizer options
 * @package     Elemento
 * @link        http://www.greenturtlelab.com/
 * since        1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

    // color area
    $wp_customize->add_panel( 'elemento_colors_panel', array(
        'priority'       => 20,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Color Setting', 'elemento'),
    ) );

    // body color
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#292b2c',
            'sanitize_callback' => 'sanitize_hex_color',
           
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'elemento'),
                'section' => 'colors',
                'settings'      => 'body_text_color',
                'priority' => 3
            )
        )
    );    
	
    
    // header color
    $wp_customize->add_section(
        'colors_header',
        array(
            'title'         => __('Header', 'elemento'),
            'priority'      => 12,
            'panel'         => 'elemento_colors_panel',
        )
    );
    
    // menu background color
    $wp_customize->add_setting(
        'menu_bg_color',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_color',
            array(
                'label' => __('Menu background', 'elemento'),
                'section' => 'colors_header',
                'priority' => 12
            )
        )
    );     

    // top level menu color
    $wp_customize->add_setting(
        'top_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_items_color',
            array(
                'label' => __('Top level menu items', 'elemento'),
                'section' => 'colors_header',
                'priority' => 13
            )
        )
    );

    // top level menu hover color
    $wp_customize->add_setting(
        'menu_items_hover',
        array(
            'default'           => '#d65050',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_items_hover',
            array(
                'label' => __('Menu items hover', 'elemento'),
                'section' => 'colors_header',
                'priority' => 15
            )
        )
    );

    // sub menu hover color
    $wp_customize->add_setting(
        'submenu_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_items_color',
            array(
                'label' => __('Sub-menu items', 'elemento'),
                'section' => 'colors_header',
                'priority' => 16
            )
        )
    );


    // submenu background color
    $wp_customize->add_setting(
        'submenu_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background',
            array(
                'label' => __('Sub-menu background', 'elemento'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    );

    //  Mobile menu icon color
    $wp_customize->add_setting(
        'mobile_menu_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mobile_menu_color',
            array(
                'label' => __('Mobile menu button', 'elemento'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    ); 

    // slider text color
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text',
            array(
                'label' => __('Banner slider text', 'elemento'),
                'section' => 'colors_header',
                'priority' => 18
            )
        )
    );

    

    // sidebar backgound color
    $wp_customize->add_setting(
        'sidebar_background',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_background',
            array(
                'label' => __('Sidebar background', 'elemento'),
                'section' => 'colors_sidebar',
                'priority' => 20
            )
        )
    );

    // sidebar color
    $wp_customize->add_section(
        'colors_sidebar',
        array(
            'title'         => __('Sidebar', 'elemento'),
            'priority'      => 13,
            'panel'         => 'elemento_colors_panel',
        )
    );

    $wp_customize->add_setting(
        'sidebar_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label' => __('Sidebar color', 'elemento'),
                'section' => 'colors_sidebar',
                'priority' => 21
            )
        )
    );
    
    //Border Color

    $wp_customize->add_setting(
        'theme_border_color',
        array(
            'default'           => '#b20197',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'theme_border_color',
            array(
                'label' => __('Button-Border Color', 'elemento'),
                'section' => 'colors_sidebar',
                'priority' => 44
            )
        )
    ); 

    // footer section color
    $wp_customize->add_section(
        'colors_footer',
        array(
            'title'         => __('Footer', 'elemento'),
            'priority'      => 14,
            'panel'         => 'elemento_colors_panel',
        )
    );    
    


    // copyright background color
    $wp_customize->add_setting(
        'copyright_bg_color',
        array(
            'default'           => '#6b6b6b',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_bg_color',
            array(
                'label' => __('Copyright background', 'elemento'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );

    // copyright color
    $wp_customize->add_setting(
        'copyright_color',
        array(
            'default'           => '#efefef',
            'sanitize_callback' => 'sanitize_hex_color',
            
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'copyright_color',
            array(
                'label' => __('Copyright text color', 'elemento'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );