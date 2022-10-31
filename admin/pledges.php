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
if ($set == "") {
    $set = $_SESSION['set'];
    if ($set == "") {
        $set = "all";
    }
}

$_SESSION['set'] = $set;

$box = $_GET["box"];
$_SESSION['box'] = $box;


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

$agent_id = $_SESSION['userid'];

$department = $_SESSION['department'];

$ind = "real";
//$set = "real";
?>

<?php include './header.php'; ?>

<body>

<?php
if ($act != "") {
    ?>
        <script>
            setTimeout(function ()
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
                        function ()
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
            <div class="container-fluid">
                <!-- Title -->
                <div class="row heading-bg">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h5 class="txt-dark"><?php echo "List of Pledges"; ?></h5>
                    </div>
                    <!-- Breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="#"><span>apps</span></a></li>
                            <li class="active"><span>inbox</span></li>
                        </ol>
                    </div>
                    <!-- /Breadcrumb -->
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default card-view pa-0">
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body pa-0">
                                    <div class="mail-box">
                                        <div class="row">
                                            
                                            <aside class="col-lg-9 col-md-8 pl-0">
                                                <div class="panel panel-refresh pa-0">
                                                    <div class="refresh-container">
                                                        <div class="la-anim-1"></div>
                                                    </div>
                                                    <div class="panel-heading pt-20 pb-20 pl-15 pr-15">
                                                        <div class="pull-left">
                                                            <h6 class="panel-title txt-dark"><?php echo ucfirst($box); ?></h6>
                                                        </div>
                                                        <div class="pull-right">
                                                            <form role="search" class="inbox-search inline-block pull-left mr-15">
                                                                <div class="input-group">
                                                                    <input name="example-input1-group2" class="form-control" placeholder="Search" type="text">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn  btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
                                                                    </span>
                                                                </div>
                                                            </form>
                                                            <a href="#" class="pull-left inline-block refresh">
                                                                <i class="zmdi zmdi-replay"></i>
                                                            </a>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body inbox-body pa-0">
                                                            <div class="mail-option pl-15 pr-15">
                                                                <ul class="unstyled inbox-pagination">
                                                                    <li><span>1-10 of 234</span></li>
                                                                    <li>
                                                                        <a class="pl-15 pr-15" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="table-responsive mb-0">
                                                                <table class="table table-inbox table-hover mb-0">
                                                                    <tbody>
                                                                        
                                                                    <?php
                                                                     
                                                                                $sql2 = "SELECT * FROM `messages` WHERE `organisation_id` = '$orgid' AND `box` = 'pledge' ORDER BY `id` DESC";
                                                                                $query2 = mysqli_query($conn, $sql2); //TODO: filter to show only messages sent by particular user.  //echo "Here: ".$sql2;
                                                                                while ($row2 = mysqli_fetch_array($query2)) 
                                                                                {
                                                                                    //$nyumbaid = $row["address"];

                                                                                    $msg_id = $row2["id"];
                                                                                    $msg_nm = $row2["to_name"];
                                                                                    $msg_tx = $row2["message"];
                                                                                    $msg_ty = $row2["type"];
                                                                                    $msg_ts = substr($msg_tx, 0, 100);
                                                                                    
                                                                                    $msg_tm = $row2["reg_timestamp"]; //2020-06-19 10:28:51
                                                                                    $epoc = explode(" ", $msg_tm);
                                                                                    $date = $epoc[0];                 //2020-06-19
                                                                                    $time = $epoc[1];                 //10:28:51
                                                                                    //$ampm = $epoc[2];               //AM

                                                                                    //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                                                    //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                                                    //$aprtnm = $rowHse['name'];
                                                                                    ?>
                                                                        
                                                                                            <tr class="<?php echo $status; ?>">
                                                                                                <td class="inbox-small-cells">
                                                                                                    <div class="checkbox checkbox-default inline-block">
                                                                                                        <input type="checkbox" id="checkbox012"/>
                                                                                                        <label for="checkbox012"></label>
                                                                                                    </div>
                                                                                                    <i class="zmdi zmdi-star inline-block font-16"></i>
                                                                                                </td>
                                                                                                <?php
                                                                                                if($msg_ty == "requests")
                                                                                                {
                                                                                                    ?>
                                                                                                          <td class="view-message  dont-show"><?php echo $msg_nm; ?><span class="label label-warning pull-right"><?php echo $msg_ty; ?></span></td>
                                                                                                    <?php
                                                                                                }
                                                                                                else if($msg_ty == "bills")
                                                                                                {
                                                                                                    ?>
                                                                                                          <td class="view-message  dont-show"><?php echo $msg_nm; ?><span class="label label-danger pull-right"><?php echo $msg_ty; ?></span></td>
                                                                                                    <?php
                                                                                                }
                                                                                                else
                                                                                                {
                                                                                                    ?>
                                                                                                          <td class="view-message  dont-show"><?php echo $msg_nm; ?><span class="label label-warning pull-right"><?php echo $msg_ty; ?></span></td>
                                                                                                    <?php
                                                                                                }
                                                                                                ?>
                                                                                                
                                                                                                <td class="view-message "><?php echo wordwrap($msg_ts, 45, "<br>\n"); ?></td>
                                                                                                <td class="view-message  text-right">
                                                                                                    <i class="zmdi zmdi-attachment inline-block mr-15 font-16"></i>
                                                                                                    <span  class="time-chat-history inline-block"><?php echo $date."<br>".$time; ?></span>
                                                                                                </td>
                                                                                            </tr>
                                                                        
                                                                                    <?php
                                                                                }
                                                                          
                                                                        
                                                                        
                                                                    ?>
                                                                        
                                                                        
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>

            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p>2018 &copy; Droopy. Pampered by Hencework</p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->

        </div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="../vendors/bower_components/wysihtml5x/dist/wysihtml5x.min.js"></script>

    <script src="../vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- Bootstrap Wysuhtml5 Init JavaScript -->
    <script src="dist/js/bootstrap-wysuhtml5-data.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Owl JavaScript -->
    <script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>

    <!-- Switchery JavaScript -->
    <script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>

</body>

</html>
