<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your database connection details
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "hospital";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Process form data
    $patient = $_POST["patientname"];
    $id = $_POST["patientid"];
    $des = $_POST["description"];
    $cont = $_POST["contact"];

    // Check if username already exists
    $check = "SELECT * FROM login WHERE patientname='$patient' and patientid='$id' and des='$description' and contact='$cont'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        echo "Authentication Verified";
        header('Location: schedule-appointment.html'); 
        exit;
    } else {
        echo "Access Denied " . $check . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>