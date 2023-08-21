


// jQuery(document).ready(function($) {

//     // Function to update cart count
//     function updateCartCount() {
//         $.ajax({
//             type: 'POST',
//             url: cartCountAjax.ajaxurl,
//             data: {
//                 action: 'custom_remove_cart_item'
//             },
//             success: function(response) {
//                 var cart_count = response.data.count;
//                 console.log(response);
//                 // Update the cart count display on the page
//                 $('.items-count').text(cart_count);                
//                 // Update the cart count display on the page
//             }
//         });
//     }


//     // Remove item from cart
//     $('.remove').on('click', function(e) {
//         e.preventDefault();
//         var cart_item_key = $(this).data('cart-item-key');
//         var cart_item_row = $(this).closest('.cart_item');

//         $.ajax({
//             type: 'POST',
//             url: cartCountAjax.ajaxurl,
//             data: {
//                 action: 'custom_remove_cart_item',
//                 cart_item_key: cart_item_key
//             },
//             success: function(response) {
//                 console.log(response);
//                 updateCartCount();
//                 // cart_item_row.remove();
//                 // Reload the cart page or update the cart widget as needed
//             }
//         });
//     });

//     //Update item count in cart
//     // $('.update-cart').on('click', function(e) {
//     //     e.preventDefault();

//     //     $.ajax({
//     //         type: 'POST',
//     //         url: cartCountAjax.ajaxurl,
//     //         data: {
//     //             action: 'custom_update_cart_item_count'
//     //         },
//     //         success: function(response) {
//     //             updateCartCount();
//     //             // Update the cart count display on the page
//     //         }
//     //     });
//     // });




//     $(document.body).on('updated_cart_totals', function() {
//         updateCartCount();
//     });

// });


jQuery(document).ready(function($) {
    $('.download-pdf-button').on('click', function(e) {
        e.preventDefault();
        var orderId = $(this).data('order-id');
        // var nonce = custom_ajax_obj.nonce;

        $.ajax({
            type: 'POST',
            url: custom_ajax_obj.ajax_url,
            data: {
                action: 'generate_order_pdf',
                // nonce: nonce,
                order_id: orderId,
            },
            success: function(response) {
                // console.log(response);
                // var blob = new Blob([response], { type: 'application/pdf' });
                // var link = document.createElement('a');
                // link.href = window.URL.createObjectURL(blob);
                // link.download = 'order' + orderId + '.pdf';
                // link.click();
                // window.location.href = response.pdf_url;
                // Handle success, e.g., show a message
                // console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // console.log(errorThrown);
            }
        });
    });
});