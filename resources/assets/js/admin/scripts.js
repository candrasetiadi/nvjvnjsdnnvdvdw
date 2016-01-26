// Color Variables
var gred = "#F44336",
    gpink = "#E91E63",
    gsalmon = "#FF4081",
    gpurple = "#9C27B0",
    gdeeppurple = "#673AB7",
    gindigo = "#3F51B5",
    gblue = "#2196F3",
    glightblue = "#03A9F4",
    gcyan = "#00BCD4",
    gteal = "#009688",
    ggreen = "#4CAF50",
    glightgreen = "#8BC34A",
    glime = "#CDDC39",
    gyellow = "#FFEB3B",
    gamber = "#FFC107",
    gorange = "#FF9800",
    deeporange = "#FF5722",
    gbrown = "#795548",
    ggrey = "#9E9E9E",
    gbluegrey = "#607D8B";

//Plugin settings
NProgress.configure({
    showSpinner: false
});

//Navbar
$(document).on('click', '.navbar-main-link', function(e) {

    e.preventDefault();

    var nth = $(this).parent().index() + 1;

    $('.navbar-main-link').removeClass('active');
    $(this).addClass('active');

    $('.navbar-ul').removeClass('active');
    $('.navbar-ul:nth-child(' + nth + ')').addClass('active');
});

$(document).on('click', '.m-list-item-more', function(e) {

    e.preventDefault();

    $('.m-list-item-option').removeClass('active');

    $(this).next('.m-list-item-option').addClass('active');
});

$(document).on('click', '.mini-link-notif', function(e) {

    e.preventDefault();

    if($('.notification-wrapper').hasClass('active')) {

        $('.notification-wrapper').removeClass('active');

    } else {

        $('.notification-wrapper').addClass('active');
    }
});

$(document).on('click', '.admin-user', function(e) {

    e.preventDefault();

    if($('.admin-profile-wrapper').hasClass('active')) {

        $('.admin-profile-wrapper').removeClass('active');

    } else {

        $('.admin-profile-wrapper').addClass('active');
    }
});


// REVIEW
$(document).mouseup(function(e) {

    var container = $(".notification-wrapper");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.mini-link-notif').removeClass('active');
        $('.notification-wrapper').removeClass('active');
    }
});

$(document).mouseup(function(e) {

    var container = $("m-select");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('m-select').removeClass('active');
    }
});

$(document).mouseup(function (e) {

    var container = $(".m-list-item-option");

    if (!container.is(e.target) && container.has(e.target).length === 0) {

        $('.m-list-item-option').removeClass('active');
    }
});

$(document).mouseup(function(e) {

    var container = $(".admin-profile-wrapper");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.admin-user').removeClass('active');
        $('.admin-profile-wrapper').removeClass('active');
    }
});

$(document).mouseup(function(e) {

    var container = $(".table-item-menu");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.table-item-menu').removeClass('active');
    }
});

$(document).mouseup(function(e) {

    var container = $("m-list-menu");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('m-list-menu').removeClass('active');
    }
});

//Matter's modular functions ::see matter.txt for docs
$(document).on('click', '.modal-open', function(e) {

    e.preventDefault();

    var target = $(this).attr('data-target');

    modalOpen(target);
});



// OLD
$(document).on('click', '.modal-close', function(e) {

    e.preventDefault();

    modalClose();
});
// Matter modular
$(document).on('click', '[modal-close]', function(e) {

    e.preventDefault();

    modalClose();
});



// Matter Modular
$(document).on('click', '[mono-close]', function(e) {

    e.preventDefault();

    Monolog.close();
});

$(document).on('change', '.m-image-input', function() {

    if(UI.previewImage(this)) $(this).siblings().children('.drop-hint').hide();
});

//Tables
$(document).on('click', '.m-table-list-item-select-single', function(e) {

    e.preventDefault();

    if($(this).hasClass('checked')) { $('.m-table-list-item-select-all').removeClass('checked'); }

    $(this).toggleClass('checked');
});

