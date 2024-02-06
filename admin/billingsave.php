<?php
include('db_connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve values from the form
    $resp = $_POST['resp'];
    $cust_name = $_POST['cust_name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mbl_no = $_POST['mbl_no'];
    $add1 = $_POST['add1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $gst_no = $_POST['gst_no'];
    $purpose = $_POST['purpose'];
    $photo = $_POST['photo'];
    $per_proof = $_POST['per_proof'];
    $per_proof_no = $_POST['per_proof_no'];
    //----
    // $room_type = $_POST['room_type'];
    $check_in_date = $_POST['check_in_date'];
    $checkout_no = $_POST['checkout_no'];
    $check_out_date = $_POST['check_out_date'];
    //----
    $adult = $_POST['adult'];
    $male = $_POST['male'];
    $female = $_POST['female'];
    $child = $_POST['child'];

    //-------------------------------------
    // $room_rent = $_POST['room_rent'];
    $igst = $_POST['igst'];
    $r_sgst = $_POST['r_sgst'];
    $r_cgst = $_POST['r_cgst'];
    // $r_ttl_rent = $_POST['r_ttl_rent'];
    // $extra_bed_amt = $_POST['extra_bed_amt'];
    // $e_igst = $_POST['e_igst'];
    // $e_sgst = $_POST['e_sgst'];
    // $e_cgst = $_POST['e_cgst'];
    // $e_ttl_rent = $_POST['e_ttl_rent'];
    $total = $_POST['total'];
    $discount = $_POST['discount'];
    $other_charges = $_POST['other-charges'];
    $tax_amt = $_POST['tax-amt'];
    $gst_amt = $_POST['gstamt'];
    $rnd_off = $_POST['rnd-off'];
    //==============
    $net_amt = $_POST['fnet'];
    $room_type = $_POST['room_type'];
    $room_no = $_POST['room_no'];
    $no_of_days = $_POST['no_of_days'];
    $rent_per_day = $_POST['room_price'];
    $row_amt = $_POST['row_amt'];
    //=================
    // $disc_reason = $_POST['disc_reason'];
    // $adv_amt = $_POST['adv_amt'];
    // $amt_type = $_POST['amt_type'];
    // //-----
    // $com_perc = $_POST['com_perc'];
    // $tds_perc = $_POST['tds_perc'];
    // $gttl_amt = $_POST['gttl_amt'];
    // $t_gst = $_POST['t_gst'];
    // $tcs = $_POST['tcs'];
    // $tds = $_POST['tds'];
    // $g_ttl_rent = $_POST['g_ttl_rent'];
    // $booking_id = $_POST['booking_id'];
    // $remarks = $_POST['remarks'];
    //------

    // , room_rent,  r_ttl_rent, extra_bed_amt, e_igst, e_sgst, e_cgst, e_ttl_rent, disc, disc_reason, adv_amt, amt_type, ttl_amt, com_perc, tds_perc, gttl_amt, t_gst, tcs, tds, g_ttl_rent, booking_id, remarks
    // , $room_rent, $igst, $r_sgst, $r_cgst, $r_ttl_rent, $extra_bed_amt, $e_igst, $e_sgst, $e_cgst, $e_ttl_rent, $disc, $disc_reason, $adv_amt, $amt_type, $ttl_amt, $com_perc, $tds_perc, $gttl_amt, $t_gst, $tcs, $tds, $g_ttl_rent, $booking_id, $remarks

    // Prepare INSERT statement                                                                                                                                                                                                                                                            //32                                                                                                              //32
    $stmt = $conn->prepare("INSERT INTO customer_booking (resp, cust_name, dob, email, mbl_no, add1, city, states, country, gst_no, purpose, photo, per_proof, per_proof_no, room_type, check_in_date, checkout_no, check_out_date, adult, male, female, child, igst, sgst, cgst, total, discount, other_charges, tax_amt, gst_amt, round_off, net_amt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters                           //32                                                                                                                                                                                                                                                                     //32
    $stmt->bind_param("ssssssssssssssssssssssssssssssss", $resp, $cust_name, $dob, $email, $mbl_no, $add1, $city, $state, $country, $gst_no, $purpose, $photo, $per_proof, $per_proof_no, $room_type, $check_in_date, $checkout_no, $check_out_date, $adult, $male, $female, $child, $igst, $r_sgst, $r_cgst, $total, $discount, $other_charges, $tax_amt, $gst_amt, $rnd_off, $net_amt);

    // Execute the statement
    if ($stmt->execute()) {
        $lastid = mysqli_insert_id($conn);
        echo "Records inserted successfully.";
        header('location:index.php?page=billing');
    } else {
        echo "Error: " . $stmt->error;
    }


    $reff_id = $lastid;
    $query1 = "INSERT INTO `customer_booking_det`(`reff_id`, `room_type`, `room_no`, `no_of_days`, `rent_per_day`, `row_amt`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $query1);

    if ($stmt1) {
        for ($key = 0; $key < count($room_type); $key++) {
            if ($room_type[$key] !== "") {
                mysqli_stmt_bind_param($stmt1, "ssssss", $reff_id, $room_type[$key], $room_no[$key],  $no_of_days[$key], $rent_per_day[$key], $row_amt[$key]);
                mysqli_stmt_execute($stmt1);
            }
        }
        echo "Details Saved successfully";
    } else {
        echo "Statement preparation failed: " . mysqli_error($conn);
    }


    // Close statement
    $stmt->close();
    $stmt1->close();
}

// Close connection
$conn->close();
