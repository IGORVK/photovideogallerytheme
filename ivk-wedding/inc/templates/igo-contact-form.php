<h1>iGo Contact Form</h1>
<?php settings_errors(); ?>

<p>Use this <strong>shortcode</strong> to activate the Contact Form inside a Page or a Post</p>
<p><code>[contact_form]</code></p>

<form method="post" action="options.php" class="ivk_wedding-general-form">
    <?php settings_fields( 'ivk_wedding-contact-options' ); ?>
    <?php do_settings_sections( 'igor_ivk_wedding_theme_contact' ); ?>
    <?php submit_button(); ?>
</form>