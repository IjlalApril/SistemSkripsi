<?php
session_start();

$nama = $_SESSION["userName"];

require_once "../includes/dbh.inc.php";
require_once '../includes/functions.inc.php';

$skripsiId = $_GET["skripsiId"];
$skripsiJudul = $_GET["skripsiJudul"];

$item = query("SELECT * FROM skripsi");
$dosen = query("SELECT * FROM dosen WHERE dosenRole = 'Dosen'");

if (isset($_POST["submit"])) {
    $skripsiId = $_POST["skripsiId"];
    $dosenUnique = $_POST["dosenUnique"];

    if (tambahBimbingan($_POST) > 0) {
        echo "
        <script>
            alert ('Data berhasil ditambahkan!');
            document.location.href = '../includes/admterimaskripsi.inc.php?skripsiId=$skripsiId&dosenUnique=$dosenUnique';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Data gagal ditambahkan!');
            document.location.href = 'admterimaskripsi.php';
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
    if ($_SESSION["userStatus"] === "adm") {
        include "log/admterimaskripsicont.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>