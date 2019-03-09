<?php

function wli_scripts() {
    $theme = wp_get_theme();
    wp_enqueue_style("master-style", trailingslashit(WLI_TDU) . "assets/css/master.css");
    wp_enqueue_script("master-script", trailingslashit(WLI_TDU) . "assets/js/master.js", array('jquery'), $theme->Version, true);
}
add_action("wp_enqueue_scripts", "wli_scripts");
function rng_scripts() {
    //enqueue styles
}
add_action("wp_enqueue_scripts", "rng_scripts");

function admin_script($hook) {
  //enqueue scripts
}
add_action('admin_enqueue_scripts', 'admin_script');

/**
 * add comment reply scripts before show comment form
 */
function rng_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'comment_form_before', 'rng_enqueue_comment_reply_script' );
