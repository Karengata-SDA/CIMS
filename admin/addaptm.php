<?php

    session_start();

	include('conn.php');
	
	$name = mysqli_escape_string($conn, $_POST['name']);
	$location = mysqli_escape_string($conn, $_POST['location']);
        $floors = mysqli_escape_string($conn, $_POST['floors']);
        $agent_id = mysqli_escape_string($conn, $_POST['agent_id']);
        $status = mysqli_escape_string($conn, $_POST['status']);
        
        
        
        //$sql = "SELECT * FROM `property` WHERE `sub_category_id` = '$residence' AND `name` = '$address'";
        //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql;

        //$aprtnm = $rowHse['make'];
        //$hseid = $rowHse['id'];
        
        $orgid = $_SESSION['orgID'];
        
        //SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment' and `organisation_id` = '1'

	$sql = "INSERT INTO `property` (`type`, `name`, `category_id`, `sub_category_id`, `make`, `organisation_id`, `agent_id`, `location_id`, `size`, `status`) VALUES ('Rental', '$name',  '1', '0', 'Apartment', '$orgid', '$agent_id', '$location', '$floors', '$status')";
	mysqli_query($conn, $sql);
        
        //echo "Query: ".$sql;
        
        $set = $_SESSION['set'];
        
        $_SESSION['type'] = "success";
        $_SESSION['action'] = "add";
        $_SESSION['title'] = "Awesome";
        $_SESSION['subject'] = $name;
        $_SESSION['message'] = $name." Added Successfuly!";
        
	header('location:apartments.php?set='.$set);
?>