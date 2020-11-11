<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package first-news
 */
?>
<article class="post post-tp-4 archive-article-options">
	<div class="row">
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<figure>
				<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) { ?>
									<?php  the_post_thumbnail('first-news-thumb'); ?>
							<?php }else{
								if( get_theme_mod('first_news_disable_fallback_images',true) == true ){
								$grid_content_fallback_image = esc_url( get_template_directory_uri() . '/assets/images/fallback/grid-fallback.png' );
								?>
									<img src="<?php echo $grid_content_fallback_image; ?>" alt="">
								<?php
							} } ?>
					</a>
			</figure>
		</div>
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<h3 class="title-3 archive-page-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="archive-content"><?php the_excerpt(); ?></div>
			<div class="meta-tp-2">
				<?php first_news_dateformat(); ?>
			</div>
		</div>
	</div>
</article>
