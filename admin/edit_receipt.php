<?php

        session_start();

	include('conn.php');
	
	//$firstname = mysqli_escape_string($conn, $_POST['firstname']);
	//$lastname = mysqli_escape_string($conn, $_POST['lastname']);
        $usdt = $_POST['user'];
        //$usid = $_POST['dica'];
        //$name = $firstname.' '.$lastname;
	//$address = $_POST['address'];
        //$residence = $_POST['residence'];
        
        
        $datetime = $_POST['datetime'];
	$referenceno = $_POST['referenceno'];
        $method = $_POST['method'];
        $amount = $_POST['amount'];
        $remarks = $_POST['remarks'];
        $arrears = $_POST['arrears'];
        
        $page = $_SESSION['page'];
        $set = $_SESSION['set'];
        
        $id = mysqli_escape_string($conn, $_POST['id']);
        
        //  <input type="text" class="form-control" name="address" autocomplete="off">
        
        //echo "UserData: ".$usdt."<br>"; //001 - Smart   Judith Madiwa Anyango  (30486656)
        
        
        
        $user = explode("(", $usdt);
        $hsen = $user[1]; //001
        
        $idppno = str_replace(")", "", $hsen);
        
        //echo "UserIdpp: ".$idppno."<br>";
        
        
        
        $query = "SELECT * FROM `people` WHERE `idno` = '$idppno'";
        $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query));
        //echo "<br>Query: ".$query."<br>";
        
        $usid = $rowUsr['id'];
        $residence = $rowUsr['residence'];
        $address = $rowUsr['address'];
        
        
        //echo "Usid.: ".$usid."<br>";           //
        ////echo "Usid.: ".$usid."<br>";         //
        //echo "Apartment.: ".$residence."<br>"; //Apartment.: 2
        //echo "Hse. id: ".$address."<br>";      //Hse. no: 001
        //echo "Date Time: ".$datetime."<br>";   // 03/18/2020 10:22 AM  vs 2020-03-08 10:23:13
        //echo "Ref. no: ".$referenceno."<br>";  
        //echo "Method: ".$method."<br>";        //
        //echo "Amount: ".$amount."<br>";        //
        //echo "Remarks: ".$remarks."<br></br>"; //
        
        //echo "DateTime: ".$datetime."<br>";
        
        $epoc = explode(" ", $datetime);
        $date = $epoc[0]; //03/18/2020
        $time = $epoc[1]; //10:22
        $ampm = $epoc[2]; //AM
        
        //echo "Day: ".$date."<br>";
        //echo "Tim: ".$time."<br>";
        //echo "Amp: ".$ampm."<br>";
        
        
        $rituko = explode("/", $date);
        $mo = $rituko[0]; //03
        $da = $rituko[1]; //18
        $ye = $rituko[2]; //2020
                
        $tarehe = $ye."-".$mo."-".$da;
        
        //echo "Date: ".$tarehe."<br>"; //2020-18-03
        //echo "Time: ".$time.":00<br>";
              
        $timestamp = $tarehe." ".$time.":00";
        //echo "TimeStamp: ".$timestamp."<br>";
        
        
        //die();
        
        
        
        $sql = "SELECT * FROM `property` WHERE `id` = '$address'"; //`sub_category_id` = '$residence' AND `name` = '$address'";
        $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  
        //echo "<br>Query 0: ".$sql."<br>";

        $user_id = $rowHse['user_id'];
        $hseid = $rowHse['id'];
        $hseno = $rowHse['name'];
        $type = $rowHse['type'];
        $aprtm = $rowHse['make'];
        $category_id = $rowHse['category_id'];
        $sub_category_id= $rowHse['sub_category_id'];
        $value_let = $rowHse['value_let'];
        $value = $rowHse['value'];
        $status = $rowHse['status'];
        
        //echo "User Id: ".$user_id."<br>"; 
        //echo "House Id: ".$hseid."<br>";  //3
        //echo "House No: ".$hseno."<br>";
        //echo "House Ty: ".$type."<br>";
        
        $orgid = $_SESSION['orgID'];
        
        $sql1 = "SELECT * FROM `people` WHERE `id` = '$usid'"; //`id` = '$user_id'
        $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql1));
        
        //echo "<br>Query 1: ".$sql1."<br>";
        
        $fname = $rowPer['firstname'];
        $lname = $rowPer['lastname'];
        $phone = $rowPer['phone'];
        
        $name = $fname.' '.$lname;
        
        //$amount = number_format(floatval($amount), 2, ".");
        
        //echo "Amount: ".number_format($amount)."<br>"; //floatval($amount)
        //echo "Amount: ".number_format($amount, 2, ".", "")."<br>";
        //echo "Letval: ".$value_let."<br>";
        
        //SELECT * FROM `property` WHERE `category_id` = '1' AND `sub_category_id` = '2' ORDER BY `id` ASC
        
        $amount = number_format($amount, 2, ".", "");
        $value_db = $rowHse['value_prev'];   
        
        //$pesa = mysqli_query($conn, "SELECT * FROM `pesa` WHERE `id` = '".$id."'");
        //$rowPesa = mysqli_fetch_array($pesa);
        
        //$value_db = $rowPesa['paid']; 
                
            if($value_db > 0)
            {
                $value_nw = $amount-$value_db;
            }
            else if($value_db < 0)
            {
                $value_nw = $amount+$value_db;
            }
            else if($value_db == 0)
            {
                $value_nw = $amount+$value_db;
            }
            else
            {
                $value_nw = $amount+$value_db;
            }
       
                        
            if($value_nw == 0)
            {
                $status = "paid";
            }
            else if($value_nw > 0)
            {
                $status = "advance";
            }
            else if($value_nw < 0)
            {
                $status = "partial";
            }
            else
            {
                $status = "not paid";
            }
        
        //echo "<br><br>Status: ".$status."<br>";
        //echo "Amount: ".$amount."<br>";
        //echo "Value db: ".$value_db."<br>";
        //echo "Value nw: ".$value_nw."<br>";
        
        //die();
        
        
        //type, name, make, category_id, sub_category_id, user_id, organisation_id, location_id, value_let, status
        
	$sql2 = "UPDATE `pesa` SET `user_id` = '$usid', `user_nm` = '$name', `item_id` = '$hseid', `item_name` = '$hseno', `type` = '$type', reference_no = '$referenceno', `method` = '$method', `due` = '$value_let', `paid` = '$amount', `balance` = '$value_nw', `category_id` = '$category_id' , `sub_category_id` = '$sub_category_id', `datetime` = '$timestamp', `remarks` = '$remarks', `status` = '$status' WHERE `id` = '$id'";
	mysqli_query($conn, $sql2); 
        //echo "<br>Query 2: ".$sql2."<br>";
        
        //$sql1 = "SELECT * FROM `pesa` WHERE `reference_no` = '$referenceno' ORDER BY `id` DESC LIMIT 1"; //`id` = '$user_id'
        //$rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql1));
        //$value = $rowPesa['value'];
        //$value_let = $rowPesa['value_let'];
        
        $sql3 = "UPDATE `property` SET `value` = '$value_nw', `status` = '$status', `datetime` = '$timestamp' WHERE `id` = '$hseid'"; //`added_on` = '2020-03-08 10:23:13'
        
        /*
        if($datetime != "")
        {//TODO: Remove this as redundant and leave the else.
            $sql3 = "UPDATE `property` SET `value` = '$value_nw', `status` = '$status', `datetime` = '$timestamp' WHERE `id` = '$hseid'"; //`added_on` = '2020-03-08 10:23:13'
            mysqli_query($conn, $sql3); 
            //echo "<br>Query 3: ".$sql3."<br>";
        }
        else
        {
            $sql3 = "UPDATE `property` SET `value` = '$value_nw', `status` = '$status' WHERE `id` = '$hseid'";
            mysqli_query($conn, $sql3); 
            //echo "<br>Query 3.1: ".$sql3."<br>";
        }
        */
        
        //die();
         
        require 'AfricasTalkingGateway.php';

        $username   = "tommy";
        $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";  //AFRICASTKNG
        $from = "KSDA_Church"; //AFRICASTKNG

        $msg = "Dear ".$fname.",\nYour rent payment for February has been received as follows:\n\nTotal Paid: Ksh.".number_format($amount)."\nHouse  No: ".$hseno."\nApartment: ".$aprtm."\n\nHave a pleasant stay.\n\nBe Blessed,\nJobstog Property Agency.\n\nFor Queries: 07022 888 683\n";
        //$msg = "Dear ".$fname.",\nPlease igonore the previous message as it had an error. Your correct giving is Ksh ".$total." as follows:\n\n".$bag."\nWe apologise for the error & the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88";
        //$msg = "Dear ".$fname.",\nYour giving for the Sabbath of 7/12/19 was Ksh ".$total." received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n"; //Kindly note that your member number is 962 and not 972.

        //echo "Mesg: ".$msg."<br>";
        
        //echo "To: ".$phone."<br>";
        
        /*
        $gateway    = new AfricasTalkingGateway($username, $apiKey);
        $to = trim("+254".substr($phone, -9)); //$str_phone   //trim according to country

        try
        {
            $results = $gateway->sendMessage($to, $msg, $from); //$to

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
        }
        
        echo 'Gateway Response: '.$respmsg;
        */
       	
        
        $set = $_SESSION['set'];
        
        $_SESSION['type'] = "success";
        $_SESSION['action'] = "add";
        $_SESSION['title'] = "Awesome";
        $_SESSION['subject'] = $firstname;
        $_SESSION['message'] = "Receipt added Successfuly!";
        
	header('location:receipts.php?set='.$set);
        
        
        //paid, not paid, partial, advance, vacant, on deposit.... remarks
        
        /*
        SinSince the 1994 Genocide, GDP of #Rwanda🇷🇼 has risen from $752m to $9.5b in 2018

        TODAY, GDP per capita from $125.5 to $873

        Life expectancy from 29 years to 68.75 years

        Inflation fallen from 101% to 1.1% in 2018  ce the 1994 Genocide, GDP of #Rwanda🇷🇼 has risen from $752m to $9.5b in 2018

        
         *          */
        
        //https://www.forbesafrica.com/brand-voice/2020/02/12/invest-in-rwanda-a-country-with-unconventional-vision-and-leadership/
?>