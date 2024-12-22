<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $query = "DELETE FROM admin_travel WHERE id=$id";
    mysqli_query($con, $query);

    header("Location: travel_list.php");
}
mysqli_close($con);
?>
