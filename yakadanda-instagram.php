<?php
/*
  Plugin Name: Yakadanda Instagram
  Plugin URI: http://www.yakadanda.com/plugins/yakadanda-instagram/
  Description: A Wordpress plugin that pulls in Instagram images based on profile and hashtags.
  Version: 0.0.60
  Author: Peter Ricci
  Author URI: http://www.yakadanda.com/
  License: GPLv2 or later
 */

/* Put setup procedures to be run when the plugin is activated in the following function */
register_activation_hook(__FILE__, 'yinstagram_activate');
function yinstagram_activate() {
  if (!get_option('yinstagram_settings'))
    add_option('yinstagram_settings', null, false, false);
  if (!get_option('yinstagram_display_options'))
    add_option('yinstagram_display_options', null, false, false);
  if (!get_option('yinstagram_access_token'))
    add_option('yinstagram_access_token', null, false, false);
}

// On deacativation, clean up anything your component has added.
register_deactivation_hook(__FILE__, 'yinstagram_deactivate');
function yinstagram_deactivate() {
  // You might want to delete any options or tables that your component created.
  
}

if (!defined('YINSTAGRAM_VER')) define('YINSTAGRAM_VER', '0.0.60');
if (!defined('YINSTAGRAM_PLUGIN_DIR')) define('YINSTAGRAM_PLUGIN_DIR', plugin_dir_path(__FILE__));
if (!defined('YINSTAGRAM_PLUGIN_URL')) define('YINSTAGRAM_PLUGIN_URL', plugins_url(null, __FILE__));
if (!defined('YINSTAGRAM_THEME_DIR')) define('YINSTAGRAM_THEME_DIR', get_stylesheet_directory());
if (!defined('YINSTAGRAM_THEME_URL')) define('YINSTAGRAM_THEME_URL', get_stylesheet_directory_uri());

// Register scripts & styles
add_action('init', 'yinstagram_register');
function yinstagram_register() {
  /* Register styles */
  wp_register_style('yinstagram-admin', YINSTAGRAM_PLUGIN_URL . '/css/admin.css', false, YINSTAGRAM_VER, 'all');
  if (file_exists(YINSTAGRAM_THEME_DIR . '/css/yakadanda-instagram.css')) {
    wp_register_style('yinstagram-style', YINSTAGRAM_THEME_URL . '/css/yakadanda-instagram.css', false, YINSTAGRAM_VER, 'all');
  } else {
    wp_register_style('yinstagram-style', YINSTAGRAM_PLUGIN_URL . '/css/yakadanda-instagram.css', false, YINSTAGRAM_VER, 'all');
  }

  /* Register scripts */
  // simplyScroll
  wp_register_script('yinstagram-simplyScroll', YINSTAGRAM_PLUGIN_URL . '/js/jquery.simplyscroll.min.js', array('jquery'), '2.0.5', true);
  // ColorBox
  wp_register_script('yinstagram-colorbox', YINSTAGRAM_PLUGIN_URL . '/js/jquery.colorbox-min.js', array('jquery'), '1.4.32', true);
  // YInstagram
  wp_register_script('yinstagram-script', YINSTAGRAM_PLUGIN_URL . '/js/script.js', array('jquery', 'yinstagram-simplyScroll'), YINSTAGRAM_VER, true);
}

// Enqueue styles for admin
function yinstagram_admin_enqueue_styles() {
  wp_enqueue_style('yinstagram-admin');
}

// Enqueue then call styles in frontend
add_action('wp_enqueue_scripts', 'yinstagram_wp_enqueue_styles');
function yinstagram_wp_enqueue_styles() {
  wp_enqueue_style('yinstagram-style');
}

// Enqueue scripts for admin
function yinstagram_admin_enqueue_scripts() {
  wp_enqueue_script('yinstagram-script');
}

// Enqueue then call scripts in frontend
add_action('wp_enqueue_scripts', 'yinstagram_wp_enqueue_scripts');
function yinstagram_wp_enqueue_scripts() {
  wp_enqueue_script('jquery');
  wp_enqueue_script('yinstagram-simplyScroll');
  wp_enqueue_script('yinstagram-colorbox');
  wp_enqueue_script('yinstagram-script');

  // in javascript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
  wp_localize_script( 'yinstagram-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => null ) );
}

require_once( dirname(__FILE__) . '/admin/functions.php' );
require_once( dirname(__FILE__) . '/shortcode.php' );
require_once( dirname(__FILE__) . '/widget.php' );
