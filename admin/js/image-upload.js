jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the field
            $('#image_url').val(image_url);
            $('#upload_background_preview').attr('width', '100px');
            $('#upload_background_preview').attr('height', '50px');            
            $('#upload_background_preview').attr('src',image_url);


        });
    });
    $('#upload-logo').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the field
            $('#image_logo_url').val(image_url);
            $('#upload_logo_preview').attr('width', '100px');
            $('#upload_logo_preview').attr('height', '50px'); 
            $('#upload_logo_preview').attr('src',image_url);

        });
    });

});
