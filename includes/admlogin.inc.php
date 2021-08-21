<?php

if (isset($_POST["submit"])) {

    $username = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    loginAdm($conn, $username, $pwd);
} else {
    header("location:../pages/admlogin.php");
}
