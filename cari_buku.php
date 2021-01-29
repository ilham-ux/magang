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
                        <div class="col-md-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <b>Data Pencarian Buku</b>
                                </header>
                                <div class="panel-body table-responsive">
                                    <?php
                                    $tanggal = date("Y/m/d");
                                    $query1 = "select * from data_buku";
                                    $tampil = mysql_query($query1) or die(mysql_error());
                                    ?>
                                    <table class="table table-hover" id="data_cari">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Judul [Tahun Terbit]</th>
                                                <th class="text-center">Pengarang</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Lokasi</th>
                                            </tr>
                                        </thead>

                                        <?php while ($data = mysql_fetch_array($tampil)) {
                                            ?>
                                            <tbody>
                                                <tr>
                                                    <td><?=$data['judul']; ?>[<?=$data['th_terbit']?>]</td>
                                                    <td><?=$data['pengarang']; ?></td>
                                                    <td><?=$data['kategori']; ?></td>
                                                    <td><?=$data['lokasi']; ?></td>
                                                </tr>
                                                    <?php
                                                }
                                                ?>
                                    </table><hr />
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
            <?php require 'footer.php'; ?>
            
            </body>
            </html>