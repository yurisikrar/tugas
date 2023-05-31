<?php
include 'koneksi.php';
$persiapan_query=mysqli_prepare($koneksi,
"SELECT * FROM siswa_yuris WHERE ID_SISWA=?");
mysqli_stmt_bind_param($persiapan_query, "i", $_GET["idnya"]);
$eksekusi_query=mysqli_stmt_execute($persiapan_query);
if($eksekusi_query==false){
?>
<script language="javascript">
alert("<?php echo mysqli_stmt_error($persiapan_query);?>");
history.go(-1)
</script>

<?php
exit();
}
$hasil= mysqli_stmt_get_result($persiapan_query);
$periksa=mysqli_num_rows($hasil);
if($periksa==0){
	?>
	<script language ="javascript">
	alert("data tidak ada");
	history.go(-1)
	</script>
	
	<?php
	exit();
}
$cekdata=mysqli_fetch_array($hasil, MYSQLI_ASSOC);
$query_hapus=mysqli_query($koneksi,"DELETE FROM
nilai_yuris WHERE ID_SISWA=".$cekdata['ID_SISWA']);
$query_hapus=mysqli_query($koneksi,"DELETE FROM
siswa_yuris WHERE ID_SISWA=".$cekdata['ID_SISWA']);

$alamat_penyimpanan_gambar="gambar/";
$nama_gambar=$cekdata["foto"];
unlink($alamat_penyimpanan_gambar.$nama_gambar);
header('location:home.php?pg=forminputsiswa');
?>