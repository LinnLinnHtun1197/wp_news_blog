<?php if( $query->have_posts() ){  ?>
    <div class="col-row">
        <?php while($query->have_posts() ): $query->the_post(); ?>
            <div class="<?php echo esc_attr($first_news_col_class); ?>">
                <article class="post post-tp-4">
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
                    <h3 class="title-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="meta-tp-2">
                        <?php first_news_dateformat(); ?>
                    </div>
                </article>
            </div>
        <?php endwhile; ?>
    </div>
<?php wp_reset_query(); } ?>
