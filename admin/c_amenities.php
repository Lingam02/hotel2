<?php
include('db_connect.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $amenityName = $_POST['amenityName'];
  $amenityDescription = $_POST['amenityDescription'];

  // Check if amenity already exists
  $stmt_check = $conn->prepare("SELECT * FROM amenities WHERE amenities = ?");
  $stmt_check->bind_param("s", $amenityName);
  $stmt_check->execute();
  $result_check = $stmt_check->get_result();

  if ($result_check->num_rows > 0) {
      echo "<script>alert('This Name already exists! Try Another');</script>";
  } else {
      // Prepare and bind SQL statement
      $stmt = $conn->prepare("INSERT INTO amenities (amenities, descrip) VALUES (?, ?)");
      $stmt->bind_param("ss", $amenityName, $amenityDescription);

      // Execute SQL statement
      if ($stmt->execute() === TRUE) {
          echo "<script>alert('Amenity added successfully');</script>";
      } else {
          echo "<script>alert('Error adding amenity: " . $stmt->error . "');</script>";
      }

      // Close statement
      $stmt->close();
  }

  // Close statement and connection
  $stmt_check->close();
  $conn->close();
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="mb-4">Add Amenities</h2>
      <form method="post" action="">
        <div class="form-group">
          <label for="amenityName">Amenity Name</label>
          <input type="text" class="form-control" name="amenityName" id="amenityName" placeholder="Enter Amenity Name">
        </div>
        <div class="form-group">
          <label for="amenityDescription">Description</label>
          <textarea class="form-control" name="amenityDescription" id="amenityDescription" rows="3" placeholder="Enter Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Amenity</button>
      </form>
    </div>
  </div>
</div>