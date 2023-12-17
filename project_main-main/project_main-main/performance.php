<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include_once "get_performance_data.php"; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var vendors = [];
            var profits = [];
            var losses = [];

            // Loop through each data object and collect vendor, profit, and loss data
            <?php foreach ($vendorData as $data): ?>
                vendors.push('<?php echo $data['vendorName']; ?>');
                profits.push(<?php echo $data['profit']; ?>);
                losses.push(<?php echo $data['loss']; ?>);
            <?php endforeach; ?>

            // Find the index of the vendor with the maximum profit
            var maxProfitIndex = profits.indexOf(Math.max(...profits));

            // Display the name of the vendor with the highest profit in the header
            document.getElementById('bestSupplierHeader').innerText = 'Current Best Supplier: ' + vendors[maxProfitIndex];

            // Create the grouped bar chart for all vendors
            var ctx = document.getElementById('allVendorsBarGraph').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: vendors,
                    datasets: [
                        {
                            label: 'Profit',
                            data: profits,
                            backgroundColor: 'green',
                        },
                        {
                            label: 'Loss',
                            data: losses,
                            backgroundColor: 'red',
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>

    <!-- Display the best supplier in the header -->
    <h2 id="bestSupplierHeader"></h2>

    <!-- Add a canvas for the grouped bar chart for all vendors -->
    <canvas id="allVendorsBarGraph" width="400" height="200"></canvas>
</body>
</html>
