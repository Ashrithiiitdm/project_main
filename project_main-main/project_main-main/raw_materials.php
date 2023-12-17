<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raw Materials</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #3498db;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            display: flex;
            align-items: center;
        }

        input[type='date'], input[type='submit'] {
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php
    include_once "dbconn.php";

    // Check if the form is submitted for adding expiry date
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $expiryDate = $_POST['expiry_date'];

        // Update the purchases table with the expiry date
        $sqlUpdateExpiry = "UPDATE purchases SET expiry_date = '$expiryDate' WHERE type = '$type'";
        $resultUpdateExpiry = mysqli_query($conn, $sqlUpdateExpiry);

        if ($resultUpdateExpiry) {
            echo "Expiry date added successfully.";
        } else {
            echo "Error adding expiry date: " . mysqli_error($conn);
        }
    }

    // Fetch raw materials with status 'bought' after updating expiry dates
    $sqlRawMaterials = "SELECT * FROM purchases WHERE status = 'bought'";
    $resultRawMaterials = mysqli_query($conn, $sqlRawMaterials);

    echo "<h2>Raw Materials</h2>";

    if (mysqli_num_rows($resultRawMaterials) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Vendor Name</th><th>Vendor ID</th><th>Type</th><th>Brand</th><th>Description</th><th>Size</th><th>Volume</th><th>Price</th><th>Date</th><th>Total Cost</th><th>Status</th><th>Expiry Date</th><th>Action</th></tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($resultRawMaterials)) {
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
            echo "<td>" . $row['expiry_date'] . "</td>";
            echo "<td>";
            echo "<form method='post' action='raw_materials.php'>";
            echo "<input type='hidden' name='type' value='" . $row['type'] . "'>";
            echo "<input type='date' name='expiry_date'>";
            echo "<input type='submit' value='Add Expiry Date'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No raw materials found.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
