<?php
include 'koneksi.php' ;
$nisn=$_POST['nisn'] ;
$nama=$_POST['nama'] ;
$kelas=$_POST['kelas'] ;
$gb=$_FILES['fo']['name'];
$type_gambar=$_FILES['fo']['type'];
$lokasi_file = $_FILES['fo']['tmp_name'];
if ($type_gambar != "image/gif" AND
    $type_gambar != "image/jpeg" AND
    $type_gambar != "image/jpg" AND 
    $type_gambar != "image/png")
    {
        echo "upload gagal !!<br>
        Tipe file <b>$gb</b> : $type_gambar <br>
        Tipe File yang boleh di Upload jpeg,gif,jpg,png<br>
        Pastikan Semua Field di ISi
        <p><a href='home.php?pg=forminputsiswa'> kembali ke awal</a>
        </p>";
        exit();
    }
        $persiapan_query = mysqli_prepare(
            $koneksi,
            "INSERT INTO siswa_yuris(ID_SISWA,NAMA_SISWA,KELAS,FOTO) VAlUES(?, ?, ?, ?)" 
        );
        mysqli_stmt_bind_param($persiapan_query,"ssss",$nisn,$nama,$kelas,$gb);
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
        $simpan_ke = "gambar/" . $gb;
        move_uploaded_file($lokasi_file, $simpan_ke);
        header('location:home.php?pg=forminputsiswa');
        ?>