$(document).on('submit','form#cart_form', function(e){
	e.preventDefault();

	let size=$(document).find('button.active').data('id');

	if (size.length==0) {
		toastr.error('Please Select A Size At First');

		return;
	}

	let url=$(this).attr('action');
	let method=$(this).attr('method');
	let data= $(this).serialize()+ '&size=' + size;

	console.log(data);
	$.ajax({
        url: url,
        method: method,
        data: data,
        success: function (res) {
        	if (res.success) {
                toastr.success(res.msg);
                if (res.view) {
                	$(document).find('div#cart_section').html(res.view);
                }

                if (res.item) {
                	$(document).find('span#cart_item_count').html(res.item);
                }
            }else{
                toastr.error(res.msg);
            }
           
        }
    });
});


$(document).on('submit','form#cart_remove_form',function (e) {
    e.preventDefault();
    var ele = $(this);
    let url=ele.attr('action');
	let method=ele.attr('method');
	let data= ele.serialize();


    if(confirm("Are you sure want to remove?")) {
        $.ajax({
	        url: url,
	        method: method,
	        data: data,
	        success: function (res) {

	        	if (res.success) {
	                toastr.success(res.msg);
	                window.location.reload();
	            }else{
	                toastr.error(res.msg);
	            }
	           
	        }
	    });
    }
});
