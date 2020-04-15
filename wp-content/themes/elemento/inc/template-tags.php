<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elemento
 */

if( ! function_exists( 'elemento_get_font' ) ){

	function elemento_get_font(){

			$font =  'https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,600,700,800,900';

			return esc_url($font);		
	}

}


if( ! function_exists( 'elemento_blog_layout' ) ){

	function elemento_blog_layout(){
		
		$layout = esc_attr( get_theme_mod( 'blog_layout') );
		if( $layout ){
			return $layout;
		}else{
			$layout = 'list';
			return esc_attr($layout) ;
		}
	}

}



if ( ! function_exists( 'elemento_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function elemento_posted_on() {
		$time_string = '<div class="article-date mr-t-5" datetime="%1$s">
									<span class="month">%2$s</span>
                                   <span class="date">%3$s</span>
                                   <span class="year">%4$s</span>
                                  </div>';
		

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('M') ),
			esc_html( get_the_date('d') ),
			esc_html( get_the_date('Y') )
			
		);

		
			
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	
	}
endif;


if ( ! function_exists( 'elemento_author' ) ) :
	/**
	 * Prints HTML with meta information for the current  author.
	 */
	function elemento_author() {
      $author_string = '<div class="article-author-info elemento-author">
                                    
                                    <span class="infos">

		                                <span class="author-name">'.esc_html__('by ','elemento').' %2$s</span>		                                
                            		</span>
                                </div>';
		echo  sprintf( $author_string , get_avatar( get_the_author_meta( 'ID' ) , 30 ) , '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>');
					
	}

endif;


if ( ! function_exists( 'elemento_categories' ) ) :
	/**
	 * Prints HTML with meta information for the current  categories.
	 */
	function elemento_categories() {
      $category_string = '<div class="tags">
	                        <i class="fa fa-tags"></i>
	                        %1$s
                    	</div>';
		$categories = get_the_category();
		$cats = array();

		if( !empty ( $categories ) ){

			foreach( $categories as $cat ):

				$cats[] = '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';

			endforeach;
		}

		if( $cats ){

			echo sprintf( $category_string , implode( ' ' , $cats ) );
		}
					
	}
	
endif;


if ( ! function_exists( 'elemento_comment_count' ) ) :
	/**
	 *  Prints no. of comments of current post
	 */
	function elemento_comment_count() {
      $info_string = '<div class="comments">
                                  <a href="%1$s">  <i class="fa fa-comment"></i><span>%2$s '.__( 'Comments' , 'elemento' ).'</span></a>
                                </div>';
                                
		echo sprintf( $info_string , esc_url(get_permalink() ).'#comments' , wp_count_comments( get_the_ID())->approved );
		
					
	}
	
endif;


if ( ! function_exists( 'elemento_post_excerpt' ) ) :
	/**
	 * Prints excerpt or full content based on setting.
	 */
	function elemento_post_excerpt() {

      if( is_front_page() || is_home()){
                if( esc_attr( get_theme_mod( 'full_content_home' ) ) ){
                    the_content();
                }else{
                    the_excerpt();
                }
             }else{
                if( esc_attr( get_theme_mod( 'full_content_archives' ) ) ){
                    the_content();
                }else{
                    the_excerpt();
                }
             }		
					
	}
	
endif;



if ( ! function_exists( 'elemento_header_type' ) ) :
	/**
	 *  Returns header type
	 */
	function elemento_header_type() {
		
		if( is_front_page() || is_home()){
			
			return  esc_attr ( get_theme_mod('front_header_type') ). ' ' .esc_attr ( get_theme_mod('front_banner_type') );

		}else{

			return  esc_attr(get_theme_mod('site_header_type')).' '.esc_attr ( get_theme_mod('site_banner_type') );
		}		

}

endif;



if ( ! function_exists( 'elemento_header_height' ) ) :
	/**
	 *  Returns header height for image banner
	 */
	function elemento_header_height() {
		
		
		$height = esc_attr( get_theme_mod('header_height') ) ;
		if( $height ){

			return $height.'px';
		}
		$height = '300px';

		return esc_attr($height);	

}
endif;



