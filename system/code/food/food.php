<?php
include("header.php");
?>
<div class="content">
    <form action="/system/admin/admin_food.php" method="post">
        <label for="ate">What you ate today:</label>
        <input type="text" name="food" id="ate" required><br><br>

        <label for="water">How much water you drank (liters):</label>
        <input type="text" name="water" id="water" required><br><br>

        <label for="money">How much money you spent today:</label>
        <input type="text" name="money_spent" id="money" required><br><br>

        <input type="submit" name="submit" value="Submit"><br><br>
        To view your watchlist click here: 
        <a href="food_list.php">
            <b style="color:white; margin:5px; padding:10px 20px; border:1px solid #007bff; background-color:#007bff; border-radius:5px; text-decoration:none; display:inline-block;">
                Watchlist
            </b>
        </a>
    </form>
</div>
<?php
include("footer.php");
?>