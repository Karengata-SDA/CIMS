<?php
        session_start();

	include('conn.php');
        
        //include './dist/js/sweetalert-data.js';
        
        //include './header.php';
	
	//$id = $_GET['id']; //TODO: Change this to POST or put in session.
	
        $id = mysqli_escape_string($conn, $_POST['id']);
	$name = mysqli_escape_string($conn, $_POST['name']);
	$location = mysqli_escape_string($conn, $_POST['location']);
        $floors = mysqli_escape_string($conn, $_POST['floors']);
        $agent_id = mysqli_escape_string($conn, $_POST['agent_id']);
        $status = mysqli_escape_string($conn, $_POST['status']);
          
        //TODO: add editor to last modified by column in db
        //$sql = "SELECT * FROM `property` WHERE `sub_category_id` = '$residence' AND `name` = '$address'";
        //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  echo "SQL: ".$sql;

        //$aprtnm = $rowHse['make'];
        //$hseid = $rowHse['id'];
        
         //echo "<br>Hse Id: ".$hseid;
        
        
	$sql = "UPDATE `property` SET `name` = '$name', `location_id` = '$location', `size` = '$floors', `agent_id` = '$agent_id', `status` = '$status' WHERE `id` = '$id'";
	//echo "SQL: ".$sql;
        
        $query = mysqli_query($conn, $sql); 
	if($query)
        {
            //            echo ' 
            //                      </script>
            //                      swal("Good job!", "You clicked the button!", "success");
            //                      </script>
            //           
            //            ';

            //            echo " 
            //                     Swal.fire({
            //   position: 'top-end',
            //   type: 'success',
            //   title: 'Your work has been saved',
            //   showConfirmButton: false,
            //   timer: 1500
            // });
            //
            //                    </script>
            //                    ";
            //include '../sweety/sweetalert.php';
            header('location:apartments.php?rst=1');
        }
        else
        {
            
        }
        
        

?>