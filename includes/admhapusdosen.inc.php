<?php

require_once 'functions.inc.php';

$dosenId = $_GET["dosenId"];
$dosenPhoto = $_GET["dosenPhoto"];

$path = "C:/xampp/htdocs/webdev/project-b/assets/img/profiles/$dosenPhoto";

if (!unlink($path)) {
    echo "
    <script>
        alert ('Akun gagal dihapus!');
    </script>
    ";
    die;
} else {
    if (deleteDosen($dosenId) > 0) {
        echo "
        <script>
            alert ('Akun berhasil dihapus!');
            document.location.href = '../pages/admAccounts.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert ('Akun gagal dihapus!');
            document.location.href = '../pages/admAccounts.php';
        </script>
        ";
    }
}
