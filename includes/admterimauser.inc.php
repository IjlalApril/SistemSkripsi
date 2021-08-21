<?php

require_once 'functions.inc.php';

$userId = $_GET["userId"];

if (terimaAkunUser($userId) > 0) {
    echo "
        <script>
            alert ('Akun telah diterima!');
            document.location.href = '../pages/admAccounts.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Akun gagal diterima!');
            document.location.href = '../pages/admAccounts.php';
        </script>
        ";
}
