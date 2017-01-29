<?php
/*
    This is the tamplate for the header

    @package ivk_wedding
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

<!--    <?php /*if( is_singular() && pings_open( get_queried_object() ) ): */?>
        <link rel="pingback" href="<?php /*bloginfo( 'pingback_url' ); */?>">
    --><?php /*endif; */?>

    <?php wp_head(); ?>
    <?php
    $custom_css = esc_attr(get_option('ivk_wedding_css'));
    if( !empty( $custom_css ) ):
        echo  '<style>' . $custom_css . '</style>';
    endif;
    ?>
</head>

<body <?php body_class(); ?>>

<div class="page_loader">
    <div class="page_loader_inner"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="poster" <?php if(!is_page('about-us')){
                echo ' style="background-image: url(' . get_header_image(). '); background-repeat: no-repeat; background-position: center center; height: 300px;"'; } ?>>

            </div><!--.poster-->
            <header class="header-container  text-center" >

                <?php if(!is_page('about-us')){ echo '<style>.homepage-hero-module {display: none;}</style>';}?>

                <div class="homepage-hero-module" >
                    <div id="vcontainer" align="center" class="video-container embed-responsive embed-responsive-16by9" >
                        <div id="title-container" class="title-container " >
                            <div  class="headline ">
                                <h1 class="site-title">
                                    <span class="ivk_wedding-theme-logo"></span>
                                    <span class=""><?php bloginfo( 'name' ); ?></span>
                                </h1><!--.site-title-->
                                <span id="playpausebtn1" class="ivk_wedding-icon icon-play22"  onclick="playPause()" aria-hidden="true"></span>
                                <div class="description">
                                    <div class="inner"><?php bloginfo( 'description' ); ?></div><!--.inner-->
                                </div><!--.description-->
                            </div><!--.headline-->
                        </div><!--.title-container-->
                        <?php
                        $header_video_about_us = esc_attr( get_option( 'header_video_about_us_handler' ) );

                        $domain = explode('/', $header_video_about_us);
                        $fileName = array_pop($domain);
                        $file = explode('.', $fileName);
                        $fileExt = array_pop($file);
                        if(is_page('about-us')) {

                            if ($fileExt == 'mp4') {

                                ivk_wedding_header_video_mp4();

                            } else {
                                echo '<style>.headline {display: none;}</style>';
                                echo get_option('header_video_about_us_handler');
                            }

                        }?>





                    </div><!--.video-container-->
                </div><!--.homepage-hero-module-->

                <nav role="navigation" class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="text-menu">Menu</span>
                        </button>
                        <!--<a href="#" class="navbar-brand">Бренд</a>-->
                    </div><!--.navbar-header-->
                    <!-- Collection of nav links, forms, and other content for toggling -->
                    <div id="navbarCollapse" class="collapse navbar-collapse">
                        <div  class="navbar-ivk_wedding">
                            <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'primary',
                                'container'         => false,
                                'menu_class'        => 'nav navbar-nav',
                                'walker'            => new ivk_wedding_Walker_Nav_Primary(),
                            ) );
                            ?>
                        </div><!--.navbar-ivk_wedding-->
                    </div><!--#navbarCollapse-->
                </nav><!--.navbar-->


            </header><!--.header-container-->
        </div><!--.col-xs-12-->
    </div><!--.row-->
</div><!--.container-->



























