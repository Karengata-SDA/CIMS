<?php
session_start();

error_reporting(E_ALL | E_STRICT);
require_once('conn.php');
//include('conn.php');

include_once ('function.php');

$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit = 10;
$startpoint = ($page * $limit) - $limit;

//to make pagination
$statement = "`people`"; // WHERE `comments_remarks` = 'Present'

$logo = $_SESSION['logo'];

//    $act = $_GET['act'];
//    if($act=='success')
//    {
//          echo '<script type="text/javascript">
//          swal("", "บันทึกข้อมูลเรียบร้อยแล้ว", "success");
//          </script>';
//    }

$rst = $_GET['rst'];

$set = $_GET["set"];
if ($set == "") {
    $set = "all";
}

$ind = "real";
//$set = "real";
?>

<?php include './header.php'; ?>


<body>
    <!--Preloader-->
    <!--div class="preloader-it">
            <div class="la-anim-1"></div>
    </div-->
    <!--/Preloader-->
    <div class="wrapper  theme-5-active pimary-color-green">
        <!-- Top Menu Items -->
<?php include './titlebarmenu.php'; ?>
        <!-- /Top Menu Items -->

        <!-- Left Sidebar Menu -->
<?php include './leftsidebarmenu.php'; ?>
        <!-- /Left Sidebar Menu -->

        <!-- Right Sidebar Menu -->
<?php include './rightsidebarmenu.php'; ?>
        <!-- /Right Sidebar Menu -->



        <!-- Right Sidebar Backdrop -->
        <div class="right-sidebar-backdrop"></div>
        <!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->
        <div class="page-wrapper">
            <div class="container-fluid pt-25">

                <div class="col-lg-9 col-xs-12">
                    <div class="panel panel-default card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Rent Collection Analysis</h6>
                            </div>

                            <div class="pull-right">
                                <a href="javascript:void(0)" class="pull-left btn btn-success btn-xs mr-15">Add New</a>
                                <a href="#" class="pull-left inline-block refresh mr-15">
                                    <i class="zmdi zmdi-replay"></i>
                                </a>
                                <a href="#" class="pull-left inline-block full-screen mr-15">
                                    <i class="zmdi zmdi-fullscreen"></i>
                                </a>
                                <div class="pull-left inline-block dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table id="datable_1" class="table  display table-hover border-none">
                                            <thead>
                                                <tr>
                                                    <th>House</th>
                                                    <th>Amount Due</th>
                                                    <th>Rent Paid</th>
                                                    <th>House Deposit</th>
                                                    <th>Electricity Deposit</th>
                                                    <th>Advance</th>
                                                    <th>January Rent</th>
                                                    <th>Other Areas</th>
                                                    <th>Remarks</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>#001</td>
                                                    <td>Ksh. 28,000</td>
                                                    <td>Ksh. 28,000</td>
                                                    <td>Ksh. 3,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-danger">unpaid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#002</td>
                                                    <td>Ksh. 16,000</td>
                                                    <td>STAFF</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#101</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-warning">pending</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#102</td>
                                                    <td>Ksh. 40,000</td>
                                                    <td>Ksh. 40,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#103</td>
                                                    <td>Ksh. 18,000</td>
                                                    <td>Ksh. 17,500</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                     <td>Bal. 500</td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#104</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#105</td>
                                                    <td>Ksh. 28,000</td>
                                                    <td>Ksh. 28,000</td>
                                                    <td>Ksh. 3,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-danger">unpaid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#106</td>
                                                    <td>Ksh. 16,000</td>
                                                    <td>STAFF</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#107</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-warning">pending</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#108</td>
                                                    <td>Ksh. 40,000</td>
                                                    <td>Ksh. 40,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#201</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td>Ksh. 4,500</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Ksh. 71,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>28,000 was paid</td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#202</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Local Transfer - Charlene</td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>#203</td>
                                                    <td>Ksh. 16,000</td>
                                                    <td>Ksh. 16,000</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-danger">unpaid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#204</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td>Ksh. 20,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Ksh. 30,000</td>
                                                    <td></td>
                                                    <td>Bal. 10,000</td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#205</td>
                                                    <td>Ksh. 35,000</td>
                                                    <td>Vacant</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-warning">pending</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#206</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td>Ksh. 30,000</td>
                                                    <td></td>
                                                    <td>0</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#207</td>
                                                    <td>Ksh. 18,000</td>
                                                    <td>Ksh. 18,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>#208</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td>Ksh. 32,000</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="label label-success">paid</span>
                                                    </td>
                                                    <td>
                                                        <a href="#view<?php echo $row['id']; ?>" alt="default" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" data-target=".bs-example-modal-lg" ><i class="fa fa-file-text-o"></i></a>
                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                        <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                    </td>
                                                </tr>

                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>	
                            </div>	
                        </div>
                    </div>
                </div>

<?php include ('modal-requisition.php'); ?>


            </div>
            <!-- /Row -->

            <!-- Row -->

            <!-- /Row -->

        </div>
        <!-- Footer -->
        <!--footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                        <div class="col-sm-12">
                                <p>2018 &copy; Droopy. Pampered by Hencework</p>
                        </div>
                </div>
        </footer-->
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->
<?php include('add_modal.php'); ?>

</div>
<!-- /#wrapper -->
<?php
include 'footer.php';
?>