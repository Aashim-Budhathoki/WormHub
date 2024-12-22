<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast to int for safety

    // Delete the record
    $query = "DELETE FROM db_food WHERE id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: food_list.php");
    exit();
}
mysqli_close($con);
?>