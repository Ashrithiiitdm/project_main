<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file
include_once "dbconn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize
    $vendor_name = mysqli_real_escape_string($conn, $_POST["vendor_name"]);
    $vendor_id = mysqli_real_escape_string($conn, $_POST["vendor_id"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $brand = mysqli_real_escape_string($conn, $_POST["brand"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $size = mysqli_real_escape_string($conn, $_POST["size"]);
    $volume = mysqli_real_escape_string($conn, $_POST["volume"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $total_cost = mysqli_real_escape_string($conn, $_POST["total_cost"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    // Insert data into the database
    $sql = "INSERT INTO purchases(vendor_name, vendor_id, type, brand, description, size, volume, price, date, total_cost, status) VALUES ('$vendor_name', '$vendor_id', '$type', '$brand', '$description', '$size', '$volume', '$price', '$date', '$total_cost', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
