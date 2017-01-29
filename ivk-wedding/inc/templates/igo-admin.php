<h1>iGo Theme Options</h1>
<?php settings_errors(); ?>






















<form method="post" action="options.php">
    <?php settings_fields('ivk_wedding-settings-group'); ?>
    <?php do_settings_sections('igor_ivk_wedding'); ?>
    <?php submit_button(); ?>
</form>