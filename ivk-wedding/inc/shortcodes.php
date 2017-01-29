<?php

/*
	
@package ivk_wedding
	
	========================
		SHORTCODE OPTIONS
	========================
*/

// Contact Form shortcode
function ivk_wedding_contact_form( $atts, $content = null ) {

    //[contact_form]

    //get the attributes
    $atts = shortcode_atts(
        array(),
        $atts,
        'contact_form'
    );

    //return HTML
    ob_start();
    include 'templates/contact-form.php';
    return ob_get_clean();

}
add_shortcode( 'contact_form', 'ivk_wedding_contact_form' );


//Gallery Image Shortcode
add_shortcode('gallery', 'my_gallery');

function my_gallery($atts, $text=''){
    $img_src = explode(',',$atts['ids']);
    $theme = isset($atts['theme']) ? $atts['theme'] : 'default';

 $html = '<div id="gallery" class="elements-gride ">';
    foreach ($img_src as $img) {
        $imgUrl = wp_get_attachment_image_url( $img, 'full' );
        $domain = explode('/', $imgUrl);
        $fileName = array_pop($domain);

        $html .= '<a href="'.$imgUrl.'" >';
        $caption = wp_get_attachment_caption( $img );
        $html .= wp_get_attachment_image($img, 'full', false, array('class'=>'element-item', 'alt'=>$caption));
        $html .= '</a>';

    }

       /* foreach ($img_src as $img) {

            $imgUrl = wp_get_attachment_image_url( $img, 'full' );
            $domain = explode('/', $imgUrl);
            $fileName = array_pop($domain);
            $html .= '<a href="#close" class="lightbox" id="'.$fileName.'">';
            $html .= '<img src="'.$imgUrl.'">';
            $html .= '</a>';


        }*/


  $html .= '</div>';

    return $html;
}

//List Gallery  for Page Photo Stories

add_shortcode('list_photo_galleries', 'my_list_photo_galleries');

function my_list_photo_galleries($atts, $text=''){

    $order = isset($atts['order']) ? $atts['order'] : 'DESC';
    $orderby = isset($atts['orderby']) ? $atts['orderby'] : 'date';
    $posts = isset($atts['posts']) ? $atts['posts'] : '4';
    $pagination = isset($atts['pagination']) ? $atts['pagination'] : 'yes';

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

$the_query = new WP_Query( array(
    'posts_per_page' => $posts,
    'post_type' => 'post',
    'category_name'  => 'photo-story',
    'orderby' => $orderby,
    'order'   =>  $order,
    'paged'          => $paged,
) );


    $html = '<div id="gallery" class="elements-gride" >';

    if ($the_query -> have_posts()):

        while ($the_query -> have_posts()):

            $the_query -> the_post();



            $html .= '<a href="'. esc_url(get_permalink()) .'">';

            $html .= '<div class="element-item"><div class="element-item-title text-center"><h2 >' . get_the_title() . ' </h2><h4>-photo story-</h4></div>';

            $html .=  get_the_post_thumbnail( get_the_ID() , 'full', array());
            $html .= '</div>';
            $html .= '</a>';



        endwhile;

    endif;

    wp_reset_postdata();

    $html .= '</div>';



    if($pagination=='yes') {

        $html .= '<div class="container-pagination text-center">';

        $big = 999999999; // unique number


        $html .= paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'show_all' => false,
            'end_size' => 1,
            'mid_size' => 1,
            'prev_next' => false,
            /*  'prev_text' => '«',
              'next_text' => '»',*/
            'add_args' => false,
            'add_fragment' => '',
            'before_page_number' => '',
            'after_page_number' => '',
            'current' => max(1, get_query_var('paged')),
            'total' => $the_query->max_num_pages
        ));

        $html .= '</div><!--.container-pagination-->';
    }
return $html;
}
