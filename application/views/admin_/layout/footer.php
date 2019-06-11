            <footer class="main-footer">
                <strong>Copyright &copy; 2019-2020 design & development by<a href="" target="_blank"> Appin . </a>.</strong>
            </footer>
        </div>

        <script src="<?php echo base_url();?>assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/dist/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/dist/js/dashboard.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script>

            $(".textarea").wysihtml5();
            $(".textarea1").wysihtml5();

            $("#example1").DataTable({
                "order": [[ 0, "desc" ]],
                "ordering": true,
                responsive: true,
            });
        </script>

   <!--<script src="<?php echo base_url();?>assets/plugins/morris/raphael.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/morris/morris-data.js" type="text/javascript"></script>-->
   </body>
</html>

