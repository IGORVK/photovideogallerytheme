<?php
/*

@package ivk_wedding

	============================================
		THEME CUSTOM POST TYPE VIDEO GALLERY
	============================================
*/

/*$video_gallery = get_option( 'activate_video_gallery' );
if( @$video_gallery == 1 ){
   add_action( 'init', 'ivk_wedding_cpt_video_gallery' );}*/

 /*    add_filter( 'manage_ivk_wedding-contact_posts_columns', 'ivk_wedding_set_contact_columns' );
    add_action( 'manage_ivk_wedding-contact_posts_custom_column', 'ivk_wedding_contact_custom_column', 10, 2 );

    add_action( 'add_meta_boxes', 'ivk_wedding_contact_add_meta_box' );
    add_action( 'save_post', 'ivk_wedding_save_contact_email_data' );*/





/*CPT VIDEO GALLERY*/
function ivk_wedding_cpt_video_gallery() {
    $labels = array(
        'name' 				=> 'Videos',
        'singular_name' 	=> 'Video',
        'add_new'           => 'Add New',
        'add_new_item'      => 'Add New Video',
        'edit_item'         => 'Edit Item',
        'new_item'          => 'New Video',
        'view_item'         => 'View Video',
        'search_items'      => 'Search Video',
        'not_found'         => 'No records found',
        'not_found_in_trash'=> 'No records found in trash',
        'parent_item_colon' => '',
        'menu_name'			=> 'Videos',
        'name_admin_bar'	=> 'Video'
    );

    $args = array(
        'labels'			=> $labels,
        'show_ui'			=> true,
        'show_in_menu'		=> true,
        'capability_type'	=> 'post',
        'hierarchical'		=> false,
        'menu_position'		=> 27,
        'menu_icon'			=> 'dashicons-video-alt3',
        'public' => true,
        'public_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'has_archive' => true,
        //'register_meta_box_cb' => 'ysg_video_meta_box',
        'supports'			=> array( 'title', 'editor', 'author', 'thumbnail','excerpt' )
    );

    register_post_type( 'cpt-video-gallery', $args );
    flush_rewrite_rules();
}

/*
function ivk_wedding_set_contact_columns( $columns ){
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';
    return $newColumns;
}

function ivk_wedding_contact_custom_column( $column, $post_id ){

    switch( $column ){

        case 'message' :
            echo get_the_excerpt();
            break;

        case 'email' :
            //email column
            $email = get_post_meta( $post_id, '_contact_email_value_key', true );
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;
    }

}*/

/* CONTACT META BOXES */
/*
function ivk_wedding_contact_add_meta_box() {
    add_meta_box( 'contact_email', 'User Email', 'ivk_wedding_contact_email_callback', 'ivk_wedding-contact', 'side' );
}

function ivk_wedding_contact_email_callback( $post ) {
    wp_nonce_field( 'ivk_wedding_save_contact_email_data', 'ivk_wedding_contact_email_meta_box_nonce' );

    $value = get_post_meta( $post->ID, '_contact_email_value_key', true );

    echo '<label for="ivk_wedding_contact_email_field">User Email Address: </lable>';
    echo '<input type="email" id="ivk_wedding_contact_email_field" name="ivk_wedding_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function ivk_wedding_save_contact_email_data( $post_id ) {

    if( ! isset( $_POST['ivk_wedding_contact_email_meta_box_nonce'] ) ){
        return;
    }

    if( ! wp_verify_nonce( $_POST['ivk_wedding_contact_email_meta_box_nonce'], 'ivk_wedding_save_contact_email_data') ) {
        return;
    }

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
        return;
    }

    if( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if( ! isset( $_POST['ivk_wedding_contact_email_field'] ) ) {
        return;
    }

    $my_data = sanitize_text_field( $_POST['ivk_wedding_contact_email_field'] );

    update_post_meta( $post_id, '_contact_email_value_key', $my_data );

}*/