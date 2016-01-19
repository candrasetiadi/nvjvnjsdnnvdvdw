var aurl = '/system/ajax/';

var Ajax = {

    post: function(method, ajaxIn, doneFunc) {

        Ajax.base(method, ajaxIn, doneFunc, 'POST');
    },

    destroy: function(targetUrl, token, doneFunc) {

        NProgress.start();

        $.ajax({

            url: aurl + targetUrl,

            type: 'POST',

            dataType: 'json',

            data: token,

            async: true,

            error: function(xhr, status, message){

            if(developement) consoleLog(xhr.responseText);

        }}).done(function(data) {

            doneFunc(data);
        });
    },

    get: function(targetUrl, doneFunc) {

        NProgress.start();

        return $.ajax({

            url: aurl + targetUrl,

            type: 'GET',

            dataType: 'json',

            async: true,

            error: function(xhr, status, message){

            if(developement) consoleLog(xhr.responseText);

        }}).done(function(data) {

            if(developement) consoleLog(data);

            doneFunc(data);
        });
    },

    base: function(targetUrl, dataIn, doneFunc, ajaxType) {

        NProgress.start();

        $.ajax({

            url: aurl + targetUrl,

            type: ajaxType,

            data: dataIn,

            processData: false,  // tell jQuery not to process the data. IMPORTANT for file upload.

            contentType: false,   // tell jQuery not to set contentType. IMPORTANT for file upload.

            dataType: 'json',

            async: true,

            error: function(xhr, status, message){

            consoleLog(xhr.responseText);

        }}).done(function(data) {

            if(developement) consoleLog(data);

            switch(data.status) {

                case 200:

                    Monolog.notify(data.message.title, data.message.msg, NProgress.done());

                    doneFunc(data);

                    break;

                default:

                    Monolog.notify(data.message.title, data.message.msg, NProgress.done());

                    consoleLog(data);
            }
        });
    }
}
