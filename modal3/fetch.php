 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "karengata_cims");  
 if(isset($_POST["userdetail_id"]))  
 {  
      $query = "SELECT * FROM userdetails WHERE id = '".$_POST["userdetail_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>