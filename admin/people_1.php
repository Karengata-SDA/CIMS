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
    if($set == "")
    {
        $set = "all";
    }
    
    $ind = "real";
    //$set = "real";
    
    
?>

<?php include './header.php'; ?>



    <body>
        
        <?php
        if($rst == "1")
        {
         ?>
         <script>
            setTimeout(function() 
            {
                swal({
                    title: "Awesome <?php echo $erieta; ?>",
                    text: "<?php echo 'Edit Successful!'; ?>",
                    type: "success",
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
                        
                        <div class="col-lg-9 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div  class="panel-body pb-0">
                                        <div  class="tab-struct custom-tab-1">
                                            <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                               
                                                <?php
                                    
                                                $orgid = $_SESSION['orgID'];

                                                $sql2 = "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment' AND `organisation_id` = '$orgid'";
                                                $query2 = mysqli_query($conn, $sql2); // AND `name` != 'Apartment'
                                                
                                                while ($row2 = mysqli_fetch_array($query2)) 
                                                {
                                                    //$nyumbaid = $row["address"];

                                                    $mali_id = $row2["id"];
                                                    $mali_nm = $row2["name"];

                                                    //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                    //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                    //$aprtnm = $rowHse['name'];

                                                    if ($mali_nm != $aprtnm) 
                                                    {
                                                        ?>
                                                                <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#<?php echo $mali_nm; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                                <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#<?php echo $mali_nm; ?>" aria-expanded="false"><span><?php echo $mali_nm; ?></span></a></li>
                                                        <?php
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
                                                
                                                <a href="#addnew" data-toggle="modal" class="pull-left btn btn-success btn-xs mr-15" style="position: absolute; left: 630px; top:100px; z-index: 10;">Add New</a>
                                             
                                                <?php
                                    
                                                $orgid = $_SESSION['orgID'];

                                                $sql2 = "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment' AND `organisation_id` = '$orgid'";
                                                $query2 = mysqli_query($conn, $sql2); // AND `name` != 'Apartment'
                                                
                                                //echo 'SQL2: '.$sql2."<br>";
                                                
                                                while ($row2 = mysqli_fetch_array($query2)) 
                                                {
                                                    //$nyumbaid = $row["address"];

                                                    $mali_id = $row2["id"];
                                                    $mali_nm = $row2["name"];
                                                    
                                                    //echo "Aptm: ".$mali_nm."<br>";

                                                    //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                    //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                    //$aprtnm = $rowHse['name'];

                                                    ?>
                                                                <!-- TAB 1 -->
                                                                <div  id="<?php echo $mali_nm; ?>" class="tab-pane fade active in" role="tabpanel">
                                                                    <div class="col-md-12">
                                                                        <div class="pt-20">
                                                                            <div class="table-wrap">

                                                                                <div class="table-responsive">

                                                                                    <table id="example"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-side-pagination="server" sidePagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                                        <?php 

                                                                                        $orgnm = $_SESSION['orgNM'];
                                                                                        $orgid = $_SESSION['orgID'];

                                                                                        $orgcd = $_SESSION['orgCD'];

                                                                                        $pimind = $_SESSION['pimind'];
                                                                                        $secind = $_SESSION['secind'];
                                                                                        $terind = $_SESSION['terind']; 

                                                                                        //echo "Org Code: ".$orgcd;                               
                                                                                        $department = $_SESSION['department'];

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
                                                                                                <th>#</th>
                                                                                                <th>First Name</th>
                                                                                                <th>Middle Name</th>
                                                                                                <th>Last Name</th>
                                                                                                <th>Gender</th>
                                                                                                <th>Id Number</th>
                                                                                                <th>Phone</th>
                                                                                                <th>Apartment</th>
                                                                                                <th>House No.</th>
                                                                                                <th>Status</th>
                                                                                                <th>Actions</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>First Name</th>
                                                                                                <th>Middle Name</th>
                                                                                                <th>Last Name</th>
                                                                                                <th>Gender</th>
                                                                                                <th>Id Number</th>
                                                                                                <th>Phone</th>
                                                                                                <th>Apartment</th>
                                                                                                <th>House No.</th>
                                                                                                <th>Status</th>
                                                                                                <th>Actions</th>
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
                                                                                        <!--div align="left" style="position: absolute; left: 0px; top: 275px;"-->
                                                                                        <?php
                                                                                        //include('conn.php');
                                                                                        //require_once('conn.php');

                                                                                        //$query = mysqli_query($conn, "SELECT * FROM `people`");
                                                                                        //$query = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
                                                                                        $statement3 = "`people` WHERE `organisation_id` = '$orgid'"; // AND `residence` = '$mali_id'
                                                                                        $sql3 = "SELECT * FROM {$statement3} LIMIT {$startpoint} , {$limit}";
                                                                                        $query3 = mysqli_query($conn, $sql3);

                                                                                        //echo "SQL 3: ".$sql3."<br>";

                                                                                        while ($row3 = mysqli_fetch_array($query3)) 
                                                                                        {
                                                                                            $nyumbaid = $row3["address"];
                                                                                            $jengoid = $row3["residence"];

                                                                                            $sql4 = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'"; //`name` = '$nyumbaid' AND 
                                                                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql4)); 

                                                                                            //echo 'HERE: '.$sql."<br>";

                                                                                            $aprtnm = $rowHse['make'];
                                                                                            $hseno = $rowHse['name'];

                                                                                            ?> 
                                                                                            <tr> 
                                                                                                <td><?php echo $row3["id"]; ?></td> 
                                                                                                <td><?php echo $row3["firstname"]; ?></td>
                                                                                                <td><?php echo $row3["middlename"]; ?></td>
                                                                                                <td><?php echo $row3["lastname"]; ?></td>
                                                                                                <td><?php echo $row3["gender"]; ?></td>
                                                                                                <td><?php echo $row3["idno"]; ?></td>
                                                                                                <td><?php echo $row3["phone"]; ?></td> 
                                                                                                <td><?php echo $aprtnm; ?></td> 
                                                                                                <td><?php echo $hseno; ?></td> 
                                                                                                <td><?php echo $row3["status"]; ?></td>

                                                                                                <td>
                                                                                                <a href="#edit<?php echo $row3['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                                <a href="#del<?php echo $row3['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>

                                                                                                <a href="#myModalvieww" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>

                                                                                                    <?php include('button.php'); ?>
                                                                                                    <?php include('modal-view.php'); ?>
                                                                                                </td>

                                                                                            </tr>  
                                                                                            <?php
                                                                                        }
                                                                                        ?> 

                                                                                    </table>
                                                                                   <?php

                                                                                        echo pagination($statement, $limit, $page);

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
                                                    <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
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
        <!-- /#wrapper -->

<?php include './footer.php'; ?>