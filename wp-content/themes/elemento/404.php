<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Elemento
 */

get_header(); ?>

<?php get_template_part('template-parts/banner');?>
     <section class="jr-site-para-highlight inner-page content-all">
      <div class="<?php echo elemento_site_container();?>">
      	<div class="row">
      	<div class="col-md-12">
         <div class="error-404"><?php esc_html_e( '404 Error!', 'elemento' ); ?></div>
          <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'elemento' ); ?></h1>

          <?php
						get_search_form();						
					?>
        </div>
        </div>
        
        	

       </div> 	     
        
    </section>



<?php
get_footer();
