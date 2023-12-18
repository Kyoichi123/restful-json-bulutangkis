<?php
session_start();
// if (!isset($_SESSION["login_penyewa"])) {
//     header("Location: ../login.php");
//     exit;
// }
// require 'function.php';
// $pemesan = $_SESSION["username"];
// // $id_lapangan = $_SESSION->id_lapangan;
$username = $_SESSION["username"];
$id_user = $_SESSION["id_user"];
// $data = mysqli_fetch_assoc($result);
include "Client.php";

if (isset($_POST["pesan"])) {
    $id = $_POST["id"];
    $_SESSION["harga_lapangan"] = $_POST["harga_lapangan"];
    $_SESSION["nama_lapangan"] = $_POST["nama_lapangan"];
    $_SESSION["jenis"] = $_POST["jenis"];
    $_SESSION["id_lapangan"] = $id;
    header("Location: pemesanan.php");
    exit;
}


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
                <?= $username ?>

            <p></p>
        </header>

        <!-- Menu Item -->
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
                        <h3 class="ms-3">Lapangan</h3>

                    </div>
                    <div class=" col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section id="lapangan">
            <div class="container">
                <div class="row">
                    <?php
                    $data = $abc->tampil_data_lapangan();
                    foreach ($data as $lapangans) : ?>
                    <div class="col-4">
                        <div class="card p-3" style="width: 380px">
                            <img src="assets/images/lapangan/<?= $lapangans->gambar; ?>" alt="asd" height="200px">
                            <div class="card-body">
                                <p class="nama-lapangan fw-bold">
                                    <?= $lapangans->nama_lapangan; ?>
                                </p>
                                <p class="harga-lapangan fw-bold">IDR
                                    <?= $lapangans->harga; ?>
                                </p>
                                <form action="" method="post">
                                    <input type="hidden" value="<?= $lapangans->id_lapangan ?>" name="id">
                                    <input type="hidden" value="<?= $lapangans->harga_lapangan ?> "
                                        name="harga_lapangan">
                                    <input type="hidden" value="<?= $lapangans->nama_lapangan ?> " name="nama_lapangan">
                                    <input type="hidden" value="<?= $lapangans->jenis ?> " name="jenis">
                                    <div class=" d-flex justify-content-center">
                                        <button class="btn btn-lihat " name="pesan">PESAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </div>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <link rel="stylesheet" href="../assets/js/popper.min.js" />

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