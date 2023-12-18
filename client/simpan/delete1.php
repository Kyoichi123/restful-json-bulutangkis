<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';

$id = $_GET["username"];
if (hapus1($id) > 0) {
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href='user.php';
    </script>";
} else {
    echo "
    <script>
    alert('data gagal dihapus')</script>;
    document.location.href='user.php';
    ";
}
