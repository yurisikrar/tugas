<?php
include 'koneksi.php';
$id_siswa=$_POST['id_siswa'];
$mtk=$_POST['mtk'];
$bind=$_POST['bind'];
$bing=$_POST['bing'];
$kejuruan=$_POST['kejuruan'];
$persiapan_query = mysqli_prepare($koneksi, "INSERT INTO nilai_yuris 
(ID_SISWA, MATEMATIKA, BAHASA_INDONESIA, BAHASA_INGGRIS, 
TEORI_KEJURUAN) VALUES (?, ?, ?, ?, ?)");

mysqli_stmt_bind_param($persiapan_query,"issss", $id_siswa,$mtk,$bind,$bing,$kejuruan);
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