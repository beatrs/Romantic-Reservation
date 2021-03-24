<!-- <?php
    $host = "localhost";
    $db_uname = "root";
    $db_pass = "";
    $dbname = "proj";

    $conn = mysqli_connect($host, $db_uname, $db_pass);

    mysqli_select_db($conn, $dbname) or die(mysqli_error());
?> -->

<?php
    $host = "remotemysql.com";
    $db_uname = "ekv21T9b6c";
    $db_pass = "QtFE1IN5Bs";
    $dbname = "ekv21T9b6c";

    $conn = mysqli_connect($host, $db_uname, $db_pass);

    mysqli_select_db($conn, $dbname) or die(mysqli_error());
?>
