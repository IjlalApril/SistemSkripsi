<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Terima Skripsi - Sistem Skripsi Unsam</title>
</head>

<body class="sb-nav-fixed">
    <?php
    include "../parts/Header.php";
    ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php
            include "../parts/AdmNavbar.php";
            ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Terima Skripsi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><strong><?= $nama ?></strong>, Silahkan isi data bimbingan dari skripsi: <strong><?= $skripsiJudul ?></strong>.</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="skripsiId" name="skripsiId" type="text" placeholder="SkripsiId" hidden value="<?= $skripsiId ?>" />
                                </div>
                                <div class="row mb-3" id="standard-row">
                                    <div class="col standard-col">
                                        <select class="form-select form-select-lg" id="dosenUnique" name="dosenUnique" aria-label=".form-select-lg example" required>
                                            <option class="from-control" value="">Pilih Dosen Pembimbing :</option>
                                            <?= $i = 1; ?>
                                            <?php foreach ($dosen as $row) : ?>
                                                <option value="<?= $row["dosenUnique"] ?>"><?= $row["dosenName"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <label class="px-2" for="bimbinganStart">Tanggal mulai bimbingan :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control px-4 py-3 text-center" id="bimbinganStart" name="bimbinganStart" type="date" placeholder="Pilih tanggal mulai bimbingan" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <label class="px-2" for="bimbinganEnd">Tanggal bimbingan berakhir :</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control px-4 py-3 text-center" id="bimbinganEnd" name="bimbinganEnd" type="date" placeholder="Pilih tanggal bimbingan berakhir" />
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