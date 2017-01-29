jQuery(document).ready(function($){

    var mediaUploader;

    $('#upload-button').on('click',function(e) {
        e.preventDefault();
        if( mediaUploader ){
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a Contact Form Picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#contact_form_picture').val(attachment.url);
            $('#contact_form_picture_preview').css('background-image','url(' + attachment.url + ')');
        });

        mediaUploader.open();

    });

});
