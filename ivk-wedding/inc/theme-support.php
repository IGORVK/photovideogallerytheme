<?php
/*
@package ivk_wedding
=====================================
THEME SUPPORT OPTIONS
=====================================
*/

$options = get_option( 'post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
    $output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
    add_theme_support( 'post-formats', $output );
}

$header = get_option( 'custom_header' );
if( @$header == 1 ){
    add_theme_support( 'custom-header' );
}

$background = get_option( 'custom_background' );
if( @$background == 1 ){
    add_theme_support( 'custom-background' );
}


//add Featured Image for Posts and Pages
add_theme_support('post-thumbnails');

/* Activate Nav Menu Option */

function ivk_wedding_register_nav_menu(){
    register_nav_menu('primary', 'Header Navigation Menu');
}
add_action('after_setup_theme', 'ivk_wedding_register_nav_menu');
/*Activate HTML5 features */
add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ));


/* Add function excerpt for pages*/
add_action('init', 'add_excerpt_page');
function add_excerpt_page(){
    add_post_type_support( 'page', 'excerpt' );
}


//visual editor for excerpt
function ivk_wedding_create_excerpt_box() {
    global $post;
    $id = 'excerpt';
    $excerpt = ivk_wedding_get_excerpt($post->ID);
    wp_editor($excerpt, $id);
}

function ivk_wedding_get_excerpt($id) {
    global $wpdb;
    $row = $wpdb->get_row("SELECT post_excerpt FROM $wpdb->posts WHERE id = $id");
    return $row->post_excerpt;
}

function ivk_wedding_replace_excerpt() {
    foreach (array("post", "page") as $type) {
        remove_meta_box('postexcerpt', $type, 'normal');
        add_meta_box('postexcerpt', __('Excerpt'), 'ivk_wedding_create_excerpt_box', $type, 'normal');
    }
}
add_action('admin_init', 'ivk_wedding_replace_excerpt');
//end visual editor for excerpt

/*
   =====================================
        SIDEBAR FUNCTIONS
   =====================================
*/

function ivk_wedding_sidebar_init(){
    register_sidebar(

        array(
            'name' => esc_html__( 'ivk_wedding Footer Sidebar', 'ivk_wedding' ),
            'id' => 'ivk_wedding-sidebar',
            'description' => 'Footer Sidebar',
            'before_widget' => '<section id="%1$s" class="ivk_wedding-widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="ivk_wedding-widget-title">',
            'after_title'   => '</h2>'
        )

    );
}
add_action('widgets_init','ivk_wedding_sidebar_init');

/*
   =====================================
        Gallery Image
   =====================================
*/
//remove default styles
add_filter('use_default_gallery_style', '__return_false');

//remove border image

$str = '';

add_filter('gallery_style', function( $str ){
    return str_replace('border: 2px solid #cfcfcf;', '', $str );
});






/*
  ===================================================================================================================
 Generate custom search form

 @param string $form Form HTML.
 @return string Modified form HTML.
 ====================================================================================================================
*/
function wpdocs_my_search_form( $form ) {
$form = '<form role="search" method="get" id="searchform" class="searchform ivk_wedding-searchform" action="' . home_url( '/' ) . '" >
<div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
<input type="submit" class="ivk_wedding-search-submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
<input type="text" class="ivk_wedding-search-text" value="' . get_search_query() . '" name="s" id="s" placeholder="search keyword"/>
</div>
</form>';

return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );




// Get video last post
    function ivk_wedding_get_video_last_post(){

echo esc_url(get_permalink( get_page_by_title( 'Romeo & Juliet' ) ));

    }



