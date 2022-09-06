<?php
session_start();
if (!$_SESSION['name']) {
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];
include '../connect.php';
include 'main.php';




$id = $_GET["id"];



$result = mysqli_query($con, "select * from files where id=$id");
$row = mysqli_fetch_array($result);

?>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>





<h1 style="text-align: center;">Edit Form</h1>
<form action="editbook1.php" method="POST" enctype="multipart/form-data">

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <select class="form-control" name="category" id="category" placeholder="Category" required>
                    <option <?php if ($row['category'] == 'book') {
                                echo 'selected';
                            } ?> value="book">Book</option>
                    <option <?php if ($row['category'] == 'art') {
                                echo 'selected';
                            } ?> value="art">Art</option>
                    <option <?php if ($row['category'] == 'audio') {
                                echo 'selected';
                            } ?> value="audio">Audio</option>
                    <option <?php if ($row['category'] == 'video') {
                                echo 'selected';
                            } ?> value="video">Video</option>
                </select>
                <label> Category </label>
            </div>
        </div>


    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="name" id="b_name" placeholder="Name" value="<?php echo $row['name'] ?>" required>
                <label for="book_name">Name </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $row['description'] ?>">
                <label for="description"> Description </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="link" id="Link" placeholder="Link" value="<?php echo $row['link'] ?>">
                <label for="Link"> Link </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?php echo $row['author'] ?>">
                <label for="author"> Author </label>
            </div>
        </div>


    </div>

    <div class="row g-2">


        <div class="col-md">
            <div><label for="file"> Thumbnail </label>

                <input type="file" accept="image/*" class="form-control" name="thumbnail" id="thumbnail">
            </div>
        </div>

        <div class="col-md">
            <div><label for="file"> File </label>

                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div>

    </div>

    <div class="col-md" style="margin-top: 20px;">
        <input type="submit" class="btn btn-md btn-success form-control" value="Update" name="submit">
    </div>
    </div>

</form>



</body>

</body>

</html>