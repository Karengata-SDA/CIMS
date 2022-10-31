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
    $orgcd = $_SESSION['orgCD']; //orgCD

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
                                
                                <div  class="tab-struct custom-tab-1">
                                
                                    <div class="panel-body row pa-0">
                                        
                                        <div  class="tab-struct custom-tab-1">
                                            
                                                 <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                               
                                               <?php 
                                                        if($set == "all")
                                                        {
                                                            ?>
                                                                    <li class="active"><a  id="profile_tab_8" role="tab" href="receipts.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                                    <li><a  id="profile_tab_8" role="tab" href="receipts.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                            <?php
                                                        }
                                                ?>
                                               
                                                <?php
                                                
                                                //echo "Title: ".$ttl."<br>";
                                                //echo "Action: ".$act."<br>";
                                                //echo "Type: ".$typ."<br>";
                                                //echo "Subject: ".$sbj."<br>";
                                                //echo "Message: ".$msg."<br>";
                                                
                                                    $orgid = $_SESSION['orgID'];
                                                    
                                                    //echo "Here: ".$pimind;
                                                    
                                                    if($pimind == "Real Estate")
                                                    {
                                                        $sql2 = "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment' AND `organisation_id` = '$orgid'";
                                                        $query2 = mysqli_query($conn, $sql2); // AND `name` != 'Apartment'

                                                        //echo "Setting: ".$set;

                                                        while ($row2 = mysqli_fetch_array($query2)) 
                                                        {
                                                            //$nyumbaid = $row["address"];

                                                            $mali_id = $row2["id"];
                                                            $mali_nm = $row2["name"];

                                                            //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                            //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                            //$aprtnm = $rowHse['name'];

                                                            if($set == $mali_id) 
                                                            {
                                                                ?>
                                                                        <!--<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#<?php echo $mali_nm; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>-->
                                                                        <li class="active"><a  id="profile_tab_8" role="tab" href="receipts.php?set=<?php echo $mali_id; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                        <li role="" class=""><a  data-toggle="" id="photos_tab_8" role="tab" href="receipts.php?set=<?php echo $mali_id; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $sql2 = "SELECT * FROM `departments` WHERE `organisation_id` = '$orgid'";
                                                        $query2 = mysqli_query($conn, $sql2); // AND `name` != 'Apartment'

                                                        //echo "Setting: ".$set;

                                                        while ($row2 = mysqli_fetch_array($query2)) 
                                                        {
                                                            //$nyumbaid = $row["address"];

                                                            $dept_id = $row2["id"];
                                                            $dept_cd = $row2["code"];
                                                            
                                                            //echo "Dept: ".$dept_nm."<br>\n";

                                                            //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                            //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                            //$aprtnm = $rowHse['name'];

                                                            if($set == $dept_id) 
                                                            {
                                                                ?>
                                                                        <!--<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#<?php echo $dept_nm; ?>" aria-expanded="false"><span><?php echo $dept_cd; ?></span></a></li>-->
                                                                        <li class="active"><a  id="profile_tab_8" role="tab" href="receipts.php?set=<?php echo $dept_id; ?>" aria-expanded="false"><span><?php echo $dept_cd; ?></span></a></li>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                        <li role="" class=""><a  data-toggle="" id="photos_tab_8" role="tab" href="receipts.php?set=<?php echo $dept_id; ?>" aria-expanded="false"><span><?php echo $dept_cd; ?></span></a></li>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                                  
                                                <!--
                                                <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>All</span></a></li>
                                                <li role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Smart<span class="inline-block"></span></span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>Tassia 1</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>Masosio</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Joy</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Pendo</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Genesis</span></a></li>
                                                -->
                                                
                                                <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span>January 1, 2020 - January 28, 2020</span> 
                                                    <b class="caret"></b>
                                                </div>
                                                
                                                
                                                
                                            </ul>
                                            
                                                    <div class="tab-content" id="myTabContent_8">

                                                        <!-- TAB 1 -->
                                                        <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                                                            <div class="col-md-12">
                                                                <div class="pt-20">
                                                                    
                                                                    <div class="table-wrap">
                                                                        
                                                                    <?php

                                                                        if($set == "all")
                                                                        {
                                                                            ?>
                                                                                   <a href="#addrecp" data-toggle="modal" class="pull-left btn btn-success btn-xs mr-15" style="position: absolute; left: 730px; top: -10px; z-index: 5;">Add Receipt</a>
                                                                             <?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                                   <a href="#addrecp" data-toggle="modal" class="pull-left btn btn-success btn-xs mr-15" style="position: absolute; left: 730px; top: -10px; z-index: 5;">Add Receipt</a>
                                                                             <?php
                                                                        }

                                                                   ?>

                                                                    <div class="table-responsive">

                                                                        <table id="exampleX"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="false" data-search="true" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                            <thead>
                                                                                <tr>
                                                                                    
                                                                                                                                                                        
                                                                                    <?php
                                                                                    
                                                                                    //echo "Code in Session: ".$_SESSION['stoper']."<br>\n<br>\n";
                                                                                    $_SESSION['stoper'] = "";

                                                                                    if($pimind == "Real Estate")
                                                                                    {
                                                                                        if($set == "all")
                                                                                        {
                                                                                            ?>
                                                                                                   <th>House No</th>
                                                                                                   <th>House Type</th>
                                                                                                   <th>Apartment</th>
                                                                                                   <th>Rent</th>
                                                                                                   <th>Amount Paid</th>
                                                                                                   <th>Balance</th>
                                                                                                   <th>Method</th>
                                                                                                   <th>Reference No.</th>
                                                                                                   <th>Date Paid</th>
                                                                                             <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            
                                                                                        }
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        if($set == "all")
                                                                                        {
                                                                                            ?>
                                                                                                    <th>#</th>
                                                                                                    <th>Full Name</th> 
                                                                                                    <th>Department</th>
                                                                                                    <!--th>Description</th-->
                                                                                                    <th>Trx. Code</th>
                                                                                                    <th>Amount</th>
                                                                                                    <th>Balance</th>
                                                                                                    <th>Method</th>
                                                                                                    <th>Fee</th>
                                                                                                    <th>Reference No.</th>
                                                                                                    <th>Trx. Date</th>
                                                                                                    <th>Recp. Date</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Action</th>
                                                                                             <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            ?>
                                                                                                    <th>#</th>
                                                                                                    <th>Full Name</th> 
                                                                                                    <th>Department</th>
                                                                                                    <!--th>Description</th-->
                                                                                                    <th>Trx. Code</th>
                                                                                                    <th>Amount</th>
                                                                                                    <th>Balance</th>
                                                                                                    <th>Method</th>
                                                                                                    <th>Fee</th>
                                                                                                    <th>Reference No.</th>
                                                                                                    <th>Trx. Date</th>
                                                                                                    <th>Recp. Date</th>
                                                                                                    <th>Status</th>
                                                                                                    <th>Action</th>
                                                                                             <?php
                                                                                        }
                                                                                    }
                                                                                        
                                                                                        
                                                                                    ?>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <?php
                                                                                    if($set == "all")
                                                                                    {
                                                                                        ?>
                                                                                               <th>#</th>
                                                                                               <th>Full Name</th> 
                                                                                               <th>Department</th>
                                                                                               <!--th>Description</th-->
                                                                                               <th>Trx. Code</th>
                                                                                               <th>Amount</th>
                                                                                               <th>Balance</th>
                                                                                               <th>Method</th>
                                                                                               <th>Fee</th>
                                                                                               <th>Reference No.</th>
                                                                                               <th>Trx. Date</th>
                                                                                               <th>Recp. Date</th>
                                                                                               <th>Status</th>
                                                                                               <th>Action</th>
                                                                                         <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        ?>
                                                                                               <th>#</th>
                                                                                               <th>Full Name</th> 
                                                                                               <th>Department</th>
                                                                                               <!--th>Description</th-->
                                                                                               <th>Trx. Code</th>
                                                                                               <th>Amount</th>
                                                                                               <th>Balance</th>
                                                                                               <th>Method</th>
                                                                                               <th>Fee</th>
                                                                                               <th>Reference No.</th>
                                                                                               <th>Trx. Date</th>
                                                                                               <th>Recp. Date</th>
                                                                                               <th>Status</th>
                                                                                               <th>Action</th>
                                                                                         <?php
                                                                                    }
                                                                                    ?>
                                                                                </tr>
                                                                            </tfoot>

                                                                            <?php
                                                                            include('conn.php');

                                                                            //echo "Level: ".$level."<br>";
                                                                            //echo "Role: ".$role."<br>";
                                                                            
                                                                            if($pimind == "Real Estate")
                                                                            {
                                                                                
                                                                            }
                                                                            else
                                                                            {
                                                                                
                                                                            }
                                                                            
                                                                            if($set == "all")
                                                                            {
                                                                                //$statement = "`transactions` WHERE `category_id` = '1' AND `organisation_id` = '$orgid' ORDER BY `id` DESC";
                                                                                $statement = "`transactions` WHERE `code` IN (SELECT DISTINCT `code` FROM `transactions` GROUP BY `code`)  AND `device_id` = '$agent_id'  ORDER BY `transactions`.`id` DESC";
                                                                                $sqlq = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}"; //echo "<br><br><br>SQL: ".$sql;
                                                                                  
                                                                                $ishara = array();  
                                                                                
                                                                                  
                                                                                $i = 0;
                                                                                $query = mysqli_query($conn, $sqlq);
                                                                                while ($row = mysqli_fetch_array($query)) 
                                                                                {                            
                                                                                    $user_id = $row['user_id'];
                                                                                    $dept_id = $row['department_id'];
                                                                                    $code = $row['code'];
                                                                                    $id_agent = $row['device_id'];
                                                                                    
                                                                                    //$dept_id = $row['department'];
                                                                                    $amount = $row['amount'];
                                                                                    
                                                                                    $sql = "SELECT * FROM `departments` WHERE `id` = '$dept_id'";
                                                                                    $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql."<br>";

                                                                                    $usid = $rowHse['user_id'];    //1
                                                                                    $aprtnm = $rowHse['make'];     //Smart
                                                                                    $hseno = $rowHse['name'];      //001
                                                                                    $type = $rowHse['type'];       //3 bedroom balcony
                                                                                    $val = $rowHse['value'];       //
                                                                                    $due = $rowHse['value_let'];   //15000.00


                                                                                    $sql = "SELECT * FROM `userdetails` WHERE `id` = '$user_id'";
                                                                                    $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql));
                                                                                    
                                                                                    //echo $i." code 1: ".$code."<br>\n";
                                                                                    $stoper = $_SESSION['stoper'];
                                                                                    
                                                                                    if($stoper == $code) //$stoper != "" || $stoper == $code
                                                                                    {                                                                                        
                                                                                        $i++;
                                                                                        continue;
                                                                                    }
                                                                                    //echo ">>Code: ".$code."<br>\n";
                                                                                    $_SESSION['stoper'] = $code;
                                                                                    
                                                                                    ?>
                                                                                    <tr> 
                                                                                        <!--<td><?php echo $row["id"]; ?></td>-->
                                                                                        <td><?php echo $i+1; ?></td> 
                                                                                        <td><?php echo $row["user_nm"]; ?></td>
                                                                                        <td><?php echo $row["department"]; //$hseno?></td>
                                                                                        <!--<td><?php echo $row["description"]; ?></td>-->
                                                                                        <td><?php echo $code; ?></td> 
                                                                                        
                                                                                        <?php
                                                                                                                                                                                
                                                                                            $sqlv = "SELECT * FROM `transactions` WHERE `code` = '$code' AND `device_id` = '$id_agent' ";
                                                                                            $queryv = mysqli_query($conn, $sqlv);

                                                                                            $total = 0;

                                                                                            $i = 0;
                                                                                            while ($rowv = mysqli_fetch_array($queryv)) 
                                                                                            {                            
                                                                                                //$user_id = $rowv['user_id'];
                                                                                                //$itemname = $rowv['item_name'];
                                                                                                $garama = $rowv['amount'];
                                                                                                //$mfafanuo= $rowv['description'];

                                                                                                $total += str_replace(',', '', $garama);

                                                                                                ?>
                                                                                                        
                                                                                                <?php

                                                                                                $i++;
                                                                                            }
                                                                                        
                                                                                        ?>
                                                                                        <td><?php echo "Ksh. ".number_format($total); ?></td>
                                                                                        <td><?php echo $row["refund"]; ?></td>
                                                                                        <td><?php echo $row["method"]; ?></td>
                                                                                        <td><?php echo $row["cost"]; ?></td>
                                                                                        
                                                                                        <td><?php echo $row["reference_no"]; ?></td>
                                                                                        
                                                                                        <?php
                                                                                                $epoc = explode(" ", $row["added_on"]);
                                                                                                $date = $epoc[0]; //2020-05-19
                                                                                                $time = $epoc[1];
                                                                                                
                                                                                                $epoc2 = explode(" ", $row["due_on"]);
                                                                                                $date2 = $epoc2[0]; //07/01/2020 2:48 PM
                                                                                                $time2 = $epoc2[1];
                                                                                        ?>
                                                                                        
                                                                                        <td><?php echo $date2; ?></td>
                                                                                        <td><?php echo $row["added_on"]; ?></td>

                                                                                        <?php 
                                                                                        if($row["status"] == "not paid")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-danger">unpaid</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "partial")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-warning">partial</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "paid")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-success">paid</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "advance")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-primary">advance</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-success"><?php echo $row["status"]; ?></span></td> 
                                                                                          <?php    
                                                                                        }
                                                                                        ?>


                                                                                        <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
                                                                                        <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

                                                                                        <td>
                                                                                            <a href="#editrcp<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                            <a href="#delrcp<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>

                                                                                            <a href="#pntrecp<?php echo $row['id']; ?>" alt="default" data-toggle="modal" class="pr-10 edit_data" data-toggle="tooltip" title="delete">
                                                                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                                                            </a>
                                                                                            
                                                                                            <a href="#sendsmsg<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="message" ><i class="fa fa-envelope txt-warning"></i></a>
                                                                                            
                                                                                            <!--<input type="button" value="print" name="print" onclick="PrintPage();"/>-->
                                                                                        </td> 
                                                                                        <?php include('button_receipts.php'); ?>

                                                                                        <!--td>
                                                                                            <a name="edit" value="Edit" href="#edit<?php echo $row['id']; ?>" class="pr-10 edit_data" data-toggle="tooltip" title="edit" >
                                                                                                    <i class="fa fa-pencil"></i>
                                                                                            </a>
                                                                                            <a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="view" data-toggle="tooltip">
                                                                                                    <i class="fa  fa-eye"></i>
                                                                                            </a>
                                                                                            &nbsp;&nbsp;
                                                                                            <a  name="view" value="view" href="#del<?php echo $row['id']; ?>" class="text-inverse view_data" title="send SMS" data-toggle="tooltip">
                                                                                                    <i class="fa  fa-envelope"></i>
                                                                                            </a>
                                                                                        </td-->
                                                                                    </tr>
                                                                                    <?php
                                                                                    
                                                                                    $i++;
                                                                                }
                                                                                $_SESSION['count'] = $i;
                                                                                $_SESSION['limit'] = $limit;
                                                                            }
                                                                            else //`department_id` = '$set'
                                                                            {
                                                                                $statement = "`transactions` WHERE `organisation_id` = '$orgid' AND `department_id` = '$set' ORDER BY `id` DESC";
                                                                                $sql = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}"; //echo "<br><br><br>SQL: ".$sql;
                                                                                     
                                                                                $query = mysqli_query($conn, $sql);
                                                                                while ($row = mysqli_fetch_array($query)) 
                                                                                {                            
                                                                                    $user_id = $row['user_id'];
                                                                                    $dept_id = $row['department_id'];
                                                                                    $code = $row['code'];
                                                                                    //$dept_id = $row['department'];
                                                                                    $amount = $row['amount'];

                                                                                    $sql = "SELECT * FROM `departments` WHERE `id` = '$dept_id'";
                                                                                    $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql."<br>";

                                                                                    $usid = $rowHse['user_id'];    //1
                                                                                    $aprtnm = $rowHse['make'];     //Smart
                                                                                    $hseno = $rowHse['name'];      //001
                                                                                    $type = $rowHse['type'];       //3 bedroom balcony
                                                                                    $val = $rowHse['value'];       //
                                                                                    $due = $rowHse['value_let'];   //15000.00


                                                                                    $sql = "SELECT * FROM `userdetails` WHERE `id` = '$user_id'";
                                                                                    $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql));

                                                                                    ?> 
                                                                                    <tr> 
                                                                                        <td><?php echo $row["id"]; ?></td> 
                                                                                        <td><?php echo $row["user_nm"]; ?></td>
                                                                                        <td><?php echo $row["item_name"]; //$hseno?></td>
                                                                                        <td><?php echo $row["description"]; ?></td>
                                                                                        <td><?php echo $code; ?></td> 
                                                                                        <td><?php echo $amount; ?></td>
                                                                                        <td><?php echo $row["refund"]; ?></td>
                                                                                        <?php 
                                                                                        if($row["status"] == "partial")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><?php echo str_replace("-", "", $row["balance"]); ?></td>  
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "paid")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><?php echo $row["balance"]; ?></td>  
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "advance")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><?php echo "-".$row["balance"]; ?></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><?php echo $row["balance"]; ?></td> 
                                                                                          <?php    
                                                                                        }
                                                                                        ?> 
                                                                                        <td><?php echo $row["method"]; ?></td>
                                                                                        <td><?php echo $row["reference_no"]; ?></td>
                                                                                        
                                                                                        <?php
                                                                                                $epoc = explode(" ", $row["datetime"]);
                                                                                                $date = $epoc[0]; //2020-05-19
                                                                                                $time = $epoc[1];
                                                                                        ?>
                                                                                        
                                                                                        <td><?php echo $date; //added_on ?></td>

                                                                                        <?php 
                                                                                        if($row["status"] == "not paid")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-danger">unpaid</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "partial")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-warning">partial</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "paid")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-success">paid</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "advance")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-primary">advance</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-advance"></span></td> 
                                                                                          <?php    
                                                                                        }
                                                                                        ?>


                                                                                        <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
                                                                                        <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

                                                                                        <td>
                                                                                            <a href="#editrcp<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                            <a href="#delrcp<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>

                                                                                            <a href="#pntrecp<?php echo $row['id']; ?>" alt="default" data-toggle="modal" class="pr-10 edit_data" data-toggle="tooltip" title="delete">
                                                                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                                                            </a>
                                                                                            &nbsp;
                                                                                            <a href="#sendsmsg<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="message" ><i class="fa fa-envelope txt-warning"></i></a>
                                                                                            
                                                                                            <input type="button" value="print" name="print" onclick="PrintPage();"/>
                                                                                        </td> 
                                                                                        <?php include('button_receipts.php'); ?>

                                                                                        <!--td>
                                                                                            <a name="edit" value="Edit" href="#edit<?php echo $row['id']; ?>" class="pr-10 edit_data" data-toggle="tooltip" title="edit" >
                                                                                                    <i class="fa fa-pencil"></i>
                                                                                            </a>
                                                                                            <a  name="view" value="view" id="<?php echo $row["id"]; ?>" class="text-inverse view_data" title="view" data-toggle="tooltip">
                                                                                                    <i class="fa  fa-eye"></i>
                                                                                            </a>
                                                                                            &nbsp;&nbsp;
                                                                                            <a  name="view" value="view" href="#del<?php echo $row['id']; ?>" class="text-inverse view_data" title="send SMS" data-toggle="tooltip">
                                                                                                    <i class="fa  fa-envelope"></i>
                                                                                            </a>
                                                                                        </td-->
                                                                                    </tr>
                                                                                    
                                                                                    <?php ?>
                                                                                    
                                                                                    <script>
                                                                                        //http://aslanbakan.com/en/blog/print-window-dimensions-with-browser-variables-for-responsive-tests/
                                                                                        //w3schools
                                                                                        //https://parzibyte.me/blog/en/2019/10/10/print-receipt-thermal-printer-javascript-css-html/
                                                                                        function PrintPage() 
                                                                                        {
                                                                                            //Popup(window.print());
                                                                                            Popup(window.print());
                                                                                        }
                                                                                        
                                                                                        //function Popup(data) 
                                                                                        function Popup(data) 
                                                                                        {
                                                                                        var myWindow = window.open('', 'Receipt', 'height=40,width=60');
                                                                                        myWindow.document.write('<html><head><title>Receipt</title>');
                                                                                        myWindow.resizeTo(250, 250);
                                                                                        /*optional stylesheet*/ //myWindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
                                                                                        myWindow.document.write('<style type="text/css"> *, html {margin:0;padding:0;} </style>');
                                                                                        myWindow.document.write('</head><body>');
                                                                                        myWindow.document.write(data);
                                                                                        myWindow.document.write('</body></html>');
                                                                                        myWindow.document.close(); // necessary for IE >= 10

                                                                                        myWindow.onload=function(){ // necessary if the div contain images

                                                                                            myWindow.focus(); // necessary for IE >= 10
                                                                                            myWindow.print();
                                                                                            myWindow.close();
                                                                                        };
                                                                                    }
                                                                                    </script>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            
                                                                            ?> 



                                                                        </table>

                                                                    </div>

                                                                    </div>
                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/TAB 1 -->                                               

                                                    </div>
                                        
                                        </div>

                                    </div>
                                    
                                </div>    
                                    
                            </div>
                        </div>
                    </div>
                    <?php //include ('modal-requisition.php'); ?>
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
        
        
<!--        
        <script>
            (function($, undefined) {

            "use strict";

            // When ready.
            $(function() {

                var $form = $( "#form" );
                var $input = $form.find( "input" );

                $input.on( "keyup", function( event ) 
                {


                    // When user select text in the document, also abort.
                    var selection = window.getSelection().toString();
                    if ( selection !== '' ) {
                        return;
                    }

                    // When the arrow keys are pressed, abort.
                    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                        return;
                    }


                    var $this = $( this );

                    // Get the value.
                    var input = $this.val();

                    var input = input.replace(/[\D\s\._\-]+/g, "");
                            input = input ? parseInt( input, 10 ) : 0;

                            $this.val( function() {
                                return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                            } );
                } );

                /**
                 * ==================================
                 * When Form Submitted
                 * ==================================
                 */
                $form.on( "submit", function( event ) {

                    var $this = $( this );
                    var arr = $this.serializeArray();

                    for (var i = 0; i < arr.length; i++) {
                            arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
                    };

                    console.log( arr );

                    event.preventDefault();
                });

            });
        })(jQuery);
        </script>
        -->
        
        <!--
        https://stackoverflow.com/questions/18534647/regular-expression-for-currency-no-dollar-sign-has-comma-has-decimal-optiona
        https://regex101.com/r/gB7rO6/1
        https://regexlib.com/Search.aspx?k=currency&c=-1&m=-1&ps=100
        
        https://webdesign.tutsplus.com/tutorials/html5-form-validation-with-the-pattern-attribute--cms-25145
        
        
        -->
        
        
        <script>
        $("input[data-type='currency']").on
        ({
            keyup: function() 
            {
              formatCurrency($(this));
            },
            blur: function() 
            { 
              formatCurrency($(this), "blur");
            }
        });


        function formatNumber(n) 
        {
          // format number 1000000 to 1,234,567
          return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }


        function formatCurrency(input, blur) 
        {
          // appends $ to value, validates decimal side
          // and puts cursor back in right position.

          // get input value
          var input_val = input.val();

          // don't validate empty input
          if (input_val === "") { return; }

          // original length
          var original_len = input_val.length;

          // initial caret position 
          var caret_pos = input.prop("selectionStart");

          // check for decimal
          if (input_val.indexOf(".") >= 0) {

            // get position of first decimal
            // this prevents multiple decimals from
            // being entered
            var decimal_pos = input_val.indexOf(".");

            // split number by decimal point
            var left_side = input_val.substring(0, decimal_pos);
            var right_side = input_val.substring(decimal_pos);

            // add commas to left side of number
            left_side = formatNumber(left_side);

            // validate right side
            right_side = formatNumber(right_side);

            // On blur make sure 2 numbers after decimal
            if (blur === "blur") 
            {
              right_side += "00";
            }

            // Limit decimal to only 2 digits
            right_side = right_side.substring(0, 2);

            // join number by .
            //input_val = "$" + left_side + "." + right_side;
            input_val = "" + left_side + "." + right_side;

          } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            //input_val = "$" + input_val;
            input_val = "" + input_val;

            // final formatting
            if (blur === "blur") {
              input_val += ".00";
            }
          }

          // send updated string to input
          input.val(input_val);

          // put caret back in the right position
          var updated_len = input_val.length;
          caret_pos = updated_len - original_len + caret_pos;
          input[0].setSelectionRange(caret_pos, caret_pos);
        }
        </script>

    </div>
    <!-- /#wrapper -->
    <?php
    include_once 'footer.php';
    ?>