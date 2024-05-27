<?php
class Social_Media_Icons_Widget extends WP_Widget{
    private $social_media_icons;

    public function __construct() {
        $this->social_media_icons = [
            'facebook'  =>  'fa-brands fa-facebook-f',
            'x'         =>  'fa-brands fa-x-twitter',
            'linkedin'  =>  'fa-brands fa-linkedin-in',
            'youtube'   =>  'fa-brands fa-youtube',
            'instagram' =>  'fa-brands fa-square-instagram'
        ];

        $control_options = array(
            'description' => esc_html__( 'Display Social Media Icons To Any Widget','social-media-icons' ),
        );
        parent::__construct(
            'social_media_icons',
            'Social Media Icons',
            $control_options,
        );
        add_action( 'widgets_init',array( $this,'register_widget' ) );
        if( is_active_widget( false,false,$this->id_base ) ){
            add_action( 'wp_enqueue_scripts',array( $this,'enqueue_scritps' ) );
        }
    }

    public function register_widget(){
        register_widget( 'Social_Media_Icons_Widget' );
    }

    public function form($instance){
        $title = isset( $instance['title'] ) ? $instance['title']: '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title')?>"><?php esc_html_e( 'Title','social-media-icons' ) ?></label>
            <input 
            type="text"
            class="widefat title" 
            id="<?php echo $this->get_field_id('title')?>"
            value="<?php echo esc_attr( $title )?>"
            name="<?php echo $this->get_field_name('title') ?>"
            >
        </p>
        <?php foreach( $this->social_media_icons as $key=>$value ):?>
            <p>
                <label for="<?php echo $this->get_field_id($key)?>"><?php echo ucfirst($key) ?></label>
                <input 
                type="url"
                class="widefat" 
                id="<?php echo $this->get_field_id($key)?>"
                value="<?php echo  isset( $instance[$key] )? $instance[$key] : '' ?>"
                name="<?php echo $this->get_field_name($key) ?>"
                >
            </p>
        <?php endforeach; ?>
        <?php
    }

    public function widget( $args,$instance ){
        $title = isset( $instance['title'] ) ? $instance['title']: 'Follow Us';
        echo $args['before_widget'];
        echo $args['before_title'] . $title . $args['after_title'];
        require( SOCIAL_MEDIA_ICONS_PATH . 'templates/social-media-icons-widget.php' );
        echo $args['after_widget'];
    }

    public function update( $new_instance,$old_instance ){
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        foreach( $this->social_media_icons as $key=>$value ){
            if( isset( $new_instance[$key] ) ){
                $instance[$key] = sanitize_text_field( $new_instance[$key] );
            }
        }
        return $instance;
    }

    public function enqueue_scritps(){
        wp_enqueue_style(
            'fontawsome-css',
            SOCIAL_MEDIA_ICONS_URI . 'assets/css/all.css',
            array(),
            SOCIAL_MEDIA_ICONS_VERSION,
            'all',
        );
        wp_enqueue_style(
            'social-meida-icons-css',
            SOCIAL_MEDIA_ICONS_URI . 'assets/css/style.css',
            array(),
            SOCIAL_MEDIA_ICONS_VERSION,
            'all',
        );
    }
}