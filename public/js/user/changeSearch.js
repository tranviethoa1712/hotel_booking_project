
$(document).ready(function() {
    $("#change-search").click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var priceCurrent = $(':hidden#priceCurrent').val();
        var room_type = $(':hidden#roomType').val();
        changePriceForDates(startDate, endDate, priceCurrent);
        // $(this).text('Đã lưu (Saved)'); 
        // $(this).attr('disabled', 'disabled');
        // var id = $(this).data('id');
        var url_val = 'changSearchRoom/' + startDate + '/' + endDate + '/' + room_type;
        $.ajax({
            type: "GET",
            url: url_val,
            dataType: 'json',
            contentType: "application/json",
            data: JSON.stringify({
            flag: 'flag'
            }),
            success: function(response) {
                // console.log(response)
            }
        });
    })

    $("#quantityRoom").change(function() {
        var quantity = $("#quantityRoom").val();
        if(quantity !== '0') {
            $("#reserveWithNoRoom").css("display","none");
            $("#reserveWithRoom").css("display","block")
        } else {
            $("#reserveWithNoRoom").css("display","block");
            $("#reserveWithRoom").css("display","none")
        }
    })

    function changePriceForDates(startDate, endDate, priceCurrent)
    {
        var startDate = startDate.split('-').join('');
        var endDate = endDate.split('-').join('');
        var calcNights = endDate - startDate;
        var textCalcNight = 'Price for ' + calcNights + ' nights';
        var newPrice = priceCurrent * calcNights;
        document.getElementById('priceForNights').innerHTML = textCalcNight;
        document.getElementById('totalPrice').innerHTML = newPrice;
        document.getElementById('priceCurrentShow').innerHTML = newPrice.toFixed(3);
    }
})