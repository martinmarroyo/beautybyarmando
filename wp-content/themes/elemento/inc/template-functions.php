<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Elemento
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elemento_body_classes( $classes ) {
  // Adds a class of hfeed to non-singular pages.
  if ( ! is_singular() ) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter( 'body_class', 'elemento_body_classes' );

function elemento_sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
 
add_action('navigation_markup_template', 'elemento_sanitize_pagination');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function elemento_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}
add_action( 'wp_head', 'elemento_pingback_header' );



if( ! function_exists('elemento_oembed_result') ):

function elemento_oembed_result( $html, $url, $args = NULL ) {

   if( isset( $args['banner'] ) == 1 ){
         
      $html =  preg_replace('/width="\d+"/i', '' , $html );
      $html =  preg_replace('/height="\d+"/i', '' , $html );
      return str_replace("?feature=oembed", "?feature=oembed&autoplay=1&controls=0&loop=1&rel=0&showinfo=0&mute=1", $html);
  
   }else if( isset($args['width'] ) ){

      $html =  preg_replace('/width="\d+"/i', 'width="'.$args['width'].'"' , $html );
      $html =  preg_replace('/height="\d+"/i', 'height="'.$args['height'].'" style="width:'.$args['width'].'px;height:'.$args['height'].'px;" ' , $html );
      return $html;

   }else{
    
       return $html;

   }
}

endif;
add_filter('oembed_result','elemento_oembed_result', 10, 3);


if(!is_admin()):

if ( ! function_exists( 'elemento_excerpt' ) ) :
    function elemento_excerpt( $text ) {

        $excerpt_words = esc_attr( get_theme_mod( 'exc_lenght' , 18 ) );

        $excerpt_length = apply_filters( 'excerpt_length', $excerpt_words );
        
        $excerpt_more = apply_filters( 'excerpt_more', ' ' . '...' );

        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
       
        $text = apply_filters( 'get_the_excerpt', $text );
       
        return '<p>'.$text.'</p>';
    }
  endif;
add_action( 'the_excerpt', 'elemento_excerpt', 10 );
  
endif;

add_action( 'the_excerpt', 'elemento_excerpt', 10 );


if( ! function_exists('elemento_slide_title') ):

  function elemento_slide_title( $title , $control ){

    $parts = explode( ' ', strip_tags( $title ) ); 
    if( count( $parts ) === 1 ){

      return '<p class="'.$control[0].'">'.$parts[0].'</p>';

    }else if( count( $parts ) === 2 ){

       return '<p class="'.$control[0].'">'.$parts[0].'</p><p class="'.$control[1].'">'.$parts[1].'</p>';

    }else if( count( $parts ) === 3 ){

      return '<p class="'.$control[0].'">'.$parts[0].'</p><p class="'.$control[1].'">'.$parts[1].'</p><p class="'.$control[2].'">'.$parts[2].'</p>';
    
    }else{

      $last_part = array_slice( $parts , 2 );
      return '<p class="'.$control[0].'">'.$parts[0].'</p><p class="'.$control[1].'">'.$parts[1].'</p><p class="'.$control[2].'">'.implode(' ', $last_part ).'</p>';
    }
  }

endif;
add_filter('elemento_slide_title' , 'elemento_slide_title', 10,  2);



if( ! function_exists('elemento_slide_subtitle') ):

  function elemento_slide_subtitle( $subtitle , $control ){

     $subtitle = strip_tags(  $subtitle );
     return '<p class="'.$control[3].'">'.$subtitle.'</p>';

  }

endif;
add_filter('elemento_slide_subtitle' , 'elemento_slide_subtitle', 10,  2);


if( ! function_exists('elemento_url_to_id' ) ):

  function elemento_url_to_id( $attachment_url ){
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $attachment_url )); 
    if( isset( $attachment[0] ) ){

      return $attachment[0]; 
    }
    return false;
  }

endif;
add_filter( 'elemento_url_to_id' , 'elemento_url_to_id' , 10 , 1 );


if( ! function_exists( 'elemento_id_to_cropped_url' ) ):

  function elemento_id_to_cropped_url( $attachment_id, $size ){

    $thumb = wp_get_attachment_image_src( $attachment_id, $size );
    if( isset( $thumb[0] ) ){
      return  $thumb[0];
    }
   return false;

  }
endif;
add_filter( 'elemento_id_to_cropped_url' , 'elemento_id_to_cropped_url' , 10 , 2 );


if ( ! function_exists( 'pinwheel_custom_posts_navigation' ) ) :

  /**
   * Posts navigation.
   *
   * @since 1.0.0
   */
  function elemento_posts_navigation() {
    
    the_posts_pagination( array(
                            'mid_size' => 2,
                            'prev_text' => __( '<span aria-hidden="true"> << </span>', 'elemento' ),
                            'next_text' => __( '<span aria-hidden="true"> >> </span>', 'elemento' ),
                            'screen_reader_text' => '&nbsp;'
                        ) ); 
  }
endif;
add_action( 'elemento_posts_navigation' , 'elemento_posts_navigation' );

if( ! function_exists('elemento_footer_sidebars')):

  function elemento_footer_sidebars(){
    $columns = intval( esc_attr( get_theme_mod( 'footer_widget_areas' ) ) );
    if( ! $columns ){

      $columns = 4;
    }

    for( $i = 1; $i <= $columns; $i++):
      $args = array(
            'name'          => __( 'Footer Column ', 'elemento' ) . $i,
            'id'            => 'elemento-footer-'.$i,    
            'description'   => '',
            'class'         => 'col footerCol',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>' 
            );
            register_sidebar( $args );
    endfor;
  }

endif;
add_action( 'init' , 'elemento_footer_sidebars');


if( ! function_exists( 'elemento_archive_title') ):

function multipurpose_archive_title( $title ){

      if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title =  get_the_author() ;

        } elseif( is_date() ){
           $title = single_month_title( ' ' , false );
           $title = implode( ', ', explode( ' ' , trim( $title ) ) );
        }

    return $title;

}

endif;
add_filter( 'get_the_archive_title', 'multipurpose_archive_title' ,  10 ,1 ); 


if ( ! function_exists( 'elemento_sidebars' ) ):

  /**
   * Returns array of registered sidebars
   */
  function elemento_sidebars() {
       global $wp_registered_sidebars;
       $arr = array();
       if( !empty( $wp_registered_sidebars ) && is_array($wp_registered_sidebars) ){
        foreach(  $wp_registered_sidebars as $sidebar ):
          $arr[$sidebar['id']] = $sidebar['name'];
        endforeach;
       }
    return $arr;      
  }
  
endif;
add_action('widgets_init','elemento_sidebars' , 99);


if ( ! function_exists( 'elemento_recommend_plugin' ) ):

function elemento_recommend_plugin() {

  
    /**
     * Array of plugin arrays. Required keys are name and slug.
     */
    $plugins = 
        array(
        
            array(
               
                'name'               => esc_html__('Elementor','elemento'),
                'slug'               => 'elementor',
                'required'           =>  false,
            ),
            
    );

    $config = array(
        'id'           => 'elemento',        // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}

endif;
add_action( 'tgmpa_register', 'elemento_recommend_plugin' );


