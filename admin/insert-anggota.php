<?php
$namafolder="gambar_anggota/"; //tempat menyimpan file
$id = $_POST['id'];
		$nama= $_POST['nama'];
		$jk=$_POST['jk'];
        $ttl = $_POST['ttl'];
        $alamat=$_POST['alamat'];
include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO data_anggota(id_anggota,nama,jk,ttl,alamat,foto) VALUES
            ('$id','$nama','$jk','$ttl','$alamat','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='input-anggota.php'> Input Lagi</a></h3>";
            echo "<h3><a href='anggota.php'> Data Anggota</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	$sql="INSERT INTO data_anggota(id_anggota,nama,jk,ttl,alamat) VALUES
            ('$id','$nama','$jk','$ttl','$alamat')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "<h3><a href='input-anggota.php'> Input Lagi</a></h3>";
            echo "<h3><a href='anggota.php'> Data Anggota</a></h3>";
}

?>