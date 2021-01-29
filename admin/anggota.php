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
                                    <b>Data Anggota</b>

                                </header>

                                <div class="panel-body table-responsive">
                                    <?php
                    $query1="select * from data_anggota";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                <table id="anggota_table" class="table table-hover table-condensed">
                    <thead>
                        <tr>                  
                            <th><center>Nama </center></th>
                            <th><center>Jenis Kelamin </center></th>
                            <th><center>Tempat Lahir </center></th>
                            <th><center>Alamat </center></th>
                            <th><center>Tools</center></th>
                      </tr>
                    </thead>
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <td><a href="detail-anggota.php?hal=edit&kd=<?php echo $data['id_anggota'];?>"><span class="fa fa-user"></span> <?php echo $data['nama']; ?></a></td>
                    <td><?php echo $data['jk'];?></td>
                    <td><?php echo $data['ttl'];?></td>
                    <td><?php echo $data['alamat'];?></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="edit-anggota.php?hal=edit&kd=<?php echo $data['id_anggota'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Anggota" href="hapus-anggota.php?hal=hapus&kd=<?php echo $data['id_anggota'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                   
                  <?php $tampil=mysql_query("select * from data_anggota order by id_anggota");
                        $user=mysql_num_rows($tampil);
                    ?>
                  <center><h4>Jumlah Anggota : <?php echo "$user"; ?> Orang </h4> </center>
                  
                <div class="text-right" style="margin-top: 10px;">
                 <a href="anggota.php" class="btn btn-sm btn-info">Refresh Anggota <i class="fa fa-refresh"></i></a> <a href="input-anggota.php" class="btn btn-sm btn-warning">Tambah Anggota <i class="fa fa-arrow-circle-right"></i></a>
                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="footer-main">
                    Copyright &copy BKKBN Yogyakarta</a>
                </div>
            </aside>
        </div>
        <?php require 'footer.php'; ?>
</body>
</html>