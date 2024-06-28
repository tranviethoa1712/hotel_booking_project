
$(document).ready(function() {
    $("#change-search").click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var room_type = $('.roomType').text();

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
                $('#startDateHidden').val(startDate);
                $('#endDateHidden').val(startDate);
                //remove all tr tag in tbody
                $('#tableBody').find('tr').remove();
                if(response) {
                    $.each(response, function (key, val) {
                    let numberOfRoomAvailable = (val.number_of_room - val.number_room_booked) + 1;
                    changePriceForDates(startDate, endDate, val.price, numberOfRoomAvailable, val.id, val);
                    });
                } else {
                    var fullRoomDiv = $('<div/>');
                    fullRoomDiv.attr('class', 'fs-3 text-center').text(response);
                    let viewTr = $('<tr/>');
                    viewTr.append(fullRoomDiv.get(0).outerHTML);
                    $('#tableBody').append(viewTr.get(0).outerHTML);
                }
            }
        });
    })

    // use voucher
    $(".btn-use-voucher").click(function() {
        // collect data
        var parentThis = $(this).parent();
        var valueType = parentThis.find('.value-type');
        var amountCoupon = parentThis.find('.amount');
        var vouhcerId = parentThis.find('.vouhcer-id');
        var totalPriceDiv = $('.totalPriceHidden').text(); 
        var updateTotalPrice = '';
        
        // find same class element and enable
        // $('.modal-body-voucher').find(".btn-use-voucher").not($(this)).attr('disabled', false);
        $('.btn-use-voucher').prop("disabled", false).not($(this));
        // update data
        if(valueType.text() == 'percentage') {
            amountCoupon = (amountCoupon.text() / 100) * totalPriceDiv;
            updateTotalPrice = totalPriceDiv - amountCoupon;

             // update
            $(':hidden#totalPrice').val(parseInt(updateTotalPrice));
            $(':hidden#voucherIdUsed').val(vouhcerId.text());
            $('#totalPriceShow').text(updateTotalPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        } else if(valueType.text() == 'numeric') {
            updateTotalPrice = totalPriceDiv - amountCoupon.text();

             // update
            $(':hidden#totalPrice').val(parseInt(updateTotalPrice));
            $(':hidden#voucherIdUsed').val(vouhcerId.text());            
            $('#totalPriceShow').text(updateTotalPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        }
        $(this).attr('disabled', 'disabled');
    });
    
    $(".quantityElement").change(function () {
        quantityElement = $(this);
        // collect data
        var quantity = quantityElement.val();
        var parentOfElement = quantityElement.parent();
        var priceCurrent = parentOfElement.find('.priceCurrentElement').text();
        var NumberOfNights = $('#NumberOfNights').val();
        
        $(':hidden#quantityRoomInput').val(quantity);
        var elementTotalPriceHidden = $('#totalPrice');
        var elementTotalPriceHiddenDiv = $('.totalPriceHidden');
        var elementtotalPriceNoVoucher = $('#totalPriceNoVoucher');
        var elementTotalPriceShow = $('#totalPriceShow');

        // calc price 
        var calcPrice = (priceCurrent * quantity * NumberOfNights) + (priceCurrent * quantity * NumberOfNights * 0.1);
        // change view
        elementTotalPriceHidden.val(calcPrice);

        elementTotalPriceHiddenDiv.text(calcPrice);
        elementtotalPriceNoVoucher.val(calcPrice);
        elementTotalPriceShow.text(calcPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        $('#reserveWithRoom').find('.titleQuantity').text(quantity + ' room for');

        // show total_price when room selected
        if(quantity !== '0') {
            $("#reserveWithNoRoom").css("display","none");
            $("#reserveWithRoom").css("display","block")
        } else {
            $("#reserveWithNoRoom").css("display","block");
            $("#reserveWithRoom").css("display","none")
        }
    })
})

    function changePriceForDates(startDate, endDate, priceCurrent, numberOfRoomAvailable, id, room)
    {
        // enable all voucher (refresh)
        $('.btn-use-voucher').prop("disabled", false);

        // hidden total price column
        $("#reserveWithNoRoom").css("display","block");
        $("#reserveWithRoom").css("display","none");
        $('#totalPrice').val('');

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
        var newPrice = priceCurrent * calcNights + taxAndCharges;
        $('#taxAndCharges').val(taxAndCharges)
        $('#NumberOfNights').val(calcNights);
        $('#priceForNights').text(textCalcNight);

        //re-render table
        renderFromSearchedData(room, priceCurrent, newPrice, numberOfRoomAvailable);
    }

    function renderFromSearchedData(room, priceCurrent, newPrice, numberOfRoomAvailable) 
    {    
        var customTr = $("<tr/>");
        if(room) {
            // room type
            let customTdRoomtype = $("<td/>");
            customTdRoomtype.css('width', '33%');

            let spanHeadRoomType = $("<span/>");
            spanHeadRoomType.attr("class", 'text-capitalize font-bold underline fs-3').css('color', 'cadetblue').text(room.room_title);
            
            let customDiv1 = $("<div/>");
            customDiv1.attr('class', 'mt-3');

            let customDiv1_1 = $("<div/>");
            customDiv1_1.attr('class', 'font-weight-light');
            let customeI_fa_house = $('<i/>');
            customeI_fa_house.attr('class', 'fa-solid fa-house');
            let customeI_temperature_arrow_up = $('<i/>');
            customeI_temperature_arrow_up.attr('class', 'fa-solid fa-temperature-arrow-up');
            let customeI_fa_bath = $('<i/>');
            customeI_fa_bath.attr('class', 'fa-solid fa-bath');
            let customeI_fa_tv = $('<i/>');
            customeI_fa_tv.attr('class', 'fa-solid fa-tv');
            let customeI_fa_volumne_xmark = $('<i/>');
            customeI_fa_volumne_xmark.attr('class', 'fa-solid fa-volume-xmark');
            let customeI_fa_wifi = $('<i/>');
            customeI_fa_wifi.attr('class', 'fa-solid fa-wifi');
            let appendDiv1_1 = customeI_fa_house.get(0).outerHTML + ' 23 m²  ' + 
            customeI_temperature_arrow_up.get(0).outerHTML + ' Air conditioning <br/>' + 
            customeI_fa_bath.get(0).outerHTML + ' Private bathrooms  ' + customeI_fa_tv.get(0).outerHTML + ' Flat-screen <br/>' +
            customeI_fa_volumne_xmark.get(0).outerHTML + ' TV Soundproofing  ' + customeI_fa_wifi.get(0).outerHTML + ' Free WiFi';
            customDiv1_1.append(appendDiv1_1);
            
            let hr = $("<hr/>");
            hr.attr('class', 'my-4');

            let customDiv1_2 = $("<div/>");
            let customeI_fa_check = $('<i/>');
            customeI_fa_check.attr('class', 'fa-solid fa-check');
            let outerHTML_customeI_fa_check = customeI_fa_check.get(0).outerHTML;
            let appendDiv1_2 = outerHTML_customeI_fa_check + ' Shower ' + outerHTML_customeI_fa_check + ' Safety deposit box ' +
            outerHTML_customeI_fa_check + ' Free toiletries ' + outerHTML_customeI_fa_check + ' Bidet ' +
            outerHTML_customeI_fa_check + ' Toilet ' + outerHTML_customeI_fa_check + ' Towels ' +
            outerHTML_customeI_fa_check + ' Linen ' + outerHTML_customeI_fa_check + ' Desk ' +
            outerHTML_customeI_fa_check + ' Slippers ' + outerHTML_customeI_fa_check + ' Heating ' +
            outerHTML_customeI_fa_check + ' Hairdryer ' + outerHTML_customeI_fa_check + ' Towels/sheets (extra fee) ' +
            outerHTML_customeI_fa_check + ' Electric kettle ' + outerHTML_customeI_fa_check + ' Wake-up service ' +
            outerHTML_customeI_fa_check + ' Wardrobe or closet ' + outerHTML_customeI_fa_check + ' Clothes rack ' +
            outerHTML_customeI_fa_check + ' Toilet paper '
            customDiv1_2.append(appendDiv1_2);

            customDiv1.append(customDiv1_1);
            customDiv1.append(hr);
            customDiv1.append(customDiv1_2);
            customTdRoomtype.append(spanHeadRoomType);
            customTdRoomtype.append(customDiv1);
            customTr.append(customTdRoomtype.get(0).outerHTML);   
            //end room type

            // max guest
            let customTdNumberOfGuests = $("<td/>");
            let customeI_fa_person = $('<i/>');
            customeI_fa_person.attr('class', 'fa-solid fa-person');
            for(let m = 0; m < room.max_guest; m++) {
                customTdNumberOfGuests.append(customeI_fa_person.get(0).outerHTML + ' ');
            }
            customTr.append(customTdNumberOfGuests.get(0).outerHTML);
            //end max guest
    
            // price for nights
            let customTdPriceForNights = $("<td/>");
            let customDiv2_1 = $('<div/>');
            customDiv2_1.attr('class', 'd-none room-id-' + room.id).text(' ');
            let customDiv2_2 = $('<div/>'); 
            customDiv2_2.attr('class', 'priceCurrentShow' + room.id).css('color', 'rgb(234, 60, 60)').text(newPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
   
            customTdPriceForNights.append(customDiv2_1.get(0).outerHTML, customDiv2_2.get(0).outerHTML);        
            customTr.append(customTdPriceForNights);
            // end price for nights
            // Choices
            let customTdChoices = $("<td/>");
            customTdChoices.attr('class', 'text-capitalize p-2').css('color', 'rgb(113, 176, 113)');
            let choiceOne = $("<p/>");
            choiceOne.attr('class', 'mb-2').css('color', 'rgb(113, 176, 113)').text('Free cancellation ');
            spanChoiceOne = $('<span/>');
            spanChoiceOne.attr('color', 'green').text('before 18 June 2024');
            choiceOne.append(spanChoiceOne);
            let choiceTwo = $("<p/>");
            choiceTwo.attr('class', 'mb-2').css('color', 'rgb(113, 176, 113)').text('No prepayment needed');
            spanChoiceTwo = $('<span/>');
            spanChoiceTwo.attr('color', 'green').text('– pay at the property');
            choiceTwo.append(spanChoiceTwo);
            let choiceThree = $("<p/>");
            if(typeof room.number_room_booked !== 'undefined') {
                var calcAvailableRoom = room.number_of_room - room.number_room_booked;
            } else {
                var calcAvailableRoom = room.number_of_room;
            }
            choiceThree.attr('color', 'gray').text('Only ' + calcAvailableRoom + ' rooms left on our site');
            calcAvailableRoom++;
            // append
            customTdChoices.append(choiceOne.get(0).outerHTML, choiceTwo.get(0).outerHTML, choiceThree.get(0).outerHTML);

            customTr.append(customTdChoices);
            // end Choices

            // Select Rooms
            // set data hidden
            let customTdSelectRooms = $("<td/>");
            customTdSelectRooms.attr('class','text-capitalize').css('width', '10%');
            let priceCurrentElement = $('<div/>');
            priceCurrentElement.attr('class', 'd-none priceCurrentElement').text(room.price);
            let numberOfRoomAvailableElement = $('<div/>');
            numberOfRoomAvailableElement.attr('class', 'd-none numberOfRoomAvailableElement').text(calcAvailableRoom);

            // change option room
            var NumberOfNights = $('#NumberOfNights').val();

            // var outletOptions = $("#quantityElement-");
            var outletOptions = $("<select/>");
            outletOptions.attr('class', 'form-select quantityElement').attr('aria-label', 'Default select example').attr('name', 'quantityRoomElement-' + room.id).attr('id', 'quantityElement-' + room.id).css('width', '59%');
            // generate option array
            var newOutletOptions = [];
            for(let j = 0; j < parseInt(calcAvailableRoom); j++) {
                let calcP = (priceCurrent * j * NumberOfNights) + (priceCurrent * j * NumberOfNights * 0.1);
                calcP = calcP.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                let array = [j, j + '   (' + calcP + ')'];
                newOutletOptions.push(array);
            }
            // Add new options
            let indexOption = 0;
            newOutletOptions.map((optionData) => {
                if(indexOption == 0) {
                    let option = $('<option/>');
                    option.attr("value", optionData[0]).attr("disabled", "disabled").attr("selected", "selected").text(optionData[1]);
                    outletOptions.append(option);
                    indexOption++;
                } else {
                    let option = $('<option/>');
                    option.attr("value", optionData[0]).text(optionData[1]);
                    outletOptions.append(option);
                }
            })

            customTdSelectRooms.append(priceCurrentElement.get(0).outerHTML, numberOfRoomAvailableElement.get(0).outerHTML, outletOptions.get(0).outerHTML);
            var outletOptionsEle = customTdSelectRooms.find('.quantityElement');
            
            outletOptionsEle.change(function() {
                changeQuantityRoom($(this));
            })
            customTr.append(customTdSelectRooms);
            // // end select rooms
            $('#tableBody').append(customTr);
        }

    }   
    
    function changeQuantityRoom(quantityElement) {
        // collect data
        var quantity = quantityElement.val();
        var parentOfElement = quantityElement.parent();
        var priceCurrent = parentOfElement.find('.priceCurrentElement').text();
        var NumberOfNights = $('#NumberOfNights').val();
        
        $(':hidden#quantityRoomInput').val(quantity);
        var elementTotalPriceHidden = $('#totalPrice');
        var elementtotalPriceNoVoucher = $('#totalPriceNoVoucher');
        var elementTotalPriceHiddenDiv = $('.totalPriceHidden');
        var elementTotalPriceShow = $('#totalPriceShow');

        // calc price 
        var calcPrice = (priceCurrent * quantity * NumberOfNights) + (priceCurrent * quantity * NumberOfNights * 0.1);
        // change view
        elementTotalPriceHidden.val(calcPrice);
        elementtotalPriceNoVoucher.val(calcPrice);
        elementTotalPriceHiddenDiv.text(calcPrice);
        elementTotalPriceShow.text(calcPrice.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
        $('#reserveWithRoom').find('.titleQuantity').text(quantity + ' room for');
        // show total_price when room selected
        if(quantity !== '0') {
            $("#reserveWithNoRoom").css("display","none");
            $("#reserveWithRoom").css("display","block")
        } else {
            $("#reserveWithNoRoom").css("display","block");
            $("#reserveWithRoom").css("display","none")
        }
    }