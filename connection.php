<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'login';



    // processar php
    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName, 3307);
    if($connection->connect_error) {
        echo "$connection->connect_error";
        die("Connection failed: " . $connection->connect_error);
    }
?>