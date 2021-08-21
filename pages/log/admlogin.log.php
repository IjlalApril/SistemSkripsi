<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "../parts/Head.php";
    ?>
    <title>Login Admin - Sistem Skripsi Unsam</title>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "wronglogin") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>Username / E-mail salah!</div>
                                        </div>";
                                } else if ($_GET["error"] == "wrongpwd") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Password salah!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "stmtfailed") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Something went wrong, try again!
                                            </div>
                                        </div>";
                                } else if ($_GET["error"] == "non-active") {
                                    echo "<div class='card bg-danger text-white mb-4'>
                                            <div class='card-body'>
                                            Akun anda belum disetujui oleh admin!
                                            </div>
                                        </div>";
                                }
                            }
                            ?>
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login Admin</h3>
                                </div>
                                <div class="card-body">
                                    <form action="../includes/admlogin.inc.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" type="text" placeholder="name@example.com" required />
                                            <label for="email">Username/E-mail</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="pwd" name="pwd" type="password" placeholder="Password" required />
                                            <label for="pwd">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
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