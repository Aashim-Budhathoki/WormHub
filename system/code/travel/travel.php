<?php
  include("header.php");
?>
    <div>
        <form class="content" action="/system/admin/admin_travel.php" method="post">
          How much did you spend today?<input type="text" name="spend"></br>
          What's the bus fare today you travelled? <input type="text" name="busfare"></br>
          Where is your next destination? <input type="text" name="destination"></br>
          <input type="submit" name="submit" value="Submit"></br>
          To view your watchlist click here: 
         <a href="travel_list.php">
          <b style="color:white; margin:5px; padding:10px 20px; border:1px solid rgb(70, 123, 179); background-color:#007bff; border-radius:5px; text-decoration:none; display:inline-block;">
            Watchlist
          </b>
         </a>
        </form>
</div>
<?php
  include("footer.php");
?>