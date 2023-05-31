<!DOCTYPE html>
<?php
if (basename($_SERVER["PHP_SELF"]) != "home.php") {
    ?>
        <script language="javascript">
            alert("FILE HARUS DIAKSES OLEH HOMEGURU.PHP");
            document.location="homeguru.php";
        </script>
    <?php
        exit();
    }
    if (isset($_SESSION['ID_USER']))
    {
    }
    else
    {
        ?>
        <script language="javascript">
            alert("ANDA HARUS LOGIN DULU UNTUK BISA MENGAKSES HALAMAN INI");
            document.location="formlogin.php";
            </script>
    <?php
    exit();
    }
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Sekolah</title>
    <link href="home.css?v=1.9" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="isihomesekolah">
        <div class="atas">
            <div>"Sebuah Website Sederhana yang Berfungsi untuk Mendata Siswa dengan Nilainya</div>
            <div>Dibuat untuk Melaksanakan USK Klaster 3"</div>
            <div class="nama">~Yuris~</div>
        </div>
        <div class="bawah"></div>
    </div>
</body>
</html>