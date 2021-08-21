<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Sistem Skripsi Unsam</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/styles1.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 d-flex align-items-center" href="../dash.php">
            <img src="assets/img/INFORMATIKA.png" width="38" height="38" alt="">
            <span class="mx-3">Sistem Skripsi</span>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="pages/profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="pages/admAccounts.php">Accounts Control</a></li>
                    <li><a class="dropdown-item" href="#">Notification</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="includes/logout.inc.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Home</div>
                        <a class="nav-link" href="dash.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Skripsi dan Bimbingan</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#skripsi" aria-expanded="false" aria-controls="skripsi">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Skripsi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="skripsi" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="pages/admkontrolskripsi.php">Kontrol Skripsi</a>
                                <a class="nav-link" href="pages/admterimaskripsi.php">Terima Judul Skripsi</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Bimbingan
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="pages/admprogressbimbingan.php">Progress Bimbingan</a>
                                <a class="nav-link" href="pages/admlaporanbimbingan.php">Laporan Bimbingan</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <p id="usersname" class="mb-0">
                        <?=
                        $nama;
                        ?>
                    </p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Berikut adalah semua data dari List Standard yang telah di upload.</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Standards
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Dosen Pembimbing</th>
                                        <th class="text-center">Bidang Keilmuan</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Judul Skripsi</th>
                                        <th class="text-center">Nama Mahasiswa</th>
                                        <th class="text-center">Dosen Pembimbing</th>
                                        <th class="text-center">Bidang Keilmuan</th>
                                        <th class="text-center">Tanggal Pengajuan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" colspan="2">Lampiran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="table-hover">
                                    <?= $i = 1; ?>
                                    <?php foreach ($item as $row) : ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?= $skripsiJudul = $row["skripsiJudul"]; ?></td>
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
                                            <td><?= $row["bdgKeilmuan"]; ?></td>
                                            <td><?= $row["skripsiDate"]; ?></td>
                                            <td><?= $row["skripsiStatus"]; ?></td>
                                            <td><?= $row["skripsiFile"]; ?></td>
                                            <td class="text-center"><button class="btn btn-primary btn-block actionbtn"><a href="../assets/files/<?= $row["skripsiFile"]; ?>">View</a></button></td>
                                            <td><button class="btn btn-dark btn-block actionbtn"><a href="includes/admhapusskripsi.inc.php?skripsiId=<?= $row["skripsiId"]; ?>&skripsiFile=<?= $row["skripsiFile"]; ?>" onclick="return confirm('Hapus <?php echo 'skripsi: ', $skripsiJudul; ?>?')">Hapus</a></button></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Informatika Unsam</div>
                        <div>
                            <a href="#">2M Dev Team</a>
                            &middot;
                            <a href="#">Reconnecthink</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assets/js/datatables-simple-demo.js"></script>
</body>

</html>