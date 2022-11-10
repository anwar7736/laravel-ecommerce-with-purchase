$(document).ready(function() {

    $("#foryou").click(function(){
        $('.foryou').css(
            'display', 'block'
        );
        $('.wishlist').css(
            'display', 'none'
        );
        $('#foryou').css(
            'color', 'black'
        );
        $('#wishlist').css(
            'color', 'gray'
        );
    });
    $("#wishlist").click(function(){
        $('.wishlist').css(
            'display', 'block'
        );
        $('#wishlist').css(
            'color', 'black'
        );
        $('.foryou').css(
            'display', 'none'
        );
        $('#foryou').css(
            'color', 'gray'
        );
    });
});
