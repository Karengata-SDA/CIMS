<?php
	include('conn.php');
	
	$id=$_GET['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	
	mysqli_query($conn,"update userdetails set firstname='$firstname', lastname='$lastname', address='$address' where id='$id'");
	header('location:index.php');

?>