<?php
  if(isset($_GET['id'])) 
  {
  // $serverName= "localhost";
  // $userName= "root";
  // $Password ="Experion@123";
  // $db="address_book";

// connect with database
include 'connection.php';

// Create connection
// $conn = new mysqli($servername, $userName, $Password, $db);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }



    $id = $_GET['id'];
    $sql = "DELETE FROM contacts WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
      header("Location: Dashboard.php");
    } else {
      echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
  }
?>
