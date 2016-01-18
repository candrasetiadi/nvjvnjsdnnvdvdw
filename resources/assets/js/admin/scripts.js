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

$(window).load(function() {

    $('.input-group-caroussel-body').css({
        'height': $('.input-group-caroussel-slide').outerHeight() + 'px'
    });
});

(function(proxied) {
    window.alert = function() {

        consoleLog('Daemn son');

        return proxied.apply(this, arguments);
    };
})(window.alert);

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

$(document).mouseup(function (e) {

    var container = $(".m-list-item-option");

    if (!container.is(e.target) && container.has(e.target).length === 0) {

        $('.m-list-item-option').removeClass('active');
    }
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

$(document).mouseup(function(e) {

    var container = $(".notification-wrapper");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.mini-link-notif').removeClass('active');
        $('.notification-wrapper').removeClass('active');
    }
});

$(document).mouseup(function(e) {

    var container = $(".admin-profile-wrapper");

    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.admin-user').removeClass('active');
        $('.admin-profile-wrapper').removeClass('active');
    }
});

//Matter's modular functions ::see matter.txt for docs
$(document).on('click', '.modal-open', function(e) {

    e.preventDefault();

    var target = $(this).attr('data-target');

    modalOpen(target);
});

$(document).on('click', '.modal-close', function(e) {

    e.preventDefault();

    modalClose();
});

