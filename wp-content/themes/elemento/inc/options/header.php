<?php
/**
 * Customizer options
 * @package     Elemento
 * @link        http://www.greenturtlelab.com/
 * since        1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
       
    // header area
    $wp_customize->add_panel( 'elemento_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Setting', 'elemento'),
    ) );

    // header type
    $wp_customize->add_section(
        'elemento_header_type',
        array(
            'title'         => __('Header type', 'elemento'),
            'priority'      => 10,
            'panel'         => 'elemento_header_panel', 
        )
    );
    
   // menu style
    $wp_customize->add_section(
        'elemento_menu_type',
        array(
            'title'         => __('Header style', 'elemento'),
            'priority'      => 99,
            'panel'         => 'elemento_header_panel', 
        )
    );
    
    // sticky menu
    $wp_customize->add_setting(
        'menu_type',
        array(
            'default'           => 'sticky-header',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'elemento_sanitize_header_type',
        )
    );

    $wp_customize->add_control(
        'menu_type',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Header type', 'elemento'),
            'description' => __('Works with full width and boxed layout' , 'elemento'),
            'section' => 'elemento_menu_type',
            'choices' => array(
                'sticky-header'   => __('Sticky', 'elemento'),
                'static-header'   => __('Static', 'elemento'),
                'absolute-header' => __('Absolute', 'elemento'),
                'fixed-header'   => __('Fixed', 'elemento'),
            ),
        )
    );

    // menu display type
    $wp_customize->add_setting(
        'menu_display',
        array(
            'default'           => 'menu-inline',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'elemento_sanitize_menu_display',
        )
    );

    $wp_customize->add_control(
        'menu_display',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu display', 'elemento'),
            'description'=>__('Works with full width and boxed layout' , 'elemento'),
            'section'   => 'elemento_menu_type',
            'choices'   => array(
                'menu-inline'     => __('Inline', 'elemento'),
                'menu-center'   => __('Centered', 'elemento'),
            ),
        )
    );


    /**
     * Sanitazation 
     */

    // menu type
    function elemento_sanitize_header_type( $input ) {
        $valid = array(
                    'sticky-header'     => __('Sticky', 'elemento'),
                    'static-header'     => __('Static', 'elemento'),
                    'absolute-header'   => __('Absolute', 'elemento'),
                    'fixed-header'      => __('Fixed', 'elemento'),
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }

    // menu display type
    function elemento_sanitize_menu_display( $input ) {
        $valid = array(
            'menu-inline'     => __('Inline', 'elemento'),
                    'menu-center'   => __('Centered', 'elemento'),
        );
        if ( array_key_exists( $input, $valid ) ) {
            return $input;
        } else {
            return '';
        }
    }