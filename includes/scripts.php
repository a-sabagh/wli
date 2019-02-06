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
