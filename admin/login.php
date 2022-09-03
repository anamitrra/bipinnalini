<?php

session_start();

include "connect.php";

if(isset($_POST["submit"]))
{
	$email=$_POST["email"];
	$pass=$_POST["password"];
	
	$sql="SELECT * from login where `email` ='$email' AND `password` = '$pass' ";
	$result=mysqli_query($con,$sql);
	$n=mysqli_num_rows($result);
	if($n==1)
	{
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['email'] = $email;

		header("location:adminHome.php");

        
	}
else
{
	header("location:index.php");
}
}
?>
	