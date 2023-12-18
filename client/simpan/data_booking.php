<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';
$users = query("SELECT * FROM data_user");


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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
            <h1 class="mt-3">PUTSAL.COM</h1>
            <!--  close button -->
            <!-- <div class="close-btn">
          <i class="fas fa-times"></i>
        </div> -->
            <!-- image -->
            <img src="https://th.bing.com/th/id/OIP.L9JHEt2tVGVxKRhMBKRnPQHaHY?pid=ImgDet&rs=1" class="rounded-circle position-relative start-50 translate-middle-x mb-3" alt="" />

            <p>ADMIN</p>
        </header>

        <!-- Menu Item -->
        <div class="menu ms-2">
            <div class="item">
                <a href="#">DASHBOARD</a>
            </div>
            <div class="item">
                <a class="sub-btn bg-black">MASTER DATA<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="admin.php" class="sub-item fw-bold">ADMIN</a>
                    <a href="user.php" class="sub-item">USER</a>
                    <a href="lapangan.php" class="sub-item">LAPANGAN</a>
                </div>
            </div>
            <div class="item">
                <a href="#">DATA RENTAL</a>
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
                        <h3 class="ms-3">Data Booking</h3>
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
                                                <th>Lapangan</th>
                                                <th>Jenis</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>terbayarkan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                <tr>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['jenis']; ?></td>
                                                    <td><?= $row['tgl']; ?></td>
                                                    <td><?= $row['jam']; ?></td>
                                                    <td><?= $row['harga']; ?></td>
                                                    <td></td>
                                                    <td><?= $row['terbayarkan']; ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>


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