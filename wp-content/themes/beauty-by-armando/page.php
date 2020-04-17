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


<div class="page-content">
    <section class="jr-site-para-highlight inner-page">

      <div class="<?php echo elemento_site_container();?> content-all">
        <div class="<?php echo esc_attr($row);?>">
          <?php /*if( $sidebar == 'left' ):  get_sidebar();  endif; */?>
          <div class="cols">
            <?php

              while ( have_posts() ) : the_post();

              get_template_part( 'template-parts/content', 'page' );

              /* Bring in Phone/SMS Call to Action Section if we are on contact page */
              if (is_page('get-in-touch')){
                get_template_part('template-parts/phone-cta');
              }

              endwhile; // End of the loop.

            ?>
          </div>
      </div>
    </div>
  </section>
</div>

<?php

get_footer();
