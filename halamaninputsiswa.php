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
            document.location="login.php";
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
    <title>Document</title>
    <link href="home.css?v=2.7" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="halamaninputsiswa">
    <div class="atasss">
    <div class="tabelhalamaninputsiswa">
    <form action="inputsiswa.php" method="post" enctype="multipart/form-data"
    name="form1" id="form1">
    
        <h1>Formulir Data Siswa</h1>
        <table>
        <tr><td><div align="left" class="inputsiswabagianjudul">ID Siswa</div></td><td><div align="left"><input class="inputsiswa" type="number" name="nisn"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nama Siswa</div></td><td><div align="left"><input class="inputsiswa" type="text" name="nama"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Kelas</div></td><td><div align="left"><select class="inputsiswa" name="kelas" id="kelas">
            <option class="classoption">XII RPL 1</option>
            <option class="classoption">XII RPL 2</option>
            <option class="classoption">XII RPL 3</option></select></div></td></tr>
            <tr><td><div align="left" class="inputsiswabagianjudul">Foto</div></td><td><div align="left"><input class="inputsiswa2" type="file" name="fo" id="fo"></div></td></tr></table>
            <div><table><tr><td><div><button class="tombolsimpaninputbuku" type="submit">Simpan</button></div></td><td><div><button class="tombolhapusinputbuku" type="reset">Hapus</button></div></td></tr></table></div>
    </form>
    <div><a href="home.php?pg=forminputsiswa" class="linkpilihan"><button class="tombolhapusinputbuku" type="submit" value="Home">Kembali</button></a></div>
    </div>
    </div>
    <div class="bawah"></div></div>
</body>
</html>