<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <!-- DataTables -->
        <script src="css/datatables/jquery.dataTables.min.js"></script>
        <script src="css/datatables/dataTables.bootstrap.min.js"></script>
        <script>
          $(function () {
           
            $("#data_pengunjung").DataTable();
            $("#data_cari").DataTable();
          });
        </script>
            <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
            <script src="js/plugins/chart.js" type="text/javascript"></script>
            <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
            <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
            <script src="js/Director/app.js" type="text/javascript"></script>
            <script src="js/Director/dashboard.js" type="text/javascript"></script>
            <script type="text/javascript">
                                        $('input').on('ifChecked', function (event) {
                                            $(this).parents('li').addClass("task-done");
                                            console.log('ok');
                                        });
                                        $('input').on('ifUnchecked', function (event) {
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