<?php

    session_start();
    $set = $_SESSION['set'];
    $orgid = $_SESSION['orgID'];
    $orgnm = $_SESSION['orgNM'];
    
    $pimind = $_SESSION['pimind'];
    $secind = $_SESSION['secind'];
    $terind = $_SESSION['terind']; 
    
    $agent_id = $_SESSION['userid']; 

    $department = $_SESSION['department'];
        
    $ind = "real";
    
?>

<!-- Add New Person-->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Person</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add_user" action="addpers.php">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Firstname:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="firstname" autocomplete="on" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Middlename:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="middlename" autocomplete="on">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;" autocomplete="on">Lastname:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="lastname" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Gender:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="gender" id="gender" class="form-control" placeholder="gender">  
                                    <option value=""></option>
                                    <option value="Male">Male</option>  
                                    <option value="Female">Female</option>

                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label  class="control-label" style="position:relative; top:7px;">Id Number:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="idno"  id="input-disabled" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Phone:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        
                        <?php
                        
                        if($pimind == "Real Estate")
                        {
                            ?>
                                    <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Apartment:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="residence" id="residence" class="form-control" placeholder="Select Apartment" required>
                                            <?php 

                                            $sql = "SELECT * FROM `property` WHERE `id` = '$set'";
                                            $rowApt = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql;

                                            //$aprtnm = $rowHse['make'];
                                            $aptid = $rowApt['id'];
                                            $aptnm = $rowApt['name'];

                                            ?>
                                            <option value="<?php echo $aptid; ?>"><?php echo $aptnm; ?></option>

                                            <?php
                                            $query2 = mysqli_query($conn, "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment'"); // AND `name` != 'Apartment'
                                            while ($row2 = mysqli_fetch_array($query2)) 
                                            {
                                                $mali_id = $row2["id"];
                                                $mali_nm = $row2["name"];


                                                 ?>
                                                    <option value="<?php echo $mali_id; ?>"><?php echo $mali_nm; ?></option>
                                                 <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php
                        }
                        else
                        {
                            ?>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Department:</label>
                                    </div>
                                    <div class="col-lg-10">
                                        <select name="department" id="residence" class="form-control" placeholder="Select Department" required>
                                            <?php 

                                            $sql = "SELECT * FROM `departments` WHERE `id` = '$set' AND `organisation_id` = '$orgid'";
                                            $rowApt = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql;

                                            //$aprtnm = $rowHse['make'];
                                            $aptid = $rowApt['id'];
                                            $aptnm = $rowApt['name'];
                                            
                                            ?>
                                            <option value="<?php echo $aptid; ?>"><?php echo $aptnm; ?></option>

                                            <?php
                                            $query2 = mysqli_query($conn, "SELECT * FROM `departments` WHERE `id` = '$set' AND `organisation_id` = '$orgid'");
                                            while ($row2 = mysqli_fetch_array($query2)) 
                                            {
                                                $mali_id = $row2["id"];
                                                $mali_nm = $row2["name"];


                                                 ?>
                                                    <option value="<?php echo $mali_id; ?>"><?php echo $mali_nm; ?></option>
                                                 <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php
                        }
                        
                        ?>
                        
                        <?php
                        if($pimind == "Real Estate")
                             {
                                 ?>
                                        <div style="height:10px;"></div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <label class="control-label" style="position:relative; top:7px;">House #:</label>
                                            </div>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" name="address" autocomplete="off" required>
                                            </div>
                                        </div>
                                 <?php
                             }
                        ?>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <?php
                            
                             if($pimind == "Real Estate")
                             {
                                 ?>
                                        <div class="col-lg-2">
                                            <label class="control-label" style="position:relative; top:7px;">Category:</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <select name="role" id="role" class="form-control" placeholder="Select Category" required>  
                                                <option value=""></option> 
                                                <option value="Tenant">Tenant</option>
                                                <option value="Caretaker">Caretaker</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Administrator">Administrator</option>  
                                                <option value="Manager">Manger</option>
                                                <option value="Owner">Owner</option>    
                                            </select>
                                        </div>
                                 <?php
                             }
                             else
                             {
                                 ?>
                                        <div class="col-lg-2">
                                            <label class="control-label" style="position:relative; top:7px;">Category:</label>
                                        </div>
                                        <div class="col-lg-10">
                                            <select name="role" id="role" class="form-control" placeholder="Select Category" required>  
                                                <option value=""></option> 
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Super User">Super User</option>
                                                <option value="User">User</option>  
                                                <option value="Observer">Observer</option>  
                                            </select>
                                        </div>
                                 <?php
                             }
                            ?>
                            
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Add New Person /-->


<!-- Add New Receipts -->
<div class="modal fade" id="addrecp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Receipt</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add_receipt" action="addrecp.php">
                        
                            <div style="height:10px;"></div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <?php 
                                            if($pimind == "Real Estate")
                                            {
                                                ?>
                                                        <label class="control-label" style="position:relative; top:7px;">Tenant:</label>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                        <label class="control-label" style="position:relative; top:7px;">Member:</label>
                                                <?php
                                            }
                                    ?>
                                    
                                </div> <?php //echo "Set: ".$set; ?>
                                <div class="col-lg-10">
                                    <!--<input type="text" list="users" id="user" name="user" class="form-control" placeholder="" autocomplete="off"  required>  onmousedown="value = '';" -->
                                    <input type="text" oninput='onInput()' list="users" id="user" name="user" class="form-control" placeholder="" autocomplete="off">
                                         <!-- https://www.jotform.com/blog/html5-datalists-what-you-need-to-know-78024/ -->
                                        <datalist id="users">                                        
                                            <?php
                                                if($set == "all")
                                                {
                                                    $sql22 = "SELECT * FROM `userdetails` WHERE `organisation_id` = '$orgid' ORDER BY `name` ASC"; //TODO: Add dynamic `role` clause.
                                                }
                                                else
                                                {
                                                    $sql22 = "SELECT * FROM `userdetails` WHERE `organisation_id` = '$orgid' AND `department` = '$dept_id' ORDER BY `name` ASC"; //TODO: Add dynamic `role` clause.
                                                }
                                                
                                                $query22 = mysqli_query($conn, $sql22);
                                                while ($row22 = mysqli_fetch_array($query22)) 
                                                {
                                                    $user_id2 = $row22["id"];
                                                    $user_name = $row22["firstname"]." ".$row22["middlename"]." ".$row22["lastname"];
                                                    $other_names = $row22["middlename"]." ".$row22["lastname"];
                                                    $user_ad2 = $row22["address"];
                                                    $user_phone = $row22["phone"];
                                                    $user_ph2 = $row22["phone"];
                                                    $user_dp2 = $row22["department"];
                                                    $user_memno = $row22["member_no"];

                                                    $sql33 = "SELECT id, name FROM `departments` WHERE `id` = '$user_dp2'"; 
                                                    $rowHse33 = mysqli_fetch_array(mysqli_query($conn, $sql33));  

                                                    $deptna33 = $rowHse33['name'];
                                                    $aptnm33 = $rowHse33['make'];
                                                    $value33 = $rowHse33['value_prev'];

                                                    if($user_re2 == $set){}
                                                    
                                                    ?>
                                                        <option id="<?php echo $user_id2; ?>" value="<?php echo $user_memno." - ".$user_name." - (0".$user_phone.")"; ?>" label="<?php  //echo $user_nm; ?>"><?php  //echo $user_nm; ?></option>
                                                        <!--<input type="text" value="<?php echo $value33; ?>" id="txtDoorStyle" name="<?php echo $deptna33." - ".$aptnm33." -  ".$user_name."  (".$user_dn2.")"; ?>" >-->
                                                    <?php
                                                    
                                                }
                                            ?>
                                        </datalist>

                                        <script>
                                            //dataList = $("#users")
                                            //dataList.empty()
                                        </script>
                                </div>
                            </div>
                       
                           <?php //echo "SQL Query: ".$sql22." AptId. ".$user_re2." Set: ".$set; ?>
                       
                            <!--script type="text/javascript">
                            $(function()
                            {
                                    $('#user').click(function() 
                                    {
                                            $('#arrears').val($(this).val());
                                    });
                            });
                            </script-->
                            
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Full Name:</label>
                            </div>
                            
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                            </div> 
                                                        
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control"  id="lastname"name="lastname" placeholder="Other Names" required>
                            </div>
                        </div>
                                                
                        <div style="height:10px;"></div>                         
                         <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Phone #:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="phonenum" name="phonenum" required>
                            </div>
                        </div>
                            
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Method:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="method" id="method" class="form-control" placeholder="Method" required>  
                                    <option value=""></option>
                                    <option value="Bank">Bank</option>  
                                    <option value="Mpesa">Mpesa</option>
                                </select>
                            </div>
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Reference#:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="referenceno" required>
                            </div>
                        </div>
                        <!--
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Month:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="month" id="method" class="form-control" placeholder="Month">  
                                    <option value=""></option>
                                    <option value="January">January</option>  
                                    <option value="February">February</option>
                                    <option value="March">March</option>  
                                    <option value="April">April</option>
                                    <option value="May">May</option>  
                                    <option value="June">June</option>
                                    <option value="July">July</option>  
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        -->
                        
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <?php 
                                if($pimind == "Real Estate")
                                {
                                    ?>
                                            <div class="col-lg-2">
                                                <label class="control-label" style="position:relative; top:7px;">DateTime:</label>
                                            </div>
                                            <div class="col-lg-10">
                                                    <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker1'>
                                                                <input type='text' class="form-control" name="datetime" required/>
                                                                    <span class="input-group-addon">
                                                                            <span class="fa fa-calendar"></span>
                                                                    </span>
                                                            </div>
                                                    </div>
                                            </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                            <div class="col-lg-2">
                                                <label class="control-label" style="position:relative; top:7px;">Trxn. Date:</label>
                                            </div>
                                            <div class="col-lg-10">
                                                    <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker1'>
                                                                <input type='text' class="form-control" name="trx_datetime" required/>
                                                                    <span class="input-group-addon">
                                                                            <span class="fa fa-calendar"></span>
                                                                    </span>
                                                            </div>
                                                    </div>
                                            </div>
                                    <?php
                                }
                        ?>
                        </div>
                                                
                        <?php 
                                if($pimind == "Real Estate")
                                {
                                    ?>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Arrears:</label>
                            </div>
                            <div class="col-lg-10">
                                                                
                                <?php

                                if($level == "superuser")
                                {
                                    ?>
                                                <input type="number" class="form-control" id="arrears" name="arrears" value="<?php echo $value33; ?>"  autocomplete="off" required>
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <input type="number" class="form-control" id="arrears" name="arrears" value="<?php echo $value33; ?>"  autocomplete="off"  required>
                                    <?php
                                }

                               ?>
                                
                            </div>
                        </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                            
                                    <?php
                                }
                        ?>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Item One:</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" name="item1" placeholder="Name">
                            </div> 
                            
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <!--
                                <select name="item" id="method" class="form-control" placeholder="Name" required>  
                                    <option value="">Name</option>
                                    <option value="Rent">Rent</option>  
                                    <option value="Water">Water</option>
                                    <option value="Electricity">Electricity</option>
                                </select>
                                -->
                                
                                <!--<input class="form-control" type="text" name="amount1" placeholder="Amount" autocomplete="off">-->  <!-- ^\$\d{1,3}(,\d{3})*(\.\d+)?$ -->
                                <input class="form-control" type="text" name="amount1" id="currency-field" pattern="^(\()?[0-9]+(?>,[0-9]{3})*(?>\.[0-9]{2})?(?(1)\))$" value="" data-type="currency" placeholder="Amount" autocomplete="off">
                            </div> 
                                                        
                            <!--div class="col-md-3 col-sm-12 col-xs-12 form-group mb-0">
                                <input type="number" class="form-control" name="amount"  placeholder="Amount" required>
                            </div--> 
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Item Two:</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" name="item2" placeholder="Name">
                            </div> 
                                                        
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input class="form-control" type="text" name="amount2" id="currency-field" pattern="^(\()?[0-9]+(?>,[0-9]{3})*(?>\.[0-9]{2})?(?(1)\))$" value="" data-type="currency" placeholder="Amount" autocomplete="off">
                            </div>
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Item Three:</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" name="item3" placeholder="Name">
                            </div> 
                                                        
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input class="form-control" type="text" name="amount3" id="currency-field" pattern="^(\()?[0-9]+(?>,[0-9]{3})*(?>\.[0-9]{2})?(?(1)\))$" value="" data-type="currency" placeholder="Amount" autocomplete="off">
                            </div>
                        </div>   
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Item Four:</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" name="item4" placeholder="Name">
                            </div> 
                                                        
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input class="form-control" type="text" name="amount4" id="currency-field" pattern="^(\()?[0-9]+(?>,[0-9]{3})*(?>\.[0-9]{2})?(?(1)\))$" value="" data-type="currency" placeholder="Amount" autocomplete="off">
                            </div>
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Item Five:</label>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <input type="text" class="form-control" name="item5" placeholder="Name">
                            </div> 
                                                        
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <input class="form-control" type="text" name="amount5" id="currency-field" pattern="^(\()?[0-9]+(?>,[0-9]{3})*(?>\.[0-9]{2})?(?(1)\))$" value="" data-type="currency" placeholder="Amount" autocomplete="off">
                            </div>
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Add New Receipts /-->

<!-- Add New Apartment -->
<div class="modal fade" id="addaptm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Apartment</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add_receipt" action="addaptm.php">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Name:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" autocomplete="off" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Location:</label> <!-- Pick this from a drop-down list populated from the places table.-->
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="location">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Floors:</label> <!-- Pick this from a drop-down list populated from the places table.-->
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="floors">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Status:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="status" id="status" class="form-control" placeholder="Select Status" required>
                                    <option value=""></option> 
                                    <option value="0">Not Ready</option>
                                    <option value="1">Almost</option>
                                    <option value="2">Ready</option> 
                                    <option value="3">Vacancies</option> 
                                    <option value="4">Full</option>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Caretaker:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="agent_id" id="agent_id" class="form-control" placeholder="Select Caretaker"> 
                                    <!--option value="<?php echo $erow['residence']; ?>"><?php echo $aprtnm; ?></option-->
                                    <option value=""></option> 
                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `people` WHERE `role` = 'Caretaker'"); // AND `name` != 'Apartment'
                                    while ($row2 = mysqli_fetch_array($query2)) 
                                    {
                                        //$nyumbaid = $row["address"];

                                        $agent_id = $row2["id"];
                                        $agent_nm = $row2["firstname"]." ".$row2["middlename"]." ".$row2["lastname"];

                                        //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                        //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                        //$aprtnm = $rowHse['name'];

                                        ?>
                                            <option value="<?php echo $agent_id; ?>"><?php echo $agent_nm; ?></option>
                                         <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a></button>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Add New Apartment /-->

<!-- Add New House -->
<div class="modal fade" id="addhuse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New House</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add_receipt" action="addhuse.php">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">House No:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Apartment:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="residence" id="residence" class="form-control" placeholder="Select Apartment"> 
                                    
                                    <?php 
                                    
                                    $sql = "SELECT * FROM `property` WHERE `id` = '$set'";
                                    $rowApt = mysqli_fetch_array(mysqli_query($conn, $sql));  //echo "SQL: ".$sql;

                                    //$aprtnm = $rowHse['make'];
                                    $aptid = $rowApt['id'];
                                    $aptnm = $rowApt['name'];
                                    
                                    ?>
                                    <option value="<?php echo $aptid; ?>"><?php echo $aptnm; ?></option>

                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment'"); // AND `name` != 'Apartment'
                                    while ($row2 = mysqli_fetch_array($query2)) 
                                    {
                                        //$nyumbaid = $row["address"];
                                        $mali_id = $row2["id"];
                                        $mali_nm = $row2["name"];
                                        
                                         if($set == $mali_id)
                                         {
                                             
                                         }

                                        //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                        //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                        //$aprtnm = $rowHse['name'];

                                        if ($mali_nm != $aprtnm) 
                                        {
                                         ?>
                                            <option value="<?php echo $mali_id; ?>"><?php echo $mali_nm; ?></option>
                                         <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">House Type:</label>
                            </div>
                            <div class="col-lg-10">
                                <select name="housetype" id="role" class="form-control" placeholder="Select House Type" required>  
                                    <option value=""></option> 
                                    <option value="Bedsitter">Bedsitter</option>
                                    <option value="Bedsitter Balcony">Bedsitter Balcony</option>
                                    <option value="1 Bedroom">1 Bedroom</option>
                                    <option value="1 Bedroom Studio">1 Bedroom Studio</option>
                                    <option value="1 Bedroom Balcony">1 Bedroom Balcony</option>  
                                    <option value="2 Bedroom">2 Bedroom</option>
                                    <option value="2 Bedroom Balcony">2 Bedroom Balcony</option>
                                    <option value="3 Bedroom">3 Bedroom</option>
                                    <option value="3 Bedroom Balcony">3 Bedroom Balcony</option>  
                                    <option value="Store">Store</option>
                                    <option value="Shop">Shop</option>
                                    <option value="Office">Office</option>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Price:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="number" class="form-control" name="price" required>
                            </div>
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
                    </form>
            </div>

        </div>
    </div>
</div>
<!-- Add New House /-->