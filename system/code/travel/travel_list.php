<?php
include("header.php");
$con = mysqli_connect("localhost", "root", "", "db_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM admin_travel";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Money Spent</th>
                <th>Bus Fare</th>
                <th>Destination</th>
                <th>Actions</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['spend'] . "</td>
                <td>" . $row['busfare'] . "</td>
                <td>" . $row['destination'] . "</td>
                <td>
                    <a href='edit_travel.php?id=" . $row['id'] . "' style='color:blue;'>Edit</a> | 
                    <a href='delete_travel.php?id=" . $row['id'] . "' style='color:red;' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No travel data found.</p>";
}

mysqli_close($con);
include("footer.php");
?>
