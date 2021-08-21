<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Accounts Control - Sistem Skripsi Unsam</title>
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
                    <h1 class="mt-4">Accounts Control</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"><strong><?= $nama ?></strong>, Berikut adalah list akun yang masuk ke dalam database sistem ini.</li>
                    </ol>
                    <div class="row mt-2">
                        <div class="col-10">
                            <h5 class="mx-4">1. Dosen Accounts</h5>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-dark btn-block actionbtn"><a href="#" id="dosentitle"><i class=" fas fa-search"></i> View</a></button>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-10">
                            <h5 class="mx-4">2. Mahasiswa Accounts</h5>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-dark btn-block actionbtn"><a href="#" id="usertitle"><i class=" fas fa-search"></i> View</a></button>
                        </div>
                    </div>
                    <div class="card mb-4 mt-md-3">
                        <div class="card-header" id="tabletitle">
                            <i class="fas fa-table me-1"></i>
                            Accounts Control
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Lengkap User</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Foto Profil</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Lengkap User</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Foto Profil</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-hover">
                                    <?= $i = 1; ?>
                                    <?php foreach ($dosens as $dsn) : ?>
                                        <tr class="accounts dosens visually-hidden">
                                            <td><?php echo $i; ?></td>
                                            <td><?= $dosenName = $dsn["dosenName"]; ?></td>
                                            <td><?= $dsn["dosenUid"]; ?></td>
                                            <td><?= $dsn["dosenEmail"]; ?></td>
                                            <td><img src="../assets/img/profiles/<?= $dsn["dosenPhoto"]; ?>" alt="<?= $dsn["dosenPhoto"]; ?>" width="70" height="70"></td>
                                            <td><?= $dsn["dosenRole"]; ?></td>
                                            <?php if ($dsn["dosenRole"] === 'non-active') {
                                                include 'akunbtn.php';
                                            } else {
                                                include 'akunbtndisable.php';
                                            }
                                            ?>
                                            <td class="text-center"><button class="btn btn-dark btn-block actionbtn"><a href="../includes/admhapusdosen.inc.php?dosenId=<?= $dsn["dosenId"]; ?>&dosenPhoto=<?= $dsn["dosenPhoto"]; ?>" onclick="return confirm('Hapus <?php echo 'akun: ', $dosenName; ?>?')">Hapus</a></button></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <?php foreach ($users as $usr) : ?>
                                        <tr class="accounts users visually-hidden">
                                            <td><?php echo $i; ?></td>
                                            <td><?= $userName = $usr["userName"]; ?></td>
                                            <td><?= $usr["userUid"]; ?></td>
                                            <td><?= $usr["userEmail"]; ?></td>
                                            <td><img src="../assets/img/profiles/<?= $usr["userPhoto"]; ?>" alt="<?= $usr["userPhoto"]; ?>" width="70" height="70"></td>
                                            <td><?= $usr["userActivation"]; ?></td>
                                            <?php if ($usr["userActivation"] === 'non-active') {
                                                include 'akunbtnUser.php';
                                            } else {
                                                include 'akunbtndisableUser.php';
                                            }
                                            ?>
                                            <td class="text-center"><button class="btn btn-dark btn-block actionbtn"><a href="../includes/admhapususer.inc.php?userId=<?= $usr["userId"]; ?>&userPhoto=<?= $usr["userPhoto"]; ?>" onclick="return confirm('Hapus <?php echo 'akun: ', $userName; ?>?')">Hapus</a></button></td>
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
    <script src="../assets/js/acc.js"></script>
</body>

</html>