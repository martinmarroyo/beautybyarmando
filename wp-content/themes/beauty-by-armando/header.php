<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elemento
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
  <script src="https://kit.fontawesome.com/7cf90bddee.js" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>


<body <?php body_class( elemento_body_site_layout() ); ?> data-container="<?php echo elemento_site_container();?>">

<div class="<?php if (is_front_page() || is_home()) {echo "front-page-container";} else {echo 'body-wrapp ' . elemento_header_type();}?>">

    <!--Header Component-->
    <header id="siteHeader" class="jr-site-header pd-a-15 <?php  elemento_header_class(); ?>">
      <!-- Change the class name if we're on the front page to keep styling separate... corrects black line across top of header section -->
        <div class="<?php if (is_front_page() || is_home()) {echo "front-page-container";} else {echo elemento_site_container();}?>">
          <!--Mobile view ham menu-->
          <div class="mobile-menu">
              <span></span>
              <span></span>
              <span></span>
          </div>
          <!--Ends-->
            <div class="row align-flex-item-center full-width">
                <div class="col-md-3">
                    <div class="logo-holder">
                        <?php
                        //the_custom_logo();
                        // Only show logo in header if it is not the landing page
                       if( ! (is_front_page() || is_home()) ):
                        ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
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
            </div>
        </div>
        <div id=<?php if (is_front_page() || is_home()){echo "menu-home";}else {echo "menu-pages";}?> class="col-md-9 text-align-right">
        <?php

        ?>

            <nav class="menu-main">
            <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'floted-li clearfix d-i-b',
                             'walker'        => '',
                            'fallback_cb'    => 'wp_page_menu',
                        ) );

            ?>

            </nav>
        </div>
    </header>
    <?php
    # Load the styling for the landing page if we are there
        if (is_home() || is_front_page()){ ?>
          <div class="landing_bg">
            <div class="brand_name">
              <h1><span><strong>Beauty by</strong></span> <em>Armando</em></h1>
            </div>
          </div>
      <?php  } ?>
