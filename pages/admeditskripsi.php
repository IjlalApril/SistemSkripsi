<?php
session_start();

$nama = $_SESSION["userName"];

require_once "../includes/dbh.inc.php";
require_once '../includes/functions.inc.php';

$skripsiId = $_GET["skripsiId"];

$skripsi = query("SELECT * FROM skripsi WHERE skripsiId = '$skripsiId'")[0];
$bimbingan = query("SELECT * FROM bimbingan WHERE skripsiId = '$skripsiId'")[0];
$dosen = query("SELECT * FROM dosen WHERE dosenRole = 'Dosen'");

if (isset($_POST["submit"])) {
    $skripsiId = $_POST["skripsiId"];
    $dosenUnique = $_POST["dosenUnique"];

    if (editBimbingan($_POST) > 0) {
        echo "
        <script>
            alert ('Bimbingan berhasil diedit!');
            document.location.href = '../includes/admeditskripsi.inc.php?skripsiId=$skripsiId&dosenUnique=$dosenUnique';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Bimbingan tidak diedit.');
            document.location.href = '../includes/admeditskripsi.inc.php?skripsiId=$skripsiId&dosenUnique=$dosenUnique';
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
        include "log/admeditskripsi.log.php";
    } else {
        header("Location: ../dash.php");
    }
}

?>