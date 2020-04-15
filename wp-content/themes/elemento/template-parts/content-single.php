<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Elemento
 */

?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>
    <div class="article-wrap flex-box">
         <div class="post-details">
                    <?php 
               
                          elemento_post_single_title();
                   
                    ?>
                    
                        <?php if( elemento_single_feat_image() ):?>
                            <div class="image-holder">
                        
                            <?php the_post_thumbnail(); ?>
                        
                        </div>
                    <?php endif; ?>
                    
            
                    
        <div class="post-detail">
           <?php the_content(); ?>
        </div>
    </div>
</div> 
</div>