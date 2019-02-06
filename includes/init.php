<?php

/**
 * init
 */
function wli_init() {
    add_image_size("widget-thumb", 80, 80);
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'wli_init');

/**
 * setup
 */
function wli_setup() {
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
    add_theme_support('custom-header');
    add_theme_support("post-formats", array("video", "quote"));
    add_theme_support("menus");
}

add_action("after_setup_theme", "wli_setup");

/**
 * register nav menus
 */
class WLI_Arrow_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl(&$output, $depth, $args) {
        $indent = str_repeat("\t", $depth);
        if ('header' == $args->theme_location && $depth == 0) {
            $output .='<span class="arrow"><i class="fa fa-plus"></i></span>';
        }
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

}

$menu_position = array(
    "header" => "منوی اصلی",
    "footer" => "منوی فوتر"
);
register_nav_menus($menu_position);

/**
 * unregester default widget
 */
function unregister_default_widget() {
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Search');
}

add_action('widgets_init', 'unregister_default_widget');


/*
 * register sidebars
 */

function wli_widgets_init() {
    register_sidebar(array(
        'name' => 'فوتر',
        'id' => 'footer_side',
        'before_widget' => '<section class="col-md-4 widg">',
        'before_title' => '<h3 class="widg-title">',
        'after_title' => '</h3><div class="widg-content">',
        'after_widget' => '</div></section>',
    ));
}

add_action("widgets_init", "wli_widgets_init");

/**
 * destroy session
 */
function wli_logout() {
    session_destroy();
}

add_action('wp_logout', 'wli_logout');
add_action('wp_login', 'wli_logout');
