<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdConfirm = $_POST["pwdConfirm"];
    $photo = $_FILES['photo'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (invalidUid($username)) {
        header("location: ../pages/dsnregister.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email)) {
        header("location: ../pages/dsnregister.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdConfirm) !== false) {
        header("location: ../pages/dsnregister.php?error=passworddontmatch");
        exit();
    }
    if (uidExistDsn($conn, $username, $email) !== false) {
        header("location: ../pages/dsnregister.php?error=usernameoremailtaken");
        exit();
    }

    createDosen($conn, $name, $email, $username, $pwd, $photo);
} else {
    header("location: ../pages/dsnregisterdsn.php");
}
