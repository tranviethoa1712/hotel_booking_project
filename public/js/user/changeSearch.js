
$(document).ready(function() {
    $("#change-search").click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var priceCurrent = $(':hidden#priceCurrent').val();
        var room_type = $(':hidden#roomType').val();
        changePriceForDates(startDate, endDate, priceCurrent);

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
        // collect data
        var quantity = document.getElementById('quantityRoom').value;
        var NumberOfNights = document.getElementById('NumberOfNights').value;
        var priceCurrent = document.getElementById('priceCurrent').value;

        elementTotalPriceHidden = document.getElementById('totalPrice');
        elementTotalPriceShow = document.getElementById('totalPriceShow');

        // calc price
        var calcPrice = (priceCurrent * quantity * NumberOfNights) - (priceCurrent * quantity * NumberOfNights * 0.1);

        // change view
        elementTotalPriceHidden.value = calcPrice;
        elementTotalPriceShow.innerHTML = calcPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});

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
        document.getElementById('taxAndCharges').value = taxAndCharges;
        document.getElementById('NumberOfNights').value = calcNights;
        document.getElementById('totalPrice').value = newPrice;
        document.getElementById('priceForNights').innerHTML = textCalcNight;
        document.getElementById('totalPriceShow').innerHTML = newPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});      
        document.getElementById('priceCurrentShow').innerHTML = newPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});

        // change option room
        var NumberOfNights = document.getElementById('NumberOfNights').value;
        var numberOfRoomAvailable = parseInt(document.getElementById('numberOfRoomAvailable').value) + 1;

        var outletOptions = document.querySelector("#quantityRoom");

        // Remove existing options
        Array.from(outletOptions).forEach((option) => {
          outletOptions.removeChild(option)
        })
        
        // generate option array
        var newOutletOptions = [];
        for(let j = 0; j < numberOfRoomAvailable ; j++) {
            let calcP = (priceCurrent * j * NumberOfNights) - (priceCurrent * j * NumberOfNights * 0.1);
            calcP = calcP.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
            let array = [j, j + '   (' + calcP + ')'];
            newOutletOptions.push(array);
        }

        // Add new options
        newOutletOptions.map((optionData) => {
            var opt = document.createElement('option')
            opt.appendChild(document.createTextNode(optionData[1]));
            opt.value = optionData[0];
            outletOptions.appendChild(opt);
        })
    }
})