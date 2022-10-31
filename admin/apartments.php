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
                        
                        <!--div class="col-lg-9 col-xs-12"-->
                        <div class="col-lg-12 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div  class="panel-body pb-0">
                                        <div  class="tab-struct custom-tab-1">
                                            <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                                <?php 
                                                        if($set == "all")
                                                        {
                                                            ?>
                                                <li class="active"><a  id="profile_tab_8" role="tab" href="apartments.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                <li><a  id="profile_tab_8" role="tab" href="apartments.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                            <?php
                                                        }
                                                ?>
                                                                                                
                                                
                                                <?php
                                                        $query2 = mysqli_query($conn, "SELECT * FROM `property` WHERE `category_id` = '1' AND `organisation_id` = '$orgid' AND `make` = 'Apartment'"); // AND `name` != 'Apartment'
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
                                                <li class="active"><a id="settings_tab_8" role="tab" href="apartments.php?set=<?php echo $mali_id; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                             <?php
                                                            }
                                                            else
                                                            {
                                                             ?>
                                                <li><a id="settings_tab_8" role="tab" href="apartments.php?set=<?php echo $mali_id; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                             <?php
                                                            }
                                                        }
                                                ?>
                                                
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
                                                                                <a href="#addaptm" data-toggle="modal" class="pull-left btn btn-success btn-xs mr-15" style="position: absolute; left: 730px; top: -11px; z-index: 5;">Add Apartment</a>
                                                                          <?php
                                                                     }
                                                                     else
                                                                     {
                                                                         ?>
                                                                                <a href="#addhuse" data-toggle="modal" class="pull-left btn btn-success btn-xs mr-15" style="position: absolute; left: 730px; top: -11px; z-index: 5;">Add House</a>
                                                                          <?php
                                                                     }
                                                                
                                                                ?>

                                                                <div class="table-responsive">
                                                                    

                                                                    <table id="exampleX"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-side-pagination="server" sidePagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                        <?php 
                                                                    
                                                                        //echo 'Dept: '.$department.' Indi: '.$pimind;
                                                                         
                                                                         if($pimind == "Transport")
                                                                         { $ind = "tns";
                                                                          ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th >Mem#</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th>Entry Mode</th>
                                                                                <th>Status</th>
                                                                                <th>Action </th>


                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>Member No.</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th>Entry Mode</th>
                                                                                <th>Status</th>
                                                                                <th>Action </th>


                                                                            </tr>
                                                                        </tfoot>
                                                                          <?php
                                                                         }
                                                                         else if($pimind == "Real Estate")
                                                                         {
                                                                          $ind = "real";
                                                                          ?>
                                                                        <thead>
                                                                            
                                                                            <tr>
                                                                                <?php
                                                                                if($set == "all")
                                                                                {
                                                                                    ?>
                                                                                <!--th>#</th-->
                                                                                <th>Apartment</th>
                                                                                <th>Floors</th>
                                                                                <th>Location</th>
                                                                                <th>Caretaker</th>
                                                                                <th>Status</th>
                                                                                <th>Actions</th>
                                                                                    <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                <!--<th>Trx.#</th>-->
                                                                                <th>House No</th>
                                                                                <th>House Type</th>
                                                                                <!--<th>Apartment</th>-->
                                                                                <th>Rent Due</th>
                                                                                <th>Tenant's Name</th>
                                                                                <th>Last Amount Paid</th>
                                                                                <th>Balance</th>
                                                                                <th>Arrears</th>
                                                                                <th>Deposit</th>
                                                                                <th>Electricity</th>
                                                                                <th>Water</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                                    <?php
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
                                                                                <!--th>#</th-->
                                                                                <th>Apartment</th>
                                                                                <th>Floors</th>
                                                                                <th>Location</th>
                                                                                <th>Caretaker</th>
                                                                                <th>Status</th>
                                                                                <th>Actions</th>
                                                                                    <?php
                                                                                }
                                                                                else
                                                                                {
                                                                                    ?>
                                                                                <!--<th>Trx.#</th>-->
                                                                                <th>House No</th>
                                                                                <th>House Type</th>
                                                                                <!--<th>Apartment</th>-->
                                                                                <th>Rent Due</th>
                                                                                <th>Tenant's Name</th>
                                                                                <th>Last Amount Paid</th>
                                                                                <th>Balance</th>
                                                                                <th>Arrears</th>
                                                                                <th>Deposit</th>
                                                                                <th>Electricity</th>
                                                                                <th>Water</th>
                                                                                <th>Status</th>
                                                                                <th>Action</th>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </tr>
                                                                        </tfoot>
                                                                          <?php
                                                                         }
                                                                         else
                                                                         {
                                                                          ?>
                                                                            <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th >Mem#</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th>Entry Mode</th>
                                                                                <th>Status</th>
                                                                                <th>Action </th>


                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>Member No.</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th>Entry Mode</th>
                                                                                <th>Status</th>
                                                                                <th>Action </th>


                                                                            </tr>
                                                                        </tfoot>
                                                                          <?php
                                                                         }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                        if($set == "all")
                                                                        {
                                                                             $statement = "`property` WHERE `category_id` = '1' AND `organisation_id` = '$orgid' AND `make` = 'Apartment'";
                                                                             $sql = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
                                                                             
                                                                                $query = mysqli_query($conn, $sql); //echo "<br><br><br>SQL: ".$sql;

                                                                                while ($row = mysqli_fetch_array($query)) 
                                                                                {      
                                                                                    if ($set == "all")
                                                                                    {
                                                                                            //$sql = "SELECT * FROM `property` WHERE `id` = '$set'";
                                                                                            $sql = "SELECT * FROM `property` WHERE `category_id` = '1' AND `organisation_id` = '$orgid' AND `make` = 'Apartment'";
                                                                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));
                                                                                            $user_id = $row["agent_id"];
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                            $sql = "SELECT * FROM `property` WHERE `id` = '$set'";
                                                                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));
                                                                                            $user_id = $row["user_id"];   
                                                                                    }

                                                                                    $sql2 = "SELECT * FROM `people` WHERE `id` = '$user_id'";
                                                                                    $rowUser = mysqli_fetch_array(mysqli_query($conn, $sql2)); 

                                                                                    $usernm = $rowUser['firstname']." ".$rowUser['lastname'];


                                                                                    ?> 
                                                                                    <tr> 
                                                                                        <!--td><?php //echo $row["id"]; ?></td-->
                                                                                        <td><?php echo $row["name"]; ?></td>
                                                                                        <?php
                                                                                        if ($set == "all")
                                                                                        {
                                                                                            ?>
                                                                                        <td><?php echo $row["size"]; ?></td>
                                                                                            <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            ?>
                                                                                        <td><?php echo $row["make"]; ?></td>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                        <td><?php echo $row["location_id"]; ?></td>

                                                                                        <td><?php echo $usernm; ?></td>
                                                                                        <?php 
                                                                                        if($row["status"] == "0")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-danger">not ready</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "1")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-warning">almost</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "2")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-success">ready</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else if($row["status"] == "3")
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-info">vacancies</span></td> 
                                                                                          <?php
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                          ?>    
                                                                                                    <td><span class="label label-primary">full</span></td> 
                                                                                          <?php    
                                                                                        }
                                                                                        ?>


                                                                                        <td>
                                                                                        

                                                                                        <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>
                                                                                        
                                                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                                                        
                                                                                        <a href="#myModalvieww" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>

                                                                                            <?php include('button_apartment.php'); ?>
                                                                                            <?php include('modal-view.php'); ?>
                                                                                        </td>

                                                                                    </tr>  
                                                                                    <?php
                                                                                }
                                                                        }
                                                                        else
                                                                        {
                                                                            $statement = "`property` WHERE `organisation_id` = '$orgid' AND `category_id` = '1' AND `sub_category_id` = '$set' ORDER BY `name` ASC";
                                                                            $sql = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
                                                                            
                                                                            //echo "<br><br>SQL: ".$sql;

                                                                            $query = mysqli_query($conn, $sql); //"SELECT * FROM `pesa`"
                                                                            $i = 0;
                                                                            while ($row = mysqli_fetch_array($query)) 
                                                                            {
                                                                                $usid = $row['user_id'];
                                                                                $sqlPer = "SELECT * FROM `people` WHERE `id` = '$usid'"; //echo "<br><br>sqlPer: ".$sqlPer."<br>";
                                                                                $rowPer = mysqli_fetch_array(mysqli_query($conn, $sqlPer));
                                                                                
                                                                                /*
                                                                                    $item_id = $row['item_id'];

                                                                                    $sql = "SELECT * FROM `property` WHERE `id` = '$item_id'";
                                                                                    $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql."<br>";

                                                                                    $usid = $rowHse['user_id'];    //1
                                                                                    $aprtnm = $rowHse['make'];     //Smart
                                                                                    $hseno = $rowHse['name'];      //001
                                                                                    $type = $rowHse['type'];       //3 bedroom balcony
                                                                                    $val = $rowHse['value'];       //revenue
                                                                                    $due = $rowHse['value_let'];   //15000.00
                                                                                */
                                                                                
                                                                                $hseno = $row['name'];
                                                                                $hseid = $row['id'];
                                                                                
                                                                                $sql = "SELECT * FROM `pesa` WHERE `item_id` = '$hseid' AND `user_id` = '$usid' ORDER BY `id` DESC";
                                                                                $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql)); //echo "<br><br>SQL: ".$sql;
                                                                                //$usid = $rowPesa['user_id'];
                                                                                
                                                                                $balance = $rowPesa["balance"];
                                                                                if($balance < 0)
                                                                                {
                                                                                    $areas = $balance;
                                                                                    //$areas = str_replace("-", "", $balance);
                                                                                    $balance = "0.00";
                                                                                }
                                                                                else if($balance > 0)
                                                                                {
                                                                                    $areas = "0.00";
                                                                                    
                                                                                }
                                                                                else
                                                                                {
                                                                                    $areas = "0.00";
                                                                                    $balance = "0.00";
                                                                                }
                                                                                
                                                                                if($balance > 0)
                                                                                {
                                                                                    $balance = "-".$balance;
                                                                                }
                                                                                else
                                                                                {
                                                                                    $balance = str_replace("-", "", $balance);
                                                                                }
                                                                                
                                                                                

                                                                                ?> 
                                                                                <tr> 
                                                                                    <!--<td><?php echo $row["id"]; ?></td>--> 
                                                                                    <td><?php echo $row["name"]; //$hseno?></td>
                                                                                    <td><?php echo $row["type"]; ?></td>
                                                                                    <!--<td><?php echo $row["make"]; ?></td>-->
                                                                                    <td><?php echo $row["value_let"]; ?></td>
                                                                                    <td><?php echo $rowPer["firstname"]."  ".$rowPer["lastname"]; ?></td>
                                                                                    
                                                                                    
                                                                                    <td><?php echo $rowPesa["paid"]; ?></td>
                                                                                    <td><?php echo $balance; ?></td> 
                                                                                    <td><?php echo str_replace("-", "", $row["value"]); //$row["value"]; ?></td> 
                                                                                    <td><?php echo $rowPesa["payamt1"]; ?></td>
                                                                                    <td><?php echo $rowPesa["payamt2"]; ?></td>
                                                                                    <td><?php echo $rowPesa["payamt3"]; ?></td>
                                                                                    
                                                                                    
                                                                                    <?php
                                                                                    /*if($value_nw == 0)
                                                                                    {
                                                                                        $status = "paid";
                                                                                    }
                                                                                    else if($value_nw > 0)
                                                                                    {
                                                                                        $status = "advance";
                                                                                    }
                                                                                    else if($value_nw < 0)
                                                                                    {
                                                                                        $status = "partial";
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        $status = "not paid";
                                                                                    }
                                                                                     */
                                                                                    ?>
                                                                                    

                                                                                    <?php 
                                                                                    if($row["status"] == "not paid")
                                                                                    {
                                                                                      ?>    
                                                                                                <td><span class="label label-danger">not paid</span></td> 
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
                                                                                    else if($row["status"] == "reserved")
                                                                                    {
                                                                                      ?>    
                                                                                                <td><span class="label label-primary">reserved</span></td> 
                                                                                      <?php
                                                                                    }
                                                                                    else if($row["status"] == "vacant")
                                                                                    {
                                                                                      ?>    
                                                                                                <td><span class="label label-info">vacant</span></td> 
                                                                                      <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                      ?>    
                                                                                                 <!--<td><span class="label label-info">vacant</span></td>-->
                                                                                                <td><span class="label label-danger">unpaid</span></td> 
                                                                                                
                                                                                      <?php    
                                                                                    }
                                                                                    ?>


                                                                                    <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
                                                                                    <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

                                                                                    <td>
                                                                                        <a href="#editt<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-trash-o txt-danger"></i></a>

                                                                                        <a alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" >
                                                                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                                                        </a>
                                                                                    </td> 
                                                                                    <?php include('button_apartment.php'); ?>

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
                                                                            
                                                                            //echo "Showing: ".$i." instead of ".$limit;
                                                                            $_SESSION['count'] = $i;
                                                                            $_SESSION['limit'] = $limit;
                                                                            
                                                                        }
                                                                        ?>
                                                                                

                                                                    </table>
                                                                    
                                                                   <?php
                                                                        
                                                                        echo pagination($statement, $limit, $page);
                                                                        
                                                                        //echo 'Page Statement: '.$statement." Limit ".$limit." Page ".$page;
                                                                            
                                                                    ?>

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
                    <!-- /Row -->

                    <!-- Row -->

                    <!-- /Row -->

                </div>
                <!-- Footer -->
                <!--footer class="footer container-fluid pl-30 pr-30">
                        <div class="row">
                                <div class="col-sm-12">
                                        <p>2018 &copy; CIMS. Pampered by Hencework</p>
                                </div>
                        </div>
                </footer-->
                <!-- /Footer -->

            </div>
            <!-- /Main Content -->
            <?php include('add_modal.php'); ?>
           
        </div>
            </div>
        <!-- /#wrapper -->

<?php include './footer.php'; ?>