<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the share data
    $query = "SELECT * FROM db_share WHERE id=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $symbols = $row['symbols'];
        $kittanum = $row['kittanum'];
        $amount = $row['amount'];
        $wacc = $row['wacc'];
    }

    // Update the share record
    if (isset($_POST['update'])) {
        $new_symbols = $_POST['symbols'];
        $new_kittanum = $_POST['kittanum'];
        $new_amount = $_POST['amount'];
        $new_wacc = $_POST['wacc'];

        $update_query = "UPDATE db_share SET symbols='$new_symbols', kittanum='$new_kittanum', amount='$new_amount', wacc='$new_wacc' WHERE id=$id";
        mysqli_query($con, $update_query);

        header("Location: share.php");
    }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Share Data</title>
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Form container styles */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        /* Label styles */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Input field styles */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Button styles */
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <form method="POST">
        <label>Stock Symbol:</label>
        <input type="text" name="symbols" value="<?php echo $symbols; ?>" required><br>
        <label>Number of Kitta:</label>
        <input type="text" name="kittanum" value="<?php echo $kittanum; ?>" required><br>
        <label>Total Amount:</label>
        <input type="text" name="amount" value="<?php echo $amount; ?>" required><br>
        <label>WACC:</label>
        <input type="text" name="wacc" value="<?php echo $wacc; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
