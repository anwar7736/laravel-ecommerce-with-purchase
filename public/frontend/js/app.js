$(document).on('click','button.add_button', function(){
    let ele=$(this).closest('div').find("input.quantity");
    var current_value=ele.val();

    if (current_value) {
        current_value++;
        ele.val(current_value);
    }
});

$(document).on('click','button.subs_button', function(){
    let ele=$(this).closest('div').find("input.quantity");
    var current_value=ele.val();

    if (current_value && current_value > 1) {
        current_value--;
        ele.val(current_value);
    }
    

});

$(document).on('click','button.subs_button, button.add_button', function(){

    let url=$(this).closest('div').attr('data-href');
    let quantity=$(this).closest('div').find("input.quantity").val();
    $.ajax({
        url: url,
        method: "GET",
        data: {quantity},
        success: function (res) {
            if (res.success) {
                toastr.success(res.msg);
                window.location.reload();
            }else{
                toastr.error(res.msg);
            }
           
        }
    });

});

$(document).on('click','button.sizebtn', function(){

    $(document).find('button.sizebtn').removeClass('active');
    $(this).addClass('active');
});