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

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />

    <title>Document</title>
</head>

<body>
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
                <a href="index.html">DASHBOARD</a>
            </div>
            <div class="item">
                <a class="sub-btn bg-black">MASTER DATA<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="admin.php" class="sub-item">ADMIN</a>
                    <a href="user.php" class="sub-item fw-bold">USER</a>
                    <a href="lapangan.php" class="sub-item">LAPANGAN</a>
                </div>
            </div>
            <div class="item">
                <a href="data_booking.php">DATA BOOKING</a>
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
                        <h3 class="ms-3">Data User</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Admin
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped mar" id="table1">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $data_array = $abc->tampil_semua_data_user();
                      foreach ($data_array as $r) : ?>
                                            <tr>
                                                <td>
                                                    <?= $r->nama ?>
                                                </td>
                                                <td>
                                                    <?= $r->alamat ?>
                                                </td>
                                                <td>
                                                    <?= $r->email ?>
                                                </td>
                                                <td>
                                                    <?= $r->no_tlp ?>
                                                </td>
                                                <td>
                                                    <?= $r->username ?>
                                                </td>
                                                <td>
                                                    <?= $r->password ?>
                                                </td>
                                                <td>

                                                    <!-- Edit -->
                                                    <!-- Tombol untuk membuka modal edit -->
                                                    <button type="button" class="btnn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit<?= $r->username ?>">
                                                        Edit
                                                    </button>
                                                    <!-- Modal Edit Data Admin -->
                                                    <div class="modal fade" id="edit<?= $r->username ?>" tabindex="-1"
                                                        aria-labelledby="editAdminModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editAdminModalLabel">
                                                                        Edit Data Admin</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form Edit Data Admin -->
                                                                    <form action="proses.php" method="POST">
                                                                        <input type="hidden" name="aksi"
                                                                            value="ubah_user" />
                                                                        <input type="hidden" class="form-control"
                                                                            id="id" name="id_user"
                                                                            value="<?= $r->id_user ?>" required>
                                                                        <div class="mb-3">
                                                                            <label for="nama"
                                                                                class="form-label">Nama</label>
                                                                            <input type="text" class="form-control"
                                                                                id="nama" name="nama"
                                                                                value="<?= $r->nama ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="alamat"
                                                                                class="form-label">Alamat</label>
                                                                            <input type="alamat" class="form-control"
                                                                                id="alamat" name="alamat"
                                                                                value="<?= $r->alamat ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="email"
                                                                                class="form-label">Email</label>
                                                                            <input type="email" class="form-control"
                                                                                id="email" name="email"
                                                                                value="<?= $r->email ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="phone"
                                                                                class="form-label">Phone</label>
                                                                            <input type="text" class="form-control"
                                                                                id="phone" name="no_tlp"
                                                                                value="<?= $r->no_tlp ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="username"
                                                                                class="form-label">Username</label>
                                                                            <input type="text" class="form-control"
                                                                                id="username" name="username"
                                                                                value="<?= $r->username ?>" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="password"
                                                                                class="form-label">Password</label>
                                                                            <input type="text" class="form-control"
                                                                                id="password" name="password"
                                                                                value="<?= $r->password ?>" required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-warning"
                                                                                name="ubah_user">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Delete -->
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btnn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#hapus<?= $r->username ?>">
                                                        Hapus
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="hapus<?= $r->username ?>" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Hapus data </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus User <span
                                                                        class="text-danger fw-bold">
                                                                        <?= $r->id_user ?>
                                                                    </span>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="proses.php" method="GET">
                                                                        <input type="hidden" name="aksi"
                                                                            value="hapus_user" />
                                                                        <input type="hidden" class="form-control"
                                                                            id="id" name="id_user"
                                                                            value="<?= $r->id_user ?>">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-danger"
                                                                            name="hapus_user" ">Ya</button>
                                                                                                              </form>
                                                                                                            </div>
                                                                                                          </div>
                                                                                                        </div>
                                                                                                      </div>
                                                                                                    </td>
                                                                                                  </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                  <!-- Button trigger modal -->


                  <!-- Button trigger modal -->
                  <button type=" button" class="btn-lihat btn-success float-end" data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal">
                                                                            Tambah
                                                                        </button>

                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal"
                                                                            tabindex="-1"
                                                                            aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"
                                                                                            id="exampleModalLabel">
                                                                                            Tambah User</h5>
                                                                                        <button type="button"
                                                                                            class="btn-close"
                                                                                            data-bs-dismiss="modal"
                                                                                            aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <form action="proses.php"
                                                                                            method="post">
                                                                                            <input type="hidden"
                                                                                                name="aksi"
                                                                                                value="tambah_user" />

                                                                                            <div class="mb-3">
                                                                                                <label for="name"
                                                                                                    class="form-label">Nama</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="name"
                                                                                                    name="nama"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="alamat"
                                                                                                    class="form-label">Alamat</label>
                                                                                                <input type="alamat"
                                                                                                    class="form-control"
                                                                                                    id="alamat"
                                                                                                    name="alamat"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="email"
                                                                                                    class="form-label">Email</label>
                                                                                                <input type="email"
                                                                                                    class="form-control"
                                                                                                    id="email"
                                                                                                    name="email"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="phone"
                                                                                                    class="form-label">Phone</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="phone"
                                                                                                    name="no_tlp"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="username"
                                                                                                    class="form-label">Username</label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="username"
                                                                                                    name="username"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="password"
                                                                                                    class="form-label">Password</label>
                                                                                                <input type="password"
                                                                                                    class="form-control"
                                                                                                    id="password"
                                                                                                    name="password"
                                                                                                    required>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-bs-dismiss="modal">Batal</button>
                                                                                                <button type="submit"
                                                                                                    class="btn btn-primary"
                                                                                                    name="tambah_user">Tambah</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                </div>
            </section>
        </div>
    </div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <link rel="stylesheet" href="assets/js/popper.min.js" />

    <!-- JQuery CDN Link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ;></script>
    <script>
    $(document).ready(function() {
        //jquery for toggle sub menus
        $(".sub-btn").click(function() {
            $(this).next(".sub-menu").slideToggle();
            $(this).find(".dropdown").toggleClass("rotate");
        }).trigger('click');;
        //jquery for expand and collapse the sidebar
        $(".menu-btn").click(function() {
            $(".side-bar").addClass("active");
            $(".menu-btn").css("visibility", "hidden");
        });
        //Active cancel button
        $(".close-btn").click(function() {
            $(".side-bar").removeClass("active");
            $(".menu-btn").css("visibility", "visible");
        });
    });
    </script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
    // Simple Datatable
    let table1 = document.querySelector("#table1");
    let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
</body>

</html>