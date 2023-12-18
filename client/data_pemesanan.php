<?php
include "Client.php";
session_start();
$pemesan = $_SESSION["username"]
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


            <p>
                <?= $pemesan ?>
        </header>

        <div class="menu ms-2">
            <div class="item">
                <a href="lapangan_user.php">LAPANGAN</a>
            </div>
            <div class="item">
                <a href="data_pemesanan.php">DATA PEMESANAN</a>
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
                        <h3 class="ms-3">Data Pemesanan</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

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
                                                <th>Lapangan</th>
                                                <th>Jenis</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>terbayarkan</th>
                                                <th>Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      $data = $abc->tampil_data_pemesanan();
                      foreach ($data as $row) : ?>
                                            <tr>
                                                <td>
                                                    <?= $row->nama_lapangan; ?>
                                                </td>
                                                <td>
                                                    <?= $row->jenis; ?>
                                                </td>
                                                <td>
                                                    <?= $row->tgl_main; ?>
                                                </td>
                                                <td>
                                                    <?= $row->jam_main; ?>
                                                </td>
                                                <td>
                                                    <?= $row->harga; ?>
                                                </td>
                                                <td>
                                                    <?php if ($row->harga <= $row->terbayarkan) : ?>
                                                    <input type="checkbox" class="btn-check" id="btn-check-2" checked
                                                        autocomplete="off">
                                                    <label class="btn btn-success" for="btn-check-2">Lunas</label>
                                                    <?php elseif ($row->harga > $row->terbayarkan && $row->terbayarkan > 0) : ?>
                                                    <input type="checkbox" class="btn-check" id="btn-check-2" checked
                                                        autocomplete="off">
                                                    <label class="btn btn-warning" for="btn-check-2">DP</label>
                                                    <?php elseif ($row->terbayarkan == 0) : ?>
                                                    <input type="checkbox" class="btn-check" id="btn-check-2" checked
                                                        autocomplete="off">
                                                    <label class="btn btn-danger" for="btn-check-2">NO</label>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?= $row->terbayarkan; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btnn btn-warning"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit<?= $row->id_booking ?>">Bayar</button>
                                                    <!-- Modal Edit Data Admin -->
                                                    <div class="modal fade" id="edit<?= $row->id_booking ?>"
                                                        tabindex="-1" aria-labelledby="editAdminModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editAdminModalLabel">
                                                                        Edit Data Booking</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form Edit Data Admin -->
                                                                    <form action="proses.php" method="POST" name="form">
                                                                        <input type="hidden" name="aksi"
                                                                            value="ubah_pemesanan" />
                                                                        <input type="hidden" class="form-control"
                                                                            id="id" name="id_booking"
                                                                            value="<?= $row->id_booking ?>" required>
                                                                        <div class="mb-3">
                                                                            <label for="terbayarkan"
                                                                                class="form-label">Terbayarkan</label>
                                                                            <input type="text" class="form-control"
                                                                                id="terbayarkan" name="terbayarkan"
                                                                                value="<?= $row->terbayarkan ?>"
                                                                                required>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-warning"
                                                                                name="ubah_booking">Simpan</button>
                                                                        </div>
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


                                    <!-- Option 2: Separate Popper and Bootstrap JS -->
                                    <link rel="stylesheet" href="assets/js/popper.min.js" />

                                    <!-- JQuery CDN Link-->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ;>
                                    </script>
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