<?php

set_time_limit (0);

    ini_set('memory_limit', '2560M');
    
    setlocale(LC_MONETARY,"en_KE"); //en_US //https://github.com/umpirsky/locale-list/blob/master/data/rw/locales.php
    
        error_reporting(0); //E_ALL | E_STRICT
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
        
        $parameter2 = mysqli_real_escape_string($conn, $obj['parameter2']);
        $parameter3 = mysqli_real_escape_string($conn, $obj['parameter3']);
        $parameter4 = mysqli_real_escape_string($conn, $obj['parameter4']);
        $parameter5 = mysqli_real_escape_string($conn, $obj['parameter5']);
        $parameter6 = mysqli_real_escape_string($conn, $obj['parameter6']);
        $parameter7 = mysqli_real_escape_string($conn, $obj['parameter7']);
        $parameter8 = mysqli_real_escape_string($conn, $obj['parameter8']);
        $parameter9 = mysqli_real_escape_string($conn, $obj['parameter9']);
        $parameter10 = mysqli_real_escape_string($conn, $obj['parameter10']);
        $parameter11 = mysqli_real_escape_string($conn, $obj['parameter11']);
        $parameter12 = mysqli_real_escape_string($conn, $obj['parameter12']);
        $parameter13 = mysqli_real_escape_string($conn, $obj['parameter13']);
        $parameter14 = mysqli_real_escape_string($conn, $obj['parameter14']);
        $parameter15 = mysqli_real_escape_string($conn, $obj['parameter15']);
        $parameter16 = mysqli_real_escape_string($conn, $obj['parameter16']);
        $parameter17 = mysqli_real_escape_string($conn, $obj['parameter17']);
        $parameter18 = mysqli_real_escape_string($conn, $obj['parameter18']);
        $parameter19 = mysqli_real_escape_string($conn, $obj['parameter19']);
        $parameter20 = mysqli_real_escape_string($conn, $obj['parameter20']);
        $parameter21 = mysqli_real_escape_string($conn, $obj['parameter21']);

        
