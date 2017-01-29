<?php
/*
    This is the tamplate for the footer

    @package ivk_wedding
*/
?>

    <div id="footer" >
        <div class="container ">
            <div class="row">
                <div class="col-xs-12 clearfix">

                    <footer  class="ivk_wedding-footer text-center ">


                        <div class="ivk_wedding-sidebar sidebar-closed">

                            <div class="ivk_wedding-sidebar-container">

                                <a class="js-toggleSidebar sidebar-close">
                                    <span class="ivk_wedding-icon ivk_wedding-close"></span>
                                </a>

                                <div class="sidebar-scroll">

                                    <?php get_sidebar(); ?>

                                </div><!--.sidebar-scroll-->

                            </div><!--.ivk_wedding-sidebar-container-->

                        </div><!--.ivk_wedding-sidebar-->

                        <div class="sidebar-overlay js-toggleSidebar"></div>
                        
                    </footer>
                </div><!--.col-xs-12-->
            </div><!--.row-->
        </div><!--.container-->
    </div><!--#footer-->


<?php wp_footer(); ?>


</body>
</html>
