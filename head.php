<head>
    <meta charset="UTF-8">
    <title>Perpustakaan BKKBN Yogyakarta</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Perpustakaan Berbasis Web">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/dist/css/AdminLTE.css">
    <link rel="stylesheet" type="text/css" href="css/dist/css/skins/_all-skins.css">
    <link rel="stylesheet" type="text/css" href="css/datatables/dataTables.bootstrap.css">
    <script type="text/javascript">
        window.setTimeout("waktu()",1000);  
        function waktu() {   
        	var tanggal = new Date();  
        	setTimeout("waktu()",1000);  
        	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
        }
        </script>
        <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

        	var popupWindow = null;
        	function centeredPopup(url,winName,w,h,scroll){
        	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
        	popupWindow = window.open(url,winName,settings)
        }
    </script>
</head>