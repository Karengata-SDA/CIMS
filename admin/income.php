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
                                                            <li class="active"><a  id="profile_tab_8" role="tab" href="income.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                            <li><a  id="profile_tab_8" role="tab" href="income.php?set=all" aria-expanded="false"><span>All</span></a></li>
                                                    <?php
                                                }
                                            ?>
                                            
                                            <?php
                                            
                                            $sql2 = "SELECT * FROM `products` WHERE `status` = '1' AND `organisation_id` = '1' AND `product_id` != '' ORDER BY `product_id` ASC";
                                            $query2 = mysqli_query($conn, $sql2); //echo $set." >>>>>> ".$sql2;

                                            //echo "Setting: ".$set;

                                            while ($row2 = mysqli_fetch_array($query2)) 
                                            {
                                                //$nyumbaid = $row["address"];

                                                $product_id = $row2["id"];
                                                $product_nm = $row2["name"];
                                                
                                                //echo 'Name: '.$product_nm.'<br>\n';

                                                //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                //$aprtnm = $rowHse['name'];

                                                if($set == $product_id) 
                                                {
                                                    ?>
                                                            <!--<li class="active" role="presentation"><a  data-toggle="tab" id="profile_tab_8" role="tab" href="#<?php echo $product_nm; ?>" aria-expanded="false"><span><?php echo $product_nm; ?></span></a></li>-->
                                                            <li class="active"><a  id="profile_tab_8" role="tab" href="income.php?set=<?php echo $product_id; ?>" aria-expanded="false"><span><?php echo $product_nm; ?></span></a></li>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                            <li role="" class=""><a  data-toggle="" id="photos_tab_8" role="tab" href="income.php?set=<?php echo $product_id; ?>" aria-expanded="false"><span><?php echo $product_nm; ?></span></a></li>
                                                    <?php
                                                }
                                            }
                                            
                                            ?>
                
                                        </ul>
                                        <div class="tab-content" id="myTabContent_8">
                                            <div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
                                                <div class="col-md-12">
                                                    <div class="pt-20">

                                                        <div class="table-wrap">



                                                            <div class="table-responsive">


                                                                <table id="exampleX"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-striped display product-overview" data-tablesaw-mode="columntoggle"  cellspacing="0" >



                                                                    <!--table class="table table-striped display product-overview" id="datable_1"-->
                                                                    <thead>
                                                                        
                                                                        <tr class="success">
                                                                            <?php
                                                                            
                                                                                    
                                                                                if($set == "all") 
                                                                                {
                                                                                    ?>
                                                                                            <th>Names</th>
                                                                                    <?php
                                                                                }
                                            
                                                                                $sql3 = "SELECT * FROM `products` WHERE `status` = '1' AND `organisation_id` = '1' AND `product_id` != '' ORDER BY `product_id` ASC";
                                                                                $query3 = mysqli_query($conn, $sql3); //echo $set." >>>>>> ".$sql2;

                                                                                //echo "Setting: ".$set;

                                                                                while ($row2 = mysqli_fetch_array($query3)) 
                                                                                {
                                                                                    //$nyumbaid = $row["address"];

                                                                                    $product_id = $row2["id"];
                                                                                    $product_nm = $row2["name"];

                                                

                                                                                    if($set == "all") 
                                                                                    {
                                                                                        ?>
                                                                                                <th><?php echo $product_nm; ?></th>
                                                                                        <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        ?>
                                                                                                <th>Description</th>
                                                                                                <th>Mpesa</th>
                                                                                                <th>Cash</th>
                                                                                                <th>PDQ</th>
                                                                                                <th>Cheque</th>
                                                                                                <th>Direct Deposit</th>
                                                                                                <th>YTD Totals</th>
                                                                                        <?php
                                                                                    }
                                                                                }

                                                                            ?>
                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th colspan="6">TOTALS:</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </tfoot>
                                                                    <tbody>
                                                                                                                                                
                                                                        <?php
                                                                        //https://www.informit.com/articles/article.aspx?p=1969707
                                                                        
                                                                        //SELECT column_name(s) FROM table1 T1, table1 T2 WHERE condition; //TODO: Remove the loopy loops and use self join on transaction table
                                                                        //SELECT A.CustomerName AS CustomerName1, B.CustomerName AS CustomerName2, A.City FROM Customers A, Customers B WHERE A.CustomerID <> B.CustomerID AND A.City = B.City ORDER BY A.City;
                                                                        //https://www.w3schools.com/sql/sql_join_self.asp
                                                                        //https://www.w3resource.com/sql/joins/perform-a-self-join.php
                                                                        //https://www.javatpoint.com/mysql-self-join
                                                                        //https://www.quackit.com/mysql/examples/mysql_self_join.cfm
                                                                        //https://stackoverflow.com/questions/13866428/retrieving-rows-from-self-join-in-php
                                                                        
                                                                            //$sql0 = "SELECT * FROM `userdetails`";
                                                                            $sql0 = "SELECT * FROM `codes`";
                                                                            $query0 = mysqli_query($conn, $sql0); //echo $sql0;
                                                                            while ($row0 = mysqli_fetch_array($query0))
                                                                            {
                                                                               //$uid = $row0['id']; 
                                                                               $uid = $row0['user_id']; 
                                                                               $cod = $row0['code'];
                                                                               
                                                                               //echo "Code in Session: ".$_SESSION['stoper']."<br>\n<br>\n";
                                                                                $_SESSION['stoper'] = "";

                                                                                //$sql = "SELECT * FROM `transactions` WHERE `code` IN (SELECT DISTINCT `code` FROM `transactions` GROUP BY `code`)  AND `device_id` = '$agent_id'  ORDER BY `transactions`.`id` DESC";
                                                                                //$sql1 = "SELECT * FROM `transactions` WHERE `user_id` = '$uid' AND `device_id` = '$agent_id' AND `added_on` = '2020-09-05 21:34:01' ORDER BY `transactions`.`id` DESC";
                                                                                $sql1 = "SELECT * FROM `transactions` WHERE `user_id` = '$uid' AND `device_id` = '$agent_id' AND `code` = '$cod' ORDER BY `transactions`.`id` DESC";
                                                                                
                                                                                $query1 = mysqli_query($conn, $sql1); //echo $sql1;

                                                                                $num_items = mysqli_num_rows($query1);

                                                                                $total = 0;

                                                                                $data = array();
                                                                            
                                                                                $i = 1;
                                                                                while ($row1 = mysqli_fetch_array($query1)) 
                                                                                {                            
                                                                                    $trxn_id = $row1['id'];
                                                                                    $user_id = $row1['user_id'];
                                                                                    $itemname = $row1['item_name'];
                                                                                    $garama = $row1['amount'];
                                                                                    $mfafanuo = $row1['description'];

                                                                                    $user_name = $row1['user_nm'];

                                                                                    $total += str_replace(',', '', $garama);

                                                                                    //if($num_items == $i)
                                                                                    {
                                                                                        ?>
                                                                                        <tr>
                                                                                            <!--<td><?php echo $user_name; ?></td>-->
                                                                                            <?php
                                                                                                $sql2 = "SELECT * FROM `products` WHERE `status` = '1' AND `organisation_id` = '1' AND `product_id` != '' ORDER BY `product_id` ASC";
                                                                                                $query2 = mysqli_query($conn, $sql2); //echo $set." >>>>>> ".$sql2;

                                                                                                $num_products = mysqli_num_rows($query2);

                                                                                                $j = 0;
                                                                                                while ($row2 = mysqli_fetch_array($query2)) 
                                                                                                {
                                                                                                    $product_id = $row2["id"];
                                                                                                    $product_nm = $row2["name"];

                                                                                                    if($product_nm == $itemname)
                                                                                                    {
                                                                                                        if($j == 0)
                                                                                                        {
                                                                                                            $data[$j] = $garama;
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                            if($data[$j] != "0")
                                                                                                            {
                                                                                                                $data[$j] = $garama;
                                                                                                            }
                                                                                                            else
                                                                                                            {
                                                                                                                //$data[$j] = "0";
                                                                                                            }
                                                                                                        }


                                                                                                        ?>
                                                                                                               <!--<td><?php echo $j." > ".$data[$j]; ?></td>-->
                                                                                                        <?php
                                                                                                    }
                                                                                                    else
                                                                                                    {

                                                                                                        /*if($j == 0)
                                                                                                        {
                                                                                                            $data[$j] = "0";
                                                                                                        }
                                                                                                        else
                                                                                                        {
                                                                                                           if($data[$j] != "0")
                                                                                                            {
                                                                                                                //$data[$j] = $garama;
                                                                                                            }
                                                                                                            else
                                                                                                            {
                                                                                                                $data[$j] = "0";
                                                                                                            }
                                                                                                        }
                                                                                                        */


                                                                                                        ?>
                                                                                                               <!--<td><?php echo "0"; ?></td>-->
                                                                                                        <?php
                                                                                                    }

                                                                                                $j++;
                                                                                                }

                                                                                                if($i == $num_items)
                                                                                                {
                                                                                                    ?>
                                                                                                    <td><?php echo $user_name; ?></td>
                                                                                                    <?php
                                                                                                    for($k=0; $k < $num_products; $k++)
                                                                                                    {

                                                                                                       if($data[$k] != "0")
                                                                                                       {
                                                                                                           ?>
                                                                                                               <td><?php echo $data[$k]."0"; ?></td>
                                                                                                           <?php
                                                                                                       }
                                                                                                       else
                                                                                                       {
                                                                                                           ?>
                                                                                                               <td><?php echo "0"; ?></td>
                                                                                                           <?php
                                                                                                       }
                                                                                                    } 
                                                                                                }

                                                                                            ?>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }



                                                                                        $stoper = $_SESSION['stoper'];

                                                                                        if($stoper == $code) //$stoper != "" || $stoper == $code
                                                                                        {                                                                                        
                                                                                            $i++;
                                                                                            continue;
                                                                                        }
                                                                                        //echo ">>Code: ".$code."<br>\n";
                                                                                        $_SESSION['stoper'] = $code;

                                                                                    $i++;
                                                                                }
                                                                            }
                                                                        
                                                                        ?>
                                                                        
                                                                    </tbody>
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
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div  id="follo_8" class="tab-pane fade" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="col-md-12">
                                                            <div class="pt-20">

                                                                <div class="table-wrap">



                                                                    <div class="table-responsive">


                                                                        <table id="example2"  data-toggle="table" data-sortable="true" data-buttons-class='default btn-sm btn-outline' data-pagination="true" data-search="true" class="table table-hover  display  pb-30" data-tablesaw-mode="columntoggle"  cellspacing="0" >




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
                                                                            include('conn.php');

                                                                            $query = mysqli_query($conn, "select * from `userdetails` ");
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

                                                                                        <a href="#del<?php echo $row['id']; ?>" data-toggle="modal"  class="pr-10 edit_data" data-toggle="tooltip" title="edit" ><i class="fa fa-trash-o txt-danger"></i></a>
                                                                                        &nbsp;&nbsp;


                                                                                    </td> 
                                                                                    <?php include('button.php'); ?>


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
                                                </div>
                                            </div>


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
