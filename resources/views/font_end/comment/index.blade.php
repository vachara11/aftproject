<!DOCTYPE html>
<html lang="en">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('back_end/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('back_end/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('back_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('back_end/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('back_end/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('back_end/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('back_end/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('back_end/plugins/summernote/summernote-bs4.min.css')}}">

<!-- Select2 -->
<link rel="stylesheet" href="{{asset('back_end/plugins/select2/css/select2.min.css')}}">
<!-- ปิด Select2 -->

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- ปิด DataTables -->
<!-- daterange picker -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/daterangepicker/daterangepicker.css')}}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('baxk_end/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
<!-- BS Stepper -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/bs-stepper/css/bs-stepper.min.css')}}">
<!-- dropzonejs -->
<link rel="stylesheet" href="{{asset('baxk_end/plugins/dropzone/min/dropzone.min.css')}}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('back_end/plugins/fontawesome-free/css/all.min.css')}}">

@include('layouts.font_end.header')
<br><br><br><br><br><br><br>
<div class="container fontgoogle">
    <div class="text-center">
        <img src="{{asset('back_end/image/aft_logo_m.png')}}" alt="">
        <p class="mt-4"><b>กล่องรับความคิดเห็นจากท่านสมาชิก อวท.วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</b></p>
    </div><br>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">กล่องรับแสดงความคิดเห็น</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="row g-3" action="{{ route('comment.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title">หัวข้อที่แสดงความคิดเห็น</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">ความคิดเห็น</label>
                            <textarea type="text" class="form-control" id="comment" name="comment" rows="5"> </textarea>
                            @error('comment')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>


            </div>


            <!-- /.card-body -->
            <button type="submit" class="btn btn-primary">ส่งความคิดเห็น</button>
            <a href="{{url('/')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>


            </form>
        </div>
    </div>
</div>
</div>
<!-- /.card -->
</div>
<br><br><br>
@include('layouts.font_end.footer')
@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif
<!-- Select2 -->
<!-- jQuery -->
<script src="{{asset('back_end/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('back_end/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('back_end/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('back_end/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('back_end/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('back_end/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('back_end/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('back_end/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('back_end/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('back_end/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('back_end/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('back_end/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('back_end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('back_end/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back_end/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back_end/dist/js/pages/dashboard.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('back_end/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('back_end/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('back_end/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('back_end/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('back_end/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('back_end/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- ปิด DataTables  & Plugins -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

</html>
