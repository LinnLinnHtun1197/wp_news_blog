<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package first-news
 */
$home_page_layout = get_theme_mod('first_news_homepage_layout','container-fluid');
$archive_page_sidebar_layout = get_theme_mod('sidebar-archive','right-sidebar');

if($home_page_layout == 'full-width'){
    $home_page_layout_class = 'container-fluid';
}else{
    $home_page_layout_class = 'container';
}
get_header(); 

//Breadcrumb Section
first_news_breadcrumb_section();
?>
	<div class="main-content">
		<div class="<?php echo esc_attr($home_page_layout_class); ?>">
			<?php 
				if ( is_active_sidebar( 'sidebar-right' ) OR is_active_sidebar( 'sidebar-left' ) ){
					$first_news_col_class = "col-lg-9  col-md-9 col-sm-12 col-xs-12";
				}else{
					$first_news_col_class = "col-lg-12  col-md-12 col-sm-12 col-xs-12";
				}
			?>
			<?php
			if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'first-news' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</header>
				<div class="row">
					<?php if($archive_page_sidebar_layout == 'left-sidebar' ): ?>
						<div class="col-lg-3  col-md-3 col-sm-12 col-xs-12 archive-page-sidebar">
							<?php get_sidebar(); ?>
						</div>
					<?php endif; ?>
					<div class=<?php echo esc_attr($first_news_col_class); ?>>
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/contents-archive', get_post_type() );

							endwhile; // End of the loop.
						?>
						<div class="wraper-pagination">
			                <?php the_posts_pagination( array(
			                        'mid_size' => 2,
			                        'prev_text' => __( '<', 'first-news' ),
			                        'next_text' => __( '>', 'first-news' ),
			                    ) ); ?>
		                </div>
					</div>
					<?php if($archive_page_sidebar_layout == 'right-sidebar' ): ?>
						<div class="col-lg-3  col-md-3 col-sm-12 col-xs-12 archive-page-sidebar">
						<?php get_sidebar('right'); ?>
						</div>
					<?php endif; ?>
					
				</div>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
			
		</div>
	</div>
<?php
get_footer();