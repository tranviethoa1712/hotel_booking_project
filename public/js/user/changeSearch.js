
$(document).ready(function() {
    $("#change-search").click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var room_type = $(':hidden#roomType').val();

        var url_val = 'changeSearchRoom/' + startDate + '/' + endDate + '/' + room_type;
        $.ajax({
            type: "GET",
            url: url_val,
            dataType: 'json',
            contentType: "application/json",
            data: JSON.stringify({
            flag: 'flag'
            }),
            success: function(response) {
                var startDate = $('#startDate').val();
                var endDate = $('#endDate').val();
                console.log(response)
                $.each(response, function (key, val) {
                    let numberOfRoomAvailable = val.number_of_room - val.number_room_booked;
                    changePriceForDates(startDate, endDate, val.price, numberOfRoomAvailable, val.id)
                });
            }
        });
    })
    $("select").change(function () {
        quantityElement = $(this);
        // collect data
        var quantity = quantityElement.val();
        var parentOfElement = quantityElement.parent();
        var priceCurrent = parentOfElement.find('.priceCurrentElement').text();
        var NumberOfNights = $('#NumberOfNights').val();
        
        $(':hidden#quantityRoomInput').val(quantity);
        elementTotalPriceHidden = $('#totalPrice');
        elementTotalPriceShow = $('#totalPriceShow');
        
        // calc price
        var calcPrice = (priceCurrent * quantity * NumberOfNights) - (priceCurrent * quantity * NumberOfNights * 0.1);
        // change view
        elementTotalPriceHidden.val(calcPrice);
        elementTotalPriceShow.text(calcPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));

        if(quantity !== '0') {
            $("#reserveWithNoRoom").css("display","none");
            $("#reserveWithRoom").css("display","block")
        } else {
            $("#reserveWithNoRoom").css("display","block");
            $("#reserveWithRoom").css("display","none")
        }
    })
})

    function changePriceForDates(startDate, endDate, priceCurrent, numberOfRoomAvailable, id)
    {

        console.log($('.room-id-' + id))
        console.log(startDate)
        console.log(endDate)
        console.log(priceCurrent)
        console.log(numberOfRoomAvailable)
        var roomIdElement = $('.room-id-' + id);
        var roomIdElementParent = roomIdElement.parent();
        var priceCurrentShow = roomIdElementParent.find('.priceCurrentShow');
        console.log(priceCurrentShow)
        // collect and transfer data
        var startDate = startDate.split('-').join('');
        var endDate = endDate.split('-').join('');
        var calcNights = endDate - startDate;
        if(calcNights == 0) {
            calcNights = 1;
        }

        // calc and text data
        var textCalcNight = 'Price for ' + calcNights + ' nights';
        var taxAndCharges = priceCurrent * calcNights * 0.1;
        var newPrice = priceCurrent * calcNights - taxAndCharges;

        // change view
        $('#taxAndCharges').val(taxAndCharges)
        $('#NumberOfNights').val(calcNights);
        $('#priceForNights').text(textCalcNight);
        priceCurrentShow.text(newPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));

        // change option room
        // var NumberOfNights = $('#NumberOfNights').val();

        // numberOfRoomAvailable = parseInt(numberOfRoomAvailable) + 1;

        // var outletOptions = $("#quantityElement-" + id);

        // // Remove existing options
        // Array.from(outletOptions).forEach((option) => {
        //   outletOptions.removeChild(option)
        // })
        
        // // generate option array
        // var newOutletOptions = [];
        // for(let j = 0; j < numberOfRoomAvailable ; j++) {
        //     let calcP = (priceCurrent * j * NumberOfNights) - (priceCurrent * j * NumberOfNights * 0.1);
        //     calcP = calcP.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
        //     let array = [j, j + '   (' + calcP + ')'];
        //     newOutletOptions.push(array);
        // }

        // // Add new options
        // newOutletOptions.map((optionData) => {
        //     var opt = document.createElement('option')
        //     opt.appendChild(document.createTextNode(optionData[1]));
        //     opt.value = optionData[0];
        //     outletOptions.appendChild(opt);
        // })
    }

