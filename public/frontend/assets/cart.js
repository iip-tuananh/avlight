
function addToCart(productId) {
    const product_id = productId;
    const quantity  = $('input[name="quantity"]').val() || 1;

    $.ajax({
        url: '/add-to-cart',
        type: 'POST',
        dataType: 'json',
        data: {
            product_id: product_id,
            quantity: quantity
        },
        success: function(res) {
            if (res.success) {
                $('#cart-count').text(res.cartCount);
                toastr.success(res.message);
            } else {
                toastr.error(res.message);
            }
        },
        error: function(xhr, status, err) {
            toastr.error('Có lỗi xảy ra, vui lòng thử lại sau.');
            console.error(err);
        }
    });
}
