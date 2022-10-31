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

$sql1 = "SELECT * FROM `settings` WHERE `organisation_code` ='{$orgcd}' AND `type` = 'webpage_all'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql1));
$title = $row['value'];

$sql2 = "SELECT * FROM `settings` WHERE `organisation_code` ='{$orgcd}' AND `type` = 'webpage_login' AND `name` = 'logo'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql2));
$logo_img = $row['value'];

$sql2 = "SELECT * FROM `settings` WHERE `organisation_code` ='{$orgcd}' AND `type` = 'webpage_login' AND `name` = 'favicon'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql2));
$favicon_img = $row['value'];



if (!isset($_SESSION['loggedin'])) {
    //die("To access this page, you need to <a href='index.php?ogc='".$orgcd.">LOGIN</a>");
    //TODO show sweet alert that points user to header('location:receipts.php?rst=1');
    header('location:index.php');
}

if ($status == "inactive") {
    die("Your account is suspended, contact administrator to activate. <a href='logout.php'>Logout</a>");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="CIMS Web Portal" />
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
if ($rst == "0") {
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
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">-->

        <link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>


        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $favicon_img; ?>">
        <link rel="icon" href="<?php echo $favicon_img; ?>" type="image/x-icon">

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
        <!--bootstrap-daterangepicker--> 
        <link href="../vendors3/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">



        <!--Bootstrap Colorpicker CSS--> 
        <link href="../vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css"/>

        <!--Bootstrap Datetimepicker CSS--> 
        <link href="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>

        <!--Bootstrap Daterangepicker CSS--> 
        <link href="../vendors/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>

        <!--		 Custom CSS 
                        <link href="dist/css/style.css" rel="stylesheet" type="text/css">-->





        <!-- Bootstrap Datetimepicker CSS -
        <link href="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
                    ->
        
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">

        <!--alerts CSS -->
        <link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">



        <!--link type="text/css" rel="stylesheet" href="extra/bootstrap.min.css" /-->

        <!-- Datatable CSS -->
        <!--link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'-->

        <!-- jQuery Library -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <script src="../modal3/extra/jquery.min.js"></script>

        <!-- Datatable JS -->
        <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

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
        
        <script type="text/javascript">
            $(function () 
            {


                $('#user').click(function () 
                {
                    //var udata = $(this).val();
                    //var fname = $(this).val().split(" ", 1);

                    var amarieta = $(this).val().split(" ");

                    $('#firstname').val(amarieta[0]);
                    $('#lastname').val(amarieta[2]);
                });
            });
        </script>
        
        <script type="text/javascript">
            function onInput() 
            {
                var val = document.getElementById("user").value;
                var opts = document.getElementById('users').childNodes;
                for (var i = 0; i < opts.length; i++) 
                {
                    if (opts[i].value === val) 
                    {
                      // An item was selected from the list!
                      // yourCallbackHere()
                      var userdata = opts[i].value.split("-");
                      var userjina = userdata[1].split(" ");
                      var userphon = opts[i].value.split("-");
                      //var userphon = userphon.replace('(','');
                      //alert(userdata[0]);
                      
                      
                      
                      $('#membernum').val(userdata[0]);
                      $('#firstname').val(userjina[1]);
                      $('#lastname').val(userjina[2]+" "+userjina[3]);
                      $('#phonenum').val(userdata[2].replace('(','').replace(')',''));
                      
                      
                      
                      //alert(opts[i].value);
                      break;
                    }
                    else
                    {
                        
                    }
                }
            }
        </script>


    </head>
