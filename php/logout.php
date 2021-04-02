<?php
    session_start();
    //echo isset($_SESSION['login']);
    //echo var_dump($_SESSION['user']);
    unset($_SESSION['login']);
    unset($_SESSION['user']);
    //session_unset();
    //echo isset($_SESSION['login']);

    header("Location:../index.php");
?>