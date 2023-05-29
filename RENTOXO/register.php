<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['username'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $password = $_POST['pass'];

  // Your database connection code
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "login_form_23";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Perform the registration by inserting the user details into the database
  // You should validate and sanitize user inputs before using them in SQL queries
  $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$username', '$phone', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    // Registration successful
    echo "Registration successful!";
  } else {
    // Registration failed
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