if($request_method == "POST")
{
    if(json_last_error_msg() == "No error")
    {        
        if($endpoint == "authenticate" || $endpoint == "settings" || $endpoint == "programme" || $endpoint == "password" || $endpoint == "login" || $endpoint == "members" || $endpoint == "registration" || $endpoint == "otp" || $endpoint == "profile" || $endpoint == "departments" || $endpoint == "accounts" || $endpoint == "collections" || $endpoint == "verification" || $endpoint == "search" || $endpoint == "message" || $endpoint == "messages" || $endpoint == "statements" || $endpoint == "products" || $endpoint == "revenues" || $endpoint == "transaction" || $endpoint == "transactions" || $endpoint == "dashboard" || $endpoint == "verification_mpesa")
        {
            if($endpoint == "login")
            {
                $username = $parameter2;
                $password = $parameter3;

                if(!empty($username) and !empty($password))
                {
                        if(filter_var($username, FILTER_VALIDATE_EMAIL))
                        {
                                $query = "SELECT id, username, password FROM userdetails WHERE username = '$username' AND password = '$password' LIMIT 1";
                                $results = mysqli_query($conn, $query);
                                $numrows = mysqli_num_rows($results);       
                                
                                if($numrows > 0)
                                {
                                    //$data = 'Last login by '.$username.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                                    //$fp = fopen ('logs.txt' , 'a');
                                    //fwrite($fp, $data);
                                    
                                    
                                    $query = "SELECT * FROM `userdetails` WHERE `username` = '$username' AND `password` = '$password' AND `status` = 'active'";
                                    $table = mysqli_query($conn, $query);
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
                                    
                                    
                                    /*
                                    $query = "SELECT * FROM `userdetails` LIMIT 1, 10";
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
                                        
                                           '.$json.'
                                        
                                    ';
                                    */
                                    
                                    
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
            elseif($endpoint == "password")
            {
                $email = $parameter2;
                $phone = "+254".$str_phone = trim(substr($parameter3, -9));
                $password = $parameter4;
                $otpcode = $parameter5;
                
                //die("Here >> Email: ".$email." Phone: ".$phone." Password: ".$password." OTP Code: ".$otpcode);
                
                if(!empty($email) OR !empty($phone))
                {
                    $query = "SELECT * FROM `messages` WHERE `reference` = '$otpcode' AND `to` = '$phone' OR `reference` = '$otpcode' AND `to` = '$email' AND `lifespan` = 'mortal' ORDER BY `id` DESC LIMIT 1";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);
                    
                    if($numrows > 0)
                    {   
                        $nangoz = trim(substr($parameter3, -9));
                        
                        $queryu = "UPDATE `userdetails` SET  `password` = '$password' WHERE `email` = '$email' OR `phone` = '$nangoz'";
                        $update = mysqli_query($conn, $queryu);
                        
                        $querym = "UPDATE `messages` SET `lifespan` = 'dead' WHERE `reference` = '$otpcode' AND `to` = '$phone' OR `reference` = '$otpcode' AND `to` = '$email'";
                        $updatem = mysqli_query($conn, $querym);
                        
                        $query = "SELECT * FROM `userdetails` WHERE `email` = '$email' OR `phone` = '$nangoz' AND `status` = 'active'";
                        $table = mysqli_query($conn, $query);
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
                                header("HTTP/1.0 404 Not Found");
                                header('Content-Type: application/json');
                                echo 
                                '
                                        {
                                            "code": "401",
                                            "message": "Not Found",
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
            elseif($endpoint == "settings")
            {
                //$sql = "SELECT `id`, `name`, `appname`, `appversion`, `osname`, `osversion`, `useragent`, `platform`, `preferences`, `key`, `salt`, `token`, `updated_on`, `status` FROM `settings` WHERE `name` = '' AND `appname` = '' AND `appversion` = '' AND `osname` = '' AND `osversion` = '' AND `useragent` = '' AND `platform` = ''";
                $query = "SELECT * FROM `settings` WHERE `appname` = '$parameter2';";
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
            elseif($endpoint == "programme")
            {
                if($parameter3 != "")
                {
                    if(!parameter10 != "")
                    {
                        $query = "UPDATE `programmes` SET  `activity` = '$parameter4', `comments` = '$parameter5',  `start_time` = '$parameter6', `end_time` = '$parameter7', `date` = '$parameter8',  `presenters` = '$parameter9',  `location` = '$parameter10', `department` = '$parameter11', `updated_by` = '$parameter12' WHERE `programmes`.`id` = '$parameter3'"; // AND `message_id` = '".$messg_id."' AND `from_id` = '$udid' AND  `to_id` = '$recmemno'
                        $update = mysqli_query($conn, $query);

                        $query2 = "SELECT * FROM `programmes` WHERE `date` = '$parameter2';";
                        $table2 = mysqli_query($conn, $query2);
                        while($row = mysqli_fetch_assoc($table2))
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
                        /*
                        $query = "SELECT * FROM `programmes` WHERE `id` = '$parameter3';";
                        $results = mysqli_query($conn, $query);
                        $numrows = mysqli_num_rows($results);       

                        if($numrows > 0)
                        {
                        }
                        */
                        
                        /*
                            "parameter2", str_date_selected);
                            "parameter3", str_programme_selected_id);
                            "parameter4", txtf_task_title.getText().trim());
                            "parameter5", txta_task_description.getText().trim());
                            "parameter6", txtf_mshiriki.getText().trim());
                            "parameter7", txtf_media.getText().trim());
                            "parameter8", txtf_accompaniment.getText().trim());
                            "parameter9", str_selected_programme_entry_participants);
                         */

                            //$query = "SELECT * FROM `programmes` WHERE `id` = '$parameter3';";
                            //$rowProg = mysqli_fetch_array(mysqli_query($conn, $query));
                            //$fname = ucwords(mysqli_real_escape_string($conn, $rowProg['firstname']), "");
                            //$lname = ucwords(mysqli_real_escape_string($conn, $rowProg['lastname']), "");
                            //$nomre = $fname." ".$lname;
                            //$str_memno = $rowUser['member_no'];
                            
                            $query1 = "UPDATE `programmes` SET  `activity` = '$parameter4', `remarks` = '$parameter5', `presenters` = '$parameter9', `updated_by` = '$parameter10' WHERE `programmes`.`id` = '$parameter3'"; //TODO: add time from between starttime and endtime so that we know how much time each participant will take.
                            $update = mysqli_query($conn, $query1); //TODO: Put a check if it happens and give failure notice to user or if ok proceeed to load the updated programme.

                            $query2 = "SELECT id, activity, guidelines, remarks, start_time, end_time, date_scheduled, presenters, media, location, department,updated_by, updated_on, `status` FROM `programmes` WHERE `date_scheduled` = '$parameter2';";
                            $table2 = mysqli_query($conn, $query2);
                            while($row = mysqli_fetch_assoc($table2))
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
                    $query = "SELECT id, activity, guidelines, remarks, start_time, end_time, date_scheduled, presenters, media, location, department,updated_by, updated_on, `status` FROM `programmes` WHERE `date_scheduled` = '$parameter2' AND `status` = '1'";
                    $table = mysqli_query($conn, $query); 
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
                        
                    /*
                    $query = "SELECT * FROM `programmes` WHERE `date` = '$parameter2';";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);       

                    if($numrows > 0)
                    {
                        $query = "SELECT * FROM `programmes` WHERE `date` = '$parameter2';";
                        $table = mysqli_query($conn, $query);
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
                        header("HTTP/1.0 404 Not Found");
                        header('Content-Type: application/json');
                        echo 
                        '
                                {
                                    "code": "404",
                                    "message": "Not Found",
                                    "data": null
                                }
                        ';
                        exit();
                    }
                    */
                }
            }
            elseif($endpoint == "members")
            {
                $department = $parameter2;
                $board_member = $parameter3;
                $adventist = $parameter4;
                $status = $parameter5;
                $ssclass = $parameter6;
                $role = $parameter7;
                $level = $parameter8;
                $user_id = $parameter9;
                
                
                if($role == "Treasurer")
                {
                    //$query = 'SELECT * FROM `userdetails` WHERE comments_remarks != "Duplicate" ORDER BY `name` ASC';
                    
                    //$query = 'SELECT * FROM `userdetails` WHERE `comments_remarks` != "Duplicate"  AND `comments_remarks` != "Disfellowshiped" AND `comments_remarks` != "Out Transfer" AND `comments_remarks` != "Drop Out" AND `comments_remarks` != "Deceased" AND `comments_remarks` != "Visitor" ORDER BY `name` ASC';
                    
                    //$query = 'SELECT * FROM `userdetails` WHERE comments_remarks = "Missing" AND phone != "" OR comments_remarks = "Present" AND phone != ""';
                    
                    $query = 'SELECT * FROM `userdetails` WHERE comments_remarks = "Missing" OR comments_remarks = "Present"';
                    
                    //$query = 'SELECT * FROM `userdetails` ORDER BY `name` ASC';
                }
                else
                {
                
                
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
                else if($department == "kid")
                {
                    $query = "SELECT * FROM `userdetails` WHERE `department_prospects` = 'KID'";
                }
                else if($department == "awm")
                {
                    $query = "SELECT * FROM `userdetails` WHERE `departments` LIKE '%awm%'";
                }
                else
                {
                    //$query = 'SELECT * FROM `userdetails` WHERE `department` = "AMO" ORDER BY `firstname`'; // WHERE `phone` != "" AND `comments_remarks` = "Present"  // WHERE `board_member` = 'yes'  LIMIT 1, 94  //WHERE `phone` != "" AND `comments_remarks` = 'Present'
                    $query = 'SELECT * FROM `userdetails` WHERE comments_remarks = "Missing" AND phone != "" OR comments_remarks = "Present" AND phone != ""';
                    //$query = 'SELECT * FROM `userdetails` WHERE `church_officer` = "Yes" AND phone != ""';
                    //$query = 'SELECT * FROM `userdetails` ORDER BY `name` ASC';
                }
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
            elseif($endpoint == "registration") //register
            {
                    $query = "SELECT `id`, `email`, `phone` FROM `userdetails` WHERE `email` = '$parameter5' OR `phone` = '$parameter4' LIMIT 1";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);        

                    if($numrows > 0)
                    {
                        //$data = 'Last registration attempt '.$parameter2.' '.parameter3.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                        //$fp = fopen ('logs.txt' , 'a');
                        //fwrite($fp, $data);
                        
                        header("HTTP/1.0 409 Conflict");
                        header('Content-Type: application/json');
                        echo 
                        '
                            {
                               "code": "409",
                               "message": "OK",
                               "data": null
                            }
                        ';
                        exit();
                    }
                    else 
                    {
                        /*
                        "parameter2", txta_fname.
                        "parameter3", txta_lname.
                        "parameter4", txta_eml.ge
                        "parameter5", txta_phn.ge
                        "parameter6", txta_pwd.ge
                        */
                        
                        $fname = mysqli_real_escape_string($conn, $parameter2);
                        $lname = mysqli_real_escape_string($conn, $parameter3);
                        $str_phone = mysqli_real_escape_string($conn, $parameter4);
                        $email = mysqli_real_escape_string($conn, $parameter5);
                        $passw = mysqli_real_escape_string($conn, $parameter6);
                        $otpcd = mysqli_real_escape_string($conn, $parameter7);
                        
                        $name = $fname." ".$lname;
                        
                        
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

                        $str_memno = "S".$member_nu;
                        
                        
                        $orgid = "1";
                        $orgcd = "ksda";

                        
                        $sql = "INSERT INTO `userdetails` (`id`, `member_no`,  `organisation_id`, `organisation_code`, `name`, `firstname`, `lastname`, `gender`,   `email`, `usernaname`,   `password`,       `phone`,   `status`, `comments_remarks`, `added_on`) VALUES "
                                                       . "(NULL, '$str_memno',      '$orgid',            '$orgcd',     '$name',  '$fname',   '$lname',     '',     '$email',  '$email',    '$passw',     '$str_phone',    '1',        'Present',      '$leo_ni')";
                        mysqli_query($conn, $sql);
                        
                        $query2 = "SELECT * FROM `userdetails` WHERE `phone` = '$str_phone' OR `email` = '$email' AND `status` = '1'";
                        $table2 = mysqli_query($conn, $query2);
                        while($row = mysqli_fetch_assoc($table2))
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
            elseif($endpoint == "otp")
            {
                $email = $parameter2;
                $phone = $parameter3;

                if(!empty($email) and !empty($phone))
                {
                    $query = "SELECT * FROM userdetails WHERE `email` = '$email' OR `phone` = '$phone' LIMIT 1";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);   

                    if($numrows == 1)
                    {
                        $rowUser = mysqli_fetch_array(mysqli_query($conn, $query));  
                        $suid_id = $rowUser['id'];
                        $smember_no = $rowUser['member_no'];
                        $firstname = $rowUser['firstname'];
                        $lastname = $rowUser['lastname'];
                        $phoneno = $rowUser['phone'];
                        
                        $randnum = mt_rand(1000, 1999);
                        $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                        $otpcode = $randnum."".$randltr; //TODO: Add date into cypher  or change on device to be sending a random number with date as salt

                        $subject = "OTP Code";
                        $description = $parameter4."|".$parameter5;

                        //$msg = mysqli_real_escape_string($conn, $msg);
                        $fname = mysqli_real_escape_string($conn, $firstname);
                        $lname = mysqli_real_escape_string($conn, $lastname);
                        //$phone = mysqli_real_escape_string($conn, $parameter4);
                        //$email = mysqli_real_escape_string($conn, $parameter5);
                        //$passw = mysqli_real_escape_string($conn, $parameter6);

                        $leo_date = date("Y-m-d", time());
                        $leo_time = date("H:i:s", time());

                        $recnames = mysqli_real_escape_string($conn, $fname." ".$lname);

                        if(!empty($email))
                        {
                            ////////////////     Send EMAIL ////////////////
                            //
                            //
                                require('phpmailer/class.phpmailer.php');

                                $mail = new PHPMailer();
                                $mail->IsSMTP();
                                $mail->SMTPDebug = 0;
                                $mail->SMTPAuth = TRUE;
                                $mail->SMTPSecure = "ssl";
                                //$mail->Port     = 587;
                                $mail->Port     = 465;  
                                $mail->Username = "info@karengatasda.org";
                                $mail->Password = "Info#@123$";
                                $mail->Host     = "mail.karengatasda.org";
                                //$mail->Host     = "smtp.gmail.com";
                                $mail->Mailer   = "smtp";
                                $mail->SetFrom("info@karengatasda.org", "Karengata SDA Church");
                                $mail->AddReplyTo("info@karengatasda.org", "Karengata SDA Church");
                                $mail->AddAddress($email, $firstname." ".$lastname);
                                //$mail->AddBCC("erastus.mwencha@karengatasda.org", "Erastus Mwencha");
                                $mail->Subject = $subject;
                                $mail->WordWrap   = 80;
                                //$mail->MsgHTML($_POST["content"]);
                                $mail->Body =   "

                                <br>Dear ".$firstname.",<br>Your ".$subject." please use the OTP code shown below to reset your password.<br><br>
                                <br><b>OTP CODE:</b> " . $otpcode . "<br>
                                <br>If you need further assistance, please contact us on: +254 20 200 88 88
                                <br><br>Thank you,<br>Karengata SDA Church.";

                                $mail->IsHTML(true);

                                if(!$mail->send()) 
                                {
                                    $mailstatus = "Email Message Error: " . $mail->ErrorInfo;
                                    //return "Mailer Error: " . $mail->ErrorInfo;
                                } 
                                else 
                                {
                                    $mailstatus = "Email Message sent!";
                                    //return "Message sent!";
                                }
                                
                                $respcst = '0';
                                $respmsg = $mailstatus;
                                $msg = $mail->Body;
                                
                                $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`,   `to`, `from_name`,    `to_name`, `from_id`,    `to_id`,    `subject`,  `description`,    `message`,   `reference`,    `cost`,     `lifespan`,   `status`,     `added_on`,  `added_at`) "
                                                     . "VALUES (NULL,   '$respidn',         '0',       '$from', '$to', 'KSDA_Church', '$recnames', '$udid',   '$recmemno',  '$subject', '$description',     '$msg',     '$otpcode',  '$respcst',    'mortal',   '$respmsg',    '$leo_date', '$leo_time')";
                                mysqli_query($conn, $sql);
                            
                            //
                            //
                            ////////////////     Send EMAIL ////////////////
                        }
                        
                        if(!empty($phone))
                        {
                            ////////////////     Send SMS ////////////////
                            //
                            //

                            $msg = "Dear ".$firstname.",\nYour OTP code is ".$otpcode.".\nUse it to reset your password.\n\nThank you,\nKarengata SDA Church.";

                            require 'AfricasTalkingGateway.php';

                            $username   = "tommy";
                            $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                            $from = "KSDA_Church";

                            $gateway    = new AfricasTalkingGateway($username, $apiKey);
                            $to = trim("+254".substr($phoneno, -9)); //$str_phone   //trim according to country       

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
                                $respmsg = $e->getMessage(); if($respmsg == ""){$respmsg = "N/A";}
                                $respidn = "N/A";
                                $respnum = "NAN";
                                $respcst = "0.00";
                            }
                            
                            $description = "";
                            $subject = "";
                            
                            $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`,   `to`, `from_name`,    `to_name`, `from_id`,    `to_id`,    `subject`,  `description`,    `message`,   `reference`,    `cost`,    `lifespan`,      `status`,    `added_on`,    `added_at`) "
                                                 . "VALUES (NULL,   '$respidn',         '0',       '$from', '$to', 'KSDA_Church', '$recnames', '$udid',   '$recmemno',  '$subject', '$description',     '$msg',     '$otpcode',  '$respcst',    'mortal',     '$respmsg',   '$leo_date',  '$leo_time')";
                            mysqli_query($conn, $sql);

                            //
                            //
                            ////////////////     Send SMS ////////////////
                        }

                        
                        //If no records "No Content" status - transaction number doesn't exist.
                        //"data": [{"firstname": "'.$fname.'", "lastname": "'.$lname.'", "member_no": "'.$smember_no.'", "otpdata": "'.$resptxt."|".$respcde."|".$respmsg."|".$otpcode."|".$respidn."|".$respnum."|".$respcst.'"}]
                        header("HTTP/1.0 200 OK"); //404 Not Found
                        header('Content-Type: application/json');
                        echo 
                        '
                                {
                                    "code": "200",
                                    "message": "OK",
                                    "data": [{"otp": "'.$otpcode.'", "member_no": "'.$smember_no.'""}]
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
                                    "message": "Not Found 1",
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
                            {
                                "code": "400",
                                "message": "Bad Request",
                                "data": null
                            }
                    ';//Invalid Email address or Password
                    exit();                            
                }
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
                $username = $parameter2;
                $password = $parameter3;
                $userid   = $parameter4;
                $limit    = $parameter5;
                $offset   = $parameter6;
                $pinno    = $parameter7;
                $type     = $parameter8;
                
                
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
                $userid = $parameter4;
                $role =   $parameter5;
                $level =  $parameter6; 
                $limit =  $parameter7;
                $offset = $parameter8;
                
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
                $userid = $parameter4;
                $role =   $parameter5;
                $level =  $parameter6; 
                $limit =  $parameter7;
                $offset = $parameter8;
                $membno = $parameter9;
                
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
                $category_id =       $parameter2;
                $subcategory_id =    $parameter3;
                $organisation_id   = $parameter4;
                                
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
                
                /*
                      {
                        "idnumber": "23936158",
                        "Password": "pass123",
                        "UserName": "njuguna.johny@gmail.com",
                        "DeviceIMEI": "12345677",
                        "SIMCardSerial": "312345"
                      }
                 bluejeans, 
                 * teams
                 * hangouts
                 * skype
                 * gotomeeting
                 
                 
                 * 
                 zoho
                */
                
                //1. lighting
                //2. generator
                //3. fibre
                //4. server
                //5. 
                
                if($parameter12 == "Mpesa-USSD")
                {
                    $sql = "SELECT * FROM userdetails WHERE phone = '".$parameter7."'";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);       

                    if($numrows == 1)
                    {
                        $sql = "SELECT * FROM userdetails WHERE phone = '".$parameter7."'";
                        $rowMtu = mysqli_fetch_array(mysqli_query($conn, $sql));
                        
                        $udid = $rowMtu['id'];
                        $fname = $rowMtu['firstname'];
                        $lname = $rowMtu['lastname'];
                        $dept = $rowMtu['department'];
                        
                    }
                    else
                    {
                        $udid = "288822";
                                                
                        $jina = explode(' ', trim($parameter6));
                        $num_names = count($jina);
                        if($num_names == 1)
                        {
                            $fname = $jina[0];
                            $mname = "xx";
                            $lname = "xx";
                        }
                        if($num_names == 2)
                        {
                            $fname = $jina[0];
                            $mname = $jina[1];
                            $lname = "xx";
                        }
                        if($num_names == 3)
                        {
                            $fname = $jina[0];
                            $mname = $jina[1];
                            $lname = $jina[2];
                        }
                        
                        //TODO: Insert new user to DB here....    update member ID.
                        
                        $dept = "";
                    }
                    
                    $name = ucwords(mysqli_real_escape_string($conn, $fname." ".$lname), ""); 
                                        
                    $randnum = mt_rand(1000, 1999); //LPAD(FLOOR(RAND()*10000), 4, '0');
                    $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 
                    //$range = $range('A','Z');

                    
                    $numb = $parameter3;  //no_itemsel
                    $cart = $parameter4;
                    
                    $str_phone = $parameter7;
                    $str_email = $parameter8;
                    $str_memno = $parameter9;
                    $str_trxno = $randnum."".$randltr;
                    $total = $parameter11;
                    $paymethod = $parameter12;
                    $type = $parameter13;
                    
                    $refn = $parameter15;
                    $rcpt = "N/a";
                    $numb_rcpt = "0";  //No of extra selected recipients
                    $omwanchi_id = "0";
                    $rituko_devic = date("Y-m-d", time());
                    
                }
                else 
                {
                    $udid = $parameter2;  //agen'ts deviceid or userid
                    $numb = $parameter3;  //no_itemsel
                    $cart = $parameter4;  //itemsel    //TODO: load these details to log. Will be used later as a temporary log.
                    $fname = $parameter5; //deviceid
                    $mname = $parameter20; 
                    $oname = $parameter21; //deviceid
                    $lname = $parameter6;
                    $name = ucwords(mysqli_real_escape_string($conn, $fname." ".$mname." ".$oname." ".$lname), "");  //$name = $fname." ".$lname;
                    $str_phone = trim(substr($parameter7, -9));
                    $str_email = $parameter8;
                    $str_memno = $parameter9;   if($str_memno == "Visitor"){$str_memno = "";} if($str_memno == "Anonymous"){$str_memno = "";}
                    $str_trxno = $parameter10;
                    $total = $parameter11;
                    $paymethod = $parameter12;
                    $type = $parameter13;
                    $dept = $parameter14;
                    $refn = $parameter15;
                    $rcpt = $parameter16;
                    $numb_rcpt = $parameter17;  //No of extra selected recipients
                    $omwanchi_id = $parameter18;
                    $rituko_devic = $parameter19;  //TODO: enforce current date on device.
                }
                
                $leo_date = date("Y-m-d", time()); //2020-02-12
                $leo_time = date("H:i:s", time());
                
                
                //$items = explode("|", $cart); //28,Sugarcane,1,2, 2 ,Mpesa,Tirhaqa Mogaka,n/a|29,Eggs,30,1, 30 ,Mpesa,Tirhaqa Mogaka,n/a|

                //$items = explode("|", $cart); //God's Tithe,2000|Combi. Offering,2000|Thanks Giving,500|Camp Offering,400|
                $items = explode("|", $cart); //echo 'Cart: '.$cart."\n";
                //    God's Tithe*500 ^ (cash * 300 * 2020-01-24 * ) ^ (Mastercard * 200 * 2020-01-24 * ABC123) ^ (N/a * 0 * N/a * N/a)|
                //    Combi. Offering*500 ^ (N/a * 0 * N/a * N/a) ^ (N/a * 0 * N/a * N/a) ^ (N/a * 0 * N/a * N/a)|
                //    AYS*300 ^ (cash * 300 * 2020-01-24 * ) ^ (N/a * N/a * N/a * N/a) ^ (N/a * N/a * N/a * N/a)|
                
                if($str_memno == "" || $str_memno == "Visitor" || $str_memno == "Anonymous")
                {
                    
                    $query = "SELECT `id`, `username`, `password` FROM `userdetails` WHERE `phone` = '$str_phone' LIMIT 1";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);       

                    if($numrows > 0)
                    {
                        
                        $query1 = "SELECT * FROM `userdetails` WHERE `phone` = '$str_phone'";
                        $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query1));
                        $fname = ucwords(mysqli_real_escape_string($conn, $rowUsr['firstname']), "");
                        $lname = ucwords(mysqli_real_escape_string($conn, $rowUsr['lastname']), "");
                        $nomre = $fname." ".$lname;
                        $str_memno = $rowUsr['member_no'];
                        
                        //die("Here: ".$str_memno);
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

                        $str_memno = "S".$member_nu;
                        
                        
                        $orgid = "1";
                        $orgcd = "ksda";

                        $sql = "INSERT INTO `userdetails` (`id`, `member_no`,  `organisation_id`, `organisation_code`, `name`, `firstname`, `lastname`, `gender`,   `phone`, `status`, `comments_remarks`, `added_on`) VALUES "
                                                       . "(NULL, '$str_memno',      '$orgid',            '$orgcd',     '$name',  '$fname',   '$lname',  '',        '$str_phone',    '1',        'Present',      '$leo_ni')";
                        mysqli_query($conn, $sql);
                    }
                }
                else
                {
                    //$query = "SELECT `id`, `username`, `password` FROM `userdetails` WHERE `phone` = '$str_phone' LIMIT 1";
                    //$rowUser = mysqli_fetch_array(mysqli_query($conn, $query)); 
                    //$str_memno = $rowUser['member_no'];
                }
                
                //`reference_no` != "" AND `payref1` != "" AND `payref2` != "" AND `payref3` != ""
                
                
                if($refn == "" || $refn == "N/a")
                {
                    $randnum = mt_rand(1000, 1999);
                    $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 
                    
                    $refn = $randnum.">".$randltr.">".$str_trxno; //TODO: Add date into cypher  or change on device to be sending a random number with date as salt
                    $mbut = $refn;
                }
                
                $query1 = "SELECT * FROM `transactions` WHERE `reference_no` = '$refn' OR `payref1` = '$refn' OR `payref2` = '$refn' OR `payref3` = '$refn' LIMIT 1"; // AND `user_id` = '$memno' LIMIT 1";
                $results1 = mysqli_query($conn, $query1); //echo "Query 1: ".$query1."<br>";
                $numrows = mysqli_num_rows($results1); 
                if($numrows > 0)
                {
                    $query2 = "SELECT * FROM `transactions` WHERE `reference_no` = '$refn'"; // AND `user_id` = '$memno'
                    $rowTrxn = mysqli_fetch_array(mysqli_query($conn, $query2));
                    $user_nm = $rowTrxn['user_nm'];
                    $added_on = $rowTrxn['added_on'];
                    $transacted_on = $rowTrxn['due_on'];

                    $query3 = "SELECT * FROM `userdetails` WHERE `id` = '$udid'";
                    $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query3));
                    $sfname = ucwords(mysqli_real_escape_string($conn, $rowUsr['firstname']), "");
                    $slname = ucwords(mysqli_real_escape_string($conn, $rowUsr['lastname']), "");
                    $snomre = $sfname." ".$slname;

                    //echo "Query 1: ".$query1."<br>";
                    //echo "Numrows: ".$numrows."<br>";
                    
                    
                    
                    //Trxn already exists
                    /*
                    $_SESSION['type'] = "error";
                    $_SESSION['action'] = "add";
                    $_SESSION['title'] = "Oops!";
                    $_SESSION['subject'] = $firstname;
                    $_SESSION['message'] = "Add Failed... A transaction with the reference no. ".$referenceno." already exists for ".$user_nm." transacted on ".$transacted_on." and added on ".$added_on." by ".$snomre;
                    */
                    
                    //echo '\n<br>No of extra pay options'.$numb.'<br>\n';  die();
                    
                    if($numb > 0)
                    {
                        $count = 0;
                        for($j=0; $j<$numb; $j++)
                        {
                            $item = explode("^", $items[$j]);
                      
                            $item_op1  = explode("*", trim($item[1]));
                            $item_op1r = trim(str_replace(")", "", $item_op1[3]));  //ABC123

                            $item_op2  = explode("*", trim($item[2]));
                            $item_op2r = trim(str_replace(")", "", $item_op2[3]));

                            $item_op3  = explode("*", trim($item[3]));
                            $item_op3r = trim(str_replace(")", "", $item_op3[3]));
                            
                            if($item_op1r == "" || $item_op1r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                                $item_op1r = $mbut; //TODO: Add date into cypher
                                
                                if($item_op1r == "")
                                {
                                    $item_op1r = "N/a";
                                }
                            }
                            
                            if($item_op2r == "" || $item_op2r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 
                                
                                $item_op2r = $mbut; //TODO: Add date into cypher
                                
                                if($item_op2r == "")
                                {
                                    $item_op2r = "N/a";
                                }
                            }
                            
                            if($item_op3r == "" || $item_op3r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                                $item_op3r = $mbut; //TODO: Add date into cypher
                                
                                if($item_op3r == "")
                                {
                                    $item_op3r = "N/a";
                                }
                            }
                            
                            $query1 = "SELECT * FROM `transactions` WHERE `reference_no` = '$item_op1r' OR  `reference_no` = '$item_op2r' OR  `reference_no` = '$item_op3r' OR `payref1` = '$item_op1r' OR `payref1` = '$item_op2r' OR `payref1` = '$item_op3r' OR `payref2` = '$item_op1r' OR `payref2` = '$item_op2r' OR `payref2` = '$item_op3r' OR `payref3` = '$item_op1r' OR `payref3` = '$item_op2r'  OR `payref3` = '$item_op3r'"; // AND `user_id` = '$memno' LIMIT 1";
                            $results1 = mysqli_query($conn, $query1); //echo "Query 1: ".$query1."<br>"; die();
                            $numrows = mysqli_num_rows($results1); 
                            
                            if($numrows > 0)
                            {
                                $hesa = 1;
                                $count += $hesa;
                                
                                $numero = $numb-1;
                                //echo '\n<br> J='.$j."/".$numero;
                                //echo '\n<br> Count: '.$count;
                                
                                if($j == $numero)
                                {
                                    
                                        $respcde = "409";
                                        $resptxt = "Conflict";
                                        $respmsg = "Add Failed for ".$user_nm."(Mem No: ".$str_memno.")... \n\nA transaction with the reference no. (".$refn.") already exists for ".$user_nm." transacted on ".$transacted_on." and added on ".$added_on." by ".$snomre.".";

                                        header("HTTP/1.0 ".$respcde." ".$resptxt); //." ".$respmsg
                                        header('Content-Type: application/json');

                                        //echo '\n';
                                        echo 
                                        '{
                                            "code": "'.$respcde.'",
                                            "message": "'.$respmsg.'",
                                            "data": "'.$str_memno.'"
                                        }';//"data": "'.$str_memno.'"

                                        exit();
                                }
                            }
                            else
                            {
                                
                            }
                        }
                    }
                }
                
                
                
                $query2 = "SELECT * FROM `userdetails` WHERE `member_no` = '$str_memno'";
                $rowUsr = mysqli_fetch_array(mysqli_query($conn, $query2));
                
                $str_memno = $rowUsr['member_no'];
                $name = ucwords(mysqli_real_escape_string($conn, $rowUsr['name']), "");
                $fname = ucwords(mysqli_real_escape_string($conn, $rowUsr['firstname']), "");
                $mname = ucwords(mysqli_real_escape_string($conn, $rowUsr['middlename']), "");
                $oname = ucwords(mysqli_real_escape_string($conn, $rowUsr['other_name']), "");
                $lname = ucwords(mysqli_real_escape_string($conn, $rowUsr['lastname']), "");
                $str_phone = trim(substr($parameter7, -9)); //TODO: Check if the first number is 7, if not 7 take whole number as is.
                $str_email = $rowUsr['email'];
                
                if($fname != ucwords($parameter5))
                {
                    $fname = ucwords($parameter5);
                    
                    $query = "UPDATE `userdetails` SET `firstname` = '$fname' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query); //$here = "A";
                }
                else
                {
                    $fname = ucwords(mysqli_real_escape_string($conn, $rowUsr['firstname']), ""); //$here = "A";
                }
                
                //die($here." <<>>: ".$query);
                                    //Ogwoka
                if($mname != ucwords($parameter20))
                {
                    $mname = ucwords($parameter20);
                    
                    $query = "UPDATE `userdetails` SET `middlename` = '$mname' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query); //$here = "A";
                }
                else 
                {
                    $mname = ucwords(mysqli_real_escape_string($conn, $rowUsr['middlename']), ""); //$here = "B";
                } //die($here." >> ".$query." >>".$parameter20);
                
                if($oname != ucwords($parameter21))
                {
                    $oname = ucwords($parameter21);
                    
                    $query = "UPDATE `userdetails` SET `other_name` = '$oname' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query);
                }
                else 
                {
                    $oname = ucwords(mysqli_real_escape_string($conn, $rowUsr['other_name']), "");
                }
                
                if($lname != ucwords($parameter6))
                {
                    $lname = ucwords($parameter6);
                    
                    $query = "UPDATE `userdetails` SET `lastname` = '$lname' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query);
                }
                else 
                {
                    $lname = ucwords(mysqli_real_escape_string($conn, $rowUsr['lastname']), "");
                }
                
                $name = $fname." ".$mname." ".$oname." ".$lname; //TODO: Remove wite spaces
                $query = "UPDATE `userdetails` SET `name` = '$name' WHERE `member_no` = '$str_memno'";
                $update = mysqli_query($conn, $query);
                
                
                if($str_email != ucwords($parameter8))
                {
                    $str_email = ucwords($parameter8);
                    
                    $query = "UPDATE `userdetails` SET `email` = '$str_email' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query);
                }
                else 
                {
                    $str_email = $rowUsr['email'];
                }
                
                if($str_phone != ucwords($parameter7))
                {
                    $str_phone = ucwords($parameter7);
                    
                    $query = "UPDATE `userdetails` SET `phone` = '$str_phone' WHERE `member_no` = '$str_memno'";
                    $update = mysqli_query($conn, $query);
                }
                else 
                {
                    $str_phone = ucwords(mysqli_real_escape_string($conn, $rowUsr['phone']), "");
                }
                
                
                $trxid = $str_trxno;//mt_rand(100000, 199999);
                //TODO: Check if code already exists and if it does, do a loop to create a new one and insert into db if non-existent else repeat.
            
                $queryin = "INSERT INTO `codes` (`id`, `code`, `user_id`, `phone`, `email`, added_on, due_on) VALUES (NULL, '$str_trxno', '$str_memno', '$str_phone', '$str_email', CURRENT_TIMESTAMP,  '$rituko_devic')";
                mysqli_query($conn, $queryin); 
                
                $simserial = $obj['SIMCardSerial'];
                
                  
                   
                    require 'AfricasTalkingGateway.php';

                    $username   = "tommy";
                    $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                    $from = "KSDA_Church";
                    
                    
                    $rcpt = $str_memno.",".$name.",".$dept.",".$str_phone.",".$str_email.","."".",".$omwanchi_id.",main|".$rcpt;
                    for($i=0; $i<$numb_rcpt+1; $i++)
                    {
                        $recipient = explode("|", $rcpt);

                        $rcpt_data = explode(",", $recipient[$i]);
                        $recmemno = $rcpt_data[0];
                        $recnames = $rcpt_data[1];
                        $recdeptm = $rcpt_data[2];
                        $recphone = $rcpt_data[3];
                        $recemail = $rcpt_data[4];
                        $familyid = $rcpt_data[5];
                        $spouceid = $rcpt_data[6];
                        $trxtype = $rcpt_data[7]; if($trxtype == ""){$trxtype = "duplicate";}

                        $majina = explode(" ", $recnames);
                        $jina1 = $majina[0];
                        $jina2 = $majina[1];
                        $jina3 = $majina[2];
                        $jina1 = ucwords(mysqli_real_escape_string($conn, $jina1), "");
                        $jina2 = ucwords(mysqli_real_escape_string($conn, $jina2), "");
                        $jina3 = ucwords(mysqli_real_escape_string($conn, $jina3), "");

                        $nomre = $jina1." ".$jina2." ".$jina3;
                        
                        for($j=0; $j<$numb; $j++)
                        {
                            $item = explode("^", $items[$j]);
                       
                            $item_op = explode("*", trim($item[0]));
                            $item_nm = $item_op[0];
                            $item_co = $item_op[1];
                            $item_ds = $item_op[2];

                            //str_itemopm1, str_itemop1, str_itemop1v, str_itemop1d, str_itemop1r
                            $item_op1  = explode("*", trim($item[1]));
                            $item_op1m = trim(str_replace("(", "", $item_op1[0]));  //cash
                            $item_op1v = trim($item_op1[1]);  //300
                            $item_op1d = trim($item_op1[2]);  //2020-01-24
                            $item_op1r = trim(str_replace(")", "", $item_op1[3]));  //ABC123

                            $item_op2  = explode("*", trim($item[2]));
                            $item_op2m = trim(str_replace("(", "", $item_op2[0]));
                            $item_op2v = trim($item_op2[1]);
                            $item_op2d = trim($item_op2[2]);
                            $item_op2r = trim(str_replace(")", "", $item_op2[3]));

                            $item_op3  = explode("*", trim($item[3]));
                            $item_op3m = trim(str_replace("(", "", $item_op3[0]));
                            $item_op3v = trim($item_op3[1]);
                            $item_op3d = trim($item_op3[2]);
                            $item_op3r = trim(str_replace(")", "", $item_op3[3]));

                            if($i == 0)
                            {
                                $bag.= $item_nm." : Ksh.".number_format($item_co)."\n";
                                //$bag.= $item_nm." : ".money_format("%i", $item_co)."\n";
                            }
                            
                            if($recmemno == "")
                            {
                                $recmemno = $str_memno;
                            }
                            
                            if($item_op1r == "" || $item_op1r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                                $item_op1r = $mbut; //TODO: Add date into cypher
                            }
                            
                            if($item_op2r == "" || $item_op2r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 
                                
                                $item_op2r = $mbut; //TODO: Add date into cypher
                            }
                            
                            if($item_op3r == "" || $item_op3r == "N/a")
                            {
                                $randnum = mt_rand(1000, 1999);
                                $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                                $item_op3r = $mbut; //TODO: Add date into cypher
                            }
                            
                            //Insert into Db
                            $item_jina = mysqli_real_escape_string($conn, $item_nm); //utf8_encode($item_nm); //urlencode($item_nm);
                            $name = mysqli_real_escape_string($conn, $name);
                            $queryin = "INSERT INTO `transactions` (`id`, `user_id`,    `user_nm`, `device_id`,   `department`,     `code`,  `reference_no`,       `type`,      `method`,   `currency`,     `description`,       `quantity`,     `cost`,      `vat`,   `total_cost`,  `discount`,  `grand_total`,     `amount`,   `payopt1`,    `payamt1`,     `paydtm1`,    `payref1`,    `payopt2`,   `payamt2`,     `paydtm2`,   `payref2`,     `payopt3`,    `payamt3`,    `paydtm3`,   `payref3`,   `due`, `refund`, `account_no`,  `type_id`, `category_id`, `sub_category_id`, `product_id`, `item_id`,    `item_name`,  `agent_id`,  `added_by`,       `added_on`,         `due_on`,       `updatedon`,  `updatedby`,  `approvedby`,   `approvedon`,  `action_on`,  `action_by`,  `status`) "
                                    . "                     VALUES (NULL, '$recmemno',   '$nomre',   '$udid',      '$recdeptm',    '$trxid',   '$refn',          '$trxtype',   '$item_pm',      NULL,        '$item_ds',          '$item_qt',   '$item_pr',    NULL,      NULL,           NULL,        NULL,         '$item_co', '$item_op1m', '$item_op1v', '$item_op1d', '$item_op1r', '$item_op2m', '$item_op2v', '$item_op2d', '$item_op2r', '$item_op3m', '$item_op3v', '$item_op3d', '$item_op3r',  NULL,    NULL,     NULL,          NULL,      NULL,          NULL,              NULL,        '$item_id', '$item_jina',   NULL,        NULL,         CURRENT_TIMESTAMP,  '$rituko_devic',      NULL,        NULL,         NULL,           NULL,          NULL,         NULL,         'Synced');";
                            mysqli_query($conn, $queryin);
                            
                            //echo 'QueryIn Trx: '.$queryin;
                        }
                        
                        //>>>
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
                            $familyid = $rcpt_data[5];
                            $spouceid = $rcpt_data[6];
                            $trxtype = $rcpt_data[7];

                            $majina = explode(" ", $recnames);
                            $jina1 = $majina[0];
                            $jina2 = $majina[1];
                            $jina3 = $majina[2];
                            $jina1 = ucwords(mysqli_real_escape_string($conn, $jina1), "");
                            $jina2 = ucwords(mysqli_real_escape_string($conn, $jina2), "");
                            $jina3 = ucwords(mysqli_real_escape_string($conn, $jina3), "");

                            $nomre = $jina1." ".$jina2." ".$jina3;

                                    //$to = $str_phone; //"Dear ".$fname.", your giving on ".$day1." was Ksh. ".$bag.":
                            //$msg = "Dear ".$jina1.",\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".$bag."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                            //$msg = "Dear ".$jina1.",\nYour giving this past Sabbath was Ksh.".number_format($total)." and has been received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n";
                            //$msg = "Dear ".$fname.",\nPlease igonore the previous message as it had an error. Your correct giving is Ksh ".$total." as follows:\n\n".$bag."\nWe apologise for the error & the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88";
                            //$msg = "Dear ".$fname.",\nYour giving for the Sabbath of 7/12/19 was Ksh ".$total." received as follows:\n\n".$bag."\nWe apologise for the delayed receipt.\nBe Blessed,\nKarengata Treasury.\nFor Queries: 020 200 88 88\n"; //Kindly note that your member number is 962 and not 972.

                            
                            
                            if($leo_date == $rituko_devic)
                            {
                                if($jina1 == "")
                                {
                                    
                                    $msg = "\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".str_replace("\\", "", $bag)."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                                    
                                    //$msg = "Dear ".$jina1.",\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".str_replace("\\", "", $bag)."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                                }
                                else
                                {
                                    $msg = "Dear ".$jina1.",\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".str_replace("\\", "", $bag)."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                                }
                            }
                            else
                            {
                                if($jina1 == "")
                                {
                                    
                                    $msg = "\nYour giving on ".$rituko_devic." was Ksh. ".number_format($total)." and was received as follows:\n\n".str_replace("\\", "", $bag)."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n"; //Kindly note that your member number is 962 and not 972.
                                    //$msg = "Dear ".$jina1.",\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".str_replace("\\", "", $bag)."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                                }
                                else
                                {
                                    
                                    $msg = "Dear ".$jina1.",\nYour giving on ".$rituko_devic." was Ksh. ".number_format($total)." and was received as follows:\n\n".str_replace("\\", "", $bag)."\nWe apologise for the delayed receipt.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n"; //Kindly note that your member number is 962 and not 972.
                                    
                                    //$msg = "Dear ".$jina1.",\nYour giving of Ksh.".number_format($total)." has been received as follows:\n\n".str_replace("\\", "", $bag)."\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88\nTrx No.: ".$str_trxno."\n";
                                }
                            }
                            
                            
                            
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
                            
                            if($respmsg == "")
                            {
                                $respmsg = "SMS Server Off!";
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
                            $recnames = mysqli_real_escape_string($conn, $recnames);
                            $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`, `to`, `from_name`, `to_name`, `from_id`, `to_id`, `message`, `reference`, `cost`, `status`, `added_on`, `added_at`) VALUES (NULL, '$respidn', '0', '$from', '$to', 'KSDA_Church', '$recnames', '$udid', '$recmemno', '$msg', '$str_trxno', '$respcst', '$respmsg', '$leo_date', '$leo_time')";
                            mysqli_query($conn, $sql);
                            
                            //echo "\n\nHere 1.: ".$sql."\n\n";

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
                            }
                            else
                            {

                            }
                    }
                    
                    header("HTTP/1.0 ".$respcde." ".$resptxt);
                    header('Content-Type: application/json');
                    //echo '\n';
                    echo 
                    '{
                        "code": "'.$respcde.'",
                        "message": "'.$respmsg.'",
                        "data": "['.$last_id.']"
                    }';    


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
                $id = $parameter2;  //id
                $to = $parameter3;  //to
                $msg = str_replace("\\", "", $parameter4); //msg
                $aid = $parameter5; //aid                    
                $type = $parameter6;  //type
                $filter = $parameter7;  //filter
                
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
                $usid = $obj['parameter2'];     //aid
                $data = $obj['parameter3'];     //data   //158,720689160|225,720689160|73,720689160|903,720689160|25,720689160|434,720689160|535,720689160|452,720689160|344,720689160|
                $type = $obj['parameter4'];     //type   //all, some, 
                $filter = $obj['parameter5'];   //filter criteria, //month  //day
                $count = $obj['parameter6'];
                $ujumbe = $obj['parameter7'];
                $list = $obj['parameter8'];     //list criteria //amo, awm, cims, //January  //2020-02
                $box = $obj['parameter9'];      //in, out, sent, draft, deleted, replied to
                $action = $obj['parameter10'];  //delete, view, send, search
                $role = $obj['parameter11'];
                $level = $obj['parameter12']; 
                $limit =  $obj['parameter13'];
                $offset =  $obj['parameter14'];
                
                if($box == "out")
                {
                    if($role == "Treasurer")
                    {
                        if($limit > 0)
                        {
                            if($offset > 0)
                            {
                                $querydb = "SELECT id, `conversation_id`, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` ORDER BY id DESC LIMIT $limit OFFSET $offset;";
                            }
                            else
                            {
                                $querydb = "SELECT id, `conversation_id`, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` ORDER BY id DESC LIMIT $limit;";
                            }
                        }
                        else
                        {
                            if($offset > 0)
                            {
                                $querydb = "SELECT id, `conversation_id`, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` ORDER BY id DESC LIMIT 2 OFFSET $offset;";
                            }
                            else
                            {
                                $querydb = "SELECT id, `conversation_id`, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` WHERE `from_id` = '$usid' ORDER BY id DESC LIMIT 50;";
                                $query = "SELECT COUNT(*) as `num` FROM `messages` WHERE `from_id` = '$usid';";
                                $row = mysqli_fetch_array(mysqli_query($conn, $query));
                                $total = $row['num'];
                            }
                        }
                    }
                    else
                    {
                        //$querydb = "SELECT * FROM `statements` WHERE `member_no` = '$membno' ORDER BY `id` ASC"; //TODO: put filter, $criteria1 & $criteria2
                        $querydb =  "SELECT id, `conversation_id`, `from`, `to`, to_name, from_id, message, reference, cost, `status`, reg_timestamp FROM `messages` WHERE `from_id` = '$usid' ORDER BY `id` DESC";
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
                               "count": '.$total.',
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
                else if($box == "in")
                {
                    
                }
                else
                {
                    //TODO: Insert message into the database.
                
                    //Set random number
                    //UPDATE userdetails SET trx_number = LPAD(FLOOR(RAND()*10000), 4, '0'); 
                    //UPDATE userdetails SET trx_number = (select floor(0+ RAND() * 10000) WHERE );

                    //Send out random numbers to users

                    require 'AfricasTalkingGateway.php';

                    $username   = "tommy";
                    $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                    $from       = "KSDA_Church";

                    $gateway    = new AfricasTalkingGateway($username, $apiKey);

                    if($type == "multiple" || $type == "all")
                    {
                        if($filter == "day")
                        {

                        }
                        else if($filter == "month")
                        {
                            if($list == "January")
                            {
                             $month = "Jan"; 
                            }
                            else if($list == "February")
                            {
                             $month = "Feb"; 
                            }
                            else if($list == "March")
                            {
                             $month = "Mar"; 
                            }
                            else if($list == "April")
                            {
                             $month = "Apr"; 
                            }
                            else if($list == "May")
                            {
                             $month = "May"; 
                            }
                            else if($list == "June")
                            {
                             $month = "June"; 
                            }
                            else if($list == "July")
                            {
                             $month = "July"; 
                            }
                            else if($list == "August")
                            {
                             $month = "Aug"; 
                            }
                            else if($list == "Spetember")
                            {
                             $month = "Sep"; 
                            }
                            else if($list == "October")
                            {
                             $month = "Oct"; 
                            }
                            else if($list == "November")
                            {
                             $month = "Nov"; 
                            }
                            else if($list == "December")
                            {
                             $month = "Dec"; 
                            }

                            $queryJan = mysqli_query($conn, "SELECT * FROM `statements` WHERE `member_no` = '$memno' AND `$criteria1` = '$criteria2'"); //  AND `member_no` != '0'
                            $rowsJan = mysqli_num_rows($queryJan);
                            $resultS1 = mysqli_fetch_array($queryJan);
                            $totalsJan = $rowsJan;

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
                                    $query = "SELECT * FROM `userdetails` WHERE `member_no` = '$membr_num'";

                                    $rowUser = mysqli_fetch_array(mysqli_query($conn, $query));
                                    $fname = mysqli_real_escape_string($conn, $rowUser['firstname']);
                                    $trxno = $rowUser['trx_number']; 
                                    $memnu = $rowUser['member_no']; 

                                    //Fetch member's statements
                                    $queryStatements = "SELECT * FROM `transactions` WHERE `user_id` = '$usid' AND added_on LIKE '%$list%'"; //SELECT id, user_id, device_id, department, code, type, item_name, amount FROM `transactions` WHERE `user_id` = '158' AND added_on LIKE '%2020-02%'
                                    //

                                    //echo "SELECT * FROM `statements` WHERE `member_no` = '$memno' AND `$criteria1` = '$criteria2'\n";
                                    //echo "SQL ".$queryStatements."\n";

                                    //SELECT SUM(amount) AS giving FROM `transactions` WHERE `item_name` = "God's Tithe";

                                    $vuta = mysqli_query($conn, $queryStatements) or die(mysqli_error());
                                    $i = 1;
                                    while ($rovi = mysqli_fetch_array($vuta))
                                    {
                                        echo $i." - No of statement entries per user(member).\n".$queryStatements;
                                        echo "\n";

                                        if($totalsJan == 5) //   // && $i == $totalsJan
                                        {
                                            $ujumbe = "Dear ".$fname.", your ".$month." 2020 giving is Ksh. ".$bag.".\n\n".$maday[1]." Ksh".$pouch[1]."\n".$maday[2]." Ksh".$pouch[2]."\n".$maday[3]." Ksh".$pouch[3]."\n".$maday[4]." Ksh".$pouch[4]."\n".$maday[5]." Ksh".$pouch[5]."\n\nThank you for giving to the Lord!\n\nBe blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88";
                                            echo "\nMessage: ".$ujumbe."\n\n";//$bag
                                            echo "Total Given: Ksh ".$bag."\n";

                                            $i = $i+1;
                                        }
                                        else
                                        {

                                        }
                                    }

                                    try
                                    {
                                        $results = $gateway->sendMessage($to, $ujumbe, $from); //$to, "Dear ".$fname.", ".$ujumbe, $from  //$to, $ujumbe, $from

                                        foreach( $results as $result ) 
                                        {
                                            $resptxt = "OK";
                                            $respcde = "200";
                                            $respmsg = $result->status;
                                            $respnum = $result->number;
                                            $respcst = $result->cost;

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
                        else if($filter == "quarter")
                        {

                        }
                        else if($filter == "year")
                        {

                        }
                        else
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
                                    $status = $rowUser['comments_remarks'];
                                    $nangoz = $rowUser['phone'];

                                    //$ujumbe = "Please remember to write ".$memnu." on your envelope tomorrow as you give.\n\nHave a blessed Sabbath,\nKarengata Treasury.";
                                    //$ujumbe = "Happy Sabbath, please write ".$memnu." on your envelope as you give to the Lord tomorrow. We will use this number for receipting and tracking purposes.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88";
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
                                    //$ujumbe = "your presence is highly required this Sunday from 8am to 3pm at church for the worker's training. Please plan to attend!\n\nPersonal Ministries";
                                    //$ujumbe = "The Lord is inviting us today to wholly submit to Him, and to bring our tithes and offerings to where He has told us to take them. And then He invites us to TRY HIM.\n\nMay we accept His invitation and follow His guidance today!\n\nHave a blessed Sabbath.\n\nSMS/Call: 020 200 88 88\nYour Member No.:".$memnu."\n";

                                    //$ujumbe = "Dear ".$fname.",\nPlease ignore the previous message as it was sent to you in error. We thank you for notifying us as soon as you noticed it.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88";

                                    //If you are in Nairobi or can be able to make it to he Karengata area then you are welcome to join the rest of the ladies in our first prayer breakfast of 2020 where we will be seeking the

                                    //$ujumbe = "Dear ".$fname.",\nPlease ignore the previous message as it was sent to you in error. We thank you for notifying us as soon as you noticed it.\n\nBe Blessed,\nKarengata Treasury.\n\nFor Queries: 020 200 88 88";

                                    //We care for you! Please use our help line below if you or someone you know needs help during this Covid-19 period.

                                    if($nangoz != "")
                                    {
                                        if($status == "Present")
                                        {

                                        }
                                        else
                                        {

                                        }
                                        //$ujumbe = "We are now live at\n\nhttps://www.youtube.com/watch?v=naE0_OINiw8\n\nGive using Mpesa PayBill 288822.\n\nSMS/Call: 020 200 88 88\n";
                                        //$ujumbe = "We apologise for the interruption, ee are now back online! Join us using the link below:\n\nhttps://www.youtube.com/watch?v=ULlJ03dncWo\n\nBlessed Sabbath,\nKarengata Comms. Dept.\n\nSMS/Call: 020 200 88 88\n";

                                        //$ujumbe = "Tune in to our mid-week prayer meeting at 5:30PM today.\n\nlive.karengatasda.org\n\nStay Safe,\nKarengata Personal Ministries.\n\nCall/SMS: 020 200 88 88\n";
                                        //https://www.youtube.com/c/KarengataSeventhdayAdventistChurchMedia

                                        //$ujumbe = "\n\nDisaster Fundraising\n\nThe AMO Leadership, in conjunction with the Elders Council, invites you to an online funds drive this Thursday 21st May 2020 from 7pm. The funds will assist  offer support to those adversely affected by the Covid-19 pandemic. We target to raise 1.2m.\n\nUse account no - 288822\nAccount Name - Disaster Fund\n\nAMO council";

                                        /*$ujumbe = "We thank God for keeping you and allowing you to be a blessing to us.

We are pleased to Invite you to the Karengata Youth Choir this Sabbath for their Album Launch 'Sauti Yako' as from 2:00pm - 4:00pm.

It will be a virtual launch aired via our YouTube channel.

Come let's experience God's everlasting love

Karengata AYS Choir\n\n";*/
                                        
                                        /*$ujumbe = "The Karengata Youth Choir wishes to extend heartfelt thanks for your support during our Album Launch.

Good news, the music is now available in DVDs, CDs, and downloadable links.

To order, visit music.karengatasda.org
or visit the church's admin office. Alternatively, you may contact: Rebecca Mwango 0745 661 576.

If you would wish to support this ministry you can do so using the church paybill: 288822 Acc No: KYC

Thanks and be blessed.

Regards,
Karengata Youth Choir.\n\n";*/
                                        
                                        
                                        
                                        /*$ujumbe = "AMO Council requests to support bridge the gap in camp meeting budget. This will be through prayer and fasting on Tuesday 10th followed by a fundraiser in the evening. 

Will appreciate your support and attendance. Check for details in our WhatsApp Group.\n\nGod bless you,\nAMO Council.\n";*/
                                        
                                        
/*$ujumbe = "Happy Sabbath Gentlemen,

On behalf of AMO Council,  we pray you have all had a good week and looking forward to today's worship.

This is a polite reminder that we should continue giving towards church building. 

We want to thank those who have fully and partially redeemed their pledges. For those who are yet to, kindly do so.

If you are yet to pledge, please reach out to our Church Treasurer, George Manwa on 0720115358  who will be glad to help.

Thanks and God bless,
AMO Council.";*/

/*$ujumbe = "good morning man of God! We pray you have continued to experience God's love and favour.

This is to humbly remind and request you to continue supporting church building through your sacrificial giving. Kindly spare something this Sabbath. 

God bless,
AMO Council.";*/

/*
$ujumbe = "AMO SITE TOUR

Good morning ".$fname.",

AMO council and CDIC would like to appreciate your giving heart and your love towards the construction of God's sanctuary.

Thus far we have reached, which was made possible through God's guidance and your continued support towards this project.

We are inviting you to have a site tour of the new sanctuary, to update you on the construction progress, strategies towards use of the new sanctuary and also seek your opinion on the project towards its completion. 

We shall meet this coming Sunday 03/10/2021 at 11am at Karengata SDA church in the new sanctuary auditorium.

Please keep time.";
*/
                                        
//$ujumbe = $obj['parameter7']; //Already defined above.



                                        /*
                                         * Hi Tommy,
    Tune in to our mid-week prayer meeting at 5:30PM today.

    live.karengatasda.org

    Stay Safe,
    Karengata Personal Ministries,

    SMS/Call: 020 200 88 88
                                         */

                                        try
                                        {
                                            //$results = $gateway->sendMessage($to, $ujumbe, $from);
                                            $results = $gateway->sendMessage($to, "Dear ".$fname.", ".$ujumbe, $from);
                                            //$results = $gateway->sendMessage($to, $ujumbe, $from);

                                            foreach( $results as $result ) 
                                            {
                                                $resptxt = "OK";
                                                $respcde = "200";
                                                $respmsg = $result->status;
                                                $respnum = $result->number;
                                                $respcst = $result->cost;

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
                                }
                                else
                                {
                                    echo "Iko shida fulani.";
                                }
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
            }
            elseif($endpoint == "verification")
            {
                $txtf_trxno = $parameter2; //txtf_trxno
                $user_id = $parameter3; //user_id
                $phoneno = trim(substr($parameter4, -9)); //
                $emailad = $parameter5;
                
                if($phoneno == "" && $emailad == "")
                {
                    //$query = "SELECT id, trx_number FROM userdetails WHERE trx_number = $txtf_trxno"; //'".md5($password)."'
                    $query = "SELECT id, trx_number, member_no FROM userdetails WHERE `member_no` = '$txtf_trxno'"; //'".md5($password)."'
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);     

                    if($numrows == 1)
                    {   
                        //TODO: put into logs table instead of txt file.
                        //$data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                        //$fp = fopen ('logs.txt' , 'a');
                        //fwrite($fp, $data);

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
                else
                {
                    $query = "SELECT id, trx_number, member_no, firstname, lastname FROM `userdetails` WHERE `phone` = '$phoneno' OR `email` = '$emailad'";
                    $results = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($results);     //echo "SQL: ".$query;   

                    if($numrows == 1)
                    {
                        //TODO: put into logs table instead of txt file.
                        $data = 'Verification last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                        $fp = fopen ('logs.txt' , 'a');
                        fwrite($fp, $data);
                        
                        /*
                        $sql = "SELECT * FROM userdetails WHERE phone = '$phoneno' OR `email` = '$emailad'";
                        $rowMtu = mysqli_fetch_array(mysqli_query($conn, $sql));     //echo "SQL: ".$sql;

                        $fname = $rowMtu['firstname'];
                        $mname = $rowMtu['middlename'];
                        $lname = $rowMtu['lastname'];
                        
                        
                        $randnum = mt_rand(100, 199);
                        $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                        $otpcode = $randnum."".$randltr; //TODO: Add date into cypher  or change on device to be sending a random number with date as salt
                        
                        
                        $msg = "Your Verification OTP Code is ".$otpcode;
                        
                        require 'AfricasTalkingGateway.php';

                        $username   = "tommy";
                        $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                        $from = "KSDA_Church";

                        $gateway    = new AfricasTalkingGateway($username, $apiKey);
                        $to = trim("+254".substr($parameter4, -9)); //$str_phone   //trim according to country       

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
                            $respmsg = $e->getMessage(); if($respmsg == ""){$respmsg = "N/A";}
                            $respidn = "N/A";
                            $respnum = "NAN";
                            $respcst = "0.00";
                        }
                        
                        
                        $subject = "registration";
                        $description = $parameter4."|".$parameter5;
                        
                        
                        $msg = mysqli_real_escape_string($conn, $msg);
                        //$fname = mysqli_real_escape_string($conn, $parameter2);
                        //$lname = mysqli_real_escape_string($conn, $parameter3);
                        $phone = mysqli_real_escape_string($conn, $parameter4);
                        $email = mysqli_real_escape_string($conn, $parameter5);
                        $passw = mysqli_real_escape_string($conn, $parameter6);

                        $leo_date = date("Y-m-d", time());
                        $leo_time = date("H:i:s", time());

                        $recnames = mysqli_real_escape_string($conn, $fname." ".$lname);
                        $sql2 = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`, `to`, `from_name`, `to_name`, `from_id`, `to_id`, `subject`, `description`, `message`, `reference`, `cost`, `status`, `added_on`, `added_at`) VALUES (NULL, '$respidn', '0', '$from', '$to', 'KSDA_Church', '$recnames', '$udid', '$recmemno', '$msg', '$otpcode', '$respcst', '$subject', '$description', '$respmsg', '$leo_date', '$leo_time')";
                        mysqli_query($conn, $sql2);
                        */
                        
                        header("HTTP/1.0 409 Conflict");
                        header('Content-Type: application/json');
                        echo 
                        '
                            {
                               "code": "409",
                               "message": "OK",
                               "data": null
                            }
                        ';
                        exit();
                    }
                    else 
                    {
                        $randnum = mt_rand(100, 199);
                        $randltr = chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90))."".chr(rand(65,90)); 

                        $otpcode = $randnum."".$randltr; //TODO: Add date into cypher  or change on device to be sending a random number with date as salt
                        
                        
                        $msg = "Your Verification OTP Code is ".$otpcode;
                        
                        require 'AfricasTalkingGateway.php';

                        $username   = "tommy";
                        $apiKey     = "2e658c456820f4ae2ae1e03bf3a14ff3094a1d38a1315f05777db03dafe92667";
                        $from = "KSDA_Church";

                        $gateway    = new AfricasTalkingGateway($username, $apiKey);
                        $to = trim("+254".substr($parameter4, -9)); //$str_phone   //trim according to country       

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
                            $respmsg = $e->getMessage(); if($respmsg == ""){$respmsg = "N/A";}
                            $respidn = "N/A";
                            $respnum = "NAN";
                            $respcst = "0.00";
                        }
                        
                        
                        $subject = "registration";
                        $description = $parameter4."|".$parameter5;
                        
                        
                        $msg = mysqli_real_escape_string($conn, $msg);
                        $fname = mysqli_real_escape_string($conn, $parameter2);
                        $lname = mysqli_real_escape_string($conn, $parameter3);
                        $phone = mysqli_real_escape_string($conn, $parameter4);
                        $email = mysqli_real_escape_string($conn, $parameter5);
                        $passw = mysqli_real_escape_string($conn, $parameter6);

                        $leo_date = date("Y-m-d", time());
                        $leo_time = date("H:i:s", time());

                        $recnames = mysqli_real_escape_string($conn, $fname." ".$lname);
                        $sql = "INSERT INTO `messages` (`id`, `message_id`, `conversation_id`, `from`, `to`, `from_name`, `to_name`, `from_id`, `to_id`, `subject`, `description`, `message`, `reference`, `cost`, `status`, `added_on`, `added_at`) VALUES (NULL, '$respidn', '0', '$from', '$to', 'KSDA_Church', '$recnames', '$udid', '$recmemno', '$msg', '$otpcode', '$respcst', '$subject', '$description', '$respmsg', '$leo_date', '$leo_time')";
                        mysqli_query($conn, $sql);
                        
                        
                        
                        //If no records "No Content" status - transaction number doesn't exist.
                        header("HTTP/1.0 200 OK"); //404 Not Found
                        header('Content-Type: application/json');
                        echo 
                        '
                                {
                                    "code": "200",
                                    "message": "OK",
                                    "data": [{"firstname": "'.$fname.'", "lastname": "'.$lname.'", "otpdata": "'.$resptxt."|".$respcde."|".$respmsg."|".$otpcode."|".$respidn."|".$respnum."|".$respcst.'"}]
                                }
                        ';
                        exit();
                    }
                }
            }
            elseif($endpoint == "verification_mpesa")
            {
                $txtf_trxno = $obj['parameter2']; //txtf_trxno
                $user_id = $obj['parameter3']; //user_id
                $phoneno = $obj['parameter4']; //
                
                $query = "SELECT id, trx_number, member_no, firstname, lastname FROM `userdetails` WHERE `phone` = '$phoneno'";
                $results = mysqli_query($conn, $query);
                $numrows = mysqli_num_rows($results);       

                if($numrows == 1)
                {
                    //TODO: put into logs table instead of txt file.
                    //$data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                    //$fp = fopen ('logs.txt' , 'a');
                    //fwrite($fp, $data);

                    $sql = "SELECT * FROM userdetails WHERE phone = '$phoneno'";
                    $rowMtu = mysqli_fetch_array(mysqli_query($conn, $sql));     //echo "SQL: ".$sql;

                    $fname = $rowMtu['firstname'];

                    header("HTTP/1.0 200 OK");
                    header('Content-Type: application/json');
                    echo 
                    '
                        {
                           "code": "200",
                           "message": "OK",
                           "data": "'.$fname.'"
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
                    header("HTTP/1.0 200 User Not Found");
                    header('Content-Type: application/json');
                    echo 
                    '
                            {
                                "code": "200",
                                "message": "User Not Found",
                                "data": ""
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

                //$data = 'Last accessed by '.$user_id.' with Post data: '.$json.' | '.json_last_error_msg().' | '.date("M Y H:i:s"). PHP_EOL;
                //$fp = fopen ('logs.txt' , 'a');
                //fwrite($fp, $data);

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
                        "message": "Method Not Found",
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