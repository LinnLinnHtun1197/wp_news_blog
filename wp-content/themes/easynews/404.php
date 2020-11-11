<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EasyNews
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">
                        <i class="fa fa-frown-o"></i>
                        <?php esc_html_e( '404 Not Found!', 'easynews' ); ?>
                    </h1>

                    <h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'easynews' ); ?></h3>
				</header><!-- .page-header -->

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
