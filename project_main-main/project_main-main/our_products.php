<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Final</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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
            display: inline-block;
            margin-top: 10px;
        }

        input[type='text'], input[type='submit'] {
            margin: 5px;
            padding: 8px;
            width: 150px;
        }

        input[type='submit'] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
include_once "dbconn.php";

// Copy values from purchases table to inventory_final_product table if they don't exist
$sqlCopyValues = "INSERT INTO inventory_final_product(description, size, volume, price, production_date, expiry_date, status)
SELECT p.description, p.size, p.volume, p.price, '', p.expiry_date, '' 
FROM purchases p
LEFT JOIN inventory_final_product i ON p.description = i.description
WHERE i.description IS NULL";
$resultCopyValues = mysqli_query($conn, $sqlCopyValues);

if ($resultCopyValues) {
    // echo "Values copied successfully.";
} else {
    echo "Error copying values: " . mysqli_error($conn);
}

// Update records if the form is submitted for status and production date
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    // Check if production date is set
    if (isset($_POST['production_date'])) {
        $productionDate = $_POST['production_date'];
        $sqlUpdateProductionDate = "UPDATE inventory_final_product SET production_date = '$productionDate' WHERE description = '$description'";
        $resultUpdateProductionDate = mysqli_query($conn, $sqlUpdateProductionDate);

        if ($resultUpdateProductionDate) {
            // echo "Production date updated successfully.";
        } else {
            echo "Error updating production date: " . mysqli_error($conn);
        }
    }

    // Check if status is set
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        $sqlUpdateStatus = "UPDATE inventory_final_product SET status = '$status' WHERE description = '$description'";
        $resultUpdateStatus = mysqli_query($conn, $sqlUpdateStatus);

        if ($resultUpdateStatus) {
            // echo "Status updated successfully.";
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    }
}

// Fetch data from the inventory_final_product table
$sqlInventoryFinal = "SELECT * FROM inventory_final_product";
$resultInventoryFinal = mysqli_query($conn, $sqlInventoryFinal);


echo "<h2>Inventory Final</h2>";

if (mysqli_num_rows($resultInventoryFinal) > 0) {
    echo "<table>";
    echo "<thead><tr><th>Description</th><th>Size</th><th>Volume</th><th>Price</th><th>Production Date</th><th>Expiry Date</th><th>Status</th><th>Action</th></tr></thead><tbody>";

    $index = 0; // Initialize the index counter

    while ($row = mysqli_fetch_assoc($resultInventoryFinal)) {
        echo "<tr>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['size'] . "</td>";
        echo "<td>" . $row['volume'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td><input type='text' name='production_date' value='" . $row['production_date'] . "'></td>";
        echo "<td>" . $row['expiry_date'] . "</td>";
        echo "<td><input type='text' name='status' value='" . $row['status'] . "'></td>";
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='description' value='" . $row['description'] . "'>";
        echo "<input type='text' name='production_date' value='" . $row['production_date'] . "'>";
        echo "<input type='submit' name='update_production_date' value='Update ProductionDate'>";
        echo "<input type='text' name='status' value='" . $row['status'] . "'>";
        echo "<input type='submit' name='update_status' value='Update Status'>";
        echo "</form>";
        echo "</td>";


        $index++; // Increment the index counter
    }

    echo "</tbody></table>";
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
</body>
</html>
