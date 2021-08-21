<?php
session_start();

$nama = $_SESSION["userName"];
$userUnique = $_SESSION["userUnique"];
$date = date("d-m-Y");

require_once "../includes/dbh.inc.php";
require_once '../includes/functions.inc.php';

$item = query("SELECT * FROM skripsi");

if (isset($_POST["submit"])) {
    $skripsiJudul = $_POST["skripsiJudul"];

    if (skripsiExist($conn, $skripsiJudul) !== false) {
        header("location:mhssubmitskripsi.php?error=skripsitaken");
        exit();
    }

    if (tambahSkripsi($_POST) > 0) {
        echo "
        <script>
            alert ('Data berhasil ditambahkan!');
            document.location.href = 'mhsskripsisaya.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Data gagal ditambahkan!');
            document.location.href = 'mhsskripsisaya.php';
        </script>
        ";
    }
};

?>

<?php
if (!isset($_SESSION["userStatus"])) {
    header("Location: ../index.php");
    exit;
} else {
    if ($_SESSION["userStatus"] === "mhs") {
        include "log/mhssubmitskripsi.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>