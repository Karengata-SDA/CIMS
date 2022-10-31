<?php 
        session_start();
        $erieta = $_SESSION['firstname']; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>sweet alert</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">-->
        
        <link href="../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <script src="../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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
                    window.location = "../admin/<?php echo "profiles" ?>.php";
                });
            }, 1000);
        </script>
        <?php //include '../admin/people.php'; ?>
        
</body>
</html>
<!-- คู่มือ https://sweetalert.js.org/docs/ -->
<!-- ตย. code จาก  https://stackoverflow.com/questions/37358423/how-to-redirect-page-after-click-on-ok-button-on-sweet-alert -->