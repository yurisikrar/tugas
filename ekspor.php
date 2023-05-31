<?php
header("content-type: application/vnd-ms-excel");
header("content-Disposition: attachment; filename=laporan nilai siswa.xls");
?>
<html><head><title>Laporan Nilai Siswa</title></head><body>
<div align="center"><fieldset><legent>LAPORAN NILAI SISWA</legent>
<table width="976" border="0" align="center">
<tr>
<td><div align="center"><strong>NO</strong></div></td>
<td><div align="center"><strong>NAMA SISWA</strong></div></td>
<td><div align="center"><strong>KELAS</strong></div></td>
<td><div align="center"><strong>MATEMATIKA</strong></div></td>
<td><div align="center"><strong>B. INDONESIA</strong></div></td>
<td><div align="center"><strong>B. INGGRIS</strong></div></td>
<td><div align="center"><strong>T. KEJURUAN </strong></div></td>
</tr>
<?php
include "koneksi.php";
$no=1;
$ambil=mysqli_query($koneksi, "SELECT * FROM nilai_yuris, siswa_yuris
WHERE nilai_yuris.ID_SISWA=siswa_yuris.ID_SISWA ORDER BY KELAS");
while($array=mysqli_fetch_array($ambil, MYSQLI_ASSOC))
{
	?>
	<tr>
        	<td><div align="center"><?php echo"$no"; $no++; ?></div></td>
          <td><div align="center"><?php echo"$array[NAMA_SISWA]"; ?></div></td>
          <td><div align="center"><?php echo"$array[KELAS]"; ?></div></td>
          <td><div align="center"><?php echo"$array[MATEMATIKA]"; ?></div></td>
          <td><div align="center"><?php echo"$array[BAHASA_INDONESIA]"; ?></div></td>
          <td><div align="center"><?php echo"$array[BAHASA_INGGRIS]"; ?></div></td>
          <td><div align="center"><?php echo"$array[TEORI_KEJURUAN]"; ?></div></td>
        </tr>
<?php } ?>
</table></fieldset></div></body></html>