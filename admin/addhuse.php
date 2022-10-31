<?php

        session_start();

	include('conn.php');
        
        $count = $_SESSION['count'];
        $limit = $_SESSION['limit'];
        $page = $_SESSION['page'];
        
        if($count == $limit)
        {//TODO: Do this after successful entry into db.
            $page = $page+1;
        }
        
        
	
	$firstname = mysqli_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_escape_string($conn, $_POST['lastname']);
       
	$residence = $_POST['residence'];
	$address = $_POST['address'];
        $housetype = $_POST['housetype'];
        $price = $_POST['price'];
        	        
        $sql = "SELECT * FROM `property` WHERE `id` = '$residence'";
        $rowApt = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql;

        //$aprtnm = $rowHse['make'];
        $aptid = $rowApt['id'];
        $aptnm = $rowApt['name'];
        
        $orgid = $_SESSION['orgID'];
        
	$sql = "INSERT INTO `property` (type, name, make, value, value_let, category_id, `sub_category_id`, `organisation_id`, `status`) VALUES ('$housetype', '$address', '$aptnm', '-$price', '$price', '1', '$residence', '$orgid', 'vacant')";
	mysqli_query($conn, $sql);
        
        //echo "Query: ".$sql;
        
        $set = $_SESSION['set'];
        
        $_SESSION['type'] = "success";
        $_SESSION['action'] = "add";
        $_SESSION['title'] = "Awesome";
        $_SESSION['subject'] = $firstname;
        $_SESSION['message'] = $address." Added Successfuly in ".$aptnm." as a ".$housetype." House.";
        
	header('location:apartments.php?set='.$set.'&page='.$page);

?>