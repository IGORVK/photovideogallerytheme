<?php
/*
    @package ivk_wedding
*/
get_header(); ?>
    <div id="primary" class="content-area">
        <div id="main" class="site-main" role="main">
            <div class="container ">


                <div class="findme ">
                    <? if ( have_posts() ) : ?>
                        <h1 class="text-center"><? printf( __( 'Search Results for: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        <ol class="find">
                            <? while ( have_posts() ) : the_post(); ?>
                                <li><h2><a href="<? the_permalink() ?>" rel="bookmark" title="<? the_title_attribute() ?>"><? the_title() ?></a></h2>
                                    <p><? echo(get_the_excerpt()) ?></p></li>
                            <? endwhile; ?>
                        </ol>
                    <? else : ?>
                        <div class="text-center">
                            <h1>Nothing Found</h1>
                            <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                            <br />
                            <div class="wrap-search">
                                <? get_search_form(); ?>
                            </div>
                        </div>
                    <? endif; ?>
                </div>



            </div><!--.container-->
        </main>
    </div><!-- #primary -->

<?php get_footer();
