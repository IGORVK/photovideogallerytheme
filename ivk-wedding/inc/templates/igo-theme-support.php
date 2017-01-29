<h1>iGo Theme Support</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="ivk_wedding-general-form">
    <?php settings_fields( 'ivk_wedding-theme-support' ); ?>
    <?php do_settings_sections( 'igor_ivk_wedding_theme' ); ?>
    <?php submit_button(); ?>
</form>