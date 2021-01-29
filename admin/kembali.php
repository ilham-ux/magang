<?php
include "../conn.php";
$maks_pinjam		= 2; 
$maks_hari_pinjam	= 7; 

$id_trans	= isset($_GET['id_trans']) ? $_GET['id_trans'] : "";
$judul		= isset($_GET['judul']) ? $_GET['judul'] : "";

if ($id_trans==""||$judul=="") {
	echo "<script>alert('Anda Belum Memilih Buku!'); window.location = 'transaksi.php'</script>";
} else {
	$us=mysql_query("UPDATE trans_pinjam SET status='kembali' WHERE id_pinjam='$id_trans'")or die ("Gagal update".mysql_error());
	$uj=mysql_query("UPDATE data_buku SET jumlah_buku=(jumlah_buku+1) WHERE judul='$judul'")or die ("Gagal update".mysql_error());

	if ($us || $uj) {
		echo "<script>alert('Buku telah dikembalikan'); window.location = 'transaksi.php'</script>";
	} else {
		echo "<script>alert('Oops, Buku gagal dikembalikan!'); window.location = 'transaksi.php'</script>";
		echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
	}
}
?>
