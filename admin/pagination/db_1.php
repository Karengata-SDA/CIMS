<?php
/**
 *
  @link: http://www.Awcore.com/dev
 
 
    $db = @mysqli_connect('localhost', 'root', '') or die(mysqli_error());
    @mysqli_select_db('pagination', $db) or die(mysqli_error());
 */
?>

<?php
 
//MySQLi Procedural
$db = mysqli_connect("localhost", "karengat_cims", "#karengata#@cms#", "karengat_cims");
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>
