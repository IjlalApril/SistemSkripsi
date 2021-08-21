<?php

require_once 'dbh.inc.php';

// membuat function query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// mengecek username
function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// mengecek email
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// mengecek password
function pwdmatch($pwd, $pwdConfirm)
{
    $result;
    if ($pwd !== $pwdConfirm) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

// mengecek keorisinalan username dan email user
function uidExist($conn, $username, $email)
{
    $sql = "SELECT * FROM user WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/mhsregister.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// mengecek keorisinalan username dan email user
function uidExistDsn($conn, $username, $email)
{
    $sql = "SELECT * FROM dosen WHERE dosenUid = ? OR dosenEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/dsnregister.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function skripsiExist($conn, $skripsiJudul)
{
    $sql = "SELECT * FROM skripsi WHERE skripsiJudul = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: mhssubmitskripsi.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $skripsiJudul);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// membuat data user baru di database
function createUser($conn, $name, $email, $username, $pwd, $photo)
{
    $sql = "INSERT INTO user (userUnique,userName,userUid,userEmail,userPwd,userPhoto) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/mhsregister.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $random_id = rand(time(), 10000000);

    $photo = uploadPhoto();
    if (!$photo) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $random_id, $name, $username, $email, $hashedPwd, $photo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/mhsregister.php?error=none");
    exit();
}

// membuat data dosen baru di database
function createDosen($conn, $name, $email, $username, $pwd, $photo)
{
    $sql = "INSERT INTO dosen (dosenUnique,dosenName,dosenUid,dosenEmail,dosenPwd,dosenPhoto) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/dsnregister.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $random_id = rand(time(), 10000000);

    $photo = uploadPhoto();
    if (!$photo) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssssss", $random_id, $name, $username, $email, $hashedPwd, $photo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../pages/dsnregister.php?error=none");
    exit();
}

// mengecek foto profil yang disubmit
function uploadPhoto()
{
    $namaPhoto   = $_FILES['photo']['name'];
    $ukuranPhoto = $_FILES['photo']['size'];
    $error      = $_FILES['photo']['error'];
    $tmpName    = $_FILES['photo']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert ('Pilih file anda terlebih dahulu!');
        </script>
        ";
        return false;
    }

    $ekstensiPhotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiPhoto = explode('.', $namaPhoto);
    $ekstensiPhoto = strtolower(end($ekstensiPhoto));
    if (!in_array($ekstensiPhoto, $ekstensiPhotoValid)) {
        echo "
        <script>
            alert ('Pastikan anda mengupload jpg, jpeg, atau png!');
        </script>
        ";
        return false;
    }

    if ($ukuranPhoto > 10000000) {
        echo "
        <script>
            alert ('Ukuran Photo terlalu besar!');
        </script>
        ";
        return false;
    }

    $time = time();
    $namaPhotoBaru = "(" . $time . ")" . $namaPhoto;

    move_uploaded_file($tmpName, '../assets/img/profiles/' . $namaPhotoBaru);

    return $namaPhotoBaru;
}

// function login user
function loginUser($conn, $username, $pwd)
{
    $uidExist = uidExist($conn, $username, $username);
    if ($uidExist === false) {
        header("location: ../pages/mhslogin.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../pages/mhslogin.php?error=wrongpwd");
        exit();
    } else if ($checkPwd === true) {
        if ($uidExist["userActivation"] === "active") {
            session_start();
            $_SESSION["userName"] = $uidExist["userName"];
            $_SESSION["userUnique"] = $uidExist["userUnique"];
            $_SESSION["userStatus"] = 'mhs';
            header("location: ../dash.php");
        } else if ($uidExist["userActivation"] === "non-active") {
            header("location: ../pages/mhslogin.php?error=non-active");
            exit();
        }
    }
}

// function login dosen
function loginDosen($conn, $username, $pwd)
{
    $uidExist = uidExistDsn($conn, $username, $username);
    if ($uidExist === false) {
        header("location: ../pages/dsnlogin.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["dosenPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../pages/dsnlogin.php?error=wrongpwd");
        exit();
    } else if ($checkPwd === true) {
        if ($uidExist["dosenRole"] === "Dosen") {
            session_start();
            $_SESSION["userName"] = $uidExist["dosenName"];
            $_SESSION["userUnique"] = $uidExist["dosenUnique"];
            $_SESSION["userStatus"] = 'dsn';
            header("location: ../dash.php");
        } else if ($uidExist["dosenRole"] === "non-active") {
            header("location: ../pages/dsnlogin.php?error=non-active");
            exit();
        } else {
            header("location: ../pages/dsnlogin.php?error=wronglogin");
            exit();
        }
    }
}

// function login admin
function loginAdm($conn, $username, $pwd)
{
    $uidExist = uidExistDsn($conn, $username, $username);
    if ($uidExist === false) {
        header("location: ../pages/admlogin.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExist["dosenPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../pages/admlogin.php?error=wrongpwd");
        exit();
    } else if ($checkPwd === true) {
        if ($uidExist["dosenRole"] === "Admin") {
            session_start();
            $_SESSION["userName"] = $uidExist["dosenName"];
            $_SESSION["userUnique"] = $uidExist["dosenUnique"];
            $_SESSION["userStatus"] = 'adm';
            header("location: ../dash.php");
        } else if ($uidExist["dosenRole"] === "non-active") {
            header("location: ../pages/admlogin.php?error=non-active");
            exit();
        } else {
            header("location: ../pages/admlogin.php?error=wronglogin");
            exit();
        }
    }
}








function emptyInput($subStandard1)
{
    $result;
    if (empty($subStandard1)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function tambahSkripsi($data)
{
    global $conn;

    $judul          = $data["skripsiJudul"];
    $uploader       = $data["uploader"];
    $date           = date('d-m-Y', strtotime($data["skripsiDate"]));
    $bdgKeilmuan    = $data["bdgKeilmuan"];

    $file = uploadSkripsi();
    if (!$file) {
        return false;
    }


    $query = "INSERT INTO skripsi VALUES ('','$uploader','','$judul','$bdgKeilmuan','$date','$file','pending')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function uploadSkripsi()
{
    $namaFile   = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $error      = $_FILES['file']['error'];
    $tmpName    = $_FILES['file']['tmp_name'];

    if ($error === 4) {
        echo "
        <script>
            alert ('Pilih file anda terlebih dahulu!');
        </script>
        ";
        return false;
    }

    $ekstensiFileValid = ['pdf'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
            alert ('Pastikan anda mengupload PDF!');
        </script>
        ";
        return false;
    }

    if ($ukuranFile > 30000000) {
        echo "
        <script>
            alert ('Ukuran file terlalu besar!');
        </script>
        ";
        return false;
    }

    $time = time();
    $namaFileBaru = "(" . $time . ")" . $namaFile;

    move_uploaded_file($tmpName, '../assets/files/' . $namaFileBaru);

    return $namaFileBaru;
}

function tolakSkripsi($skripsiId)
{
    global $conn;

    $query = "UPDATE skripsi SET skripsiStatus = 'Ditolak' WHERE skripsiId = $skripsiId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function terimaSkripsi($skripsiId, $dosenUnique)
{
    global $conn;

    $query = "UPDATE skripsi SET dosenUnique = '$dosenUnique', skripsiStatus = 'Diterima' WHERE skripsiId = $skripsiId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editSkripsi($skripsiId, $dosenUnique)
{
    global $conn;

    $query = "UPDATE skripsi SET dosenUnique = '$dosenUnique' WHERE skripsiId = $skripsiId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteSkripsi($skripsiId)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM skripsi WHERE skripsiId = $skripsiId");

    return mysqli_affected_rows($conn);
}


function tambahBimbingan($data)
{
    global $conn;

    $skripsiId          = $data["skripsiId"];
    $bimbinganStart     = date('d-m-Y', strtotime($data["bimbinganStart"]));
    $bimbinganEnd       = date('d-m-Y', strtotime($data["bimbinganEnd"]));


    $query = "INSERT INTO bimbingan VALUES ('','$skripsiId','$bimbinganStart','$bimbinganEnd','Sedang berjalan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editBimbingan($data)
{
    global $conn;

    $skripsiId          = $data["skripsiId"];
    $bimbinganStart     = date('d-m-Y', strtotime($data["bimbinganStart"]));
    $bimbinganEnd       = date('d-m-Y', strtotime($data["bimbinganEnd"]));


    $query = "UPDATE bimbingan SET bimbinganStart = '$bimbinganStart', bimbinganEnd = '$bimbinganEnd' WHERE skripsiId = $skripsiId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function terimaAkunDosen($dosenId)
{
    global $conn;

    $query = "UPDATE dosen SET  dosenRole = 'Dosen' WHERE dosenId = $dosenId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteDosen($dosenId)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE dosenId = $dosenId");

    return mysqli_affected_rows($conn);
}


function terimaAkunUser($userId)
{
    global $conn;

    $query = "UPDATE user SET  userActivation = 'active' WHERE userId = $userId";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteUser($userId)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE userId = $userId");

    return mysqli_affected_rows($conn);
}
