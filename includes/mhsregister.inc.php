<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (invalidUid($username)) {
        header("location: ../pages/mhsregister.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email)) {
        header("location: ../pages/mhsregister.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdConfirm) !== false) {
        header("location: ../pages/mhsregister.php?error=passworddontmatch");
        exit();
    }
    if (uidExist($conn, $username, $email) !== false) {
        header("location: ../pages/mhsregister.php?error=usernameoremailtaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd, $photo);
} else {
    header("location: ../pages/registermhs.php");
}
