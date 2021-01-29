<?php
include "conn.php";
$id          = $_POST['id'];
$nama        = $_POST['nama'];
$jk 		 = $_POST['jk'];
$perlu1 	 = $_POST['perlu1'];
$cari 	     = $_POST['cari'];
$saran	     = $_POST['saran'];
$tgl_kunjung = $_POST['tgl_kunjung'];
$jam_kunjung = $_POST['jam_kunjung'];


$query = mysql_query("INSERT INTO pengunjung (nama, jk, perlu1, cari, saran, tgl_kunjung, jam_kunjung) VALUES ('$nama', '$jk', '$perlu1', '$cari', '$saran', '$tgl_kunjung', '$jam_kunjung')");
if ($query){
	echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'index.php'</script>";	
} else {
	echo mysql_error();
	echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>";	
}
//}
?>