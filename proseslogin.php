<?php
include 'koneksi.php';
$u = $_POST['username'];
$p = $_POST['password'];

$persiapan_query = mysqli_prepare($koneksi,"SELECT * FROM login_yuris WHERE USERNAME=? and PASSWORD=?");
mysqli_stmt_bind_param($persiapan_query,"ss",$u,$p);

$eksekusi_query = mysqli_stmt_execute($persiapan_query);
if($eksekusi_query == false) {
    ?>
        <script language="javascript">
            alert{"<?php echo mysqli_stmt_error($persiapan_query); ?>"};
            history.go(-1)
        </script>
    <?php
        exit();
}
$hasil = mysqli_stmt_get_result($persiapan_query);
$cekdata = mysqli_fetch_array($hasil, MYSQLI_ASSOC);
$periksa = mysqli_num_rows($hasil);

session_start();
if($periksa !=0)
{
    $_SESSION["ID_USER"]        = $cekdata["ID_USER"];
    $_SESSION["USERNAME"]       = $cekdata["USERNAME"];
    $_SESSION["PASSWORD"]       = $cekdata["PASSWORD"];
    $_SESSION["TIPE"]           = $cekdata["TIPE"];
    header('location:ceklogin.php');
}
else
{
    ?>
    <script language="javascript">
        alert('USERNAME/PASSWORD/HAK AKSES ANDA SALAH COBA LAGI!!!!!!');
        history.go(-1);
    </script>
<?php
}
?>