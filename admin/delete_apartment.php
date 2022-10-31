<?php
        session_start();
        
	include('conn.php');
        
         $id = $_GET['id'];
        
        $query = "SELECT * FROM `property` WHERE `id` = '$id'";
        $rowApt = mysqli_fetch_array(mysqli_query($conn, $query));
        $aptm = $rowApt['make'];
        
        $_SESSION['subject'] = $aptm;
        $aptm = $_SESSION['subject'];
        
        if($rowApt)
        {
           
            mysqli_query($conn, "DELETE FROM `property` WHERE `id` = '$id'");

            $_SESSION['type'] = "success";
            $_SESSION['action'] = "edit";
            $_SESSION['title'] = "Awesome";

            $_SESSION['message'] = $_SESSION['subject']." Deleted Successfuly!";

            header('location:apartments.php');
        }
        else
        {
            $_SESSION['type'] = "error";
            $_SESSION['action'] = "delete";
            $_SESSION['title'] = "Oops!";

            $_SESSION['message'] = $query." Delete of ".$aptm." Failed! ";

            header('location:apartments.php');
        }
?>