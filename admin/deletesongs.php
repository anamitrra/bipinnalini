<?php


include '../connect.php';

    $id=$_GET["id"];


    $sql = "DELETE FROM files WHERE id='$id' AND category = 'audio' ";

    
    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("location:viewsongs.php");
      } else {
        echo "Error deleting record: " . $con->error;
      }
      $con->close();
      ?>