var headerBg;
var headerNav;


$(document).ready(function() {
    resizeBox();
    navBurger();
    headerBg = $('#header').css('background');
    headerNav =  $('#nav').css('top');
});

$(window).scroll(function(){

    checkScroll();         

});

/* nav burger */
function navBurger() {

    $(document).on('click', '#burger', function(){

        if($(this).hasClass('active')){
            $(this).removeClass('active');

        }else {
            $(this).addClass('active');
        }
    });
    toggleMenu();
}

/* Show the mobile menu */
function toggleMenu() {

    if($('#burger').hasClass('active')){
        $('#nav').css({
            //'display': 'block'
        });
    }else {
        $('#nav').css({
            //'display': 'none'
        });
    }

}

/* Box inherit width to height */
function resizeBox() {
    var boxHeightBox = $('#box').outerWidth(); 
    var boxHeightPlace = $('#placebox').outerWidth(); 

    $('.box').css({
        'height' : boxHeightBox
    });

    $('.place').css({
        'height' : (boxHeightPlace / 2)
    });
};


//pause video on scrollout and header css propertys 
function checkScroll() {

    var containerMain = $(".flex-box").offset().top;
    var scrollDistance = $(document).scrollTop();

    if ((containerMain - scrollDistance) <= 0) {
        $('#header').css({
            'background': 'rgba(0,162,229,0.9)',
            'height': '70px'
        });
        $('#nav').css({
            'top': '12px'
        });
        $('#logo-small').css({
            'display': 'block'
        });
        $('#logo').css({
            'display': 'none'
        });
        $('ul ul').css({
            'background': 'rgba(0, 162, 229, 0.9)'
        });
    }else {
        $('#header').css({
            'background': headerBg,
            'height': '150px'
        });
        $('#logo-small').css({
            'display': 'none'
        });
        $('#logo').css({
            'display': 'block'
        });
        $('#nav').css({
            'top': headerNav
        });
        $('ul ul').css({
            'background': 'transparent'
        });
    }
}