$(document).on('click', '#mono-close', function(e) {

    e.preventDefault();

    $('#monolog').removeClass('active');
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





$(document).on('keyup', '.bind-input-from', function() {

    var text = $(this).val(), target = $(this).attr('data-target');

    text = text.trim();

    text = text.replace(/\s/g, '-');

    text = text.replace(/[&\/\\#\[\]\@\^\|\;\=\`\_,+()!$~%.'":*?<>{}]/g, '');

    text = text.toLowerCase();

    $(target).val(text);
});

$(document).on('keyup', '.input-number-format', function() {

    var formattedNumber = formatNumber($(this).val()),
        formattedNumber = (formattedNumber == 0 ? '' : formattedNumber);

    $(this).siblings('.number-format').html(formattedNumber);
});



$(document).on('click', '.fab-button', function() {

    $('#edit-flag').attr('data-edit', 0);
});



$(document).on('click', '.direct-delete', function(e) {

    e.preventDefault();

    var link = $(this).attr('href');

    if(confirm('Are you sure to delete this item? This cannot be undone!')) {

        window.location.href = link;

    } else {

        return false;
    }
});

function modalClose() {

    var target = $(this).attr('data-target');

    $('.modal-wrapper').removeClass('active');

    $('.drop-hint').show();

    $('.m-image-preview').css({backgroundImage: ''});

    $('#app-wrapper').removeClass('blur');

    $('form')[0].reset();

    $('#edit-flag').val(0);

    $('#media-wrapper').html('');
}

function modalOpen(id) {

    $(id).addClass('active');

    $('#app-wrapper').addClass('blur');

    NProgress.done();
}

function submit(formId) {

    $(formId).submit();
}

function reload() {

    setTimeout(function(){

        NProgress.done();

        location.reload();

    }, 1000);
}

function populateAnalytics(data) {
    analyticsData = data;
    analyticsCountries = data.data.countries;
    analyticsDevices = data.data.devices;
    bounceRate = data.data.complete.bounceRate.totalsForAllResults['ga:bounceRate'] * 1;
    newUsers = data.data.complete.newUsers.totalsForAllResults['ga:newUsers'];
    pagesPerSession = data.data.complete.pagesPerSession.totalsForAllResults['ga:pageviewsPerSession'] * 1;
    avgSessionDuration = data.data.complete.sessionDuration.totalsForAllResults['ga:avgSessionDuration'] * 1;
    todayViews = data.data.complete.todayViews.totalsForAllResults['ga:pageViews'] * 1;
    drawAnalyticsGraphs(analyticsData);
    insertTops(analyticsData);

    $('#ga-output-bounce').html(bounceRate.toFixed(2) + '%');
    $('#ga-output-session').html(avgSessionDuration.toFixed(2) + 's');
    $('#ga-output-pagepersession').html(pagesPerSession.toFixed(2) + ' pages');
    $('#ga-output-newvisits').html(newUsers + ' visitors');
    $('#ga-output-today').html(todayViews);

    NProgress.done();

    var c = document.getElementById("analytics-canvas"),
        data = c.toDataURL("image/png"),
        data = data.replace('data:image/png', 'data:application/octet-stream');

    $('#image-download-demo').attr('href', data);
    $('#image-download-demo').attr('download', 'analytics-render.png');
}

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

$('.m-caroussel-switch').on('click', function(e) {
    e.preventDefault();

    var index = $(this).parent().index(),
        slideWidth = $('.input-group-caroussel-body').outerWidth(),
        slideHeight = $('.input-group-caroussel-slide:nth-child(' + (index + 1) + ')').outerHeight();

    $('.m-caroussel-switch').removeClass('active');
    $(this).addClass('active');

    $('.input-group-caroussel-slider').css({
        'transform': 'translate3d(-' + (slideWidth * index) + 'px, 0, 0)'
    });

    $('.input-group-caroussel-body').css({
        'height': slideHeight + 'px'
    });
});

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

    // Random ghost::blue
    if(true) {
        posX = posXI;

        ctx.fillStyle = hexToRgba(gblue, 0.1);
        ctx.beginPath();
        ctx.moveTo(posX, canvasHeight);

        $.each(dview, function(day, views) {
            var randomizer = (Math.random() * (0.65 - 1.05) + 1.05).toFixed(4),
                variantY = (canvasHeight - (views / highestPoint) * graphHeight) * randomizer;
            variantY = (variantY > canvasHeight ? canvasHeight : variantY);
            ctx.lineTo(posX, variantY);
            posX += segmentWidth;
        });

        ctx.lineTo(graphWidth - 16, canvasHeight);
        ctx.closePath();
        ctx.fill();
    }

    // Random ghost::green
    if(true) {
        posX = posXI;

        ctx.fillStyle = hexToRgba(ggreen, 0.1);
        ctx.beginPath();
        ctx.moveTo(posX, canvasHeight);

        $.each(dview, function(day, views) {
            var randomizer = (Math.random() * (0.75 - 1.1) + 1.1).toFixed(4),
                variantY = (canvasHeight - (views / highestPoint) * graphHeight) * randomizer;
            variantY = (variantY > canvasHeight ? canvasHeight : variantY);
            ctx.lineTo(posX, variantY);
            posX += segmentWidth;
        });

        ctx.lineTo(graphWidth - 16, canvasHeight);
        ctx.closePath();
        ctx.fill();
    }

    // Random ghost::yellow
    if(true) {
        posX = posXI;

        ctx.fillStyle = hexToRgba(gyellow, 0.1);
        ctx.beginPath();
        ctx.moveTo(posX, canvasHeight);

        $.each(dview, function(day, views) {
            var randomizer = (Math.random() * (0.75 - 1.1) + 1.1).toFixed(4),
                variantY = (canvasHeight - (views / highestPoint) * graphHeight) * randomizer;
            variantY = (variantY > canvasHeight ? canvasHeight : variantY);
            ctx.lineTo(posX, variantY);
            posX += segmentWidth;
        });

        ctx.lineTo(graphWidth - 16, canvasHeight);
        ctx.closePath();
        ctx.fill();
    }

    // Random ghost::purple
    if(true) {
        posX = posXI;

        ctx.fillStyle = hexToRgba(gpurple, 0.1);
        ctx.beginPath();
        ctx.moveTo(posX, canvasHeight);

        $.each(dview, function(day, views) {
            var randomizer = (Math.random() * (0.75 - 1.1) + 1.1).toFixed(4),
                variantY = (canvasHeight - (views / highestPoint) * graphHeight) * randomizer;
            variantY = (variantY > canvasHeight ? canvasHeight : variantY);
            ctx.lineTo(posX, variantY);
            posX += segmentWidth;
        });

        ctx.lineTo(graphWidth - 16, canvasHeight);
        ctx.closePath();
        ctx.fill();
    }

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

function postGroup() {

    postNavAdd();
}

$(document).on('keyup', '#action-search-input', function(e) {

    if(e.keyCode == 13) {

        var sTerm = $(this).val(),
            table = $(this).attr('data-table');

        Ajax.get(table + '/search/' + sTerm, eval($(this).attr('data-action')));
    }
});

function populateProductSearch(data) {

    var dataHtml = '';

    if(data.products.length == 0) {

        var action = $('.action-bar').clone();

        $('.products-wrapper').html(action);
        $('.products-wrapper').append('<p>No products matching your search</p>');

        NProgress.done();

        return false;
    }

    $.each(data.products, function(k, v) {

        var status = (v.status ? 'ENABLED' : 'DISABLED');

        dataHtml += '<tr class="product-item" data-id="' + v.id + '">';
        dataHtml += '<td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="' + v.id + '"><i class="m-checkbox"></i></a></td>';
        dataHtml += '<td class="title">' + v.title + '</td>';
        dataHtml += '<td class="sku">' + v.sku + '</td>';
        dataHtml += '<td class="created">' + v.created_at + '</td>';
        dataHtml += '<td class="views">' + v.views + '</td>';
        dataHtml += '<td class="author">' + status + '</td>';
        dataHtml += '<td class="m-table-item-options">';
        dataHtml += '<a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>';
        dataHtml += '<div class="m-list-item-option"><ul>';
        dataHtml += '<li><a href="' + v.id + '" class="product-edit">edit</a></li>';
        dataHtml += '<li><a href="' + v.id + '" class="item-duplicate">duplicate</a></li>';
        dataHtml += '<li><a href="/system/ajax/product/delete/' + v.id + '" class="item-delete direct-delete">delete</a></li>';
        dataHtml += '</ul></div></td></tr>';
    });

    $('tbody').html(dataHtml);

    if($('.back-button').length != 1) $('.action-bar').prepend('<a class="md-button md-button-plain back-button" href="/admin/products">back</a>');

    $('.load-more').hide();

    NProgress.done();
}

function populateCustomerSearch(data) {

    var dataHtml = '';

    if(data.customers.length == 0) {

        var action = $('.action-bar').clone();

        $('.customers-wrapper').html(action);
        $('.customers-wrapper').append('<p>No customers matching your search</p>');

        NProgress.done();

        return false;
    }

    $.each(data.customers, function(k, v) {

        dataHtml += '<tr class="customer-item" data-id="' + v.id + '">';
        dataHtml += '<td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="' + v.id + '"><i class="m-checkbox"></i></a></td>';
        dataHtml += '<td class="name">' + v.name + '</td>';
        dataHtml += '<td class="email">' + v.email + '</td>';
        dataHtml += '<td class="country">' + v.country + '</td>';
        dataHtml += '<td class="registered">' + v.created_at + '</td>';
        dataHtml += '<td class="status align-center">' + v.status + '</td>';
        dataHtml += '<td class="m-table-item-options">';
        dataHtml += '<a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>';
        dataHtml += '<div class="m-list-item-option" data-id="' + v.id + '"><ul>';
        dataHtml += '<li><a href="' + v.id + '" class="item-edit">edit</a></li>';
        dataHtml += '<li><a href="/system/ajax/customer/delete/' + v.id + '" class="item-delete direct-delete">delete</a></li>';
        dataHtml += '</ul></div></td></tr>';
    });

    if($('.back-button').length != 1) $('.action-bar').prepend('<a class="md-button md-button-plain back-button" href="/admin/customers">back</a>');

    $('tbody').html(dataHtml);

    NProgress.done();
}

function populateSubEdit(data) {

    $.each(data, function(k, v) {

        if(k != 'image') $('#' + k + '_input_subcat').val(v);
    });

    $('#image_input_subcat').css({backgroundImage: 'url(/media/nav/sub/' + data.image + ')'});

    $('.drop-hint').hide();

    modalOpen('#register-subcategory');

    NProgress.done();
}

function populateProductEdit(input) {

    var data = input.product;

    $('#media-input').attr('data-id', data.id);

    $.each(data, function(k, v) {

        if(k != 'data' && k != 'gallery' && k != 'sizes') $('#product-input-' + k).val(v);
    });

    $.each(data.data, function(k, v) {

        $('#product-input-' + k).val(v);
    });

    var dataHtml = '';

    $.each(data.sizes, function(k, v) {

        dataHtml += '<div class="m-input-wrapper m-input-wrapper w75-6">';
        dataHtml += '<input type="text" name="sizes_desc[]" required value="' + v.description + '">';
        dataHtml += '<label for="sizes_desc">size description</label>';
        dataHtml += '</div>';
        dataHtml += '<div class="m-input-wrapper m-input-wrapper w25-6">';
        dataHtml += '<input type="text" name="sizes_values[]" required value="' + v.value + '">';
        dataHtml += '<label for="sizes_values">size value(cm)</label>';
        dataHtml += '<a href="' + v.id + '" class="size-delete populated" style="position: absolute; top: 0; right: 0;"><i class="material-icons">close</i></a>';
        dataHtml += '</div>';
    });

    $('#size-container').html(dataHtml);

    $('.input-group-caroussel-body').css({
        'height': $('#caroussel-general').outerHeight() + 'px'
    });


    $('#media-wrapper').html('');
    $.each(data.gallery, function(k, v) {

        dataHtml = '';

        dataHtml += '<div class="gallery-item background" id="media-' + v.id + '" style="background-image: url(\'/media/catalog/' + v.file + '\')">';
        dataHtml += '<div class="flexbox justify-end product-media-options">';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons" style="font-size: 20px;">star_border</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_left</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_right</i></a>';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-delete"><i class="material-icons" style="font-size: 22px;">close</i></a>';
        dataHtml += '<div></div>';

        $('#media-wrapper').append(dataHtml);
    });


    // Populate category select
    dataHtml = '<select id="product-input-category_id" name="category" required>';
    dataHtml += '<option value="-" selected disabled>Select a category</option>';
    $.each(input.categories, function(k, v) {

        selected = (data.category_id == v.id ? ' selected' : '');

        dataHtml += '<option value="' + v.id + '"' + selected + '>' + v.data.title + '</option>';

    });

    dataHtml += '</select>';
    dataHtml += '<label for="category">category</label>';

    $('#category-select-wrapper').html(dataHtml);
    // End of populate category select


    // Populate subcategory select
    dataHtml = '<select id="product-input-subcategory_id" name="subcategory" required>';
    dataHtml += '<option value="-" selected disabled>Select a subcategory</option>';
    $.each(input.subcategories, function(k, v) {

        selected = (data.subcategory_id == v.id ? ' selected' : '');

        dataHtml += '<option value="' + v.id + '"' + selected + '>' + v.data.title + '</option>';
    });

    dataHtml += '</select>';
    dataHtml += '<label for="subcategory">subcategory</label>';

    $('#subcategory-select-wrapper').html(dataHtml);
    // End of populate subcategory select

    $('#edit-flag').val(data.id);

    modalOpen('#product-add');

    $('.product-caroussel-switch').removeClass('active');

    $('.caroussel-switch > li:first-child > .product-caroussel-switch').addClass('active');

    $('.input-group-caroussel-slider').css({
        'transform': 'translate3d(0, 0, 0)'
    });

    $('#product-input-url').val(data.url);

    NProgress.done();
}

function populateProductDuplicate(input) {

    var data = input.product;

    $('#media-input').attr('data-id', data.id);

    $.each(data, function(k, v) {

        if(k != 'data' && k != 'gallery' && k != 'sizes') $('#product-input-' + k).val(v);
    });

    $.each(data.data, function(k, v) {

        $('#product-input-' + k).val(v);
    });

    var dataHtml = '';

    $.each(data.sizes, function(k, v) {

        dataHtml += '<div class="m-input-wrapper m-input-wrapper w75-6">';
        dataHtml += '<input type="text" name="sizes_desc[]" required value="' + v.description + '">';
        dataHtml += '<label for="sizes_desc">size description</label>';
        dataHtml += '</div>';
        dataHtml += '<div class="m-input-wrapper m-input-wrapper w25-6">';
        dataHtml += '<input type="text" name="sizes_values[]" required value="' + v.value + '">';
        dataHtml += '<label for="sizes_values">size value(cm)</label>';
        dataHtml += '</div>';
    });

    $('#size-container').html(dataHtml);

    $('.input-group-caroussel-body').css({
        'height': $('#caroussel-general').outerHeight() + 'px'
    });


    $('#media-wrapper').html('');
    $.each(data.gallery, function(k, v) {

        dataHtml = '';

        dataHtml += '<div class="gallery-item background" id="media-' + v.id + '" style="background-image: url(\'/media/catalog/' + v.file + '\')">';
        dataHtml += '<div class="flexbox justify-end product-media-options">';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons" style="font-size: 20px;">star_border</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_left</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_right</i></a>';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-delete"><i class="material-icons" style="font-size: 22px;">close</i></a>';
        dataHtml += '<div></div>';

        $('#media-wrapper').append(dataHtml);
    });


    // Populate category select
    dataHtml = '<select id="product-input-category_id" name="category" required>';
    dataHtml += '<option value="-" selected disabled>Select a category</option>';
    $.each(input.categories, function(k, v) {

        selected = (data.category_id == v.id ? ' selected' : '');

        dataHtml += '<option value="' + v.id + '"' + selected + '>' + v.data.title + '</option>';

    });

    dataHtml += '</select>';
    dataHtml += '<label for="category">category</label>';

    $('#category-select-wrapper').html(dataHtml);
    // End of populate category select


    // Populate subcategory select
    dataHtml = '<select id="product-input-subcategory_id" name="subcategory" required>';
    dataHtml += '<option value="-" selected disabled>Select a subcategory</option>';
    $.each(input.subcategories, function(k, v) {

        selected = (data.subcategory_id == v.id ? ' selected' : '');

        dataHtml += '<option value="' + v.id + '"' + selected + '>' + v.data.title + '</option>';

    });

    dataHtml += '</select>';
    dataHtml += '<label for="subcategory">subcategory</label>';

    $('#subcategory-select-wrapper').html(dataHtml);
    // End of populate subcategory select

    $('#edit-flag').val(0);

    modalOpen('#product-add');

    $('.product-caroussel-switch').removeClass('active');

    $('.caroussel-switch > li:first-child > .product-caroussel-switch').addClass('active');

    $('.input-group-caroussel-slider').css({
        'transform': 'translate3d(0, 0, 0)'
    });

    $('#save-product').addClass('disabled');

    NProgress.done();
}

function populateCategorySelect(data) {

    $('#category-select-wrapper').html('');

    dataHtml = '<select class="category-select" id="product-input-category_id" name="category" required>';
    dataHtml += '<option value="-" selected disabled>Select a category</option>';

    $.each(data.categories, function(k, v) {

        dataHtml += '<option value="' + v.id + '">' + v.data.title + '</option>';
    });

    dataHtml += '</select>';
    dataHtml += '<label for="category">category</label>';

    $('#category-select-wrapper').html(dataHtml);

    NProgress.done();
}

function populateSubcategorySelect(data) {

    $('#subcategory-select-wrapper').html('');

    dataHtml = '<select class="subcategory-select" id="product-input-subcategory_id" name="subcategory" required>';
    dataHtml += '<option value="-" selected disabled>Select a subcategory</option>';

    $.each(data.subcategories, function(k, v) {

        dataHtml += '<option value="' + v.id + '">' + v.data.title + '</option>';
    });

    dataHtml += '</select>';
    dataHtml += '<label for="subcategory">subcategory</label>';

    $('#subcategory-select-wrapper').html(dataHtml);

    NProgress.done();
}



function populateCustomerEdit(data) {

    $.each(data, function(k, v) {

        if(k != 'password') $('#customer-input-' + k).val(v);
    });

    modalOpen('#customer-add');

    $('#edit-flag').val(data.id);

    NProgress.done();
}



function populateProjectEdit(data) {

    $('#media-input').attr('data-id', data.id);

    $('#project-input-title').val(data.title);

    $('#project-input-year').val(data.year);

    $('#project-input-description').val(data.description);

    $('#media-wrapper').html('');
    $.each(data.pictures, function(k, v) {

        dataHtml = '';

        dataHtml += '<div class="gallery-item background" id="media-' + v.id + '" style="background-image: url(\'/media/projects/' + v.file + '\')">';
        dataHtml += '<div class="flexbox justify-end project-media-options">';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option project-gallery-delete"><i class="material-icons" style="font-size: 22px;">close</i></a>';
        dataHtml += '<div></div>';

        $('#media-wrapper').append(dataHtml);
    });

    modalOpen('#project-add');

    $('#edit-flag').val(data.id);

    NProgress.done();
}



function populateAwardEdit(data) {

    $('#award-input-title').val(data.title);

    $('#award-input-year').val(data.year);

    $('#award-input-month').val(data.month);

    $('#award-input-desc').val(data.description);

    modalOpen('#award-add');

    $('#edit-flag').val(data.id);

    NProgress.done();
}


imageToRemove = '';

function removeProductMedia(data) {

    if(typeof data.product_id != 'undefined') $('#media-' + data.product_id).remove();
    if(typeof data.project_id != 'undefined') $('#media-' + data.project_id).remove();

    $('.input-group-caroussel-body').css({
        'height': $('#caroussel-gallery').outerHeight() + 'px'
    });

    NProgress.done();
}

function showUploadedImages(data) {

    $('#media-wrapper').html('');

    var folder = (typeof data.projects != 'undefined' ? 'projects' : 'catalog');

    $.each(data.picture, function(k, v) {

        dataHtml = '';

        dataHtml += '<div class="gallery-item background" id="media-' + v.id + '" style="background-image: url(' + "'" + '/media/' + folder + '/' + v.file + "'" + ')">';
        dataHtml += '<div class="flexbox justify-end product-media-options">';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-star"><i class="material-icons" style="font-size: 20px;">star_border</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_left</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_right</i></a>';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-delete"><i class="material-icons" style="font-size: 22px;">close</i></a>';
        dataHtml += '<div></div>';

        $('#media-wrapper').append(dataHtml);
    });

    $('.input-group-caroussel-body').css({
        'height': $('#caroussel-gallery').outerHeight() + 'px'
    });

    NProgress.done();
}

function showUploadedProjectsImages(data) {

    $('#media-wrapper').html('');

    $.each(data.picture, function(k, v) {

        dataHtml = '';

        dataHtml += '<div class="gallery-item background" id="media-' + v.id + '" style="background-image: url(' + "'" + '/media/projects/' + v.file + "'" + ')">';
        dataHtml += '<div class="flexbox justify-end product-media-options">';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-star"><i class="material-icons" style="font-size: 20px;">star_border</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_left</i></a>';
        //        dataHtml += '<a href="' + v.id + '" class="gallery-item-option"><i class="material-icons">chevron_right</i></a>';
        dataHtml += '<a href="' + v.id + '" class="gallery-item-option product-gallery-delete"><i class="material-icons" style="font-size: 22px;">close</i></a>';
        dataHtml += '<div></div>';

        $('#media-wrapper').append(dataHtml);
    });

    $('.input-group-caroussel-body').css({
        'height': $('#caroussel-gallery').outerHeight() + 'px'
    });

    NProgress.done();
}

function postCategory() {

    postNavAdd();
}

function formatNumber(input) {

    return Number(input).toLocaleString('en');
}

function postSubcategory() {

    postNavAdd();
}

function postNavAdd() {

    modalClose();

    setTimeout(function(){

        location.reload();

    }, 500);
}

function consoleLog(data) {

    window.console.log(data);
}

function doNothing() {

    NProgress.done();

    return false;
}

var Matter = {

    admin: {

        enquiries: function(){

            $(document).on('click', '.enquiry-view', function(e) {

                e.preventDefault();

                var id = $(this).attr('href');

                Ajax.get('enquiry/get/' + id, populateEnquiryView);
            });


            function populateEnquiryView(data) {

                var dataHtml = '';

                $.each(data, function(k, v) {

                    if(k == 'created_at' || k == 'id' || k == 'content' || k == 'customer' || k == 'customer_id' || k == 'deleted_at' || k == 'price' || k == 'shipping_price' || k == 'shipping_time' || k == 'status' || k == 'updated_at' || k == 'cart' || k == 'note') return true;
                    dataHtml += '<div class="m-input-wrapper m-input-wrapper w25-9">';
                    dataHtml += '<input type="text" name="' + k + '" id="enquiry-' + k + '" required disabled value="' + v + '">';
                    dataHtml += '<label for="' + k + '"style="top: -6px; font-size: 10px; color: #323232; font-weight: 800;">' + k + '</label>';
                    dataHtml += '</div>';
                });

                dataHtml += '<div class="m-input-wrapper m-input-wrapper fwidth">';
                dataHtml += '<textarea name="note" id="enquiry-notes" row="5" required disabled style="height: 96px;">' + data.note + '</textarea>';
                dataHtml += '<label for="note"style="top: -6px; font-size: 10px; color: #323232; font-weight: 800;">note</label>';
                dataHtml += '</div>';
                dataHtml += '<h3>Items:</h3>';

                dataHtml += '<div class="flexbox fwidth">';
                dataHtml += '<p style="width: 40%; position: relative; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #6f6f6f;">title</p>';
                dataHtml += '<p style="width: 25%; position: relative; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #6f6f6f;"">description</p>';
                dataHtml += '<p style="width: 25%; position: relative; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #6f6f6f;"">size(cm)</p>';
                dataHtml += '<p style="width: 10%; position: relative; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #6f6f6f;"">quantity</p>';
                dataHtml += '</div>';

                $.each(data.cart, function(k, v) {

                    dataHtml += '<div class="flexbox fwidth">';
                    dataHtml += '<p style="width: 40%;">' +  v.product.title + '</p>';
                    dataHtml += '<p style="width: 25%;">' +  v.size.description + '</p>';
                    dataHtml += '<p style="width: 25%;">' +  v.size.value + '</p>';
                    dataHtml += '<p style="width: 10%;">' +  v.qty + '</p>';
                    dataHtml += '</div>';
                });

                $('#enquiry-viewer').html(dataHtml);

                if(data.status == 0) {

                    $('#enquiry-replied').removeClass('md-button-red');

                    $('#enquiry-replied').addClass('md-button-blue');

                    $('#enquiry-replied').html('mark as replied');

                    $('#enquiry-replied').attr('href', '/system/ajax/enquiry/tag/' + data.id);

                } else {

                    $('#enquiry-replied').removeClass('md-button-blue');

                    $('#enquiry-replied').addClass('md-button-red');

                    $('#enquiry-replied').html('mark as open');

                    $('#enquiry-replied').attr('href', '/system/ajax/enquiry/untag/' + data.id);
                }

                $('#enquiry-email-button').attr('href', 'mailto:' + data.customer.email);

                modalOpen('#enquiry-view');

                NProgress.done();
            }
        },

        customers: function(){

            $('.customer-caroussel-switch').on('click', function(e) {
                e.preventDefault();

                var index = $(this).parent().index(),
                    slideWidth = $('.input-group-caroussel-body').outerWidth(),
                    slideHeight = $('.input-group-caroussel-slide:nth-child(' + (index + 1) + ')').outerHeight();

                $('.customer-caroussel-switch').removeClass('active');
                $(this).addClass('active');

                $('.input-group-caroussel-slider').css({
                    'transform': 'translate3d(-' + (slideWidth * index) + 'px, 0, 0)'
                });

                $('.input-group-caroussel-body').css({
                    'height': slideHeight + 'px'
                });
            });

            $('#save-customer').on('click', function(e) {

                e.preventDefault();

                var fd = new FormData($('#customer-form')[0]);

                Ajax.post('customer/create', fd, reload);
            });

            $(document).on('click', '.item-edit', function(e) {

                e.preventDefault();

                var id = $(this).attr('href');

                Ajax.get('customer/get/' + id, populateCustomerEdit);
            });
        },

        products: function(){

            $(document).on('click', '.load-more', function(e) {

                e.preventDefault();

                $('.load-more').html('LOADING MORE PRODUCTS..');

                var start = $(this).attr('data-start'), limit = $(this).attr('data-limit');

                Ajax.get('productsRange?start=' + start + '&limit=' + limit, populateMoreProducts);
            });

            function populateMoreProducts(data) {

                dataHtml = '';

                $.each(data.products, function(k, v) {

                    status = (v.status == 1 ? 'ENABLED' : 'DISABLED');
                    dataHtml += '<tr class="product-item" data-id="' + v.id + '">';
                    dataHtml += '<td class="select"><a href class="m-table-item-select m-table-item-select-single" data-id="' + v.id + '"><i class="m-checkbox"></i></a></td>';
                    dataHtml += '<td class="title">' + v.title + '</td>';
                    dataHtml += '<td class="sku align-center">' + v.sku + '</td>';
                    dataHtml += '<td class="created align-center">' + v.created_at + '</td>';
                    dataHtml += '<td class="status align-center">' + status + '</td>';
                    dataHtml += '<td class="m-table-item-options">';
                    dataHtml += '<a href class="m-list-item-more"><i class="material-icons">more_horiz</i></a>';
                    dataHtml += '<div class="m-list-item-option"><ul>';
                    dataHtml += '<li><a href="' + v.id + '" class="item-edit">edit</a></li>';
                    dataHtml += '<li><a href="' + v.id + '" class="item-duplicate">duplicate</a></li>';
                    dataHtml += '<li><a href="/system/ajax/product/delete/' + v.id + '" class="item-delete direct-delete">delete</a></li>';
                    dataHtml += '</ul></div></td></tr>';

                });

                start = $('.load-more').attr('data-start');

                start = start * 1;

                $('.load-more').attr('data-start', start + 1);

                $('tbody').append(dataHtml);

                $('.load-more').html('LOAD MORE');

                NProgress.done();
            }

            $(document).on('change', '#product-input-group_id', function() {

                var category = $(this).val();

                $('#category-select-wrapper').html('');

                $('#subcategory-select-wrapper').html('');

                Ajax.get('category/getByParent/' + category, populateCategorySelect);
            });

            $(document).on('change', '#product-input-category_id', function() {

                var subcategory = $(this).val();

                $('#subcategory-select-wrapper').html('');

                Ajax.get('subcategory/getByParent/' + subcategory, populateSubcategorySelect);
            });

            $(document).on('click', '.item-edit', function(e) {

                e.preventDefault();

                var id = $(this).attr('href'),
                    product = Ajax.get('product/get/' + id, populateProductEdit);
            });

            $(document).on('click', '.item-duplicate', function(e) {

                e.preventDefault();

                var id = $(this).attr('href'),
                    product = Ajax.get('product/get/' + id, populateProductDuplicate);
            });

            $('.product-caroussel-switch').on('click', function(e) {
                e.preventDefault();

                var index = $(this).parent().index(),
                    slideWidth = $('.input-group-caroussel-body').outerWidth(),
                    slideHeight = $('.input-group-caroussel-slide:nth-child(' + (index + 1) + ')').outerHeight();

                $('.product-caroussel-switch').removeClass('active');
                $(this).addClass('active');

                $('.input-group-caroussel-slider').css({
                    'transform': 'translate3d(-' + (slideWidth * index) + 'px, 0, 0)'
                });

                $('.input-group-caroussel-body').css({
                    'height': slideHeight + 'px'
                });
            });

            $('#save-product').on('click', function(e) {

                e.preventDefault();

                var fd = new FormData($('#product-form')[0]);

                Ajax.post('product/create', fd, reload);
            });

            function postProductAdd() {

                NProgress.done();

                modalClose();
            }

            $(document).on('click', '.product-gallery-delete', function(e) {

                e.preventDefault();

                var images = $('.product-gallery-delete').length,
                    id = $(this).attr('href'), imageToRemove = $(this);

                if(images == 1) {

                    alert('please add more pictures before deleting the last image of this product!');

                    return false;
                }

                if(confirm('Are you sure to remove this image from the associated product and storage? This cannot be undone!')) {

                    Ajax.get('productimage/delete/' + id, removeProductMedia);

                } else {

                    return false;
                }
            });

            $(document).on('click', '#size-add', function(e) {

                e.preventDefault();

                var dataHtml = '';

                dataHtml += '<div class="m-input-wrapper m-input-wrapper w75-6">';
                dataHtml += '<input type="text" name="sizes_desc[]" class="bind-input-from" data-target="#product-input-url" required>';
                dataHtml += '<label for="size_desc_1">size description</label>';
                dataHtml += '</div>';

                dataHtml += '<div class="m-input-wrapper m-input-wrapper w25-6">';
                dataHtml += '<input type="text" name="sizes_values[]" class="bind-input-from" data-target="#product-input-url" required>';
                dataHtml += '<label for="size_value_1">size value(cm)</label>';
                dataHtml += '<a href class="size-delete" style="position: absolute; top: 0; right: 0;"><i class="material-icons">close</i></a>';
                dataHtml += '</div>';

                $('#size-container').append(dataHtml);

                $('.input-group-caroussel-body').css({
                    'height': $('#caroussel-properties').outerHeight() + 'px'
                });
            });

            $(document).on('click', '.size-delete', function(e) {

                e.preventDefault();

                consoleLog($('.size-delete').length);

                if($('.populated').length == 1) {

                    alert('Cannot delete last size of this item. Add more sizes before deleting this one.');

                    return false;
                }

                var size_id = $(this).attr('href');

                $(this).parent().prev().remove();
                $(this).parent().remove();

                if($(this).hasClass('populated')) {
                    if($('#edit-flag').val() != 0) {

                        Ajax.get('productsize/delete/' + size_id, doNothing);
                    }
                }
            });

            $(document).on('change', '#media-input', function() {

                if($('#edit-flag').val() != 0) {

                    NProgress.start();

                    fd = new FormData($("#product-form")[0]);

                    fd.append('product_id', $(this).attr('data-id'));

                    Ajax.post('productimage/add', fd, showUploadedImages);
                }
            });
        },

        pdf: function(){

            $('#save-pdf').on('click', function(e) {

                e.preventDefault();

                fd = new FormData($('#pdf-form')[0]);

                Ajax.post('pdf/create', fd, reload);
            });
        },

        awards: function(){

            $('#save-award').on('click', function(e) {

                e.preventDefault();

                fd = new FormData($('#award-form')[0]);

                Ajax.post('award/create', fd, reload);
            });

            $('.item-edit').on('click', function(e) {

                e.preventDefault();

                var id = $(this).attr('href'),
                    product = Ajax.get('award/get/' + id, populateAwardEdit);
            });
        },

        homeslide: function(){

            $('#save-homeslide').on('click', function(e) {

                e.preventDefault();

                fd = new FormData($('#homeslide-form')[0]);

                Ajax.post('homeslide/create', fd, reload);
            });
        },

        projects: function(){

            $('#save-project').on('click', function(e) {

                e.preventDefault();

                fd = new FormData($('#project-form')[0]);

                Ajax.post('project/create', fd, reload);
            });

            $('.item-edit').on('click', function(e) {

                e.preventDefault();

                var id = $(this).attr('href');

                Ajax.get('project/retrieve/' + id, populateProjectEdit);
            });

            $(document).on('click', '.project-gallery-delete', function(e) {

                e.preventDefault();

                var id = $(this).attr('href');

                if(confirm('Are you sure to remove this image from the associated project? This cannot be undone!')) {

                    Ajax.get('projectimage/delete/' + id, removeProductMedia);

                } else {

                    return false;
                }
            });

            $(document).on('change', '#media-input', function() {

                if($('#edit-flag').val() != 0) {

                    NProgress.start();

                    fd = new FormData($("#project-form")[0]);

                    fd.append('project_id', $(this).attr('data-id'));

                    Ajax.post('projectimage/add', fd, showUploadedImages);
                }
            });
        },

        blog: function() {

            $(document).on('click', '.item-edit', function(e) {

                e.preventDefault();

                var id = $(this).attr('href');

                Ajax.get('blog/retrieve/' + id, populateBlogForm);
            });

            tinymce.init({
                selector: 'textarea',
                setup : function(ed) {
                    ed.on('init', function()
                          {
                        $(ed.getBody()).on('blur', function(e) {

                            //$('#expandable-textarea').removeClass('compress');
                        });
                        $(ed.getBody()).on('focus', function(e) {

                            $('#expandable-textarea').addClass('compress');
                        });
                    });
                    ed.on('change', function () {

                        //$("#blog-content").html(tinymce.activeEditor.getContent({format : 'raw'}));
                    });
                }
            });

            $(document).mouseup(function (e) {

                var container = $("#blog-form");

                if (!container.is(e.target) && container.has(e.target).length === 0) {

                    $('#expandable-textarea').removeClass('compress');
                }
            });

            $(document).mouseup(function (e) {

                var container = $(".blog-item-option");

                if (!container.is(e.target) && container.has(e.target).length === 0) {

                    $('.blog-item-option').removeClass('active');
                }
            });

            $(document).on('click', '#close-blog-form', function(e) {

                e.preventDefault();

                $('#blog-form')[0].reset();
                $('#blog-content').html('');
                $('.drop-hint').show();
                $('#blog-image-preview').css({
                    backgroundImage: 'url(' + e.target.result + ')'
                });
            });

            $(document).on('click', '#save-blog', function(e) {

                e.preventDefault();

                tinymce.triggerSave();

                fd = new FormData($('#blog-form')[0]);

                Ajax.post('blog/create', fd, reload);
            });
        },

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
        },

        categories: function() {

            $(document).on('change', '#group-select', function() {

                var group = $(this).val();

                $('#category-select-wrapper').html('');

                $('#subcategory-select-wrapper').html('');

                Ajax.get('category/getByParent/' + group, populateCategoryColumn);
            });

            $(document).on('change', '#category-select', function() {

                var category = $(this).val();

                $('#subcategory-select-wrapper').html('');

                Ajax.get('subcategory/getByParent/' + category, populateSubcategoryColumn);
            });

            function populateCategoryColumn(data) {

                dataHtml = '<li><div class="m-input-wrapper m-input-wrapper-select" style="margin-top: 32px; margin-bottom: 0;">';
                dataHtml += '<select id="category-select" name="category" required>';
                dataHtml += '<option value="-" disabled selected>category</option>';

                $.each(data.categories, function(k, v){

                    dataHtml += '<option value="' + v.id + '">' + v.data.title + '</option>';
                });

                dataHtml += '</select>';
                dataHtml += '<label for="category">category</label>';
                dataHtml += '</div>';
                dataHtml += '<li class="md-li align-right">';
                dataHtml += '<a href="' + data.group_id + '" class="add-category modal-open" id="edit-category"><i class="material-icons">mode_edit</i></a>';
                dataHtml += '<a href class="add-category modal-open" data-target="#register-category"><i class="material-icons">add</i></a>';
                dataHtml += '</li>';

                $('#category-select-wrapper').html(dataHtml);

                $('#group-id').val(data.group_id);

                NProgress.done();
            }

            function populateSubcategoryColumn(data) {

                dataHtml = '<li><div class="m-input-wrapper m-input-wrapper-select" style="margin-top: 32px; margin-bottom: 0;">';
                dataHtml += '<select id="subcategory-select" name="subcategory" required>';
                dataHtml += '<option value="-" disabled selected>subcategory</option>';

                $.each(data.subcategories, function(k, v){

                    dataHtml += '<option value="' + v.id + '">' + v.data.title + '</option>';
                });

                dataHtml += '</select>';
                dataHtml += '<label for="subcategory">subcategory</label>';
                dataHtml += '</div>';
                dataHtml += '<li class="md-li align-right">';
                dataHtml += '<a href="' + data.category_id + '" class="add-subcategory modal-open" id="edit-subcategory"><i class="material-icons">mode_edit</i></a>';
                dataHtml += '<a href class="add-subcategory modal-open" data-target="#register-subcategory"><i class="material-icons">add</i></a>';
                dataHtml += '</li>';

                $('#subcategory-select-wrapper').html(dataHtml);

                $('#category-id').val(data.category_id);

                NProgress.done();
            }

            $(document).on('click', '#edit-group', function(e) {

                e.preventDefault();

                var id = $('#group-select').val();

                Ajax.get('group/get/' + id, populateGroupEdit);
            });

            function populateGroupEdit(data) {

                $.each(data.data, function(k, v) {

                    if(k != 'image') $('#group-input-' + k).val(v);
                });

                $('#image_input_group').css({
                    backgroundImage: 'url(/media/group/' + data.thumbnail + ')'
                });

                $('.drop-hint').hide();

                $('#group-edit-flag').val(data.id);

                modalOpen('#register-group');

                NProgress.done();
            }

            $(document).on('click', '#edit-category', function(e) {

                e.preventDefault();

                var id = $('#category-select').val();

                Ajax.get('category/get/' + id, populateCategoryEdit);
            });

            function populateCategoryEdit(data) {

                $.each(data.data, function(k, v) {

                    if(k != 'image') $('#category-input-' + k).val(v);
                });

                $('#image_input_category').css({
                    backgroundImage: 'url(/media/categories/' + data.thumbnail + ')'
                });

                $('.drop-hint').hide();

                $('#category-edit-flag').val(data.id);

                modalOpen('#register-category');

                NProgress.done();
            }

            $(document).on('click', '#edit-subcategory', function(e) {

                e.preventDefault();

                var id = $('#subcategory-select').val();

                Ajax.get('subcategory/get/' + id, populateSubcategoryEdit);
            });

            function populateSubcategoryEdit(data) {

                $.each(data.data, function(k, v) {

                    if(k != 'image') $('#subcategory-input-' + k).val(v);
                });

                $('#image_input_subcategory').css({
                    backgroundImage: 'url(/media/subcategories/' + data.thumbnail + ')'
                });

                $('.drop-hint').hide();

                $('#subcategory-edit-flag').val(data.id);

                modalOpen('#register-subcategory');

                NProgress.done();
            }

            $(document).on('click', '#save-group', function(e) {

                e.preventDefault();

                fd = new FormData($('#group-create-form')[0]);

                Ajax.post('categories/creategroup', fd, reload);
            });

            $(document).on('click', '#save-category', function(e) {

                e.preventDefault();

                fd = new FormData($('#category-create-form')[0]);

                Ajax.post('categories/createcategory', fd, reload);
            });

            $(document).on('click', '#save-subcategory', function(e) {

                e.preventDefault();

                fd = new FormData($('#subcategory-create-form')[0]);

                Ajax.post('categories/createsubcategory', fd, reload);
            });
        },

        pages: function() {

            $('.fab-button-action').on('click', function(e) {

                e.preventDefault();

                if($(this).hasClass('active')) {

                    $(this).removeClass('active');

                } else {

                    $(this).addClass('active');
                }
            });
        },

        settings: function() {

        }
    }
}












