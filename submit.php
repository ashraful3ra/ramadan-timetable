<?php
// Connect to your database (replace with your database credentials)
$servername = "localhost";
$username = "mrashraf_time";
$password = "48Z2?rNNJHM*";
$dbname = "mrashraf_time";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$date = $_POST['date'];
$day = $_POST['day'];
$sehri_time = $_POST['sehri_time'];
$iftar_time = $_POST['iftar_time'];
$ramadan_no = $_POST['ramadan_no'];

// Format time values if needed
$sehri_time = date("H:i:s", strtotime($sehri_time));
$iftar_time = date("H:i:s", strtotime($iftar_time));

// Insert data into the database
$sql = "INSERT INTO ramadan_forms (date, day, sehri_time, iftar_time, ramadan_no)
        VALUES ('$date', '$day', '$sehri_time', '$iftar_time','$ramadan_no')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
