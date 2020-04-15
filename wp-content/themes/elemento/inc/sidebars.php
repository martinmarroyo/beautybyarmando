<?php
add_action( 'widgets_init', 'elemento_components_widget_init' );
function elemento_components_widget_init() { 

register_sidebar( array(
        'name'          => esc_html__( 'Default Sidebar', 'elemento' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'elemento' ),
        'before_widget' => '<div id="%1$s" class="thumb-posts flex-box %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
    'name' => __( 'Blog Sidebar', 'elemento' ),
    'id' => 'elemento-blog-sidebar',
    'description' => __( 'Widgets for blog', 'elemento' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) ) ;

   
    

    register_sidebar( array(
    'name' => __( 'Sidebar 2', 'elemento' ),
    'id' => 'elemento-sidebar-2',
    'description' => __( 'Add widgets here', 'elemento' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

     register_sidebar( array(
    'name' => __( 'Sidebar 3', 'elemento' ),
    'id' => 'elemento-sidebar-3',
    'description' => __( 'Add widgets here', 'elemento' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

      register_sidebar( array(
    'name' => __( 'Sidebar 4', 'elemento' ),
    'id' => 'elemento-sidebar-4',
    'description' => __( 'Add widgets here', 'elemento' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));

      register_sidebar( array(
    'name' => __( 'Sidebar 5', 'elemento' ),
    'id' => 'elemento-sidebar-5',
    'description' => __( 'Add widgets here', 'elemento' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));
}