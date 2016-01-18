var UI = {

    previewImage: function(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader(),
                display = $(input).siblings('.m-image-preview');

            reader.onload = function(e) {

                $(display).css({

                    backgroundImage: 'url(' + e.target.result + ')'
                });
            }
            reader.readAsDataURL(input.files[0]);

            return true;
        }
    }
}
