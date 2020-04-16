
<?php
/**
 * The template for displaying the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elemento
 */

 ?>


<body>
<?php get_template_part( 'template-parts/header', 'frontpage' ); ?>
<!-- Front page image -->
  <div class="landing_bg">
    <div id="menu" class="col-md-9 text-align-right">
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
    <div class="brand_name">
      <h1><span><strong>Beauty by</strong></span> <em>Armando</em></h1>
    </div>
  </div>

  <?php get_footer(); ?>

</body>
