<?php include('db_connect.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .form-control,
        .form-select {
            height: 26px !important;
            border-radius: 2px !important;
            color: blue !important;
            padding: 1px !important;
            box-shadow: none !important;
        }

        .form-label {
            width: 200px !important;
            margin-bottom: 6px !important;
        }

        .c1,
        .c3,
        .c5 {
            background-color: #dee2e6;
        }

        .c1,
        .c2,
        .c3,
        .c4,
        .c5 {
            padding: 8px 10px 4px 10px !important;
        }

        h5 {
            font-size: 8px;
            margin: 0;
        }

        .mb {
            margin-bottom: 0px !important;
        }

        /* custom */




        :root {
            --teal: #2ec1ac;
            --teal_hover: #279e8c;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .h-font {
            font-family: 'Merienda', cursive;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }



        .custom_bg {
            background-color: #2ec1ac;
            border: 1px solid #2ec1ac;
        }

        .custom_bg:hover {
            background-color: #279e8c;
            border: 1px solid #279e8c;
        }

        .availability_form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width:575px) {
            .availability_form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }


        .h-line {
            width: 150px;
            margin: 0 auto;
            height: 1.7px;
        }

        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }

        .box {
            border-top-color: var(--teal) !important;
            /* transform: scale(1.03);
	transition: all 0.3s; */
        }


        /* admin index.php */
        .login_form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

        }

        /* essentials.php */
        .custom-alert {
            position: fixed;
            top: 25px;
            right: 25px;
        }

        /* dashboard.php */
        #dashboard_menu {
            position: fixed;
            height: 100%;
            z-index: 4;
        }

        @media screen and (max-width: 991px) {
            #dashboard_menu {
                height: auto;
                width: 100%;
            }

            #main_content {
                margin-top: 60px;
            }
        }

        .nav-link:hover {
            background: #3F8EFC;
            color: #fff !important;
            border-radius: 0;
        }

        .nav-link {
            border-radius: 0;
        }

        .active_custom {
            background: #3F8EFC;
            color: #ffffff !important;
            border-radius: 0 !important;
        }

        .dash_nav {
            background: #3F8EFC;
            color: #fff;
        }

        img {
            width: 30px;
            height: 30px;
            color: #000;
        }

        /* custom */
    </style>
    <?php
    require('header.php');
    ?>
</head>

