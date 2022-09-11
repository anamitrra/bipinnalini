<?php
session_start();
if (!$_SESSION['name']) {
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];


include '../connect.php';
include 'main.php';


?>




<br>
<h1 style="text-align: center;">Please Enter File Details</h1><br><br>


<form action="add1.php" method="POST" enctype="multipart/form-data">

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <select class="form-control" name="category" id="category" placeholder="Category" required>
                <option value="">Choose...</option>
                    <option value="book">Book</option>
                    <option value="audio">Audio</option>
                  
                </select>
                <label> Category </label>
            </div>
        </div>


    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="name" id="b_name" placeholder="Bookname" required>
                <label for="book_name">Name </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                <label for="description"> Description </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="link" id="Link" placeholder="Link">
                <label for="Link"> Link </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="author" id="author" placeholder="Author">
                <label for="author"> Author </label>
            </div>
        </div>


    </div>

    <div class="row g-2">


        <div class="col-md">
            <div><label for="file"> Thumbnail </label>

                <input type="file" accept="image/*" class="form-control" name="thumbnail" id="thumbnail" required>
            </div>
        </div>

        <div class="col-md">
            <div><label for="file"> File </label>

                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div>

    </div>

    <div class="col-md" style="margin-top: 20px;">
        <input type="submit" class="btn btn-md btn-success form-control" value="Add Book" name="submit">
    </div>
    </div>

</form>

</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">

        <div class="text-muted">Copyright &copy; bipinnalini 2022</div>

    </div>
</footer>

</body>

</html>