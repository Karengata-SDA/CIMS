<?php
session_start();

error_reporting(E_ALL | E_STRICT);
require_once('conn.php');
//include('conn.php');

    include_once ('function.php');
    
    
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 10;
    $startpoint = ($page * $limit) - $limit;
    
    $_SESSION['page'] = $page;

    //to make pagination
    $statement = "`people`"; // WHERE `comments_remarks` = 'Present'
    
    $logo = $_SESSION['logo'];
    
    $set = $_GET["set"];
    if($set == "")
    {
        $set = $_SESSION['set'];
        if($set == "")
        {
            $set = "all";
        }
    }
    
    $_SESSION['set'] = $set;
    
    //$ind = "real";
    //$set = "real";
    
    $ttl = $_SESSION['title'];
    $act = $_SESSION['action']; 
    $typ = $_SESSION['type'];
    $sbj = $_SESSION['subject'];
    $msg = $_SESSION['message'];
    
    //echo "Title: ".$ttl."<br>";
    //echo "Action: ".$act."<br>";
    //echo "Type: ".$typ."<br>";
    //echo "Subject: ".$sbj."<br>";
    //echo "Message: ".$msg."<br>";
    
    $orgnm = $_SESSION['orgNM'];
    $orgid = $_SESSION['orgID'];

    $pimind = $_SESSION['pimind'];
    $secind = $_SESSION['secind'];
    $secind = $_SESSION['terind']; 

    $department = $_SESSION['department'];
        
    $ind = "real";
    //$set = "real";
?>

<?php include './header.php'; ?>

<body>
    
    <?php
        
        if($act != "")
        {
         ?>
         <script>
            setTimeout(function() 
            {
                swal(
                {
                    title: "<?php echo $ttl; ?>",
                    text: "<?php echo $msg; ?>",
                    type: "<?php echo $typ; ?>",
                    confirmButtonColor: "#8BC34A"
                    
                    //type: "warning",   
                    //showCancelButton: true,   
                    //confirmButtonColor: "#f8b32d",   
                    //confirmButtonText: "Yes, delete it!",   
                    //closeOnConfirm: false
                }, 
                function() 
                {
                    //window.location = "https://www.youtube.com/c/devbanban"; //หน้าที่ต้องการให้กระโดดไป
                    //window.location = "../admin/<?php echo "profiles" ?>.php";
                });
            }, 1000);
        </script>

         <?php
        }
        
        $_SESSION['title'] = "";
        $_SESSION['action'] = "";
        $_SESSION['type'] = "";
        $_SESSION['subject'] = "";
        $_SESSION['message'] = "";
        $_SESSION['set'] = $set;
        ?>
        
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

                <!-- Row -->
                <div class="row">
              
                    <!-- Row -->

                    <div class="col-lg-12 col-xs-12">
                        <div class="panel panel-default card-view panel-refresh">
                            <div class="refresh-container">
                                <div class="la-anim-1"></div>
                            </div>
                            <div class="panel-heading">
                                <div class="pull-left">
                                    <h6 class="panel-title txt-dark">List of Receipts</h6>
                                </div>
                                

                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="panel-wrapper collapse in">
                                
                                <?php

    

    $id = $_GET['id'];

    $sql1 = "SELECT * FROM `pesa` WHERE `id` = '$id'";
    $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql1));
    $referenceno = $rowPesa['reference_no'];
    $house_id = $rowPesa['item_id'];
    $amt_paid = $rowPesa['paid'];

    $_SESSION['subject'] = $referenceno;
    $referenceno = $_SESSION['subject'];

?>


