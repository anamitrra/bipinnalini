
<?php

include '../connect.php';

$b_name = $_POST["b_name"];
$b_description = $_POST["description"];
$author = $_POST["author"];
$category = $_POST["category"];
$thumbnail = $_FILES["thumbnail"];
$file = $_FILES["file"];

if (isset($_POST['submit'])) {

	$filename = $file['name'];
	$fileerror = $file['error'];
	$filetemp = $file['tmp_name'];
	$filetype = $file['type'];
	$filesize = $file['size'];

	$thumbnail_name = $thumbnail['name'];
	$thumbnail_error = $thumbnail['error'];
	$thumbnail_temp = $thumbnail['tmp_name'];
	$thumbnail_type = $thumbnail['type'];
	$thumbnail_size = $thumbnail['size'];

	$fileExt = explode('.', $filename);
	$fileActualEXt = strtolower(end($fileExt));

	$thumbnail_Ext = explode('.', $thumbnail_name);
	$thumbnail_ActualEXt = strtolower(end($thumbnail_Ext));

		if ($fileerror === 0 && $thumbnail_error === 0) {
				$filenamenew = uniqid('', true) . "." . $fileActualEXt;
				$filedestination = 'uploads/' . $filenamenew;
				move_uploaded_file($filetemp, $filedestination);

				$thumbnail_namenew = uniqid('', true) . "." . $thumbnail_ActualEXt;
				$thumbnail_destination = 'uploads/' . $thumbnail_namenew;
				move_uploaded_file($thumbnail_temp, $thumbnail_destination);

				$query = "INSERT INTO `files` (`id`, `category`, `name`, `description`, `author`, `file`, `thumbnail`, `link`, `status`, `created_at`) VALUES (NULL, 'book', '$b_name', '$b_description', '$author', '$filedestination', '$thumbnail_destination', 'link', '1', CURRENT_TIMESTAMP) ";

				

				if (mysqli_query($con, $query)) {
					header("location:addbook.php");
				} else {
					echo "There was an error uploading your file. Go back and Try again   ";
					echo mysqli_error($con);
				}
			} 
		} else {
			echo "There was an error uploading your file";
		}

?>

