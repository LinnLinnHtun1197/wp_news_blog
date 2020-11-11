/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    "use strict";
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });

    wp.customize('nav_color', function (value) {
        value.bind(function (newval) {
            $('.top-bar, .main-navigation ul ul').css('background-color', newval);
        });
    });

    // Menu color
    wp.customize('menu_color', function (value) {
        value.bind(function (newval) {
            $('.main-navigation a').css('color', newval);
        });
    });
    wp.customize('menu_hover_color', function (value) {
        value.bind(function (newval) {
            $('.main-navigation li:hover').css('background', newval);
        });
    });

    wp.customize('site_title_color', function (value) {
        value.bind(function (newval) {
            $('.site-branding .site-title a').css({ 'color': newval, 'border-color' : newval });
        });
    });

    wp.customize('site_tagline_color', function (value) {
        value.bind(function (newval) {
            $('.site-branding .site-description').css('color', newval);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function (value) {
        value.bind(function (to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $('.site-title, .site-description').css({
                    'clip': 'auto',
                    'position': 'relative'
                });
                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });
})(jQuery);