$(document).on('click', '.m-table-list-item-select-all', function(e) {

    e.preventDefault();

    if($(this).hasClass('checked')) {

        $('.m-table-list-item-select').removeClass('checked');

    } else {

        $('.m-table-list-item-select').addClass('checked');
    }
});

$(document).on('click', '.table-item-more', function() {

    $('.table-item-menu').removeClass('active');

    $(this).siblings('.table-item-menu').addClass('active');
});

// END OF TABLES



// OLD
$(document).on('keyup', '.bind-input-from', function() {

    var text = $(this).val(), target = $(this).attr('data-target');

    text = text.trim();

    text = text.replace(/\s/g, '-');

    text = text.replace(/[&\/\\#\[\]\@\^\|\;\=\`\_,+()!$~%.'":*?<>{}]/g, '');

    text = text.toLowerCase();

    $(target).val(text);
});
// MATTER MODULAR
$(document).on('keyup', '[url-format]', function() {

    var text = $(this).val(), target = $(this).attr('data-target');

    text = text.trim();

    text = text.replace(/\s/g, '-');

    text = text.replace(/[&\/\\#\[\]\@\^\|\;\=\`\_,+()!$~%.'":*?<>{}]/g, '');

    text = text.toLowerCase();

    $(target).val(text);
});



// Old
$(document).on('keyup', '.input-number-format', function() {

    var formattedNumber = formatNumber($(this).val()),
        formattedNumber = (formattedNumber == 0 ? '' : formattedNumber);

    $(this).siblings('.number-format').html(formattedNumber);
});
// Matter Modular
$(document).on('keyup', '[number-format]', function() {

    var formattedNumber = formatNumber($(this).val()),
        formattedNumber = (formattedNumber == 0 ? '' : formattedNumber);

    $(this).siblings('.number-format').html(formattedNumber);
});



// Old
$(document).on('click', '.item-delete', function(e) {

    e.preventDefault();

    var link = $(this).attr('href');

    Monolog.confirm('Delete this item?', 'Are you sure to delete this item? This cannot be undone!',
                    function() {

        window.location.href = link;
    });
});
// Matter Modular
$(document).on('click', '[item-delete]', function() {

    var link = $(this).attr('href');

    Monolog.confirm('Delete this item?', 'Are you sure to delete this item? This cannot be undone!',
                    function() {

        window.location.href = link;
    });
});



function modalClose() {

    $('m-modal-wrapper').removeClass('active');

    $('.modal-wrapper').removeClass('active');

    $('#app-wrapper').removeClass('blur');

    $('.drop-hint').show();

    $('.m-image-preview').css({backgroundImage: ''});

    $('form')[0].reset();

    $('#edit-flag').val(0);

    $('#media-wrapper').html('');

    NProgress.done();
}

function modalOpen(id) {

    $(id).addClass('active');

    $('#app-wrapper').addClass('blur');

    NProgress.done();
}

function reload() {

    setTimeout(function(){

        NProgress.done();

        location.reload();

    }, 1000);
}

$(window).load(function() {

    $('m-caroussel-body').css({
        'height': $('m-caroussel-slide').outerHeight() + 'px'
    });
});

$(document).on('click', 'm-caroussel-switch', function(e) {

    e.preventDefault();

    var index = $(this).index(),
        slideWidth = $('m-caroussel-body').outerWidth(),
        slideHeight = $('m-caroussel-slide:nth-child(' + (index + 1) + ')').outerHeight();

    $('m-caroussel-switch').removeClass('active');
    $(this).addClass('active');

    $('m-caroussel-slider').css({
        'transform': 'translate3d(-' + (slideWidth * index) + 'px, 0, 0)'
    });

    $('m-caroussel-body').css({
        'height': slideHeight + 'px'
    });
});



// Matter Select
$(document).on('click', 'm-input[select] input', function() {

    $(this).siblings('m-select').addClass('active');
});

$(document).on('click', 'm-option', function() {

    var value = $(this).attr('value'),
        text = $(this).html();

    $(this).parent().siblings('input').val(value);

    $(this).parent().siblings('label').html(text);

    $(this).parent('m-select').removeClass('active');
});
//



// Matter List Item More Button
$(document).on('click', 'm-table-list-more', function() {

    $('m-list-menu').removeClass('active');

    $(this).children('m-list-menu').addClass('active');
});
// End of list item more button



function sortList(list, id) {

    var items = $(list + ' > li').get();

    items.sort(function(a, b) {
        var keyA = $(a).attr('data-count') * 1;
        var keyB = $(b).attr('data-count') * 1;

        if (keyA > keyB) return -1;
        if (keyA < keyB) return 1;
        return 0;
    });

    var ul = $(list);

    $.each(items, function(i, li) {
        ul.append(li);
    });
}

function hexToRgba(hex, alpha) {

    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);

    return result ? 'rgba(' + parseInt(result[1], 16) + ', ' + parseInt(result[2], 16) + ', ' + parseInt(result[3], 16) + ', ' + alpha + ')' : null;
}

function populateBlogForm(data) {

    tinymce.get('blog-content').setContent(data.content);

    $.each(data, function(k, v) {

        if(k == 'content' || k == 'image') { return true; }

        $('#blog-input-' + k).val(v);
    });

    $('#blog-content').html(data.content);

    if(data.image != '') {

        $('#blog-image-preview').css({

            backgroundImage: 'url(/media/blog/' + data.image + ')'
        });

        $('.drop-hint').hide();
    }

    $('#edit-flag').val(data.id);

    modalOpen('#blog-add');
}



function populateCustomerEdit(data) {

    $.each(data, function(k, v) {

        if(k != 'password') $('#customer-input-' + k).val(v);
    });

    modalOpen('#customer-add');

    $('#edit-flag').val(data.id);

    NProgress.done();
}

function formatNumber(input) {

    return Number(input).toLocaleString('en');
}

function consoleLog(data) {

    window.console.log(data);
}

function doNothing() {

    NProgress.done();

    return false;
}

var Module = {

    system:{

        clicker: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function'),
                    source = $(this).attr('data-source');

                // Below statement will run when button is a delete button
                if(!!$(this).attr('data-url')) {

                    Monolog.confirm('delete property', 'are you sure to delete this property? this cannot be undone', function() {

                        Ajax.get($(this).attr('data-url') + '/' + id, doNothing);
                    });

                    return false;
                }
                // Else we will run the target function
                Ajax.get(source + '/' + id, eval(func));
            });
        }
    }
}

