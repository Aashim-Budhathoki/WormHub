<?php
  include("header.php");
?>

    <div class="content"> 
        <form method="POST" action="/system/admin/admin_share.php">
            <label for="symbols">Enter the stock symbol:</label>
            <input type="text" name="symbols" required id="symbols"/><br>
            
            <label for="kittanum">Enter the amount of Kitta:</label>
            <input type="number" name="kittanum" required id="kittanum"/><br>
            
            <label for="amount">Enter the amount of total purchase:</label>
            <input type="number" name="amount" required id="amount"/><br>
            
            <input type="submit" name="submit" value="Submit"/><br>
            To view your watchlist click here: 
            <a href="watchlist.php">
               <b style="color:white; margin:5px; padding:10px 20px; border:1px solid #007bff; background-color:#007bff; border-radius:5px; text-decoration:none; display:inline-block;">
                  Watchlist
               </b>
            </a>
       </form>
      </div>
<?php
   include("footer.php");
?>