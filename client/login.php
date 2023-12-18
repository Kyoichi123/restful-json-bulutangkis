<?php
session_start();
include "Client.php";
if (isset($_SESSION["login_admin"])) {
    header("Location:admin.php");
    exit;
}
if (isset($_SESSION["login_penyewa"])) {
    header("Location:admin.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"]; // Perbaikan typo: "pasword" menjadi "password"

    $r = $abc->cek_user($username, $password);

    // Cek apakah $r adalah objek
    if (is_object($r)) {
        // Cek apakah password cocok
        if ($password == $r->password) {
            // Cek role_id
            if ($r->role_id == '1') {
                // Set session admin
                $_SESSION["login_admin"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["id_user"] = $r->role_id;


                header("Location: admin.php");
                exit;
            } elseif ($r->role_id == '2') {
                // Set session penyewa
                $_SESSION["login_penyewa"] = true;
                $_SESSION["username"] = $r->nama;
                $_SESSION["id_user"] = $r->id_user;
                header("Location: lapangan_user.php");
                exit;
            }
        } else {
            $error = "Password salah";
        }
    } else {
        $error = "Username tidak ditemukan";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">

                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                    <?php if (isset($error)): ?>
                        <p class="text-danger">Username tidak terdaftar</p>
                    <?php endif ?>
                    <form method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <h4><a href="register.php">Register</a></h4>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="login">Log in</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>