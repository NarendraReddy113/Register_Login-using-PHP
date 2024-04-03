<?php

    $hostName = "localhost";  // specify host name (ip address or domain)
    $dbUser   = "root";     // user name of the database
    $dbPassword   = "T#9758@qlph";        // password for the above user
    $dbName   = "login-register";  // your database name
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);  //Connect to the database  
    if( !$conn ) { die("Connection failed: ".mysql_error()); } else echo 'Connected successfully!';
?>