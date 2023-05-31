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
</head>
<body>
    <div class="formpencarian">
    <div class="bawahh">
        <h1>Cari Siswa Berdasarkan Kelas</h1>
        <form id="form1" name="form1" method="post" action="home.php?pg=prosescari">
        <table>
            <tr>
                <td><div class="inputsiswabagianjudul">Pilih Kelas</div></td><td><div><select class="inputsiswa" name="kelas" id="kelas">
<?php
$ambiljns=mysqli_query($koneksi, "SELECT DISTINCT(KELAS)
FROM nilai_yuris,siswa_yuris WHERE siswa_yuris.ID_SISWA=nilai_yuris.ID_SISWA");
if($ambiljns == false) {
	?>
	<script language="javascript">
	alert("<?php echo mysqli_error($koneksi); ?>");
	</script>
	<?php
	exit();
}
while($brsjns=mysqli_fetch_array($ambiljns, MYSQLI_ASSOC))
{ ?>
<option class="classoption" value="<?php echo"$brsjns[KELAS]";?>">
<?php echo"$brsjns[KELAS]";?> </option>
<?php
}
?></div></td>
            </tr></table>
            <table><tr><td><div><button class="tombolsimpaninputbuku" type="submit">Cari</button></div></td></tr>
        </table></form>
    </div>
    <div class="atass"></div></div>
</body>
</html>