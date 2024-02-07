<?php
include('db_connect.php');
include('utils/utils.php');
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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


    //booking id --------------starts ---------
    if (isset($_POST['save'])) {
    $conn->begin_transaction();

    $booking_id = $_POST['booking_id']; // Define $booking_id here
    
    $query = "SELECT * from setup ";
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt === false) {
        die("Preparation failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) == 0) {
        echo "booking id Config Error?";
        return;
    }
    
    $setup = mysqli_fetch_array($result);
    
    if ($setup === false) {
        die("Error fetching data: " . mysqli_error($conn));
    }
    
    $book_id = tagcal($setup["booking_id"]);
    
    if ($book_id === null) {
        die("Error in tagcal function.");
    }
    
    $sql = "UPDATE setup SET booking_id = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt === false) {
        die("Preparation failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $book_id); // Make sure $book_id holds the correct value
    if (mysqli_stmt_execute($stmt)) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
    $conn->commit();
    
    //booking id --------------ends ---------


    // Prepare INSERT statement                                                                                                                                                                                                                                                            //33                                                                                                             //33
    $stmt = $conn->prepare("INSERT INTO customer_booking (resp, cust_name, dob, email, mbl_no, add1, city, states, country, gst_no, purpose, photo, per_proof, per_proof_no, check_in_date,check_out_date, checkout_no,  adult, male, female, child, igst, sgst, cgst, total, discount, other_charges, tax_amt, gst_amt, round_off, net_amt,booking_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters                           //33                                                                                                                                                                                                                                                                     //33
    $stmt->bind_param("ssssssssssssssssiiiiidddddddddds", $resp, $cust_name, $dob, $email, $mbl_no, $add1, $city, $state, $country, $gst_no, $purpose, $photo, $per_proof, $per_proof_no, $check_in_date, $check_out_date, $checkout_no, $adult, $male, $female, $child, $igst, $r_sgst, $r_cgst, $total, $discount, $other_charges, $tax_amt, $gst_amt, $rnd_off, $net_amt, $booking_id);

    // Execute the statement
    if ($stmt->execute()) {
        $lastid = mysqli_insert_id($conn);
        echo "Records inserted successfully.";
        header('location:index.php?page=billing');
    } else {
        echo "Error: " . $stmt->error;
    }


    // $reff_id = $lastid;
    $query1 = "INSERT INTO `customer_booking_det`(`booking_id`, `room_type`, `room_no`, `no_of_days`, `rent_per_day`, `row_amt`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt1 = mysqli_prepare($conn, $query1);

    if ($stmt1) {
        for ($key = 0; $key < count($room_type); $key++) {
            if ($room_type[$key] !== "") {
                mysqli_stmt_bind_param($stmt1, "sssisd", $booking_id, $room_type[$key], $room_no[$key],  $no_of_days[$key], $rent_per_day[$key], $row_amt[$key]);
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
// $conn->close();
//--------------------------------------- UPDATE QUERY STARTS -------------------------------------------------
if (isset($_POST['update'])) {
    $booking_id = $_POST['booking_id'];
    // Button with name 'update' was clicked

    // Prepare the UPDATE query
    $stmt = $conn->prepare("UPDATE customer_booking SET resp = ?, cust_name = ?, dob = ?, email = ?, mbl_no = ?, add1 = ?,
     city = ?, states = ?, country = ?, gst_no = ?, purpose = ?, photo = ?, per_proof = ?, per_proof_no = ?,
     check_in_date = ?, checkout_no = ?, check_out_date = ?, adult = ?, male = ?, female = ?, child = ?, igst = ?, sgst = ?, cgst = ?,
      total = ?, discount = ?, other_charges = ?, tax_amt = ?, gst_amt = ?, round_off = ?, net_amt = ? WHERE booking_id = ?");

    // Bind parameters to the statement
    $stmt->bind_param(
        "sssssssssssssssisiiiidddddddddds",
        $resp,
        $cust_name,
        $dob,
        $email,
        $mbl_no,
        $add1,
        $city,
        $state,
        $country,
        $gst_no,
        $purpose,
        $photo,
        $per_proof,
        $per_proof_no,
      
        $check_in_date,
        $checkout_no,
        $check_out_date,
        $adult,
        $male,
        $female,
        $child,
        $igst,
        $sgst,
        $cgst,
        $total,
        $discount,
        $other_charges,
        $tax_amt,
        $gst_amt,
        $rnd_off,
        $net_amt,
        $booking_id
    );

    // Execute the UPDATE query
    $stmt->execute();

    // Close the statement
    $stmt->close();

// delete query---------------------------------------------starts---------------------------------------------

// Prepare the DELETE statement
$query = "DELETE FROM `customer_booking_det` WHERE `booking_id` = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
    die("Preparation failed: " . mysqli_error($conn));
}

// Bind the booking_id parameter
mysqli_stmt_bind_param($stmt, "s", $booking_id);

// Execute the DELETE statement
if (mysqli_stmt_execute($stmt)) {
    // The deletion was successful
    echo "Deletion successful!";
} else {
    // An error occurred during deletion
    echo "Deletion failed: " . mysqli_error($conn);
}

// Close the statement
mysqli_stmt_close($stmt);

// delete query---------------------------------------------ends---------------------------------------------

// customer booking det--------------------------------
$query1 = "INSERT INTO `customer_booking_det`(`room_type`, `room_no`, `no_of_days`, `rent_per_day`, `row_amt`, `booking_id`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt1 = mysqli_prepare($conn, $query1);

if ($stmt1) {
    for ($key = 0; $key < count($room_type); $key++) {
        if ($room_type[$key] !== "") {
            mysqli_stmt_bind_param($stmt1, "ssisds", $room_type[$key], $room_no[$key],  $no_of_days[$key], $rent_per_day[$key], $row_amt[$key], $booking_id);
            if (!mysqli_stmt_execute($stmt1)) {
                die("Insertion failed: " . mysqli_error($conn));
            }
        }
    }
    echo "Details Saved successfully";
} else {
    die("Statement preparation failed: " . mysqli_error($conn));
}

// Close statement
mysqli_stmt_close($stmt1);

echo "Details Updated successfully";
$conn->close(); // Close the database connection
}
