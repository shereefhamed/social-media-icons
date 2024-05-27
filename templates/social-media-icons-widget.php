<?php foreach( $this->social_media_icons as $key=>$value  ):?>
    <?php if( !empty( $instance[$key] ) ): ?>
        <a href="<?php echo esc_attr( $instance[$key] ) ?>" class="socail-media-icon" target="_blank"><i class="<?php echo $value; ?>"></i></a>
    <?php endif; ?>
<?php endforeach; ?>