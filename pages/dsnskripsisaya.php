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
    if ($_SESSION["userStatus"] === "dsn") {
        $nama = $_SESSION["userName"];
        $userUnique = $_SESSION["userUnique"];

        $item = query("SELECT * FROM skripsi WHERE dosenUnique = $userUnique");
        include "log/dsnskripsisaya.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>