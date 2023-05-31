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
    <title>laporan</title>
    <link href="home.css?v=1.9" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="isiforminputsiswa">
        <div class="bawahh">
            <h1 class="juduldaftarsiswa">Daftar Siswa</h1>
            <table class="tabelinputnilai">
                <tr>
                    <td><div align="center" class="judultabelsiswa"><strong>NO</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>NAMA SISWA</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>MATEMATIKA</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>BAHASA INDONESIA</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>BAHASA INGGRIS</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>TEORI KEJURUAN</strong></div></td>
                </tr>
                <?php
                $no=1;
                $ambil=mysqli_query($koneksi, "SELECT * FROM siswa_yuris,nilai_yuris WHERE siswa_yuris.ID_SISWA=nilai_yuris.ID_SISWA ORDER BY KELAS asc");
                while($array=mysqli_fetch_array($ambil, MYSQLI_ASSOC))
                {
                    ?>
                <tr>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$no"; $no++; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[NAMA_SISWA]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[MATEMATIKA]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[BAHASA_INDONESIA]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[BAHASA_INGGRIS]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[TEORI_KEJURUAN]"; ?></div></td>
                </tr>
                    <?php
                }
                ?>
            </table>
            <div><a href="ekspor.php" class="linkpilihan"><button class="tombolsimpaninputbuku" type="submit" value="Home">Download</button></a></div>
        </div>
        <div class="atass">
        </div>
    </div>
</body>
</body>
</html>