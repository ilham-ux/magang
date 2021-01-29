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
                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from data_anggota order by id_anggota desc");
                        $total=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total"; ?></span>
                                    Total Anggota
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from data_buku order by id_buku desc");
                        $total1=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total1"; ?></span>
                                    Total Buku
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from trans_pinjam order by id_pinjam desc");
                        $total2=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total2"; ?></span>
                                    Total Peminjaman Buku
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysql_query("select * from pengunjung order by id_pengunjung desc");
                        $total3=mysql_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total3"; ?></span>
                                    Total Pengunjung
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <section class="panel">
                                <header class="panel-heading">
                                    Grafik Peminjaman Buku
                                </header>
                                <div class="panel-body">
                                    <canvas id="linechart" width="600" height="330"></canvas>
                                </div>
                                        </section>
                                    </div>
                                    <div class="col-lg-4">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Pemberitahuan
                                            </header>
                                                <div class="panel-body" id="noti-box">
                                                <?php
                                                $tampil=mysql_query("select * from data_anggota order by id_anggota desc limit 1");
                                                while($data2=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data2['nama'];?></strong>, Telah terdaftar menjadi anggota Perpustakaan.
                                                    </div>
                                                    <?php } ?>           
                                                <?php
                                                $tampil=mysql_query("select * from admin order by user_id desc limit 1");
                                                while($data3=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data3['fullname']; ?></strong>, Telah ditambahkan menjadi admin Perpustakaan yang baru. 
                                                    </div>
                                                <?php } ?>                                 
                                                <?php
                                                $tampil=mysql_query("select * from data_buku order by id_buku desc limit 1");
                                                while($data4=mysql_fetch_array($tampil)){
                                                ?>
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data4['judul']; ?></strong>, Buku bacaan baru yang ada di Perpustakaan
                                                    </div>
                                                <?php } ?>       
                                                <?php
                                                $tampil=mysql_query("select * from pengunjung order by id_pengunjung desc limit 1");
                                                while($data5=mysql_fetch_array($tampil)){
                                                ?>   
                                                    <div class="alert alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong><?php echo $data5['nama']; ?> </strong> Pengunjung baru di Perpustakaan
                                                    </div>
                                                <?php } ?>
                                                </div>
                                        </section>
                      </div>
                  </div>           
                    <div class="row">
                        <div class="col-md-5">
                            <div class="panel">
                                <header class="panel-heading">
                                    Daftar Anggota Baru
                                </header><?php
                        $tampil=mysql_query("select * from data_anggota order by id_anggota desc limit 3");
                        while($data1=mysql_fetch_array($tampil)){
                        ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                        <a href="anggota.php"><img src="<?php echo $data1['foto']; ?>" width="50" height="50" style="border: 3px solid #555555;"></a>
                                        <a href="anggota.php"><?php echo $data1['nama']; ?></a>
                                    </li>
                                </ul>
                               <?php } ?>
                                <div class="panel-footer bg-white">
                                    <a href="anggota.php" class="btn btn-sm btn-info">Data Anggota <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                          <section class="panel tasks-widget">
                              <header class="panel-heading">
                                Daftar Bacaan Perpustakaan
                            </header>
                            <div class="panel-body">
                              <div class="task-content">
                                  <ul class="task-list">
                                  <?php
                                  $tampil=mysql_query("select * from data_buku order by id_buku desc limit 5");
                                  while($data6=mysql_fetch_array($tampil)){
                                  ?>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="flat-grey list-child"/>
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp"><?php echo $data6['judul']; ?></span>
                                              <span class="label label-primary"><?php echo $data6['tgl_input']; ?></span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-info btn-xs"><i class="fa fa-check"></i></button>
                                                  <button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                                              </div>
                                          </div>
                                      </li>     
                                    <?php } ?>
                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-warning btn-sm pull-left" href="buku.php">Lihat Buku Bacaan</a>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
                </section>
                <div class="footer-main">
                    Copyright &copy BKKBN Yogyakarta
                </div>
            </aside>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="../js/plugins/chart.js" type="text/javascript"></script>
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
        <script src="../js/Director/app.js" type="text/javascript"></script>
        <script src="../js/Director/dashboard.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
<script type="text/javascript">
    $(function() {
                "use strict";
                var data = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.2)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            data: [65, 59, 80, 81, 56, 55, 40]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
</script>
</body>
</html>