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
    <form action="inputnilai.php" method="post" enctype="multipart/form-data"
    name="form1" id="form1">
    
        <h1>Formulir Nilai Siswa</h1>
        <table>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nama Siswa</div></td><td><div align="left"><select name="id_siswa" id="id_siswa" class="inputsiswa">
                <?php
                $a = mysqli_query($koneksi, "SELECT * FROM siswa_yuris");
                while ($brsjenis = mysqli_fetch_array($a, MYSQLI_ASSOC)) {
                echo "<option class=classoption value=$brsjenis[ID_SISWA]>$brsjenis[NAMA_SISWA]</option>";
                }
                ?>
        </select></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Matematika</div></td><td><div align="left"><input class="inputsiswa" type="text" name="mtk" id="mtk"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai B.Indonesia</div></td><td><div align="left"><input class="inputsiswa" type="text" name="bind" id="bind"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai B.Inggris</div></td><td><div align="left"><input class="inputsiswa" type="text" name="bing" id="bing"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Teori Kejuruan</div></td><td><div align="left"><input class="inputsiswa" type="text" name="kejuruan" id="kejuruan"></div></td></tr>
        </table>
        <div><table><tr><td><div><button class="tombolsimpaninputbuku" type="submit">Simpan</button></div></td><td><div><button class="tombolhapusinputbuku" type="reset">Hapus</button></div></td></tr></table></div>
    </form>
    <div><a href="home.php?pg=forminputnilai" class="linkpilihan"><button class="tombolhapusinputbuku" type="submit" value="Home">Kembali</button></a></div>
    </div>
    </div>
    <div class="bawah"></div></div>
</body>
</html>