<body class="bg-light">


    <?php
    require('navbar.php');
    ?>

    <div class="container-fluid" id="main_content">
        <div class="row">
            <h4 class="ms-2 fs-6"> Check-In</h4>
            <div class="col-lg-12 overflow-hidden">

                <form>
                    <div class="container-fluid c1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb d-flex">
                                    <label for="cust_name" class="form-label">Full Name</label>
                                    <div class="w-25">
                                        <select class="form-select" id="resp" name="resp" aria-label="Example select with button addon">
                                            <option selected></option>
                                            <option value="Dr">Dr</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss.">Miss.</option>
                                            <option value="Prof.">Prof.</option>
                                            <option value="Rev.">Rev.</option>
                                            <option value="Rev.Fr.">Rev.Fr.</option>
                                        </select>
                                    </div>
                                    <div class="w-75">
                                        <input type="text" class="form-control shadow-none" id="cust_name" name="cust_name" required>
                                    </div>
                                </div>
                                <div class="mb d-flex">
                                    <label for="dob" class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control shadow-none" name="dob" id="dob" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control shadow-none" name="email" id="email" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="mbl_no" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control shadow-none" name="mbl_no" id="mbl_no" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="add1" class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" name="add1" id="add1" rows="3"></textarea>
                                </div>
                            </div><!-- col end-->
                            <div class="col-md-4">
                                <div class="mb d-flex">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control shadow-none" id="city" name="city" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control shadow-none" name="state" id="state" required>
                                </div>
                                <?php

								$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

								?>
                                <div class="mb d-flex">
                                    <label for="country" class="form-label">Country</label>
                                    <select name="country" class="form-control" id="country"  required>
												<option value selected >Select </option>
                                                <?php
												foreach($countries as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
												endforeach;
												?>
                                            </select>
                                </div>

                                <div class="mb d-flex">
                                    <label for="gst_no" class="form-label">GST No</label>
                                    <input type="text" class="form-control shadow-none" name="gst_no" id="gst_no" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="purpose" class="form-label">Purpose Of Visit</label>
                                    <input type="text" class="form-control shadow-none" name="purpose" id="purpose" required>
                                </div>

                            </div><!-- col end-->
                            <div class="col-md-4">
                                <div class="mb d-flex">
                                    <label for="photo" class="form-label">Photo</label>
                                    <input type="file" class="form-control shadow-none" name="photo" id="photo" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="per_proof" class="form-label">Personal Proof</label>
                                    <input type="file" class="form-control shadow-none" name="per_proof" id="per_proof" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="per_proof_no" class="form-label">Proof Id No</label>
                                    <input type="text" class="form-control shadow-none" name="per_proof_no" id="per_proof_no" required>
                                </div>


                                <div class="mb d-flex">
                                    <!-- <label for="segment" class="form-label me-2">Segmt& source</label>
                                    <div class="w-50">
                                        <select class="form-select" id="segment" name="segment" aria-label="Example select with button addon">
                                            <option selected>Select</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                    <div class="w-50 ms-2">
                                        <select class="form-select" id="source" name="source" aria-label="Example select with button addon">
                                            <option selected>Select</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div> -->

                                </div>

                                <!-- <div class="mb d-flex">
                                    <label for="g_status" class="form-label">Guest Status</label>

                                    <select class="form-select" id="g_status" name="g_status" aria-label="Example select with button addon">
                                        <option selected>Select</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div> -->

                            </div><!-- col end-->
                        </div><!-- row end-->


                    </div>
                    <div class="container-fluid c2">
                        <div class="row">
                            <div class="col-md-3 flex-fill">
                                <div class="mb d-flex">
                                    <label for="room_type" class="form-label">Room Type</label>
                                    <select class="form-select" name="room_type" id="room_type" aria-label="Example select with button addon" onchange="dis_price()">
                                    <option value="">select</option>

                                        <?php

                                        // Query to fetch room categories from the database
                                        $sql = "SELECT * FROM room_categories ORDER BY ID";
                                        $result = mysqli_query($conn, $sql);
                                        // Check if query executed successfully
                                        if ($result) {
                                            // Loop through each row in the result set
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                // Output an option for each room category
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                            // Free result set
                                            mysqli_free_result($result);
                                        } else {
                                            // Query failed
                                            echo '<option selected disabled>Error fetching data</option>';
                                        }
                                        
                                        ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-2 flex-fill">
                                <div class="mb d-flex">
                                    <label for="check_in_date" class="form-label">Check-in Date</label>
                                    <input type="date" class="form-control shadow-none ms-2" name="check_in_date" id="check_in_date" required>
                                </div>
                            </div>
                            <div class="col-md-4 flex-fill">
                                <div class="mb d-flex">
                                    <label for="" class="form-label me-2">Exp.Checkout</label>
                                    <div class="d-flex">
                                        <input type="number" class="form-control shadow-none" placeholder="No Of Days" name="checkout_no" id="checkout_no" required>
                                    </div>
                                    <input type="date" class="form-control shadow-none ms-2" name="check_out_date" id="check_out_date" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-3 flex-fill">
                                <div class="mb d-flex">
                                    <label for="plan" class="form-label">Plan</label>
                                    <select class="form-select" id="plan" name="plan" aria-label="Example select with button addon">
                                        <option selected>Select</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="container-fluid c3">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb d-flex">
                                    <label for="adult" class="form-label">Adult</label>
                                    <input type="number" class="form-control shadow-none" id="adult" name="adult" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb d-flex">
                                    <label for="male" class="form-label">Male</label>
                                    <input type="number" class="form-control shadow-none" value="0" name="male" id="male" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb d-flex">
                                    <label for="female" class="form-label">Female</label>
                                    <input type="number" class="form-control shadow-none" value="0" name="female" id="female" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb d-flex">
                                    <label for="child" class="form-label">Children</label>
                                    <input type="number" class="form-control shadow-none" name="child" id="child" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid c4">
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Room Rent Details</h5>
                                <div class="mb d-flex">
                                    <label for="room_rent" class="form-label">Room Rent</label>
                                    <input type="number" class="form-control shadow-none" id="room_rent" name="room_rent" required >
                                </div>
                                <div class="mb d-flex">
                                    <label for="r_sgst" class="form-label">S GST</label>
                                    <input type="number" class="form-control shadow-none" name="r_sgst" id="r_sgst" required>
                                    <!-- <input type="number" class="form-control shadow-none" name="r_sgst_h" id="r_sgst_h" required> -->
                                    <input type="hidden" class="form-control shadow-none" name="gst_h_input" id="gst_h_input" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="r_cgst" class="form-label">C GST</label>
                                    <input type="number" class="form-control shadow-none" name="r_cgst" id="r_cgst" required>
                                    <!-- <input type="number" class="form-control shadow-none" name="r_cgst_h" id="r_cgst_h" required> -->
                                </div>
                                <div class="mb d-flex">
                                    <label for="r_ttl_rent" class="form-label">Total Rent</label>
                                    <input type="number" class="form-control shadow-none" id="r_ttl_rent" name="r_ttl_rent" readonly>
                                </div>

                            </div><!-- col end-->
                            <div class="col-md-4">
                                <h5>Extra Bed Details</h5>
                                <div class="mb d-flex">
                                    <label for="extra_bed_amt" class="form-label">Amount</label>
                                    <input type="number" class="form-control shadow-none" id="extra_bed_amt" name="extra_bed_amt" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="e_sgst" class="form-label">S GST</label>
                                    <input type="number" class="form-control shadow-none" id="e_sgst" name="e_sgst" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="e_cgst" class="form-label">C GST</label>
                                    <input type="number" class="form-control shadow-none" id="e_cgst" name="ecgst" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="e_ttl_rent" class="form-label">Total</label>
                                    <input type="number" class="form-control shadow-none" id="e_ttl_rent" name="e_ttl_rent" required>
                                </div>

                            </div><!-- col end-->
                            <div class="col-md-4">
                                <h5>Discount Details</h5>
                                <div class="mb d-flex">
                                    <label for="disc" class="form-label">Discount</label>
                                    <input type="number" class="form-control shadow-none" id="disc" name="disc" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="disc_reason" class="form-label">Disc Reason</label>
                                    <input type="text" class="form-control shadow-none" id="disc_reason" name="disc_reason" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="adv_amt" class="form-label">Advance Amt</label>
                                    <input type="number" class="form-control shadow-none" id="adv_amt" name="adv_amt" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="amt_type" class="form-label">Amount Type</label>
                                    <input type="text" class="form-control shadow-none" id="amt_type" name="amt_type" required>
                                </div>
                                <div class="mb d-flex">
                                    <label for="ttl_amt" class="form-label">Total</label>
                                    <input type="number" class="form-control shadow-none" id="ttl_amt" required>
                                </div>

                            </div><!-- col end-->


                        </div><!-- row end-->


                    </div>
                    <div class="container-fluid c5">
                        <div class="row d-flex mb align-items-end">
                            <!-- 16 div elements in the same row with 'flex-fill' class for equal distribution -->
                            <div class="col-md-2 flex-fill">
                                <label for="com_perc" class="form-label">Commision %</label>
                                <input type="number" class="form-control" id="com_perc" name="com_perc" required>
                            </div>
                            <div class="col-md-1 flex-fill">
                                <label for="tds_perc" class="form-label">TDS %</label>
                                <input type="number" class="form-control" id="tds_perc" name="tds_perc" required>
                            </div>
                            <div class="col-md-2 flex-fill">
                                <label for="gttl_amt" class="form-label">AMOUNT</label>
                                <input type="number" class="form-control" id="gttl_amt" name="gttl_amt" required>
                            </div>
                            <div class="col-md-1 flex-fill">
                                <label for="t_gst" class="form-label">GST</label>
                                <input type="number" class="form-control" id="t_gst" name="t_gst" required>
                            </div>
                            <div class="col-md-1 flex-fill">
                                <label for="tcs" class="form-label">TCS</label>
                                <input type="number" class="form-control" id="tcs" name="tcs">
                            </div>
                            <div class="col-md-1 flex-fill">
                                <label for="tds" class="form-label">TDS</label>
                                <input type="number" class="form-control" id="tds" name="tds" required>
                            </div>
                            <div class="col-md-2 flex-fill">
                                <label for="g_ttl_rent" class="form-label">TOTAL RENT</label>
                                <input type="number" class="form-control" id="g_ttl_rent" required>
                            </div>
                            <div class="col-md-2 flex-fill">
                                <label for="booking_id" class="form-label">BOOKING ID</label>
                                <input type="text" class="form-control" id="booking_id" name="booking_id" required>
                            </div>
                            <div class="col-md-8 flex-fill mt-1">
                                <label for="remarks" class="form-label">Special Instruction</label>
                                <textarea class="form-control shadow-none" id="remarks" name="remarks" rows="3"></textarea>
                            </div>
                            <div class="col-md-4 flex-fill ">
                                <button type="submit" name="save" id="save" class="btn btn-primary shadow-none">Save</button>
                                <button type="button" id="print_bill" class="btn btn-primary shadow-none">Print</button>
                            </div>

                        </div>
                    </div>


            </div><!-- main col-lg-10 end -->
        </div><!-- main row end -->
    </div> <!-- main end -->
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="js/billing.js"></script>
</body>

</html>
<!-- <div class="mb d-flex">
    <label for="checkInDate" class="form-label">Check-In Date</label>
    <input type="date" class="form-control shadow-none" id="checkInDate" required>
</div> -->