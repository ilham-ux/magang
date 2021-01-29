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
                                    <b>Input Peminjaman Buku</b>
                                </header>
                        <?php
                        $pinjam			= date("d-m-Y");
                        $maxpinjam		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
                        $kembali		= date("d-m-Y", $maxpinjam);
                        ?>
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-transaksi.php" method="post" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Judul Buku</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="buku" id="buku">
                                  <option value=""> -- Pilih Salah Satu --</option>
                                <?php
                                    $sql = mysql_query("SELECT * FROM data_buku ORDER BY id_buku ASC");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    ?><option value="<?=$data['id_buku']?>-<?=$data['judul']?>"><?=$data['id_buku'].'-'.$data['judul']?></option><?php }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <?php }
                                ?>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="nama" id="nama">
                                  <option value=""> -- Pilih Salah Satu --</option>
                                <?php
                                    $sql = mysql_query("SELECT * FROM data_anggota ORDER BY id_anggota ASC");
                                    if(mysql_num_rows($sql) != 0){
                                    while($data = mysql_fetch_assoc($sql)){
                                    echo '<option value='.$data['nama'].'>'.$data['nama'].'</option>'; }
                                    }
                                ?>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam</label>
                              <div class="col-sm-8">
                               <input type="text" id="pinjam" name="pinjam" class="form-control" value="<?php echo $pinjam; ?>" readonly="readonly" >   
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali</label>
                              <div class="col-sm-8">
                                  <input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo $kembali; ?>" readonly="readonly">
                              </div>
                          </div>
                          </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-anggota.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                          <div style="margin-top: 20px;"></div>
                      </form>
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