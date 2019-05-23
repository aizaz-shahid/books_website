﻿<!doctype html>
<html>
<head>
    <title>Obooko Development Site</title>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="fonts/obooko-font.css"> 
    <!--<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
</head>

<body>
<div class="container">
<header>
	<div class="banner"><img src="images/TRULY-FREE-EBOOKS.png" alt="TRULY-FREE-EBOOKS"></div>
    <h1 class="header__tag">download ebooks without paying a penny: zilch, nada, nowt</h1>
    <div class="row access-txt mttop33">
    	<div class="col-sm-4"><p>Access to this website and every title in our free ebook categories is gratis. You may Download as many books as you wish 			with the compliments of our wonderful authors.</p></div>
        <div class="col-sm-12 col-md-8 xs-center" style="padding-left:0px;">{!! $advertt->a !!}</div>
    </div>
    
    <section class="mttop17">
@include('shared.nav')     
    </section>
</header>	

<section class="mttop33">
    <div class="row middle">
    	<div class="col-md-6">
        	
            
            <div class="video" align="center"><video width="100%" src="video/obooko-welcome.mp4" type="video/webm" controls ></video></div>
        </div> 
        
        <div class="col-md-6">
        	<form name="form-2" action="welcome-user" method="post" class="form">
            	<h2>Register here FREE!</h2>
		<p style='padding:0 0 0 0;margin-bottom: 25px;'>
					No waiting! Sign-up and start downloading ebooks straightaway.</br>
					
		</p>
		@if(isset($Error))
                <p style="color: red">{{$Error or ''}}</p>
		@endif
                <div class="row">
                <div class="col-sm-4 col-md-5"><label>Your First Name</label></div>
                <div class="col-sm-8 col-md-7"><input type="text" name="firstname" value="{{ $firstname or '' }}" id="fname" required></div>
		
		<div class="col-sm-4 col-md-5"><label>Your Last Name</label></div>
                <div class="col-sm-8 col-md-7"><input type="text" name="lastname" value="{{ $lastname or '' }}" id="lname" required></div>
                
                <div class="col-sm-4 col-md-5"><label>Email Address</label></div>
                <div class="col-sm-8 col-md-7"><input required="" name="email" id="email" value="{{ $email or '' }}" type="text"></div>

		

		<!--<div class="col-sm-4 col-md-5"><label>Enter a Username</label></div>
                <div class="col-sm-8 col-md-7"><input required="" name="username" id="username" value="{{ $username or '' }}" type="text"></div>-->
                
                <div class="col-sm-4 col-md-5"><label>Enter a Password</label></div>
                <div class="col-sm-8 col-md-7"><input name="password" value="{{ $password or '' }}" id="password" maxlength="50" size="26" type="password"></div>
                
                
                
                <div class="col-sm-4 col-md-5"><label>Male or Female</label></div>
                <div class="col-sm-8 col-md-7">
                    <select name="gender" required>
                        <option disabled selected value>Please select</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                
                <div class="col-sm-4 col-md-5"><label>Your Country?</label></div>
                <div class="col-sm-8 col-md-7">
                    <select name="country"  required>
                        <option disabled selected value>Please select</option>
                        <option value="United States of America"  >United States of America</option>
												<option value="United Kingdom"  >United Kingdom</option>												
												<option value="Afghanistan"  >Afghanistan</option>
												<option value="Albania"  >Albania</option>
												<option value="Algeria"  >Algeria</option>
												<option value="American Samoa"  >American Samoa</option>
												<option value="Andorra"  >Andorra</option>
												<option value="Angola"  >Angola</option>
												<option value="Anguilla"  >Anguilla</option>
												<option value="Antarctica"  >Antarctica</option>
												<option value="Antigua and Barbuda"  >Antigua and Barbuda</option>
												<option value="Argentina"  >Argentina</option>
												<option value="Armenia"  >Armenia</option>
												<option value="Aruba"  >Aruba</option>
												<option value="Australia"  >Australia</option>
												<option value="Austria"  >Austria</option>
												<option value="Azerbaijan"  >Azerbaijan</option>
												<option value="Bahamas"  >Bahamas</option>
												<option value="Bahrain"  >Bahrain</option>
												<option value="Bangladesh"  >Bangladesh</option>
												<option value="Barbados"  >Barbados</option>
												<option value="Belarus"  >Belarus</option>
												<option value="Belgium"  >Belgium</option>
												<option value="Belize"  >Belize</option>
												<option value="Benin"  >Benin</option>
												<option value="Bermuda"  >Bermuda</option>
												<option value="Bhutan"  >Bhutan</option>
												<option value="Bolivia"  >Bolivia</option>
												<option value="Bosnia and Herzegovina"  >Bosnia and Herzegovina</option>
												<option value="Botswana"  >Botswana</option>
												<option value="Bouvet Island"  >Bouvet Island</option>
												<option value="Brazil"  >Brazil</option>
												<option value="British Indian Ocean Territory"  >British Indian Ocean Territory</option>
												<option value="Brunei Darussalam"  >Brunei Darussalam</option>
												<option value="Bulgaria"  >Bulgaria</option>
												<option value="Burkina Faso"  >Burkina Faso</option>
												<option value="Burundi"  >Burundi</option>
												<option value="Cambodia"  >Cambodia</option>
												<option value="Cameroon"  >Cameroon</option>
												<option value="Canada"  >Canada</option>
												<option value="Cape Verde"  >Cape Verde</option>
												<option value="Cayman Islands"  >Cayman Islands</option>
												<option value="Central African Republic"  >Central African Republic</option>
												<option value="Chad"  >Chad</option>
												<option value="Chile"  >Chile</option>
												<option value="China"  >China</option>
												<option value="Christmas Island"  >Christmas Island</option>
												<option value="Cocos (Keeling) Islands"  >Cocos (Keeling) Islands</option>
												<option value="Colombia"  >Colombia</option>
												<option value="Comoros"  >Comoros</option>
												<option value="Congo"  >Congo</option>
												<option value="Cook Islands"  >Cook Islands</option>
												<option value="Costa Rica"  >Costa Rica</option>
												<option value="Cote D'Ivoire"  >Cote D'Ivoire</option>
												<option value="Croatia"  >Croatia (Local Name: Hrvatska)</option>
												<option value="Cuba"  >Cuba</option>
												<option value="Cyprus"  >Cyprus</option>
												<option value="Czech Republic"  >Czech Republic</option>
												<option value="Denmark"  >Denmark</option>
												<option value="Djibouti"  >Djibouti</option>
												<option value="Dominica"  >Dominica</option>
												<option value="Dominican Republic"  >Dominican Republic</option>
												<option value="East Timor"  >East Timor</option>
												<option value="Ecuador"  >Ecuador</option>
												<option value="Egypt"  >Egypt</option>
												<option value="El Salvador"  >El Salvador</option>
												<option value="Equatorial Guinea"  >Equatorial Guinea</option>
												<option value="Eritrea"  >Eritrea</option>
												<option value="Estonia"  >Estonia</option>
												<option value="Ethiopia"  >Ethiopia</option>
												<option value="Falkland Islands"  >Falkland Islands</option>
												<option value="Faroe Islands"  >Faroe Islands</option>
												<option value="Fiji"  >Fiji</option>
												<option value="Finland"  >Finland</option>
												<option value="France"  >France</option>
												<option value="French Guiana"  >French Guiana</option>
												<option value="French Polynesia"  >French Polynesia</option>
												<option value="French Southern Territories"  >French Southern Territories</option>
												<option value="Gabon"  >Gabon</option>
												<option value="Gambia"  >Gambia</option>
												<option value="Georgia"  >Georgia</option>
												<option value="Germany"  >Germany</option>
												<option value="Ghana"  >Ghana</option>
												<option value="Gibraltar"  >Gibraltar</option>
												<option value="Greece"  >Greece</option>
												<option value="Greenland"  >Greenland</option>
												<option value="Grenada"  >Grenada</option>
												<option value="Guadeloupe"  >Guadeloupe</option>
												<option value="Guam"  >Guam</option>
												<option value="Guatemala"  >Guatemala</option>
												<option value="Guinea"  >Guinea</option>
												<option value="Guinea-Bissau"  >Guinea-Bissau</option>
												<option value="Guyana"  >Guyana</option>
												<option value="Haiti"  >Haiti</option>
												<option value="Heard and Mc Donald Islands"  >Heard and Mc Donald Islands</option>
												<option value="Honduras"  >Honduras</option>
												<option value="Hong Kong"  >Hong Kong</option>
												<option value="Hungary"  >Hungary</option>
												<option value="Iceland"  >Iceland</option>
												<option value="India"  >India</option>
												<option value="Indonesia"  >Indonesia</option>
												<option value="Iran (Islamic Republic of)"  >Iran (Islamic Republic of)</option>
												<option value="Iraq"  >Iraq</option>
												<option value="Ireland"  >Ireland</option>
												<option value="Israel"  >Israel</option>
												<option value="Italy"  >Italy</option>
												<option value="Jamaica"  >Jamaica</option>
												<option value="Japan"  >Japan</option>
												<option value="Jordan"  >Jordan</option>
												<option value="Kazakhstan"  >Kazakhstan</option>
												<option value="Kenya"  >Kenya</option>
												<option value="Kiribati"  >Kiribati</option>
												<option value="Korea: Democratic People's Republic"  >Korea: Democratic People's Republic</option>
												<option value="Korea: Republic"  >Korea: Republic</option>
												<option value="Kuwait"  >Kuwait</option>
												<option value="Kyrgyzstan"  >Kyrgyzstan</option>
												<option value="Lao People's Democratic Republic"  >Lao People's Democratic Republic</option>
												<option value="Latvia"  >Latvia</option>
												<option value="Lebanon"  >Lebanon</option>
												<option value="Lesotho"  >Lesotho</option>
												<option value="Liberia"  >Liberia</option>
												<option value="Libyan Arab Jamahiriya"  >Libyan Arab Jamahiriya</option>
												<option value="Liechtenstein"  >Liechtenstein</option>
												<option value="Lithuania"  >Lithuania</option>
												<option value="Luxembourg"  >Luxembourg</option>
												<option value="Macau"  >Macau</option>
												<option value="Macedonia"  >Macedonia, Former Yugoslav Rep. of</option>
												<option value="Madagascar"  >Madagascar</option>
												<option value="Malawi"  >Malawi</option>
												<option value="Malaysia"  >Malaysia</option>
												<option value="Maldives"  >Maldives</option>
												<option value="Mali"  >Mali</option>
												<option value="Malta"  >Malta</option>
												<option value="Marshall Islands"  >Marshall Islands</option>
												<option value="Martinique"  >Martinique</option>
												<option value="Mauritania"  >Mauritania</option>
												<option value="Mauritius"  >Mauritius</option>
												<option value="Mayotte"  >Mayotte</option>
												<option value="Mexico"  >Mexico</option>
												<option value="Micronesia, Federated States of"  >Micronesia, Federated States of</option>
												<option value="Moldova, Republic of"  >Moldova, Republic of</option>
												<option value="Monaco"  >Monaco</option>
												<option value="Mongolia"  >Mongolia</option>
												<option value="Montserrat"  >Montserrat</option>
												<option value="Morocco"  >Morocco</option>
												<option value="Mozambique"  >Mozambique</option>
												<option value="Myanmar"  >Myanmar</option>
												<option value="Namibia"  >Namibia</option>
												<option value="Nauru"  >Nauru</option>
												<option value="Nepal"  >Nepal</option>
												<option value="Netherlands"  >Netherlands</option>
												<option value="Netherlands Antilles"  >Netherlands Antilles</option>
												<option value="New Caledonia"  >New Caledonia</option>
												<option value="New Zealand"  >New Zealand</option>
												<option value="Nicaragua"  >Nicaragua</option>
												<option value="Niger"  >Niger</option>
												<option value="Nigeria"  >Nigeria</option>
												<option value="Niue"  >Niue</option>
												<option value="Norfolk Island"  >Norfolk Island</option>
												<option value="Northern Mariana Islands"  >Northern Mariana Islands</option>
												<option value="Norway"  >Norway</option>
												<option value="Oman"  >Oman</option>
												<option value="Pakistan"  >Pakistan</option>
												<option value="Palau"  >Palau</option>
												<option value="Panama"  >Panama</option>
												<option value="Papua New Guinea"  >Papua New Guinea</option>
												<option value="Paraguay"  >Paraguay</option>
												<option value="Peru"  >Peru</option>
												<option value="Philippines"  >Philippines</option>
												<option value="Pitcairn"  >Pitcairn</option>
												<option value="Poland"  >Poland</option>
												<option value="Portugal"  >Portugal</option>
												<option value="Puerto Rico"  >Puerto Rico</option>
												<option value="Qatar"  >Qatar</option>
												<option value="Reunion"  >Reunion</option>
												<option value="Romania"  >Romania</option>
												<option value="Russian Federation"  >Russian Federation</option>
												<option value="Rwanda"  >Rwanda</option>
												<option value="Saint Kitts and Nevis"  >Saint Kitts and Nevis</option>
												<option value="Saint Lucia"  >Saint Lucia</option>
												<option value="Saint Vincent and The Grenadines"  >Saint Vincent and The Grenadines</option>
												<option value="Samoa"  >Samoa</option>
												<option value="San Marino"  >San Marino</option>
												<option value="Sao Tome and Principe"  >Sao Tome and Principe</option>
												<option value="Saudi Arabia"  >Saudi Arabia</option>
												<option value="Senegal"  >Senegal</option>
												<option value="Seychelles"  >Seychelles</option>
												<option value="Sierra Leone"  >Sierra Leone</option>
												<option value="Singapore"  >Singapore</option>
												<option value="Slovakia"  >Slovakia (Slovak Republic)</option>
												<option value="Slovenia"  >Slovenia</option>
												<option value="Solomon Islands"  >Solomon Islands</option>
												<option value="Somalia"  >Somalia</option>
												<option value="South Africa"  >South Africa</option>
												<option value="South Georgia and S.Sandwich Is."  >South Georgia and S.Sandwich Is.</option>
												<option value="Spain"  >Spain</option>
												<option value="Sri Lanka"  >Sri Lanka</option>
												<option value="St. Helena"  >St. Helena</option>
												<option value="St. Pierre and Miquelon"  >St. Pierre and Miquelon</option>
												<option value="Sudan"  >Sudan</option>
												<option value="Suriname"  >Suriname</option>
												<option value="Svalbard and Jan Mayen Islands"  >Svalbard and Jan Mayen Islands</option>
												<option value="Swaziland"  >Swaziland</option>
												<option value="Sweden"  >Sweden</option>
												<option value="Switzerland"  >Switzerland</option>
												<option value="Syrian Arab Republic"  >Syrian Arab Republic</option>
												<option value="Taiwan"  >Taiwan</option>
												<option value="Tajikistan"  >Tajikistan</option>
												<option value="Tanzania"  >Tanzania, United Republic of</option>
												<option value="Thailand"  >Thailand</option>
												<option value="Togo"  >Togo</option>
												<option value="Tokelau"  >Tokelau</option>
												<option value="Tonga">  Tonga</option>
												<option value="Trinidad and Tobago"  >Trinidad and Tobago</option>
												<option value="Tunisia"  >Tunisia</option>
												<option value="Turkey"  >Turkey</option>
												<option value="Turkmenistan"  >Turkmenistan</option>
												<option value="Turks and Caicos Islands"  >Turks and Caicos Islands</option>
												<option value="Tuvalu"  >Tuvalu</option>
												<option value="Uganda"  >Uganda</option>
												<option value="Ukraine"  >Ukraine</option>
												<option value="United Arab Emirates"  >United Arab Emirates</option>
												<option value="United Kingdom"  >United Kingdom</option>
												<option value="United States of America"  >United States of America</option>
												<option value="U.S. Minor Outlying Islands"  >U.S. Minor Outlying Islands</option>
												<option value="Uruguay"  >Uruguay</option>
												<option value="Uzbekistan"  >Uzbekistan</option>
												<option value="Vanuatu"  >Vanuatu</option>
												<option value="Vatican City State"  >Vatican City State</option>
												<option value="Venezuela"  >Venezuela</option>
												<option value="Viet Nam"  >Viet Nam</option>
												<option value="Virgin Islands (British)"  >Virgin Islands (British)</option>
												<option value="Virgin Islands (U.S.)"  >Virgin Islands (U.S.)</option>
												<option value="Wallis and Futuna Islands"  >Wallis and Futuna Islands</option>
												<option value="Western Sahara"  >Western Sahara</option>
												<option value="Yemen"  >Yemen</option>
												<option value="Yugoslavia"  >Yugoslavia</option>
												<option value="Zaire"  >Zaire</option>
												<option value="Zambia"  >Zambia</option>
												<option value="Zimbabwe"  >Zimbabwe </option>
                    </select>
                </div>
                
                <div class="col-sm-12"><p>By submitting this form I confirm that I am over 13 years of age and that I have read and accept the obooko <u>terms and conditions</u> and <u>privacy policy.</u></p></div>
                
                <div class="mttop25">
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;Please enter the code below:</span>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 col-md-5 mttop10">{!!captcha_img()!!}</div>
                    <input type="hidden" name="captcha_value" value="3FzR">
                    <div class="col-sm-8 col-md-7 mttop10"><input type="text" name="captcha" id="captcha" required></div>
                </div>
                
                <div class="col-sm-12"><input type="submit" name="submit" id="submit" value="Register Free" class="mttop32"></div>

		<div class="col-sm-12" style='margin-top: 20px;'><font color='#F60'>Please wait for confirmation page to load.</font> Problems with form? See <a href='http://www.obooko.com/free-ebooks//info-faq'>FAQ</a></div>

			{!! csrf_field() !!}
                </div>

		

            </form>
        </div>
        
    </div>
</section>



<footer>
<p class="xs-center">{{$footer->general_text}}</p>
{!! $footer->analytic_code !!}
{!! $footer->cookie_code !!}
</footer>


</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/app.js"></script>

</body>
</html>
