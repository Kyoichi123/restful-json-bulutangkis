<?php
include "Client.php";


if ($_POST['aksi'] == 'tambah_lapangan') {
    $uploadDir = 'assets/images/lapangan/'; // Sesuaikan dengan direktori tujuan

    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    // Periksa apakah file adalah file gambar
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    $fileExtension = pathinfo($gambar, PATHINFO_EXTENSION);

    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        die("Hanya file gambar dengan ekstensi jpg, jpeg, atau png yang diizinkan.");
    }

    $data = array(
        "id_lapangan" => $_POST['id_lapangan'],
        "nama_lapangan" => $_POST['nama_lapangan'],
        "jenis" => $_POST['jenis'],
        "harga" => $_POST['harga'],
        "deskripsi" => $_POST['deskripsi'],
        "gambar" => $gambar, // Ganti dengan nama file yang baru diunggah
        "aksi" => $_POST['aksi']
    );

    $abc->tambah_data_lapangan($data);

    // Pindahkan file yang diunggah ke direktori tujuan
    move_uploaded_file($gambar_tmp, $uploadDir . $gambar);

    header("location: lapangan.php");

} else if ($_POST['aksi'] == 'ubah_lapangan') {
    $data = array(
        "id_lapangan" => $_POST['id_lapangan'],
        "harga" => $_POST['harga'],
        "aksi" => $_POST['aksi']
    );

    $abc->ubah_data_lapangan($data);

    header("location: lapangan.php");
} else if ($_GET['aksi'] == 'hapus_lapangan') {
    $data = array(
        "id_lapangan" => $_GET['id_lapangan'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_data_lapangan($data);

    header("location: lapangan.php");
} else if ($_GET['aksi'] == 'hapus_user') {
    $data = array(
        "id_user" => $_GET['id_user'],
        "aksi" => $_GET['aksi']
    );
    $abc->hapus_data_user($data);

    header("location: user.php");
} else if ($_POST['aksi'] == 'ubah_user') {
    $data = array(
        "id_user" => $_POST['id_user'],
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "email" => $_POST['email'],
        "no_tlp" => $_POST['no_tlp'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );

    $abc->ubah_data_user($data);


    header("location: user.php");
} else if ($_POST['aksi'] == 'tambah_user') {

    $data = array(
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "email" => $_POST['email'],
        "no_tlp" => $_POST['no_tlp'],
        "username" => $_POST['username'], // Ganti dengan nama file yang baru diunggah
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );


    echo ("\n");
    echo $_POST['nama'];
    echo ("\n");
    echo $_POST['alamat'];
    echo ("\n");
    echo $_POST['email'];
    echo ("\n");
    echo $_POST['no_tlp'];
    echo ("\n");
    echo $_POST['username'];
    echo ("\n");
    echo $_POST['password'];
    echo ("\n");
    $abc->tambah_data_user($data);


    // Pindahkan file yang diunggah ke direktori tujua
    header("location: user.php");

} else if ($_POST['aksi'] == 'tambah_user_login') {

    $data = array(
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "email" => $_POST['email'],
        "no_tlp" => $_POST['no_tlp'],
        "username" => $_POST['username'], // Ganti dengan nama file yang baru diunggah
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );


    echo ("\n");
    echo $_POST['nama'];
    echo ("\n");
    echo $_POST['alamat'];
    echo ("\n");
    echo $_POST['email'];
    echo ("\n");
    echo $_POST['no_tlp'];
    echo ("\n");
    echo $_POST['username'];
    echo ("\n");
    echo $_POST['password'];
    echo ("\n");
    $abc->tambah_data_user_login($data);


    // Pindahkan file yang diunggah ke direktori tujua
    header("location: login.php");

} elseif ($_POST['aksi'] == 'tambah_admin') {
    $data = array(
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "email" => $_POST['email'],
        "no_tlp" => $_POST['no_tlp'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "aksi" => $_POST['aksi']
    );
    var_dump($data);
    $abc->tambah_data_admin($data);
    header("location: admin.php?page=daftar-data");
} else if ($_POST['aksi'] == 'ubah_booking') {
    echo $_POST['id_booking'];
    $data = array(

        "id_booking" => $_POST['id_booking'],
        "terbayarkan" => $_POST['terbayarkan'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_booking($data);
    header("location: data_booking.php");
} else if ($_POST['aksi'] == 'ubah_pemesanan') {
    echo $_POST['id_booking'];
    $data = array(

        "id_booking" => $_POST['id_booking'],
        "terbayarkan" => $_POST['terbayarkan'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_pemesanan($data);
    header("location: data_pemesanan.php");
} else if ($_POST['aksi'] == 'ubah_admin') {
    echo $_POST['id_booking'];
    $data = array(

        "id_user" => $_POST['id_user'],
        "nama" => $_POST['nama'],
        "aksi" => $_POST['aksi']
    );
    $abc->ubah_data_admin($data);
    header("location: admin.php?page=daftar-data");
} else if ($_POST['aksi'] == 'hapus_booking') {
    $data = array(
        "id_booking" => $_POST['id_booking'],
        "aksi" => $_POST['aksi']
    );
    var_dump($data);
    $abc->hapus_data_booking($data);
    header("location: data_booking.php");
} else if ($_POST['aksi'] == 'hapus_admin') {
    $data = array(
        "id_user" => $_POST['id_user'],
        "aksi" => $_POST['aksi']
    );
    var_dump($data);
    $abc->hapus_data_admin($data);
    header("location: data_booking.php?");
}
unset($abc, $data);
?>