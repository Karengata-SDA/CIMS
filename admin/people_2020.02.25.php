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
                        <div class="col-lg-3 col-xs-12">
                            <div class="panel panel-default card-view  pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body  pa-0">
                                        <div class="profile-box">
                                            <div class="profile-cover-pic">
                                                <div class="fileupload btn btn-default">
                                                    <span class="btn-text">edit</span>
                                                    <input class="upload" type="file">
                                                </div>
                                                <div class="profile-image-overlay"></div>
                                            </div>
                                            <div class="profile-info text-center">
                                                <div class="profile-img-wrap">
                                                    <img class="inline-block mb-10" src="../img/mock1.jpg" alt="user"/>
                                                    <div class="fileupload btn btn-default">
                                                        <span class="btn-text">edit</span>
                                                        <input class="upload" type="file">
                                                    </div>
                                                </div>	
                                                <h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-success">Madalyn Rascon</h5>
                                                <h6 class="block capitalize-font pb-20">Developer Geek</h6>
                                            </div>	
                                            <div class="social-info">
                                                <div class="row">
                                                    <div class="col-xs-4 text-center">
                                                        <span class="counts block head-font"><span class="counter-anim">345</span></span>
                                                        <span class="counts-text block">post</span>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <span class="counts block head-font"><span class="counter-anim">246</span></span>
                                                        <span class="counts-text block">followers</span>
                                                    </div>
                                                    <div class="col-xs-4 text-center">
                                                        <span class="counts block head-font"><span class="counter-anim">898</span></span>
                                                        <span class="counts-text block">tweets</span>
                                                    </div>
                                                </div>
                                                
                                                <button class="btn btn-success btn-block  btn-anim mt-30" data-toggle="modal" href="#addnew">
                                                    <i class="fa fa-pencil"></i>
                                                    <span class="btn-text">Add User </span>
                                                </button>

                                                <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Row -->
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="">
                                                                            <div class="panel-wrapper collapse in">
                                                                                <div class="panel-body pa-0">
                                                                                    <div class="col-sm-12 col-xs-12">
                                                                                        <div class="form-wrap">
                                                                                            <form action="#">
                                                                                                <div class="form-body overflow-hide">
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10" for="exampleInputuname_1">Name</label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                                            <input type="text" class="form-control" id="exampleInputuname_1" placeholder="willard bryant">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                                            <input type="email" class="form-control" id="exampleInputEmail_1" placeholder="xyz@gmail.com">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10" for="exampleInputContact_1">Contact number</label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                                            <input type="email" class="form-control" id="exampleInputContact_1" placeholder="+102 9388333">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10" for="exampleInputpwd_1">Password</label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                            <input type="password" class="form-control" id="exampleInputpwd_1" placeholder="Enter pwd" value="password">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10">Gender</label>
                                                                                                        <div>
                                                                                                            <div class="radio">
                                                                                                                <input type="radio" name="radio1" id="radio_1" value="option1" checked="">
                                                                                                                <label for="radio_1">
                                                                                                                    M
                                                                                                                </label>
                                                                                                            </div>
                                                                                                            <div class="radio">
                                                                                                                <input type="radio" name="radio1" id="radio_2" value="option2">
                                                                                                                <label for="radio_2">
                                                                                                                    F
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10">Country</label>
                                                                                                        <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                                            <option value="Category 1">USA</option>
                                                                                                            <option value="Category 2">Austrailia</option>
                                                                                                            <option value="Category 3">India</option>
                                                                                                            <option value="Category 4">UK</option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-actions mt-10">			
                                                                                                    <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                                                </div>				
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button alt="alert" class="img-responsive model_img" id="sa-success">Add</button>
                                                                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Save</button>
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div  class="panel-body pb-0">
                                        <div  class="tab-struct custom-tab-1">
                                            <ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
                                               
                                                <li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#profile_8" aria-expanded="false"><span>All</span></a></li>
                                                <li  role="presentation" class="next"><a aria-expanded="true"  data-toggle="tab" role="tab" id="follo_tab_8" href="#follo_8"><span>Smart<span class="inline-block"></span></span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="photos_tab_8" role="tab" href="#photos_8" aria-expanded="false"><span>Tassia 1</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="earning_tab_8" role="tab" href="#earnings_8" aria-expanded="false"><span>Masosio</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Joy</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Pendo</span></a></li>
                                                <li role="presentation" class=""><a  data-toggle="tab" id="settings_tab_8" role="tab" href="#settings_8" aria-expanded="false"><span>Genesis</span></a></li>
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



                                                                <div class="table-responsive">


                                                                    <table id="example"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-side-pagination="server" sidePagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                        <?php 
                                                                    
                                                                        $orgnm = $_SESSION['orgNM'];
                                                                        $orgid = $_SESSION['orgID'];
                                                                        
                                                                        $orgcd = $_SESSION['orgCD'];
                                                                        
                                                                        $pimind = $_SESSION['pimind'];
                                                                        $secind = $_SESSION['secind'];
                                                                        $secind = $_SESSION['terind']; 
                                                                        
                                                                         
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
                                                                                <th>Last Name</th>
                                                                                <th>Gender</th>
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
                                                                                <th>Last Name</th>
                                                                                <th>Gender</th>
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
                                                                        $statement = "`people` WHERE `organisation_id` = '$orgid'"; //
                                                                        $sql = "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
                                                                        $query = mysqli_query($conn, $sql);
                                                                        
                                                                        //echo "SQL: ".$sql;
                                                                        
                                                                        while ($row = mysqli_fetch_array($query)) 
                                                                        {
                                                                            $nyumbaid = $row["address"];
                                                                            $jengoid = $row["residence"];
                                                                                                                                                        
                                                                            $sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'"; //`name` = '$nyumbaid' AND 
                                                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                                            
                                                                            //echo 'HERE: '.$sql."<br>";

                                                                            $aprtnm = $rowHse['make'];
                                                                            $hseno = $rowHse['name'];
                                                                            
                                                                            ?> 
                                                                            <tr> 
                                                                                <td><?php echo $row["id"]; ?></td> 
                                                                                <td><?php echo $row["firstname"]; ?></td>
                                                                                <td><?php echo $row["lastname"]; ?></td>
                                                                                <td><?php echo $row["gender"]; ?></td>
                                                                                <td><?php echo $row["phone"]; ?></td> 
                                                                                <td><?php echo $aprtnm; ?></td> 
                                                                                <td><?php echo $hseno; ?></td> 
                                                                                <td><?php echo $row["status"]; ?></td>
                                                                                
                                                                                <td>
                                                                                <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                                                 
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

                                                
                                                <!-- TAB 2 -->
                                                <div  id="follo_8" class="tab-pane fade" role="tabpanel">
                                                    <div class="col-md-12">
                                                        <div class="pt-20">
                                                            <div class="table-wrap">



                                                                <div class="table-responsive">


                                                                    <table id="example2"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-side-pagination="server" sidePagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="false" class="table table-hover table-bordered display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >

                                                                        <?php 
                                                                    
                                                                        $orgnm = $_SESSION['orgNM'];
                                                                        
                                                                        $pimind = $_SESSION['pimind'];
                                                                        $secind = $_SESSION['secind'];
                                                                        $secind = $_SESSION['terind']; 
                                                                        $department = $_SESSION['orgID'];
                                                                        
                                                                        echo 'Dept: '.$department.' Indi: '.$pimind;
                                                                         
                                                                         if($pimind == "Transport")
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
                                                                         else if($pimind == "Realestate")
                                                                         {
                                                                          ?>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th >Hse. #</th>
                                                                                <th>Hse. Type</th>
                                                                                <th>Status</th>
                                                                                <th>Actions</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>First Name</th>
                                                                                <th>Last Name</th>
                                                                                <th>Gender</th>
                                                                                <th>Phone</th>
                                                                                <th >Hse. #</th>
                                                                                <th>Hse. Type</th>
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
                                                                        $statement = "`people` WHERE `department` = 'AMO'";
                                                                        $query = mysqli_query($conn, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");
                                                                        while ($row = mysqli_fetch_array($query)) 
                                                                        {
                                                                            ?> 
                                                                            <tr> 
                                                                                <td><?php echo $row["id"]; ?></td> 
                                                                                <td><?php echo $row["firstname"]; ?></td>
                                                                                <td><?php echo $row["lastname"]; ?></td>
                                                                                <td><?php echo $row["member_no"]; ?></td>
                                                                                <td><?php echo $row["gender"]; ?></td>
                                                                                <td><?php echo $row["phone"]; ?></td> 
                                                                                <td><?php echo $row["entry_mode"]; ?></td>
                                                                                <td><?php echo $row["comments_remarks"]; ?></td> 
                                                                                <!--td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td-->  
                                                                                <!--td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td--> 

                                                                                <td>
                                                                                <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-pencil txt-warning"></i></a>

                                                                                <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="delete" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                                                <!--&nbsp;&nbsp;-->
                                                                                <a href="#myModalview" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="view" ><i class="fa fa-eye txt-primary"></i></a>
                                                                                
                                                                                    
                                                                                    <?php include('button.php'); ?>
                                                                                    <?php include('modal-view.php'); ?>
                                                                                </td> 

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
                                                <!--/TAB 2 -->
                                                
                                                
                                                <!-- TAB 3 -->
                                                <div  id="photos_8" class="tab-pane fade" role="tabpanel">
                                                    <div class="col-md-12 pb-20">
                                                        <div class="gallery-wrap">
                                                            <div class="portfolio-wrap project-gallery">
                                                                <ul id="portfolio_1" class="portf auto-construct  project-gallery" data-col="4">
                                                                    <li  class="item"   data-src="../img/gallery/equal-size/mock1.jpg" data-sub-html="<h6>Bagwati</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" >
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock1.jpg"  alt="Image description" />
                                                                            <span class="hover-cap">Bagwati</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock2.jpg"   data-sub-html="<h6>Not a Keyboard</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock2.jpg"  alt="Image description" />
                                                                            <span class="hover-cap">Not a Keyboard</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock3.jpg" data-sub-html="<h6>Into the Woods</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock3.jpg"  alt="Image description" />
                                                                            <span class="hover-cap">Into the Woods</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock4.jpg"  data-sub-html="<h6>Ultra Saffire</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock4.jpg"  alt="Image description" />
                                                                            <span class="hover-cap"> Ultra Saffire</span>
                                                                        </a>
                                                                    </li>

                                                                    <li class="item" data-src="../img/gallery/equal-size/mock5.jpg" data-sub-html="<h6>Happy Puppy</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock5.jpg"  alt="Image description" />	
                                                                            <span class="hover-cap">Happy Puppy</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock6.jpg"  data-sub-html="<h6>Wooden Closet</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock6.jpg"  alt="Image description" />
                                                                            <span class="hover-cap">Wooden Closet</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock7.jpg" data-sub-html="<h6>Happy Puppy</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock7.jpg"  alt="Image description" />	
                                                                            <span class="hover-cap">Happy Puppy</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="item" data-src="../img/gallery/equal-size/mock8.jpg"  data-sub-html="<h6>Wooden Closet</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                                                        <a href="">
                                                                            <img class="img-responsive" src="../img/gallery/equal-size/mock8.jpg"  alt="Image description" />
                                                                            <span class="hover-cap">Wooden Closet</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                </div>
                                                <!--/TAB 3 -->
                                                
                                                
                                                <!-- TAB 4 -->
                                                <div  id="earnings_8" class="tab-pane fade" role="tabpanel">
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <form id="example-advanced-form" action="#">
                                                                <div class="table-wrap">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-striped display product-overview" id="datable_1">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Date</th>
                                                                                    <th>Item Sales Colunt</th>
                                                                                    <th>Earnings</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th colspan="2">total:</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                            </tfoot>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>monday, 12</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>tuesday, 13</td>
                                                                                    <td>
                                                                                        2
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>wednesday, 14</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$420</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>thursday, 15</td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>$500</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>friday, 15</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>saturday, 16</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>sunday, 17</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>monday, 18</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$500</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>tuesday, 19</td>
                                                                                    <td>
                                                                                        3
                                                                                    </td>
                                                                                    <td>$400</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/TAB 4 -->
                                                
                                                
                                                <!-- TAB 5 -->
                                                <div  id="settings_8" class="tab-pane fade" role="tabpanel">
                                                    <!-- Row -->
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="">
                                                                <div class="panel-wrapper collapse in">
                                                                    <div class="panel-body pa-0">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <div class="form-wrap">
                                                                                <form action="#">
                                                                                    <div class="form-body overflow-hide">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputuname_01">Name</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                                <input type="text" class="form-control" id="exampleInputuname_01" placeholder="willard bryant">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputEmail_01">Email address</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                                <input type="email" class="form-control" id="exampleInputEmail_01" placeholder="xyz@gmail.com">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputContact_01">Contact number</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-phone"></i></div>
                                                                                                <input type="email" class="form-control" id="exampleInputContact_01" placeholder="+102 9388333">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10" for="exampleInputpwd_01">Password</label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                <input type="password" class="form-control" id="exampleInputpwd_01" placeholder="Enter pwd" value="password">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10">Gender</label>
                                                                                            <div>
                                                                                                <div class="radio">
                                                                                                    <input type="radio" name="radio1" id="radio_01" value="option1" checked="">
                                                                                                    <label for="radio_01">
                                                                                                        M
                                                                                                    </label>
                                                                                                </div>
                                                                                                <div class="radio">
                                                                                                    <input type="radio" name="radio1" id="radio_02" value="option2">
                                                                                                    <label for="radio_02">
                                                                                                        F
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label mb-10">Country</label>
                                                                                            <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                                                <option value="Category 1">USA</option>
                                                                                                <option value="Category 2">Austrailia</option>
                                                                                                <option value="Category 3">India</option>
                                                                                                <option value="Category 4">UK</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-actions mt-10">			
                                                                                        <button type="submit" class="btn btn-success mr-10 mb-30">Update profile</button>
                                                                                        <button alt="alert" class="img-responsive model_img" id="sa-success">Add</button>
                                                                                    </div>				
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/TAB 5 -->
                                                
                                                
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