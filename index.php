<?php include "conn.php"; ?>
<!DOCTYPE html>
<html>
    <?php require 'head.php'; ?>
    <body class="skin-black">
        <header class="main-header">
            <a href="index.php" class="logo">
                <span class="logo-lg">Perpustakaan</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="messages-menu">
                            <table width="1000">
                                <tr>
                                    <td width="200"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
                                    <td align="left" width="30"> - </td>
                                    <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
                                </tr>
                            </table>
                        </li>
                        <li class="dropdown messages-menu">
                            <a href="cari_buku.php" data-placement="bottom" data-toggle="tooltip" title="Cari Buku">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="login.html" data-placement="bottom" data-toggle="tooltip" title="Login Admin">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                        <div class="col-md-8">
                            <section class="panel">
                                <header class="panel-heading">
                                    <b>Data Pengunjung Hari Ini</b>
                                </header>
                                <div class="panel-body table-responsive">
                                    <?php
                                    $tanggal = date("Y/m/d");
                                    $query1 = "select * from pengunjung where tgl_kunjung='$tanggal'";
                                    $tampil = mysql_query($query1) or die(mysql_error());
                                    ?>
                                    <table class="table table-hover" id="data_pengunjung">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Jam Berkunjung </th>
                                                <th>Keperluan</th>
                                            </tr>
                                        </thead>

                                        <?php while ($data = mysql_fetch_array($tampil)) {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $data['nama']; ?></td>
                                                    <td><?php echo $data['tgl_kunjung']; ?></td>
                                                    <td><?php echo $data['jam_kunjung']; ?></td>
                                                    <td><?php echo $data['perlu1']; ?></td>
                                                    <?php
                                                }
                                                ?>
                                    </table><hr />
                                    <?php
                                    $tampil = mysql_query("select * from pengunjung where tgl_kunjung='$tanggal'");
                                    $user = mysql_num_rows($tampil);
                                    ?>
                                    <center><h4>Jumlah Pengunjung Hari Ini : <?php echo "$user"; ?> Orang </h4> </center>
                                </div>
                            </section>    
                        </div>
                        <div class="col-md-4">
                            <section class="panel">
                                <header class="panel-heading">
                                    <b>Buku Pengunjung</b>
                                </header>
                                <div class="panel-body">
                                    <div class="twt-area">
                                        <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pengunjung.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">No </label>
                                                <div class="col-sm-10">
                                                <?php
                                                $sql_id = mysql_query("SELECT MAX(id_pengunjung) FROM pengunjung");
                                                $result = mysql_fetch_row($sql_id);
                                                $id = $result['0']+1;
                                                 ?>
                                                    <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" value="<?=$id?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Anda" required />  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Jenkel</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" name="jk" id="jk">
                                                        <option> -- Pilih Salah Satu --</option>
                                                        <option value="L"> Laki - Laki</option>
                                                        <option value="P"> Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Perlu</label>
                                                <div class="col-sm-10">
                                                    <input name="perlu1" type="text" id="perlu1" class="form-control" placeholder="Keperluan" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Cari?</label>
                                                <div class="col-sm-10">
                                                    <input name="cari" type="text" id="cari" class="form-control" placeholder="Apa yang anda cari.?" required />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Saran</label>
                                                <div class="col-sm-10">
                                                    <textarea rows="4" name="saran" id="saran" class="form-control" placeholder="Saran Anda untuk Perpustakaan" cols="25"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                                <div class="col-sm-10">
                                                    <input name="tgl_kunjung" type="text" class="form-control" id="tgl_kunjung" value="<?php echo "" . date("Y/m/d") . ""; ?>" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Jam</label>
                                                <div class="col-sm-10">
                                                    <input name="jam_kunjung" type="text" class="form-control" id="jam_kunjung" value="<?php echo "" . date("H:i:s") . "" ?>" readonly="readonly"/>
                                                </div>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                                <div class="col-sm-8">
                                                    <input type="submit" value="Simpan" name="simpan" class="btn btn-sm btn-primary" />&nbsp;
                                                    <a href="input-anggota.php" class="btn btn-sm btn-danger">Batal </a>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>                     
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <b>  Data Akumulasi Pengunjung</b>
                        </header>
                        <div class="panel-body table-responsive">
                            <?php
                            $query = "select * from pengunjung order by id desc limit 10";
                            $tampil = mysql_query($query) or die(mysql_error());
                            ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal</th>
                                        <th>Jam Berkunjung </th>
                                        <th>Keperluan</th>
                                        <th>Buku Yang di Cari</th>
                                    </tr>
                                </thead>

                                <?php while ($data1 = mysql_fetch_array($tampil)) {
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $data1['nama']; ?></td>
                                            <td><?php echo $data1['jk']; ?></td>
                                            <td><?php echo $data1['tgl_kunjung']; ?></td>
                                            <td><?php echo $data1['jam_kunjung']; ?></td>
                                            <td><?php echo $data1['perlu1']; ?></td>
                                            <td><?php echo $data1['cari']; ?></td></tr>
                                            <?php
                                        }
                                        ?>

                            </table><hr />
                            <?php
                            $tampil1 = mysql_query("select * from pengunjung order by id");
                            $user1 = mysql_num_rows($tampil1);
                            ?>
                            <center><h4>Jumlah Total Pengunjung : <?php echo "$user1"; ?> Orang </h4> </center>
                        </div>
                    </section>     
                </div>
        </div>
        <div class="footer-main">
            Copyright &copy BKKBN Yogyakarta
        </div>
    </aside>
</div>
            <?php require 'footer.php'; ?>
            
            </body>
            </html>