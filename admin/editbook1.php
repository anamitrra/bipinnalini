<?php


include '../connect.php';

$id= $_POST["id"];
$name = $_POST["name"];
$description = mysqli_real_escape_string($con, $_POST["description"]);
$author = $_POST["author"];
$category = $_POST["category"];
$link = $_POST["link"];
$thumbnail = $_FILES["thumbnail"];
$file = $_FILES["file"];
if (isset($_POST['submit'])) {


	$thumbnail_name = $thumbnail['name'];
	$thumbnail_error = $thumbnail['error'];
	$thumbnail_temp = $thumbnail['tmp_name'];
	$thumbnail_type = $thumbnail['type'];
	$thumbnail_size = $thumbnail['size'];

	$thumbnail_Ext = explode('.', $thumbnail_name);
	$thumbnail_ActualEXt = strtolower(end($thumbnail_Ext));

	$allowed = array('jpg', 'jpeg', 'png');

	$thumbnail_namenew = uniqid('', true) . "." . $thumbnail_ActualEXt;
	$thumbnail_destination = 'uploads/thumbnails/' . $thumbnail_namenew;
	move_uploaded_file($thumbnail_temp, $thumbnail_destination);

	if ($_FILES["file"] == null) {

		$filedestination = null;
	} 
	
	else {
		

		$filename = $file['name'];
		$fileerror = $file['error'];
		$filetemp = $file['tmp_name'];
		$filetype = $file['type'];
		$filesize = $file['size'];

		$fileExt = explode('.', $filename);
		$fileActualEXt = strtolower(end($fileExt));

		$filenamenew = uniqid('', true) . "." . $fileActualEXt;
		$filedestination = 'uploads/files/' . $filenamenew;
		move_uploaded_file($filetemp, $filedestination);

	}

				// $query = "update books set  b_name='$b_name', b_description='$b_description', author='$author', year='$year', category='$category', photo='$filedestination', language='$language' where isbn ='$isbn'  ";
				$query = "UPDATE files SET   name = '$name', description = '$description', author = '$author', file = '$filedestination', thumbnail = '$thumbnail_destination', link = '$link' where id = '$id' ";



				if (mysqli_query($con, $query)) {
					header("location:add.php");
				} else {
					echo "There was an error uploading your file. Go back and Try again   ";
					echo mysqli_error($con);
				}
			}
			?>
			