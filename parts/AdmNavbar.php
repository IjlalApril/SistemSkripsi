<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Home</div>
            <a class="nav-link" href="../dash.php">
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
                    <a class="nav-link" href="admkontrolskripsi.php">Kontrol Skripsi</a>
                    <a class="nav-link" href="admterimaskripsi.php">Terima Judul Skripsi</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Bimbingan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link" href="admprogressbimbingan.php">Progress Bimbingan</a>
                    <a class="nav-link" href="admlaporanbimbingan.php">Laporan Bimbingan</a>
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