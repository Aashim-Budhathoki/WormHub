<?php
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast to int for safety

    // Fetch the food data
    $stmt = $con->prepare("SELECT * FROM db_food WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Use the updated column names
        $food = $row['food']; // Changed from 'ate' to 'food'
        $water = $row['water']; // Assuming this column name remains the same
        $money_spent = $row['money_spent']; // Changed from 'money' to 'money_spent'
    } else {
        // Handle the case where no record is found
        die("No record found.");
    }

    // Update the food record
    if (isset($_POST['update'])) {
        $new_food = $_POST['food']; // Use 'food' as the name in the form
        $new_water = $_POST['water'];
        $new_money_spent = $_POST['money_spent']; // Use 'money_spent' as the name in the form

        // Ensure the column names in the UPDATE statement match your database
        $update_stmt = $con->prepare("UPDATE db_food SET food=?, water=?, money_spent=? WHERE id=?");
        $update_stmt->bind_param("ssii", $new_food, $new_water, $new_money_spent, $id);
        $update_stmt->execute();

        header("Location: food_list.php"); // Correct the redirect URL
        exit();
    }
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Food Item</title>
</head>
<body>
    <form method="POST">
        <label>What I Ate:</label>
        <input type="text" name="food" value="<?php echo htmlspecialchars($food); ?>" required><br>
        <label>Water Intake (Liters):</label>
        <input type="text" name="water" value="<?php echo htmlspecialchars($water); ?>" required><br>
        <label>Amount Spent:</label>
        <input type="text" name="money_spent" value="<?php echo htmlspecialchars($money_spent); ?>" required><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>