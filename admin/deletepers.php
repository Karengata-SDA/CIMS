<?php
        session_start();
        
	include('conn.php');
        
        $query = "SELECT * FROM `people` WHERE `id` = '$id'";
        $rowPer = mysqli_fetch_array(mysqli_query($conn, $query));
        $firstname = $rowPer['firstname'];
        
	$id = $_GET['id'];
        $sql = "DELETE FROM `people` WHERE `id` = '$id'";
	mysqli_query($conn, $sql);
        
        //echo "SQL: ".$sql;
        
        $set = $_SESSION['set'];
        
        
        
        $_SESSION['type'] = "success";
        $_SESSION['action'] = "edit";
        $_SESSION['title'] = "Awesome";
        $_SESSION['subject'] = $firstname;
        $_SESSION['message'] = $firstname." Deleted Successfuly!";
        
	header('location:people.php?set='.$set);

?>