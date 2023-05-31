<?php
include 'koneksi.php';
$simpan = mysqli_query ($koneksi, "INSERT INTO logging_yuris(kunjungan) VALUES ('kunjung')");
header ('location:login.php');
?>