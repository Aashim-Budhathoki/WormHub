<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record to edit
    $query = "SELECT * FROM admin_travel WHERE id=$id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $spend = $row['spend'];
        $busfare = $row['busfare'];
        $destination = $row['destination'];
    }

    // Update the record
    if (isset($_POST['update'])) {
        $new_spend = $_POST['spend'];
        $new_busfare = $_POST['busfare'];
        $new_destination = $_POST['destination'];

        $update_query = "UPDATE admin_travel SET spend='$new_spend', busfare='$new_busfare', destination='$new_destination' WHERE id=$id";
        mysqli_query($con, $update_query);

        header("Location: travel_list.php");
    }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Travel Data</title>
</head>
<body>
    <form method="POST">
        <label>Money Spent:</label>
        <input type="text" name="spend" value="<?php echo $spend; ?>" required><br>
        <label>Bus Fare:</label>
        <input type="text" name="busfare" value="<?php echo $busfare; ?>" required><br>
        <label>Destination:</label>
        <input type="text" name="destination" value="<?php echo $destination; ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
