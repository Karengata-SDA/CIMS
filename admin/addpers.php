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
        $middlename = mysqli_escape_string($conn, $_POST['middlename']);
	$lastname = mysqli_escape_string($conn, $_POST['lastname']);
        $name = $firstname.' '.$lastname;
        
	$idno = $_POST['idno'];
	$gender =$_POST['gender'];
	$phone = $_POST['phone'];
	$residence = $_POST['residence'];
	$address = $_POST['address'];
	$role = $_POST['role'];
        
        
        $query0 = "SELECT * FROM `property` WHERE `sub_category_id` = '$residence' AND `name` = '$address'";
        $rowHse = mysqli_fetch_array(mysqli_query($conn, $query0));  
        
        if($rowHse)
        {
            //echo "Query 0: ".$query0."<br>";

            $aprtnm = $rowHse['make'];
            $hseid = $rowHse['id'];

            $orgid = $_SESSION['orgID'];

            //echo "House: ".$hseid."<br>";
            //echo "Apart: ".$aprtnm."<br>";

            $query1 = "SELECT `id`, `idno`, `residence`, `address` FROM `people` WHERE `idno` = '$idno' AND `residence` = '$residence' AND `address` = '$hseid' LIMIT 1"; //'".md5($password)."'
            $results1 = mysqli_query($conn, $query1); //echo "Query 1: ".$query1."<br>";
            $numrows = mysqli_num_rows($results1); 
            if($numrows > 0)
            {
                $query2 = "SELECT * FROM `people` WHERE `idno` = '$idno'";
                $rowPer = mysqli_fetch_array(mysqli_query($conn, $query2));
                $user_nm = $rowPer['firstname'];
                    
                //echo "Query 1: ".$query1."<br>";
                //echo "Numrows: ".$numrows."<br>";
                //User already exist
                $_SESSION['type'] = "error";
                $_SESSION['action'] = "add";
                $_SESSION['title'] = "Oops!";
                $_SESSION['subject'] = $firstname;
                $_SESSION['message'] = "Add Failed... ".$firstname." is already a tenant in House no. ".$address." in ".$aprtnm." apartment. Or is ".$firstname." also called ".$user_nm."?";
                
                if($count == $limit)
                {//TODO: Do this after successful entry into db.
                    $page = $page-1;
                }
                
                header('location:people.php?set='.$set.'&page='.$page);
            }
            else
            {
                $query1 = "SELECT `id`, `idno`, `residence`, `address` FROM `people` WHERE `residence` = '$residence' AND `address` = '$hseid' LIMIT 1"; //'".md5($password)."'
                $results1 = mysqli_query($conn, $query1); //echo "Query 1: ".$query1."<br>";
                $numrows = mysqli_num_rows($results1); 
                if($numrows > 0)
                {
                    $_SESSION['type'] = "error";
                    $_SESSION['action'] = "add";
                    $_SESSION['title'] = "Oops!";
                    $_SESSION['subject'] = $firstname;
                    $_SESSION['message'] = "Add Failed... House no. ".$address." at ".$aprtnm." is already occupied.";
                    
                    if($count == $limit)
                    {//TODO: Do this after successful entry into db.
                       $page = $page-1;
                    }

                    header('location:people.php?set='.$set.'&page='.$page);
                }
                else 
                {
                    $query1 = "INSERT INTO `people` (firstname, middlename, lastname, idno, gender, phone, residence, address, organisation_id, role) VALUES ('$firstname', '$middlename',  '$lastname', '$idno', '$gender', '$phone', '$residence', '$hseid', '$orgid', '$role')";
                    mysqli_query($conn, $query1);  
                    //echo "Query 1: ".$query1."<br>";


                    $query2 = "SELECT * FROM `people` WHERE `idno` = '$idno'";
                    $rowPer = mysqli_fetch_array(mysqli_query($conn, $query2));
                    $user_id = $rowPer['id'];

                    //echo "Query 2: ".$query2."<br>";
                    //echo "Userid: ".$user_id."<br>";

                    if($role == "Tenant")
                    {
                        $status = "not paid";
                    }
                    else
                    {
                        $status = "reserved";
                    }
                                       
                    $query3 = "UPDATE `property` SET `user_id` = '$user_id', `status` = '$status' WHERE `id` = '$hseid'"; 
                    mysqli_query($conn, $query3); 
                    //echo "Query 3: ".$query3."<br>";
                    
                     $_SESSION['type'] = "success";
                     $_SESSION['action'] = "add";
                     $_SESSION['title'] = "Awesome!";
                     $_SESSION['subject'] = $firstname;
                     $_SESSION['message'] = "Add Success... ".$firstname." has successfuly been alocated House no. ".$address." at ".$aprtnm.".";

                     header('location:people.php?set='.$set.'&page='.$page);
                }
            }
        }
        else
        {
             $_SESSION['type'] = "error";
             $_SESSION['action'] = "add";
             $_SESSION['title'] = "Oops!";
             $_SESSION['subject'] = $firstname;
             $_SESSION['message'] = "Add Failed... House number not found!";
             
             //echo "House Not Found: <br>";
             //echo "Title: ".$_SESSION['title']."<br>";
             //echo "Action: ".$_SESSION['action']."<br>";
             //echo "Type: ".$_SESSION['type']."<br>";
             //echo "Subject: ".$_SESSION['subject']."<br>";
             //echo "Message: ".$_SESSION['message']."<br>";
             
             if($count == $limit)
             {//TODO: Do this after successful entry into db.
                $page = $page-1;
             }
             
             header('location:people.php?set='.$set.'&page='.$page);
        }
        
        
        
        
        
//        $query = "SELECT `id`, `idno`, `residence`, `address` FROM `people` WHERE `idno` = '$idno' AND `residence` = '$residence' AND `address` = '$address' LIMIT 1"; //'".md5($password)."'
//        $results = mysqli_query($conn, $query);
//        $numrows = mysqli_num_rows($results);       
//
//        if($numrows > 0)
//        {
//            //User already exist
//        }
//        else
//        {
//            $sql = "SELECT * FROM `property` WHERE `sub_category_id` = '$residence' AND `name` = '$address'";
//            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  
//            echo "Query 0: ".$sql."<br>";
//
//            $aprtnm = $rowHse['make'];
//            $hseid = $rowHse['id'];
//
//            $orgid = $_SESSION['orgID'];
//
//            echo "House: ".$hseid."<br>";
//            echo "Apart: ".$aprtnm."<br>";
//
//            $sql = "INSERT INTO `people` (firstname, middlename, lastname, idno, gender, phone, residence, address, organisation_id, role) VALUES ('$firstname', '$middlename',  '$lastname', '$idno', '$gender', '$phone', '$residence', '$hseid', '$orgid', '$role')";
//            mysqli_query($conn, $sql);  
//            echo "Query 1: ".$sql."<br>";
//
//
//            $sql2 = "SELECT * FROM `people` WHERE `idno` = '$idno'";
//            $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql2));
//            $user_id = $rowPer['id'];
//
//            echo "Query 2: ".$sql2."<br>";
//            echo "Userid: ".$user_id."<br>";
//
//
//
//            $sql3 = "UPDATE `property` SET `user_id` = '$user_id' WHERE `id` = '$hseid'";
//            mysqli_query($conn, $sql3); 
//            echo "Query 3: ".$sql3."<br>";
//        }
        
        

?>