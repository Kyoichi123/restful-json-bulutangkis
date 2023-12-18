<?php
error_reporting(1); // error ditampilkan
include "Client.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style-admin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!--  -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/card.css" />

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />

    <title>Document</title>
</head>

<body>
    <!-- menu button -->
    <!-- menu button -->
    <div class="side-bar">
        <!-- Header Section -->
        <header>
            <h1 class="mt-3" style="color: white;">Shuttle Court Haven</h1>
            <!--  close button -->
            <!-- <div class="close-btn">
          <i class="fas fa-times"></i>
        </div> -->
            <!-- image -->
            <img src="https://th.bing.com/th/id/OIG.EBPHnzF4mpLuaXbdl_Fl?w=1024&h=1024&rs=1&pid=ImgDetMain"
                class="rounded-circle position-relative start-50 translate-middle-x mb-3" alt="" />

            <p>ADMIN</p>
        </header>

        <!-- Menu Item -->
        <div class="menu ms-2">
            <div class="item">
                <a href="#">DASHBOARD</a>
            </div>
            <div class="item">
                <a class="sub-btn">MASTER DATA<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="admin.php" class="sub-item">ADMIN</a>
                    <a href="user.php" class="sub-item " nama='aksi' value='tampil_user'>USER</a>
                    <a href="lapangan.php" class="sub-item fw-bold">LAPANGAN</a>
                </div>
            </div>
            <div class="item">
                <a href="data_booking.php">DATA RENTAL</a>
            </div>
        </div>
    </div>

    <div class="isi">
        <div class="navbarr d-flex justify-content-end">
            <button class="btn-lihat" onclick="location.href='logout.php'">
                LOGOUT
            </button>
        </div>
        <div class="page-heading">
            <div class="page-title mt-3">
                <div class="row">
                    <div class="col-10 col-md-6 order-md-1 order-last">
                        <h3 class="ms-3">Lapangan</h3>
                        <!-- Button trigger modal -->
                        <button type=" button" class="btn btn-lihat ms-3" data-bs-toggle="modal"
                            data-bs-target="#tambah">
                            Tambah
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Lapangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="proses.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="aksi" value="tambah_lapangan" />
                                            <div class=" form-group">
                                                <label for="lapangan">Nama Lapangan</label>
                                                <input type="text" class="form-control" id="lapangan"
                                                    name="nama_lapangan" placeholder="Masukan Nama Lapangan" required />
                                            </div>

                                            <fieldset class="form-group">
                                                <label for="jenis">Jenis Lapangan</label>
                                                <select class="form-select" id="jenis" name="jenis">
                                                    <option>Lantai Karpet</option>
                                                    <option>Lantai Sintetis</option>
                                                    <option>Lantai Kayu</option>
                                                </select>
                                            </fieldset>

                                            <div class="form-group">
                                                <label for="harga">Harga/Jam</label>
                                                <input type="number" class="form-control" id="harga"
                                                    placeholder="Masukan Harga" name="harga" required />
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"
                                                    required></textarea>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01"><i
                                                            class="bi bi-upload"></i></label>
                                                    <input type="file" class="form-control" id="inputGroupFile01"
                                                        name="gambar" required />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="submit">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal close -->
                    </div>
                    <div class=" col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Lapangan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section id="lapangan">
            <div class="container">
                <div class="row">



                    <?php $data_array = $abc->tampil_semua_data_lapangan();
                    foreach ($data_array as $r) : ?>
                    <div class="col-4">
                        <div class="card p-3" style="width: 380px">
                            <img src="assets/images/lapangan/<?= $r->gambar ?>" alt="asd" height="200px">
                            <div class="card-body">
                                <p class="nama-lapangan fw-bold">
                                    <?= $r->nama_lapangan ?>
                                </p>
                                <p class="harga-lapangan fw-bold">IDR
                                    <?= $r->harga ?>/Jam
                                </p>
                                <div class="d-flex justify-content-center">
                                    <!-- Edit -->

                                    <!-- Tombol untuk membuka modal edit -->
                                    <button type="button" class="btn btn-lihat mr-2" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $r->id_lapangan ?>">
                                        Ubah
                                    </button>

                                    <!-- Modal Edit Data Admin -->
                                    <div class="modal fade" id="edit<?= $r->id_lapangan; ?>" tabindex="-1"
                                        aria-labelledby="editAdminModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editAdminModalLabel">Edit Data Lapangan
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form Edit Data Admin -->
                                                    <form action="proses.php" method="POST">
                                                        <input type="hidden" name="aksi" value="ubah_lapangan" />
                                                        <input type="hidden" class="form-control" id="id"
                                                            name="id_lapangan" value="<?= $r->id_lapangan ?>" required>
                                                        <div class="mb-3">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="text" class="form-control" id="harga"
                                                                name="harga" value="<?= $r->harga ?>" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-warning"
                                                                name="ubah_lapangan">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btnn btn-lihat ml-2" data-bs-toggle="modal"
                                        data-bs-target="#hapus<?= $r->id_lapangan ?>">
                                        Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="hapus<?= $r->id_lapangan ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus Data Lapangan <span
                                                        class="text-danger fw-bold">
                                                        <?= $r->nama_lapangan ?>,

                                                    </span>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="proses.php" method="GET">
                                                        <input type="hidden" name="aksi" value="hapus_lapangan" />
                                                        <input type="hidden" class="form-control" id="id"
                                                            name="id_lapangan" value="<?= $r->id_lapangan ?>">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-danger"
                                                            name="hapus_lapangan" ">Ya</button>
                                                                                                                                                                                                                    </form>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>
                                                                                                                                                                            </div>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <link rel=" stylesheet" href="assets/js/popper.min.js" />

                                                        <!-- JQuery CDN Link-->
                                                        <script
                                                            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                                                            ;></script>
                                                        <script>
                                                        $(document).ready(function() {
                                                            //jquery for toggle sub menus
                                                            $(".sub-btn").click(function() {
                                                                $(this).next(".sub-menu").slideToggle();
                                                                $(this).find(".dropdown").toggleClass(
                                                                    "rotate");
                                                            }).trigger('click');;
                                                            //jquery for expand and collapse the sidebar
                                                            $(".menu-btn").click(function() {
                                                                $(".side-bar").addClass("active");
                                                                $(".menu-btn").css("visibility",
                                                                    "hidden");
                                                            });
                                                            //Active cancel button
                                                            $(".close-btn").click(function() {
                                                                $(".side-bar").removeClass("active");
                                                                $(".menu-btn").css("visibility",
                                                                    "visible");
                                                            });
                                                        });
                                                        </script>
                                                        <script
                                                            src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js">
                                                        </script>
                                                        <script src="assets/js/bootstrap.bundle.min.js"></script>

                                                        <script
                                                            src="assets/vendors/simple-datatables/simple-datatables.js">
                                                        </script>
                                                        <script>
                                                        // Simple Datatable
                                                        let table1 = document.querySelector("#table1");
                                                        let dataTable = new simpleDatatables.DataTable(table1);
                                                        </script>

                                                        <script src="assets/js/main.js"></script>
</body>

</html>