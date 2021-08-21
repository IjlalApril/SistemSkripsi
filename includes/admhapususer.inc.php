<?php

require_once 'functions.inc.php';

$userId = $_GET["userId"];
$userPhoto = $_GET["userPhoto"];

$path = "C:/xampp/htdocs/webdev/project-b/assets/img/profiles/$userPhoto";

if (!unlink($path)) {
    echo "
    <script>
        alert ('Akun gagal dihapus!');
    </script>
    ";
    die;
} else {
    if (deleteUser($userId) > 0) {
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
