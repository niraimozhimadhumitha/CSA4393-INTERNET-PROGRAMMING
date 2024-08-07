<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "form";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $user = $_POST["username"];
    $pass = $_POST["password"];

    // Check if username already exists
    $check = "SELECT * FROM login WHERE username='$user' and password='$pass'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        echo "Authentication Verified";
        header('Location: loginform.html'); 
        exit;
    } else {
        echo "Access Denied " . $check . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>