<?php
$enable_section = get_theme_mod( 'elemento_photography_collage_section_enable', false );
if ( ! $enable_section ) {
    return;
}
?>




 <section class="photo-collage">
     <div class="container">
        <div class="row">
            <div class="col-md-4 ptc-1">
            <img src="<?php echo esc_html(get_theme_mod('col_image_1')); ?>">
            </div>
            <div class="col-md-4 ptc-2">
            <img src="<?php echo esc_html(get_theme_mod('col_image_2')); ?>">
            </div>
            <div class="col-md-4 ptc-3">
            <img src="<?php echo esc_html(get_theme_mod('col_image_3')); ?>">
            </div>
        </div>
    </div>
   
 </section>
    
