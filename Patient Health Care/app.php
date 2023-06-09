<?php
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$hname = $_POST['hname'];
$id = $_POST['id'];
$comment = $_POST['comment'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Connection Failed: " . $conn->connect_error);
} else {
  $stmt = $conn->prepare("INSERT INTO phs (name, email, number, hname, id, comment) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssisss", $name, $email, $number, $hname, $id, $comment); // Updated type definition string
  $execval = $stmt->execute();
  if ($execval) {
    echo "Registration successful.";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
  $conn->close();
}
?>
