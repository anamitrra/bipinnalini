<?php


$server = "localhost";
$username = "root";
$password = "";
$database = "bipinnalini";

$conn=mysqli_connect($server,$username,$password,$database)or die("can't connect...");


    $id=$_GET["id"];


    $sql = "DELETE FROM files WHERE id='$id' AND category = 'book' ";

    
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:viewbook.php");
      } else {
        echo "Error deleting record: " . $conn->error;
      }
      $conn->close();
      ?>