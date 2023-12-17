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

<body>
    <header>
        <h1>Supplier Information</h1>
    </header>

    <?php
    // Include your database connection file
    include_once "dbconn.php";

    // Fetch data from the purchases table
    $sql = "SELECT * FROM purchases";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead><tr><th>Vendor Name</th><th>Vendor ID</th><th>Type</th><th>Brand</th><th>Description</th></tr></thead><tbody>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['vendor_name'] . "</td>";
            
            echo "<td>" . $row['vendor_id'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['brand'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            // echo "<td>" . $row['size'] . "</td>";
            // echo "<td>" . $row['volume'] . "</td>";
            // echo "<td>" . $row['price'] . "</td>";
            // echo "<td>" . $row['date'] . "</td>";
            // echo "<td>" . $row['total_cost'] . "</td>";
            // echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No data found.";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>

</html>
