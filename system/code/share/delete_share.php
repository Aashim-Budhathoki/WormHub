<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the record
    $query = "DELETE FROM db_share WHERE id=$id";
    mysqli_query($con, $query);

    header("Location: share.php");
}
mysqli_close($con);
?>
