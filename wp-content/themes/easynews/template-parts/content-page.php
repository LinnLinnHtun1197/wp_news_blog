<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyNews
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-image">
		<?php easynews_post_thumbnail(); ?>
    </div>

    <div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-excerpt">
			<?php
            the_content();

            wp_link_pages( array(
	            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'easynews' ),
	            'after'  => '</div>',
            ) );
            ?>
        </div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->
