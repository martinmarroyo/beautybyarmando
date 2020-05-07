<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elemento
 */

get_header();
/*
$sidebar = elemento_page_sidebar_pos();
if ( class_exists( 'WooCommerce' ) ) {
  if( is_woocommerce() ){
    $sidebar = elemento_shop_sidebar_pos();
  }
}

if( ! $sidebar ){
  $row =  'aGrid';
}else if($sidebar=='left'){
  $row = 'col_2-30-70';
}else{
  $row = 'col_2-70-30';
}
*/
?>



<?php

get_footer();
?>
