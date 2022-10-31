<?php
	session_start();

	include('conn.php');
        
        $count = $_SESSION['count'];
        $limit = $_SESSION['limit'];
        $page = $_SESSION['page'];
        
        //if($count == $limit)
        //{//TODO: Do this after successful entry into db.
        //    $page = $page+1;
        //}
	
        $id = mysqli_escape_string($conn, $_POST['id']);
	$name = mysqli_escape_string($conn, $_POST['name']);
	$location = mysqli_escape_string($conn, $_POST['location']);
        $floors = mysqli_escape_string($conn, $_POST['floors']);
        $agent_id = mysqli_escape_string($conn, $_POST['agent_id']);
        $status = mysqli_escape_string($conn, $_POST['status']);
          
        
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
        
	$sql = "UPDATE `property` SET `type` = '$housetype', `name` = '$address', `make` = '$aptnm', `value` = '-$price', `value_let` = '$price', `agent_id` = '$agent_id', `status` = '$status' WHERE `id` = '$id'";
	//echo "SQL: ".$sql;
        
        $query = mysqli_query($conn, $sql); 
	if($query)
        {
            //echo "<br>Result: ".$query;  //1
                        
            if(mysqli_affected_rows($conn) > 0)
            {
               // echo "<br>Result 2: ".mysqli_affected_rows($conn);
                
                $set = $_SESSION['set'];
        
                $_SESSION['type'] = "success";
                $_SESSION['action'] = "add";
                $_SESSION['title'] = "Awesome";
                $_SESSION['subject'] = $firstname;
                $_SESSION['message'] = "House ".$address." Updated Successfuly in ".$aptnm." as a ".$housetype.".";

                header('location:apartments.php?set='.$set.'&page='.$page);
            }
            else
            {
                //echo "<br>Result 2: ".mysqli_affected_rows($conn);
                
                $set = $_SESSION['set'];
        
                $_SESSION['type'] = "error";
                $_SESSION['action'] = "add";
                $_SESSION['title'] = "Sorry!";
                $_SESSION['subject'] = $firstname;
                $_SESSION['message'] = "Updated Failed for House ".$address." as a ".$housetype." in ".$aptnm.".";

                header('location:apartments.php?set='.$set.'&page='.$page);
            }
        }
        else
        {
            $set = $_SESSION['set'];
        
            $_SESSION['type'] = "error";
            $_SESSION['action'] = "add";
            $_SESSION['title'] = "Sorry!";
            $_SESSION['subject'] = $firstname;
            $_SESSION['message'] = "Update Failed for House ".$address." as a ".$housetype." in ".$aptnm.".";

            header('location:apartments.php?set='.$set.'&page='.$page);
        }
        
        

?>