<?php

session_start();
error_reporting(1); // error ditampilkan
include "Client.php";

// if (!isset($_SESSION["login_penyewa"])) {
//     header("Location: login.php");
//     exit;
// }
//info
$pemesan = $_SESSION["username"];
$id_user = $_SESSION["id_user"];
$id_lapangan = $_SESSION["id_lapangan"];




$tanggal = date("Y-m-d");

$jam = array("07.00-08.00", "08.00-09.00", "09.00-10.00", "10.00-11.00", "11.00-12.00", "12.00-13.00", "13.00-14.00", "14.00-15.00", "15.00-16.00", "16.00-17.00", "17.00-18.00", "18.00-19.00", "19.00-20.00", "20.00-21.00", "21.00-22.00", "22.00-23.00", "23.00-24.00",);

$date = 0;
if (isset($_POST["cek"])) {
    $date = $_POST["tanggal"];
}

if (isset($_POST['pesan'])) {
    $opt = $_POST['opt'];
    $date = $_POST['tgl'];
    $_SESSION["tgl_main"] = $date;
    $id_user = $_SESSION["id_user"];
    $id_lapangan = $_SESSION['id_lapangan'];
    // $id_user = "2";

    $_SESSION["inv"] = $_POST['inv'];
    $_SESSION["opt"] = $_POST['opt'];
    for ($i = 0; $i < count($opt); $i++) {
        $abc->pesan_lapangan($id_lapangan, $id_user, $tanggal, $date, $opt[$i]);
    }

    // var_dump($_POST['email']);
    if ($abc) {
        echo "
            <script>
            document.location.href='data_pemesanan.php';
            </script>";
    } else {
        echo "
            <script>
            alert('Pemesanan Gagal'  )</script>;
            ";
    }
}

function ceks($jams, $date, $id_lapangan)
{
    global $abc;
    $r = $abc->cek_jadwal_lapangan($jams, $date, $id_lapangan);

    if ($r !== false) {
        // ada data booking pada tanggal dan jam tertentu
        return false;
    } else {
        // tidak ada data booking pada tanggal dan jam tertentu
        return true;
    }
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
    <link rel="stylesheet" href="assets/css/box.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css" />

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <!-- tanggal -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Document</title>
</head>

<body>
    <!-- menu button -->
    <div class="side-bar">
        <header>
            <h1 class="mt-3" style="color: white;">Shuttle Court Haven</h1>
            <!--  close button -->
            <!-- <div class="close-btn">
          <i class="fas fa-times"></i>
        </div> -->
            <!-- image -->
            <img src="https://th.bing.com/th/id/OIG.EBPHnzF4mpLuaXbdl_Fl?w=1024&h=1024&rs=1&pid=ImgDetMain"
                class="rounded-circle position-relative start-50 translate-middle-x mb-3" alt="" />

            <p>USER
                <?= $pemesan ?>
            </p>
        </header>

        <div class="menu ms-2">
            <div class="menu ms-2">
                <div class="item">
                    <a href="lapangan_user.php">LAPANGAN

                    </a>
                </div>
                <div class="item">
                    <a href="data_pemesanan.php">DATA PEMESANAN</a>
                </div>
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
                        <h3 class="ms-3">
                            <?= $_SESSION["nama_lapangan"] ?>

                        </h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="lapangan_user.php">Lapangan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    pesan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <section class="section">
                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="card p-3 bg-light">
                                <div class="card-header bg-light">
                                    <h5 class="card-title bg-light">Pilih jam OM! </h5>
                                    <form class="d-flex" method="post" action="">
                                        <input name="tanggal" class="form-control" type="datetime-local"
                                            placeholder="Select DateTime">

                                        <button class="btn btn-primary ms-2" type="submit" name="cek">cek
                                            <?= $date ?><br>
                                        </button>
                                    </form>
                                </div>
                                <div class="d-flex">
                                    <form action="" method="post">
                                        <input type="hidden" id="inv" name="inv"
                                            value="<?= "INV:" . date("Ymd") . "-" . rand(1000, 9999); ?>" required>
                                        <input type="hidden" id="" name="tgl" value="<?= $date ?>" />

                                        <div class="o mt-1">
                                            <?php if ($date != 0) : ?>
                                            <?php $i = 0; ?>
                                            <?php foreach ($jam as $jams) : ?>

                                            <?php if (strtotime($date) >= strtotime(date("Y-m-d"))) : ?>
                                            <?php if (true === ceks($jams, $date, $id_lapangan)) : ?>
                                            <div class="tile">
                                                <input type="checkbox" name="opt[]" id="<?= $i; ?>"
                                                    value="<?= $jams ?>">
                                                <label for="<?= $i; ?>">
                                                    <i class="fas fa-yen-sign"></i>
                                                    <h6>
                                                        <?= $jams ?>
                                                    </h6>
                                                </label>
                                            </div>
                                            <?php else : ?>

                                            <div class="tile">
                                                <input class="bg-danger" type="checkbox" name="opt[]" id="<?= $i; ?>"
                                                    value="<?= $jams ?>" disabled>
                                                <label for="<?= $i; ?>">
                                                    <i class=" fas fa-yen-sign"></i>
                                                    <h6 class="text-light">Ordered</h6>
                                                </label>
                                            </div>
                                            <?php endif; ?>
                                            <?php else : ?>
                                            <div class="tile">
                                                <input class="bg-danger" type="checkbox" name="opt[]" id="<?= $i; ?>"
                                                    value="<?= $jams ?>" disabled>
                                                <label for="<?= $i; ?>">
                                                    <i class=" fas fa-yen-sign"></i>
                                                    <h6 class="text-light">Kadaluarsa</h6>
                                                </label>
                                            </div>
                                            <?php endif; ?>
                                            <?php $i++; ?>
                                            <?php endforeach ?>
                                            <?php endif; ?>


                                        </div>
                                        <?php if (isset($i)) : ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-lg btn-block mt-3"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pesan
                                            Lapangan</button>
                                        <?php endif ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">konfirmasi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah Anda yakin Ingin melakukan booking Lapangan?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="pesan">Ya</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
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
    <!-- FLATPICKER -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
    flatpickr("input[type=datetime-local", {});
    </script>
</body>

</html>