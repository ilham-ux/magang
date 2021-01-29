<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<!DOCTYPE html>
<html>
<?php require 'head.php'; ?>
      <body class="skin-black">
        <header class="header">
            <a href="index.php" class="logo">
                Perpustakaan
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                    <li>
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>

<?php 
require 'sess_time.php';
} ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <aside class="left-side sidebar-offcanvas">
                        <section class="sidebar">
                            <div class="user-panel">
                                <div>
                                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center>
                                </div>
                                <div class="info">
                                    <center><p><?php echo $_SESSION['fullname']; ?></p></center>

                                </div>
                            </div>
                            <?php include "menu.php"; ?>
                        </section>
                    </aside>

                    <aside class="right-side">
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    <b>Data Transaksi Peminjaman</b>
                                </header>
                                <div class="panel-body table-responsive">
                                    <?php
                    $query1="select * from trans_pinjam WHERE status='pinjam' ORDER BY id_pinjam";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                <table id="data_transaksi" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul Buku </th>
                        <th class="text-center">Peminjam </th>
                        <th class="text-center">Tgl Pinjam </th>
                        <th class="text-center">Tgl Kembali </th>
                        <th class="text-center">Status </th>
                        <th class="text-center">Terlambat</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                  </thead>
                  <?php
                  $no=0;
                      while($data=mysql_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td class="text-center"><?php echo $no;?></td>
                    <td><span class="fa fa-book"><a href="detail-buku.php?hal=edit&kd=<?php echo $data['id_peminjam'];?>"></span> <?php echo $data['judul_buku'];?></a></td>
                    <td><?php echo $data['nama_peminjam'];?></td>
                    <td class="text-center"><?php echo $data['tgl_pinjam'];?></td>
                    <td class="text-center"><?php echo $data['tgl_kembali'];?></td>
                    <td class="text-center"><?php echo $data['status'];?></td>
                    <td class="text-center"><?php 
                      $tgl_dateline=$data['tgl_kembali'];
		              $tgl_kembali=date('Y-m-d');
		              $lambat=terlambat($tgl_dateline, $tgl_kembali);
                      $denda1=1000;
                      $denda=$lambat*$denda1;
		              if ($lambat>0) {
                      echo "<b><font color='red'>$lambat hari &nbsp | &nbsp(Rp. $denda1,- x $lambat) = Rp. $denda,-</font></b>";
		              }
		              else {
               	    echo "<b><font color='blue'> $lambat hari &nbsp | &nbsp Baru Meminjam</font></b>";
		              }
                    ?></td>
                    <td class="text-center"><div id="thanks">
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Kembali" href="kembali.php?hal=edit&id_trans=<?php echo $data['id_pinjam'];?>&judul=<?php echo $data['judul_buku'];?>">
                        <span class="glyphicon glyphicon-tags"></span>
                    </a>
                    <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Perpanjang" href="perpanjang.php?hal=id_trans=<?php echo $data['id_pinjam'];?>&judul=<?php echo $data['judul_buku'];?>&kembali=<?php echo $data['tgl_kembali'];?>&lambat=<?php $lambat; ?>">
                        <span class="fa fa-refresh fa-spin"></span>
                    </a>
                    </td></tr></div>
                    <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <?php $tampil=mysql_query("select * from trans_pinjam where status='pinjam' order by id_pinjam");
                        $pinjam=mysql_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Peminjam Buku : <?php echo "$pinjam"; ?> Orang </h4> </center>
                  
                <div class="text-right" style="margin-top: 10px;">
                 <a href="transaksi.php" class="btn btn-sm btn-info">Refresh <i class="fa fa-refresh"></i></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="footer-main">
                    Copyright &copy BKKBN Yogyakarta
                </div>
            </aside>
        </div>
        <?php require 'footer.php'; ?>
        <script type="text/javascript">
            $(function () {
                $("#data_transaksi").DataTable();
            });
        </script>
</body>
</html>