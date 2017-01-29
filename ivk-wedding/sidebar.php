<?php
/*
    @package ivk_wedding
*/

if( ! is_active_sidebar( 'ivk_wedding-sidebar' ) ){
    return;
}?>
<aside id="secondary" class="widget_area" role="complementary">

    <?php dynamic_sidebar( 'ivk_wedding-sidebar' ); ?>

</aside>