/*
  ===================================================================================================================

   ====================================================================================================================
*/
function ivk_wedding_header_video_mp4()
{?>

                                <video id="video1" class="fillWidth fadeIn animated img-responsive"
                                       poster="<?php header_image(); ?>">
                                    <source src="<?php echo esc_attr(get_option('header_video_about_us_handler')) ?>"
                                            type="video/mp4">
                                                Your browser does not support the video tag. I suggest you upgrade your browser.
                                </video>
                                <div id="video_controls_bar">
                                    <span id="playpausebtn2" class="ivk_wedding-icon js-play icon-play32"></span>
                                    <input id="seekslider" type="range" min="0" max="100" step="1" value="0">
                                    <span id="curtimetext"></span>
                                    <!--<div id="timevideo"><span id="durtimetext"></span></div>-->
                                    <span id="soundmutebtn" class="ivk_wedding-icon icon-volume-medium2"></span>
                                    <input id="volumebar" type="range" min="0" max="1" step="0.1" value="1">
                                    <span id="fullscreen" class="ivk_wedding-icon icon-enlarge2"></span>
                                </div>

                                <script>

                                    /*
                                     ========================================================================================================================
                                     Video Player Custom Controls
                                     ========================================================================================================================
                                     */

                                    var vid, playbtn, seekslider, curtimetext,
                                            /*    durtimetext, */
                                        soundmutebtn, volumebar, fullscreen, titleContainer, videoCtrlBar ;

                                    function initializePlayer(){
                                        // Set object references
                                        titleContainer = document.getElementById("title-container");
                                        videoCtrlBar = document.getElementById("video_controls_bar");
                                        vid = document.getElementById("video1");
                                        vcontainer = document.getElementById("vcontainer");
                                        playbtn = document.getElementById("playpausebtn2");
                                        seekslider = document.getElementById("seekslider");
                                        curtimetext = document.getElementById("curtimetext");
                                        /*    durtimetext = document.getElementById("durtimetext");*/
                                        fullscreen = document.getElementById("fullscreen");
                                        soundmutebtn = document.getElementById("soundmutebtn");
                                        volumebar = document.getElementById("volumebar");
                                        // Add event listeners
                                        playbtn.addEventListener("click", playPause, false);
                                        seekslider.addEventListener("change", vidSeek, false);

                                        vid.addEventListener("timeupdate", seektimeupdate, false);
                                        vcontainer.addEventListener("mouseover", timevideo, false);
                                        fullscreen.addEventListener("click", fullscreenMode, false);
                                        soundmutebtn.addEventListener("click", soundMute, false);
                                        volumebar.addEventListener("change", volumebarSeek, false);

                                        //when video finished
                                        var video=$("#video1").get(0);
                                        video.addEventListener('ended',function(){  video.load();},false);
                                        //video.addEventListener('pause',function(){  video.load();},false);
                                        document.getElementById('video1').addEventListener('ended',myHandler,false);
                                        function myHandler(e) {
                                            if(!e) { e = window.event; }
                                            titleContainer.style.display="block";
                                            playbtn.setAttribute("class", "ivk_wedding-icon  icon-play32");

                                        }
                                    }

                                    window.onload = initializePlayer;

                                    function playPause() {

                                        if (vid.paused){
                                            vid.play();
                                            playbtn.setAttribute("class", "ivk_wedding-icon  icon-pause22");
                                            titleContainer.style.display="none";
                                        }
                                        else if(vid.played){
                                            vid.pause();
                                            titleContainer.style.display="block";
                                            playbtn.setAttribute("class", "ivk_wedding-icon  icon-play32");

                                        }

                                    }

                                    function vidSeek() {

                                        var seekto = vid.duration * (seekslider.value/100);
                                        vid.currentTime = seekto;

                                    }

                                    function seektimeupdate() {
                                        var nt = vid.currentTime * (100 / vid.duration);
                                        seekslider.value = nt;
                                        timevideo();
                                    }

                                    function timevideo() {
                                        var curmins = Math.floor(vid.currentTime / 60);
                                        var cursecs = Math.floor(vid.currentTime - curmins * 60);
                                        /*    var durmins = Math.floor(vid.duration / 60);
                                         var dursecs = Math.round(vid.duration - durmins * 60);*/
                                        if(cursecs < 10){
                                            cursecs = "0"+cursecs;
                                        }
                                        /*    if(dursecs < 10){
                                         dursecs = "0"+dursecs;
                                         }*/
                                        curtimetext.innerHTML = curmins+":"+cursecs;
                                        /*    durtimetext.innerHTML = durmins+":"+dursecs;*/
                                    }

                                    // Event listener for the full-screen button
                                    function fullscreenMode() {
                                        if (vid.requestFullscreen) {
                                            vid.requestFullscreen();
                                        } else if (vid.mozRequestFullScreen) {
                                            vid.mozRequestFullScreen(); // Firefox
                                        } else if (vid.webkitRequestFullscreen) {
                                            vid.webkitRequestFullscreen(); // Chrome and Safari
                                        } else if (vid.msRequestFullscreen) {
                                            vid.msRequestFullscreen(); // IE
                                        }
                                    };

                                    function soundMute() {
                                        if (vid.muted == false) {
                                            // Mute the video
                                            vid.muted = true;

                                            // Update the button text
                                            soundmutebtn.setAttribute("class", "ivk_wedding-icon icon-volume-mute22");
                                        } else {
                                            // Unmute the video
                                            vid.muted = false;

                                            // Update the button text
                                            soundmutebtn.setAttribute("class", "ivk_wedding-icon icon-volume-medium2");

                                        }
                                    }

                                    function volumebarSeek() {
                                        // Update the video volume
                                        vid.volume = volumebar.value;
                                    }

/*                                    jQuery(document).ready(function($){

                                        $('input[type=range]#seekslider').val()

                                    });*/


                                </script>

<?php }