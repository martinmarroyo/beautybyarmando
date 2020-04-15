<?php 

/**

 * Customizer options

 * @package     Elemento

 * @link        http://www.greenturtlelab.com/

 * since        1.0.0

 * Author:      Greenturtlelab

 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt

 */

    

    // footer area

    $wp_customize->add_section(

        'elemento_footer',

        array(

            'title'         => __('Footer Setting', 'elemento'),

            'priority'      => 18,

        )

    );


    // footer widget ares
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '4',
            'sanitize_callback' => 'elemento_sanitize_footer_widget',
        )
    );

    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget areas', 'elemento'),
            'section'     => 'elemento_footer',
            'description' => __('No of widgets you want on footer. You can add widgets from Appearance->Widgets.', 'elemento'),
            'choices' => array(
                '1'     => __('One', 'elemento'),
                '2'     => __('Two', 'elemento'),
                '3'     => __('Three', 'elemento'),
                '4'     => __('Four', 'elemento'),
            ),
        )
    );
   



    // footer copyright text

    $wp_customize->add_setting(

        'footer_copyright',

        array(

            'default'           => __('Copyright Yourcompany. All rights reserved.','elemento'),

            'sanitize_callback' => 'sanitize_text_field',

        )

    );



    $wp_customize->add_control(

        'footer_copyright',

        array(

            'type'        => 'text',

            'label'       => __('Footer copyright', 'elemento'),

            'section'     => 'elemento_footer',

            'description' => __('Enter copyright text', 'elemento'),

        )

    );


/**
 * Sanitazation 
 */

    // footer widget areas
    function elemento_sanitize_footer_widget( $input ) {
        $valid = array(
            '1'     => __('One', 'elemento'),
            '2'     => __('Two', 'elemento'),
            '3'     => __('Three', 'elemento'),
            '4'     => __('Four', 'elemento')
        );
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }


