<?php

require_once 'functions.inc.php';

$skripsiId = $_GET["skripsiId"];
$dosenUnique = $_GET["dosenUnique"];

if (terimaSkripsi($skripsiId,$dosenUnique) > 0) {
    echo "
        <script>
            alert ('Skripsi telah diterima!');
            document.location.href = '../pages/admterimaskripsi.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Skripsi gagal diterima!');
            document.location.href = '../pages/admterimaskripsi.php';
        </script>
        ";
}
