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
    <link href="home.css?v=1.9" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="isiforminputsiswa">
        <div class="bawahh">
            <h1 class="juduldaftarsiswa">Daftar Siswa</h1>
            <table width="700" border="0" align="center">
                <tr>
                    <td><div align="center" class="judultabelsiswa"><strong>NO</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>ID SISWA</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>NAMA SISWA</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>KELAS</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>FOTO</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>EDIT</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>DELETE</strong></div></td>
                </tr>
                <?php
                $no=1;
                $ambil=mysqli_query($koneksi,"SELECT * FROM siswa_yuris ORDER BY KELAS asc");
                while($array=mysqli_fetch_array($ambil, MYSQLI_ASSOC))
                {
                    ?>
                <tr>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$no"; $no++; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[ID_SISWA]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[NAMA_SISWA]"; ?></div></td>
                    <td><div align="center" class="isitabelsiswa"><?php echo"$array[KELAS]"; ?></div></td>
                    <td><div align="center"><img src="<?php echo"./gambar/$array[FOTO]";?>"
                    width="50" height="50"/></div></td>
                    <td><div align="center"><a href="home.php?pg=formeditsiswa&idnya=<?php echo $array['ID_SISWA'];?>" class="linkpilihan">
                    <button class="tomboledit" type="submit" value="Home">Edit</button></a></div></td>
                    <td><div align="center"><a href="deletesiswa.php?idnya=<?php echo $array['ID_SISWA'];?>" onclick="return confirm('Yakin akan dihapus?')" class="linkpilihan">
                    <button class="tombolhapus" type="submit" value="Home">Hapus</button></a></div>
                    </td></tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="atass">
            <div class="hurufforminputsiswa">Tambahkan Data Siswa Baru</div>
            <div class="hurufforminputsiswa">Dengan Klik Tombol Di Bawah</div>
            <div><a href="home.php?pg=halamaninputsiswa" class="linkpilihan"><button class="tombolsiswa" type="submit" value="Home">Tekan Aku</button></a></div>
        </div>
    </div>
</body>
</html>