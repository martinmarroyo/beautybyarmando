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
        
            <?php if( elemento_feat_image() ):?>
                <div class="article-img-wrap">
                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('elemento-img-525-350'); ?></a>
                </div>
            <?php endif; ?>
                    
        <div class="post-summary <?php if( ! elemento_feat_image()) echo 'full-width';?>">
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <?php if( ! esc_attr( get_theme_mod( 'hide_meta_index' ) )  && ( 'post' == get_post_type() ) ):?>
                <?php elemento_author();?>                               
                <?php elemento_posted_on(); ?>
            <?php endif;?>
            <div class="elemento-post-meta">
            <?php elemento_categories(); ?>     
            <?php elemento_comment_count(); ?>
        </div>
            <?php elemento_post_excerpt(); ?>
            <a href="<?php the_permalink();?>" class="custom-btn light-grey-btn"><?php esc_html_e('Details' , 'elemento' );?></a>
        </div>
    </div>
</div>          
