<?php

require_once 'functions.inc.php';

$skripsiId = $_GET["skripsiId"];

if (tolakSkripsi($skripsiId) > 0) {
    echo "
        <script>
            alert ('Skripsi telah ditolak!');
            document.location.href = '../pages/admterimaskripsi.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Skripsi gagal ditolak!');
            document.location.href = '../pages/admterimaskripsi.php';
        </script>
        ";
}
