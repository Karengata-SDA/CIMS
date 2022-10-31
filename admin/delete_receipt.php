<?php
        session_start();
        
	include('conn.php');
        
        $id = $_GET['id'];
                
        $sql1 = "SELECT * FROM `pesa` WHERE `id` = '$id'"; //`id` = '$user_id'
        $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql1));
        $referenceno = $rowPesa['reference_no'];
        $house_id = $rowPesa['item_id'];
        $amt_paid = $rowPesa['paid'];
        
        $_SESSION['subject'] = $referenceno;
        $referenceno = $_SESSION['subject'];
        
        if($rowPesa)
        {  
            $sql = "SELECT * FROM `property` WHERE `id` = '$house_id'"; //`sub_category_id` = '$residence' AND `name` = '$address'";
            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  
            //echo "<br>Query 0: ".$sql."<br>";

            $user_id = $rowHse['user_id'];
            $hseid = $rowHse['id'];
            $hseno = $rowHse['name'];
            $type = $rowHse['type'];
            $aprtm = $rowHse['make'];
            $value_prev = $rowHse['value_prev'];
            $value_let = $rowHse['value_let'];
            $value = $rowHse['value'];
            $status = $rowHse['status'];
            
            /*
            $sql2 = "SELECT * FROM `pesa` WHERE `item_id` = '$house_id' ORDER BY `id` DESC  LIMIT 2,1";
            $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql2));
            $amt_due = $rowPesa['due'];
            $status  = $rowPesa['status'];
            
            $results1 = mysqli_query($conn, $sql2); echo "Query 1: ".$sql2."<br>";
            $numrows = mysqli_num_rows($results1);
            
            echo "<br>value: ".$value."<br>";
            echo "value_prev: ".$value_prev."<br>";
            echo "status: ".$status."<br>";
            
            //UPDATE userdetails SET trx_number = LPAD(FLOOR(RAND()*10000), 4, '0'); 
            //UPDATE userdetails SET trx_number = (select floor(0+ RAND() * 10000) WHERE );
            
            $randnum = mt_rand(1000, 1999); //LPAD(FLOOR(RAND()*10000), 4, '0');
            $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90));
            //$range = $range('A','Z');
            
            echo "Transaction Code.: ".$randnum."".$randltr."".$range;
            
            if($numrows > 0)
            {
                echo "<br>Numrows A.: ".$numrows."<br>";
                
                $prev_balance = $rowPesa['balance'];
            }
            else 
            {
                echo "<br>Numrows B.: ".$numrows."<br>";
                
                $sql2 = "SELECT * FROM `pesa` WHERE `item_id` = '$house_id' ORDER BY `id` DESC  LIMIT 1,1";
                $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql2));
                $amt_due = $rowPesa['due'];
                $status  = $rowPesa['status'];
                
                $prev_balance = "0.00";      //"-".$value_let;
                $value_prev = "-".$amt_due;
                $status = "not paid";
            }
            */
            
            $prev_balance = "0.00";      //"-".$value_let;
            $value_prev = "-".$value_let;
            $status = "not paid";
            
            //echo "<br>value: ".$value_prev."<br>";
            //echo "value_prev: ".$prev_balance."<br>";
            //echo "status: ".$status."<br>";
            
            
            $sql3 = "UPDATE `property` SET `value` = '$value_prev', `value_prev` = '$prev_balance', `status` = '$status' WHERE `id` = '$hseid'"; //TODO: put date of previous receipt //`added_on` = '2020-03-08 10:23:13' //`updated_on` = '$timestamp'
            mysqli_query($conn, $sql3);  
            //echo "<br>sql3 ".$sql3."<br>";
            
            //Finally we delete!
            mysqli_query($conn, "DELETE FROM `pesa` WHERE `id` = '$id'"); //TODO: CHeck for successful delete before showing sweet alert.

            $_SESSION['type'] = "success";
            $_SESSION['action'] = "edit";
            $_SESSION['title'] = "Awesome";

            $_SESSION['message'] = "Receipt No. ".$_SESSION['subject']." Deleted Successfuly!";

            header('location:receipts.php');
        }
        else
        {
            $_SESSION['type'] = "error";
            $_SESSION['action'] = "delete";
            $_SESSION['title'] = "Oops!";

            $_SESSION['message'] = $query." Delete of Receipt No. ".$referenceno." Failed! ";

            header('location:receipts.php');
        }
?>