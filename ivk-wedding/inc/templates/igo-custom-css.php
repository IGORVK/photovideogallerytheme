<h1>iGo Theme Custom CSS</h1>

<?php settings_errors(); ?>


<form id="save-custom-css-form" method="post" action="options.php" class="ivk_wedding-general-form">
    <?php settings_fields( 'ivk_wedding-custom-css-options' ); ?>
    <?php do_settings_sections( 'igor_ivk_wedding_css' ); ?>
    <?php submit_button(); ?>
</form>