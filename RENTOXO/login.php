<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

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

  // Perform the login check using the provided email and password
  // You should validate and sanitize user inputs before using them in SQL queries
  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // Login successful
    echo "Login successful!";
  } else {
    // Login failed
    echo "Invalid email or password.";
  }

  $conn->close();
}
?>
