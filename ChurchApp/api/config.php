<?php

    error_reporting(E_ALL | E_STRICT); //E_ALL | E_STRICT
    set_time_limit ( 0 );
    ini_set('memory_limit', '2560M');

    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'karengat_cims');
    define('DB_PASSWORD', '#karengata#@cms#');
    define('DB_NAME', 'karengat_cims');
    define('DB_CHARSET', 'utf8'); //utf8mb4
    //define('DB_COLLATE', '');
    //charset=utf8

    /* Attempt to connect to MySQL database */
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if($conn === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
?>

