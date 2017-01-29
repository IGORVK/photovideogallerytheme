<?php
/*
@package ivk_wedding
   =====================================
          AJAX FUNCTIONS
   =====================================
*/

add_action('wp_ajax_nopriv_ivk_wedding_save_user_contact_form', 'ivk_wedding_save_contact');
add_action('wp_ajax_ivk_wedding_save_user_contact_form', 'ivk_wedding_save_contact');

function ivk_wedding_save_contact(){

    $title = wp_strip_all_tags( $_POST['name'] );
    $date  = wp_strip_all_tags( $_POST['date'] );
    $email = wp_strip_all_tags( $_POST['email'] );
    $venue = wp_strip_all_tags( $_POST['venue'] );
    $message = 'Date: ' . $date . ' Venue: ' . $venue . '.  ' . wp_strip_all_tags( $_POST['message'] );

    $args = array(
        'post_title' => $title,
        'post_content' => $message,
        'post_author' => 1,
        'post_status' => 'publish',
        'post_type' => 'ivk_wedding-contact',
        'meta_input' => array(
            '_contact_email_value_key' => $email
        )

    );


    $postID = wp_insert_post( $args );

    if( $postID !== 0 ) {

        $to = get_bloginfo('admin_email');
        $subject = 'ivk_wedding
         Contact Form - ' . $title;
        // $message = ;
        $headers[] = 'From: ' . get_bloginfo('name') . ' <' . $to . '>'; //'From: Igor <me@example.com>'
        $headers[] .= 'Reply-to: ' . $title . ' <' .$email. '>';
        $headers[] .= 'Content-Type: text/html: charset=UTF-8';


        wp_mail( $to, $subject, $message, $headers);

        echo $postID;
    } else {
        echo 0;
    }

    die();//REALY IMPORTANT for AJAX  to call die(),because we need to close the connection!!!

}
