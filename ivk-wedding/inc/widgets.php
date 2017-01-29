<?php
/*

@package ivk_wedding

	========================
		WIDGET CLASS
	========================
*/

class ivk_wedding_Profile_Widget extends WP_Widget {

    //setup the widget name, description, etc...
    public function __construct() {

        $widget_ops = array(
            'classname' => 'ivk_wedding-profile-widget',
            'description' => 'Custom iGo Profile Widget',
        );
        parent::__construct( 'ivk_wedding_profile', 'iGo Profile', $widget_ops );

    }

    //back-end display of widget
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php



        echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields(Facebook handler, Twitter handler, Google+ handler) of this Widget from <a href="./admin.php?page=igor_ivk_wedding">This Page</a></p>';
    }

    //front-end display of widget
    public function widget( $args, $instance ) {

        $twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
        $facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
        $gplus_icon = esc_attr( get_option( 'gplus_handler' ) );

        echo $args['before_widget'];
        ?>
        <h2 class="ivk_wedding-widget-title"><?php echo $instance['title']; ?></h2>
        <div class="ivk_wedding-widget widget-igo-profile">
            <div class="icons-wrapper">
                <?php if( !empty( $twitter_icon ) ): ?>
                    <a href="https://twitter.com/<?php echo $twitter_icon; ?>" target="_blank"><span class="ivk_wedding-icon-sidebar ivk_wedding-icon icon-twitter"></span></a>
                <?php endif;
                if( !empty( $gplus_icon ) ): ?>
                    <a href="https://plus.google.com/u/0/<?php echo $gplus_icon; ?>" target="_blank"><span class="ivk_wedding-icon-sidebar ivk_wedding-icon icon-google-plus"></span></a>
                <?php endif;
                if( !empty( $facebook_icon ) ): ?>
                    <a href="https://facebook.com/<?php echo $facebook_icon; ?>" target="_blank"><span class="ivk_wedding-icon-sidebar ivk_wedding-icon icon-facebook"></span></a>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

}

add_action( 'widgets_init', function() {
    register_widget( 'ivk_wedding_Profile_Widget' );
} );

class ivk_wedding_Contact_Widget extends WP_Widget {

    //setup the widget name, description, etc...
    public function __construct() {

        $widget_ops = array(
            'classname' => 'ivk_wedding-contact-widget',
            'description' => 'Custom iGo Contact Us Widget',
        );
        parent::__construct( 'ivk_wedding_contact', 'iGo Contact Us', $widget_ops );

    }

    //back-end display of widget
    public function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
        <?php



        echo '<p><strong>No options for this Widget!</strong><br/>You can control the field( Phone Number ) of this Widget from <a href="./admin.php?page=igor_ivk_wedding">This Page</a></p>';
        echo '<p><strong></strong><br/>You can control the field( Email Address  ) of this Widget from <a href="./options-general.php">This Page</a></p>';

    }

    //front-end display of widget
    public function widget( $args, $instance ) {

        $phone = esc_attr( get_option( 'phone_number' ) );
        $mail = get_bloginfo('admin_email');


        echo $args['before_widget'];
        ?>
        <h2 class="ivk_wedding-widget-title"><?php echo $instance['title']; ?></h2>
        <div class="ivk_wedding-widget widget-igo-contact">
            <div class="contact-wrapper">
                <?php if( !empty( $phone ) ): ?>
                    <div class="phone">
                        <a href="tel:<?php echo $phone; ?>" target="_blank"><?php echo $phone; ?></a>
                    </div>
                <?php endif;
                if( !empty( $mail) ): ?>
                    <div class="mail">
                        <a href="mailto:<?php echo $mail; ?>" target="_blank"><?php echo $mail; ?></span></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo $args['after_widget'];
    }

}

add_action( 'widgets_init', function() {
    register_widget( 'ivk_wedding_Contact_Widget' );
} );