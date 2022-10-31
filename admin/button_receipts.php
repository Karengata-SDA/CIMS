<?php 
        error_reporting(E_ALL | E_STRICT);
        
        session_start();
        
        $set = $_SESSION['set'];
        $level = $_SESSION['level']; 
        $role = $_SESSION['role']; 
        
        $agent_id = $_SESSION['userid'];
        
?>

<!-- Delete -->
<div class="modal fade" id="delrcp<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Receipt</h4></center>
            </div>

            <div class="modal-body">
                <?php
                    $del = mysqli_query($conn, "SELECT * FROM `pesa` WHERE `id` = '".$row['id']."'");
                    $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5><center>Reference No.: <strong><?php echo $drow['reference_no']; ?></strong></center></h5> 
                    <br>
                    <?php
                    if($level == "superuser")
                    {
                        ?>
                                <h6><center><strong>Are you sure you want to delete the above receipt?</strong></center></h6>
                        <?php
                    }
                    else 
                    {
                        ?>
                                <h6><center><strong>Sorry you do not have sufficient user rights to delete the above receipt!</strong></center></h6>
                        <?php
                    }
                    ?>
                </div> 
            </div>
            <?php
                    if($level == "superuser")
                    {
                        ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                    <a href="delete_receipt.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </div>
                        <?php
                    }
                    else 
                    {
                        ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                </div>
                        <?php
                    }
            ?>
            

        </div>
    </div>
</div>
<!-- /Delete -->


