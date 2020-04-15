<?php 
/**
 * Customizer options
 * @package     Elemento
 * @link        http://www.greenturtlelab.com/
 * since        1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

    // layout area
    $wp_customize->add_panel( 'elemento_site_layout_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Layout Setting', 'elemento'),
    ) );

    // layout type
    $wp_customize->add_section(
        'elemento_layout_type',
        array(
            'title'         => __('Layout type', 'elemento'),
            'priority'      => 10,
            'panel'         => 'elemento_site_layout_panel', 
        )
    );

    $wp_customize->add_setting(
        'site_layout_type',
        array(
            'default'           => 'full-width-layout',
            'sanitize_callback' => 'elemento_sanitize_site_layout',
        )
    );

    $wp_customize->add_control(
        'site_layout_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site layout', 'elemento'),
            'section'     => 'elemento_layout_type',
            'description' => __('Select the layout type for your website', 'elemento'),
            'choices' => array(
                'full-width-layout'    => __('Full Width', 'elemento'),
                'box-layout'          => __('Boxed', 'elemento'),
               
            ),
        )
    );

    // site container type
    $wp_customize->add_setting(
        'site_container_type',
        array(
            'default'           => 'container-large',
            'sanitize_callback' => 'elemento_sanitize_site_container',
        )
    );

    $wp_customize->add_control(
        'site_container_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site Container', 'elemento'),
            'section'     => 'elemento_layout_type',
            'description' => __('Select the container type for your website', 'elemento'),
            'choices' => array(
                'container-large'    => __('Large', 'elemento'),
                'container-medium'     => __('Medium', 'elemento'),
                'container-small'     => __('Small', 'elemento'),
                'container-fluid'     => __('Fullwidth/Fluid', 'elemento'),
                   
               
            ),
        )
    );
   

/**
 * sanitization
 */

    //site layout
    function elemento_sanitize_site_layout( $input ) {
        $valid = array(
            'full-width-layout'    => __('Full Width', 'elemento'),
                    'box-layout'     => __('Boxed', 'elemento'),
                    'left-header-layout'     => __('Left Menu', 'elemento'),
                    'right-header-layout'     => __('Right Menu', 'elemento'),
        );
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {
            
            return '';
        }
    }

    // site container
    function elemento_sanitize_site_container( $input ) {
        $valid = array(
                    'container-large'    => __('Large', 'elemento'),
                    'container-medium'     => __('Medium', 'elemento'),
                    'container-small'     => __('Small', 'elemento'),
                    'container-fluid'     => __('Fullwidth/Fluid', 'elemento'),
                       
                   
                );

        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }

