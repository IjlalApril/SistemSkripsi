<?php
session_start();

if (isset($_SESSION["userStatus"])) {
    header("Location: ../dash.php");
    exit;
} else {
    include "log/admlogin.log.php";
}
