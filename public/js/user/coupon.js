
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