<?php
/*
 * @package ivk_wedding
 */
get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">



        <div class="container ivk_wedding-posts-container">

            <?php

            if( have_posts() ):

                while( have_posts()): the_post();

                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;


            endif;

            ?>


        </div><!--.container-->

<!--        <div class="container text-center">
            <a  class="btn-fpr_theme-load fpr_theme-load-more" data-page="<?php /*echo fpr_theme_check_paged(1); */?>" data-url="<?php /*echo admin_url('admin-ajax.php');  */?>"  >
                <span class="fpr_theme-icon fpr_theme-loading"></span>
                <span class="text">Load More</span>
            </a>
        </div>--><!--.container-->

    </main>
</div><!--#primary-->

<?php get_footer(); ?>
