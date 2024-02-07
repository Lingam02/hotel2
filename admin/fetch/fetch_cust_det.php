<?php
include('../db_connect.php');

$id = $_POST['id'];
$query = "SELECT * FROM customer_booking_det WHERE booking_id = '" . $id . "'";
$result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    $rows = array();
  
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
  
    echo json_encode($rows);
  } else {
    echo "No items found.";
  }
  
  mysqli_close($conn);

  