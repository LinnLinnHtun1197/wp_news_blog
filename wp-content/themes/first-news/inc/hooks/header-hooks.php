<?php
/**
* First News  Social Links
*/
if ( ! function_exists( 'first_news_social_links' ) ) {
	function first_news_social_links() {
        $first_news_facebook_link = get_theme_mod('first_news_facebook_link','www.facebook.com');
        $first_news_twitter_link = get_theme_mod('first_news_twitter_link','www.twitter.com');
        $first_news_g_plus_link = get_theme_mod('first_news_g_plus_link','www.google.plus.com');
        $first_news_instagram_link = get_theme_mod('first_news_instagram_link','www.instagram.com');
        $first_news_youtube_link = get_theme_mod('first_news_youtube_link','www.youtube.com');
        $first_news_rss_link = get_theme_mod('first_news_rss_link','www.rss.com');	
        ?>
        <div class="col-md-4 col-sm-12">
            <div class="social-icon">
                <ul>
                    <?php if(!empty($first_news_facebook_link)): ?><li><a href="<?php echo esc_url($first_news_facebook_link); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
                    <?php if(!empty($first_news_twitter_link)): ?><li><a href="<?php echo esc_url($first_news_twitter_link); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
                    <?php if(!empty($first_news_g_plus_link)): ?><li><a href="<?php echo esc_url($first_news_g_plus_link); ?>"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
                    <?php if(!empty($first_news_instagram_link)): ?><li><a href="<?php echo esc_url($first_news_instagram_link); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
                    <?php if(!empty($first_news_youtube_link)): ?><li><a href="<?php echo esc_url($first_news_youtube_link); ?>"><i class="fa fa-youtube"></i></a></li><?php endif; ?>
                    <?php if(!empty($first_news_rss_link)): ?><li><a href="<?php echo esc_url($first_news_rss_link); ?>"><i class="fa fa-rss"></i></a></li><?php endif; ?>
                </ul>
            </div>
        </div>
    <?php 
	}
}
add_action( 'first_news_social_links', 'first_news_social_links');

//Tranding News Section
if ( ! function_exists( 'first_news_latest_news_links' ) ) {
	function first_news_latest_news_links() {
        ?>
        <div class="pst-block-head">
            <span class="breaking-news pull-left"><?php esc_html_e('Breaking News','first-news'); ?></span>
            <div class="flexslider">
                <ul class="slides">
                    <?php
                        $args = array('post_type'=>'post','posts_per_page'=>5);
                        $query = new WP_Query( $args ); 
                        if( $query->have_posts() ){ 
                            while($query->have_posts()): $query->the_post(); 
                                ?>
                                    <li><h5 class="breaking-news-header"><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></h5></li>
                                <?php 
                            endwhile; 
                            wp_reset_query();
                        }
                    ?>
                </ul>
            </div>
        </div>
    <?php 
	}
}
add_action( 'latest_news_title', 'first_news_latest_news_links');


/**
 * First News  Social Links
 */
