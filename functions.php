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

/** Adding Custom Logo Support */
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
 * Adding the !SVG! logos accordingly, if the logo name is contained in the Website-URL and unique
 * EXAMPLE: https://www.facebook.com 
 *          -> Logo-Name: facebook.svg
 * $theme_location is the registered theme location from a Nav-Menu: register_nav_menus();
 */

// Intented to use with locations, like 'primary'
// clean_custom_menu("primary");

function social_media_icon($theme_location)
{
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = '<ul class="' .$theme_location. '">' . "\n";

        $count = 0;
        $submenu = false;

        foreach ($menu_items as $menu_item) {

            $link = $menu_item->url;
            $title = $menu_item->title;
            $social = array("facebook", "instagram", "linkedin", "twitter", "rrd"); // list the used socialmedia names in this array
            $link_img = "";
            $home_url = get_home_url() ;
            $i = 0;


            for($i, $size = count($social); $i<$size; $i++){
                $name = $social[$i];

                if (strpos($link, $name) == true) {
                    $link_img = ''. file_get_contents("$home_url/app/themes/internship-work/src/assets/images/icons/$name.svg") .'';
                    //$link_img = '<img class="svg" src="' . $home_url . '/app/themes/internship-work/src/assets/images/icons/' . $name . '.svg" width=30px hight=auto';
                    $title = "";
                    break;
                }
                else{
                    $link_img = ''. file_get_contents("$home_url/app/themes/internship-work/src/assets/images/icons/error.svg") .'';
                    //$link_img = '<img class="svg" src="' . $home_url . '/app/themes/internship-work/src/assets/images/icons/error.svg" width=30px hight=auto';
                }
            } 
            

            if (!$menu_item->menu_item_parent) {

                $menu_list .= '<li class="item">' . "\n";
                $menu_list .= '<a href="' . $link . '" class="title">' . $link_img . ' ' . $title . '</a>' . "\n";
            }
            $count++;
        }

        $menu_list .= '</ul>' . "\n";
    } else {
        $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    echo $menu_list;
}