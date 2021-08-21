<?php

require_once 'functions.inc.php';

$dosenId = $_GET["dosenId"];

if (terimaAkunDosen($dosenId) > 0) {
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