<!-- Edit Receipt-->
<div class="modal fade" id="editrcp<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <?php
        $edit = mysqli_query($conn, "SELECT * FROM `pesa` WHERE `id` = '".$row['id']."'");
        $erow = mysqli_fetch_array($edit);
    ?>
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Receipt</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" id="add_receipt" action="edit_receipt.php">
                      <input type="number" id="id" name="id" class="hidden" value="<?php echo $row['id']; ?>"/>
                      
                      
                      
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Tenant:</label>
                            </div>
                            <div class="col-lg-10">
                                
                                <?php
                                        $usid = $erow['user_id'];
                                        $sql1 = "SELECT * FROM `people` WHERE `id` = '$usid'";
                                        $rowPer = mysqli_fetch_array(mysqli_query($conn, $sql1));
                                        
                                        $user_nm = $rowPer["firstname"]." ".$rowPer["middlename"]." ".$rowPer["lastname"];
                                        $user_ad = $rowPer["address"];
                                        $user_dn = $rowPer["idno"];
                                        $user_ph = $rowPer["phone"];
                                        
                                        
                                        $sql = "SELECT * FROM `property` WHERE `id` = '$user_ad'";
                                        $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));
                                        $hseno = $rowHse['name'];
                                        $aptnm = $rowHse['make'];
                                        $value = $rowHse['value_prev'];
                                ?>
                                
                                
                                
                                <?php
                      
                                    if($level == "superuser")
                                    {
                                        ?>
                                                    <input list="users" name="user" class="form-control" placeholder="" autocomplete="off" value="<?php echo $hseno." - ".$aptnm." -  ".$user_nm."  (".$user_dn.")"; ?>" required>
                                        <?php
                                    }
                                    else 
                                    {
                                        ?>
                                                    <input list="users" name="user" class="form-control" placeholder="" autocomplete="off" value="<?php echo $hseno." - ".$aptnm." -  ".$user_nm."  (".$user_dn.")"; ?>" disabled>
                                        <?php
                                    }

                               ?>
                                
                                <datalist id="usersX"> 
                                    
                                    <?php
                                        $queryX = mysqli_query($conn, "SELECT * FROM `people` WHERE `role` = 'Tenant'");
                                        while ($row2X = mysqli_fetch_array($queryX)) 
                                        {
                                            $user_id = $row2X["id"];
                                            $user_nm = $row2X["firstname"]." ".$row2X["middlename"]." ".$row2X["lastname"];
                                            $user_ad = $row2X["address"];
                                            $user_dn = $row2X["idno"];
                                            $user_ph = $row2X["phone"];

                                            $sql = "SELECT * FROM `property` WHERE `id` = '$user_ad'";
                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));  

                                            $hseno = $rowHse['name'];
                                            $aptnm = $rowHse['make'];

                                            ?>
                                                <option id="<?php echo $user_id; ?>" value="<?php echo $hseno." - ".$aptnm." -  ".$user_nm."  (".$user_dn.")"; ?>" label="<?php  //echo $user_nm; ?>"><?php  //echo $user_nm; ?></option>

                                            <?php   
                                        }
                                    ?>
                                </datalist>
                                
                            </div>
                        </div> 
                        
                        
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Method:</label>
                            </div>
                            <div class="col-lg-10">
                                
                                    
                                    
                               <?php

                                if($level == "superuser")
                                {
                                    ?>
                                                <select name="method" id="method" class="form-control" placeholder="Method">  
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <select name="method" id="method" class="form-control" placeholder="Method" disabled>  
                                    <?php
                                }

                               ?>
                                    
                                    
                                    <option value="<?php echo $erow['method']; ?>"><?php echo $erow['method']; ?></option>
                                    <option value="Bank">Bank</option>  
                                    <option value="Mpesa">Mpesa</option>
                                </select>
                            </div>
                        </div>
                                                
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                             <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">DateTime:</label>
                            </div>
                            <div class="col-lg-10">
                                    <div class="form-group">
                                            <!--<div class='input-group date' id='datetimepicker2'></div>-->
                                                
                                            
                                                    
                                                    
                                                    <?php

                                                    if($level == "superuser")
                                                    {
                                                        ?>
                                                                    <!--<input type='text' class="form-control" name="datetime" value="<?php echo $erow['datetime']; ?>"/>-->
                                                                    <!--<input type="date" id="tarehe" name="date" value="<?php echo $erow['datetime']; ?>">-->
                                                                    <!--<input type="time" id="wakati" name="time" value="<?php echo $erow['datetime']; ?>">-->
                                                                    <input size="16" type="text" class="form-control" name="datetime" id="datetime" value="<?php echo $erow['datetime']; ?>">
                                                                    
                                                        <?php
                                                    }
                                                    else 
                                                    {
                                                        ?>
                                                                    <!--<input type='text' class="form-control" name="datetime" value="<?php echo $erow['datetime']; ?>" disabled/>--> 
                                                                    <!--<input type="date" id="tarehe" name="date" value="<?php echo $erow['datetime']; ?>" disabled>-->
                                                                    <!--<input type="time" id="wakati" name="time" value="<?php echo $erow['datetime']; ?>" disabled>-->
                                                                    <input size="16" type="text" class="form-control" name="datetime" id="datetime" value="<?php echo $erow['datetime']; ?>" disabled>
                                                        <?php
                                                    }

                                                   ?>
                                                    
                                                    <!--span class="input-group-addon">
                                                            <span class="fa fa-calendar"></span>
                                                    </span-->
                                            
                                    </div>
                            </div>
                        </div>
                        
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Reference#:</label>
                            </div>
                            <div class="col-lg-10">
                                
                                <?php

                                if($level == "superuser")
                                {
                                    ?>
                                                <input type="number" class="form-control" name="referenceno" value="<?php echo $erow['reference_no']; ?>">
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <input type="number" class="form-control" name="referenceno" value="<?php echo $erow['reference_no']; ?>" disabled>
                                    <?php
                                }

                               ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Amount:</label>
                            </div>
                            <div class="col-lg-10">
                                
                                
                                <?php

                                if($level == "superuser")
                                {
                                    ?>
                                                <input type="number" class="form-control" name="amount" value="<?php echo $erow['paid']; ?>">
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <input type="number" class="form-control" name="amount" value="<?php echo $erow['paid']; ?>" disabled>
                                    <?php
                                }

                               ?>
                                
                            </div>
                        </div>
                        <!--
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
                                                <input type="number" class="form-control" name="arrears" value="<?php echo $value; ?>">
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <input type="number" class="form-control" name="arrears" value="<?php echo $value; ?>" disabled>
                                    <?php
                                }

                               ?>
                                
                            </div>
                        </div>
                        -->
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Remarks:</label>
                            </div>
                            <div class="col-lg-10">
                                
                                
                                <?php

                                if($level == "superuser")
                                {
                                    ?>
                                                <input type="text" class="form-control" name="remarks" value="<?php echo $erow['remarks']; ?>">
                                    <?php
                                }
                                else 
                                {
                                    ?>
                                                <input type="text" class="form-control" name="remarks" value="<?php echo $erow['remarks']; ?>" disabled>
                                    <?php
                                }

                               ?>
                                
                            </div>                            
                        </div>
                        
                </div> 
                
                
                <?php

                if($level == "superuser")
                {
                    ?>
                                
                    <?php
                }
                else 
                {
                    ?>
                                <center><h6 style="color: red;"><center><strong>Sorry you do not have sufficient user rights to edit the above receipt!</strong></center></h6></center>
                    <?php
                }

               ?>
            </div>
            <div class="modal-footer">
                
                
                
                <?php

                if($level == "superuser")
                {
                    ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" id="sa-success"></span> Save</a>
                    <?php
                }
                else 
                {
                    ?>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <?php
                }

               ?>
                
                    </form>
            </div>

        </div>
    </div>
    
</div>
<!-- Edit Receipts /-->

<!-- Print Receipt-->
<div class="modal fade bs-example-modal-lg" id="pntrecp<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                
    <div class="modal-dialog modal-lg" style="align-content: center; border:1; display:block; margin:auto;">
        <?php //echo "ID 0: ".$row['id']; ?>
        <!--<iframe src="../admin/generate_receipt.php" allowfullscreen></iframe>-->

        <p align="center">
        <iframe src="../admin/generate_receipt.php?recp=<?php echo $row['id']."&stid=".$agent_id; ?>" width="1000" height="1245" scrolling="yes" style="border:1; display:block; margin:auto;"></iframe>
        </p>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Print Receipt
<div class="modal fade" id="pntrecp<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <iframe src="../admin/generate_receipt.php" width="1000" height="1245" scrolling="yes"></iframe>
        </div>
    </div>
</div>

<!-- Print Receipt /-->


