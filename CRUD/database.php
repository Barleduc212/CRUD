<?php 

    $con = new PDO("mysql:host=localhost;dbname=;", "root", "password");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>