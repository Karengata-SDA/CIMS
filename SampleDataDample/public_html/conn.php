<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","pmauser","pmapass","nyumbaos_db");
if (!$conn) 
{
	die("Connection failed: " . mysqli_connect_error());
}
 
?>