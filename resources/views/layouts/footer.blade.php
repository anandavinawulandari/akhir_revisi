<!-- /.content-wrapper -->
           
           
           <!-- Footer -->
           
<footer class="main-footer fixed-bottom">
    <div class="float-right d-none d-sm-block">
      <b>Sistem Pendukung Keputusan Data Beasiswa</b>    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">SMP Negeri 2 Kunjang</a>.</strong>
  </footer>
           <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <strong>Copyright @2022 Sanggar Kilisuci</strong>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE-3.2.0')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
</body>
</html>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
