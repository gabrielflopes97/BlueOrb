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

//********** VOLTAR PARA O TOPO *********************//
$(function(){
    $('.topo').click(function(){
         $('html,body').animate({scrollTop: 0},'slow');
    });
});
// **************************************************//

//********** CHAMANDO LAYER *********************//
$(".gambirex").click(function(){
    $(".gambirrex2").show();
});
// **************************************************//

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