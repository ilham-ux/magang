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
                                    <b>Input Buku</b>

                                </header>
                    <?php
                    $query = mysql_query("SELECT * FROM data_buku WHERE id_buku='$_GET[kd]'");
                    $data  = mysql_fetch_array($query);
                    ?>
                                <div class="panel-body">
                      <form class="form-horizontal style-form" style="margin-top: 20px;" action="update-buku.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                              <div class="col-sm-8">
                                  <input name="id" type="text" id="id" class="form-control" value="<?php echo $data['id_buku']; ?>" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                              <div class="col-sm-8">
                                  <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" value="<?php echo $data['judul']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                              <div class="col-sm-8">
                                  <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off" value="<?php echo $data['pengarang']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                              <div class="col-sm-8">
                                  <input name="th_terbit" type="text" id="th_terbit" class="form-control" autocomplete="off" value="<?php echo $data['th_terbit']; ?>" required="" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                              <div class="col-sm-8">
                                  <input name="penerbit" type="text" id="penerbit" class="form-control" autocomplete="off" value="<?php echo $data['penerbit']; ?>" required="" />
                              </div>
                          </div>
               
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                              <div class="col-sm-8">
                                  <input name="kategori" type="text" id="Kategori" class="form-control" autocomplete="off" value="<?php echo $data['kategori']; ?>" required="" />
                              </div>
                         </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                              <div class="col-sm-8">
                                  <input name="jumlah_buku" type="text" id="jumlah_buku" class="form-control" autocomplete="off" value="<?php echo $data['jumlah_buku']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                              <div class="col-sm-8">
                                  <input name="lokasi" type="text" id="lokasi" class="form-control" autocomplete="off" value="<?php echo $data['lokasi']; ?>" required />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                              <div class="col-sm-4">
                                  <select class="form-control" name="asal" id="asal" required >                   
                                  <optgroup label="Asal">Asal</optgroup>
                                  <option value="P" <?php if($data['asal']=="P") echo "selected"; ?>> Pembelian</option>
                                  <option value="S" <?php if($data['asal']=="S") echo "selected"; ?>> Sumbangan</option>
								   <option value="D" <?php if($data['asal']=="D") echo "selected"; ?>> Denda</option>
								  
								  
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Input</label>
                              <div class="col-sm-8">
                                  <input name="tgl_input" type="text" id="tgl_input" class="form-control" autocomplete="off" value="<?php echo $data['tgl_input']; ?>" readonly="readonly" />
                              </div>
                          </div>
                          
                          </div>
                          <div class="form-group" style="margin-bottom: 20px;">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                  <a href="buku.php" class="btn btn-sm btn-danger"> Batal</a>
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
                    Copyright &copy  BKKBN Yogyakarta
                </div>
            </aside>
        </div>
        <?php require 'footer.php'; ?>
</body>
</html>