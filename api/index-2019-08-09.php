<?php

        error_reporting(E_ALL | E_STRICT);
        require_once('./config.php');
        session_start();
        
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
        $host     = $_SERVER['HTTP_HOST'];
        $script   = $_SERVER['SCRIPT_NAME'];
        $params   = $_SERVER['QUERY_STRING'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];
        
        $command = explode("/", $request_uri);
        $endpoint = $command[2];
        
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);

        
if($request_method == "POST")
{
    if(json_last_error_msg() == "No error")
    {        
        if($endpoint == "login" || $endpoint == "members" || $endpoint == "register" || $endpoint == "profile" || $endpoint == "departments" || $endpoint == "accounts" || $endpoint == "collections" || $endpoint == "verification" || $endpoint == "search" || $endpoint == "message" || $endpoint == "messages" || $endpoint == "statements" || $endpoint == "products" || $endpoint == "revenues" || $endpoint == "transaction" || $endpoint == "transactions" || $endpoint == "dashboard")
        {
            if($endpoint == "login")
            {
                $username = $obj['parameter2'];
                $password = $obj['parameter3'];

                if(!empty($username) and !empty($password))
                {
                        if(filter_var($username, FILTER_VALIDATE_EMAIL))
                        {
                                $query = "SELECT id, username, password FROM userdetails WHERE username = '$username' AND password = '$password' LIMIT 1"; //'".md5($password)."'
                                $results = mysqli_query($conn, $query);
                                $numrows = mysqli_num_rows($results);       
                                
                                if($numrows > 0)
                                {
                                    $data = 'Last login by '.$username.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                                    $fp = fopen ('logs.txt' , 'a');
                                    fwrite($fp, $data);
        
                                    $query = "SELECT * FROM `userdetails` WHERE `username` = '$username' OR `password` = '$password' AND `status` = 'active'";
                                    $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                                    while($row = mysqli_fetch_assoc($table))
                                    { 
                                        foreach($row as $key => $value) 
                                        { 
                                            $arr[$key] = $value;
                                        } 
                                        $main_arr[] = $arr;
                                    }
                                    $json = json_encode($main_arr);
                                    header("HTTP/1.0 200 OK");
                                    header('Content-Type: application/json');
                                    echo 
                                    '
                                        {
                                           "code": "200",
                                           "message": "OK",
                                           "data": '.$json.'
                                        }
                                    ';
                                    exit();
                                }
                                else 
                                {
                                    //If no records "No Content" status - user doesn't exist or username/password combination might be wrong.
                                    header("HTTP/1.0 403 Forbidden");
                                    header('Content-Type: application/json');
                                    echo 
                                    '
                                            {
                                                "code": "403",
                                                "message": "Forbidden",
                                                "data": null
                                            }
                                    ';
                                    exit();
                                }

                        }
                        else
                        {
                                    header("HTTP/1.0 401 Unauthorized");
                                    header('Content-Type: application/json');
                                    echo 
                                    '
                                            {
                                                "code": "401",
                                                "message": "Unauthorized",
                                                "data": null
                                            }
                                    ';
                                    exit();
                        }
                }
                else
                {
                    header("HTTP/1.0 400 Bad Request");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "400",
                                "message": "Bad Request",
                                "data": null
                            }
                    ';//Invalid Email address or Password
                    exit();                            
                }
            }
            elseif($endpoint == "members")
            {
                $department = $obj['parameter2'];
                $board_member = $obj['parameter3'];
                $adventist = $obj['parameter4'];
                $status = $obj['parameter5'];
                $ssclass = $obj['parameter6'];
                $role = $obj['parameter7'];
                $level = $obj['parameter8'];
                $user_id = $obj['parameter9'];
                
                if($department == "Sabbath School" && $role = 'admin' && $level = 'user')
                {
                    //SELECT DISTINCT ss_class FROM userdetails WHERE ss_class != '' AND ss_class != 'I do not know' AND ss_class != 'None/ I do not know';
                    $query = "SELECT * FROM `userdetails` WHERE `ss_class` = '$ssclass'"; //$ss_class
                }
                else if($department == "Prayer Cell" && $level = 'admin' && $role = 'user')
                {
                    //SELECT DISTINCT ss_class FROM userdetails WHERE ss_class != '' AND ss_class != 'I do not know' AND ss_class != 'None/ I do not know';
                    $query = "SELECT * FROM `userdetails` WHERE `prayer` = '$ss_class'"; //$ss_class
                }
                else if($department == "cbd")
                {
                    $query = "SELECT * FROM `userdetails` WHERE `board_member` = 'Yes'";
                }
                else if($department == "cims")
                {
                    $query = "SELECT * FROM `userdetails` WHERE `departments` = 'CIMS'";
                }
                else if($department == "awm")
                {
                    $query = "SELECT * FROM `userdetails` WHERE `departments` LIKE '%awm%'";
                }
                else
                {
                    $query = "SELECT * FROM `userdetails`";
                }
                
                $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                while($row = mysqli_fetch_assoc($table))
                { 
                    foreach($row as $key => $value) 
                    { 
                        $arr[$key] = $value;
                    } 
                    $main_arr[] = $arr;
                }
                $json = json_encode($main_arr);
                header("HTTP/1.0 200 OK");
                header('Content-Type: application/json');
                echo 
                '
                    {
                       "code": "200",
                       "message": "OK",
                       "data": '.$json.'
                    }
                ';
                exit();
            }
            elseif($endpoint == "register")
            {
                    header("HTTP/1.0 501 Not Implemented");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "501",
                                "message": "Not Implemented",
                                "data": null
                            }
                    ';
                    exit();
            }
            elseif($endpoint == "departments")
            {
                $sqlqq = "SELECT `id`, `name`, `alias`, `icon`, `thumbnail`, `description`, `leader`, `staff`, `mission`, `activities`, `resources`, `projections`, `statements`, `calendar`  FROM `departments` WHERE `status` = 'active'";
                $resqq = mysqli_query($conn, $sqlqq) or Die("Ooops! More entries coming, stay tuned!");
                $numrows = mysqli_num_rows($resqq);
                $numflds = mysqli_num_fields($resqq);

                echo 
                '
                    {
                        "code": "200",
                        "message": "OK",
                        "data":
                        [';
                            $i = 0;
                            while ($rowqq = mysqli_fetch_array($resqq)) 
                            {
                              $i++;
                                echo '{';
                                foreach($rowqq as $key => $value) 
                                { 
                                    $arr[$key] = $value;
                                    //echo "here".$value;
                                }


                                if ($resultqq = mysqli_query($conn, $sqlqq)) 
                                {
                                    $main_arr[] = $arr;
                                    for($j=0; $j<$numflds; $j++)
                                    {
                                        echo '"'.mysqli_fetch_field_direct($resultqq, $j)->name.'":'; if(substr($arr[$j], -1) != "]"){echo '"'.$arr[$j].'"';}else{ echo ''.$arr[$j].'';}
                                        if($j+1 < $numflds){echo', ';}
                                    }
                                    mysqli_free_result($resultqq);
                                }

                                echo '}';
                                if($i < $numrows){echo', ';}
                            }
                            echo 
                        ']
                    }';
                exit();
            }
            elseif($endpoint == "accounts")
            {
                $username = $obj['parameter2'];
                $password = $obj['parameter3'];
                $userid   = $obj['parameter4'];
                $limit    = $obj['parameter5'];
                $offset   = $obj['parameter6'];
                $pinno    = $obj['parameter7'];
                $type     = $obj['parameter8'];
                
                
                $querydb = "SELECT id, username, password FROM userdetails WHERE username = '$username' AND password = '$password' LIMIT 1";
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);       

                if($numrows > 0)
                {   
                    $querydb = "SELECT id, quantity, cost, amount, refund, account_no, status FROM `transactions` WHERE `user_id` = '$userid' AND `code` = '$pinno' LIMIT 1"; 
                    $results = mysqli_query($conn, $querydb);
                    $numrows = mysqli_num_rows($results);
                
                    if($numrows > 0)
                    {
                        $querydb = "SELECT * FROM `accounts` WHERE `user_id` = '$userid' ORDER BY `id` DESC LIMIT {$limit} OFFSET {$offset}";
                        $results = mysqli_query($conn, $querydb);
                        $numrows = mysqli_num_rows($results);  

                        if($numrows == 0)
                        {
                            header("HTTP/1.0 404 Not Found");
                            header('Content-Type: application/json');
                            echo 
                            '
                                [
                                    {
                                        "code": "404",
                                        "message": "Not Found",
                                        "data": null
                                    }
                                ]
                            ';
                            exit();
                        }
                        else
                        {
                            while($row = mysqli_fetch_assoc($results))
                            { 
                                foreach($row as $key => $value) 
                                { 
                                    $arr[$key] = $value;
                                } 
                                $main_arr[] = $arr;
                            }
                            $json = json_encode($main_arr);
                            header("HTTP/1.0 200 OK");
                            header('Content-Type: application/json');
                            echo 
                            '
                                {
                                   "code": "200",
                                   "message": "OK",
                                   "data": '.$json.'
                                }
                            ';
                            exit();
                        }
                    } 
                    else
                    {
                        header("HTTP/1.0 404Not Found");
                        header('Content-Type: application/json');
                        echo 
                        '
                            [
                                {
                                    "code": "404",
                                    "message": "Not Found",
                                    "data": null
                                }
                            ]
                        ';
                        exit();
                    }
                }
                else 
                {
                    header("HTTP/1.0 403 Forbidden");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "403",
                                "message": "Forbidden",
                                "data": null
                            }
                    ';
                    exit();
                }
            }
            elseif($endpoint == "collections")
            {
                $userid = $obj['parameter4'];
                $role = $obj['parameter5'];
                $level = $obj['parameter6']; 
                $limit =  $obj['parameter7'];
                $offset =  $obj['parameter8'];
                
                if($role == "treasurer")
                {
                    if($limit > 0)
                    {
                        if($offset > 0)
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT $limit OFFSET $offset;";
                        }
                        else
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT $limit;";
                        }
                    }
                    else
                    {
                        if($offset > 0)
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT 2 OFFSET $offset;";
                        }
                        else
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT 2;";
                        }
                    }
                }
                else
                {
                    $querydb = "SELECT * FROM `transactions` ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC
                }
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` != '$userid' ORDER BY id DESC"; //accounts //TODO: put filter, $criteria1 & $criteria2
                    $results = mysqli_query($conn, $querydb);
                    $numrows = mysqli_num_rows($results);
                    
                    while($row = mysqli_fetch_assoc($results))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                } 
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                        [
                            {
                                "code": "404",
                                "message": "Not Found",
                                "data": null
                            }
                        ]
                    ';
                    exit();
                }
            }
            elseif($endpoint == "statements")
            {
                $userid = $obj['parameter4'];
                $role = $obj['parameter5'];
                $level = $obj['parameter6']; 
                $limit =  $obj['parameter7'];
                $offset =  $obj['parameter8'];
                $membno =  $obj['parameter9'];
                
                if($role == "Treasurer")
                {
                    if($limit > 0)
                    {
                        if($offset > 0)
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT $limit OFFSET $offset;";
                        }
                        else
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT $limit;";
                        }
                    }
                    else
                    {
                        if($offset > 0)
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT 2 OFFSET $offset;";
                        }
                        else
                        {
                            $querydb = "SELECT * FROM `transactions` ORDER BY id DESC LIMIT 2;";
                        }
                    }
                }
                else
                {
                    $querydb = "SELECT * FROM `statements` WHERE `member_no` = '$membno' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC
                }
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` != '$userid' ORDER BY id DESC"; //accounts //TODO: put filter, $criteria1 & $criteria2
                    $results = mysqli_query($conn, $querydb);
                    $numrows = mysqli_num_rows($results);
                    
                    while($row = mysqli_fetch_assoc($results))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                } 
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                        [
                            {
                                "code": "404",
                                "message": "Not Found",
                                "data": null
                            }
                        ]
                    ';
                    exit();
                }
            }
            elseif($endpoint == "revenues")
            {
                $category_id = $obj['parameter2'];
                $subcategory_id = $obj['parameter3'];
                $organisation_id   = $obj['parameter4'];
                
                
                $querydb = "SELECT * FROM `products` WHERE `status` = '1' AND `organisation_id` = '2' ORDER BY `product_id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //$results = mysqli_query($conn, $querydb);
                    //$numrows = mysqli_num_rows($results);
                    
                    while($row = mysqli_fetch_assoc($results))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                    
                } 
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                        [
                            {
                                "code": "404",
                                "message": "Not Found",
                                "data": null
                            }
                        ]
                    ';
                    exit();
                }
            }
            elseif($endpoint == "products")
            {
                $querydb = "SELECT * FROM `products` WHERE `category_id` = '1' AND `status` = '1' AND `organisation_id` = '1' ORDER BY `product_id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //$results = mysqli_query($conn, $querydb);
                    //$numrows = mysqli_num_rows($results);
                    
                    while($row = mysqli_fetch_assoc($results))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                    
                } 
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                        [
                            {
                                "code": "404",
                                "message": "Not Found",
                                "data": null
                            }
                        ]
                    ';
                    exit();
                }
            }
            elseif($endpoint == "transaction")
            {
                $udid = $obj['parameter2'];  //deviceid or userid
                $numb = $obj['parameter3'];  //no_itemsel
                $cart = $obj['parameter4'];  //itemsel    //Todo, load these details to log. Will be used later as a temporary log.
                $fname = $obj['parameter5']; //deviceid
                $lname = $obj['parameter6']; $name = $fname." ".$lname;
                $str_phone = $obj['parameter7'];
                $str_email = $obj['parameter8'];
                $str_memno = $obj['parameter9'];
                $str_trxno = $obj['parameter10'];
                $total = $obj['parameter11'];
                $paymethod = $obj['parameter12'];
                $type = $obj['parameter13'];
                
                $trxid = mt_rand(100000, 199999);
                
                if($type == "giving")
                {
                    $items = explode("|", $cart); //28,Sugarcane,1,2, 2 ,Mpesa,Tirhaqa Mogaka,n/a|29,Eggs,30,1, 30 ,Mpesa,Tirhaqa Mogaka,n/a|
                }
                else
                {
                    $items = explode("|", $cart); //God's Tithe,2000|Combi. Offering,2000|Thanks Giving,500|Camp Offering,400|
                }
                
                
                
                for($i=0; $i<$numb; $i++)
                {
                    
                    if($type == "giving")
                    {
                        $item = explode(",", $items[$i]);
                                            
                        if($item != "")
                        {
                            $item_nm = trim($item[0]);
                            $item_co = $item[1];
                            $item_us = $obj['parameter5']." ".$obj['parameter6'];
                            $item_pm = $paymethod;
                            
                            if($item_co > 0)
                            {
                                $bag.= $item_nm." : Ksh.".$item_co."\n";
                            }
                            else 
                            {
                                
                            }
                        }
                    }
                    else
                    {
                        $item = explode(",", $items[$i]);
                                            
                        if($item != "")
                        {
                            $item_id = $item[0];
                            $item_nm = $item[1];
                            $item_pr = $item[2];
                            $item_qt = $item[3];
                            $item_co = $item[4];
                            $item_pm = $item[5];
                            $item_us = $item[6];
                        }
                    }
                    
                    //echo 'Idno: '.$item_id."\n";
                    //echo 'Itnm: '.$item_nm."\n";
                    //echo 'Itco: '.$item_co."\n";
                    //echo 'Itpm'.$item_pm."\n";
                    //echo 'Itpr'.$item_pr."\n";
                    //echo 'Itqt'.$item_qt."\n";
                    //echo 'Itus: '.$name."\n";
                    
                    //Insert into Db
                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`, `user_nm`, `device_id`, `department`, `code`, `type`, `method`, `currency`, `description`, `quantity`, `cost`, `vat`, `total_cost`, `discount`, `grand_total`, `paid`, `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`, `item_name`, `agent_id`, `added_by`, `added_on`, `updatedon`, `updatedby`, `approvedby`, `approvedon`, `action_on`, `action_by`, `status`) VALUES (NULL, '$str_memno', '$name', '$udid', NULL, '$trxid', NULL, '$item_pm', NULL, NULL, '$item_qt', '$item_pr', NULL, '$item_co', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$item_id', '$item_nm', NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL, NULL, NULL, NULL, NULL, 'Synced');";
                    mysqli_query($conn, $queryin); //TODO: Check if was successfully inserted and if so proceed to fetch all transactions else show error note to user.    
                }              
                
                
                //Send SMS receipt to member
                require 'AfricasTalkingGateway.php';

                $username   = "tommy";
                $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                $from = "KSDA_Church";

                $to = $str_phone; //"Dear ".$fname.", your giving on ".$day1." was Ksh ".$bag.":
                $msg = "Dear ".$fname.",\nYour giving of Ksh ".$total." has been received as follows:\n\n".$bag."\nBe Blessed.\nKarengata Treasury ";


                $gateway    = new AfricasTalkingGateway($username, $apiKey);

                try
                {
                    $results = $gateway->sendMessage($to, $msg, $from); //$to

                    foreach( $results as $result ) 
                    {
                        //TODO: Update message delivery satus in the database //$result->status //$result->messageId //$result->cost
                        $resptxt = "OK";
                        $respcde = "200";
                        $respmsg = $result->status;
                    }
                }
                catch ( AfricasTalkingGatewayException $e )
                {
                    $resptxt = "OK";
                    $respcde = "200";
                    $respmsg = $e->getMessage();
                }
                
                header("HTTP/1.0 ".$respcde." ".$resptxt);
                header('Content-Type: application/json');
                echo 
                '
                        {
                            "code": "'.$respcde.'",
                            "message": "'.$respmsg.'",
                            "data": []
                        }
                ';
                exit();
            }
            elseif($endpoint == "transactions")
            {
                //TODO: Log this request in logs table
                          
                //$querydb = "SELECT * FROM `products` WHERE `category_id` = '1' AND `status` = '1' ORDER BY `product_id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                $querydb = "SELECT * FROM `transactions` WHERE `device_id` != '' ORDER BY `id` DESC"; //$udid //TODO: put filter, $criteria1 & $criteria2
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //$results = mysqli_query($conn, $querydb);
                    //$numrows = mysqli_num_rows($results);
                    
                        $simserial = $obj['parameter5'];
                        
                        if($simserial == "89254021064149932947")
                        {
                        while($row = mysqli_fetch_assoc($results))
                        { 
                            foreach($row as $key => $value) 
                            { 
                                $arr[$key] = $value;
                            } 
                            $main_arr[] = $arr;
                        }
                        $json = json_encode($main_arr);
                        header("HTTP/1.0 200 OK");
                        header('Content-Type: application/json');
                        echo 
                        '
                            {
                               "code": "200",
                               "message": "OK",
                               "data": '.$json.'
                            }
                        ';
                        }
                        else
                        {
                            echo 
                            '{
                                "code": "200",
                                "message": "OK",
                                "data": 
                                [
                                    {
                                    "id": "34",
                                    "user_id": "158",
                                    "payer": "Tommy Mogaka",
                                    "receiptnumber": "108722",
                                    "method": "Bank",
                                    "quantity": "1",
                                    "cost": "50",
                                    "total_cost": "50",
                                    "item_name": "Charcoal Big Bag",
                                    "transactiondate": "2019-07-05 08:48:58",
                                    "status": "Synced"
                                }
                                ]
                            }';
                        }
                    
                    
                    exit();
                    
                } 
                else
                {
                    header("HTTP/1.0 404 Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                        [
                            {
                                "code": "404",
                                "message": "Not Found",
                                "data":  null
                            }
                        ]
                    '."\n".$queryin;
                    exit();
                }
            }
            elseif($endpoint == "dashboard")
            {
                //TODO: Log this request in logs table
                          
                //$querydb = "SELECT * FROM `products` WHERE `category_id` = '1' AND `status` = '1' ORDER BY `product_id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                $querydb = "SELECT * FROM `system_logs` WHERE `editor` = 'rms' AND `action` = 'Login' ORDER BY `id` DESC"; //$udid //TODO: put filter, $criteria1 & $criteria2
                $results = mysqli_query($conn, $querydb);
                $numrows = mysqli_num_rows($results);

                if($numrows > 0)
                {
                    //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $queryUser));
                    //$memnos = $rowUser['member_no'];
                    
                    //$querydb = "SELECT * FROM `transactions` WHERE `user_id` = '$userid' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                    //$results = mysqli_query($conn, $querydb);
                    //$numrows = mysqli_num_rows($results);
                    
                    while($row = mysqli_fetch_assoc($results))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                    
                } 
                else
                {
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": null
                        }
                    ';
                    exit();
                }
            }
            elseif($endpoint == "message")
            {
                $id = $obj['parameter2'];  //id
                $to = $obj['parameter3'];  //to
                $msg = $obj['parameter4']; //msg
                $aid = $obj['parameter5']; //aid                    
                $type = $obj['parameter6'];  //type
                $filter = $obj['parameter7'];  //filter
                
                //TODO: Insert message into the database.
                
                //Set random number
                //UPDATE userdetails SET trx_number = LPAD(FLOOR(RAND()*10000), 4, '0'); 
                //UPDATE userdetails SET trx_number = (select floor(0+ RAND() * 10000) WHERE );
                
                //Send out random numbers to users
                                
                require 'AfricasTalkingGateway.php';

                $username   = "tommy";
                $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                $from = "KSDA_Church";

                $gateway    = new AfricasTalkingGateway($username, $apiKey);

                try
                {
                    $results = $gateway->sendMessage($to, $msg, $from);

                    foreach( $results as $result ) 
                    {
                        //TODO: Update message delivery satus in the database //$result->status //$result->messageId //$result->cost
                        $resptxt = "OK";
                        $respcde = "200";
                        $respmsg = $result->status;
                    }
                }
                catch ( AfricasTalkingGatewayException $e )
                {
                    $resptxt = "OK";
                    $respcde = "200";
                    $respmsg = $e->getMessage();
                }
                
                
                header("HTTP/1.0 ".$respcde." ".$resptxt);
                header('Content-Type: application/json');
                echo 
                '
                        {
                            "code": "'.$respcde.'",
                            "message": "'.$respmsg.'",
                            "data": null
                        }
                ';
                exit();
            }
            elseif($endpoint == "messages")
            {
                $usid = $obj['parameter2'];  //aid
                $data = $obj['parameter3'];  //data   //158,720689160|225,720689160|73,720689160|903,720689160|25,720689160|434,720689160|535,720689160|452,720689160|344,720689160|
                $type = $obj['parameter4'];  //type   //all, some
                $filter = $obj['parameter5'];//filter criteria
                $count = $obj['parameter6'];
                $ujumbe = $obj['parameter7'];
                $list = $obj['parameter8'];  //list criteria //amo, awm, cims
                
                
                //TODO: Insert message into the database.
                
                //Set random number
                //UPDATE userdetails SET trx_number = LPAD(FLOOR(RAND()*10000), 4, '0'); 
                //UPDATE userdetails SET trx_number = (select floor(0+ RAND() * 10000) WHERE );
                
                //Send out random numbers to users
                                
                require 'AfricasTalkingGateway.php';

                $username   = "tommy";
                $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                $from = "KSDA_Church";

                $gateway    = new AfricasTalkingGateway($username, $apiKey);

                if($type == "multiple" || $type == "all")
                {
                    $users = explode("|", $data); //158,720689160|0,722460273|
                               
                    for($i=0; $i<$count; $i++)
                    {
                        $user = explode(",", $users[$i]);
                        
                        //echo " ".$user[0];//Memno
                        //echo ",".$user[1];//Phone
                        
                        if($user != "")
                        {
                            $membr_num = $user[0];
                            $phone_num = $user[1];
                            $to = trim("+254".substr($phone_num, -9));
                            
                            //Get recipients first name from the database
                            $query = "SELECT * FROM `userdetails` WHERE `member_no` = '$membr_num'"; //echo "Query: ".$query;
                            //$queryUserDetails = mysqli_query($conn, $query) or Die("Ooops! More entries coming, stay tuned!");
                            //$rowUserDetails = mysqli_fetch_array($queryUserDetails);
                            //$fname = replace_null($rowUserDetails['firstname'], 'Friend');
                            
                            //$UserDetails = mysqli_fetch_assoc(mysqli_query($conn, $query));
                            //$userID = $UserDetails['userID'];
                            //$fname = replace_null($UserDetails['firstname'], 'Friend');
                            
                            //$userQuery = mysqli_query($conn, $query) or die("select table failed!!");
                            //$rowUser = mysql_fetch_array($userQuery);
                            //extract($rowUser);
                            
                            //$queryUser = "SELECT * FROM `userdetails` WHERE `id` = '$userid'";
                            $rowUser = mysqli_fetch_array(mysqli_query($conn, $query));
                            $fname = $rowUser['firstname']; //echo "Fname: ".$fname;
                            $trxno = $rowUser['trx_number']; 
                            // $ujumbe = "We have been piloting the Treasury's SMS reporting these last Sabbaths with the Church Board Members.\n\nAs we prepare to roll it out to the rest of the members, we would like your feedback as suggestions or observations e.g. any errors in messaging etc on the last two Sabbath's notifications.\n\nPlease reach me at 0720115358 with feedback!\nGeorge Manua,\nChurch Treasurer.\n\nUse '".$trxno."' as your transaction number this Sabbath.";
                            $ujumbe = "As you give this Sabbath, clearly write '".$trxno."' on the envelope. This no. will be used for receipting and tracking purposes.\n\nBe Blessed,\nKarengata Treasury.";
                                                        
                            //TODO: Instert message into the the messages table in the database
                                                        
                            try
                            {
                                $results = $gateway->sendMessage($to, "Dear ".$fname.",\n".$ujumbe, $from);

                                foreach( $results as $result ) 
                                {
                                    $resptxt = "OK";
                                    $respcde = "200";
                                    $respmsg = $result->status;
                                    
                                    //TODO: Update message delivery satus in the database //$result->status //$result->messageId //$result->cost
                                    
                                }
                            }
                            catch ( AfricasTalkingGatewayException $e )
                            {
                                $resptxt = "OK";
                                $respcde = "200";
                                $respmsg = $e->getMessage();
                            }
                        }
                        else
                        {
                            echo "Iko shida fulani.";
                        }
                    }
                }
                else 
                {
//                    if($filter != "")
//                    {
//                        if($filter == "Departments")
//                        {
//                            $criteria1 = "departments";
//                            $query = "SELECT * FROM `userdetails` WHERE $criteria1 LIKE '%CIMS%'";
//                        }
//                        else
//                        {
//                            $query = "SELECT * FROM `userdetails` WHERE $criteria1 LIKE '%CIMS%'";
//                        }
//                    }
//                    else
//                    {
//                        
//                    }
                    
                    if($list != "")
                    {
                        if($list == "cims")
                        {
                            $criteria1 = "departments";
                            $criteria2 = "CIMS";
                        }
                        else if($list == "cbd")
                        {
                            $criteria1 = "departments";
                            $criteria2 = "CBD";
                        }
                        else
                        {
                            
                        }
                        $query = "SELECT * FROM `userdetails` WHERE $criteria1 LIKE '%".$criteria2."%'";
                    }
                    else
                    {
                        $query = "SELECT * FROM `userdetails`";
                    }
                    
                    
                    
                    $to = "+254717056126,+254720689160";
                    
                    if ($result == mysqli_query($conn, $query))
                    {
                        // Fetch one and one row
                        while ($row = mysqli_fetch_row($result))
                        {
                            printf ("%s (%s)\n",$row[0],$row[1]);
                        }
                        // Free result set
                        mysqli_free_result($result);
                    }
                    mysqli_close($con);
                }
                
                header("HTTP/1.0 ".$respcde." ".$resptxt);
                header('Content-Type: application/json');
                echo 
                '
                        {
                            "code": "'.$respcde.'",
                            "message": "'.$respmsg.'",
                            "data": null
                        }
                ';
                exit();
            }
            elseif($endpoint == "verification")
            {
                $txtf_trxno = $obj['parameter2']; //txtf_trxno
                $user_id = $obj['parameter3']; //user_id

                $query = "SELECT id, trx_number FROM userdetails WHERE trx_number = $txtf_trxno"; //'".md5($password)."'
                $results = mysqli_query($conn, $query);
                $numrows = mysqli_num_rows($results);       

                if($numrows == 1)
                {
                    //TODO: put into logs table instead of txt file.
                    $data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                    $fp = fopen ('logs.txt' , 'a');
                    fwrite($fp, $data);

                    $query = "SELECT * FROM userdetails WHERE trx_number = $txtf_trxno";
                    $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                    while($row = mysqli_fetch_assoc($table))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                }
                else if($numrows > 1)
                {
                    header("HTTP/1.0 409 Unauthorized");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "409",
                                "message": "Transaction code used more than once. Please report this immediately!",
                                "data": null
                            }
                    ';
                    exit();
                }
                else 
                {
                    //If no records "No Content" status - transaction number doesn't exist.
                    header("HTTP/1.0 403 Forbidden");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "403",
                                "message": "Forbidden",
                                "data": [null]
                            }
                    ';
                    exit();
                }
            }
            elseif($endpoint == "search")
            {
                $txtf_searchterm = $obj['parameter2']; //txtf_trxno
                $user_id = $obj['parameter3']; //user_id

                $query = "SELECT id, firstname, lastname, phone, email FROM userdetails WHERE idno = $txtf_searchterm"; //TODO: Add filter criterion
                $results = mysqli_query($conn, $query);
                $numrows = mysqli_num_rows($results);       

                if($numrows == 1)
                {
                    //TODO: put into logs table instead of txt file.
                    $data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                    $fp = fopen ('logs.txt' , 'a');
                    fwrite($fp, $data);

                    $query = "SELECT * FROM userdetails WHERE idno = $txtf_searchterm";
                    $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                    while($row = mysqli_fetch_assoc($table))
                    { 
                        foreach($row as $key => $value) 
                        { 
                            $arr[$key] = $value;
                        } 
                        $main_arr[] = $arr;
                    }
                    $json = json_encode($main_arr);
                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": '.$json.'
                        }
                    ';
                    exit();
                }
                else if($numrows > 1)
                {
                    header("HTTP/1.0 409 Unauthorized");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "409",
                                "message": "User ID number appears more than once. Please report this immediately!",
                                "data": null
                            }
                    ';
                    exit();
                }
                else 
                {
                    //If no records "No Content" status - id number doesn't exist.
                    header("HTTP/1.0 403 Forbidden");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "403",
                                "message": "Forbidden",
                                "data": null
                            }
                    ';
                    exit();
                }
            }
            else 
            {
                header("HTTP/1.0 418 I\'m a teapot");
                header('Content-Type: application/json');
                echo 
                '
                    [
                        {
                            "code": "418",
                            "message": "I\'m a teapot",
                            "data": null
                        }
                    ]
                ';
                exit();
            }
        }
        else 
        {
            header("HTTP/1.0 404 Not Found");
            header('Content-Type: application/json');
            echo 
            '
                [
                    {
                        "code": "404",
                        "message": "Not Found",
                        "data": null
                    }
                ]
            ';
            exit();
        }
    }
    else
    {
        header("HTTP/1.0 400 Bad Request");
        header('Content-Type: application/json');
        echo 
        '
            [
                {
                    "code": "400",
                    "message": "Bad Requestxxxx",
                    "data": null
                }
            ]
        ';
        exit();
    }
}
else 
{
   
    if($endpoint == "pay")
    {
        //header("Location: ../pay"); //Location: ../pay.php?set=use
        header('Location: http://localhost/ChurchApp/pay/index.php');
        exit;
    }
    else if($endpoint == "admin")
    {
        //header("Location: ../pay"); //Location: ../pay.php?set=use
        header('Location: http://localhost/ChurchApp/admin/index.php');
        exit;
    }
    else if($endpoint == "cims")
    {
        //header("Location: ../pay"); //Location: ../pay.php?set=use
        header('Location: http://localhost/ChurchApp/cims/index.php');
        exit;
    }
    else
    {
        header("HTTP/1.0 405 Method Not Allowed");
        header('Content-Type: application/json');
        echo 
        '
            [
                {
                    "code": "405",
                    "message": "Method Not Allowed",
                    "data": null
                }
            ]
        ';
        exit();
    }
}

?>
