<?php 
/**
 * Customizer options
 * @package     Elemento
 * @link        http://www.greenturtlelab.com/
 * since        1.0.0
 * Author:      Greenturtlelab
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */ 

// sidebar area
 $wp_customize->add_panel( 'elemento_sidebar_panel', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Sidebar Setting', 'elemento'),
    ) );



    // post sidebar position
    $wp_customize->add_section(
        'elemento_sidebar_panel',
        array(
            'title'         => __('Post sidebar', 'elemento'),
            'priority'      => 10,
            'panel'         => 'elemento_sidebar_panel', 
        )
    );

    // post archive sidebar position
    $wp_customize->add_setting(
        'post_arhive_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'elemento_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'post_arhive_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Post archive sidebar position', 'elemento'),
            'section'     => 'elemento_sidebar_panel',
            'description' => __('Select the sidebar position for post index/archive templates', 'elemento'),
            'choices' => array(
                'none'    => __('No sidebar', 'elemento'),
                'right'     => __('Right sidebar', 'elemento'),
                'left'=> __('Left sidebar', 'elemento')
            ),
        )
    );

    // post single sidebar posistion
    $wp_customize->add_setting(
        'post_single_sidebar_type',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'elemento_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'post_single_sidebar_type',
        array(
            'type'        => 'radio',
            'label'       => __('Post single sidebar position', 'elemento'),
            'section'     => 'elemento_sidebar_panel',
            'description' => __('Select the sidebar position for post single templates', 'elemento'),
            'choices' => array(
                'none'    => __('No sidebar', 'elemento'),
                'right'     => __('Right sidebar', 'elemento'),
                'left'=> __('Left sidebar', 'elemento')
            ),
        )
    );

    // post sidebar id
    $wp_customize->add_setting(
        'post_sidebar_id',
        array(
            'default'           => 'sidebar-1',
            'sanitize_callback' => 'elemento_sanitize_sidebar_id',
        )
    );

    $wp_customize->add_control(
        'post_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'elemento'),
            'section'     => 'elemento_sidebar_panel',
            'description' => __('Select sidebar for post archive/single pages. Will ignored if No sidebar is checked above', 'elemento'),
            'choices' => elemento_sidebars(),
        )
    );


    // page sidebar position
    $wp_customize->add_section(
        'elemento_page_sidebar_panel',
        array(
            'title'         => __('Page sidebar', 'elemento'),
            'priority'      => 10,
            'panel'         => 'elemento_sidebar_panel', 
        )
    );

    $wp_customize->add_setting(
        'page_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'elemento_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'page_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Page sidebar position', 'elemento'),
            'section'     => 'elemento_page_sidebar_panel',
            'description' => __('Select the sidebar position for pages', 'elemento'),
            'choices' => array(
                'none'    => __('No sidebar', 'elemento'),
                'right'     => __('Right sidebar', 'elemento'),
                'left'=> __('Left sidebar', 'elemento')
            ),
        )
    );

    // page sidebar id
    $wp_customize->add_setting(
        'page_sidebar_id',
        array(
            'default'           => 'sidebar-1',
            'sanitize_callback' => 'elemento_sanitize_sidebar_id',
        )
    );
    $wp_customize->add_control(
        'page_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'elemento'),
            'section'     => 'elemento_page_sidebar_panel',
            'description' => __('Select sidebar for pages. Will ignored if No sidebar is checked above', 'elemento'),
            'choices' => elemento_sidebars(),
        )
    );



    

    /**
    * Sanitazation 
    */

    // sidebar position
    function elemento_sanitize_sidebar( $input ) {
        $valid = array(
                    'none'    => __('No sidebar', 'elemento'),
                    'right'     => __('Right sidebar', 'elemento'),
                    'left'=> __('Left sidebar', 'elemento')
        );
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }

    // sidebar id
    function elemento_sanitize_sidebar_id( $input ) {
        $valid = elemento_sidebars();
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }

