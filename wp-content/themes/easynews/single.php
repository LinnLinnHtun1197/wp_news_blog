<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package EasyNews
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'easynews' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'easynews' ) . '</span> <span class="nav-title"><i class="fa fa-long-arrow-left"></i> %title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'easynews' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'easynews' ) . '</span> <span class="nav-title">%title <i class="fa fa-long-arrow-right"></i></span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
