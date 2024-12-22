<?php
if (isset($_POST['submit'])) {
    $ate = $_POST['ate'];
    $water = $_POST['water'];
    $money = $_POST['money'];

    $con = mysqli_connect("localhost", "root", "", "db_system") or die("Connection error");

    // Create table if it doesn't exist
    $create_tbl = "CREATE TABLE IF NOT EXISTS db_food (
        id INT AUTO_INCREMENT PRIMARY KEY,
        food VARCHAR(255) NOT NULL,
        water FLOAT NOT NULL,
        money_spent FLOAT NOT NULL
    )";
    mysqli_query($con, $create_tbl);

    // Insert data into the table
    $stmt = $con->prepare("INSERT INTO db_food (food, water, money_spent) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $ate, $water, $money);

    if ($stmt->execute()) {
        echo "<h1>Data successfully inserted!</h1>";
    } else {
        echo "<h1>Insertion failed: " . $stmt->error . "</h1>";
    }

    $stmt->close();
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Food Data Submission</title>
</head>
<body>
    <h1>Go back to the homepage:</h1>
    <a href="../code/index/index.php"><b>Homepage</b></a>
</body>
</html>
