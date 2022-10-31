<?php
        session_start();
        
        
        
        $level = $_SESSION['level']; 
        $user = $_SESSION['user'];
        //$company = $_SESSION['company'];
        $status = $_SESSION['status'];
        $permi = $_SESSION['permissions']; 
        //echo " here ".$status;
        
        $rst = $_GET['rst'];
        
        
        $orgcd = $_SESSION['orgCD'];
        $organisation_code = $orgcd;
        
        //echo'orgCD: '.$orgcd.'<br>';
        //echo'Level: '.$level.'<br>';
        //echo'User: '.$user.'<br>';
        //echo'Status: '.$status.'<br>';
      
        
        if(!isset($_SESSION['loggedin']))
        {
            //die("To access this page, you need to <a href='index.php?ogc='".$orgcd.">LOGIN</a>");
            //TODO show sweet alert that points user to header('location:receipts.php?rst=1');
            header('location:index.php');
        }
        
        if($status == "inactive")
        {
            die("Your account is suspended, contact administrator to activate. <a href='logout.php'>Logout</a>");
        }
?>
<!DOCTYPE html>
<html lang="en" style="background-color: rgba(255, 255, 255, 0.1); border:1; display:block; margin:auto; align-content: center;">
<!--<html lang="en" style="background: transparent; margin: 0; padding: 0;">-->

<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>NyumbaOS</title>
	<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
        <link href="pagination/css/C_green_1.css" rel="stylesheet" type="text/css" />
        <style type="text/css">
            .records {
                width: 510px;
                margin: 5px;
                padding:2px 5px;
                border:1px solid #B6B6B6;
            }

            .record {
                color: #474747;
                margin: 5px 0;
                padding: 3px 5px;
                    background:#E6E6E6;  
                border: 1px solid #B6B6B6;
                cursor: pointer;
                letter-spacing: 2px;
            }
            .record:hover {
                background:#D3D2D2;
            }


            .round {
                    -moz-border-radius:8px;
                    -khtml-border-radius: 8px;
                    -webkit-border-radius: 8px;
                    border-radius:8px;    
            }    

            p.createdBy{
                padding:5px;
                width: 510px;
                    font-size:15px;
                    text-align:center;
            }
            p.createdBy a {color: #666666;text-decoration: none;}        
        </style> 
        
        <?php
        if($rst == "0")
        {
         ?>
                <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
                <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>-->
                <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">-->

                <link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
                <script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
         <?php
        }
        ?>
                
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        
        
        
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
        
        
        <script type="text/javascript">

        function CallPrint(printMe) 
        {
            var prtContent = document.getElementById(printMe);
            var WinPrint = window.open('', '', 'left=0,top=0,width=600,height=400,toolbar=1,scrollbars=1,status=0');
            WinPrint.document.write('<html><head><title></title></head>');
            WinPrint.document.write('<body style="font-family:verdana; font-size:14px;width:300px;height:200px:" >');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.write('</body></html>');
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
            prtContent.innerHTML = "";
        }

        </script>
    
    
</head>
        <?php
       
        ?>