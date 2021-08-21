<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Register Mahasiswa - Sistem Skripsi Unsam</title>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "invaliduid") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>Masukkan Username dengan benar!</div>
                                        </div>";
                                } else if ($_GET["error"] == "invalidemail") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Masukkan Email dengan benar!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "passworddontmatch") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Password tidak cocok!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "stmtfailed") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Something went wrong, try again!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "usernameoremailtaken") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Email atau username telah dipilih, coba masukkan Email atau Username yang berbeda!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "none") {
                                    echo "<div class='card bg-success text-white mb-4'>
                                            <div class='card-body'>
                                            Akunmu telah disubmit, silahkan tunggu persetujuan akun anda!
                                            </div>
                                        </div>";
                                }
                            }
                            ?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Buat Akun Mahasiswa</h3>
                                </div>
                                <div class="card-body">
                                    <form action="../includes/mhsregister.inc.php" method="POST" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="name" name="name" type="text" placeholder="Masukkan nama lengkap anda" required />
                                                    <label for="name">Nama Lengkap</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="uid" name="uid" type="text" placeholder="Masukkan username anda" required />
                                                    <label for="uid">Username</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" required />
                                            <label for="email">Alamat E-Mail</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="pwd" name="pwd" type="password" placeholder="Buat password" required />
                                                    <label for="pwd">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="pwdConfirm" name="pwdConfirm" type="password" placeholder="Ulangi password" required />
                                                    <label for="pwdConfirm">Ulangi Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <label class="px-2" for="photo">Pilih foto profil (pasphoto) :</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control px-4 py-3" id="photo" name="photo" type="file" placeholder="Pilih foto profil"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" name="submit" class="btn btn-primary btn-block">Buat Akun</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="mhslogin.php">Sudah punya akun? Pergi ke Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
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