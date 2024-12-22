<!DOCTYPE html>
<html>
  <head>
    <title>Worm Hub - Share Management</title>
    <link href="share.css" rel="stylesheet">
  </head>
  <body>
    <div class="header">
      <span>
        <img src="../../assets/bull.jpg" class="logo" alt="worm_hub">
      </span>
      <span class="links">
        <b class="dash">|</b><a href="../index/index.php" style="color:yellow;">HOME</a><b class="dash">|</b>
        <b class="dash">|</b><a href="../share/share.php" style="color:green;">SHARE</a><b class="dash">|</b>
        <b class="dash">|</b><a href="../food/food.php" style="color:red;">FOOD</a><b class="dash">|</b>
        <b class="dash">|</b><a href="../travel/travel.php" style="color:blue;">TRAVEL</a><b class="dash">|</b>
      </span>
    </div>

    <div class="content">
      <h1> Aashim's Share Management </h1>

      <?php 
      $con = mysqli_connect("localhost", "root", "", "db_system");

      if (!$con) {
          die("Connection error: " . mysqli_connect_error());
      }

      // Fetch all share data
      $select = "SELECT * FROM db_share";
      $result = mysqli_query($con, $select);

      if (mysqli_num_rows($result) > 0) {
          echo "<table border='1'>
                  <tr>
                      <th>ID</th>
                      <th>Stock Symbol</th>
                      <th>Number of Kitta</th>
                      <th>Total Amount</th>
                      <th>WACC</th>
                      <th>Actions</th>
                  </tr>";

          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $row['id'] . "</td>
                      <td>" . $row['symbols'] . "</td>
                      <td>" . $row['kittanum'] . "</td>
                      <td>" . $row['amount'] . "</td>
                      <td>" . $row['wacc'] . "</td>
                      <td>
                          <a href='edit_share.php?id=" . $row['id'] . "' style='color:blue;'>Edit</a> | 
                          <a href='delete_share.php?id=" . $row['id'] . "' style='color:red;' onclick='return confirm(\"Are you sure you want to delete this item?\");'>Delete</a>
                      </td>
                    </tr>";
          }

          echo "</table>";
      } else {
          echo "<p>No data found in the table.</p>";
      }

      mysqli_close($con);
      ?>
    </div>

    <div class="footer">
      <p><b>© 2024 Worm Hub. All rights reserved</b></p>
      |<a href="privacypolicy.php">Privacy Policy</a>| 
      |<a href="termsofservice.php">Terms of Service</a>| 
      |<a href="contactus.php">Contact Us</a>|
      <h1>Follow us:</h1>
      |<a href="https://www.facebook.com/">Facebook</a>| 
      |<a href="https://www.instagram.com/">Instagram</a>| 
      |<a href="../index/index.php">Website</a>|
    </div>
  </body>
</html>
