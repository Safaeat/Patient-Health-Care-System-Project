<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed: " . $conn->connect_error);
} else {
  // Retrieve appointments from the database
  $sql = "SELECT * FROM phs";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $appointments = array();

    // Fetch each appointment as an associative array
    while ($row = $result->fetch_assoc()) {
      $appointment = array(
        'name' => $row['name'],
        'email' => $row['email'],
        'number' => $row['number'],
        'hname' => $row['hname'],
        'id' => $row['id'],
        'comment' => $row['comment']
      );

      $appointments[] = $appointment;
    }

    // Convert the array to JSON and send the response
    header('Content-Type: application/json');
    echo json_encode($appointments);
  } else {
    echo "No appointments found.";
  }

  $conn->close();
}
?>
