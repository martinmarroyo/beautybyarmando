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
	<?php wp_head(); ?>
</head>


<body >
<!--Mobile view ham menu-->
<div class="mobile-menu">
    <span></span>
    <span></span>
    <span></span>
</div>
<!--Ends-->

<div class="body-wrapp <?php echo elemento_header_type();?>">

    <!--Header Component-->
    <header id="frontPageHeader" class="jr-site-header pd-a-15 <?php  elemento_header_class(); ?>">
        <div id="front-head" class="<?php echo elemento_site_container();?>">
            <div class="row align-flex-item-center full-width">
                <div class="col-md-3">
                    <div class="logo-holder">
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
            </div>
        </div>
        
    </header>
