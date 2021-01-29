<?php
$namafolder="gambar_buku/"; //tempat menyimpan file

include "../conn.php";
        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $th_terbit = $_POST['th_terbit'];
        $penerbit = $_POST['penerbit'];
        $kategori = $_POST['kategori'];
        $jumlah_buku = $_POST['jumlah_buku'];
        $lokasi = $_POST['lokasi'];
        $asal = $_POST['asal'];
        $tgl_input = $_POST['tgl_input'];
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];


		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO data_buku(judul,pengarang,th_terbit,penerbit,kategori,jumlah_buku,lokasi,asal,tgl_input,gambar) VALUES
            ('$judul','$pengarang','$th_terbit','$penerbit','$kategori','$jumlah_buku','$lokasi','$asal','$tgl_input','$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<h3><a href='input-buku.php'> Input Lagi</a></h3>";
            echo "<h3><a href='buku.php'> Data Buku</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	$sql="INSERT INTO data_buku(judul,pengarang,th_terbit,penerbit,kategori,jumlah_buku,lokasi,asal,tgl_input) VALUES
            ('$judul','$pengarang','$th_terbit','$penerbit','$kategori','$jumlah_buku','$lokasi','$asal','$tgl_input')";
            $res=mysql_query($sql) or die (mysql_error());
            
            echo "<h3><a href='input-buku.php'> Input Lagi</a></h3>";
            echo "<h3><a href='buku.php'> Data Buku</a></h3>";  
}

?>