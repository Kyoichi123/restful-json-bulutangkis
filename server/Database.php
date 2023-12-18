<?php
class Database
{
	private $host = "localhost";
	private $dbname = "booking_lapangan";
	private $user = "root";
	private $password = "";
	private $port = "3306";
	private $conn;

	// function yang pertama kali di-load saat class dipanggil
	public function __construct()
	{ // koneksi database
		try {
			$this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbname;charset=utf8", $this->user, $this->password);
		} catch (PDOException $e) {
			echo "Koneksi gagal";
		}
	}



	public function tampil_semua_data_user()
	{
		$query = $this->conn->prepare("SELECT id_user, role_id, nama, alamat, email, no_tlp, username, password
		FROM user WHERE role_id = 2 ORDER BY id_user");
		$query->execute();
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		// mengembalikan data	
		return $data;
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}

	public function tampil_semua_data_lapangan()
	{
		$query = $this->conn->prepare("SELECT id_lapangan, nama_lapangan, jenis, harga, deskripsi, gambar FROM lapangan order by id_lapangan");
		$query->execute();
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		// mengembalikan data	
		return $data;
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}



	public function tampil_data_lapangan($id_lapangan)
	{
		$query = $this->conn->prepare("select id_lapangan,nama_lapangan,jenis,harga,deskripsi,gambar from lapangan where id_lapangan=?");
		$query->execute(array($id_lapangan));
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
		$query->closeCursor();
		unset($id_lapangan, $data);
	}

	public function tambah_data_lapangan($data)
	{
		$query = $this->conn->prepare("insert ignore into lapangan (id_lapangan,nama_lapangan,jenis,harga,deskripsi,gambar) values (?,?,?,?,?,?)");
		$query->execute(array($data['id_lapangan'], $data['nama_lapangan'], $data['jenis'], $data['harga'], $data['deskripsi'], $data['gambar']));
		$query->closeCursor();
		unset($data);
	}

	public function ubah_data_lapangan($data)
	{
		$query = $this->conn->prepare("update lapangan set harga=? where id_lapangan=?");
		$query->execute(array($data['harga'], $data['id_lapangan']));
		$query->closeCursor();
		unset($data);
	}

	public function hapus_data_lapangan($id_lapangan)
	{
		$query = $this->conn->prepare("delete from lapangan where id_lapangan=?");
		$query->execute(array($id_lapangan));
		$query->closeCursor();
		unset($id_lapangan);
	}


	//================================



	public function tampil_data_user($id_user)
	{
		$query = $this->conn->prepare("select id_user,nama,alamat,email,no_tlp,username,password from user where id_user=?");
		$query->execute(array($id_user));
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
		$query->closeCursor();
		unset($id_user, $data);
	}

	public function tambah_data_user($data)
	{
		$query = $this->conn->prepare("insert ignore into user (id_user,role_id,nama,alamat,email,no_tlp,username,password) values (?,?,?,?,?,?,?,?)");
		$query->execute(array($data['id_user'], 2, $data['nama'], $data['alamat'], $data['email'], $data['no_tlp'], $data['username'], $data['password']));
		$query->closeCursor();
		unset($data);
	}

	public function tambah_data_user_login($data)
	{
		$query = $this->conn->prepare("insert ignore into user (id_user,role_id,nama,alamat,email,no_tlp,username,password) values (?,?,?,?,?,?,?,?)");
		$query->execute(array($data['id_user'], 2, $data['nama'], $data['alamat'], $data['email'], $data['no_tlp'], $data['username'], $data['password']));
		$query->closeCursor();
		unset($data);
	}

	public function ubah_data_user($data)
	{
		$query = $this->conn->prepare("update user set nama=?,alamat=?,email=?,no_tlp=?,username=?,password=? where id_user=?");
		$query->execute(array($data['nama'], $data['alamat'], $data['email'], $data['no_tlp'], $data['username'], $data['password'], $data['id_user']));
		$query->closeCursor();
		unset($data);
	}

	public function hapus_data_user($id_user)
	{
		$query = $this->conn->prepare("delete from user where id_user=?");
		$query->execute(array($id_user));
		$query->closeCursor();
		unset($id_user);
	}

	//===============================================


	public function tampil_data_booking()
	{
		$query = $this->conn->prepare("SELECT booking.id_booking,user.nama,lapangan.nama_lapangan, lapangan.jenis, booking.tgl_main,booking.jam_main, lapangan.harga, booking.terbayarkan,booking.id_booking
		FROM booking
		JOIN lapangan ON lapangan.id_lapangan = booking.id_lapangan
		JOIN user ON user.id_user = booking.id_user
		ORDER BY booking.tgl_main DESC
		;");
		$query->execute();
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		// mengembalikan data	
		return $data;
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}
	public function tampil_data_pemesanan($id_user)
	{
		$query = $this->conn->prepare("SELECT lapangan.nama_lapangan, lapangan.jenis, booking.tgl_main,booking.jam_main, lapangan.harga, booking.terbayarkan
		FROM booking
		JOIN lapangan ON lapangan.id_lapangan = booking.id_lapangan 
		WHERE booking.id_user=?
		ORDER BY booking.tgl_main DESC
		;");
		$query->execute(array($id_user));
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		// mengembalikan data	
		return $data;
		// hapus variable dari memory	
		$query->closeCursor();
		unset($id_user, $data);
	}
	public function tampil_data_admin()
	{
		$query = $this->conn->prepare("SELECT * FROM user where role_id='1'
		;");
		$query->execute();
		// mengambil banyak data dengan fetchAll	
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		// mengembalikan data	
		return $data;
		// hapus variable dari memory	
		$query->closeCursor();
		unset($data);
	}

	public function tambah_data_admin($data)
	{
		$query = $this->conn->prepare("INSERT IGNORE INTO user (role_id, nama, alamat, email, no_tlp, username, password) VALUES (?, ?,?, ?, ?, ?, ?)");
		$query->execute(
			array(
				"1",
				$data['nama'],
				$data['alamat'],
				$data['email'],
				$data['no_tlp'],
				$data['username'],
				$data['password']
			)
		);
		$query->closeCursor();
		unset($data);
	}
	public function cek_jadwal_lapangan($id_lapangan, $jams, $date)
	{
		$query = $this->conn->prepare("SELECT jam_main FROM booking WHERE tgl_main=? and jam_main=? and id_lapangan=?");
		$query->execute(array($date, $jams, $id_lapangan));
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
		$query->closeCursor();
		unset($id_lapangan, $jams, $date, $data);
	}


	public function pesan_lapangan($data)
	{
		$query = $this->conn->prepare("INSERT IGNORE INTO booking (id_lapangan,id_user,tgl_pemesanan,tgl_main,jam_main)
		VALUES (?,?,?,?,?)");
		$query->execute(
			array(
				$data['id_lapangan'],
				$data['id_user'],
				$data['tgl_pemesanan'],
				$data['tgl_main'],
				$data['jam_main'],
			)
		);
		$query->closeCursor();
		unset($data);
	}

	public function ubah_data_admin($data)
	{
		$query = $this->conn->prepare("UPDATE user set nama=? where id_user=?");
		$query->execute(array($data['nama'], $data['id_user']));
		$query->closeCursor();
		unset($data);
	}
	public function ubah_data_booking($data)
	{
		$query = $this->conn->prepare("UPDATE booking SET terbayarkan=? where id_booking=?");
		$query->execute(array($data['terbayarkan'], $data['id_booking']));
		$query->closeCursor();
		unset($data);
	}

	public function ubah_data_pemesanan($data)
	{
		$query = $this->conn->prepare("UPDATE booking SET terbayarkan=? where id_booking=?");
		$query->execute(array($data['terbayarkan'], $data['id_booking']));
		$query->closeCursor();
		unset($data);
	}


	public function hapus_data_booking($id_booking)
	{
		$query = $this->conn->prepare("DELETE FROM booking WHERE id_booking=?");
		$query->execute(array($id_booking));
		$query->closeCursor();
		unset($id_booking);
	}
	public function hapus_data_admin($id_booking)
	{
		$query = $this->conn->prepare("DELETE FROM user WHERE id_user=?");
		$query->execute(array($id_booking));
		$query->closeCursor();
		unset($id_booking);
	}


	public function cek_user($data)
	{
		$query = $this->conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
		$query->execute(array($data['username'], $data['password']));
		// mengambil satu data dengan fetch	
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data;
		$query->closeCursor();
		unset($data);
	}
}
