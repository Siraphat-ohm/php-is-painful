<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $hostname = "your_host";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_dbname";
    $port = //your_port;

    $conn = mysqli_connect($hostname, $username, $password, $dbname, $port);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>