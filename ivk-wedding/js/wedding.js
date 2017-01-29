
/*
 =======================================================================================================================
 Contact Form submission
 =======================================================================================================================
 */
jQuery(document).ready(function($){

    $('#igo-contact-form').on('submit', function(e){

        e.preventDefault();

        $('.has-error').removeClass('has-error');

        var form = $(this),
            name = form.find('#name').val(),
            date = form.find('#date').val(),
            email = form.find('#email').val(),
            venue = form.find('#venue').val(),
            message = form.find('#message').val(),
           ajaxurl = form.data('url');

        if( name === '' ){
            $('#name').parent('.form-group').addClass('has-error');
            return;
        }
        if( date === '' ){
            $('#date').parent('.form-group').addClass('has-error');
            return;
        }


        if( email === '' ){
            $('#email').parent('.form-group').addClass('has-error');
            return;
        }

        if( venue === '' ){
            $('#venue').parent('.form-group').addClass('has-error');
            return;
        }

        if( message === '' ){
            $('#message').parent('.form-group').addClass('has-error');
            return;
        }


        form.find('input, button, textarea').attr('disabled','disabled');
        $('.js-form-submission').addClass('js-show-feedback');


        $.ajax({

            url : ajaxurl,
            type : 'post',
            data : {

                name    : name,
                date    : date,
                email   : email,
                venue   : venue,
                message : message,
                action: 'ivk_wedding_save_user_contact_form'

            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    },1500);

                } else {

                    setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    },1500);

                }
            }

        });
    });
});

/*
========================================================================================================================
Autoresize textarea contact form
========================================================================================================================
 */

/*
 * jQuery autoResize (textarea auto-resizer)
 * @copyright James Padolsey http://james.padolsey.com
 * @version 1.04
 */

(function($){

    $.fn.autoResize = function(options) {

        // Just some abstracted details,
        // to make plugin users happy:
        var settings = $.extend({
            onResize : function(){

            },
            animate : true,
            animateDuration : 150,
            animateCallback : function(){},
            extraSpace : 20,
            limit: 1000
        }, options);

        // Only textarea's auto-resize:
        this.filter('textarea').each(function(){

            // Get rid of scrollbars and disable WebKit resizing:
            var textarea = $(this).css({resize:'none','overflow-y':'hidden'}),

                // Cache original height, for use later:
                origHeight = textarea.height(),


                // Need clone of textarea, hidden off screen:
                clone = (function(){

                    // Properties which may effect space taken up by chracters:
                    var props = ['height','width','lineHeight','textDecoration','letterSpacing'],
                        propOb = {};

                    // Create object of styles to apply:
                    $.each(props, function(i, prop){
                        propOb[prop] = textarea.css(prop);
                    });

                    // Clone the actual textarea removing unique properties
                    // and insert before original textarea:
                    return textarea.clone().removeAttr('id').removeAttr('name').css({
                        position: 'absolute',
                        top: 0,
                        left: -9999
                    }).css(propOb).attr('tabIndex','-1').insertBefore(textarea);

                })(),
                lastScrollTop = null,
                updateSize = function() {
                    // Prepare the clone:
                    clone.height(0).val($(this).val()).scrollTop(10000);

                    // Find the height of text:
                    var scrollTop = Math.max(clone.scrollTop(), origHeight) + settings.extraSpace,
                        toChange = $(this).add(clone);

                    // Don't do anything if scrollTip hasen't changed:
                    if (lastScrollTop === scrollTop) { return; }
                    lastScrollTop = scrollTop;

                    // Check for limit:
                    if ( scrollTop >= settings.limit ) {
                        $(this).css('overflow-y','');
                        return;
                    }
                    // Fire off callback:
                    settings.onResize.call(this);

                    // Either animate or directly apply height:
                    settings.animate && textarea.css('display') === 'block' ?
                        toChange.stop().animate({height:scrollTop}, settings.animateDuration, settings.animateCallback)
                        : toChange.height(scrollTop);


                };

            // Bind namespaced handlers to appropriate events:
            textarea
                .unbind('.dynSiz')
                .bind('keyup.dynSiz', updateSize)
                .bind('keydown.dynSiz', updateSize)
                .bind('change.dynSiz', updateSize);

        });

        // Chain:
        return this;
    };

})(jQuery);



