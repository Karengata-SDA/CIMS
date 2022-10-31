<?php

    session_start();

    error_reporting(E_ALL | E_STRICT);

    include('conn.php');

    $id = $_GET['id'];

    $sql1 = "SELECT * FROM `pesa` WHERE `id` = '$id'";
    $rowPesa = mysqli_fetch_array(mysqli_query($conn, $sql1));
    $referenceno = $rowPesa['reference_no'];
    $house_id = $rowPesa['item_id'];
    $amt_paid = $rowPesa['paid'];

    $_SESSION['subject'] = $referenceno;
    $referenceno = $_SESSION['subject'];

?>


<!-- sample modal content -->
            <div class="modal fade bs-example-modal-lg" id="pntrecp<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                
                <div class="modal-dialog modal-lg">
                    <?php //echo "ID 0: ".$row['id']; ?>
                    <!--<iframe src="../admin/generate_receipt.php" allowfullscreen></iframe>-->
                    <iframe src="../admin/generate_receipt.php?recp=<?php echo $row['id']; ?>" style="align-content: center;" width="1000" height="1245" scrolling="yes"></iframe>
                    
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Button trigger modal -->
            <!--img src="../img/modals/model2.png" alt="default" data-toggle="modal" data-target=".bs-example-modal-lg" class="model_img img-responsive"/--> 

<!-- /Row -->