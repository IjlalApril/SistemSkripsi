<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Submit Skripsi - Sistem Skripsi Unsam</title>
</head>

<body class="sb-nav-fixed">
    <?php
    include "../parts/Header.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            include "../parts/MhsNavbar.php";
            ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "skripsitaken") {
                            echo "<div class='card bg-danger text-white mb-4'>
                                    <div class='card-body'>Judul skripsi yang anda masukkan sudah ada! Silahkan cari judul lainnya!</div>
                                </div>";
                        }
                    }
                    ?>
                    <h1 class="mt-4">Submit Skripsi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><strong><?= $nama ?></strong>, Silahkan isi form berikut untuk mengajukan Judul Skripsi anda.</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="skripsiJudul" name="skripsiJudul" type="text" placeholder="Masukkan judul berkas" required />
                                    <label for="skripsiJudul">Judul Skripsi</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="uploader" name="uploader" type="text" placeholder="Masukkan nama lengkap anda" hidden value="<?= $userUnique ?>" />
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="skripsiDate" name="skripsiDate" type="text" placeholder="Masukkan tanggal" hidden value="<?= $date ?>" />
                                </div>
                                <div class="row mb-3" id="standard-row">
                                    <div class="col standard-col">
                                        <select class="form-select form-select-lg" id="bdgKeilmuan" name="bdgKeilmuan" aria-label=".form-select-lg example" required>
                                            <option class="stdsel" value="">Pilih Bidang Keilmuan :</option>
                                            <option class="stdsel" value="Sistem/Komputasi Cerdas">Sistem/Komputasi Cerdas</option>
                                            <option class="stdsel" value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                            <option class="stdsel" value="Multimedia">Multimedia</option>
                                            <option class="stdsel" value="Jaringan Komputer">Jaringan Komputer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <label class="px-2" for="file">Pilih File (pdf, size < 30mb ) :</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control px-4 py-3" id="file" name="file" type="file" placeholder="Pilih file anda"/>
                                                </div>
                                            </div>
                                        </div>
                                <div class="mt-4 mb-0">
                                    <div class="d-grid"><button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php
            include "../parts/Footer.php"
            ?>
        </div>
    </div>
    <?php
    include "../parts/Foot.php";
    ?>
</body>

</html>