jQuery(function()
{
    jQuery('textarea').autoResize();
});
/*
========================================================================================================================
 Thinkbox
========================================================================================================================
*/

jQuery(document).ready(function($){



        var width = $(window).width();

        if (width <= 690) {
            $('.li-YoutubeGallery iframe').removeAttr('width').removeAttr('height');


            $('.li-YoutubeGallery iframe').css('width', '320px').css('height', '180px');


            var regV1 = /655/g;
            var regV2 = /410/g;

            $('.li-YoutubeGallery a').each(function () {
                var myString = $(this).attr('href');
                var result = myString.replace(regV1,'332').replace(regV2,'201');
                $(this).attr('href',result);
            });

        }


    $(window).on('resize',function () {

        var width = $(window).width();
        if (width <= 690) {
            $('#TB_window iframe').removeAttr('width').removeAttr('height');
            $('.container-ysg iframe').removeAttr('width').removeAttr('height');
            $('#TB_window').removeAttr('width');
            $('#TB_window').css({'width': '360px', 'margin-left': '-175px', 'margin-top' : '-125px'});
            $('#TB_ajaxContent').removeAttr('style');
            $('#TB_ajaxContent').attr('style', 'width: 337px; height: 197px;');
            $('#TB_window iframe').css({'width' : '320px' ,'height': '180px'});
            $('.container-ysg iframe').css({'width' : '280px' ,'height': '158px'});

        }else {
            $('#TB_window iframe').removeAttr('width').removeAttr('height');
            $('.container-ysg iframe').removeAttr('width').removeAttr('height');
            $('#TB_window').removeAttr('width');
            $('#TB_window').css({'width': '685px', 'margin-left': '-342px', 'margin-top' : '-225px'});
            $('#TB_ajaxContent').removeAttr('style');
            $('#TB_ajaxContent').attr('style', 'width: 655px; height: 405px;');
            $('#TB_window iframe').css({'width': '640px','height': '360px'});
            $('.container-ysg iframe').css({'width': '640px','height': '360px'});

        }
    });


});
/*
 ========================================================================================================================
    Masonry Gallery
 ========================================================================================================================
 */


jQuery(document).ready(function($) {
    $(window).load(function() {//to-do-jquery-code-after-page-loading
        $('.elements-gride').masonry({
            // options
            itemSelector: '.element-item',
            columnWidth: 285,
            isFitWidth: true
        });
    });

});




/*
 ========================================================================================================================
 LightBox Slider
 ========================================================================================================================
 */

$(function(){
    var $gallery = $('#gallery a').simpleLightbox();

    $gallery.on('show.simplelightbox', function(){
        console.log('Requested for showing');
    })
        .on('shown.simplelightbox', function(){
            console.log('Shown');
        })
        .on('close.simplelightbox', function(){
            console.log('Requested for closing');
        })
        .on('closed.simplelightbox', function(){
            console.log('Closed');
        })
        .on('change.simplelightbox', function(){
            console.log('Requested for change');
        })
        .on('next.simplelightbox', function(){
            console.log('Requested for next');

        })
        .on('prev.simplelightbox', function(){
            console.log('Requested for prev');
        })
        .on('nextImageLoaded.simplelightbox', function(){
            console.log('Next image loaded');
        })
        .on('prevImageLoaded.simplelightbox', function(){
            console.log('Prev image loaded');
        })
        .on('changed.simplelightbox', function(){
            console.log('Image changed');
        })
        .on('nextDone.simplelightbox', function(){
            console.log('Image changed to next');
        })
        .on('prevDone.simplelightbox', function(){
            console.log('Image changed to prev');
        })
        .on('error.simplelightbox', function(e){
            console.log('No image found, go to the next/prev');
            console.log(e);
        });
});
/* Loader
========================================================================================================================
 */
$(window).load(function() {

    $(".page_loader_inner").fadeOut();
    $(".page_loader").delay(400).fadeOut("slow");
});
