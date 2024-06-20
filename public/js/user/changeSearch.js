
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
                //remove all tr tag in tbody
                $('#tableBody').find('tr').remove();
                if(response.length > 1) {
                    $.each(JSON.parse(response[0]), function (key, val) {
                    let numberOfRoomAvailable = (val.number_of_room - val.number_room_booked) + 1;
                    changePriceForDates(startDate, endDate, val.price, numberOfRoomAvailable, val.id, val, JSON.parse(response[1]));
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

    function changePriceForDates(startDate, endDate, priceCurrent, numberOfRoomAvailable, id, room, coupons)
    {

        var roomIdElement = $('.room-id-' + id);
        var roomIdElementParent = roomIdElement.parent();

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
        $('#taxAndCharges').val(taxAndCharges)
        $('#NumberOfNights').val(calcNights);
        $('#priceForNights').text(textCalcNight);

        //re-render table
        renderFromSearchedData(room, priceCurrent, newPrice, numberOfRoomAvailable, coupons);
    }

    function renderFromSearchedData(room, priceCurrent, newPrice, numberOfRoomAvailable, coupons) 
    {    
        var customTr = $("<tr/>");
        if(room) {
            // room type
            let customTdRoomtype = $("<td/>");
            customTdRoomtype.css('width', '33%');

            let spanHeadRoomType = $("<span/>");
            spanHeadRoomType.attr("class", 'text-capitalize font-bold underline fs-3').css('color', 'cadetblue').text(room.room_type);
            
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

            let customButtonModalVoucher = $('<button/>');
            customButtonModalVoucher.attr('type', 'button').attr('class', 'btn btn-blue text-nowrap mt-2').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#exampleModal').text('Naksu voucher');
            // voucher modal
            let customModalVoucherDiv = $('<div/>');
            customModalVoucherDiv.attr('class', 'modal fade').attr('id', 'exampleModal').attr('tabindex', '-1').attr('aria-labelledby', 'exampleModalLabel').attr('aria-hidden', 'true');
            let customDialogModalVoucherDiv = $('<div/>');
            customDialogModalVoucherDiv.attr('class', 'modal-dialog');
            let customContentgModalVoucherDiv = $('<div/>');
            customContentgModalVoucherDiv.attr('class', 'modal-content');
            let customHeaderModalVoucherDiv = $('<div/>');
            // header modal
            customHeaderModalVoucherDiv.attr('class', 'modal-header');
            let innerTitleHeaderModalVoucherDiv = $('<h5/>');
            innerTitleHeaderModalVoucherDiv.attr('class', 'modal-title').attr('id', 'exampleModalLabel').text('Modal title');
            let innerButtonCloseHeaderModalVoucherDiv = $('<button/>');
            innerButtonCloseHeaderModalVoucherDiv.attr('type', 'button').attr('data-bs-dismiss', 'modal').attr('class', 'btn-close').attr('aria-label', 'Close')
            customHeaderModalVoucherDiv.append(innerTitleHeaderModalVoucherDiv.get(0).outerHTML, innerButtonCloseHeaderModalVoucherDiv.get(0).outerHTML);

            //body modal
            let customBodyModalVoucherDiv = $('<div/>');
            customBodyModalVoucherDiv.attr('class', 'modal-body');
            let arrayContentModalBody = [];
            if(coupons){
                $.each(coupons, function (i, currProgram) {
                    $.each(currProgram, function (key, val) {
                        
                        var innerContentBodyModalVoucherDiv = $('<div/>');
                        innerContentBodyModalVoucherDiv.attr('class', 'mb-3 d-flex justify-between');
                        var innerCodeContentBodyModalVoucherDiv = $('<div/>');
                        innerCodeContentBodyModalVoucherDiv.css('width', '70%');
                        var innerButtonUseVoucherModal  = $('<button/>');
                        innerButtonUseVoucherModal.attr('type', 'button').attr('class', 'btn btn-sm btn-blue mt-2 text-nowrap-to-normal').css('width', '25%').text('Use Voucher');
                        var innerDescriptionContentBodyModalVoucherDiv = $('<p/>');
                        $.each(val, function (column, value) {
                            if(column == 'code') {
                                innerCodeContentBodyModalVoucherDiv.text(value);
                            }
                            if(column == 'description') {
                                innerDescriptionContentBodyModalVoucherDiv.css('color', 'rgb(219, 102, 102)').text(value);
                            }
                        });
                        // append
                        innerCodeContentBodyModalVoucherDiv.append(innerCodeContentBodyModalVoucherDiv, innerDescriptionContentBodyModalVoucherDiv);
                        innerContentBodyModalVoucherDiv.append(innerCodeContentBodyModalVoucherDiv, innerButtonUseVoucherModal);
                        arrayContentModalBody.push(innerContentBodyModalVoucherDiv);
                    });
                });
                for(let j = 0; j < arrayContentModalBody.length; j++) {
                    customBodyModalVoucherDiv.append(arrayContentModalBody[j])
                }
                // modal footer
                let voucherModalFooter = $('<div/>');
                voucherModalFooter.attr('class', 'modal-footer');
                let voucherModalButtonFooter = $("<button/>");
                voucherModalButtonFooter.attr('type', 'button').attr('class', 'btn btn-secondary').attr('data-bs-dismiss', 'modal').text('Close');
                voucherModalFooter.append(voucherModalButtonFooter);
                // end modal footer 

                // append 
                customContentgModalVoucherDiv.append(customHeaderModalVoucherDiv, customBodyModalVoucherDiv, voucherModalFooter);
                customDialogModalVoucherDiv.append(customContentgModalVoucherDiv);
                customModalVoucherDiv.append(customDialogModalVoucherDiv);    
                customTdPriceForNights.append(customDiv2_1.get(0).outerHTML, customDiv2_2.get(0).outerHTML, customButtonModalVoucher.get(0).outerHTML, customModalVoucherDiv);
            } else {
                let loginToUseVoucherDiv = $('<div/>');
                loginToUseVoucherDiv.attr('class', 'font-bold fs-3 text-center').text('Hãy đăng nhập để sử dụng voucher');

                customTdPriceForNights.append(customDiv2_1.get(0).outerHTML, customDiv2_2.get(0).outerHTML, loginToUseVoucherDiv.get(0).outerHTML);
            }
        
            customTr.append(customTdPriceForNights);
            // end voucher modal

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
            let calcAvailableRoom = room.number_of_room - room.number_room_booked;
            choiceThree.attr('color', 'gray').text('Only ' + calcAvailableRoom + ' rooms left on our site');

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
            numberOfRoomAvailableElement.attr('class', 'd-none priceCurrentElement').text(calcAvailableRoom);

            // change option room
            var NumberOfNights = $('#NumberOfNights').val();

            // var outletOptions = $("#quantityElement-");
            var outletOptions = $("<select/>");
            outletOptions.attr('class', 'form-select').attr('class', 'form-select quantityElement').attr('aria-label', 'Default select example').attr('name', 'quantityRoomElement').attr('id', 'quantityElement-' + room.id).css('width', '48%');
            // generate option array
            var newOutletOptions = [];
            for(let j = 0; j < numberOfRoomAvailable; j++) {
                let calcP = (priceCurrent * j * NumberOfNights) - (priceCurrent * j * NumberOfNights * 0.1);
                calcP = calcP.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
                let array = [j, j + '   (' + calcP + ')'];
                newOutletOptions.push(array);
            }
            console.log(newOutletOptions);
            // Add new options
            newOutletOptions.map((optionData) => {
                console.log('option0: ', optionData[0]);
                console.log('option1: ', optionData[1]);
                let option = $('<option/>');
                option.attr("value", optionData[0]).text(optionData[1]);
                outletOptions.append(option);
            })
            customTdSelectRooms.append(priceCurrentElement.get(0).outerHTML, numberOfRoomAvailableElement.get(0).outerHTML, outletOptions.get(0).outerHTML);
            console.log(customTdSelectRooms.get(0).outerHTML);
            customTr.append(customTdSelectRooms);
            // // end select rooms
            $('#tableBody').append(customTr);
            console.log('success')
        }
    }

