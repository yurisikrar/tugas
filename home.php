<!DOCTYPE html>
<?php
include "koneksi.php";
session_start();
if(isset($_SESSION['ID_USER']))
{
}
else
{
?>
<script language="javascript">
	alert("ANDA HARUS LOGIN DULU UNTUK BISA MENGAKSES HALAMAN INI");
	document.location="formlogin.php";
	</script>
<?php
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang <?php echo "$_SESSION[USERNAME]" ?></title>
    <link href="home.css?v=2.6" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="isi" align="center">
        <div class="sidebar">
            <div class="sideatas">
                <div class="namalogin"><h1>Pendataan Siswa</h1></div>
                <div class="namalogin">
                Selamat Datang <?php echo "$_SESSION[USERNAME]" ?>
                </div>
            </div>
            <div class="sidebawah">
                <div class="menu">
                    <div><a href="home.php?pg=homesekolah" class="linkpilihan"><button class="tombolmenu" type="submit" value="Home">Home</button></a></div>
                    <div><a href="home.php?pg=forminputsiswa" class="linkpilihan"><button class="tombolmenu" type="submit" value="Home">Data Siswa</button></a></div>
                    <div><a href="home.php?pg=forminputnilai" class="linkpilihan"><button class="tombolmenu" type="submit" value="Home">Data Nilai</button></a></div>
                    <div><a href="home.php?pg=laporan" class="linkpilihan"><button class="tombolmenu" type="submit" value="Home">Laporan</button></a></div>
                    <div><a href="home.php?pg=pencarian" class="linkpilihan"><button class="tombolmenu" type="submit" value="Home">Pencarian</button></a></div>
                    <div><a href="logout.php" class="linkpilihan"><button class="tombolkeluar" type="submit" value="Home">LogOut</button></a></div>
                </div>
            </div>
        </div>
        <div class="konten">
        <?php
        if(isset($_GET['pg'])){
	    include "" . $_GET['pg'] . ".php";
        }
        ?>
        </div>
    </div>
</body>
</html>