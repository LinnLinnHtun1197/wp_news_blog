<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EasyNews
 */

if ( ! function_exists( 'easynews_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function easynews_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			'%s',
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"> - ' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'easynews_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function easynews_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			'%s',
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'easynews_posted_in' ) ) :
	function easynews_posted_in() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'easynews' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links"> - %1$s</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
endif;


if ( ! function_exists( 'easynews_posted_tag' ) ) :
	function easynews_posted_tag() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'easynews' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'easynews' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'easynews_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function easynews_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'easynews' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'easynews' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'easynews' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'easynews' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'easynews' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'easynews' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'easynews_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function easynews_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

            <div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

		<?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail( 'easynews-home-featured', array(
					'alt' => the_title_attribute( array(
						'echo' => false,
					) ),
				) );
				?>
            </a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'easynews_social_media' ) ) :
	function easynews_social_media() {
		$facebook    = get_theme_mod( 'facebook_url', '' );
		$twitter     = get_theme_mod( 'twitter_url', '' );
		$google_plus = get_theme_mod( 'gooogle_plus', '' );
		$pinterest   = get_theme_mod( 'pinterest_url', '' );
		$tumblr      = get_theme_mod( 'tumblr_url', '' );
		$reddit      = get_theme_mod( 'reddit_url', '' );
		$youtube     = get_theme_mod( 'youtube_url', '' );
		$linkedin    = get_theme_mod( 'linkedin_url', '' );
		$instagram   = get_theme_mod( 'instagram_url', '' );
		$email       = get_theme_mod( 'email_address', '' );

		echo '<ul>';
		if ( $facebook != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $facebook ) ?>" class="fa fa-facebook"></a></li>
		<?php } ?>
		<?php if ( $twitter != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $twitter ) ?>" class="fa fa-twitter"></a></li>
		<?php } ?>
		<?php if ( $google_plus != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $google_plus ) ?>" class="fa fa-google-plus"></a></li>
		<?php } ?>
		<?php if ( $pinterest != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $pinterest ) ?>" class="fa fa-pinterest-p"></a></li>
		<?php } ?>
		<?php if ( $tumblr != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $tumblr ) ?>" class="fa fa-tumblr"></a></li>
		<?php } ?>
		<?php if ( $reddit != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $reddit ) ?>" class="fa fa-reddit"></a></li>
		<?php } ?>
		<?php if ( $youtube != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $youtube ) ?>" class="fa fa-youtube-play"></a></li>
		<?php } ?>
		<?php if ( $linkedin != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $linkedin ) ?>" class="fa fa-linkedin"></a></li>
		<?php } ?>
		<?php if ( $instagram != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( $instagram ) ?>" class="fa fa-instagram"></a></li>
		<?php } ?>
		<?php if ( $email != '' ) { ?>
            <li><a target="_blank" href="<?php echo esc_url( 'mailto:' . antispambot( $email ) ) ?>"
                   class="fa fa-envelope"></a></li>
		<?php }

		echo '</ul>';
	}
endif;


if ( ! function_exists( 'easynews_comments' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @return void
	 */
	function easynews_comments( $comment, $args, $depth ) {
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
                <li class="pingback">
                <p><?php esc_html_e( 'Pingback:', 'easynews' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'easynews' ), ' ' ); ?></p>
				<?php
				break;
			default :
				?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">
                    <div class="comment-author fn vcard">
						<?php echo get_avatar( $comment, 60 ); ?>
						<?php //printf( '<cite class="fn">%s</cite>', get_comment_author_link() );
						?>
                    </div><!-- .comment-author .vcard -->

                    <div class="comment-wrapper">
						<?php if ( $comment->comment_approved == '0' ) : ?>
                            <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'easynews' ); ?></em>
						<?php endif; ?>

                        <div class="comment-meta comment-metadata">
                            <strong><?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?></strong>
                            <span class="says"><?php esc_html_e( 'says:', 'easynews' ) ?></span><br>
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <time pubdate datetime="<?php comment_time( 'c' ); ?>">
									<?php
									/* translators: 1: date, 2: time */
									printf( esc_html__( '%1$s at %2$s', 'easynews' ), get_comment_date(), get_comment_time() ); ?>
                                </time>
                            </a>
                        </div><!-- .comment-meta .commentmetadata -->
                        <div class="comment-content"><?php comment_text(); ?></div>
                        <div class="comment-actions">
							<?php comment_reply_link( array_merge( array( 'after' => '<i class="fa fa-reply"></i>' ), array(
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							) ) ); ?>
                        </div><!-- .reply -->
                    </div> <!-- .comment-wrapper -->

                </article><!-- #comment-## -->

				<?php
				break;
		endswitch;
	}
endif;

/*
 * Custom style
 */
function easynews_custom_style() {
	$custom_css       = "";
	$primary_color    = esc_attr( get_theme_mod( 'primary_color', '#ff7052' ) );
	$nav_color        = esc_attr( get_theme_mod( 'nav_color', '#222222' ) );
	$menu_link_color  = esc_attr( get_theme_mod( 'menu_color', '#222222' ) );
	$menu_hover_color = esc_attr( get_theme_mod( 'menu_hover_color', '#282828' ) );
	$site_title       = esc_attr( get_theme_mod( 'site_title_color', '#000000' ) );
	$site_tagline     = esc_attr( get_theme_mod( 'site_tagline_color', '#000000' ) );

	$custom_css .= " 
	    a, .entry-content .entry-title a:hover, .entry-content .entry-more a:hover { color: $primary_color; }
	    .entry-content .entry-meta div,
	    #infinite-handle span,
	     button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] { background-color: $primary_color; }
	    .entry-content .entry-more a { background-color: $primary_color; border-color: $primary_color; }
	       
	     .main-navigation a { color: $menu_link_color; }
	    .top-bar, .main-navigation ul ul { background: $nav_color;}
	    .main-navigation li:hover { background: $menu_hover_color; }
	    
	    .site-branding .site-title a { color: $site_title; border-color: $site_title; }
	    .site-branding .site-description { color: $site_tagline; }
	";

	return $custom_css;
}

/**
 * Footer Copyright
 */
function easynews_footer_info() {

   
        $powered_by_text = sprintf( __( 'Copyright &copy; %1$s %2$s - Powered by <a target="_blank" href="%3$s">FilaThemes</a>', 'easynews' ), date_i18n( 'Y' ), get_bloginfo( 'name' ), esc_url('https://www.filathemes.com/') );
        echo wp_kses_post($powered_by_text);
    

}

add_action( 'easynews_footer_copyright', 'easynews_footer_info' );