if ( ! function_exists( 'first_news_slider' ) ) {
	function first_news_slider() {
    $slider_enable_disable = get_theme_mod('first_news_check_slider',true);
    $slider_cat_id = intval( get_theme_mod('first_news_category_select') );
    $first_news_slider_post_count = intval( get_theme_mod('first_news_slider_post_count',4) );
    $select_option = esc_attr(get_theme_mod('first_news_banner_layout','post-slider-new'));
    $select_blog_cat = intval(get_theme_mod('first_section_select',0));
    

    /**
     * slider Category Args
     */
    $slider_args = array(
        'posts_per_page'=> $first_news_slider_post_count, 
        'cat'=>$slider_cat_id, 
        'meta_query' => array(array('key' => '_thumbnail_id'))
    );
    $home_slider = new WP_Query( $slider_args );
    /**
     * Post Category Args
     */
    $slider_post_args = array(
        'posts_per_page'=> 4, 
        'cat'=> $select_blog_cat, 
        'meta_query' => array(array('key' => '_thumbnail_id'))
    );
    $home_slider_post = new WP_Query( $slider_post_args );

    /**
     * Slider Layout Condtion
     */
    $layout = ' col-lg-7 col-md-7 col-sm-12 col-xs-12';
    if($select_option == 'full_width'){
        $layout = 'col-lg-12  col-md-12 col-sm-12 col-xs-12';
    }elseif($select_option == 'with_left_category'){
        $layout = ' col-lg-7 col-md-7 col-sm-12 col-xs-12 pull-right';
    }else{
        $layout = ' col-lg-7 col-md-7 col-sm-12 col-xs-12';
    }

    /**
     * Full Width 
     */
    
    if($slider_enable_disable == true){
    ?>
    <?php if( $select_option != 'post-slider-new'): ?>
    <div class="<?php echo esc_attr( first_news_theme_layout() ); ?>">
        <div class="content-margin">
            <div class="row">
                <div class="col-lg-12">
                    <?php  if( get_theme_mod('first_news_latest_news_enable',true) == true): do_action('latest_news_title'); endif; ?>
                </div>
                <div class="<?php echo esc_attr($layout); ?>">
                    
                    <div class="slider_container">
                            <div class="flexslider">
                                <ul class="slides">
                                <?php while ( $home_slider->have_posts() ) : $home_slider->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php  the_post_thumbnail('full'); ?>
                                        </a>
                                        <div class="flex-caption">
                                            <div class="caption_title_line">
                                                <h2><?php the_title(); ?></h2>
                                                <?php the_excerpt(); ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile; wp_reset_query();?>
                                
                            </ul>
                            </div>
                        </div>

                    </div>
                    <?php if($select_option == 'with_left_category' OR $select_option == 'with_right_category'): ?>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="slider-div-control row ">
                            <div class="pst-block-main">
                                <div class="col-row">
                                    <?php while ( $home_slider_post->have_posts() ) : $home_slider_post->the_post(); ?>
                                        <div class="slider_side_post col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <article class="post post-tp-4">
                                                <?php if( has_post_thumbnail() ){ ?>
                                                    <figure>
                                                        <?php the_post_thumbnail('first-news-slider'); ?>
                                                    </figure>
                                                <?php } ?>
                                                <div class="meta-data">
                                                    <h3 class="title-3"><a href="<?php the_permalink(); ?>"><?php echo substr(get_the_title(),0,60).'...'; ?></a></h3>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endwhile; wp_reset_query();?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php endif; ?>
            
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <!-- Slider start -->
        <div id="first_news_main_slider" class=" owl-carousel owl-theme center-owl-nav">
            <?php while ( $home_slider->have_posts() ) : $home_slider->the_post(); ?>
                <!-- post slider loop stat -->
					<article class="article thumb-article">
						<div class="article-img">
							<?php the_post_thumbnail('first-news-thumb'); ?>
						</div>
						<div class="article-body">
							<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<ul class="article-meta">
								<li><i class="fa fa-clock-o"></i><?php the_time(get_option('date_format' )); ?></li>
								<li><i class="fa fa-comments"></i> <?php printf( esc_html( _n( '%d Comment', '%d Comments', get_comments_number(), 'first-news'  ) ), esc_html(number_format_i18n(get_comments_number()))); ?></li>
							</ul>
						</div>
					</article>
				<!-- /slider loop stat -->
                <?php endwhile; wp_reset_query();?>
        </div>
    <?php endif; ?>
    <?php }
	}
}
add_action( 'first_news_home_slider', 'first_news_slider');


/** Breadcrumb Section */

/** Default page Breadcrumb Section */
if ( ! function_exists( 'first_news_breadcrumb_section' ) ) {
    function first_news_breadcrumb_section() {
        
        //Enable Breadcrumb Section 
        if( get_theme_mod('first_news_breadcrumbs_enable',true ) == true  ){
            global $post;

            $first_news_breadcrumb_separator = wp_kses_post( ' <span class="separator">/</span> ' );
            echo '<div class="inner-page">';
            if (!is_home()) {
                echo '<div class="breadcrumb-section"><div class="container">';
                
                echo '<i class="fa fa-home" aria-hidden="true"></i><a href="';
                echo esc_url( home_url( '/' ) );
                echo '">';
                echo esc_html__('Home', 'first-news');
                echo '</a>'.$first_news_breadcrumb_separator ;
                if ( is_category() || is_single()) {
                    the_category( $first_news_breadcrumb_separator );
                    if (is_single()) {
                        echo ''.$first_news_breadcrumb_separator;
                        the_title();
                    }
                } elseif ( is_page() ) {
                    if($post->post_parent){
                        $title = get_the_title();
                        
                        echo '<span title="'.esc_attr($title).'"> '.esc_html($title).'</span>';
                    } else {
                        echo '<span> '. esc_html(get_the_title()).'</span>';
                    }
                }
                elseif (is_tag()) {single_tag_title();}
                elseif (is_day()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'first-news'), get_the_time('F jS, Y')); echo '</span>';}
                elseif (is_month()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'first-news'), get_the_time('F, Y')); echo '</span>';}
                elseif (is_year()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'first-news'), get_the_time('Y')); echo '</span>';}
                elseif (is_author()) {echo "<span>" . esc_html__('Author Archive', 'first-news'); echo '</span>';}
                elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<span>" . esc_html__('Blog Archives', 'first-news'); echo '</span>';}
                elseif (is_search()) {echo "<span>" . esc_html__('Search Results', 'first-news'); echo '</span>';}
                elseif (is_404()) {echo "<span>" . esc_html__('404', 'first-news'); echo '</span>';}
                

                echo '</div>';
            } else {
                echo '<div class="breadcrumbs-section"><div class="container">';
                
                echo '<a href="';
                echo esc_url( home_url( '/' ) );
                echo '">';
                echo esc_html__('Home', 'first-news');
                echo '</a>'.$first_news_breadcrumb_separator;
                
                echo esc_html__('Blog', 'first-news');
                
                
                echo '</div>';
            }

            echo "</div></div>";
        }
    }

}
