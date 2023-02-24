<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "hospital";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);        
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExeption $e) {
        echo $e->getMessage();
    }
?>