<?php

include 'Client.php';

// require 'function.php';
// if (isset($_POST['bttambah'])) {
//     // lakukan pengecekan apakah data sudah ada di database
//     $query = "SELECT * FROM user WHERE username='$_POST[username]'";
//     $result = mysqli_query($conn, $query);

//     if (mysqli_num_rows($result) > 0) {
//         // data sudah ada di database, tampilkan pesan error
//         echo "
//         <script>
//         alert('Data dengan username yang sama sudah ada di database');
//         document.location.href='admin.php';
//         </script>";
//     } else {
//         $pas = $_POST['password'];
//         $simpan = mysqli_query($conn, "INSERT INTO user (nama,role_id,alamat,email,no_tlp,username,password)
//     VALUES ('$_POST[nama]','2','$_POST[alamat]','$_POST[email]','$_POST[phone]','$_POST[username]','$pas')");

//         // var_dump($_POST['email']);
//         if ($simpan) {
//             echo "
//             <script>
//             alert('berhasil membuat akun');
//             document.location.href='login.php';
//             </script>";
//         } else {
//             echo "
//             <script>
//             alert('data gagal disimpan'  )</script>
//             document.location.href='login.php';
//             ";
//         }
//     }
// }

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
            <div class="col-lg-5 col-12 mb-0">
                <div id="auth-left">

                    <h1 class="auth-title mt-0">Register.</h1>
                    <p class="auth-subtitle mb-0">Silahkan isi data.</p>

                    <?php if (isset($error)): ?>
                    <p class="text-danger">Error Boy</p>
                    <?php endif ?>
                    <form action="proses.php" method="POST">
                        <input type="hidden" name="aksi" value="tambah_user_login" />
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="alamat" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="no_tlp" required>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2"
                            name="tambah_user_login">Register</button>
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