if ( ! function_exists( 'elemento_hide_overlay' ) ) :
	/**
	 *  Returns banner overlay
	 */
	function elemento_hide_overlay() {
		
		$hide = esc_attr( get_theme_mod('hide_overlay') ) ;
		if( $hide ){

			return true;
		}
		return false;

}

endif;



if( !function_exists( 'elemento_feat_image')):
	/**
	 *  Returns boolean
	 */
 function elemento_feat_image(){

 	if( has_post_thumbnail() && ! esc_attr( get_theme_mod( 'hide_index_feat_image' ) ) ){

   		return true; 

	}else{

	    return false;
	}
 }

endif;



if( !function_exists( 'elemento_single_feat_image')):
	/**
	 *  Returns boolean
	 */
 function elemento_single_feat_image(){

 	if( has_post_thumbnail() && ! esc_attr( get_theme_mod( 'hide_single_feat_image' ) ) ){

   		return true; 

	}else{

	    return false;
	}
 }

endif;



if ( ! function_exists( 'elemento_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function elemento_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'elemento' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'elemento' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'elemento' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'elemento' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'elemento' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'elemento' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;



/************ customizer options **************/
// layout settings
if( ! function_exists( 'elemento_body_site_layout' ) ):
	/**
	 *  Returns site layout
	 */
	function elemento_body_site_layout(){
		$bg_color =  esc_attr( get_theme_mod('background_color') );

		$layout = esc_attr( get_theme_mod('site_layout_type') );
		if( ! $layout ){

			$layout = 'full-width-layout';
		}

		if( $bg_color ){

			$layout .= ' hasbody_bg';
		}

		

		return  esc_attr($layout);
	}

endif;



// container class
if( ! function_exists( 'elemento_site_container' ) ):
	/**
	 *  Returns header container class
	 */
	function elemento_site_container(){
		

		$layout = esc_attr( get_theme_mod('site_container_type') );
		if( $layout ){

			return $layout;
		}

		$layout = 'container-large';
		return esc_attr($layout);
	}

endif;


// header class
if ( ! function_exists( 'elemento_header_class' ) ) :
	/**
	 *  Returns header class
	 */
	function elemento_header_class() {
		
		$layout_type =  esc_attr( get_theme_mod('site_layout_type') );
		$menu_type  =  esc_attr( get_theme_mod('menu_type') ); 
		if( ! $layout_type ){

			$layout_type = 'full-width-layout';
			$layout_type = esc_attr($layout_type);
		}

		if ( ! $menu_type ){

			$sticky_header = 'sticky-header';

			echo esc_attr($sticky_header);

		}else  if( $layout_type != 'left-header-layout' && $layout_type != 'right-header-layout' ){

			echo $menu_type.' '.esc_attr( get_theme_mod('menu_display') );

		}
				

}

endif;



// front page banner type
if( !function_exists( 'elemento_front_banner_type' ) ):
	/**
	 *  Returns front page banner type
	 */
	function elemento_front_banner_type(){		

		$banner = esc_attr( get_theme_mod('front_banner_type') );
		if( $banner ){

			return $banner;
		}
		$banner = "image-banner";

		return esc_attr($banner);
	}
endif;


// inner page banner type
if( !function_exists( 'elemento_site_banner_type' ) ):
	/**
	 *  Returns inner page banner type
	 */
	function elemento_site_banner_type(){		

		$banner = esc_attr( get_theme_mod('site_banner_type') ); 
		if( $banner ){

			return $banner;
		}
		$banner = "image-banner";

		return esc_attr($banner);
	}

endif;


// banner slider speed
if( ! function_exists( 'elemento_slider_speed' ) ):
	/**
	 *  Returns slider speed in milliseconds
	 */
	function elemento_slider_speed(){

		
		$speed = (int)esc_attr( get_theme_mod('slider_speed') ); 
		if( $speed >= 0 ){

			return $speed;
		}

		$speed = "3000";

		return esc_attr($speed);
	}

endif;


// banner animation speed
if( ! function_exists( 'elemento_slider_animation_speed' ) ):
	/**
	 *  Returns slider animation speed in milliseconds
	 */
	function elemento_slider_animation_speed(){		

		$speed = esc_attr( get_theme_mod('animation_speed') ); 
		if( $speed ){

			return $speed;
		}

		$speed = "1000";

		return esc_attr($speed);
	}

endif;



// post archive sidebar position ( left/right/none )
if( !function_exists( 'elemento_post_archive_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts archive
	 */
	function elemento_post_archive_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'post_arhive_sidebar_pos' ) );
		if( ! $pos ){

			$right = 'right';

			return esc_attr($right);

		}else if( $pos == 'none' ){

			return false;

		}else{

			return $pos;
		}
	}

endif;


// post single sidebar position  ( left/right/none )
if( ! function_exists( 'elemento_post_single_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts single
	 */
	function elemento_post_single_sidebar_pos(){

		$pos = esc_attr( get_theme_mod(  'post_single_sidebar_type' ) );
		if( ! $pos ){

			$right = 'right';

			return esc_attr($right);

		}else if( $pos == 'none' ){

			return false;

		}else{

			return $pos;
		}
	}

endif;


// page sidebar position  ( left/right/none )
if( ! function_exists( 'elemento_page_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for page
	 */
	function elemento_page_sidebar_pos( ){
        
        $pos = get_post_meta( get_the_ID() , 'elemento-sidebar-pos' , true );
        if( $pos == 'none' ){

        	return false;

        }else if ( ! $pos ){

        	$pos = esc_attr( get_theme_mod(  'page_sidebar_pos' ) );
			if( ! $pos ){

				$right = 'right';

				return esc_attr($right);

			}else if( $pos == 'none' ){

				return false;

			}else{

				return $pos;
			}

        }else{

        	return $pos;
        }
		
	}

endif;


// shop sidebar position  ( left/right/none )
if( ! function_exists( 'elemento_shop_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for shop archive/single
	 */
	function elemento_shop_sidebar_pos(){ 

		$pos = esc_attr( get_theme_mod(  'shop_sidebar_pos' ) );
		if( ! $pos ){

			$right = 'right';

			return esc_attr($right);

		}else if( $pos == 'none' ){

			return false;

		}else{

			return $pos;
		}
	}

endif;


// current sidebar id
if( ! function_exists( 'elemento_get_sidebar_id' ) ):
	/**
	 *  Returns sidebar id for page/posts archive/single
	 */
	function elemento_get_sidebar_id(){

		$shop = false;
		$post_type = get_post_type();
		$sid_c = 'sidebar-1';

		if ( class_exists( 'WooCommerce' ) ) {
		  if( is_woocommerce() || $post_type == 'product'  ){

		    $shop = true;

		  }

		}

		if( $shop ){

			$sid = esc_attr( get_theme_mod( 'shop_sidebar_id' ) );
			if( $sid ){

				$sid_c = $sid;
			}


		}else if( 'post' == $post_type ){

			$sid =  esc_attr( get_theme_mod( 'post_sidebar_id' ) );
			if( $sid ){

				$sid_c = $sid;
			}

		}else if( 'page' == $post_type && ! $shop ){
			
			$sid_pos = get_post_meta( get_the_ID() , 'page_sidebar_pos' , true );
				
			if ( $sid_pos == 'none' ){

				return false;

			}else if ( ! $sid_pos ){

				$sid = esc_attr( get_theme_mod( 'page_sidebar_id' ) );
				if( $sid ){

					$sid_c = $sid;
				}

			}else{

				$sid = get_post_meta( get_the_ID() , 'elemento-sidebar-id' , true );
				if( $sid ){

					$sid_c = $sid;
				}

			}	

		}
		return $sid_c;
	}

endif;




// fonts family 
if( ! function_exists( 'elemento_body_font_family' ) ):

	function elemento_body_font_family(){
		 /**
		 *  Returns body font family
		 */
		
		$body_font_family = "Libre Franklin";

		return esc_attr($body_font_family);
	}

endif;


// body font size
if( ! function_exists( 'elemento_body_font_size' ) ):
	/**
	 *  Returns body font size
	 */
	function elemento_body_font_size(){		

		
		$body_font_size = "14px";

		return esc_attr($body_font_size);
	}

endif;



if( ! function_exists( 'elemento_body_text_color' ) ):
	/**
	 *  Returns body text color
	 */
	function elemento_body_text_color(){		

		$body_text_color = esc_attr( get_theme_mod('body_text_color') );
		if( $body_text_color ){

			return $body_text_color;
		}

		$body_text_color = "#353535";

		return esc_attr($body_text_color);
	}

endif;


if( ! function_exists( 'elemento_site_title_font_size' ) ):
	/**
	 *  Returns site title font size
	 */
	function elemento_site_title_font_size(){		

		
		$title_font_size = "32px";

		return esc_attr($title_font_size);
	}

endif;

if( !function_exists( 'elemento_site_desc_font_size' ) ):
	/**
	 *  Returns site description font size
	 */
	function elemento_site_desc_font_size(){		

		
		$desc_font_size =  "14px";

		return  esc_attr($desc_font_size);
	}

endif;



if( !function_exists( 'elemento_main_menu_font_size' ) ):
	/**
	 *  Returns main menu font size
	 */
	function elemento_main_menu_font_size(){		

		
		$menu_font_size = "14px";

		return   esc_attr($menu_font_size);
	}

endif;


// h1 font size
if( !function_exists( 'elemento_h1_font_size' ) ):
	/**
	 *  Returns h1 font size
	 */
	function elemento_h1_font_size(){		

		$h1_font_size = "60px";

		return esc_attr($h1_font_size);
	}

endif;


// h2 font size
if( !function_exists( 'elemento_h2_font_size' ) ):
	/**
	 *  Returns h2 font size
	 */
	function elemento_h2_font_size(){		

		
		$h2_font_size = "46px";

		return esc_attr($h2_font_size);
	}

endif;


// h3 font size
if( !function_exists( 'elemento_h3_font_size' ) ):
	/**
	 *  Returns h3 font size
	 */
	function elemento_h3_font_size(){		

		
		$h3_font_size = "26px";

		return esc_attr($h3_font_size);
	}

endif;


// h4 font size
if( ! function_exists( 'elemento_h4_font_size' ) ):
	/**
	 *  Returns h4 font size
	 */
	function elemento_h4_font_size(){		

		
		$h4_font_size = "20px";

		return esc_attr($h4_font_size);
	}

endif;


// h5 font size
if( ! function_exists( 'elemento_h5_font_size' ) ):
	/**
	 *  Returns h5 font size
	 */
	function elemento_h5_font_size(){		

		
		$h5_font_size = "16px";

		return esc_attr($h5_font_size);
	}

endif;

// h6 font size
if( !function_exists( 'elemento_h6_font_size' ) ):
	/**
	 *  Returns h6 font size
	 */
	function elemento_h6_font_size(){		

		
		$h6_font_size = "12px";

		return esc_attr($h6_font_size);
	}

endif;



// single post font size
if( !function_exists( 'elemento_single_post_font_size' ) ):
	/**
	 *  Returns single post font size
	 */
	function elemento_single_post_font_size(){
		

		$size = "34px";

		return esc_attr($size);
	}
	
endif;



// header background color
if( !function_exists( 'elemento_header_bg_color' ) ):
	/**
	 *  Returns header background color
	 */
	function elemento_header_bg_color(){		

		$bg = esc_attr( get_theme_mod('menu_bg_color') );
		if( $bg ){

			return $bg;
		}
		$bg = "#1f2024";

		return esc_attr($bg);
	}

endif; 


// mobile menu background color
if( !function_exists( 'elemento_mobile_menu_color' ) ):
	/**
	 *  Returns mobile menu background color
	 */
	function elemento_mobile_menu_color(){		

		$bg = esc_attr( get_theme_mod('mobile_menu_color') );
		if( $bg ){

			return $bg;
		}
		$bg = "#fff";

		return esc_attr($bg);
	}

endif; 



// header menu color
if( !function_exists( 'elemento_menu_color' ) ):
	/**
	 *  Returns header menu item color
	 */
	function elemento_menu_color(){		

		$color = esc_attr( get_theme_mod('top_items_color') );
		if( $color ) {
			return $color;
		}

		$color = "#fff";
		return  esc_attr($color);
	}

endif;



// menu hover color
if( !function_exists( 'elemento_menu_hover_color' ) ):
	/**
	 *  Returns header menu hover color
	 */
	function elemento_menu_hover_color(){

		$color = esc_attr( get_theme_mod('menu_items_hover') );
		if( $color ){

			return $color;
		}

		$color = "#fff";

		return  esc_attr($color);
	}

endif;



// submenu color
if( !function_exists( 'elemento_sub_menu_color' ) ):
	/**
	 *  Returns submenu item color
	 */
	function elemento_sub_menu_color(){

		$color = esc_attr( get_theme_mod('submenu_items_color') );
		if( $color ){

			return $color;
		}
		$color = "rgba(0,0,0,0.6)";
		return esc_attr($color);
	}

endif;



// submenu background color
if( !function_exists( 'elemento_sub_menu_bg' ) ):
	/**
	 *  Returns submenu background color
	 */
	function elemento_sub_menu_bg(){

		$color = esc_attr( get_theme_mod('submenu_background') );
		if( $color ){
			return $color;
		}
		$color = "#fff";

		return  esc_attr($color);
	}

endif;




// sidebar background color
if( !function_exists( 'elemento_sidebar_bg_color' ) ):
	/**
	 *  Returns sidebar background color
	 */
	function elemento_sidebar_bg_color(){

		$color = esc_attr( get_theme_mod('sidebar_background') );
		if( $color ){

			return $color;
		}
		$color = "rgba(0,0,0,0)";

		return  esc_attr($color);
	}

endif;


// sidbar text color
if( !function_exists( 'elemento_sidebar_color' ) ):
	/**
	 *  Returns sidebar color
	 */
	function elemento_sidebar_color(){

		$color = esc_attr( get_theme_mod('sidebar_color') );
		if( $color ){

			return $color;
		}

		$color = "#353535";

		return  esc_attr($color);
	}

endif;



// footer background color
if( !function_exists( 'elemento_footer_bg_color' ) ):
	/**
	 *  Returns header footer background color
	 */
	function elemento_footer_bg_color(){

		$color = esc_attr( get_theme_mod('footer_background') );
		if( $color ){

			return $color;
		}
		$color = "#1f2024";

		return  esc_attr($color);
	}

endif;



// footer text color
if( !function_exists( 'elemento_footer_color' ) ):
	/**
	 *  Returns footer color
	 */
	function elemento_footer_color(){

		$color = esc_attr( get_theme_mod('footer_color') );
		if( $color ){

			return $color;
		}
		$color = "#fff";

		return  esc_attr($color);
	}

endif;


// copyright background color
if( !function_exists( 'elemento_copyright_bg_color' ) ):
	/**
	 *  Returns copyright background color
	 */
	function elemento_copyright_bg_color(){

		$color = esc_attr( get_theme_mod('copyright_bg_color') );
		if( $color ){

			return $color;
		}
		$color = "#3d3d3d";

		return  esc_attr($color);
	}

endif;


// copyright text color
if( !function_exists( 'elemento_copyright_color' ) ):
	/**
	 *  Returns copyright color
	 */
	function elemento_copyright_color(){

		$color = esc_attr( get_theme_mod('copyright_color') );
		if( $color ){

			return $color;
		}
		$color = "#efefef";
		return esc_attr($color);
	}

endif;



// footer copyright text
if( !function_exists( 'elemento_copyright_text' ) ):
	/**
	 *  Returns copyright text
	 */
	function elemento_copyright_text(){

		$text = esc_attr( get_theme_mod( 'footer_copyright' ) );
		if( $text ){

			return $text;
		}
		return  esc_html( 'Copyright Yourcompany. All rights reserved.' , 'elemento');
		
	}

endif;
