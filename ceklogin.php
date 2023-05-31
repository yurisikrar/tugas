<?php
include 'koneksi.php';
session_start();
if ($_SESSION["TIPE"] == "GURU")
{
    header('location:home.php?pg=homesekolah');
}
elseif($_SESSION["TIPE"] == "SISWA")
{
    header('location:homesiswa.php');
}
?>