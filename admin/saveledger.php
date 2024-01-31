<?php
// Check if the "save" button is clicked
include('db_connect.php');
if (isset($_POST['save'])) {
    // Get the form input values
    echo "1";
    $grpid = $_POST['grpid'];
    $acid = $_POST['acid'];
    $ac_name = $_POST['ac_nam'];
    $ac_name = strtoupper($ac_name);
    $ac_grp_nam =strtoupper($_POST['grpnames']);
    $crdr = $_POST['count'];
    
    $ac_op_bal = isset($_POST['ac_op_bal']) ? intval($_POST['ac_op_bal']) : 0;
    if ($crdr == 'dr' && $ac_op_bal>0) {
        $ac_op_bal = $ac_op_bal * -1;
    }

    // Fetch data from the "ac_groups" table
    $sql = "SELECT * FROM ac_groups WHERE id='$grpid'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $id = $row["id"];
            $maj_id = $row['majar_id'];
            $cr = $row['cr'];
            $cls = $row['ac_cls'];
            $ac_type = $row['ac_type'];
        }
    }
    echo "2";
    // Set parameter values
    $grpid = $_POST['grpid'];
    $acid = $_POST['acid'];
    $ac_name = strtoupper($_POST['ac_nam']);
    $ac_grp_nam = strtoupper($_POST['grpnames']);
    //$billset = (substr($_POST['billwise'],1) == "Y") ? '1' : '0';
    $billwise = $_POST['billwise'];
    $print_name = strtoupper($_POST['forme']);
    
    //$ac_op_bal = $_POST['ac_op_bal'];
    $add1 = $_POST['add1'];
    $location = $_POST['location'];
    $area = $_POST['area'];
    $pin = $_POST['pin'];
    $email = $_POST['email-id'];
    $ph = $_POST['contact-no'];
    $cell = $_POST['cell-no'];
    $ac_cr_limt = isset($_POST['ac_cr_limt']) ? intval($_POST['ac_cr_limt']) : 0;
    $ac_cr_days = isset($_POST['ac_cr_days']) ? intval($_POST['ac_cr_days']) : 0;
    //$ac_cr_limt = $_POST['ac_cr_limt'];
    //$ac_cr_days = $_POST['ac_cr_days'];
    //$billwise = $billset;
    $bank_ac_nam = $_POST['bank_acname'];
    $bank_ac_no = $_POST['bank_acno'];
    $bank_nam = $_POST['bank_name'];
    $bank_ifsc = $_POST['ifsc'];
    $bank_ifsc = strtoupper($bank_ifsc);
    $bank_branch = $_POST['bank_brnch'];
    $gstin = $_POST['gst'];
    $gstin = strtoupper($gstin);
    $pan = $_POST['pan'];
    $person_name = $_POST['person_name'];
    $person_cell = $_POST['person_cell'];
    $cmp_id = '1';

    $ac_id = $_POST['acid'];
    $grp_id = $_POST['grpid'];
    $indianDate = date('d-m-Y', strtotime('today'));
    if ($ac_name != "" && $ac_grp_nam != "" && $acid == 0) {
        // Prepare and execute the INSERT SQL statement
        $sql = "INSERT INTO `accts`(`ac_name`, `print_name`, `grpid`, `ac_grp_nam`, `maj_id`, 
    `ac_op_bal`, `add1`, `location`, `area`, `pin`, `cr`, `email`, `ph`, 
    `cell`, `ac_cr_limt`, `ac_cr_days`, `billwise`, 
    `bank_ac_nam`, `bank_ac_no`, `bank_nam`, `bank_ifsc`, `bank_branch`, `gstin`, `pan`,
    `person_name`, `person_cell`, `cmp_id`) VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "sssssssssssssssssssssssssss",
                $ac_name,
                $print_name,
                $grpid,
                $ac_grp_nam,
                $maj_id,
                $ac_op_bal,
                $add1,
                $location,
                $area,
                $pin,
                $cr,
                $email,
                $ph,
                $cell,
                $ac_cr_limt,
                $ac_cr_days,
                $billwise,
                $bank_ac_nam,
                $bank_ac_no,
                $bank_nam,
                $bank_ifsc,
                $bank_branch,
                $gstin,
                $pan,
                $person_name,
                $person_cell,
                $cmp_id
            );

            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            // header("Location:../ledger");
        } else {
            echo "Error: " . $conn->error;
        }
    } elseif ($ac_name != "" && $ac_grp_nam != "" && $acid > 0) {

        //edit ledger --------------------------------------------------------------------

        //---------------------  edit ledger ---------------------------------------

        // Assuming you have already established a database connection ($conn) and defined your variables.

        // Define the SQL query to update a record in the `accts` table based on a certain condition.
        $sql = "UPDATE `accts` SET 
    `ac_name` = ?,
    `print_name` = ?,
    `grpid` = ?,
    `ac_grp_nam` = ?,
    `maj_id` = ?,
    `ac_op_bal` = ?,
    `add1` = ?,
    `location` = ?,
    `area` = ?,
    `pin` = ?,
    `cr` = ?,
    `email` = ?,
    `ph` = ?,
    `cell` = ?,
    `ac_cr_limt` = ?,
    `ac_cr_days` = ?,
    `billwise` = ?,
    `bank_ac_nam` = ?,
    `bank_ac_no` = ?,
    `bank_nam` = ?,
    `bank_ifsc` = ?,
    `bank_branch` = ?,
    `gstin` = ?,
    `pan` = ?,
    `person_name` = ?,
    `person_cell` = ?
    WHERE `id` = ?"; // Update based on the cmp_id

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param(
                "ssssssssssssssssssssssssssi",
                $ac_name,
                $print_name,
                $grpid,
                $ac_grp_nam,
                $maj_id,
                $ac_op_bal,
                $add1,
                $location,
                $area,
                $pin,
                $cr,
                $email,
                $ph,
                $cell,
                $ac_cr_limt,
                $ac_cr_days,
                $billwise,
                $bank_ac_nam,
                $bank_ac_no,
                $bank_nam,
                $bank_ifsc,
                $bank_branch,
                $gstin,
                $pan,
                $person_name,
                $person_cell,
                $ac_id
            );

            // Execute the update statement
            if ($stmt->execute()) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
            // header("Location:../ledger");
        } else {
            echo "Error: " . $conn->error;
        }


        //------------- edit ledger end --------------------------------------------------
    }
    // Close the database connection
    // $conn->close();
}

?>