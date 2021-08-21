<?php
session_start();

require_once "../includes/dbh.inc.php";
require_once '../includes/functions.inc.php';

?>

<?php
if (!isset($_SESSION["userStatus"])) {
    header("Location: ../index.php");
    exit;
} else {
    if ($_SESSION["userStatus"] === "adm") {
        $nama = $_SESSION["userName"];
        $unique = $_SESSION["userUnique"];
        $users = query("SELECT * FROM user");
        $dosens = query("SELECT * FROM dosen WHERE dosenUnique != $unique");
        include "log/admAccounts.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>