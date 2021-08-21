<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 d-flex align-items-center" href="../dash.php">
        <img src="../assets/img/INFORMATIKA.png" width="38" height="38" alt="">
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
                <?php
                if ($_SESSION["userStatus"] === "adm") {
                    echo '<li><a class="dropdown-item" href="profile.php">Profile</a></li>';
                    echo '<li><a class="dropdown-item" href="admAccounts.php">Accounts Control</a></li>';
                    echo '<li><a class="dropdown-item" href="#">Notification</a></li>';
                } else {
                    echo '<li><a class="dropdown-item" href="profile.php">Profile</a></li>';
                    echo '<li><a class="dropdown-item" href="#">Notification</a></li>';
                }
                ?>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="../includes/logout.inc.php">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>