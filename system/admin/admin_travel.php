<?php
if (isset($_POST['submit'])) {
    $spend = $_POST['spend'];
    $busfare = $_POST['busfare'];
    $destination = $_POST['destination'];

    $con = mysqli_connect("localhost", "root", "", "db_system") or die("Connection error");

    // Create table if not exists
    $create_tbl = "CREATE TABLE IF NOT EXISTS admin_travel (
        id INT PRIMARY KEY AUTO_INCREMENT,
        spend VARCHAR(50),
        busfare VARCHAR(50),
        destination VARCHAR(50)
    )";

    if (mysqli_query($con, $create_tbl)) {
        // Table creation successful
    } else {
        echo "Error creating table: " . mysqli_error($con) . "<br>";
    }

    // Insert data into the table
    $insert = "INSERT INTO admin_travel (spend, busfare, destination) VALUES ('$spend', '$busfare', '$destination')";

    if (mysqli_query($con, $insert)) {
        echo "Insertion successful<br>";
    } else {
        echo "Error inserting: " . mysqli_error($con) . "<br>";
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Go back to homepage</title>
    </head>
    <body>
        Go back to homepage <a href="../code/index/index.php"><b>Go back to homepage</b> </a>
    </body>
</html>
