<?php
/*
 @package ivk_wedding
    ====================================================================================================================
    Admin Page
    ====================================================================================================================
*/



function ivk_wedding_add_admin_page(){

    //Generate ivk_wedding Theme Admin Page
    add_menu_page( 'iGo Theme Options', 'iGo Theme', 'manage_options', 'igor_ivk_wedding', 'ivk_wedding_create_page', get_template_directory_uri() . '/img/iGo.png', 110);

    //Generate ivk_wedding Theme Admin Sub Page
    add_submenu_page('igor_ivk_wedding', 'iGo Theme Options', 'General', 'manage_options',  'igor_ivk_wedding','ivk_wedding_create_page' );
    add_submenu_page( 'igor_ivk_wedding', 'iGo Theme Options', 'Theme Options', 'manage_options', 'igor_ivk_wedding_theme', 'ivk_wedding_theme_support_page' );
    add_submenu_page( 'igor_ivk_wedding', 'iGo Contact Form', 'Contact Form', 'manage_options', 'igor_ivk_wedding_theme_contact', 'ivk_wedding_contact_form_page' );
    add_submenu_page( 'igor_ivk_wedding', 'iGo Video Gallery', 'Video Gallery', 'manage_options', 'igor_ivk_wedding_video_gallery', 'ivk_wedding_video_gallery_page' );
    add_submenu_page('igor_ivk_wedding', 'iGo Theme CSS Options', 'Custom CSS', 'manage_options',  'igor_ivk_wedding_css', 'ivk_wedding_settings_page' );

}
add_action( 'admin_menu', 'ivk_wedding_add_admin_page' );

    //Activate custom settings
    add_action('admin_init', 'ivk_wedding_custom_settings');


function ivk_wedding_custom_settings(){
    //Sidebar Options


    register_setting('ivk_wedding-settings-group', 'phone_number');
    register_setting( 'ivk_wedding-settings-group', 'twitter_handler', 'ivk_wedding_sanitize_twitter_handler' );
    register_setting( 'ivk_wedding-settings-group', 'facebook_handler' );
    register_setting( 'ivk_wedding-settings-group', 'gplus_handler' );
    register_setting( 'ivk_wedding-settings-group', 'header_video_about_us_handler' );

    add_settings_section('ivk_wedding-sidebar-options', 'Footer Sidebar Option', 'ivk_wedding_sidebar_options', 'igor_ivk_wedding');

    add_settings_field('sidebar-phone', 'Phone Number', 'ivk_wedding_sidebar_phone', 'igor_ivk_wedding', 'ivk_wedding-sidebar-options');
    add_settings_field( 'sidebar-twitter', 'Twitter handler', 'ivk_wedding_sidebar_twitter', 'igor_ivk_wedding', 'ivk_wedding-sidebar-options');
    add_settings_field( 'sidebar-facebook', 'Facebook handler', 'ivk_wedding_sidebar_facebook', 'igor_ivk_wedding', 'ivk_wedding-sidebar-options');
    add_settings_field( 'sidebar-gplus', 'Google+ handler', 'ivk_wedding_sidebar_gplus', 'igor_ivk_wedding', 'ivk_wedding-sidebar-options');
    add_settings_field( 'video-header', 'Video Header Page About Us', 'ivk_wedding_header_video_about_us', 'igor_ivk_wedding', 'ivk_wedding-sidebar-options');


    //Theme Support Options
    register_setting( 'ivk_wedding-theme-support', 'post_formats' );
    register_setting( 'ivk_wedding-theme-support', 'custom_header' );
    register_setting( 'ivk_wedding-theme-support', 'custom_background' );

    add_settings_section( 'ivk_wedding-theme-options', 'Theme Options', 'ivk_wedding_theme_options', 'igor_ivk_wedding_theme' );

    add_settings_field( 'post-formats', 'Post Formats', 'ivk_wedding_post_formats', 'igor_ivk_wedding_theme', 'ivk_wedding-theme-options' );
    add_settings_field( 'custom-header', 'Custom Header', 'ivk_wedding_custom_header', 'igor_ivk_wedding_theme', 'ivk_wedding-theme-options' );
    add_settings_field( 'custom-background', 'Custom Background', 'ivk_wedding_custom_background', 'igor_ivk_wedding_theme', 'ivk_wedding-theme-options' );
    add_settings_field( 'custom-shortcodes', 'List Custom Shortcodes:', 'ivk_wedding_custom_shortcodes', 'igor_ivk_wedding_theme', 'ivk_wedding-theme-options' );


    //Contact Form Options
    register_setting( 'ivk_wedding-contact-options', 'contact_form_picture' );
    register_setting( 'ivk_wedding-contact-options', 'activate_contact' );



    add_settings_section( 'ivk_wedding-contact-section', 'Contact Form', 'ivk_wedding_contact_section', 'igor_ivk_wedding_theme_contact');
    add_settings_section('ivk_wedding-contact-form-section', 'Contact Form Picture', 'ivk_wedding_contact_form_options', 'igor_ivk_wedding_theme_contact');


    add_settings_field( 'contact-form-picture', 'Contact Form Picture', 'ivk_wedding_contact_form_picture', 'igor_ivk_wedding_theme_contact', 'ivk_wedding-contact-form-section');
    add_settings_field( 'activate-form', 'Activate Contact Form', 'ivk_wedding_activate_contact', 'igor_ivk_wedding_theme_contact', 'ivk_wedding-contact-section' );





    //Video Gallery Options
    register_setting( 'ivk_wedding-video-gallery-options', 'activate_video_gallery' );

    add_settings_section( 'ivk_wedding-video-gallery-section', 'Video Gallery Options', 'ivk_wedding_video_gallery', 'igor_ivk_wedding_video_gallery');

    add_settings_field( 'activate_video_gallery', 'Activate Video Gallery', 'ivk_wedding_activate_video_gallery', 'igor_ivk_wedding_video_gallery', 'ivk_wedding-video-gallery-section' );

    //Custom CSS
    register_setting( 'ivk_wedding-custom-css-options', 'ivk_wedding_css', 'ivk_wedding_sanitize_custom_css' );

    add_settings_section( 'ivk_wedding-custom-css-section', 'Custom CSS', 'ivk_wedding_custom_css_section_callback', 'igor_ivk_wedding_css' );

    add_settings_field( 'custom-css', 'Insert your Custom CSS', 'ivk_wedding_custom_css_callback', 'igor_ivk_wedding_css', 'ivk_wedding-custom-css-section' );

}



