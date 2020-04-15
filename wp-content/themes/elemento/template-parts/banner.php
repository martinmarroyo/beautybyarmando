<?php 
 $front_banner = elemento_front_banner_type();
 $site_banner = elemento_site_banner_type(); 

 if( is_front_page() || is_home()){ 
    if( $front_banner == 'slider-banner' ){
      elemento_banner_slider();
    }else if( $front_banner == 'video-banner' ){
      elemento_banner_video();
    }else if(  $front_banner == 'image-banner' ){
      elemento_banner_image();
    }
  
 }else{
    if( $site_banner == 'slider-banner' ){ 
      elemento_banner_slider();
    }
    else if( $site_banner == 'video-banner' ){
      elemento_banner_video();
    }
    else if(  $site_banner == 'image-banner' ){
      elemento_banner_image();
    }
    
 
 }