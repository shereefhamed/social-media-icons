<?php
/**
 * Plugin Name: Social Media Icons
 * Text Domain: social-media-icons
 * Domain Path: /languages
 * Version: 1.0.0
 * Description: Display Social Media Icons To Any Widget
 */

if( !defined( 'ABSPATH' ) ){
    exit;
}

define( 'SOCIAL_MEDIA_ICONS_PATH',plugin_dir_path(__FILE__) );
define( 'SOCIAL_MEDIA_ICONS_URI',plugin_dir_url(__FILE__) );
define( 'SOCIAL_MEDIA_ICONS_VERSION','1.0.0' ); 
load_plugin_textdomain(
    'social-media-icons',
    false,
    dirname( plugin_basename(__FILE__) ). '/languages',
);
require_once( SOCIAL_MEDIA_ICONS_PATH . 'includes/class-social-media-icons.php' );

if( class_exists( 'Social_Media_Icons' ) ){
    register_activation_hook( __FILE__,array( 'Social_Media_Icons','activate' ) );
    register_deactivation_hook( __FILE__,array('Social_Media_Icons','deactivate' ) );
    register_uninstall_hook( __FILE__,array( 'Social_Media_Icons','uninstall' ) );
    $social_media_icons = new Social_Media_Icons(); 
}