var Matter = {

    admin: {

        dashboard: function() {

            var analyticsData;

            $(window).load(function() {
                Ajax.get('analytics/getall?metric=pageViews&from=13daysAgo&until=today', populateAnalytics);
            });

            $(window).resize(function() {
                drawAnalyticsGraphs(analyticsData);
            });

            $('#analytics-timeline').on('click', function() {

                $(this).children('.k-select-wrapper').addClass('active');
            });

            $('.k-dropdown-option').on('click', function(e) {

                e.preventDefault();

                $('.k-select-wrapper').removeClass('active');

                $('.drop-holder').html($(this).html());
            });

            $('.analytics-viewer-tab').on('click', function(e) {

                e.preventDefault();

                var index = $(this).parent().index() + 1;

                $('.analytics-viewer-head').removeClass('before1');
                $('.analytics-viewer-head').removeClass('before2');
                $('.analytics-viewer-head').removeClass('before3');
                $('.analytics-viewer-head').addClass('before' + index);
            });



            // Experimental for graph interaction
            $(document).on('mousemove', '#analytics-canvas', function(e) {

                var canvasX = $('#analytics-canvas').offset().left,
                    canvasY = $('#analytics-canvas').offset().top,
                    mouseX = e.pageX - canvasX - 32,
                    mouseY = e.pageY - canvasY;

                //if(mouseX > 0) console.log(mouseX);
            });

            function drawAnalyticsGraphs(data) {

                var dview = data.data.views,
                    canvas = document.getElementById('analytics-canvas'),
                    graphHeight = $('#statistics-data').outerHeight(),
                    graphWidth = $('#statistics-data').outerWidth(),
                    dateArray = data.data.complete.views.rows,
                    //footerHeight = $('#statistics-map').outerHeight(),
                    footerHeight = 40,
                    canvasHeight = graphHeight - footerHeight,
                    largestView = Math.max.apply(Math, dview),
                    highestPoint = largestView * 1.4,
                    dataLength = dview.length,
                    lastKey = dataLength - 1,
                    ctx = canvas.getContext("2d"),
                    backCtx = canvas.getContext("2d"),
                    ghostCtx = ctx,
                    posXI= 32,
                    segmentWidth = (graphWidth - 48) / lastKey;

                ctx.canvas.width = graphWidth;
                ctx.canvas.height = canvasHeight + 16;
                pixelsPerPoint = canvasHeight / (highestPoint * 1.4);

                ctx.font = "12px sans-serif";
                ctx.textAlign = "end";
                ctx.fillStyle = ggrey;
                var increment = 15;
                for(var i = increment; i < largestView; i += increment) {

                    ctx.strokeStyle = 'rgba(0, 0, 0, .025)';
                    ctx.beginPath();
                    ctx.moveTo(posXI, canvasHeight - ((i / highestPoint) * graphHeight));
                    ctx.lineTo(graphWidth - 16, canvasHeight - ((i / highestPoint) * graphHeight));
                    ctx.fillText(i, posXI - 8, canvasHeight - ((i / highestPoint) * graphHeight) + 5);
                    ctx.lineWidth = 1;
                    ctx.closePath();
                    ctx.stroke();
                }

                posX = posXI, i = 0;

                $.each(dview, function(day, views) {

                    if(day > 0 && (day % 2) == 0) {

                        ctx.beginPath();
                        ctx.moveTo(posX, canvasHeight);
                        ctx.lineTo(posX, 32);
                        ctx.lineWidth = 1;
                        ctx.strokeStyle = 'rgba(0, 0, 0, .05)';
                        ctx.stroke();
                    }

                    $.each(dview, function(xday, xviews) {

                        if(xday > day){
                            ctx.beginPath();
                            ctx.moveTo(posX, canvasHeight - ((views / highestPoint) * graphHeight));
                            ctx.lineTo(32 + (segmentWidth * xday), canvasHeight - ((xviews / highestPoint) * graphHeight));
                            ctx.strokeStyle = hexToRgba(gsalmon, .25);
                            ctx.lineWidth = 1;
                            ctx.stroke();
                        }
                    });

                    var randomizer = (Math.random() * (0.75 - 1.1) + 1.1).toFixed(4);

                    var months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
                        dateRaw = dateArray[day][0],
                        date = dateRaw.substring(4),
                        month = date.substring(0, 2) * 1,
                        day = date.substring(2) * 1,
                        monthAndDay = months[month - 1].toUpperCase() + ' ' + day;

                    if(views > 0 && false) {
                        ctx.beginPath();
                        ctx.moveTo(posX, canvasHeight);
                        ctx.lineTo(posX, canvasHeight - ((views / highestPoint) * graphHeight) + 4);
                        ctx.strokeStyle = hexToRgba(gsalmon, 0.4);
                        ctx.lineWidth = 2;
                        ctx.stroke();
                    }

                    //ctx.fillStyle = hexToRgba(gsalmon, (views / highestPoint) + .35);
                    ctx.fillStyle = hexToRgba(gsalmon, 1);
                    ctx.beginPath();
                    ctx.arc(posX, canvasHeight - ((views / highestPoint) * graphHeight), 4, 0, 2 * Math.PI);
                    ctx.font = "12px sans-serif";
                    ctx.textAlign = "center";
                    //if(views > 10) ctx.fillText(views, posX, canvasHeight - ((views / highestPoint) * graphHeight) - 8);
                    //ctx.fillText(views, posX, canvasHeight - ((views / highestPoint) * graphHeight) - 8);
                    ctx.closePath();
                    ctx.fill();
                    ctx.save();

                    ctx.fillStyle = ggrey;
                    ctx.beginPath();
                    ctx.font = "9px sans-serif";
                    if((i % 2) == 0) ctx.fillText(monthAndDay, posX, canvasHeight + 16);
                    ctx.closePath();
                    ctx.fill();

                    ctx.restore();
                    posX += segmentWidth;
                    i++;
                });

                function insertTops(data) {

                    var devices = '';

                    $.each(data.data, function(id, data) {
                        var htmlIn = '', totalCount = 0;
                        if(id != 'views') {

                            $.each(data, function(object, value) {

                                totalCount += (value * 1);
                            });

                            $.each(data, function(object, value) {

                                var icon = (object == 'desktop' ? 'desktop_mac' : (object == 'mobile' ? 'phone_android' : (object == 'tablet' ? 'tablet_android' : 'watch'))), dataPerc = parseFloat((value / totalCount) * 100).toFixed(2);

                                countDisplay = (value < 1000 ? value : (value < 1000000 ? (value / 1000).toFixed(1) + 'k' : (value < 1000000000 ? (value / 1000000).toFixed(1) + 'm' : value)));

                                htmlIn += '<li data-total="' + totalCount + '" data-count="' + value + '" class="flexbox"><i class="material-icons">' + icon + '</i><p class="analytics-' + id + '-name">' + object + '</p><div class="value-wrapper"><p class="analytics-' + id + '-perc">' + dataPerc + '%</p><p class="analytics-' + id + '-count">' + countDisplay + '</p></div><span style="width: ' + dataPerc + '%" class="' + id + '-bar"></span></li>';
                            });

                            $('#analytics-' + id + ' > ul').html(htmlIn);
                            sortList('#analytics-' + id + ' > ul', id);
                        }
                    });
                }
            }
        },

        inquiries: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function'),
                    source = $(this).attr('data-source'),
                    url_delete = $(this).attr('data-url');

                // Below statement will run when button is a delete button
                if(!!url_delete) {

                    Monolog.confirm('delete inquiry', 'are you sure to delete this inquiry? this cannot be undone', function() {

                        Ajax.get(url_delete + '/' + id, removeItem);
                    });

                    return false;
                }
                // Else we will run the target function
                Ajax.get(source + '/' + id, eval(func));
            });

            function removeItem(data) {

                var id = data.id;

                $('#inquiry-item-' + id).remove();

                NProgress.done();
            }

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, eval(doneFunc));
            });

            function populateInquiryEdit(data) {

                consoleLog(data);

                NProgress.done();
            }
        },

        customers: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function'),
                    source = $(this).attr('data-source'),
                    url_delete = $(this).attr('data-url');

                // Below statement will run when button is a delete button
                if(!!url_delete) {

                    Monolog.confirm('delete customer', 'are you sure to delete this customer? this cannot be undone', function() {

                        Ajax.get(url_delete + '/' + id, removeItem);
                    });

                    return false;
                }
                // Else we will run the target function
                Ajax.get(source + '/' + id, eval(func));
            });

            function removeItem(data) {

                var id = data.id;

                $('#customer-item-' + id).remove();

                NProgress.done();
            }

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, eval(doneFunc));
            });

            function populateCustomersEdit(data) {

                data = data.data;

                $.each(data, function(k,v) {

                    consoleLog(k);
                });
            }
        },

        categories: function() {

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, eval(doneFunc));
            });
        },

        properties: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function'),
                    source = $(this).attr('data-source'),
                    url_delete = $(this).attr('data-url');

                // Below statement will run when button is a delete button
                if(!!url_delete) {

                    Monolog.confirm('delete property', 'are you sure to delete this property? this cannot be undone', function() {

                        Ajax.get(url_delete + '/' + id, removeItem);
                    });

                    return false;
                }
                // Else we will run the target function
                Ajax.get(source + '/' + id, eval(func));
            });

            function removeItem(data) {

                var id = data.id;

                $('#property-item-' + id).remove();

                NProgress.done();
            }

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, eval(doneFunc));
            });

            function populatePropertyEdit(data) {

                $.each(data, function(k, v) {

                   $('#property-input-' + k).val(v);
                });

                galleryHtml = '';

                $.each(data.gallery, function(k, v) {

                    galleryHtml += '<img src="media/catalog/' + v.file + '"/>';
                });


                $('#gallery-wrapper').html(galleryHtml);

                modalOpen('#property-add');

                NProgress.done();
            }

            function populatePropertyDuplicate(data) {

                consoleLog(data);

                NProgress.done();
            }
        },

        blog: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function');

                // Below statement will run when button is a delete button
                if(!!$(this).attr('data-url')) {

                    Monolog.confirm('delete property', 'are you sure to delete this property? this cannot be undone', function() {

                        Ajax.get($(this).attr('data-url') + '/' + id, doNothing);
                    });

                    return false;
                }
                // Else we will run the target function
                eval(func + '(' + id + ')');
            });
        },

        accounts: function() {

            $(document).on('click', 'm-list-menu-item', function() {

                var id = $(this).parents('m-list-menu').attr('data-id'),
                    func = $(this).attr('data-function');

                // Below statement will run when button is a delete button
                if(!!$(this).attr('data-url')) {

                    Monolog.confirm('delete property', 'are you sure to delete this property? this cannot be undone', function() {

                        Ajax.get($(this).attr('data-url') + '/' + id, doNothing);
                    });

                    return false;
                }
                // Else we will run the target function
                eval(func + '(' + id + ')');
            });

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, doNothing);
            });

            $(document).on('click', '.role-option', function() {

                $('m-error-dialog').hide();

                if($(this).is('#super-role')) $('m-error-dialog').show();
            });
        },

        settings: function() {

            $(document).on('click', '[button]', function() {

                var func = $(this).attr('data-function');

                if(!!func) eval(func + '()');
            });

            $(document).on('change', '[checkbox] input', function() {

                var bool = $(this).is(':checked') ? 1 : 0,
                    func = $(this).closest('[checkbox]').attr('data-function');

                eval(func + '(' + bool + ')');
            });

            $(document).on('click', '[save-form]', function() {

                var form = $(this).closest('form'),
                    formId = form.attr('id'),
                    url = form.attr('data-url'),
                    doneFunc = form.attr('data-function'),
                    fd = new FormData($('#' + formId)[0]);

                Ajax.post(url, fd, eval(doneFunc));
            });

            function getGeneralInfo() {

                Ajax.get('settings/general/get', populateGeneralEdit);
            }

            function populateGeneralEdit(data) {

                $.each(data, function(k, v) {

                    $('#general-input-' + k).val(v);
                });

                modalOpen('#settings-general-form');

                NProgress.done();
            }

            function getSocialInfo() {

                Ajax.get('settings/social/get', populateSocialEdit);
            }

            function populateSocialEdit(data) {

                $.each(data, function(k, v) {

                    $('#social-input-' + k).val(v);
                });

                modalOpen('#settings-social-form');

                NProgress.done();
            }


            function autoExchangeUpdate(bool) {

                Ajax.get('settings/currency/auto/' + bool, doNothing);
            }

            function getExchangeRate() {

                Ajax.get('settings/currency/get', populateExchangeEdit);
            }

            function populateExchangeEdit(data) {

                $.each(data, function(k, v) {

                    $('#currency-input-' + k).val(v);
                });

                modalOpen('#settings-currency-form');

                NProgress.done();
            }

            function fetchConversion() {

                Monolog.confirm('fetch conversion rate?', 'Fetching conversion will replace all the conversion rates saved in the database. Proceed?',
                                function() {

                    Ajax.get('settings/currency/update', doNothing);
                });
            }

            function reindexData() {

                Monolog.confirm('are you sure?', 'Reindexing data may take up to an hour for large databases. Are you sure to reindex your data now?',
                                function() {

                    NProgress.start();

                    setTimeout(function() {

                        Monolog.notify('data reindexed', 'Your system has been reindexed successfully!');

                        NProgress.done();

                    }, 2000);
                });
            }
        }
    }
}











