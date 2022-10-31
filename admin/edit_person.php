<?php
        session_start();
        
	include('conn.php');
        
        //include './dist/js/sweetalert-data.js';
        
        //include './header.php';
	
	//$id=$_GET['id']; //TODO: Change this to POST or put in session.
        
        $page = $_SESSION['page'];
        $set = $_SESSION['set'];
        
        $id = mysqli_escape_string($conn, $_POST['id']);
	
	$firstname = mysqli_escape_string($conn, $_POST['firstname']);
        $middlename = mysqli_escape_string($conn, $_POST['middlename']);
	$lastname = mysqli_escape_string($conn, $_POST['lastname']);
        $name = $firstname.' '.$lastname;
	$idno = $_POST['idno'];
	$gender=$_POST['gender'];
	$phone = $_POST['phone'];
	$residence = $_POST['residence'];  //2
	$address = $_POST['houseno'];      //002
	$role = $_POST['role'];
                                                                                                                                                                
        $sql = "SELECT * FROM `property` WHERE `sub_category_id` = '$residence' AND `name` = '$address'";
        $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  
        //echo "SQL: ".$sql;

        //$aprtnm = $rowHse['make'];
        $hseid = $rowHse['id'];
        
         //echo "<br>Hse Id: ".$hseid;

        
	$sql = "UPDATE `people` set firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', idno = '$idno', gender = '$gender', phone = '$phone', residence = '$residence', address = '$hseid', role = '$role' WHERE id = '$id'";
	//echo "SQL: ".$sql;
        
        $query = mysqli_query($conn, $sql); 
	if($query)
        {
            //TODO: Put checks for controlled entries e.g.idno+hseno+aprtment as well as form validation
            
            $_SESSION['result'] = "success";
            $_SESSION['action'] = "edit";
            $_SESSION['title'] = "Awesome";
            $_SESSION['subject'] = $firstname;
            $_SESSION['message'] = "Edit Success!";
            
            header('location:people.php?set='.$set.'&page='.$page);
        }
        else
        {
            $_SESSION['result'] = "error";
            $_SESSION['action'] = "edit";
            $_SESSION['title'] = "Oops";
            $_SESSION['subject'] = $firstname;
            $_SESSION['message'] = "Edit Failed!";
            
            header('location:people.php?set='.$set.'&page='.$page);
        }
        
        

?>