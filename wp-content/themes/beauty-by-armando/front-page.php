<body>
<?php
/**
 * The template for displaying the home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elemento
 */

get_header();


if( ! $sidebar ){
  $row =  'aGrid';
}else if($sidebar=='left'){
  $row = 'col_2-30-70';
}else{
  $row = 'col_2-70-30';
}
?>




<div class="landing_bg">
  <h1 class="brand_name">Beauty by Armando</h1>
</div>



<?php

get_footer(); ?>
</body>
