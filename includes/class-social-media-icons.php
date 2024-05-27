<?php
class Social_Media_Icons{
    public function __construct() {
        require_once( SOCIAL_MEDIA_ICONS_PATH . 'includes/class-social-media-icons-widget.php' );
        $social_media_icona_widget = new Social_Media_Icons_Widget();
    }

    public static function activate(){

    }

    public static function deactivate(){

    }

    public static function uninstall(){
        delete_option( 'widget_social_media_icons' );
    }

}