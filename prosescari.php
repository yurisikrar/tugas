<?php
if(basename($_SERVER["PHP_SELF"]) != "home.php"){
	?>
	<script language="javascript">
	alert("FILE HARUS DIAKSES OLEH HOME.PHP");
	document.location="home.php";
	</script>
	<?php
exit(); }

if(isset($_SESSION['ID_USER']))
{
}
else
{
	?>
	
	<script language="javascript">
	alert("ANDA HARUS LOGIN DULU BRO UNTUK BISA MENGAKSES HALAMAN INI");
	document.location="login.php";
	</script>
	<?php
	exit();
}
?>

<html><head><title>Proses Cari</title>
<link href="formlogin.css" rel="stylesheet" type="text/css" />
</head><body>
<?php
$kata_kunci=$_POST['kelas'];
$persiapan_query = mysqli_prepare($koneksi, "SELECT * FROM
nilai_yuris,siswa_yuris WHERE siswa_yuris.ID_SISWA=nilai_yuris.ID_SISWA and siswa_yuris.KELAS=?");
mysqli_stmt_bind_param($persiapan_query,"s",$kata_kunci);

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

$cek=mysqli_num_rows($ambil);
if($cek==0)
{
	echo "<center><b>Nama siswa belum dipilih/Pencarian
	dengan nama siswa yang ada masukkan tidak
	ditemukan!!!</center></b>";
} ?>
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
        </div>
        <div class="atass">
        </div>
    </div></body></html>	
	
	
	
	
	
	