<div class="col-md-4">

    <!--div class="panel-heading">
            <div class="pull-left">
                    <h6 class="panel-title txt-dark">Large model</h6>
            </div>
            <div class="clearfix"></div>
    </div-->
    <div  class="panel-wrapper collapse in">
        <div  class="panel-body">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!--div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                        </div-->
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Payment Receipt <small>Sample user invoice design</small></h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Settings 1</a>
                                                        </li>
                                                        <li><a href="#">Settings 2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <section class="content invoice">
                                                <!-- title row -->
                                                <div class="row">
                                                    <div class="col-xs-12 invoice-header">
                                                        <h1>
                                                            <i class="fa fa-globe"></i> Requisition.
                                                            <small class="pull-right">Date: 16/08/2016</small>
                                                        </h1>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- info row -->
                                                <div class="row invoice-info">
                                                    <div class="col-sm-4 invoice-col">
                                                        From
                                                        <address>
                                                            <strong>Iron Admin, Inc.</strong>
                                                            <br>795 Freedom Ave, Suite 600
                                                            <br>New York, CA 94107
                                                            <br>Phone: 1 (804) 123-9876
                                                            <br>Email: ironadmin.com
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        To
                                                        <address>
                                                            <strong>John Doe</strong>
                                                            <br>795 Freedom Ave, Suite 600
                                                            <br>New York, CA 94107
                                                            <br>Phone: 1 (804) 123-9876
                                                            <br>Email: jon@ironadmin.com
                                                        </address>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-4 invoice-col">
                                                        <b>Invoice #007612</b>
                                                        <br>
                                                        <br>
                                                        <b>Order ID:</b> 4F3S8J
                                                        <br>
                                                        <b>Payment Due:</b> 2/22/2014
                                                        <br>
                                                        <b>Account:</b> 968-34567
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- Table row -->
                                                <div class="row">
                                                    <div class="col-xs-12 table">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Qty</th>
                                                                    <th>Product</th>
                                                                    <th>Serial #</th>
                                                                    <th style="width: 59%">Description</th>
                                                                    <th>Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Call of Duty</td>
                                                                    <td>455-981-221</td>
                                                                    <td>El snort testosterone trophy driving gloves handsome gerry Richardson helvetica tousled street art master testosterone trophy driving gloves handsome gerry Richardson
                                                                    </td>
                                                                    <td>$64.50</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Need for Speed IV</td>
                                                                    <td>247-925-726</td>
                                                                    <td>Wes Anderson umami biodiesel</td>
                                                                    <td>$50.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Monsters DVD</td>
                                                                    <td>735-845-642</td>
                                                                    <td>Terry Richardson helvetica tousled street art master, El snort testosterone trophy driving gloves handsome letterpress erry Richardson helvetica tousled</td>
                                                                    <td>$10.70</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Grown Ups Blue Ray</td>
                                                                    <td>422-568-642</td>
                                                                    <td>Tousled lomo letterpress erry Richardson helvetica tousled street art master helvetica tousled street art master, El snort testosterone</td>
                                                                    <td>$25.99</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <div class="row">
                                                    <!-- accepted payments column -->
                                                    <div class="col-xs-6">

                                                        <div class="panel panel-default card-view">
                                                            <div class="panel-heading">
                                                                <div class="pull-left">
                                                                    <h6 class="panel-title txt-dark">Requisition Progress</h6>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="panel-wrapper collapse in">
                                                                <div class="panel-body">
                                                                    <div class="streamline user-activity">
                                                                        <div class="sl-item">
                                                                            <a href="javascript:void(0)">
                                                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                                    <img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
                                                                                </div>
                                                                                <div class="sl-content">
                                                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Clay Masse</span><span>invited to join the meeting in the conference room at 9.45 am</span></p>
                                                                                    <span class="block txt-grey font-12 capitalize-font">3 Min</span>
                                                                                </div>
                                                                            </a>
                                                                        </div>

                                                                        <div class="sl-item">
                                                                            <a href="javascript:void(0)">
                                                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                                    <img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
                                                                                </div>
                                                                                <div class="sl-content">
                                                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Evie Ono</span><span>added three new photos in the library</span></p>
                                                                                    <div class="activity-thumbnail">
                                                                                        <img src="../img/thumb-1.jpg" alt="thumbnail"/>
                                                                                        <img src="../img/thumb-2.jpg" alt="thumbnail"/>
                                                                                        <img src="../img/thumb-3.jpg" alt="thumbnail"/>
                                                                                    </div>
                                                                                    <span class="block txt-grey font-12 capitalize-font">8 Min</span>
                                                                                </div>
                                                                            </a>	
                                                                        </div>

                                                                        <div class="sl-item">
                                                                            <a href="javascript:void(0)">
                                                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                                    <img class="img-responsive img-circle" src="../img/user2.png" alt="avatar"/>
                                                                                </div>
                                                                                <div class="sl-content">
                                                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">madalyn rascon</span><span>assigned a new task</span></p>
                                                                                    <span class="block txt-grey font-12 capitalize-font">28 Min</span>
                                                                                </div>
                                                                            </a>	
                                                                        </div>

                                                                        <div class="sl-item">
                                                                            <a href="javascript:void(0)">
                                                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                                    <img class="img-responsive img-circle" src="../img/user3.png" alt="avatar"/>
                                                                                </div>
                                                                                <div class="sl-content">
                                                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">Ezequiel Merideth</span><span>completed project wireframes</span></p>
                                                                                    <span class="block txt-grey font-12 capitalize-font">yesterday</span>
                                                                                </div>
                                                                            </a>	
                                                                        </div>

                                                                        <div class="sl-item">
                                                                            <a href="javascript:void(0)">
                                                                                <div class="sl-avatar avatar avatar-sm avatar-circle">
                                                                                    <img class="img-responsive img-circle" src="../img/user4.png" alt="avatar"/>
                                                                                </div>
                                                                                <div class="sl-content">
                                                                                    <p class="inline-block"><span class="capitalize-font txt-success mr-5 weight-500">jonnie metoyer</span><span>created a group 'Hencework' in the discussion forum</span></p>
                                                                                    <span class="block txt-grey font-12 capitalize-font">18 feb</span>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-xs-6">
                                                        <p class="lead">Amount Due 2/22/2014</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th style="width:50%">Subtotal:</th>
                                                                        <td>$250.30</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Tax (9.3%)</th>
                                                                        <td>$10.34</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Shipping:</th>
                                                                        <td>$5.80</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Total:</th>
                                                                        <td>$265.24</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->

                                                <!-- this row will not appear when printing -->
                                                <div class="row no-print">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                                        <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                                        <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
        </div>
    </div>

</div>   
                                    
                            </div>
                        </div>
                    </div>
                    <?php include ('modal-requisition.php'); ?>
                    <?php // include ('modal-receipt.php'); ?>


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
    include_once 'footer.php';
    ?>