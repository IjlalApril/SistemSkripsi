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
                        <li class="breadcrumb-item active"><strong><?= $nama ?></strong>, Berikut adalah info tentang skripsi yang telah di submit. Disini anda dapat menerima atau menolak skripsi yang ada.</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Skripsi Saya
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Bidang Keilmuan</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Dosen Pembimbing</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Bidang Keilmuan</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Dosen Pembimbing</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-hover">
                                    <?= $i = 1; ?>
                                    <?php foreach ($item as $row) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= $skripsiJudul = $row["skripsiJudul"]; ?></td>
                                            <td><?= $row["bdgKeilmuan"]; ?></td>
                                            <td>
                                                <?php
                                                $userUnique = $row["userUnique"];
                                                $user = query("SELECT * FROM user WHERE userUnique = $userUnique")[0];
                                                echo $user["userName"];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $dosenUnique = $row["dosenUnique"];
                                                if ($dosenUnique === "0") {
                                                    echo "pending";
                                                } else {
                                                    $dosen = query("SELECT * FROM dosen WHERE dosenUnique = $dosenUnique")[0];
                                                    echo $dosen["dosenName"];
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row["skripsiDate"]; ?></td>
                                            <td><?= $row["skripsiFile"]; ?></td>
                                            <td class="text-center"><button class="btn btn-primary btn-block actionbtn"><a href="../assets/files/<?= $row["skripsiFile"]; ?>">View</a></button></td>
                                            <td><?= $row["skripsiStatus"]; ?></td>
                                            <td class="text-center"><button class="btn btn-success btn-block actionbtn"><a href="admterimaskripsicont.php?skripsiId=<?= $row["skripsiId"]; ?>&skripsiJudul=<?= $row["skripsiJudul"]; ?>" onclick="return confirm('Terima skripsi: <?= $skripsiJudul; ?>?')">Terima</a></button></td>
                                            <td class="text-center"><button class="btn btn-danger btn-block actionbtn"><a href="../includes/admtolakskripsi.inc.php?skripsiId=<?= $row["skripsiId"]; ?>" onclick="return confirm('Tolak skripsi: <?= $skripsiJudul; ?>?')">Tolak</a></button></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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