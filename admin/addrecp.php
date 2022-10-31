<?php

       /* if(SESSION_EXPIRED) 
        {
            $organisation_code = "";
            header("Location:index.php?ogc=".$organisation_code);
        }*/

        session_start();

	include('conn.php');
	
	//$fname = mysqli_escape_string($conn, $_POST['firstname']);
	//$lname = mysqli_escape_string($conn, $_POST['lastname']);
        $usdt = $_POST['user'];
        //$usid = $_POST['dica'];
        //$name = $fname.' '.$lname;
	//$address = $_POST['address'];
        //$residence = $_POST['residence'];
        
        $set = $_SESSION['set'];
        $orgid = $_SESSION['orgID'];
        $orgcd = $_SESSION['orgCD'];
        $staff_uid = $_SESSION['userid'];
        $orgnm = $_SESSION['orgNM'];

        $pimind = $_SESSION['pimind'];
        $secind = $_SESSION['secind'];
        $terind = $_SESSION['terind']; 
        
        $udid = $_SESSION['userid'];

        $staff_department = $_SESSION['department'];

        $ind = "real";
        
        $fname = mysqli_escape_string($conn, $_POST['firstname']);
	$lname = mysqli_escape_string($conn, $_POST['lastname']);
        $name  = ucfirst($fname).' '.ucfirst($lname);
        
        $phone = trim(mysqli_escape_string($conn, $_POST['phonenum']));
                
        $datetime = $_POST['datetime'];
        
        $trx_datetime = $_POST['trx_datetime'];
        
        $leo_date = date("Y-m-d", time());
        $leo_time = date("H:i:s", time());
        $rcp_datetime = $leo_date." ".$leo_time; //$_POST['rcp_datetime'];
        
        
        //echo "Set.:       ".$set."<br>";                //
        //echo "OrgID.:     ".$orgid."<br>";              //
        //echo "OrgNm.:     ".$orgnm."<br>";              //
        //echo "User Data.: ".$usdt."<br>";               //
        //echo "Staff ID.:  ".$staff_uid."<br>";          //
        //echo "Staff Dp..: ".$staff_department."<br>";   //
        //echo "First Name: ".$fname."<br>";              //
        //echo "Last Name:  ".$lname."<br>";              //
        //echo "Rcpt Dtme:  ".$rcp_datetime."<br>";       //2020-10-25 08:18:35
        //echo "Trx. Dtme:  ".$trx_datetime."<br>";       //10/13/2020 9:48 AM
        //echo "Phone Num:  ".$phone."<br>";              //
        
        //echo "====================================<br>";//
        
        $epoc = explode(" ", $rcp_datetime);
        $date = $epoc[0]; //2020-10-25
        $time = $epoc[1]; //08:18:35
        $ampm = $epoc[2]; //
        
        //echo "Rcpt Dtme: ".$rcp_datetime."<br>";    //2020-06-17T01:00
        //echo "Rcpt. Date: ".$date."<br>";           //
        //echo "Rcpt Tim: ".$time."<br>";
        //echo "Rcpt Amp: ".$ampm."<br>";       
        
        $rituko = explode("-", $date);
        $mo = $rituko[1]; //06
        $da = $rituko[2]; //17
        $ye = $rituko[0]; //2020
                
        $tarehe = $ye."-".$mo."-".$da;
        
        //echo "Date: ".$tarehe."<br>"; //2020-18-03
        //echo "Time: ".$time."<br>";   //08:18:35
              
        $timestamp = $tarehe." ".$time; //.":00"
        //echo "TimeStamp: ".$timestamp."<br>";
                
        $rituko_devic = $timestamp;
        
        //echo "====================================<br>";//        
        
        $epoc2 = explode(" ", $trx_datetime);
        $date2 = $epoc2[0];  //07/22/2020
        $time2 = $epoc2[1];  //3:23
        $ampm2 = $epoc2[2];  //PM
        
        //echo "Trxn Dtme: ".$trx_datetime."<br>";        //06/30/2020 5:27 AM 
        //echo "Dat: ".$date2."<br>";                     //06/30/2020
        //echo "Tim: ".$time2."<br>";                     //5:27
        //echo "Amp: ".$ampm2."<br><br>";                 //AM

        $rituko2 = explode("/", $date2);
        $mo2 = $rituko2[0]; //echo "mm: ".$mo2."<br>";       //06
        $da2 = $rituko2[1]; //echo "dd: ".$da2."<br>";       //30
        $ye2 = $rituko2[2]; //echo "yyyy: ".$ye2."<br><br>"; //2020

        $date_recp = $ye2."-".$mo2."-".$da2;
        
        //echo "Date 1: ".$date_recp."<br>";         //Date 1: 30/06/2020
        //echo "Date 2: ".$leo_date."<br>";          //Date 2: 2020-07-09
        
        //echo "====================================<br>";
        
        
        
        //$leo_date = $trx_datetime;
        //echo "Leo Date: ".$leo_date."<br>";
        //echo "Leo Trxd: ".$date_recp."<br>";
        
        //die();
      
        
	$referenceno = $_POST['referenceno'];
        $method = $_POST['method'];
        
        $item = $_POST['item'];
        $amount = $_POST['amount'];
        $remarks = $_POST['description'];
        $arrears = $_POST['arrears'];
        
        
        $description = $_POST['description'];
        
        $item1 = $_POST['item1'];
        $amount1 = $_POST['amount1'];
        
        
        
        $item2 = $_POST['item2'];
        $amount2 = $_POST['amount2'];
        
        $item3 = $_POST['item3'];
        $amount3 = $_POST['amount3'];
        
        $item4 = $_POST['item4'];
        $amount4 = $_POST['amount4'];
        
        $item5 = $_POST['item5'];
        $amount5 = $_POST['amount5'];
        
        //echo "Refnumber:  ".$referenceno."<br>";       //
        //echo "Method:     ".$method."<br>";            //  
        //echo "Item - One: ".$item1."<br>";             //
        //echo "Amount One: ".str_replace(',', '', $amount1)."<br>";           
        //echo "Item - Two: ".$item2."<br>";             //
        //echo "Amount Two: ".$amount2."<br>";           //
        //echo "Item - Thr: ".$item3."<br>";             //
        //echo "Amount Thr: ".$amount3."<br>";           //
        //echo "Item - For: ".$item4."<br>";             //
        //echo "Amount For: ".$amount4."<br>";           //
        
        //echo "====================================<br>";//
        
        //$amount = str_replace(',', '', $amount_raw);
        
        
        //echo "Amount One: ".number_format(str_replace(',', '', $amount1))."<br>";
        //echo "Amount Two: ".number_format(str_replace(',', '', $amount2))."<br>";
        
        
        if($amount1 > 0)
        {
            $itemcount1 = 1;
        }
        if($amount2 > 0)
        {
            $itemcount2 = 1;
        }
        if($amount3 > 0)
        {
            $itemcount3 = 1;
        }
        if($amount4 > 0)
        {
            $itemcount4 = 1;
        }
        if($amount5 > 0)
        {
            $itemcount5 = 1;
        }
        $itemcount = $itemcount1+$itemcount2+$itemcount3+$itemcount4+$itemcount5;
        
        
        
        
        
        //  <input type="text" class="form-control" name="address" autocomplete="off">
        
        //echo "UserData: ".$usdt."<br>"; //001 - Smart   Judith Madiwa Anyango  (30486656)
        
        if($pimind == "Real Estate")
        {
            $user = explode("(", $usdt);
            $hsen = $user[1]; //001

            $idppno = str_replace(")", "", $hsen);

            //echo "UserIdpp: ".$idppno."<br>";
        }
        else
        {
            $amount = str_replace(',', '', $amount1) + str_replace(',', '', $amount2) + str_replace(',', '', $amount3) + str_replace(',', '', $amount4) + str_replace(',', '', $amount5);
            
            //$amount = str_replace(',', '', $amount_raw);
            
            $user = explode("-", $usdt);
            $mem_no = $user[0]; //001
            
            
            
            $memno = trim($mem_no); //TODO: Check if number

            //$idppno = str_replace(")", "", $hsen);

            //echo "UserIdpp: ".$idppno."<br>";
        }
        
        //echo "Amount Raw: ".$amount_raw."<br>";             //
        //echo "Amount Tot: ".$amount."<br>";             //
        //echo "Item Count: ".$itemcount."<br>";          //
        
        //echo "====================================<br>";//
        
        
        if($memno == "")
        {
            //$rcp_datetime
            //$trx_datetime
            
            $recdeptm = "";
            $fname = mysqli_escape_string($conn, $_POST['firstname']);
	    $lname = mysqli_escape_string($conn, $_POST['lastname']);
            $nomre = ucfirst($fname)." ".ucfirst($lname);
            
            $phone = trim(substr($phone, -9));
            
            $query = "SELECT `id`, `username`, `password` FROM `userdetails` WHERE `phone` = '$phone' LIMIT 1";
            $results = mysqli_query($conn, $query);
            $numrows = mysqli_num_rows($results);       

            if($numrows > 0)
            {
                    
            }
            else
            {
                $query = "SELECT * FROM `userdetails` WHERE `member_no` LIKE '%S%' ORDER BY `member_no` DESC LIMIT 1";
                $results = mysqli_query($conn, $query);
                
                $rowUser = mysqli_fetch_array(mysqli_query($conn, $query));  

                $suid_id = $rowUser['id'];
                $smember_no = $rowUser['member_no']; //S407
                
                //$smember_na = explode("-", $smember_no);
                //$mo = $smember_na[0];
                
                $member_na = substr($smember_no, -3);

                $member_nu = $member_na+1;
                
                $leo_ni =  $leo_date." ".$leo_time; //date("Y-m-d", time());
                
                $memno = "S".$member_nu;
                      
                $sql = "INSERT INTO `userdetails` (`id`, `member_no`, `organisation_id`, `organisation_code`,    `name`, `firstname`, `lastname`, `gender`, `phone`, `status`, `comments_remarks`, `added_on`) VALUES "
                                               . "(NULL,   '$memno',       '$orgid',           '$orgcd',        '$nomre', '$fname',     '$lname',     '',   '$phone',    '1',       'Present',      '$leo_ni')";
                mysqli_query($conn, $sql);
            }
        }
        else
        {
            $query = "SELECT * FROM `userdetails` WHERE `member_no` = '$memno'";
            $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query));
            //echo "<br>Query: ".$query."<br>";

            $usid = $rowUsr['id'];
            $department_id = $rowUsr['department'];
            $fname = ucwords(mysqli_real_escape_string($conn, $rowUsr['firstname']), "");
            $lname = ucwords(mysqli_real_escape_string($conn, $rowUsr['lastname']), "");
            $nomre = $fname." ".$lname;
            
            $phone = $rowUsr['phone'];
            
            $sql = "SELECT * FROM `departments` WHERE `id` = '$department_id'"; //`sub_category_id` = '$residence' AND `name` = '$address'";
            $rowDpt = mysqli_fetch_array(mysqli_query($conn, $sql));   
            //echo "<br>Query 0: ".$sql."<br>";

            $recdepid = $rowDpt['id'];
            $recdeptm = $rowDpt['name'];
        }
        
        //echo "Memb No: ".$memno."<br>";
        //echo "Memb Nm: ".$nomre."<br>";
        //echo "Dept Nm: ".$recdeptm."<br>";
        //echo "Dept Id: ".$recdepid."<br>";
            
        //echo "====================================<br>";//
        
        
        $query1 = "SELECT * FROM `transactions` WHERE `reference_no` = '$referenceno' LIMIT 1";
        $results1 = mysqli_query($conn, $query1); //echo "Query 1: ".$query1."<br>";
        $numrows = mysqli_num_rows($results1); 
        if($numrows > 0)
        {
            $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query1));
            $usid = $rowUsr['id'];
            
            $query2 = "SELECT * FROM `userdetails` WHERE `id` = '$usid'";
            $rowPer = mysqli_fetch_array(mysqli_query($conn, $query2));
            $user_nm = $rowPer['firstname']." ".$rowPer['lastname'];
            $added_on = $rowPer['added_on'];
            $transacted_on = $rowPer['due_on'];
            
            

            //echo "Query 1: ".$query1."<br>";
            //echo "Numrows: ".$numrows."<br>";
            //User already exist
            $_SESSION['type'] = "error";
            $_SESSION['action'] = "add";
            $_SESSION['title'] = "Oops!";
            $_SESSION['subject'] = $firstname;
            $_SESSION['message'] = "Add Failed... A transaction with the reference no. ".$referenceno." already exists for. ".$user_nm." transacted on ".$transacted_on." and added on ".$added_ons."?";

            if($count == $limit)
            {//TODO: Do this after successful entry into db.
                $page = $page-1;
            }

            header('location:receipts.php?set='.$set);
        }
        else 
        {
            $randnum = mt_rand(1000, 1999); //LPAD(FLOOR(RAND()*10000), 4, '0');
            $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 
            //$range = $range('A','Z');
            $str_trxno = $randnum."".$randltr;
            
            //TODO: Check if code already exists and if it does, do a loop to create a new one and insert into db if non-existent else repeat.
             
            $queryin = "INSERT INTO `codes` (`id`, `code`, `user_id`, `phone`, `email`, added_on, due_on) VALUES (NULL, '$str_trxno', '$memno', '$phone', NULL, CURRENT_TIMESTAMP,  '$rituko_devic')";
            mysqli_query($conn, $queryin); 
            //echo "<br>".$queryin."<br>";
            
            //die();

            $trxtype = "original"; //duplicate

            for($j=0; $j<$itemcount; $j++)
            {            
                if($j == 0)
                {
                    $item_jina = mysqli_real_escape_string($conn, $item1); //utf8_encode($item_nm); //urlencode($item_nm);
                    $item_co = $amount1;
                    $bag.= $item_jina." : Ksh.".$item_co."\n";

                    $name = mysqli_real_escape_string($conn, $name);
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,   `type`,   `method`,   `currency`,  `description`,     `quantity`,     `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,    `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                        . "                     VALUES (NULL, '$memno',   '$nomre',   '$staff_uid',      '$recdeptm',    '$str_trxno', '$referenceno',    '$trxtype',   '$method',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$trx_datetime',  NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                }
                else if($j == 1)
                {
                    $item_jina = mysqli_real_escape_string($conn, $item2); //utf8_encode($item_nm); //urlencode($item_nm);
                    $item_co = $amount2;
                    $bag.= $item_jina." : Ksh.".$item_co."\n";

                    $name = mysqli_real_escape_string($conn, $name);
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,      `type`,   `method`,   `currency`,  `description`,     `quantity`,     `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,    `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                        . "                     VALUES (NULL, '$memno',   '$nomre',   '$staff_uid',      '$recdeptm',    '$str_trxno',  '$referenceno',    '$trxtype',   '$method',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$trx_datetime',  NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                }
                else if($j == 2)
                {
                    $item_jina = mysqli_real_escape_string($conn, $item3); //utf8_encode($item_nm); //urlencode($item_nm);
                    $item_co = $amount3;
                    $bag.= $item_jina." : Ksh.".$item_co."\n";

                    $name = mysqli_real_escape_string($conn, $name);
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,      `type`,   `method`,   `currency`,  `description`,     `quantity`,     `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,    `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                        . "                     VALUES (NULL, '$memno',   '$nomre',   '$staff_uid',      '$recdeptm',    '$str_trxno',  '$referenceno',     '$trxtype',   '$method',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$trx_datetime',  NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                }
                else if($j == 3)
                {
                    $item_jina = mysqli_real_escape_string($conn, $item4); //utf8_encode($item_nm); //urlencode($item_nm);
                    $item_co = $amount4;
                    $bag.= $item_jina." : Ksh.".$item_co."\n";

                    $name = mysqli_real_escape_string($conn, $name);
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,         `type`,   `method`,   `currency`,  `description`,     `quantity`,     `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,    `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                        . "                     VALUES (NULL, '$memno',   '$nomre',   '$staff_uid',      '$recdeptm',    '$str_trxno',  '$referenceno',        '$trxtype',   '$method',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$trx_datetime',  NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                }
                else if($j == 4)
                {
                    $item_jina = mysqli_real_escape_string($conn, $item5); //utf8_encode($item_nm); //urlencode($item_nm);
                    $item_co = $amount5;
                    $bag.= $item_jina." : Ksh.".$item_co."\n";

                    $name = mysqli_real_escape_string($conn, $name);
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,         `type`,   `method`,   `currency`,  `description`,     `quantity`,     `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,    `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                        . "                     VALUES (NULL, '$memno',   '$nomre',   '$staff_uid',      '$recdeptm',    '$str_trxno',  '$referenceno',        '$trxtype',   '$method',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$trx_datetime',  NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                }
                else
                {

                }

                //echo "Item - For: ".$item_jina."<br>";             //
                //echo "Amount For: ".$item_co."<br>";               //
                //echo "Query 1.".$j.": ".$queryin."<br><br>";

                mysqli_query($conn, $queryin);
            }
            

            //echo "Trx. num: ".$str_trxno."<br>";
            //echo "Trx. typ: ".$trxtype."<br>";

            //echo "====================================<br>";//
           

            if($leo_date == $date_recp) //$leo_date == $trx_datetime
            {
                if($fname == "")
                {
                    $msg = "\nYour giving of Ksh.".number_format($amount)." has been received as follows:\n\n".stripslashes($bag)."\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                }
                else
                {
                    $msg = "Dear ".$fname.",\nYour giving of Ksh.".number_format($amount)." has been received as follows:\n\n".stripslashes($bag)."\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                }
            }
            else
            {
                /*
                if($fname == "")
                {
                    $msg = "\nYour giving on ".$date_recp." was Ksh.".number_format($amount)." and was received as follows:\n\n".stripslashes($bag)."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n"; //Kindly note that your member number is 962 and not 972.
                }
                else
                {
                    $msg = "Dear ".$fname.",\nYour giving on ".$date_recp." was Ksh.".number_format($amount)." and was received as follows:\n\n".stripslashes($bag)."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n"; //Kindly note that your member number is 962 and not 972.
                }
                */
                if($fname == "")
                {
                    $msg = "\nYour giving of Ksh.".number_format($amount)." on ".$date_recp." has been received as follows:\n\n".stripslashes($bag)."\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                }
                else
                {
                    $msg = "Dear ".$fname.",\nYour giving of Ksh.".number_format($amount)." on ".$date_recp." has been received as follows:\n\n".stripslashes($bag)."\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                }
            }

            //echo "Message: ".$msg."<br>";
            //echo "====================================<br>";  //

            require 'AfricasTalkingGateway.php';

            $username   = "tommy";
            $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
            $from = "KSDA_Church";

            $gateway    = new AfricasTalkingGateway($username, $apiKey);
            $to = trim("+254".substr($phone, -9)); //$str_phone   //trim according to country       

            try
            {
                //$item_jina = mysqli_real_escape_string($conn, $item1); //utf8_encode($item_nm); //urlencode($item_nm);
                $results = $gateway->sendMessage($to, $msg, $from); //$to //stripslashes(  //str_replace("\\", "", $msg)

                foreach( $results as $result ) 
                {
                    //TODO: Update message delivery satus in the database //$result->status //$result->messageId //$result->cost
                    $resptxt = "OK";
                    $respcde = "200";
                    $respmsg = $result->status;
                    $respidn = $result->messageId;
                    $respnum = $result->number;
                    $respcst = $result->cost;
                }
            }
            catch ( AfricasTalkingGatewayException $e )
            {
                $resptxt = "OK";
                $respcde = "200";
                $respmsg = $e->getMessage();
                $respcst = "0.00";
            }

            //$respcde = "200";
            //$respmsg = "Toa hii hapa!";
            $msg = mysqli_real_escape_string($conn, $msg);

            //echo "\n".'Message: '.$i.'/'.($numb_rcpt+1).' '.$recnames.' '.$msg."\n";



            //echo "\nHere 0.: ".$query."\n";

            $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`,  `organisation_id`,    `from`,   `to`,   `from_name`,   `to_name`,  `from_id`,  `to_id`,     `message`,  `reference`,  `cost`,     `status`,   `added_on`,   `added_at`) VALUES "
                                         ."(NULL, '$respidn',           '0',             '$orgid',        '$from',  '$to',  'KSDA_Church', '$nomre',   '$udid',    '$memno', '$msg',     '$str_trxno', '$respcst', '$respmsg', '$leo_date', '$leo_time')";
            mysqli_query($conn, $sql);

            //echo "\n\Query 2.: ".$sql."\n\n<br>"; 

            //echo "====================================<br>";
            

            $query = "SELECT * FROM `messages` WHERE `added_on` = '$leo_date' ORDER BY conversation_id DESC LIMIT 1";  //WHERE `reference` != '$str_trxno' 
            $resultsMsg2 = mysqli_query($conn, $query);
            $numrows = mysqli_num_rows($resultsMsg2); 

            if($numrows > 0)
            {
                $rowMsg = mysqli_fetch_array(mysqli_query($conn, $query));  

                $messg_id = $rowMsg['message_id'];
                $prv_conva_id = $rowMsg['conversation_id'];

                $nxt_conva_id = $prv_conva_id+1;
                $last_id = $nxt_conva_id;

                //echo "\n Prev id: ".$prv_conva_id."\n";
                //echo "\n Next id: ".$nxt_conva_id."\n";

                $query = "UPDATE `messages` SET `conversation_id` = '".$nxt_conva_id."' WHERE `reference` = '$str_trxno' AND `from_id` = '$udid' AND `added_on` = '$leo_date'"; // AND `message_id` = '".$messg_id."' AND `from_id` = '$udid' AND  `to_id` = '$recmemno'
                $update = mysqli_query($conn, $query); //TODO: Add datetime as the 3rd filter parameter to prevent the possiblity od older messages being updated.
                //if($update){$msg="Update successful";}

                //echo "\nHere 2.: ".$query."\n";
                //echo "\nHere coz ($numrows > 0) 1.: ".$query."\n";
            }
            else 
            {
                $query = "UPDATE `messages` SET `conversation_id` = '1' WHERE `reference` = '$str_trxno' AND `from_id` = '$udid' AND `added_on` = '$leo_date'"; // AND `message_id` = '".$messg_id."' AND `from_id` = '$udid' AND  `to_id` = '$recmemno'
                $update = mysqli_query($conn, $query);//TODO: Add datetime as the 3rd filter parameter to prevent the possiblity od older messages being updated.
                //if($update){$msg="Update successful";}

                $nxt_conva_id = "1";
                $last_id = $nxt_conva_id;

                //echo "\nHapa coz ($numrows <= 0) 1.: ".$query."\n\n\n";
                //Use below to reverse transaction
                /*if ($conn->query($sql) === TRUE) 
                {
                    $last_id = $conn->insert_id; //echo "New record created successfully. Last inserted ID is: " . $last_id;
                } 
                else 
                {
                    //echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $last_id = mysqli_insert_id($conn);
                */
                //Send SMS receipt to members <<   
            }


            $_SESSION['type'] =   "success";
            $_SESSION['action'] = "add";
            $_SESSION['title'] =  "Awesome";
            $_SESSION['subject'] = $fname;

            if($respmsg != "Success")
            {
                $respmsg = "Evenso, the message was not sent with the following Error: ".$respmsg.".";
            }
            else
            {
                $respmsg = "";
            }


            $_SESSION['message'] = "Receipt ".$last_id." added Successfuly! ".$respmsg;
            
            header('location:receipts.php?set='.$set);
        }
        
        
        

        
        
?>