<?php
include 'koneksi.php';
$id=$_POST["id_siswa"];
$nama=$_POST['nama'];
$kelas=$_POST['kelas'];
$gb=$_FILES['fo']['name'];
$type_gambar=$_FILES['fo']['type'];
$lokasi=$_FILES['fo']['tmp_name'];

if(empty($lokasi))
{
    $persiapan_query=mysqli_prepare($koneksi,
    "UPDATE siswa_yuris SET NAMA_SISWA=?, KELAS=? WHERE id_siswa=?");
    mysqli_stmt_bind_param($persiapan_query,"ssi",
    $nama,$kelas,$id);
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
header('location:homeguru.php?pg=forminputsiswa');
exit();
}
else
{
    if ($type_gambar != "image/gif" AND
    $type_gambar != "image/jpeg" AND
    $type_gambar != "image/jpg" AND
    $type_gambar != "image/png")
    {
        echo "Upload gagal !!<br>
        Tipe File <b>$gb</b> : $type_gambar <br>
        Tipe file yang boleh di Upload jpeg,gif,jpg,png<br>
        Pastikan Semua Field di Isi
        <p><a href='home.php?pg=forminputsiswa'> kembali ke awal </a>
        </p>";
        exit();
    }
$persiapan_query = mysqli_prepare($koneksi,"UPDATE siswa_yuris
SET NAMA_SISWA=?, KELAS=?, FOTO=? WHERE id_siswa=?");
mysqli_stmt_bind_param($persiapan_query,"sssi",$nama,
$kelas,$gb,$id);

$eksekusi_query = mysqli_stmt_execute($persiapan_query);
if($eksekusi_query == false){
    ?>
    <script language="javascript">
        alert("<?php echo mysqli_stmt_error($persiapan_query); ?>");
        history.go(-1)
        </script>
        <?php
        exit();
}
$simpan_ke = "gambar/" . $gb;
move_uploaded_file($lokasi, $simpan_ke);
header('location:home.php?pg=forminputsiswa');
}
?>