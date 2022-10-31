<?php 
        error_reporting(E_ALL | E_STRICT);
?>

<!-- Delete -->
<div class="modal fade" id="del<?php echo $row3['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
            </div>
            <div class="modal-body">
                <?php
                    $del = mysqli_query($conn, "SELECT * FROM `people` WHERE `id` = '".$row3['id']."'");
                    $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5><center>Firstname: <strong><?php echo $drow['firstname']; ?></strong></center></h5> 
                    <h5><center>Lastname: <strong><?php echo $drow['lastname']; ?></strong></center></h5> 
                    <h6><center><strong>Are you sure you want to delete the above person?</strong></center></h6>
                </div> 
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deletepers.php?id=<?php echo $row3['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /.Delete -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row3['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
            </div>
            <div class="modal-body">
                <?php
                    $edit = mysqli_query($conn, "SELECT * FROM `people` WHERE `id` = '".$row3['id']."'");
                    $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" id="edit_user" action="edit_person.php?id=<?php echo $erow['id']; ?>">
                        <input type="number" id="id" name="id" class="hidden" value="<?php echo $erow['id']; ?>"/>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Firstname:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="firstname" class="form-control" value="<?php echo $erow['firstname']; ?>" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Middlename:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="middlename" class="form-control" value="<?php echo $erow['middlename']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Lastname:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="lastname" class="form-control" value="<?php echo $erow['lastname']; ?>" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Gender:</label>
                            </div>
                            <!--div class="col-lg-10">
                                    <input type="text" name="gender" class="form-control" value="<?php echo $erow['gender']; ?>">
                            </div-->
                            <div class="col-lg-10">
                                <select name="gender" id="gender" class="form-control" > 
                                    ?>
                                    <option value="<?php echo $erow['gender']; ?>"><?php echo $erow['gender']; ?></option>
                                    <?php
                                    if ($erow['gender'] == "Male") {
                                        ?>
                                        <option value="Female">Female</option>   
                                        <?php
                                    } else if ($erow['gender'] == "Female") {
                                        ?>
                                        <option value="Male">Male</option> 
                                        <?php
                                    } else if ($erow['gender'] == "") {
                                        ?>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <?php
                                    } else {
                                        ?>
                                        <!--option value=""></option-->
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>   
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Phone:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="phone" class="form-control" value="<?php echo $erow['phone']; ?>" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Id Number:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="idno" class="form-control" value="<?php echo $erow['idno']; ?>" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                                <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Apartment:</label>
                                </div>
                                <div class="col-lg-10">
                                    
                                                <?php
                                                
                                                        $nyumbaid = $erow["address"];
                                                                                                                                                        
                                                        $sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                        $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                        
                                                        $aprtnm = $rowHse['make'];
                                                        $hseno = $rowHse['name'];
                                                        
                                                        //echo 'Building No, Name: : >>>>>>>>>>>>>>>>> '.$erow['residence'].", ".$aprtnm;
                                                        
                                                ?>
                                                <select name="residence" id="residence" class="form-control" placeholder="Select Apartment"> 
                                                    <option value="<?php echo $erow['residence']; ?>"><?php echo $aprtnm; ?></option>
                                                    
                                                <?php

                                                        $query2 = mysqli_query($conn, "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment' "); // AND `name` != 'Apartment'
                                                        while ($row2 = mysqli_fetch_array($query2)) 
                                                        {
                                                            //$nyumbaid = $row["address"];
                                                            
                                                            $mali_id = $row2["id"];
                                                            $mali_nm = $row2["name"];

                                                            //$sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";
                                                            //$rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 
                                                            //$aprtnm = $rowHse['name'];
                                                            
                                                            if($mali_nm != $aprtnm)
                                                            {
                                                                ?>
                                                                    
                                                                    <option value="<?php  echo $mali_id; ?>"><?php  echo $mali_nm; ?></option>
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
                                        <label class="control-label" style="position:relative; top:7px;">House #:</label>
                                </div>
                                <div class="col-lg-10">
                                    <?php
                                                
                                            $nyumbaid = $erow["address"];

                                            $sql = "SELECT * FROM `property` WHERE `id` = '$nyumbaid'";     //echo 'SQL: >>>>>>>>>>>>>>>>> '.$sql;
                                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql)); 

                                            $aprtnm = $rowHse['make'];
                                            $hseno = $rowHse['name'];   //echo 'Hse No.: : >>>>>>>>>>>>>>>>> '.$hseno;

                                    ?>
                                        <!--input type="text" name="houseid" class="form-control" value="<?php echo $hseno; ?>" -->
                                        <input type="text" name="houseno" class="form-control" value="<?php echo $hseno; ?>" >
                                </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                                <div class="col-lg-2">
                                        <label class="control-label" style="position:relative; top:7px;">Category:</label>
                                </div>
                                <div class="col-lg-10">
                                                                            
                                        <select name="role" id="role" class="form-control" placeholder="Select Category" >   
                                        ?>
                                        <option value="<?php echo $erow['role']; ?>"><?php echo $erow['role']; ?></option>
                                        <?php
                                        
                                            ?>
                                            <!--option value=""></option-->
                                            <option value="Tenant">Tenant</option>
                                            <option value="Caretaker">Caretaker</option>
                                            <option value="Accountant">Accountant</option>
                                            <option value="Administrator">Administrator</option>  
                                            <option value="Manager">Manger</option>
                                            <option value="Owner">Owner</option>   
                                            <?php
                                        
                                        ?>
                                    </select>
                                </div>
                        </div>
                        <div style="height:10px;"></div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Edit -->


