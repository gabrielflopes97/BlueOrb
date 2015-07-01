/* main.js - infoservice */

function escondeMensagem() {
    $('#mensagem').css({
        'display' : 'none'
    });
}

function chamarAtencao(sender) {
    $(sender).css({
        'z-index' : '9999',
        'background' : '#0C78CF',
        'color' : '#000'
    });
}

function tirarAtencao(sender) {
    $(sender).css({
        'z-index' : 'inherit',
        'background' : 'rgba(0, 0, 0, 0.5)',
        'color' : '#fff'
    });
}
// $(function(){
// $("#btnOrca").click(function(event){
// var idElemento = $(this).attr(".panel panel-two");
// var deslocamento = $(idElemento).offset().top;
//          $("body").animate({scrollTop: deslocamento},'slow');

// });
// });

// $("a").click(function (event) {
// 3
//     event.preventDefault();
// 4
//     var idElemento = $(this).attr("href");
// 5
//     var deslocamento = $(idElemento).offset().top;
// 6
//     $('html, body').animate({ scrollTop: deslocamento }, 'slow');
// });
// ****************************************************
// JAVASCRIPT PARA MANTER O DESIGN COM FOMRATO CASCATA 
// ****************************************************

$(function() {

    // Set up vars
    var _window = $(window),
        panels = $('.panel'),
        panelsY = [];

    // Cache position of each panel
    $.each(panels, function(i, el) {
        panelsY.push(panels.eq(i).offset().top);
    });

    // Bind our function to window scroll
    _window.bind('scroll', function() {
        updateWindow();
    });

    // Update the window
    function updateWindow() {
        var y = _window.scrollTop();

        // Loop through our panel positions
        for (i = 0, l = panels.length; i < l; i++) {
            if ((i === l - 1) || (y >= panelsY[i] && y <= panelsY[i+1])) {
                break;
            }
        };

        // Update classes
        panels.not(':eq(' + i + ')').removeClass('panel-fixed');
        panels.eq(i).addClass('panel-fixed');
    };
});