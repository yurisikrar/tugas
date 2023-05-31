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
    <title>Form Edit Nilai</title>
    <link href="home.css?v=2.9" rel="stylesheet" type="text/css" />
</head>
<body>
        <?php
        $nilai=$_GET['idnya'];
        $persiapan_query = mysqli_prepare($koneksi, "SELECT * FROM siswa_yuris,nilai_yuris WHERE ID_NILAI=? AND siswa_yuris.ID_SISWA=nilai_yuris.ID_SISWA");
    mysqli_stmt_bind_param($persiapan_query,"i", $nilai);
        $eksekusi_query = mysqli_stmt_execute($persiapan_query);
        if($eksekusi_query == false) {
            ?>
            <script language="javascript">
                alert("<?php echo mysqli_stmt_error($persiapan_query); ?>");
                history.go(-1)
                </script>
                <?php
                exit();
        }
        $ambil = mysqli_stmt_get_result($persiapan_query);
        $array=mysqli_fetch_array($ambil, MYSQLI_ASSOC);
        ?>
    <div class="halamaninputsiswa">
    <div class="atasss">
    <div class="tabelhalamaninputsiswa">
    <form action="editnilai.php" method="post" enctype="multipart/form-data"
    name="form1" id="form1">
    
        <h1>Formulir Data Siswa</h1>
        <table>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Matematika</div></td><td><div align="left"><input type="hidden" value="<?php echo"$_GET[idnya]"?>" name="id_nilai"><input class="inputsiswa" type="text" name="mtk" id="mtk" value="<?php echo"$array[MATEMATIKA]" ?>"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Bahasa Indonesia</div></td><td><div align="left"><input class="inputsiswa" type="text" name="bind" id="bind" value="<?php echo"$array[BAHASA_INDONESIA]" ?>"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Bahasa Inggris</div></td><td><div align="left"><input class="inputsiswa" type="text" name="bing" id="bing" value="<?php echo"$array[BAHASA_INGGRIS]" ?>"></div></td></tr>
        <tr><td><div align="left" class="inputsiswabagianjudul">Nilai Tori Kejuruan</div></td><td><div align="left"><input class="inputsiswa" type="text" name="kejuruan" id="kejuruan" value="<?php echo"$array[TEORI_KEJURUAN]" ?>"></div></td></tr>
        </table>
            <div><table><tr><td><div><button class="tombolsimpaninputbuku" type="submit">Simpan</button></div></td><td><div><button class="tombolhapusinputbuku" type="reset">Reset</button></div></td></tr></table></div>
    </form>
    <div><a href="home.php?pg=forminputnilai" class="linkpilihan"><button class="tombolhapusinputbuku" type="submit" value="Home">Kembali</button></a></div>
    </div>
    </div>
    <div class="bawah"></div></div>
</body>
</html>