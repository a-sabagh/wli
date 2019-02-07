<?php

define("WLI_TDU", get_template_directory_uri());
define("WLI_ADMIN", get_template_directory_uri() . "/admin");

/**
 * int and setup theme
 */
require_once 'includes/init.php';
require_once 'includes/theme.php';
require_once 'includes/scripts.php';

/**
 * shortcodes
 */
require_once 'includes/shortcodes/post-category.php';
/**
 * metaboxes
 */
require_once 'includes/metaboxes/category-icon.php';
/**
 * other
 */
