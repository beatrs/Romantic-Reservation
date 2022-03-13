<?php
    /* $host = "localhost";
    $db_uname = "root";
    $db_pass = "";
    $dbname = "proj";

    $conn = mysqli_connect($host, $db_uname, $db_pass);

    mysqli_select_db($conn, $dbname) or die(mysqli_error());  */
?>

<?php

    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();


    $host = $_ENV["DB_HOST"];
    $db_uname = $_ENV["DB_USERNAME"];
    $db_pass = $_ENV["DB_PASSWORD"];
    $dbname = $_ENV["DB_NAME"];

    $conn = mysqli_connect($host, $db_uname, $db_pass);

    mysqli_select_db($conn, $dbname) or die(mysqli_error());
?>
