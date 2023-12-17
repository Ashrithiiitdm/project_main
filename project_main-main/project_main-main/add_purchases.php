<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purchases</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            text-align: center;
            background-color: darkslategray;
            color: aliceblue;
            padding: 10px;
            border-radius: 10px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: darkslategray;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Add Purchases</h1>
    </header>

    <form action="insert.php" method="post">
        <label for="vendorname">Vendor Name:</label>
        <input type="text" name="vendor_name" id="vendorname" required>

        <label for="vendorid">Vendor ID:</label>
        <input type="number" name="vendor_id" id="vendorid" required>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type" required>

        <label for="brand">Brand:</label>
        <input type="text" name="brand" id="brand" required>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>

        <label for="size">Size:</label>
        <input type="number" name="size" id="size" required>

        <label for="volume">Volume:</label>
        <input type="number" name="volume" id="volume" required>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>

        <label for="date">Date:</label>
        <input type="text" name="date" id="date" required>

        <label for="totalcost">Total Cost:</label>
        <input type="number" name="total_cost" id="totalcost" required>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status" required>

        <input type="submit" value="Submit">
    </form>
</body>

</html>
