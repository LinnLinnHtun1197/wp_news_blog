<?php
/**
 * First News Demo Import
 * First newd demo import section hear.
 */
function first_news_demo_import_files() {
    return array(
      array(
        'import_file_name'           => 'Default',
        'categories'                 => array( 'Magazine'),
        'import_file_url'            => 'http://demo.themerelic.com/demo-import/first-news/default/all-content.xml',
        'import_widget_file_url'     => 'http://demo.themerelic.com/demo-import/first-news/default/widget.wie',
        'import_customizer_file_url' => 'http://demo.themerelic.com/demo-import/first-news/default/customizer.dat',
        
        'import_preview_image_url'   => 'https://themerelic.com/wp-content/uploads/2017/10/screenshot-2.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'first-news' ),
        'preview_url'                => 'http://demo.themerelic.com/first-news/',
      ),
      array(
        'import_file_name'           => 'Default',
        'categories'                 => array( 'Magazine'),
        'import_file_url'            => 'http://demo.themerelic.com/demo-import/first-news/default/all-content.xml',
        'import_widget_file_url'     => 'http://demo.themerelic.com/demo-import/first-news/default/widget.wie',
        'import_customizer_file_url' => 'http://demo.themerelic.com/demo-import/first-news/default/customizer.dat',
        
        'import_preview_image_url'   => 'https://themerelic.com/wp-content/uploads/2017/12/banner.png',
        'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately.', 'first-news' ),
        'preview_url'                => 'http://demo.themerelic.com/first-news/',
      ),
    );
  }
  add_filter( 'pt-ocdi/import_files', 'first_news_demo_import_files' );

  
/*****************************************************************
*         After Demo Import Functions
*************************************************************/
function first_news_after_import_setup() {
  // Assign menus to their locations.
  $top_menu_options = get_term_by( 'name', 'first-news-demo-top-menu', 'nav_menu' );
  $main_menu = get_term_by( 'name', 'first-news-demo-primary-menu', 'nav_menu' );
  $footer_menu = get_term_by( 'name', 'first-news-demo-footer-menu', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
      'top-menu'      => $top_menu_options->term_id,
      'primary-menu'  => $main_menu->term_id,
      'footer-menu'   => $footer_menu->term_id,
    )
  );

  // Assign front page and posts page (blog page).
  $front_page_id = get_page_by_title( 'Sample Page ' );
  $blog_page_id  = get_page_by_title( 'Blog' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'first_news_after_import_setup' );