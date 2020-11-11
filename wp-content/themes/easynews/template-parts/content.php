<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package EasyNews
 */

$post_format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry-loop'); ?>>

    <div class="entry-image">
		    <?php

		    global $post;
		    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
		    $embeds =  get_media_embedded_in_content( $content ) ;
		    $pattern = get_shortcode_regex();
		    if ( 'video' == $post_format || 'audio' == $post_format ) {
		        echo '<div class="wp-block-embed-vimeo alignwide wp-block-embed is-type-video is-provider-vimeo wp-has-aspect-ratio wp-embed-aspect-21-9">';
		            echo '<div class="wp-block-embed__wrapper">';
                        echo wp_kses( $embeds[0], array(
                                'iframe' => array(
                                    'frameborder'  => array(),
                                    'height' => array(),
                                    'src'    => array(),
                                    'width'  => array(),) )
                        );

			        echo '</div>';
			    echo '</div>';
		    }
		    else if ( 'gallery' == $post_format ) {
			    if (   preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches )
			           && array_key_exists( 2, $matches )
			           && in_array( 'gallery', $matches[2] ) )
			    {
				    echo do_shortcode( $matches[0][0] );
			    }
		    }
		    else {
			    if ( has_post_thumbnail() ) {
				    easynews_post_thumbnail();
			    }
		    }

		    ?>
    </div>

    <div class="entry-content">
	    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        <div class="entry-meta">
		    <div><?php easynews_posted_by();  ?> <?php easynews_posted_on() ?> <?php easynews_posted_in() ?></div>
        </div><!-- .entry-meta -->

        <div class="entry-excerpt">
            <?php the_excerpt() ?>
        </div>

        <div class="entry-more">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php echo esc_html__('Read More', 'easynews'); ?> <i class="fa fa-long-arrow-right"></i></a>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
