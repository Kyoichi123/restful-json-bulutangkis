<?php
error_reporting(1); // error ditampilkan
class Client
{
	private $url;

	// function yang pertama kali di-load saat class dipanggil
	public function __construct($url)
	{
		$this->url = $url;
		unset($url);
	}

	// function untuk menghapus selain huruf dan angka
	public function filter($data)
	{
		$data = preg_replace('/[^a-zA-Z0-9]/', '', $data);
		return $data;
		unset($data);
	}


	public function tampil_semua_data_user()
	{
		$client = curl_init($this->url . "?aksi=tampil_user");
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		// mengembalikan data
		return $data;
		// menghapus variable dari memory
		unset($data, $client, $response);
	}

	public function tampil_semua_data_lapangan()
	{
		$client = curl_init($this->url . "?aksi=tampil_lapangan");
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		// mengembalikan data
		return $data;
		// menghapus variable dari memory
		unset($data, $client, $response);
	}

	public function tampil_data($id_lapangan)
	{
		$id_lapangan = $this->filter($id_lapangan);
		$client = curl_init($this->url . "?aksi=tampil&id_lapangan=" . $id_lapangan);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_lapangan, $client, $response, $data);
	}



	public function tambah_data_lapangan($data)
	{
		$data = '{	"id_lapangan":"' . $data['id_lapangan'] . '",
			"nama_lapangan":"' . $data['nama_lapangan'] . '",
			"jenis":"' . $data['jenis'] . '",
			"harga":"' . $data['harga'] . '",
			"deskripsi":"' . $data['deskripsi'] . '",
			"gambar":"' . $data['gambar'] . '",
			"aksi":"' . $data['aksi'] . '" 
		}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function ubah_data_lapangan($data)
	{
		$data = '{	"id_lapangan":"' . $data['id_lapangan'] . '",
					"harga":"' . $data['harga'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function hapus_data_lapangan($data)
	{

		$id_lapangan = $this->filter($data['id_lapangan']);
		$data = '{	"id_lapangan":"' . $id_lapangan . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();

		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_lapangan, $data, $c, $response);
	}


	//================================= ADMIN VIEW USER ==================//

	public function tampil_data_user($id_user)
	{
		$id_lapangan = $this->filter($id_user);
		$client = curl_init($this->url . "?aksi=tampil_user&id_user=" . $id_user);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_user, $client, $response, $data);
	}


	public function tambah_data_user($data)
	{
		$data = '{	
			"nama":"' . $data['nama'] . '",
			"alamat":"' . $data['alamat'] . '",
			"email":"' . $data['email'] . '",
			"no_tlp":"' . $data['no_tlp'] . '",
			"username":"' . $data['username'] . '",
			"password":"' . $data['password'] . '" ,
			"aksi":"' . $data['aksi'] . '" 
			
		}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function tambah_data_user_login($data)
	{
		$data = '{	
			"nama":"' . $data['nama'] . '",
			"alamat":"' . $data['alamat'] . '",
			"email":"' . $data['email'] . '",
			"no_tlp":"' . $data['no_tlp'] . '",
			"username":"' . $data['username'] . '",
			"password":"' . $data['password'] . '" ,
			"aksi":"' . $data['aksi'] . '" 
			
		}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function hapus_data_user($data)
	{

		$id_user = $this->filter($data['id_user']);
		$data = '{	"id_user":"' . $id_user . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();

		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_user, $data, $c, $response);
	}

	public function ubah_data_user($data)
	{
		$data = '{	"id_user":"' . $data['id_user'] . '",
					"nama":"' . $data['nama'] . '",
					"alamat":"' . $data['alamat'] . '",
					"email":"' . $data['email'] . '",
					"no_tlp":"' . $data['no_tlp'] . '",
					"username":"' . $data['username'] . '",
					"password":"' . $data['password'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	//============================ TAMPIL DATA BOOKING ===============================

	public function tampil_data_booking()
	{
		$client = curl_init($this->url);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		// mengembalikan data

		return $data;
		// menghapus variable dari memory
		unset($data, $client, $response);
	}

	public function cek_jadwal_lapangan($jams, $date, $id_lapangan)
	{
		$client = curl_init(
			$this->url . "?aksi=tampil_jadwal&jam_main=" . $jams . "&tgl_main=" . $date . "&id_lapangan=" . $id_lapangan
		);
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_lapangan, $tanggal, $jam, $client, $response, $data);
	}
	public function pesan_lapangan($id_lapangan, $id_user, $tanggal, $date, $jam_main)
	{
		$data = '{"id_lapangan":"' . $id_lapangan . '",
              "id_user":"' . $id_user . '",
              "tgl_pemesanan":"' . $tanggal . '",
              "tgl_main":"' . $date . '",
              "jam_main":"' . $jam_main . '",
              "aksi":"pesan_lapangan"
            }';

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);

		$response = curl_exec($c);

		if ($response === false) {
			// Tangani kesalahan cURL
			echo 'Curl error: ' . curl_error($c);
		} else {
			// Tangani respons
			echo 'Response: ' . $response;
		}

		curl_close($c);
		unset($data, $c, $response);
	}

	public function cek_user($username, $password)
	{
		$data = '{	"username":"' . $username . '",
			"password":"' . $password . '",
			"aksi":"' . "login" . '"
		}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		$data2 = json_decode($response);
		return $data2;
		unset($data, $username, $password, $c, $response);
	}



	public function tampil_data_admin()
	{
		$client = curl_init($this->url . "?aksi=tampil_admin");
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_barang, $client, $response, $data);
	}
	public function tampil_data_pemesanan()
	{
		$client = curl_init($this->url . "?aksi=tampil_pemesanan");
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_barang, $client, $response, $data);
	}
	public function tampil_data_lapangan()
	{
		$client = curl_init($this->url . "?aksi=tampil_lapangan");
		curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($client);
		curl_close($client);
		$data = json_decode($response);
		return $data;
		unset($id_barang, $client, $response, $data);
	}

	public function tambah_data($data)
	{
		$data = '{	"id_barang":"' . $data['id_barang'] . '",
					"nama_barang":"' . $data['nama_barang'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}
	public function tambah_data_admin($data)
	{
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

		// Convert array to JSON format
		$data_json = json_encode($data);

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data_json);
		$response = curl_exec($c);
		curl_close($c);

		// Unset unnecessary variables
		unset($data, $data_json, $c, $response);
	}

	public function ubah_data($data)
	{
		$data = '{	"id_barang":"' . $data['id_barang'] . '",
					"nama_barang":"' . $data['nama_barang'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}
	public function ubah_data_booking($data)
	{

		$data = '{	"id_booking":"' . $data['id_booking'] . '",
					"terbayarkan":"' . $data['terbayarkan'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function ubah_data_pemesanan($data)
	{

		$data = '{	"id_booking":"' . $data['id_booking'] . '",
					"terbayarkan":"' . $data['terbayarkan'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function ubah_data_admin($data)
	{

		$data = '{	"id_user":"' . $data['id_user'] . '",
					"nama":"' . $data['nama'] . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($data, $c, $response);
	}

	public function hapus_data_booking($data)
	{
		var_dump($data);
		$id_booking = $this->filter($data['id_booking']);
		$data = '{	"id_booking":"' . $id_booking . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_booking, $data, $c, $response);
	}
	public function hapus_data_admin($data)
	{
		var_dump($data);
		$id_user = $this->filter($data['id_user']);
		$data = '{	"id_user":"' . $id_user . '",
					"aksi":"' . $data['aksi'] . '" 
				}';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $this->url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_POST, true);
		curl_setopt($c, CURLOPT_POSTFIELDS, $data);
		$response = curl_exec($c);
		curl_close($c);
		unset($id_user, $data, $c, $response);
	}

	// function yang terakhir kali di-load saat class dipanggil
	public function __destruct()
	{ // hapus variable dari memory
		unset($this->options, $this->api);
	}
}

$url = 'http://192.168.137.1/restful-json-futsal/server/server.php';
// buat objek baru dari class Client
$abc = new Client($url);