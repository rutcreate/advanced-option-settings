jQuery(function($) {

    var fileFrames = {};

    jQuery('.advos-upload-button').on('click', function(e) {
        e.preventDefault();

        var key = $(this).data('key');
        var $target = $(this).parent().find('.image-attachment-id');
        var $preview = $(this).parent().find('.image-preview');

        if (!fileFrames[key]) {
            var fileFrame  = wp.media.frames.file_frame = wp.media({
                title: 'Select a image to upload',
                button: {
                    text: 'Use this image',
                },
                multiple: false
            });

            fileFrame.on('select', function () {
                var attachment = fileFrame.state().get('selection').first().toJSON();
                $preview.attr('src', attachment.url);
                $target.val(attachment.id);
            });

            fileFrames[key] = fileFrame
        }

        fileFrames[key].open();
    });
});