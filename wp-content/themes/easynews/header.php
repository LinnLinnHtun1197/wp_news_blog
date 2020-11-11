<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EasyNews
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html__( 'Skip to content', 'easynews' ); ?></a>

	<header id="masthead" class="site-header">

        <div class="top-bar">
            <div class="site-topbar">
                <nav id="site-navigation" class="main-navigation">
                    <a href="#0" aria-controls="primary-menu" aria-expanded="false" id="nav-toggle" class=""><?php echo esc_html__( 'Menu', 'easynews' ); ?><span></span></a>

		            <?php
		            wp_nav_menu( array(
			            'theme_location' => 'menu-1',
			            'menu_id'        => 'primary-menu',
		            ) );
		            ?>
                </nav><!-- #site-navigation -->

                <div class="socials">
		            <?php easynews_social_media(); ?>
                </div>
            </div>
        </div>

		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$easynews_description = get_bloginfo( 'description', 'display' );
			if ( $easynews_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo esc_html( $easynews_description ); /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
