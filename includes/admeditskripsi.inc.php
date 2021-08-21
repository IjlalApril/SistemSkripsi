<?php

require_once 'functions.inc.php';

$skripsiId = $_GET["skripsiId"];
$dosenUnique = $_GET["dosenUnique"];

if (editSkripsi($skripsiId,$dosenUnique) > 0) {
    echo "
        <script>
            alert ('Skripsi telah diedit!');
            document.location.href = '../pages/admkontrolskripsi.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('Skripsi tidak diedit.');
            document.location.href = '../pages/admkontrolskripsi.php';
        </script>
        ";
}
