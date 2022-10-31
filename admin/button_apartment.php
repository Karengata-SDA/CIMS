<?php 
        error_reporting(E_ALL | E_STRICT);
        
        session_start();
        
        $set = $_SESSION['set'];
        
?>

<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
            </div>
            <div class="modal-body">
                <?php
                    $del = mysqli_query($conn, "SELECT * FROM `property` WHERE `id` = '".$row['id']."'");
                    $drow = mysqli_fetch_array($del);
                ?>
                <div class="container-fluid">
                    <h5><center>Apartment: <strong><?php echo $drow['name']; ?></strong></center></h5> 
                    <br>
                    <h6><center><strong>Are you sure you want to delete the apartment?</strong></center></h6>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_apartment.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
            </div>

        </div>
    </div>
</div>
<!-- /Delete -->


<!-- Edit Apartment-->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Apartment</h4></center>
            </div>
            <div class="modal-body">
                <?php
                    $edit = mysqli_query($conn, "SELECT * FROM `property` WHERE `id` = '".$row['id']."'");
                    $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" id="edit_receipt" action="edit_apartment.php">
                        <input type="number" id="id" name="id" class="hidden" value="<?php echo $erow['id']; ?>"/>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Name:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $erow['name']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Location:</label> <!-- Pick this from a drop-down list populated from the places table.-->
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="location" autocomplete="off" value="<?php echo $erow['location_id']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Floors:</label> <!-- Pick this from a drop-down list populated from the places table.-->
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="floors" autocomplete="off" value="<?php echo $erow['size']; ?>">
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Status:</label>
                            </div>
                            <div class="col-lg-10">                                
                                <select name="status" id="status" class="form-control" placeholder="Select Status"> 
                                    ?>
                                    <?php
                                    if ($erow['status'] == "0") 
                                    {
                                     ?>
                                        <option value="<?php echo $erow['status']; ?>">Not Ready</option>
                                        <option value="1">Almost</option>
                                        <option value="2">Ready</option> 
                                        <option value="3">Vacancies</option> 
                                        <option value="4">Full</option>  
                                     <?php
                                    } 
                                    else if ($erow['status'] == "1") 
                                    {
                                     ?>
                                        <option value="<?php echo $erow['status']; ?>">Almost</option>
                                        <option value="0">Not Ready</option>
                                        <option value="2">Ready</option> 
                                        <option value="3">Vacancies</option> 
                                        <option value="4">Full</option> 
                                     <?php
                                    } 
                                    else if ($erow['status'] == "2") 
                                    {
                                     ?>
                                        <option value="<?php echo $erow['status']; ?>">Ready</option>
                                        <option value="0">Not Ready</option>
                                        <option value="1">Almost</option>
                                        <option value="3">Vacancies</option> 
                                        <option value="4">Full</option>  
                                     <?php
                                    } 
                                    else if ($erow['status'] == "3") 
                                    {
                                     ?>
                                        <option value="<?php echo $erow['status']; ?>">Vacancies</option>
                                        <option value="0">Not Ready</option>
                                        <option value="1">Almost</option>
                                        <option value="2">Ready</option> 
                                        <option value="4">Full</option>  
                                     <?php
                                    }
                                    else if ($erow['status'] == "4") 
                                    {
                                     ?>
                                        <option value="<?php echo $erow['status']; ?>">Full</option>
                                        <option value="0">Not Ready</option>
                                        <option value="1">Almost</option>
                                        <option value="2">Ready</option> 
                                        <option value="3">Vacancies</option> 
                                     <?php
                                    }
                                    else 
                                    {
                                     ?>
                                        <option value=""></option>
                                        <option value="0">Not Ready</option>
                                        <option value="1">Almost</option>
                                        <option value="2">Ready</option> 
                                        <option value="3">Vacancies</option> 
                                        <option value="4">Full</option>  
                                     <?php
                                    }
                                    ?>
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
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Edit Apartment-->


<!-- Edit House -->
<div class="modal fade" id="editt<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit House</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php
                            $id = $row['id'];
                            $sql = "SELECT * FROM `property` WHERE `id` = '$id'";
                            $rowHse = mysqli_fetch_array(mysqli_query($conn, $sql));
                            $user_id = $row["user_id"]; 
                            $hseno = $row['name'];
                            $type = $row["type"];
                            $aprt = $row["make"];
                            $valu = $row["value_let"];
                    ?>
                    <form method="POST" id="add_receipt" action="edit_house.php">
                         <input type="number" id="id" name="id" class="hidden" value="<?php echo $erow['id']; ?>"/>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">House No:</label>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="address" value="<?php echo $hseno; ?>" required>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="control-label" style="position:relative; top:7px;">Apartment:</label>
                            </div>
                            
                            
                            
                            <div class="col-lg-10">
                                <select name="residence" id="residence" class="form-control" placeholder="Select Apartment"  required> 
                                    <option value="<?php echo $erow['residence']; ?>"><?php echo $aprt; ?></option>

                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `property` WHERE `category_id` = '1' AND `make` = 'Apartment'"); // AND `name` != 'Apartment'
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
                                <select name="housetype" id="role" class="form-control" placeholder="Select House Type"  required>  
                                    <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                    <option value="Bedsitter">Bedsitter</option>
                                    <option value="Bedsitter Balcony">Bedsitter Balcony</option>
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
                                <input type="number" class="form-control" name="price" value="<?php echo $valu; ?>"  required>
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
<!-- /.Edit House /-->


