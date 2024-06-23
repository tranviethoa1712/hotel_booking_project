<div class="booking">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
            <div class="process d-flex gap-2">
                <div class="step d-flex justify-center">
                    <div>
                        <i class="fa-solid fa-check icon-step" style="color: #fafcff;"></i>
                    </div>
                    <div class="title ml-2">Your selection</div>
                </div>
                <div class="line-step align-self-center"></div>
                <div class="step d-flex justify-center">
                    <div>
                        <div class="icon-step">2</div>
                    </div>
                    <div class="title ml-2">Your details</div>
                </div>
                <div class="line-step align-self-center"></div>
                <div class="step d-flex justify-center">
                    <div>
                        <div class="icon-gray">3</div>
                    </div>
                    <div class="title ml-2">Final step</div>
                </div>
            </div>
          </div>
       </div>
       <div class="row content-booking gap-2 mt-5">
            <div class="col-md-3">
                <div class="about p-3 mb-4">
                    <div class="head mb-3">
                        <div>
                            Aparthotel &nbsp;
                            <span><i class="fa-solid fa-circle-dot" style="color: rgb(241, 139, 15);"></i>&nbsp;
                                <i class="fa-solid fa-circle-dot" style="color: rgb(241, 139, 15);"></i>&nbsp;
                                <i class="fa-solid fa-circle-dot" style="color: rgb(241, 139, 15);"></i>&nbsp;
                                <i class="fa-solid fa-circle-dot" style="color: rgb(241, 139, 15);"></i>&nbsp; &nbsp;
                            </span> 
                            <span class="rounded" style="background-color: rgb(241, 139, 15) !important; padding: 4px;">Naksu.com</span>
                        </div>
                        <div class="fs-4 text-capitalize font-bold">
                            the naksu hotel 
                        </div>
                    </div>
                    <div class="address mb-3">
                        <div>
                            1712 Phố Bún Bò Huế Hà Nội
                        </div>
                    </div>
                    <div class="review">
                        <div class="mb-2">
                            <span style="color: #fff; padding: 3px; border-radius: 5px; background: #003b95;">9.9</span> &nbsp; Exeptional <span style="color: gray;">14 reviews</span>
                        </div>
                        <div class="d-flex">
                            <div>
                                <i class="fa-solid fa-wifi"></i> &nbsp; Wifi &nbsp; &nbsp;
                            </div>
                            <div>
                                <i class="fa-solid fa-plane-departure"></i> &nbsp; Airport shuttle
                            </div>
                        </div>
                    </div>
                </div>
                <div class="booking-details p-3 my-3">
                    <div style="border-bottom: 1px solid gray;">
                        <div class="font-bold mb-3">
                            Your booking details
                        </div>
                        <div class="check-in-check-out">
                            <div class="check-in d-flex justify-center">
                                <div>
                                    <div>Check-in</div>
                                    <div class="font-bold fs-4 mt-2">
                                        {{$data_get['startDateHidden']}}
                                    </div>
                                    <div class="mt-2">
                                        <span style="color: gray;">
                                            14:00 - 15:00
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="check-out d-flex justify-center ps-2">
                                <div>
                                    <div>Check-out</div>
                                    <div class="font-bold fs-4 mt-2">
                                        {{$data_get['endDateHidden']}}
                                    </div>
                                    <div class="mt-2">
                                        <span style="color: gray;">
                                            11:00 - 12:00
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            <div>Total length of stay:</div>
                            <div class="font-bold">2 nights</div>
                        </div>    
                    </div>
                    <div class="py-2">
                        <div>You selected</div>
                        <div class="font-bold mt-2">
                            {{$data_get['quantityRoomInput']}} rooms for 2 adults
                        </div>
                        <div class="mt-3">
                            1 x Standard Studio
                        </div>
                        <div class="mt-3">
                            <a href="#">Change your selection</a>
                        </div>

                    </div>
                </div>
                <div class="price-sumary p-3 mt-3">
                    <div class="font-bold mb-3">Your price sumary</div>
                    <div>
                        <div class="d-flex justify-between">
                            <div>Original price</div>
                            <div>{{number_format($data_get['totalPriceNoVoucher'])}} VND</div>
                        </div>
                        <div class="d-flex justify-between">
                            <div>Limited-time Deal</div>
                            <div>- {{number_format($data_get['totalPriceNoVoucher'] - $data_get['totalPrice'])}} VND</div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div style="color: gray;">
                            You're getting a discount because, for a limited time, this property is offering reduced rates on some rooms that match your search.
                        </div>
                    </div>
                    <div class="bg-total p-3 d-flex justify-between my-3">
                        <div class="font-bold fs-3 d-flex align-self-center" style="width: 30%">
                            Total
                        </div>
                        <div class="amount text-end" style="width: 70%">
                            <div>
                                <span class="mt-2" style="color: red; text-decoration: line-through;">{{number_format($data_get['totalPriceNoVoucher'])}} VND</span>
                                <div class="fs-3 font-bold mt-2">{{number_format($data_get['totalPrice'])}} VND</div>
                                <div style="color: gray">Includes taxes and charges</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="font-bold my-3">
                            Price information
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-between mb-2">
                                <div>
                                    <i class="fa-solid fa-money-check-dollar" style="color: #0ca175;"></i>
                                </div>
                                <div>
                                    Includes {{number_format($data_get['taxAndCharges'])}} VND in taxes and charges
                                </div>
                            </div>
                            <div class="d-flex justify-between">
                                <div>
                                    10 % VAT
                                </div>
                                <div>
                                    {{number_format($data_get['taxAndCharges'])}} VND
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="main-booking-content p-3">
                    <div class="fs-3 font-bold">
                        Enter your details
                    </div>
                    <div class="note-head p-3 my-3 rounded">
                        <i class="fa-light fa-circle-info" style="color: #1f2123;"></i> &nbsp; Almost done! Just fill in the <span style="color: red">*</span> required info
                    </div>
                    <div class="head-info border-bottom">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fullname" class="form-label font-bold">Full name <span style="color: red">*</span></label>
                                <input type="text" class="form-control rounded w-full" name="fullname" id="firstName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="emailAddress" class="form-label font-bold">Email address <span style="color: red">*</span></label>
                                <input type="text" class="form-control rounded w-full" name="email_address" id="emailAddress" required>
                                <div id="emailHelp" class="form-text">Confirmation email goes to this address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="address-info mt-3">
                        <div class="font-bold">Your address</div>
                        <div class="my-3">
                            <label for="address" class="form-label font-bold">Address <span style="color: red">*</span></label>
                            <input type="text" class="form-control rounded w-50" name="address" id="address" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label font-bold">City</label>
                            <input type="text" class="form-control rounded w-50" name="city" id="city">
                        </div>
                        <div class="mb-3">
                            <label for="zipPostCode" class="form-label font-bold">Zip/Post Code</label>
                            <input type="text" class="form-control rounded w-50" name="zip_post_code" id="zipPostCode">
                        </div>
                        <div class="mb-3">
                            <label for="region" class="form-label font-bold">Country/region <span style="color: red">*</span></label>
                            <select class="form-select form-select-md" style="width: 30%" name="region" id="region" aria-label=".form-select-md example">
                                <option value="AF">Afghanistan</option>
                                <option value="AX">Åland Islands</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia, Plurinational State of</option>
                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Island</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, the Democratic Republic of the</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="CI">Côte d'Ivoire</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="TF">French Southern Territories</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GG">Guernsey</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard Island and McDonald Islands</option>
                                <option value="VA">Holy See (Vatican City State)</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran, Islamic Republic of</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IM">Isle of Man</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italy</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JE">Jersey</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea, Democratic People's Republic of</option>
                                <option value="KR">Korea, Republic of</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao People's Democratic Republic</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macao</option>
                                <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia, Federated States of</option>
                                <option value="MD">Moldova, Republic of</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="ME">Montenegro</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestinian Territory, Occupied</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Réunion</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian Federation</option>
                                <option value="RW">Rwanda</option>
                                <option value="BL">Saint Barthélemy</option>
                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="MF">Saint Martin (French part)</option>
                                <option value="PM">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="RS">Serbia</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SX">Sint Maarten (Dutch part)</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SJ">Svalbard and Jan Mayen</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syrian Arab Republic</option>
                                <option value="TW">Taiwan, Province of China</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania, United Republic of</option>
                                <option value="TH">Thailand</option>
                                <option value="TL">Timor-Leste</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States</option>
                                <option value="UM">United States Minor Outlying Islands</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                <option value="VN" selected>Viet Nam</option>
                                <option value="VG">Virgin Islands, British</option>
                                <option value="VI">Virgin Islands, U.S.</option>
                                <option value="WF">Wallis and Futuna</option>
                                <option value="EH">Western Sahara</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label font-bold">Phone number <span style="color: red">*</span></label>
                            <input type="text" name="phone_number" style="width: 30%" class="form-control rounded w-30" id="phone_number" placeholder="84+" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" maxlength="13"  title="Ten digits code" required/>    
                        </div>
                    </div>
                </div>
                <div class="special-request p-3 my-4">
                    <div class="font-bold fs-4 mb-3">Special requests</div>
                    <div class="mb-3">
                        Special requests cannot be guaranteed – but the property will do its best to meet your needs. You can always make a special request after your booking is complete!
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="font-bold">Please write your requests in English.</span>(optional)
                        </div>
                        <div>
                            <div class="mb-3">
                                <label for="specialRequests" class="form-label"></label>
                                <textarea class="form-control w-full" name="special_requests" id="specialRequests"></textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="arrival-time p-3">
                    <div class="fs-4 font-bold mb-2">
                        Your arrival time
                    </div>
                    <div class="mb-2">
                        <i class="fa-light fa-circle-check" style="color: #07a661;"></i> &nbsp; Your room will be ready for check-in between 14:00 and 15:00
                    </div>
                    <div>
                        <div class="font-bold mb-2">
                            <span class="font-bold">Add your estimated arrival time</span> (optional)
                        </div>
                        <select class="form-select form-select-md" name="estimated_arrival">
                            <option selected disabled>Please select</option>
                            <option value="-1">I don't know</option>
                            <option value="0">00:00 – 01:00 </option>
                            <option value="1">01:00 – 02:00 </option>
                            <option value="2">02:00 – 03:00 </option>
                            <option value="3">03:00 – 04:00 </option>
                            <option value="4">04:00 – 05:00 </option>
                            <option value="5">05:00 – 06:00 </option>
                            <option value="6">06:00 – 07:00 </option>
                            <option value="7">07:00 – 08:00 </option>
                            <option value="8">08:00 – 09:00 </option>
                            <option value="9">09:00 – 10:00 </option>
                            <option value="10">10:00 – 11:00 </option>
                            <option value="11">11:00 – 12:00 </option>
                            <option value="12">12:00 – 13:00 </option>
                            <option value="13">13:00 – 14:00 </option>
                            <option value="14">14:00 – 15:00 </option>
                            <option value="15">15:00 – 16:00 </option>
                            <option value="16">16:00 – 17:00 </option>
                            <option value="17">17:00 – 18:00 </option>
                            <option value="18">18:00 – 19:00 </option>
                            <option value="19">19:00 – 20:00 </option>
                            <option value="20">20:00 – 21:00 </option>
                            <option value="21">21:00 – 22:00 </option>
                            <option value="22">22:00 – 23:00 </option>
                            <option value="23">23:00 – 00:00 </option>
                            <option value="24">00:00 – 01:00 (the next day)</option>
                            <option value="25">01:00 – 02:00 (the next day)</option>
                          </select>
                          

                    </div>
                </div>
                <div class="review-house-rules p-3 my-4">
                    <div class="font-bold fs-4">
                        Review house rules
                    </div>
                    <div class="my-3">Your host would like you to agree to the following house rules:
                    </div>
                    <div class="mb-3">
                        <div>&#128900; &nbsp; No smoking</div>
                        <div>&#128900; &nbsp; No parties/events</div>
                        <div>&#128900; &nbsp; Quiet hours are between 22:00 and 06:00</div>
                        <div>&#128900; &nbsp; Pets are not allowed</div>
                        
                        
                        
                    </div>
                    <div class="font-bold">
                        By continuing to the next step, you are agreeing to these house rules.
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary p-2 ml-auto" type="submit" >Next: Final details &nbsp; <i class="fa-thin fa-right-long" style="color: #f0f4f2;"></i></button>
                </div>
            </div>
       </div>
    </div>  
</div>