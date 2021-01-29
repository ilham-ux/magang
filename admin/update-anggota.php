<?php
$namafolder="gambar_anggota/";
include "../conn.php";
		$id = $_POST['id'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $ttl = $_POST['ttl'];
        $alamat = $_POST['alamat'];	
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
        $jenis_gambar=$_FILES['nama_file']['type'];
        
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE data_anggota SET nama='$nama', jk='$jk',  ttl='$ttl', alamat='$alamat', foto='$gambar' WHERE id_anggota='$id'";
			$res=mysql_query($sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='anggota.php'> Input Lagi</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	$sql="UPDATE data_anggota SET nama='$nama', jk='$jk',  ttl='$ttl', alamat='$alamat' WHERE id_anggota='$id'";
			$res=mysql_query($sql) or die (mysql_error());
	echo "<h3><a href='anggota.php'> Input Lagi</a></h3>";	
}

?>