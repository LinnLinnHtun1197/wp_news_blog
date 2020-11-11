<div class="col-row">
<?php
if( $query->have_posts() ){

    while( $query->have_posts() ): $query->the_post();  
    $count= $query->current_post; 
    if($count < 2 ): 
?>
    <div class="col-sm-6">
        <article class="post post-tp-5">
            <figure>
                <a href="<?php the_permalink(); ?>">
                    <?php 
                        if ( has_post_thumbnail() ) { 
                            the_post_thumbnail('first-news-thumb');
                        }else{
                            if( get_theme_mod('first_news_disable_fallback_images',true) == true ){
                            $grid_content_fallback_image = esc_url( get_template_directory_uri() . '/assets/images/fallback/grid-fallback.png' );
                        ?>
                            <img src="<?php echo $grid_content_fallback_image; ?>" alt="">
                    <?php } }?>
                </a>
            </figure>
            <h3 class="title-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php first_news_dateformat(); ?>
            <p class="p"><?php the_excerpt() ." <a href='".esc_url(get_the_permalink())."'>".esc_html('read more','first-news')." </a>";?></p>
        </article>
    <hr class="pst-block-hr">
    </div>

    <?php else: ?> 
    <div class="col-sm-6">
        <article class="post post-tp-6">
            <figure>
                <a href="<?php the_permalink(); ?>">
                    <?php 
                            if ( has_post_thumbnail() ) { 
                                the_post_thumbnail('first-news-homepage-thumb');
                            }else{
                                if( get_theme_mod('first_news_disable_fallback_images',true) == true ){
                                $grid_content_fallback_image = esc_url( get_template_directory_uri() . '/assets/images/fallback/post-list.png' );
                            ?>
                                <img src="<?php echo $grid_content_fallback_image; ?>" alt="">
                        <?php } }?>
                </a>
            </figure>
            <h3 class="title-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php first_news_dateformat(); ?>
        </article>
    </div>
    <?php 
    endif;  
    endwhile;  
    wp_reset_query();
}
?>
</div>