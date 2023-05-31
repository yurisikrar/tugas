<?php
include 'koneksi.php';
$id=$_POST['id_nilai'];
$matematika=$_POST['mtk'];
$bahasa_indonesia=$_POST['bind'];
$bahasa_inggris=$_POST['bing'];
$teori_kejuruan=$_POST['kejuruan'];

    $persiapan_query=mysqli_prepare($koneksi,
    "UPDATE nilai_yuris SET MATEMATIKA=?, BAHASA_INDONESIA=?, BAHASA_INGGRIS=?, TEORI_KEJURUAN=? WHERE ID_NILAI=?");
    mysqli_stmt_bind_param($persiapan_query,"ssssi",
    $matematika,$bahasa_indonesia,$bahasa_inggris,$teori_kejuruan,$id);
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
header('location:home.php?pg=forminputnilai');
exit();

$persiapan_query = mysqli_prepare($koneksi,"UPDATE nilai_yuris
SET MATEMATIKA=?, BAHASA_INDONESIA=?, BAHASA_INGGRIS=?, TEORI_KEJURUAN=? WHERE ID_NILAI=?");
mysqli_stmt_bind_param($persiapan_query,"ssssi",$matematika,
$bahasa_indonesia,$bahasa_inggris,$teori_kejuruan,$id);

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
header('location:home.php?pg=forminputnilai');
?>