
$(document).ready(function() {
    mida teha kui leht on laadunud, funktsioone selles blokis ei defineerita
    $('#main').css("color", "blue");
    $('.list').first().css({
        "color": "red",
        "font-weight": "bold",A
    });
    $('.list').get(1).css("color", "black"); //??
    $('#menu').next()("background-color" , "skyblue"); //??
    $('li').each(function(){
        $(this).css('background-color', $(this).html());
    });
    $('body').css('color'); //omaduse väärtuse hankimine
    $('body').css('color', 'blue'); //omaduse väärtuse muutmine
    $('body').css({'color': 'blue', 'margin': '30em'}); //mitme omaduse muutmiseks söödetakse meetodile omadus-väärtus paare
    $('#main').attr('id', 'peamenüü');
    $('#peamenüü').css('background-color', 'magenta');
    $('ol').each(function(){
        if ($(this).hasClass("list")){
            $(this).removeClass("list");
            $(this).addClass("nimekiri");
            $(this).toggleClass("kole");
        };
        $(this).css('background-color', $(this).html());
    });
    $('#kass').click(function(){
        $(this).remove()
    });
    $('#kass').on({
        mouseenter: function () {
            $(this).hide(1500);
            $('#tekst').toggle(1500);
        },
        mouseleave: function () {
            $(this).show(1500)
        }
    });

    $.ajax();
    $.get();
    $.post();

});
