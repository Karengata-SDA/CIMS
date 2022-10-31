<?php

                        for($i=0; $i<$numb_rcpt; $i++)
                        {

                            echo 'Recp_data: '.$rcpt."\n";

                            //$rcpt -> 61,THOMAS NYANGERI MOGAKA,,716466027,tmogaka.ipad@gmail.com,61,62|62,SOPHIE SARANGE MOGAKA,AWM,770221150,Mand_esh@yahoo.com,61,61|
                            $recipient = explode("|", $rcpt[$i]);
                            if($recipient != "")
                            {
                                //echo 'here';
                                $rcpt_data = explode(",", $recipient[$i]); //echo 'Memnos: '.$rcpt_data[0].'  Names: '.$rcpt_data[1].'  Department: '.$rcpt_data[2].'  Phone:  '.$rcpt_data[3].'  Email:  '.$rcpt_data[4]."\n";
                                $recmemno = $rcpt_data[0];
                                $recnames = $rcpt_data[1];
                                $recdeptm = $rcpt_data[2];
                                $recphone = $rcpt_data[3];
                                $recemail = $rcpt_data[4];

                                echo $i.' Instering into db Name 2: '.$recnames.' Item name: '.$item_jina.' Item cost: '.$item_co."\n";


                                $item_jina = mysqli_real_escape_string($conn, $item_nm);
                                $recnames = mysqli_real_escape_string($conn, $recnames);
                                $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`, `department`, `code`,  `type`, `method`,   `currency`,  `description`, `quantity`, `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,  `payopt1`, `payamt1`, `paydtm1`, `payref1`, `payopt2`, `payamt2`, `paydtm2`, `payref2`, `payopt3`, `payamt3`, `paydtm3`, `payref3`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,           `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                                        . "                     VALUES (NULL, '$recmemno', '$recnames',   '$udid',      '$recdeptm',        '$trxid', NULL,  '$item_pm', NULL,        NULL,          '$item_qt', '$item_pr', NULL,  NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,    NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";

                                mysqli_query($conn, $queryin);

                            }
                            else
                            {

                            }
                        }
                        
                        //Send SMS receipt to members >>
                        require 'AfricasTalkingGateway.php';

                        $username   = "tommy";
                        $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                        $from = "KSDA_Church";

                        $rcpt = $str_memno.",".$fname.",".$dept.",".$str_phone.",".$str_email.","."".",".""."|".$rcpt;

                        for($i=0; $i<$numb_rcpt+1; $i++)
                        {
                            //$str_phone
                            //$str_email
                            //$str_memno
                            //$rcpt -> 61,THOMAS NYANGERI MOGAKA,,716466027,tmogaka.ipad@gmail.com,61,62|62,SOPHIE SARANGE MOGAKA,AWM,770221150,Mand_esh@yahoo.com,61,61|


                            $recipient = explode("|", $rcpt);

                            //echo "\nRecipients: ".$rcpt."\n"; //158,Tommy,AYS,720689160,thumpsup2012@yahoo.com,,|62,SOPHIE SARANGE MOGAKA,AWM,770221150,Mand_esh@yahoo.com,61,61|61,THOMAS NYANGERI MOGAKA,,716466027,,61,62|
                            //echo "\n".$i.". Recipient: ".$recipient[$i]."\n";

                            $rcpt_data = explode(",", $recipient[$i]); //echo 'Memnos: '.$rcpt_data[0].'  Names: '.$rcpt_data[1].'  Department: '.$rcpt_data[2].'  Phone:  '.$rcpt_data[3].'  Email:  '.$rcpt_data[4]."\n";
                            $recmemno = $rcpt_data[0];
                            $recnames = $rcpt_data[1];
                            $recdeptm = $rcpt_data[2];
                            $recphone = $rcpt_data[3];
                            $recemail = $rcpt_data[4];

                            $majina = explode(" ", $recnames);
                            $jina1 = $majina[0];
                            $jina2 = $majina[1];
                            $jina3 = $majina[2];
                            $jina1 = ucwords(mysqli_real_escape_string($conn, $jina1), "");
                            $jina2 = ucwords(mysqli_real_escape_string($conn, $jina2), "");
                            $jina3 = ucwords(mysqli_real_escape_string($conn, $jina3), "");

                            $nomre = $jina1." ".$jina2." ".$jina3;

                                    //$to = $str_phone; //"Dear ".$fname.", your giving on ".$day1." was Ksh ".$bag.":
                            $msg = "Dear ".$jina1.",\nYour giving of Ksh ".$total." has been received as follows:\n\n".$bag."\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n";
                            //$msg = "Dear ".$fname.",\nYour giving this past Sabbath was Ksh ".$total." and has been received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n";
                            //$msg = "Dear ".$fname.",\nPlease igonore the previous message as it had an error. Your correct giving is Ksh ".$total." as follows:\n\n".$bag."\nWe apologise for the error & the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88";
                            //$msg = "Dear ".$fname.",\nYour giving for the Sabbath of 7/12/19 was Ksh ".$total." received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n"; //Kindly note that your member number is 962 and not 972.



                            $gateway    = new AfricasTalkingGateway($username, $apiKey);
                            $to = trim("+254".substr($recphone, -9)); //$str_phone   //trim according to country

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
                                }
                            }
                            catch ( AfricasTalkingGatewayException $e )
                            {
                                $resptxt = "OK";
                                $respcde = "200";
                                $respmsg = $e->getMessage();
                            }

                            //$respcde = "200";
                            //$respmsg = "Toa hii hapa!";
                            $msg = mysqli_real_escape_string($conn, $msg);
                            $fname = mysqli_real_escape_string($conn, $fname);
                            $lname = mysqli_real_escape_string($conn, $lname);

                            //echo "\n".'Message: '.$i.'/'.($numb_rcpt+1).' '.$recnames.' '.$msg."\n";

                            $leo_date = date("Y-m-d", time());
                            $leo_time = date("H:i:s", time());

                            $query = "SELECT * FROM `messages` WHERE `added_on` = '$leo_date'"; //`reference` = '$str_trxno'  AND `from_id` = '$udid' AND  `to_id` = '$recmemno' // AND `reg_timestamp` LIKE '%".$leo_datetime."'"; //`reference` = '$str_trxno'  AND `from_id` = '$udid' AND  `to_id` = '$recmemno' // AND `reg_timestamp` LIKE '%".$leo_datetime."'"; //TODO: Put a LIMIT of last 10 or Add datetime as the 3rd filter parameter to prevent the possiblity od older messages being updated.
                            $results = mysqli_query($conn, $query);
                            $numrows = mysqli_num_rows($results); 

                            //echo "\nHere 0.: ".$query."\n";

                            $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`, `to`, `from_name`, `to_name`, `from_id`, `to_id`, `message`, `reference`, `status`, `added_on`, `added_at`) VALUES (NULL, '$respidn', '0', '$from', '$to', 'KSDA_Church', '$recnames', '$udid', '$recmemno', '$msg', '$str_trxno', '$respmsg', '$leo_date', '$leo_time')";
                            mysqli_query($conn, $sql);

                            if($i+1 == $numb_rcpt+1)
                            {
                                    $query = "SELECT * FROM `messages` WHERE `added_on` = '$leo_date' ORDER BY conversation_id DESC LIMIT 1";  //WHERE `reference` != '$str_trxno' 
                                    $results = mysqli_query($conn, $query);
                                    $numrows = mysqli_num_rows($results); 

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

                                        //echo "\nHapa coz ($numrows <= 0) 1.: ".$query."\n";
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
                            }
                            else
                            {

                            }
                        }



?>