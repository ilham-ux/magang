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
                                    <b>Data Admin</b>
                                </header> 
                                <div class="panel-body table-responsive">
                                    <div class="box-tools m-b-15">
                                    <form action="admin.php" method="POST">
                                    <?php
                    $query1="select * from admin";
                    $tampil=mysql_query($query1) or die(mysql_error());
                    ?>
                    <table id="data_admin" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>User ID <i class="fa fa-sort"></i></center></th>
                        <th><center>Username <i class="fa fa-sort"></i></center></th>
                        <th><center>Fullname <i class="fa fa-sort"></i></center></th>
                        <th rowspan="2"><center>Tools</center></th>
                      </tr>
                  </thead>
                     <?php while($data=mysql_fetch_array($tampil))
                    { ?>
                    <tbody>
                    <tr>
                    <td><?php echo $data['user_id']; ?></td>
                    <td><?php echo $data['username'];?></td>
                    <td>
                        <a href="detail-admin.php?hal=edit&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-user"></span>
                            <?php echo $data['fullname']; ?>
                        </a>
                    </td>
                    <td><center><img src="<?php echo $data['gambar']; ?>" class="img-circle" height="80" width="75" style="border: 3px solid #333333;" /></center></td>
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Admin" href="edit-admin.php?hal=edit&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    <a onclick="return confirm ('Yakin hapus <?php echo $data['fullname'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Admin" href="hapus-admin.php?hal=hapus&kd=<?php echo $data['user_id'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>

                <div class="text-right" style="margin-top: 10px;">
                 <a href="admin.php" class="btn btn-sm btn-info">Refresh Admin <i class="fa fa-refresh"></i></a> <a href="input-admin.php" class="btn btn-sm btn-warning">Tambah Admin <i class="fa fa-arrow-circle-right"></i></a>
                </div>
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
</body>
</html>