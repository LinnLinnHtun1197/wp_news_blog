<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package first-news
 */
$home_page_layout = get_theme_mod('first_news_homepage_layout');

$home_page_layout_class = 'container-fluid';
if($home_page_layout == 'full-width'){
    $home_page_layout_class = 'container-fluid';
}else{
    $home_page_layout_class = 'container';
}

$archive_page_sidebar_layout = get_theme_mod('sidebar-archive', 'right-sidebar');
get_header(); 

//Breadcrumb Section
first_news_breadcrumb_section();
?>
	<div class="main-content">
		<div class="<?php echo esc_attr($home_page_layout_class); ?>">
		<?php 
			if ( $archive_page_sidebar_layout != 'full-width'  ){
				$first_news_col_class="col-lg-9 col-md-9 col-sm-12 col-xs-12";
			}else{
				$first_news_col_class="col-lg-12 col-md-12 col-sm-12 col-xs-12";
			}
			
			if ( have_posts() ) :
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				echo '<div class="clearfix"></div>';
			?>
				
				<div class="row">
				<?php if($archive_page_sidebar_layout == 'left-sidebar' ){ ?>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 archive-page-sidebar">
						<?php get_sidebar(); ?>
					</div>
				<?php }//End Sidebar ?>
					<div class=<?php echo esc_attr($first_news_col_class); ?>>
						<div class="section">
							<?php
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/contents-archive', get_post_type() );
								endwhile; // End of the loop.
							?>
						</div>
						<div class="wraper-pagination">
			                <?php the_posts_pagination( array(
			                        'mid_size' => 2,
			                        'prev_text' => __( '<', 'first-news' ),
			                        'next_text' => __( '>', 'first-news' ),
			                    ) ); ?>
		                </div>
					</div>
					<?php if($archive_page_sidebar_layout == 'right-sidebar' ){ ?>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 archive-page-sidebar">
							<?php get_sidebar('right'); ?>
						</div>
					<?php } ?>
				</div>
			<?php else : 
				get_template_part( 'template-parts/content', 'none' ); 
			endif; ?>
			
		</div>
	</div>
<?php
get_footer();