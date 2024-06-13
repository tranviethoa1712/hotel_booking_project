// couponElements = document.querySelectorAll('.coupon-toggle');

// for (var i = 0 ; i < couponElements.length; i++) {
//     couponElements[i].addEventListener("click", function(event) {
//         console.log('xx');
//         event.attr('disabled', 'disabled');
//     });
// }
// .addEventListener("click", function(event) {
//     console.log(event);
//     event.attr('disabled', 'disabled');
// });
$(document).ready(function() {
    $(".coupon-toggle").click(function() {
        $(this).text('Đã lưu (Saved)'); 
        $(this).attr('disabled', 'disabled');
        var id = $(this).data('id');
        console.log($(this).data('id'))
        $.ajax({
            type: "GET",
            url: 'linkCouponToUser/' + id,
            dataType: 'json',
            contentType: "application/json",
            data: JSON.stringify({
            id: $(this).data('id')
            }),
            success: function(response) {
                // success
            }
        });
    })
})