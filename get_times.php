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

// Retrieve sehri and iftar times along with the date from the database
$sql = "SELECT date, sehri_time, iftar_time FROM ramadan_forms WHERE date = CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Combine the date with the sehri and iftar times
    $sehri_datetime = new DateTime($row["date"] . ' ' . $row["sehri_time"]);
    $iftar_datetime = new DateTime($row["date"] . ' ' . $row["iftar_time"]);

    // Convert to ISO 8601 format
    $sehri_time_iso = $sehri_datetime->format(DateTime::ATOM); // Example: "2024-04-24T03:30:00+00:00"
    $iftar_time_iso = $iftar_datetime->format(DateTime::ATOM);

    // Return JSON response
    echo json_encode(array("sehri_time" => $sehri_time_iso, "iftar_time" => $iftar_time_iso));
} else {
    // If no data found for the current date
    echo json_encode(array("error" => "No sehri and iftar times found for today."));
}

$conn->close();
?>
