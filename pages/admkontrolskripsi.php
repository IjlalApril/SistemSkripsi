<?php
session_start();

$nama = $_SESSION["userName"];

require_once "../includes/dbh.inc.php";
require_once '../includes/functions.inc.php';

$item = query("SELECT * FROM skripsi WHERE skripsiStatus != 'pending'");

?>

<?php
if (!isset($_SESSION["userStatus"])) {
    header("Location: ../index.php");
    exit;
} else {
    if ($_SESSION["userStatus"] === "adm") {
        include "log/admkontrolskripsi.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>