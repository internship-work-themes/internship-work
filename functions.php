<?php

/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once('library/cleanup.php');

/** Required for Foundation to work properly */
require_once('library/foundation.php');

/** Format comments */
require_once('library/class-foundationpress-comments.php');

/** Register all navigation menus */
require_once('library/navigation.php');

/** Add menu walkers for top-bar and off-canvas */
require_once('library/class-foundationpress-top-bar-walker.php');
require_once('library/class-foundationpress-mobile-walker.php');

/** Create widget areas in sidebar and footer */
require_once('library/widget-areas.php');

/** Return entry meta information for posts */
require_once('library/entry-meta.php');

/** Enqueue scripts */
require_once('library/enqueue-scripts.php');

/** Add theme support */
require_once('library/theme-support.php');

/** Add Nav Options to Customer */
require_once('library/custom-nav.php');

/** Change WP's sticky post class */
require_once('library/sticky-posts.php');

/** Configure responsive image sizes */
require_once('library/responsive-images.php');

/** Gutenberg editor support */
require_once('library/gutenberg.php');

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

/** Add Post Thumbnails for User */
add_theme_support('post-thumbnails');


/** 
 * Adding Custom Logo Support 
 */
function theme_custom_logo_setup()
{
    $defaults = array(
        'height' => 150,
        'width' => 150,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );

    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'theme_custom_logo_setup');


/**
 * Adding svg-logos to Social Website URLs with ACF
 */
/** adding the options_page for ACF */
function create_acf_social_media_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Social Media Link Settings',
            'menu_title' => 'Social',
            'menu_slug'  => 'acf-social',
            'capability' => 'edit_posts',
            'icon_url'   => 'dashicons-share',
            'redirect'   => false,
        ));
    }
}
add_action('acf/init', 'create_acf_social_media_options_page');

/** Load Social Media Icon Menü */
function get_social_icon_menu()
{
    if (have_rows('social_media_footer_repeater', 'option')) :

        $icon_list = '<ul class="social-icons">';

        while (have_rows('social_media_footer_repeater', 'option')) : the_row();

            // vars
            $name = get_sub_field('social_media_platform');
            $link_array = get_sub_field('social_media_url');
            $link = $link_array['url'];
            $link_target = $link_array['target'];
            $svg_url = '' . get_home_url() . '/app/themes/internship-work/src/assets/images/icons/' . $name . '.svg';

            $icon_list .= '<li class="icon-element">';
            if ($link) :
                $icon_list .= '<a class ="icon" href="' . $link . '" target="'. $link_target .'">';
            endif;

            $icon_list .= '' . file_get_contents($svg_url) . '';

            if ($link) :
                $icon_list .= '</a>';
            endif;
            $icon_list .= '</li>';
        endwhile;
        $icon_list .= '</ul>';
    else :
        // no rows found
        $icon_list = "Error loading Social Media Menu Icons!";
    endif;

    return $icon_list;
}

//Enqueue the Dashicons script
function load_dashicons_front_end()
{
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'load_dashicons_front_end');