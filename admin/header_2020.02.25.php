<?php
        session_start();
        
        $level = $_SESSION['level']; 
        $user = $_SESSION['user'];
        //$company = $_SESSION['company'];
        $status = $_SESSION['status'];
        $permi = $_SESSION['permissions']; 
        //echo " here ".$status;
        
        $rst = $_GET['rst'];
        

        
        if(!isset($_SESSION['loggedin']))
        {
            die("To access this page, you need to <a href='index.php'>LOGIN</a>");
        }
        
        if($status == "vacant")
        {
            die("Your account is suspended, contact administrator to activate. <a href='logout.php'>Logout</a>");
        }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>NyumbaOS</title>
	<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
        
        
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
        
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">

		<!-- bootstrap-select CSS -->
	<link href="../vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
		
	<!-- switchery CSS -->
	<link href="../vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
	


			<!-- Footable CSS -->
		<link href="../vendors/bower_components/FooTable/compiled/footable.bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap -->
    <link href="../vendors3/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors3/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors3/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors3/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    		<!--alerts CSS -->
		<link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">


     
    <!--link type="text/css" rel="stylesheet" href="extra/bootstrap.min.css" /-->
    
    
</head>
        <?php
       
        ?>