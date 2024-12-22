<?php
 if(isset($_POST['submit'])){
    $symbols = $_POST['symbols'];
    $kittanum = $_POST['kittanum'];
    $amount = $_POST['amount'];

   // echo "Symbols:".$symbols. "</br>";
    //echo "Number of kitta:".$kittanum. "</br>";
    //echo "Amount:".$amount."</br>";

    $wacc= $amount/$kittanum;
    //echo "Your Wacc for the"." ".$symbols." "."is:".$wacc."</br>";

    $con= mysqli_connect("localhost","root","","db_system") or die ("Connection error");
    //echo "Connection successfully established";
    $create_tbl="CREATE TABLE IF NOT EXISTS db_share(
       id int AUTO_INCREMENT PRIMARY KEY,
       symbols VARCHAR(50) NOT NULL,
       kittanum VARCHAR(100) NOT NULL,
       amount int,
       wacc VARCHAR(100)
      )";
     if(mysqli_query($con,$create_tbl)){
      //echo "Table Creation Successful";
     }else{
      //echo "Error".mysqli_error($con)."</br>";
     }
     
    $insert= "INSERT INTO db_share(symbols, kittanum, amount, wacc)
    VALUES('$symbols','$kittanum', '$amount', '$wacc')";
    if (mysqli_query($con, $insert)){
      //echo "Insertion successfull";
    }else{
      //echo "Failed while inserting".mysqli_error($con)."</br>";
    }
}
?>
<!DOCTYPE html>
<html>
   <head>
      <title> Admin Share </title>
   </head>
   <body>
      <h1> Successfully inserted your data.</h1>
      Click here to go back to the main page: <a href="../code/index/index.php"> Index </a>
   </body>
</html>