function ivk_wedding_custom_css_section_callback() {
    echo 'Customize iGo Theme with your own CSS';
}

function ivk_wedding_custom_css_callback() {
    $css = get_option( 'ivk_wedding_css' );
    $css = ( empty($css) ? '/* iGo Theme Custom CSS */' : $css );
    echo '<div id="customCss">'.$css.'</div><textarea id="ivk_wedding_css" name="ivk_wedding_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}

function ivk_wedding_theme_options() {
    echo 'Activate and Deactivate specific Theme Support Options';
}

function ivk_wedding_contact_form_options() {
    echo 'Customize your Contact Form Picture';
}

function ivk_wedding_contact_section() {
    echo 'Activate and Deactivate the Built-in Contact Form';
}

function ivk_wedding_video_gallery(){

    echo "Activate and Deactivate the Built-in Video Gallery";

}

function ivk_wedding_activate_contact() {
    $options = get_option( 'activate_contact' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}

function ivk_wedding_activate_video_gallery(){

    $options = get_option( 'activate_video_gallery' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="activate_video_gallery" value="1" '.$checked.' /></label>';

}


function ivk_wedding_post_formats() {
    $options = get_option( 'post_formats' );
    $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
    $output = '';
    foreach ( $formats as $format ){
        $checked = ( @$options[$format] == 1 ? 'checked' : '' );
        $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
    }
    echo $output;
}

function ivk_wedding_custom_header() {
    $options = get_option( 'custom_header' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function ivk_wedding_custom_background() {
    $options = get_option( 'custom_background' );
    $checked = ( @$options == 1 ? 'checked' : '' );
    echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

function ivk_wedding_custom_shortcodes (){

    echo '<p>[list_photo_galleries order="DESC" orderby="date" posts="3" pagination="yes"]</p>';
    echo '<p>[chr-youtube-gallery order="DESC" orderby="date" posts="6" pagination="yes"]</p>';
}

// Sidebar Options Functions
function ivk_wedding_sidebar_options(){
    echo 'Customize Your Sidebar Information';
}

function ivk_wedding_contact_form_picture(){
    $picture =  esc_attr(get_option('contact_form_picture'));
    echo '<div class="image-igo-contact-form">
            <img src="'. $picture .'" alt="">
          </div>';
    echo '<p><br/><strong>a downloading picture must be 350х250px</strong></p>';
    echo '<input type="button" class="button button-secondary" value="Upload Picture" id="upload-button"><input type="hidden" id="contact_form_picture" name="contact_form_picture" value="'.$picture.'" />';
    echo '<p><br/>You can control the field( Phone Number ) from <a href="./admin.php?page=igor_ivk_wedding">This Page</a></p>';
    echo '<p><br/>You can control the field( Email Address  ) from <a href="./options-general.php">This Page</a></p>';

}

function ivk_wedding_sidebar_phone(){
    $phoneNumber =  esc_attr(get_option('phone_number'));
    echo '<input type="text" name="phone_number" value="'.$phoneNumber.'" placeholder="Phone Number"/>';
}

function ivk_wedding_sidebar_twitter() {
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}
function ivk_wedding_sidebar_facebook() {
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}
function ivk_wedding_sidebar_gplus() {
    $gplus = esc_attr( get_option( 'gplus_handler' ) );
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

function ivk_wedding_header_video_about_us() {
    $header_video_about_us = esc_attr( get_option( 'header_video_about_us_handler' ) );
    echo '<input type="text" name="header_video_about_us_handler" value="'.$header_video_about_us.'" placeholder="Video Header" />
    <p class="description">Input your Video Link.</p><p class="description">For example: http://100wedding/wp-content/uploads/2016/12/awesome-films.mp4</p>
    <p class="description">or</p>
    <p class="description">&#60;iframe width="1280" height="720" src="https://www.youtube.com/embed/N9aSWr0Sw84" frameborder="0" allowfullscreen	&#62;&#60;/iframe	&#62;</p>';
}



//Sanitization settings
function ivk_wedding_sanitize_twitter_handler( $input ){
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}
function ivk_wedding_sanitize_custom_css( $input ){
    $output = esc_textarea( $input );
    return $output;
}

//Template submenu functions
function ivk_wedding_create_page(){
 require_once (get_template_directory() . '/inc/templates/igo-admin.php');
}

function ivk_wedding_theme_support_page() {
    require_once( get_template_directory() . '/inc/templates/igo-theme-support.php' );
}

function ivk_wedding_contact_form_page() {
    require_once( get_template_directory() . '/inc/templates/igo-contact-form.php' );
}

function ivk_wedding_video_gallery_page(){

    require_once( get_template_directory() . '/inc/templates/igo-video-gallery.php' );

}

function ivk_wedding_settings_page(){

    require_once( get_template_directory() . '/inc/templates/igo-custom-css.php' );
}

