<?php
error_reporting(1);
include "Database.php";
$abc = new Database();

if (isset($_SERVER['HTTP_ORIGIN'])) {
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header('Access-Control-Allow-Credentials: true');
	header('Access-Control-Max-Age: 86400'); // cache for 1 day
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
		header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
	exit(0);
}
$postdata = file_get_contents("php://input");

// function untuk menghapus selain huruf dan angka
function filter($data)
{
	$data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
	return $data;
	unset($data);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$data = json_decode($postdata);
	$id_lapangan = $data->id_lapangan;
	$nama_lapangan = $data->nama_lapangan;
	$jenis = $data->jenis;
	$harga = $data->harga;
	$deskripsi = $data->deskripsi;
	$aksi = $data->aksi;
	$gambar = $data->gambar;

	$id_user = $data->id_user;
	$nama = $data->nama;
	$alamat = $data->alamat;
	$email = $data->email;
	$no_tlp = $data->no_tlp;
	$username = $data->username;
	$password = $data->password;

	$id_booking = $data->id_booking;
	$terbayarkan = $data->terbayarkan;





	if ($aksi == 'tambah_lapangan') {
		$data2 = array(


			'id_lapangan' => $id_lapangan,
			'nama_lapangan' => $nama_lapangan,
			'jenis' => $jenis,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'gambar' => $gambar,
		);
		$abc->tambah_data_lapangan($data2);
	} elseif ($aksi == 'ubah_lapangan') {
		$data2 = array(
			'id_lapangan' => $id_lapangan,
			'harga' => $harga
		);
		$abc->ubah_data_lapangan($data2);


	} elseif ($aksi == 'hapus_lapangan') {
		$abc->hapus_data_lapangan($id_lapangan);


	} elseif ($aksi == 'hapus_user') {
		$abc->hapus_data_user($id_user);


	} elseif ($aksi == 'ubah_user') {
		$data2 = array(
			'id_user' => $id_user,
			'nama' => $nama,
			'alamat' => $alamat,
			'email' => $email,
			'no_tlp' => $no_tlp,
			'username' => $username,
			'password' => $password,
		);
		$abc->ubah_data_user($data2);


	} elseif ($aksi == 'tambah_user') {
		$data2 = array(


			'id_user' => $id_user,
			'nama' => $nama,
			'alamat' => $alamat,
			'email' => $email,
			'no_tlp' => $no_tlp,
			'username' => $username,
			'password' => $password
		);
		$abc->tambah_data_user($data2);
	} elseif ($aksi == 'tambah_user_login') {
		$data2 = array(


			'id_user' => $id_user,
			'nama' => $nama,
			'alamat' => $alamat,
			'email' => $email,
			'no_tlp' => $no_tlp,
			'username' => $username,
			'password' => $password
		);
		$abc->tambah_data_user_login($data2);
	} elseif ($aksi == 'tambah_admin') {
		$data2 = array(
			"nama" => $data->nama,
			"alamat" => $data->alamat,
			"email" => $data->email,
			"no_tlp" => $data->no_tlp,
			"username" => $data->username,
			"password" => $data->password,
		);
		$abc->tambah_data_admin($data2);
	} elseif ($aksi == 'pesan_lapangan') {
		$data2 = array(
			"id_user" => $data->id_user,
			"id_lapangan" => $data->id_lapangan,
			"tgl_pemesanan" => $data->tgl_pemesanan,
			"tgl_main" => $data->tgl_main,
			"jam_main" => $data->jam_main,
		);
		$abc->pesan_lapangan($data2);
	} elseif ($aksi == 'ubah_booking') {
		$data2 = array(
			'id_booking' => $id_booking,
			'terbayarkan' => $terbayarkan
		);
		$abc->ubah_data_booking($data2);
	} elseif ($aksi == 'ubah_pemesanan') {
		$data2 = array(
			'id_booking' => $id_booking,
			'terbayarkan' => $terbayarkan
		);
		$abc->ubah_data_pemesanan($data2);
	} elseif ($aksi == 'ubah_admin') {
		$data2 = array(
			'id_user' => $data->id_user,
			'nama' => $data->nama
		);
		$abc->ubah_data_admin($data2);
	} elseif ($aksi == 'login') {
		$data2 = array(
			'username' => $data->username,
			'password' => $data->password
		);
		$data3 = $abc->cek_user($data2);
		http_response_code(200);
		echo json_encode(
			array(
				"username" => $data3['username'],
				"id_user" => $data3['id_user'],
				"password" => $data3['password'],
				"nama" => $data3['nama'],
				"alamat" => $data3['alamat'],
				"email" => $data3['email'],
				"no_tlp" => $data3['no_tlp'],
				"role_id" => $data3['role_id']
			)
		);
	} elseif ($aksi == 'hapus_booking') {
		$abc->hapus_data_booking($id_booking);
	} elseif ($aksi == 'hapus_admin') {
		$abc->hapus_data_admin($data->id_user);
	}


	// hapus variable dari memory
	unset($postdata, $data, $data2, $id_lapangan, $nama_lapangan, $jenis, $harga, $deskripsi, $gambar, $aksi, $abc, $id_user, $nama, $alamat, $email, $no_tlp, $username, $password);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if (($_GET['aksi'] == 'tampil') and (isset($_GET['id_lapangan']))) {
		$id_lapangan = filter($_GET['id_lapangan']);
		$data = $abc->tampil_data_lapangan($id_lapangan);
		echo json_encode($data);
	} elseif (($_GET['aksi'] == 'tampil_user') and (isset($_GET['id_user']))) {
		$id_user = filter($_GET['id_user']);
		$data = $abc->tampil_data_user($id_user);
		echo json_encode($data);
	} elseif ($_GET['aksi'] == 'tampil_lapangan') //menampilkan semua data 
	{

		$data = $abc->tampil_semua_data_lapangan();
		echo json_encode($data);

	} elseif ($_GET['aksi'] == 'tampil_user') {
		$data = $abc->tampil_semua_data_user();
		echo json_encode($data);
	} elseif (($_GET['aksi'] == 'tampil_admin')) {
		$data = $abc->tampil_data_admin();
		echo json_encode($data);
	} elseif (($_GET['aksi'] == 'tampil_pemesanan' and (isset($_GET['id_user'])))) {
		$data = $abc->tampil_data_pemesanan($_GET['id_user']);
		echo json_encode($data);
	} elseif (($_GET['aksi'] == 'tampil_lapangan')) {
		$data = $abc->tampil_data_lapangan();
		echo json_encode($data);
	} elseif (($_GET['aksi'] == 'tampil_jadwal')) {
		$data = $abc->cek_jadwal_lapangan($_GET['id_lapangan'], $_GET['jam_main'], $_GET['tgl_main']);
		echo json_encode($data);
	} else  //menampilkan semua data 
	{
		$data = $abc->tampil_data_booking();
		echo json_encode($data);
	}
	unset($postdata, $data, $data1, $id_lapangan, $id_user, $abc);
}


function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuran = $_FILES['gambar']['size'];
	$tipe = $_FILES['gambar']['type'];
	$tmp_name = $_FILES['gambar']['tmp_name'];
	$error = $_FILES['gambar']['error'];

	// Cek apakah tidak ada gambar di upload
	if ($error === 4) {
		echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
		return false;
	}

	// Cek apakah gambar yg diupload?
	$ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensigambarvalid)) {
		echo "<script>
            alert('Pililah Gambar png, jpg, or jpeg');
        </script>";
		return false;
	}


	// Generete
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensiGambar;


	// Lolos pengecekan
	move_uploaded_file($tmp_name, 'assets/images/lapangan/' . $namafilebaru);
	return $namafilebaru;
}
?>