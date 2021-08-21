<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Kontrol Skripsi - Sistem Skripsi Unsam</title>
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
                    <h1 class="mt-4">Kontrol Skripsi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><strong><?= $nama ?></strong>, Berikut adalah info tentang skripsi yang telah di terima.</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Kontrol Skripsi
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
                                        <th class="text-center">Jadwal Bimbingan</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Bidang Keilmuan</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Dosen Pembimbing</th>
                                        <th class="text-center">Jadwal Bimbingan</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center" colspan="3">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-hover">
                                    <?= $i = 1; ?>
                                    <?php foreach ($item as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i; ?></td>
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
                                            <td>
                                                <?php
                                                $skripsiId = $row['skripsiId'];
                                                $bimbingan = query("SELECT * FROM bimbingan WHERE skripsiId = $skripsiId")[0];
                                                echo $bimbingan["bimbinganStart"] . ' s/d ' . $bimbingan["bimbinganEnd"] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $file = $row["skripsiFile"];
                                                (strlen($file) > 13) ? $filed =  substr($file, 12, 7) . '...' . substr($file, 0 - 9) : $filed = $file;
                                                echo $filed
                                                ?>
                                            </td>
                                            <td class="text-center"><button class="btn btn-primary btn-block actionbtn"><a href="../assets/files/<?= $row["skripsiFile"]; ?>">View</a></button></td>
                                            <td class="text-center"><button class="btn btn-danger btn-block actionbtn"><a href="../includes/admtolakskripsi.inc.php?skripsiId=<?= $row["skripsiId"]; ?>" onclick="return confirm('Tolak skripsi: <?= $skripsiJudul; ?>?')">Tolak</a></button></td>
                                            <td class="text-center"><button class="btn btn-warning btn-block actionbtn"><a href="admeditskripsi.php?skripsiId=<?= $row["skripsiId"]; ?>" onclick="return confirm('Terima skripsi: <?= $skripsiJudul; ?>?')">Edit</a></button></td>
                                            <td class="text-center"><button class="btn btn-dark btn-block actionbtn"><a href="../includes/admhapusskripsi.inc.php?skripsiId=<?= $row["skripsiId"]; ?>&skripsiFile=<?= $row["skripsiFile"]; ?>" onclick="return confirm('Hapus <?php echo 'skripsi: ', $skripsiJudul; ?>?')">Hapus</a></button></td>
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