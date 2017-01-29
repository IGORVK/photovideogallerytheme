<?php

/*
@package ivk_wedding

	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function ivk_wedding_load_admin_scripts( $hook )
{
    //echo '======================' . $hook;
    if ('toplevel_page_igor_ivk_wedding' == $hook) {

        wp_register_style('ivk_wedding_admin', get_template_directory_uri() . '/css/ivk_wedding.admin.min.css', array(), '1.0.0', 'all');
        wp_enqueue_style('ivk_wedding_admin');


    } elseif ('igo-theme_page_igor_ivk_wedding_theme_contact' == $hook) {

        wp_enqueue_media();

        wp_register_script('ivk_wedding_admin_script', get_template_directory_uri() . '/js/igo-admin.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('ivk_wedding_admin_script');

    } elseif ('igo-theme_page_igor_ivk_wedding_css' == $hook) {

        wp_enqueue_style('ace', get_template_directory_uri() . '/css/igo-theme.ace.min.css', array(), '1.2.6', 'all');

        wp_enqueue_script('ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.6', true);
        wp_enqueue_script('igo-custom-css-script', get_template_directory_uri() . '/js/igo.custom_css.js', array('jquery'), '1.0.0', true);

    } else {
        return;
    }
}
add_action( 'admin_enqueue_scripts', 'ivk_wedding_load_admin_scripts' );




/*
@package ivk_wedding
   =====================================
          FRONT-END ENQUEUE FUNCTIONS
   =====================================
*/

function fpr_theme_load_scripts(){

    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500');
    wp_enqueue_style('great-vibes', 'https://fonts.googleapis.com/css?family=Great+Vibes');
    wp_enqueue_style('amethysta', 'https://fonts.googleapis.com/css?family=Amethysta');
    wp_enqueue_style('gentium-book-basic', 'https://fonts.googleapis.com/css?family=Gentium+Book+Basic:400i');

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
    wp_enqueue_style('ivk_wedding', get_template_directory_uri() . '/css/wedding.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500');

    wp_deregister_script('jquery');
    wp_register_script('jquery',  get_template_directory_uri().'/js/jquery.min.js', false, '1.12.4', false);
    wp_enqueue_script('jquery');

    wp_deregister_script('masonry');
    wp_register_script('masonry', get_template_directory_uri().'/js/masonry.pkgd.min.js', array('jquery'), '4.1.1', true );
    wp_enqueue_script('masonry');

    wp_enqueue_script('simple-lightbox', get_template_directory_uri().'/js/simple-lightbox.min.js', array('jquery'), '1.0.0', true );


    wp_enqueue_script(array('jquery', 'thickbox'));

    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
    wp_enqueue_script('ivk_wedding', get_template_directory_uri().'/js/wedding.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'fpr_theme_load_scripts' );

