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
                    <ul class="nav navbar-nav">->
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
                <?php require 'sess_time.php'; } ?>
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
                                    <b>Data Transaksi Pengembalian</b>

                                </header>
                             
                                <div class="panel-body table-responsive">
                                    
                                    <?php
                    $query1="select * from trans_pinjam WHERE status='kembali' ORDER BY id_pinjam";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                                    <table id="data_transaksi_kembali" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th class="text-center" width="5%">No</th>
                        <th class="text-center">Judul Buku </th>
                        <th class="text-center">Peminjam </th>
                        <th class="text-center">Tgl Pinjam </th>
                        <th class="text-center">Tgl Kembali </th>
                        <th class="text-center">Status </th>
                      </tr>
                  </thead>
                  <?php
                  $no=0;
                      while($data=mysql_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td class="text-center"><?php echo $no;?></td>
                    <td><span class="fa fa-book"></span>
                        <a href="detail-buku.php?hal=edit&kd=<?php echo $data['id_peminjam'];?>">
                            <?php echo $data['judul_buku'];?>
                        </a>
                    </td>
                    <td><?php echo $data['nama_peminjam'];?></td>
                    <td class="text-center"><?php echo $data['tgl_pinjam'];?></td>
                    <td class="text-center"><?php echo $data['tgl_kembali'];?></td>
                    <td class="text-center"><b><font color="blue"><?php echo $data['status'];?></font></b></td>
                    </tr>
                    <?php   
              } 
              ?>
                   </tbody>
                   </table>
                   
                  <?php $tampil=mysql_query("select * from trans_pinjam where status='kembali' order by id_pinjam");
                        $pinjam=mysql_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Peminjam Buku : <?php echo "$pinjam"; ?> Orang </h4> </center>
                  
                <div class="text-right" style="margin-top: 10px;">
                 <a href="transaksi-kembali.php" class="btn btn-sm btn-info">Refresh <i class="fa fa-refresh"></i></a> </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    Copyright &copy BKKBN Yogyakarta
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <?php require 'footer.php'; ?>
        <script>
          $(function () {
           
            $("data_transaksi_kembali").DataTable();
            
          });
        </script>
</body>
</html>