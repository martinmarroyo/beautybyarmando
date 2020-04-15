<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elemento_Photography
 */

?>
  
   </div>  
   
   
   <footer class="white-bg-1">
        <div class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-lg-4">
				    <nav class="footer-main">
                    <?php 
                                wp_nav_menu( array(
                                    'theme_location' => 'secondary-menu',
                                    'menu_id'        => 'secondary-menu',
                                    'menu_class'     => 'floted-li clearfix d-i-b',
                                     'walker'        => '',
                                    'fallback_cb'    => 'wp_page_menu',
                                ) );

                    ?>
                    </nav>
				</div>
				<div class="col-xs-12 col-md-4 col-lg-4">
				    <div class="custom__item-inner custom__item-inner--html" >
					 <?php
                        the_custom_logo();
                        if( display_header_text() ):
                        ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php 
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html($description); ?></p>
                            <?php
                            endif; 
                        endif; 
                        ?>
                    </div>
				</div>
				<div class="col-xs-12 col-md-4 col-lg-4">
					<div class="custom__item-inner custom__item-inner--html" >
						<div class="social_icons">

                            <a href="<?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-link1') ); ?>"><i class="fa fa-facebook" aria-hidden="true" ></i></a>
        
                            <a href="<?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-link2') ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        
                            <a href="<?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-link3') ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        
                            <a href="<?php echo esc_attr( get_theme_mod('lwp-footer-callout-so-link4') ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
					</div>
				</div>
			</div>
		</div>
</div>

        
    </footer>

    <!--Footer component-->
    <section id="footer" class="jr-site-footer"><!--Now active fixed footer-->
       
        <div class="copyright-bottom">
        <?php echo esc_html(elemento_copyright_text());?>  
        <span> | </span>     
        <?php  echo sprintf( esc_html__( 'Powered by %s', 'elemento-photography' ), '<a target="_blank" rel="designer" href="https://greenturtlelab.com/">' . esc_html__( 'Greenturtlelab', 'elemento-photography' ) . '</a>' ); ?>     
        </div>
    </section>
    <!--Ends-->
      
<?php wp_footer(); ?>

</body>
</html>



