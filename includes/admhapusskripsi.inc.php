<?php

require_once 'functions.inc.php';

$skripsiId = $_GET["skripsiId"];
$skripsiFile = $_GET["skripsiFile"];

$path = "C:/xampp/htdocs/webdev/project-b/assets/files/$skripsiFile";

if (!unlink($path)){
    echo "
    <script>
        alert ('Data gagal dihapus!');
    </script>
    ";die;
} else {
    if( deleteSkripsi($skripsiId) > 0) {
        echo "
        <script>
            alert ('Data berhasil dihapus!');
            document.location.href = '../dash.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Data gagal dihapus!');
            document.location.href = '../dash.php';
        </script>
        ";
    }
}