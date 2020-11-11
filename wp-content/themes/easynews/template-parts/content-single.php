<?php
/**
 * Template part for displaying single post
 *
 * @package EasyNews
 */

$options  = get_theme_support( 'jetpack-content-options' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( true == $options[0]['featured-images']['post'] ) { ?>
    <div class="entry-image">
		<?php easynews_post_thumbnail();  ?>
    </div>
    <?php } ?>

    <div class="entry-content">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="entry-meta">
            <div><?php easynews_posted_by();  ?> <?php easynews_posted_on() ?> <?php easynews_posted_in() ?></div>
        </div><!-- .entry-meta -->

        <div class="entry-excerpt">
			<?php the_content() ?>
        </div>

        <div class="tags-links">
            <?php easynews_posted_tag() ?>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
