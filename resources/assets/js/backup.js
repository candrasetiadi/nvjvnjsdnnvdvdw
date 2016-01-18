

switch(data.status) {

    case 200:

        if(typeof data.message.title != 'undefined' && typeof data.message.msg != 'undefined') {

            Monolog.notify(data.message.title, data.message.msg, NProgress.done());

        }

        doneFunc(data);

        break;

    default:

        if(typeof data.message.title != 'undefined' && typeof data.message.msg != 'undefined') {

            Monolog.notify(data.message.title, data.message.msg, NProgress.done());

        } else {

            Monolog.notify("XHR Error", "Some data were not correctly read and errors may not be displayed properly. Contact your developer if problem persists.", NProgress.done());

        }

        if(typeof data.log != 'undefined') {

            console.log(data);

        }

        break;
}
