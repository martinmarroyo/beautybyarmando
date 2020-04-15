<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elemento
 */

?>
  
   </div>  

    <!--Footer component-->
    <section id="footer" class="jr-site-footer"><!--Now active fixed footer-->
        <div class="<?php echo elemento_site_container();?>">

                            
                <?php if ( is_active_sidebar( 'elemento-footer-1' ) ) : ?>
                    <?php get_template_part( 'template-parts/footer' , 'sidebar' ); ?>
                <?php endif; ?>

        </div>

        <div class="copyright-bottom">
        <?php echo elemento_copyright_text();?>  
        <span> | </span>     
        <?php  echo sprintf( esc_html__( 'Powered by %s', 'elemento' ), '<a target="_blank" rel="designer" href="https://greenturtlelab.com/">' . esc_html__( 'Greenturtlelab', 'elemento' ) . '</a>' ); ?>     
        </div>
    </section>
    <!--Ends-->
      
<?php wp_footer(); ?>

</body>
</html>



