<footer class="main-footer">
      <strong>Copyright &copy;2021.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('asset/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('asset/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('asset/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('asset/adminlte/js/adminlte.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('asset/adminlte/js/pages/dashboard.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('asset/adminlte/js/demo.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- DataTables -->
  <script src="{{ asset('asset/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('asset/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('asset/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('asset/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('asset/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('asset/adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <script src="{{ asset('asset/adminlte/js/demo.js') }}"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>
</body>

</html>