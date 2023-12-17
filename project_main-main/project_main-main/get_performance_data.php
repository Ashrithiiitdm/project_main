<?php
include_once "dbconn.php";

// Fetch distinct vendor names
$sqlVendors = "SELECT DISTINCT vendor_name FROM purchases";
$resultVendors = mysqli_query($conn, $sqlVendors);

// Initialize an array to store vendor data
$vendorData = [];

while ($vendorRow = mysqli_fetch_assoc($resultVendors)) {
    $vendorName = $vendorRow['vendor_name'];

    // Fetch data for profit and loss for each vendor
    $sqlGraph = "SELECT SUM(CASE WHEN status = 'bought' THEN total_cost ELSE 0 END) AS profit, 
                         SUM(CASE WHEN status != 'bought' THEN total_cost ELSE 0 END) AS loss 
                 FROM purchases
                 WHERE vendor_name = '$vendorName'";
    $resultGraph = mysqli_query($conn, $sqlGraph);
    $dataGraph = mysqli_fetch_assoc($resultGraph);

    // Add vendor data to the array
    $vendorData[] = [
        'vendorName' => $vendorName,
        'profit' => $dataGraph['profit'],
        'loss' => $dataGraph['loss'],
    ];
}

echo json_encode($vendorData);

mysqli_close($conn);
?>
