<h1>iGo Video Gallery</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Video Gallery inside a Page or a Post</p>
<p><code>[chr-youtube-gallery order="DESC" orderby="date" posts="6"]</code></p>

<form  method="post" action="options.php" class="ivk_wedding-general-form">
    <?php settings_fields( 'ivk_wedding-video-gallery-options' ); ?>
    <?php do_settings_sections( 'igor_ivk_wedding_video_gallery' ); ?>
    <?php submit_button(); ?>
</form>