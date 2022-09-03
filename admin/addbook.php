<?php
session_start();
if (!$_SESSION['name']) {
    header("LOCATION: login.php");
}

$name = $_SESSION['name'];


include '../connect.php';
include 'main.php';


?>




<br><h1 style="text-align: center;">Please Enter Book Details</h1><br><br>


<form action="addbook1.php" method="POST" enctype="multipart/form-data">

    <div class="row g-2">
       

        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="b_name" id="b_name" placeholder="Bookname" required>
                <label for="book_name"> Book Name </label>
            </div>
        </div>
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>
                <label for="description"> Description </label>
            </div>
        </div>

       
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="author" id="author" placeholder="Author" required>
                <label for="author"> Author </label>
            </div>
        </div>

      
    </div>

    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">

                <input type="text" class="form-control" name="category" id="category" placeholder="Category" required>
                <label for="category"> Category </label>
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

                <input type="file" class="form-control" name="file" id="file" required>
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

<script>
    function GetDetail(str) {
        if (str.length == 0) {
            document.getElementById("b_name").value = "";
            document.getElementById("description").value = "";
            document.getElementById("quantity").value = "";
            document.getElementById("author").value = "";
            document.getElementById("year").value = "";
            document.getElementById("category").value = "";
            document.getElementById("language").value = "";
            document.getElementById("file").value = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                if (this.readyState == 4 &&
                    this.status == 200) {

                    var myObj = JSON.parse(this.responseText);


                    document.getElementById("b_name").value = myObj[0];
                    document.getElementById("description").value = myObj[1];

                    document.getElementById("author").value = myObj[3];
                    document.getElementById("year").value = myObj[4];
                    document.getElementById("category").value = myObj[5];
                    document.getElementById("language").value = myObj[6];
                    document.getElementById("file").value = myObj[7];
                }
            };

            xmlhttp.open("GET", "getbookdetails1.php?isbn=" + str, true);

            xmlhttp.send();
        }
    }
</script>

</body>

</html>