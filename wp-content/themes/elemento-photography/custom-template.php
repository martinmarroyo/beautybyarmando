<?php
/**
 * Template Name: Parallax page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elemento_Photography
 * @since 1.0.0
 */

get_header(); ?>


<?php get_template_part('template-parts/banner');?>
           
            
    <section class="sec-1">
        
             <div class="row about-sec" >
                <div class="col-sm-12 col-md-6 left-col about-row" >
                    
                </div>
                <div class="col-sm-12 col-md-6 right-col">
                    <div class="para-text ">
                        <h2><?php echo esc_html(get_theme_mod('lwp-footer-callout-headline')); ?></h2>
                        <p><?php echo esc_html(get_theme_mod('lwp-footer-callout-text')); ?></p>
                        <h4><a href="<?php echo esc_url(get_theme_mod('lwp-footer-callout-link')); ?>"><?php echo esc_html(get_theme_mod('lwp-footer-callout-link-text')); ?></a></h4>
                    </div>
                     
        <div>
    </section>
    <section class="sec-2">
        <div class="custom-sec2">
            <div class="row gallery-row">
                <div class="col-md-12 full-wd">
                    <h2 class="gallery-title"><?php echo esc_html(get_theme_mod('lwp-footer-callout-headline2')); ?></h2>
                </div>
            </div>    
        <div>
        
    </section>
    
    <?php
    // FrontPage Section
	get_template_part( 'sections/section', 'collage' );
	
	?>
            
<div class="row">
        
   <div class="col-md-12">
        <?php
        while ( have_posts() ) : the_post();

        the_content();

        endwhile; // End of the loop.
?>

<?php
    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'elemento-photography' ),
        'after'  => '</div>',
    ) );
?>

</div>

</div>
 <?php get_footer(); ?>