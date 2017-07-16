    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="<?=base_url('assets/ajax/jquery.min.js')?>"></script>
        <!-- sweetalert -->
        <script src="<?=base_url('assets/sweetalert/sweetalert.min.js')?>"></script>
        <!-- Bootstrap -->
        <script src="<?=base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?=base_url('assets/js/AdminLTE/app.js')?>" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?=base_url('assets/js/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
        <script src="<?=base_url('assets/js/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>
