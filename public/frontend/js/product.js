$(document).ready(function(){
    $("#product-discription").click(function(){
        $("#discription-box").removeClass("display");
        $("#details-box").addClass("display");
        $("#product-shipping-box").addClass("display");

    });
    $("#product-details").click(function(){
        $("#discription-box").addClass("display");
        $("#details-box").removeClass("display");
        $("#product-shipping-box").addClass("display");

    });
    $("#product-shipping").click(function(){
        $("#discription-box").addClass("display");
        $("#details-box").addClass("display");
        $("#product-shipping-box").removeClass("display");

    });
});
