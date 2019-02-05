<?php

/**
 * init
 */
function wli_init() {

    add_image_size("widget-thumb", 80, 80);
    remove_image_size('woocommerce_thumbnail');

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
$menu_position = array(
    "header" => "",
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

/**
 * register sidebars
 */
function wli_widgets_init() {
    register_sidebar(array(
        'name' => __('archive sidebar','TEXTDOMAIN'),
        'id' => 'archive_side',
        'before_widget' => '<section class="widg">',
        'before_title' => '<div class="widg-title"><h4>',
        'after_title' => '</h4></div><div class="widg-content">',
        'after_widget' => '</div></section>',
    ));
}

add_action("widgets_init", "wli_widgets_init");

function wli_logout() {
    session_destroy();
}

add_action('wp_logout', 'wli_logout');
add_action('wp_login', 'wli_logout');
