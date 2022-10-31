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
    
    $staff_uid = $_SESSION['userid'];
    

    $pimind = $_SESSION['pimind'];
    $secind = $_SESSION['secind'];
    $terind = $_SESSION['terind']; 

    $department = $_SESSION['department'];
        
    $ind = "real";
    //$set = "real";
?>

<?php include './header_1.php'; ?>

<body style="border:1; display:block; margin:auto; align-content: center;">
    
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
        
                                
        <?php



            //$id = $_GET['id'];
            $id = $_GET["recp"];
            $sf = $_GET["stid"];

            $sql0 = "SELECT * FROM `transactions` WHERE `id` = '$id'";
            $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql0)); //echo "<br>".$sql0;
            
            $reference_no = $rowPesa['reference_no'];
            $code = $rowPesa['code'];
            $house_id = $rowPesa['item_id'];
            $amt_paid = $rowPesa['paid'];
            $method = $rowPesa['method']; 
            $id_agent = $rowPesa['device_id']; 
            $id_user = $rowPesa['user_id']; 
            $user_name = $rowPesa['user_nm'];
            
            $unitprice = $rowPesa['due'];
            $paydesc1 = $rowPesa['remarks'];
            $payamt1 = $rowPesa['paid'];
            
            
            $sub_category_id = $rowPesa['sub_category_id'];
            $item_name = $rowPesa['item_name'];
            
            //$sql = "SELECT * FROM `property` WHERE `id` = '$sub_category_id'"; //`sub_category_id` = '$residence' AND `name` = '$address'";
            $sql = "SELECT * FROM `property` WHERE `id` = '$house_id'"; 
            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));    //echo "SQL: ".$sql;
            $item_make = $rowHse['make'];
            //$item_name = $rowHse['name'];
            $value_nw = $rowHse['value'];
            
            
            

            $date_paid = $rowPesa['due_on']; 
            $date_recp = $rowPesa['added_on']; //2020-05-19 14:53:16
            
            
            $num = $id;
            $str_length = 4;

            // hardcoded left padding if number < $str_length
            $serial_no = substr("0000{$num}", -$str_length);

            // output: 0123
            
            
            
            $epoc = explode(" ", $date_recp);
            $date = $epoc[0]; //2020-05-19
            $time = $epoc[1]; //14:53:16
            //$ampm = $epoc[2]; //AM
            
            $rituko = explode("-", $date);
            $mo = $rituko[1]; //05
            $da = $rituko[2]; //19
            $ye = $rituko[0]; //2020

            $date_recp = $da."/".$mo."/".$ye;

            $_SESSION['subject'] = $referenceno;
            $referenceno = $_SESSION['subject'];
            
            //`user_nm`, `code`, `reference_no`, `method`, `description`, `total_cost`, `amount`, `paid`, `due`, `balance`, `item_name`
            $user_nm = $rowPesa['user_nm']; //TODO: The person who gave the money or made the payment.
            
            $sql1 = "SELECT * FROM `userdetails` WHERE `id` = '$id_user'"; //`id` = '$user_id'
            $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql1));

            //echo "<br>Query 1: ".$sql1."<br>";

            $fname = $rowPer['firstname'];
            $lname = $rowPer['lastname'];
            $name_user = $fname.' '.$lname;
            $user_phone = $rowPer['phone'];
            $user_email = $rowPer['email'];
            $memberno = $rowPer['member_no'];
            
            //echo "<br>Name: ".$name_user;
            //echo "<br>Phone: ".$user_phone;
            //echo "<br>Email: ".$user_email;
            
            $sql2 = "SELECT * FROM `userdetails` WHERE `id` = '$id_agent'"; //`id` = '$user_id'
            $rowPer2 = mysqli_fetch_array(mysqli_query($conn, $sql2));

            //echo "<br>Query 2: ".$sql2."<br>";

            $fname2 = $rowPer2['firstname'];
            $lname2 = $rowPer2['lastname'];
            $phone2 = $rowPer2['phone'];
            $email2 = $rowPer2['email'];
            $name_staff = $fname2.' '.$lname2;
            
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
                                  <!-- Row -->
                                    <div class="col-lg-9 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <!--<h2>Invoice Design <small>Sample user invoice design</small></h2>-->
                                                        <h2>>> <small>Sample user invoice design</small></h2>
                                                        <!--
                                                        <ul class="nav navbar-right panel_toolbox">
                                                            <li>
                                                                <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                                            <li>
                                                                <a class="close-link"><i class="fa fa-close"></i></a>
                                                            </li>
                                                        </ul>
                                                        <!---->
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="x_content">

                                                        <section class="content invoice">
                                                            <!-- title row -->
                                                            <div class="row">
                                                                <div class="col-xs-12 invoice-header">
                                                                    <h1>
                                                                        <i class="fa fa-globe"></i> Receipt.
                                                                        <small class="pull-right">Date: <?php echo $date_recp; ?></small>
                                                                    </h1>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                            <!-- info row -->
                                                            <div class="row invoice-info">
                                                                <div class="col-sm-4 invoice-col">
                                                                    From
                                                                    <address>
                                                                        <strong><?php echo $name_staff; ?></strong>
                                                                        <br>Karengata SDA Church
                                                                        <br>Nairobi, Kenya
                                                                        <br>Phone: +254 20 200 88 88
                                                                        <br>E-mail: accounts@karengatasda.org
                                                                    </address>
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-4 invoice-col">
                                                                    To
                                                                    <address>
                                                                        <strong><?php echo $user_name; ?></strong>
                                                                        <br>Karengata SDA Church
                                                                        <br>Addr.:
                                                                        <br>Phone: 
                                                                        <br>E-mail: 
                                                                    </address>
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-sm-4 invoice-col">
                                                                    <b>Receipt # <?php echo $id; ?></b>
                                                                    <br>
                                                                    <br>
                                                                    <b>Trx ID:</b> <?php echo $code; ?>
                                                                    <br>
                                                                    <b>Date Received:</b> <?php echo $date_paid; ?>
                                                                    <br>
                                                                    <b>Member No.:</b> <?php echo $memberno; ?>
                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                            <!-- /.row -->

                                                            <!-- Table row -->
                                                            <div class="row">
                                                                <div class="col-xs-12 table">
                                                                    <table id="edit_datable_1" class="table  table-bordered table-striped m-b-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Item Name</th>
                                                                                <th>Quantity</th>
                                                                                <th>Description</th>
                                                                                <th>Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            
                                                                            $sql = "SELECT * FROM `transactions` WHERE `code` = '$code' AND `device_id` = '$id_agent' ";
                                                                            $query = mysqli_query($conn, $sql); //echo $sql;
                                                                            
                                                                            $total = 0;
                                                                            
                                                                            $i = 0;
                                                                            while ($row = mysqli_fetch_array($query)) 
                                                                            {                            
                                                                                $user_id = $row['user_id'];
                                                                                $itemname = $row['item_name'];
                                                                                $garama = $row['amount'];
                                                                                $mfafanuo= $row['description'];
                                                                                
                                                                                //$price = $row['price'] * $row['quantity'];
                                                                                $total += str_replace(',', '', $garama);
                                                                                
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?php echo $itemname; ?></td>
                                                                                        <th>1</th>
                                                                                        <td><?php echo $mfafanuo; ?></td>
                                                                                        <td><?php echo $garama; ?></td>
                                                                                    </tr>
                                                                                <?php
                                                                                
                                                                                $i++;
                                                                            }
                                                                            
                                                                            ?>
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th><strong>TOTAL</strong></th>
                                                                                <th></th>
                                                                                <th></th>
                                                                                <th><?php echo number_format($total); ?></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>


                                                                    <!--Editor-->
                                                                    <div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">

                                                                        <div class="modal-dialog" role="document">
                                                                            <form class="modal-content form-horizontal" id="editor">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                                                    <h5 class="modal-title" id="editor-title">Add Row</h5>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <input type="number" id="id" name="id" class="hidden"/>
                                                                                    <div class="form-group required">
                                                                                        <label for="firstName" class="col-sm-3 control-label">First Name</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group required">
                                                                                        <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group required">
                                                                                        <label for="startedOn" class="col-sm-3 control-label">Started On</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="dob" class="col-sm-3 control-label">Date of Birth</label>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <!--/Editor-->




                                                                </div>
                                                                <!-- /.col -->
                                                            </div>
                                                            <!-- /.row -->

                                                            <div class="row">
                                                                <!-- accepted payments column -->
                                                                <div class="col-xs-6">
                                                                    <p class="lead">Payment Methods:</p>
                                                                    <img src="images/visa.png" alt="Visa">
                                                                    <img src="images/mastercard.png" alt="Mastercard">
                                                                    <img src="images/american-express.png" alt="American Express">
                                                                    <img src="images/paypal.png" alt="Paypal">
                                                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                                                    </p>
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
                                                            <div class="row no-print"> <!-- style="visibility: hidden;" -->
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
                                  <!-- /Row -->             
                            </div>
                        </div>
                        <!--
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                        </div>
                        -->
                    </div>
                    <!-- /.modal-content -->
                </div>
        </div>
    </div>

</div>   
                                    
                          
       
   
   