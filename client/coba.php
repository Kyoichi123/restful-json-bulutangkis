<?php
$opt = $_SESSION["opt"];
$inv = $_SESSION["inv"];
$total = 0;


?>
<!-- Container-fluid starts-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container invoice mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div>
                                <div class="row invo-header">
                                    <div class="col-sm-6">
                                        <div class="media">
                                            <div class="media-left"><a href="index.html"><img class="media-object img-60" src="../assets/images/logo/logo-1.png" alt=""></a></div>
                                            <div class="media-body m-l-20">
                                                <h4 class="media-heading f-w-600">Putsal OM</h4>
                                                <p>putsal@gmail.com<br><span class="digits">289-335-6503</span></p>
                                            </div>
                                        </div>
                                        <!-- End Info-->
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-md-end">
                                            <h3><?= $inv ?></h3>
                                            <p>Issued: <?= date('F'); ?><span class="digits"> <?= date('j, Y'); ?></span><br> </p>
                                        </div>
                                        <!-- End Title                                 -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- End InvoiceTop-->
                            <div class="row invo-profile">
                                <div class="col-xl-4">
                                    <div class="media">
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading f-w-600"><?= $data["nama"] ?></h4>
                                            <p><?= $data["email"] ?><br><span class="digits"><?= $data["no_tlp"] ?></span></p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 offset-sm-4 text-md-end">
                                    <h4 class="text-success"><?= $_SESSION["nama_lapangan"] ?></h4>
                                </div>
                                <!-- End Invoice Mid-->
                                <div>
                                    <div class="table-responsive invoice-table" id="table">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                <tr>
                                                    <td class="Hours">
                                                        <h6 class="p-2 mb-0">Tanggal</h6>
                                                    </td>
                                                    <td class="Hours">
                                                        <h6 class="p-2 mb-0">Jadwal</h6>
                                                    </td>
                                                    <td class="Rate">
                                                        <h6 class="p-2 mb-0">SubTotal</h6>
                                                    </td>

                                                </tr>
                                                <?php for ($i = 0; $i < count($opt); $i++) : ?>
                                                    <tr>
                                                        <td>
                                                            <p class="itemtext digits"><?= $_SESSION["tgl_main"] ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="itemtext digits"><?= $opt[$i] ?></p>
                                                        </td>
                                                        <td>
                                                            <p class="itemtext digits">Rp. <?= $_SESSION["harga_lapangan"] ?></p>
                                                        </td>
                                                    </tr>
                                                    <?php $total += $_SESSION["harga_lapangan"] ?>
                                                <?php endfor ?>

                                                <tr>
                                                    <td class="Rate" colspan="2">
                                                        <h6 class="mb-0 p-2 text-center">Total</h6>
                                                    </td>

                                                    <td class="payment digits">
                                                        <h6 class="mb-0 p-2">Rp. <?= $total ?></h6>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table-->
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div>
                                                <p class="legal"><strong>Terimakasih telah melakukan pemesanan di Lapangan kami:)</strong> Pembayaran dapat dilakukan melalui transfer bank atau e-wallet. Kami menerima transfer dari bank-bank lokal seperti BCA, Mandiri, dan BNI, serta e-wallet seperti OVO, GoPay, dan Dana. Pastikan pembayaran dilakukan sebelum tanggal jatuh tempo yang tertera pada faktur, dan konfirmasikan pembayaran Anda dengan mengirimkan bukti transfer atau screenshot pembayaran melalui WhatsApp ini <a href="https://wa.me/6282189048887/?text=Hello ">https://wa.me/6282189048887/?text=Hello</a>. Terima kasih telah menggunakan layanan kami.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End InvoiceBot-->
                            </div>
                            <div class="col-sm-12 text-center mt-3">
                                <button class="btn btn btn-primary me-2" type="button" onclick="window.print()">Print</button>
                                <button class="btn btn-secondary" type="button" onclick="location.href='data_pemesanan.php'">Back to Dashboard</button>
                            </div>
                            <!-- End Invoice-->
                            <!-- End Invoice Holder-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>