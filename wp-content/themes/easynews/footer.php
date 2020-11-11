<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EasyNews
 */

?>
	</div><!-- #content -->



	<footer id="colophon" class="site-footer">

        <div class="footer-inner">
            <div class="footer-widgets">
		        <div class="footer-widget"><?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); }  ?></div>
                <div class="footer-widget"><?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } ?></div>
                <div class="footer-widget"><?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); }?></div>
            </div>

            <div class="site-info">
                <div class="footer-border"></div>
		        <?php do_action('easynews_footer_copyright') ; ?>
            </div><!-- .site-info -->
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->


<a href="#top" id="to-top" title="<?php echo esc_attr__('Back to top', 'easynews') ?>"><i class="fa fa-long-arrow-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>
