<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Beauty_by_Armando
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if (! (is_home() || is_front_page())){
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
		?>
	</header><!-- .entry-header -->

	<?php beautybyarmando_post_thumbnail(); ?>
	<!-- Have a different entry content div for front page -->
	<div class=<?php if (is_home()||is_front_page()){echo "front-entry-content";} else { echo "entry-content";}?>>
		<!-- Landing Page -->
<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'beautybyarmando' ),
					'after'  => '</div>',
				)
			);
	?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'beautybyarmando' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
