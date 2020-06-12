$('.add_more_to_cart').on('click',function(){
// console.log(1)
    let father = $(this)
	let cart_id = $(this).attr('id_cart');
	let cart_amount = $('.value_input').val();
	let item_prices = $('.item_price').attr('value');
	var _token = $('input[name="_token"]').val();

	// console.log(item_prices)
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/Add_to_cart",
        type: "GET",
        data: {
            cart_id: cart_id,
            cart_amount: cart_amount,
            item_prices: item_prices,
        },
        success:function(data){ //dữ liệu nhận về
        	console.log(data)
        	$('.cart_value_wrapper').html(data);
            $('.add_more_to_cart').find('i').removeClass('fa-shopping-cart')
            $('.add_more_to_cart').find('i').addClass('fa-check')
            $('.add_more_to_cart').unbind();
	    },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
});