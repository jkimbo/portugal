/* Author: J.Kim

*/

$(document).ready(function() {
     $('#file_upload').uploadify({
        'uploader'  : 'uploadify/uploadify.swf',
        'script'    : 'uploadify/uploadify.php',
        'cancelImg' : 'uploadify/cancel.png',
        'folder'    : 'uploads',
        'auto'      : true,
        'multi'     : true,
        'buttonText': 'Upload Files',
        'fileExt'   : '*.jpg;*.gif;*.png',
        'fileDesc'  : 'Image Files',
        'onComplete': function(event, ID, fileObj, response, data) {
            response = $.parseJSON(response);
            var image = $('<div>').addClass('item').css('height', response.height)
                .append(
                    $('<img>').attr({
                        src: 'timthumb.php?src=uploads/'+response.filename+'&w='+response['max_width'], 
                        height: response.height, 
                        width: response['max_width'] 
                    })
                );
            $('#photos').prepend(image).masonry( 'reload' );
        },
        'onAllComplete' : function(event, data) {
            $('#thankyou #info').text(data.filesUploaded + ' files uploaded successfully!');
            $('#upload').fadeOut(300, function() {
                $('#thankyou').fadeIn(400, function() {
                    $('#thankyou').fadeOut(3000, function() {
                        $('#upload_prompt').fadeIn(400);
                    });                   
                });
            });
        }
      });

    $('#upload_prompt a').click(function() {
        $('#upload_prompt').fadeOut(300, function() {
            $('#upload').fadeIn(400);
        });
        return false;
    });

    $('#photos').masonry({
        itemSelector: '.item',
        columnWidth : 270, 
        isAnimated: true,
        isFitWidth: true
    });

    /* Fancy box */
    $("a.gallery").fancybox();
});


