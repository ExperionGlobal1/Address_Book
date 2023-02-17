
<?php
//how to connect with database
 $serverName= "localhost";
 $userName= "root";
 $Password ="Experion@123";
 $db="address_book";

$conn = mysqli_connect($serverName,$userName,$Password,$db);
  if($conn){
    // echo "connection success!<br>";
  }
  else{
    echo "connection failed!";
}

?>