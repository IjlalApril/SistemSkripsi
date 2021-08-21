<?php

if (isset($_POST["submit"])) {

    $username = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginDosen($conn, $username, $pwd);
} else {
    header("location:../pages/dsnlogin.php");
}
