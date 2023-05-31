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
    <link href="home.css?v=2.9" rel="stylesheet" type="text/css" />
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
                    <td><div align="center" class="judultabelsiswa"><strong>EDIT</strong></div></td>
                    <td><div align="center" class="judultabelsiswa"><strong>DELETE</strong></div></td>
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
                    <td><div align="center"><a href="home.php?pg=formeditnilai&idnya=<?php echo $array['ID_NILAI'];?>" class="linkpilihan">
                    <button class="tomboledit" type="submit" value="Home">Edit</button></a></div></td>
                    <td><div align="center"><a href="deletenilai.php?idnya=<?php echo $array['ID_NILAI'];?>" onclick="return confirm('Yakin akan dihapus?')" class="linkpilihan">
                    <button class="tombolhapus" type="submit" value="Home">Hapus</button></a></div>
                    </td></tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div class="atass">
            <div class="hurufforminputsiswa">Tambahkan Nilai Siswa</div>
            <div class="hurufforminputsiswa">Dengan Klik Tombol Di Bawah</div>
            <div><a href="home.php?pg=halamaninputnilai" class="linkpilihan"><button class="tombolsiswa" type="submit" value="Home">Tekan Aku</button></a></div>
        </div>
    </div>
</body>
</html>