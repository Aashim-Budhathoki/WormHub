<?php
include("header.php");

$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all food data
$query = "SELECT * FROM db_food";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>What I Ate</th>
                <th>Water Intake (Liters)</th>
                <th>Amount Spent</th>
                <th>Actions</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['food']) . "</td>
                <td>" . htmlspecialchars($row['water']) . "</td>
                <td>" . htmlspecialchars($row['money_spent']) . "</td>
                <td>
                    <a href='edit_food.php?id=" . $row['id'] . "' style='color:blue;'>Edit</a> | 
                    <a href='delete_food.php?id=" . $row['id'] . "' style='color:red;' onclick='return confirm(\"Are you sure you want to delete this entry?\");'>Delete</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No food data found.</p>";
}

mysqli_close($con);

include("footer.php")
?>