<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST["username"];
    $emai=$_POST["email"]
    $password = $_POST["password"];

    // Insert data into the database (assuming you have a table named 'users' with columns 'username' and 'password')
    $sql = "INSERT INTO login (Username,email, Password) VALUES ('$username', '$email',$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>