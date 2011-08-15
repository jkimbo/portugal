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
    'onInit'    : function() {
        $('#upload').show();
    },
    'onAllComplete' : function(event, data) {
        $('#thankyou #info').text(data.filesUploaded + ' files uploaded successfully!');
        $('#upload').fadeOut(300, function() {
            $('#thankyou').fadeIn(400, function() {
                $('#thankyou').fadeOut(4000, function() {
                    $('#upload').fadeIn(300);
                });                   
            });
        });
    }
  });
});


