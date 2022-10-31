<?php
set_time_limit ( 0 );

    ini_set('memory_limit', '2560M');
    
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
        if($endpoint == "authenticate" || $endpoint == "login" || $endpoint == "members" || $endpoint == "register" || $endpoint == "profile" || $endpoint == "departments" || $endpoint == "accounts" || $endpoint == "collections" || $endpoint == "verification" || $endpoint == "search" || $endpoint == "message" || $endpoint == "messages" || $endpoint == "statements" || $endpoint == "products" || $endpoint == "revenues" || $endpoint == "transaction" || $endpoint == "transactions" || $endpoint == "dashboard")
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
                    $username = $obj['UserName'];
                    $password = $obj['Password'];

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
            elseif($endpoint == "authenticate")
            {
                header("HTTP/1.0 200 OK");
                header('Content-Type: application/json');
                echo 
                '
                    {
                      "code": "200",
                      "message": "OK",
                      "data": 
                      [
                        {
                          "Id": "7676f122-0382-428d-a69b-077db4d3c0de",
                          "UserName": "RMS",
                          "FirstName": "TBL",
                          "LastName": "TBL"
                          "content": 
                          {
                            "UnsurrenderdAmount": 9950,
                            "CashLimitAmount": 5000,
                            "CashLimitBal": 40050,
                            "NextCheckinDate": "05-06-2020",
                            "LastSync": "06-05-2019 12:42:16",
                            "CheckInBy": "17-09-2020 12:52:03"
                          }
                        }
                      ]
                    }
                ';
                exit();
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
                    $query = "SELECT * FROM `userdetails` WHERE `board_member` = 'yes'";
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
                    //$query = 'SELECT * FROM `userdetails`'; // WHERE `phone` != "" AND `comments_remarks` = "Present"  // WHERE `board_member` = 'yes'  LIMIT 1, 94  //WHERE `phone` != "" AND `comments_remarks` = 'Present'
                    //$query = 'SELECT * FROM `userdetails` WHERE comments_remarks = "Missing" AND phone != "" OR comments_remarks = "Present" AND phone != ""';
                    $query = 'SELECT * FROM `userdetails` WHERE `church_officer` = "Yes" AND phone != ""';
                }
                
                header("HTTP/1.0 200 OK");
                header('Content-Type: application/json');
                echo 
                '
                    {
                       "code": "200",
                       "message": "OK",
                       "data":[
                ';
                $i=0;
                $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                $count = mysqli_num_rows($table); 
                while($row = mysqli_fetch_assoc($table))
                {
                    //$json = '[';
                    foreach($row as $key => $value) 
                    {
                        //$arr[$key] = $value;
                        if($key == "added_by")
                        {
                            if($i == ($count-1))
                            {
                                echo '"'.$key.'":'.'"'.ucwords($value).'"}';
                                //$json .'"'.$key.'":'.'"'.$value.'"}';
                            }
                            else
                            {
                                echo '"'.$key.'":'.'"'.ucwords($value).'"},';
                                //$json .'"'.$key.'":'.'"'.$value.'"},';
                            }
                        }
                        else 
                        {
                            if($key == "id")
                            {
                                echo '{"'.$key.'":'.'"'.ucwords($value).'",';
                                //$json .'{"'.$key.'":'.'"'.$value.'",';
                            }
                            else
                            {
                                echo '"'.$key.'":'.'"'.ucwords($value).'",';
                                //$json .'"'.$key.'":'.'"'.$value.'",';
                            }
                        }
                    } 
                    
                    //$json.= ']';
                    
                    $i++;
                    
                    //return $json;
                    
                }
                //$json = json_encode($main_arr);
                //echo "Here: ".$main_arr;
                //$json = json_encode([$main_arr], JSON_UNESCAPED_UNICODE);
                //$json = json_encode(utf8ize($main_arr));
                //$json = json_encode($main_arr);
                //$json = json_encode(utf8_encode($main_arr));
                //echo json_last_error_msg(); // Print out the error if any
                //echo "\n enc: ".mb_detect_encoding();
                //die();
                
                echo 
                '
                    ]}
                ';
                
                //echo( json_encode(['status' => 'success', 'data' => $courses], JSON_UNESCAPED_UNICODE) );
                
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
                                        "message": "Not Found 1",
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
                                    "message": "Not Found 2",
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
                                "message": "Not Found 3",
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
                                "message": "Not Found 4",
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
                                "message": "Not Found 5",
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
                                "message": "Not Found 6",
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
                $cart = $obj['parameter4'];  //itemsel    //TODO: load these details to log. Will be used later as a temporary log.
                $fname = $obj['parameter5']; //deviceid
                $lname = $obj['parameter6']; $name = $fname." ".$lname;
                $str_phone = $obj['parameter7'];
                $str_email = $obj['parameter8'];
                $str_memno = $obj['parameter9'];
                $str_trxno = $obj['parameter10'];
                $total = $obj['parameter11'];
                $paymethod = $obj['parameter12'];
                $type = $obj['parameter13'];
                $dept = $obj['parameter14'];
                $refn = $obj['parameter15'];
                $rcpt = $obj['parameter16'];
                
                $trxid = $str_trxno;//mt_rand(100000, 199999);
                
                $simserial = $obj['SIMCardSerial'];
                
                //echo "Here: ".$simserial;
                        
                
                    
                    //$items = explode("|", $cart); //28,Sugarcane,1,2, 2 ,Mpesa,Tirhaqa Mogaka,n/a|29,Eggs,30,1, 30 ,Mpesa,Tirhaqa Mogaka,n/a|

                    //$items = explode("|", $cart); //God's Tithe,2000|Combi. Offering,2000|Thanks Giving,500|Camp Offering,400|
                    $items = explode("|", $cart); //echo 'Cart: '.$cart."\n";
                    //    God's Tithe*500 ^ (cash * 300 * 2020-01-24 * ) ^ (Mastercard * 200 * 2020-01-24 * ABC123) ^ (N/a * 0 * N/a * N/a)|
                    //    Combi. Offering*500 ^ (N/a * 0 * N/a * N/a) ^ (N/a * 0 * N/a * N/a) ^ (N/a * 0 * N/a * N/a)|
                    //    AYS*300 ^ (cash * 300 * 2020-01-24 * ) ^ (N/a * N/a * N/a * N/a) ^ (N/a * N/a * N/a * N/a)|

                    for($i=0; $i<$numb; $i++)
                    {

                        if($type == "giving")
                        {
                            $item = explode(",", $items[$i]);

                            if($item != "")
                            {
                                $item_nm = trim($item[0]);  //trim(urlencode($item[0]));
                                $item_co = $item[1];
                                $item_us = $obj['parameter5']." ".$obj['parameter6'];
                                $item_pm = $paymethod;

                                if($item_co > 0)
                                {
                                    $bag.= $item_nm." : Ksh.".$item_co."\n";
                                    
                                    //generate serial - check last serial for that day, if not there then start from 1 of there then add plus one.
                                    
                                    //Insert into Db
                                    $item_jina = mysqli_real_escape_string($conn, $item_nm); //utf8_encode($item_nm); //urlencode($item_nm);
                                    $name = mysqli_real_escape_string($conn, $name);
                                    $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`, `department`, `code`,  `type`, `method`,   `currency`,  `description`, `quantity`, `cost`,     `vat`, `total_cost`,  `discount`,  `grand_total`, `amount`,      `due`, `refund`, `account_no`, `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,  `item_name`,  `agent_id`,  `added_by`,  `added_on`,           `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                                            . "                     VALUES (NULL, '$str_memno', '$name',   '$udid',      '$dept',        '$trxid', NULL,  '$item_pm', NULL,        NULL,          '$item_qt', '$item_pr', NULL,  NULL,           NULL,        NULL,         '$item_co',   NULL,  NULL,    NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,    NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";
                                    //echo "SQL: ".$queryin."\n";
                                    
                                    mysqli_query($conn, $queryin); 
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

//                        echo 'Idno: '.$item_id."\n";
//                        echo 'Itnm: '.$item_nm."\n";
//                        echo 'Itco: '.$item_co."\n";
//                        echo 'Itpm: '.$item_pm."\n";
//                        echo 'Itpr: '.$item_pr."\n";
//                        echo 'Itqt: '.$item_qt."\n";
//                        echo 'Itus: '.$name."\n";
//                        echo "================\n";

                        /*
                        Idno: 
                        Itnm: God's Tithe
                        Itco: 1800
                        Itpm: Mpesa
                        Itpr:
                        Itqt: 
                        Itus: Tommy Mogaka
                        ================
                        */

                         
                    }              


                    //Send SMS receipt to member
                    require 'AfricasTalkingGateway.php';
    
                    $username   = "tommy";
                    $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                    $from = "KSDA_Church";
    
                    //$to = $str_phone; //"Dear ".$fname.", your giving on ".$day1." was Ksh ".$bag.":
                    $msg = "Dear ".$fname.",\nYour giving of Ksh ".$total." has been received as follows:\n\n".$bag."\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n";
                    //$msg = "Dear ".$fname.",\nYour giving this past Sabbath was Ksh ".$total." and has been received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n";
                    //$msg = "Dear ".$fname.",\nPlease igonore the previous message as it had an error. Your correct giving is Ksh ".$total." as follows:\n\n".$bag."\nWe apologise for the error & the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88";
                    //$msg = "Dear ".$fname.",\nYour giving for the Sabbath of 7/12/19 was Ksh ".$total." received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n"; //Kindly note that your member number is 962 and not 972.
    
                    $gateway    = new AfricasTalkingGateway($username, $apiKey);
                    $to = trim("+254".substr($str_phone, -9)); //trim according to country
    
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
                     
                    $sql = "INSERT INTO `messages` (`id`, `message_id`, `from`, `to`, `from_name`, `to_name`, `message`, `reference`, `status`) VALUES (NULL, '$respidn', '$from', '$to', 'KSDA_Church', '$fname $lname', '$msg', '$str_trxno', '$respmsg')";
                    mysqli_query($conn, $sql);
                    
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
                    
                    
                    $query = "SELECT * FROM `messages` WHERE `reference` = '$str_trxno' ORDER BY id DESC"; 
                    $rowMsg = mysqli_fetch_array(mysqli_query($conn, $query));
                    $last_id = $rowMsg['id'];
                    
                    header("HTTP/1.0 ".$respcde." ".$resptxt);
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "'.$respcde.'",
                                "message": "'.$respmsg.'",
                                "data": "['.$last_id.']"
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
                    
                        $simserial = $obj['SIMCardSerial'];
                        
                        if($simserial == "89254021064149932947" || $simserial == "89254021014074391676") //89254021064149932947 -> Tommy  //89254021014074391676 -> Paul
                        {
                            header("HTTP/1.0 200 OK");
                            header('Content-Type: application/json');
                            echo 
                            '
                                {
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
                                }
                            ';
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
                                "message": "Not Found 7",
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
                
                $to = trim("+254".substr($to, -9));

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
                            $query = "SELECT * FROM `userdetails` WHERE `member_no` = '$membr_num'"; // AND board_member = 'yes'
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
                            $fname = mysqli_real_escape_string($conn, $fname);
                            $trxno = $rowUser['trx_number']; 
                            $memnu = $rowUser['member_no']; 
                            
                            //$ujumbe = "Please remember to write ".$memnu." on your envelope tomorrow as you give.\n\nHave a blessed Sabbath,\nKarengata Treasury.";
                            //$ujumbe = "Happy Sabbath, please write ".$trxno." on your envelope as you give to the Lord tomorrow. We will use this number for receipting and tracking purposes.\n\nBe Blessed,\nKarengata Treasury.";
                            //$ujumbe = "As you give this Sabbath, clearly write '".$trxno."' on the envelope. This no. will be used for receipting and tracking purposes.\n\nBe Blessed,\nTreasury Dept.";
                            //$ujumbe = "We have been piloting the Treasury's SMS reporting these last Sabbaths with the Church Board Members.\n\nAs we prepare to roll it out to the rest of the members, we would like your feedback as suggestions or observations e.g. any errors in messaging etc on the last two Sabbath's notifications.\n\nPlease reach me at 0720115358 with feedback!\nGeorge Manua,\nChurch Treasurer.\n\nUse '".$trxno."' as your transaction number this Sabbath.";   
                            //$ujumbe = "Your member number is ".$memnu.". Please be noting it on your envelope when returning tithes and giving offerings.\n\nBe blessed,\nKarengata Treasury.";
                            //$ujumbe = "\nHe who began the good work in you will be faithful to complete it. - Philippians 1:6\n\nHave a Blessed Sabbath!\n[Your Member No: ".$memnu."]";
                            //$ujumbe = "In Christ is life, original, unborrowed, underived. “He that has the Son has life.” 1John5:12, E.G.White DA-530\n\nH. Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "Delight thyself also in the LORD; and He shall give thee the desires of thine heart. - Ps 37:4\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "Keep my Sabbaths holy, that they may be a sign between us. Then you will know that I am the Lord your God. - Ezekiel 20:19,20\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "you are reminded that church tomorrow will be held at your prayer cell. Please remember to invite a neighbour!\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "'...even before we open to Him our distresses, He is making arrangements for our deliverance.' - E.G.White, OFC 256.6\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "\nWhen we sorrow, God sorrows too for He collects our tears in a bottle & writes them in a book. - Psalms 56:8\n\nH. Sabbath!\n//Member No: ".$memnu;
                            //TODO: Instert message into the the messages table in the database
                            //echo "Fname: ".$fname." From: ".$from." To: ".$to." Msg: ".$ujumbe;
                            //$ujumbe = "your member number is ".$memnu.". Please remember to write it on your tithes and offerings envelope.\n\nHappy Sabbath,\nKarengata Treasury.";
                            //$ujumbe = "God longs to have you expect great things from Him. - E.White COL 146.4\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "starting tomorrow to 9th November will will have a week of prayer facilitated by Ev. Jared Okello featuring Prayers, Music, Testimonies and more... The programme will be as follows:\nSat: Problems Are Problems\nSun: Showered in Prayer\nMon: The Dove in the Lead\nTue: Living on the Edge\nWed: Fire that is really fire\nThu: 4 u & 4 Me\nFri: Mission Impossible\nSat: Burning Hearts\n\nWelcome & Happy Sabbath!";
                            //$ujumbe = "from tomorrow to 9th Nov will be a week of prayer featuring Prayers, Music, Testimonies & more.\n\nWelcome & Happy Sabbath!\n//Member No: ".$memnu;
                            //$ujumbe = "A revival of true godliness among us is the greatest and most urgent of all our needs. EGW, TR 9.1\n\nHappy Sabbath!\n//Member No: ".$memnu;
                            //A kind, courteous Christian is the most powerful argument that can be produced in favor of Christianity.
                            //$ujumbe = "God longs to have you expect great things from Him. - E.White COL 146.4\n\nHappy Sabbath!\nYour Member No: ".$memnu;
                            //$ujumbe = "There is no class that can achieve greater results for God & humanity than the young. — EGW, MTC 78.1\n\nTomorrow is AYS Investiture Sabbath. Welcome!\n\nCare & Concerns: 020 200 88 88\n//M.No: ".$memnu."\n";
                            //$ujumbe = "beloved, I pray that in every way you may prosper and enjoy good health, as your soul also prospers. — 3 John 1:2";
                            //$ujumbe = "today is HIV/AIDS awareness Sabbath. —Don’t look out only for your own interests, but take an interest in others too.— Philippians 2:4\n\nSMS/Call: 020 200 88 88\n//M.No: ".$memnu."\n";
                            
                            //$ujumbe = "I sincerely thank all our members and friends for the overwhelming support to Operation Home Stretch(OHS). Priase be to God!\n\nAs OHS ends this Sabbath, you are urged to redeem your pledges using the collection envelopes.\n\nTo keep the sanctity of the Sabbath, it's *only* the special guests who will give the contributions in a very brief session right after the service.\n\nMay the Lord bless you in your plans,\n\nPastor Stanley Muchoki.";
                            
                            
                            //$ujumbe = "May God increase you a thousand times over & bless you as He has promised. Deut 1:11\n\nSMS/Call: 020 200 88 88\n//MNo: ".$memnu."\n";
                            //$ujumbe = "Happy Communion Sabbath! May God richy bless you and give you peace as He has promised in Dt 1:11 & Is 53:5.\n\nSMS/Call: 020 200 88 88\nMNo: ".$memnu."\n";
                            $ujumbe = "your presence is highly required this Sunday from 8am to 3pm at church for the worker's training. Please plan to attend!\n\nPersonal Ministries";
                            
                            try
                            {
                                $results = $gateway->sendMessage($to, "Dear ".$fname.", ".$ujumbe, $from); //$to, "Dear ".$fname.", ".$ujumbe, $from  //$to, $ujumbe, $from

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

                //$query = "SELECT id, trx_number FROM userdetails WHERE trx_number = $txtf_trxno"; //'".md5($password)."'
                $query = "SELECT id, trx_number, member_no FROM userdetails WHERE `member_no` = '$txtf_trxno'"; //'".md5($password)."'
                $results = mysqli_query($conn, $query);
                $numrows = mysqli_num_rows($results);       

                if($numrows == 1)
                {
                    //TODO: put into logs table instead of txt file.
                    $data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                    $fp = fopen ('logs.txt' , 'a');
                    fwrite($fp, $data);

                    $query = "SELECT * FROM userdetails WHERE member_no = '$txtf_trxno'";
                    //$query = "SELECT * FROM userdetails WHERE trx_number = $txtf_trxno";
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
                
                $txtf_searchterm1 = "Brian";
                $txtf_searchterm2 = "Mo";
                $user_id = $obj['parameter3']; //user_id

                $data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                $fp = fopen ('logs.txt' , 'a');
                fwrite($fp, $data);

                //$jina = $txtf_searchterm1." ".$txtf_searchterm2;
                
                $jina = explode(' ' , trim($txtf_searchterm));
                $num_names = count($jina);
                if($num_names == 1)
                {
                    $Fname = $jina[0];
                    $Mname = "xx";
                    $Lname = "xx";
                }
                if($num_names == 2)
                {
                    $Fname = $jina[0];
                    $Mname = $jina[1];
                    $Lname = "xx";
                }
                if($num_names == 3)
                {
                    $Fname = $jina[0];
                    $Mname = $jina[1];
                    $Lname = $jina[2];
                }
                
                //$query = "SELECT * FROM userdetails Locate(name,'$txtf_searchterm')!=0";
                //$query = "SELECT * FROM userdetails WHERE `name` LIKE CONCAT('%', $txtf_searchterm, '%')";
                //$query = "SELECT `id`, `member_no`, `name` FROM userdetails WHERE LOWER(`name`) LIKE LOWER('$txtf_searchterm%') OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm')";
                //$query = "SELECT `id`, `member_no`, `name` FROM userdetails WHERE `member_no` = '$txtf_searchterm' OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm%') OR LOWER(`firstname`) LIKE LOWER('%$Fname%') OR LOWER(`middlename`) LIKE LOWER('%$Mname%') OR LOWER(`lastname`) LIKE LOWER('%$Lname%')";
                //$query = "SELECT `id`, `member_no`, `name` FROM userdetails WHERE LOWER(`firstname`) LIKE LOWER('%$Fname%') OR LOWER(`middlename`) LIKE LOWER('%$Mname%') OR LOWER(`lastname`) LIKE LOWER('%$Lname%')";
                $query = "SELECT `id`, `member_no`, `name`, `firstname`, `middlename`, `lastname`, phone, email, family_id FROM userdetails WHERE `member_no` = '$txtf_searchterm' OR LOWER(`name`) LIKE LOWER('$txtf_searchterm%') OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm%') OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm') OR LOWER(`middlename`) LIKE LOWER('$txtf_searchterm%') OR LOWER(`middlename`) LIKE LOWER('%$txtf_searchterm%') OR LOWER(`middlename`) LIKE LOWER('%$txtf_searchterm') OR LOWER(`lastname`) LIKE LOWER('$txtf_searchterm%') OR LOWER(`lastname`) LIKE LOWER('%$txtf_searchterm%') OR LOWER(`lastname`) LIKE LOWER('%$txtf_searchterm')";
                //$query = "SELECT `id`, `member_no`, `name` FROM userdetails WHERE `member_no` = '$txtf_searchterm' OR LOWER(`name`) LIKE LOWER('$txtf_searchterm%') OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm%') OR LOWER(`name`) LIKE LOWER('%$txtf_searchterm') OR LOWER(`middlename`) LIKE LOWER('$Mname%')";
                //echo "query: ".$query;
                //$query = "SELECT `id`, `member_no`, `name` FROM `userdetails` WHERE LOCATE('$txtf_searchterm', firstname) > 0 OR LOCATE('$txtf_searchterm', lastname) > 0";
                $table = mysqli_query($conn, $query); // WHERE `username` = '".$name."' AND `password` = '".$pwd."' AND `status` = 'active'
                while($row = mysqli_fetch_assoc($table))
                { 
                    /*$query2 = "SELECT `id`, `member_no`, `name` FROM userdetails WHERE `middlename` = 'omesa' ";
                    $table2 = mysqli_query($conn, $query2); 
                    while($row2 = mysqli_fetch_assoc($table2))
                    {}*/
                    
                    //foreach($row as $key => $value) 
                    //{ 
                    //    $arr[$key] = $value;
                    //}
                    //$main_arr[] = $arr;
                    
                    //if($Mname == $row['middlename'] OR $Mname == "xx"){}
                    
                    $main_arr[] = ['name' => $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' ('.$row['member_no'].')', 'id'  => $row['id'], 'firstname'  => $row['firstname'], 'lastname'  => $row['lastname'], 'phone'  => $row['phone'], 'email'  => $row['email'], 'family_id'  => $row['family_id'],];
                    
                }
                $json = json_encode($main_arr);
                
                
//                $keyword = strval($obj['parameter3']); //strval($_POST['query']);
//                $search_param = "{$keyword}%";
//                //$conn =new mysqli('localhost', 'root', '' , 'blog_samples');

//                $sql = $conn->prepare("SELECT * FROM userdetails WHERE firstname LIKE ?");
//                $sql->bind_param("s",$search_param);			
//                $sql->execute();
//                $result = $sql->get_result();
//                if ($result->num_rows > 0) 
//                {
//                        while($row = $result->fetch_assoc()) 
//                        {
//                            $countryResult[] = $row["firstname"];
//                        }
//                        //echo json_encode($countryResult);
//                        $json = json_encode($countryResult);
//                }
                
//                $user = "karengat_cims"; $pass = "#karengata#@cms#";
//                $pdo = new PDO('mysql:host=localhost;dbname=karengat_cims', $user, $pass);
//                $searchTerm = $obj['parameter2']; //$_GET['term'];
//
//                $stmt = $pdo->prepare("SELECT `id`, `member_no`, `firstname`, `lastname` FROM userdetails WHERE LOWER(`firstname`) LIKE LOWER(:search) OR LOWER(`lastname`) LIKE LOWER(:search) OR `member_no` LIKE :search");
//                $stmt->execute([':search' => $searchTerm.'%']);
//
//                $array = [];
//                while (false !== ($row = $stmt->fetch())) 
//                {
//                    $array[] = ['name' => $row['firstname'].' '.$row['lastname'].' ('.$row['member_no'].')', 'id'  => $row['id'], ];
//                }
//                $json = json_encode($array);
                
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
                //If no records "No Content" status - id number doesn't exist.
                header("HTTP/1.0 404 Not Found");
                header('Content-Type: application/json');
                echo 
                '
                        {
                            "code": "404",
                            "message": "Not FOund",
                            "data": null
                        }
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
                        "message": "Not Found 8",
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
    else if($endpoint == "signup")
    {
        //header("Location: ../pay"); //Location: ../pay.php?set=use
        header('Location: http://localhost/ChurchApp/signup/index.php');
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