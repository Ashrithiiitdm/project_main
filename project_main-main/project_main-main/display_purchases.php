<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: darkslategray;
            color: #fff;
        }
   
    </style>
</head>
<?php
include_once "dbconn.php";

// Get the status from the query parameter
$status = isset($_GET['status']) ? $_GET['status'] : 'ongoing';

// Fetch data from the purchases table based on the status
if ($status === 'past') {
    $sql = "SELECT * FROM purchases WHERE status = 'bought'";
} else {
    $sql = "SELECT * FROM purchases WHERE status != 'bought'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<thead><tr><th>Vendor Name</th><th>Vendor ID</th><th>Type</th><th>Brand</th><th>Description</th><th>Size</th><th>Volume</th><th>Price</th><th>Date</th><th>Total Cost</th><th>Status</th></tr></thead><tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['vendor_name'] . "</td>";
        echo "<td>" . $row['vendor_id'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td>" . $row['brand'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['size'] . "</td>";
        echo "<td>" . $row['volume'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['total_cost'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
