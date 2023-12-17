<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check purchases</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            background-color: darkslategray;
            color: aliceblue;
            padding: 10px;
            border-radius: 10px;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10vh;
        }

        button {
            display: inline-block;
            margin: 10px;
            color: #fff;
            background-color: #3498db;
            border: none;
            border-radius: 10px;
            padding: 20px 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Check Purchases</h1>
    </header>
    <section>
        <div>
            <button onclick="redirectToOngoing()">Ongoing</button>
            <script>
                function redirectToOngoing() {
                    window.location.href = 'display_purchases.php?status=ongoing';
                }
            </script>
        </div>
        <div>
            <button onclick="redirectToPast()">Past Purchases</button>
            <script>
                function redirectToPast() {
                    window.location.href = 'display_purchases.php?status=past';
                }
            </script>
        </div>
        <div>
            <button onclick="redirectToAdd()">Add Purchases</button>
            <script>
                function redirectToAdd() {
                    window.location.href = 'add_purchases.php'; // Navigate to a new HTML page for adding purchases
                }
            </script>
        </div>
    </section>
</body>

</html>
