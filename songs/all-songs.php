<!DOCTYPE html>
<html lang="en">

<head>
  <title>Songs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    a {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">BipinNalini</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="#"><a href="../books/allbooks.php">Books</a></li>
        <li class="active"><a href="active">Music</a></li>
        <li><a href="../art/art.html">Arts</a></li>
      </ul>
      <a class="btn btn-danger navbar-btn" href ="../index.html">Home</a> 
    </div>
  </nav>

  <div class="container">
    <h2>All Songs</h2>
  <br>
    <div class="row">

      <?php
      include '../connect.php';

      $result = mysqli_query($con, "select * from files where category='audio'");
      while ($row = mysqli_fetch_array($result)) {
      ?>

        <div class="col-md-3">
          <div class="thumbnail">
            <a href="../admin/<?php echo $row['file']; ?>" target="_blank">
              <img src= "../admin/<?php echo $row['thumbnail']; ?>"   class="img-fluid">
              <div class="caption">
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
              
              </div>
            </a>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</body>

</html>

