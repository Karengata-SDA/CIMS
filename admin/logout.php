<?php

    session_start();
    //$_SESSION = array();
    
    $orgcd = $_SESSION['orgCD'];
    
    if($orgcd == "")
    {
        $orgcd = $_GET['ogc'];
    }
    
    //echo "Org Code: ".$orgcd;
    header("Location:index.php?ogc=".$orgcd);
    
    session_destroy();
    
?>