<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<br><br><br><br><br><br><br>

<!-- DataTables -->
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('back_end/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- ปิด DataTables -->
<style>
        .colors {
            background-color: #8b0000;
            color: #ffffff;
        }

        .fontgoogle {
            font-family: "K2D", sans-serif;
            font-size: 16px;
        }
    </style>
<div class="container">
<div class="text-center">
        <img src="{{asset('back_end/image/aft_logo_m.png')}}" alt="">
    </div><br><br>
<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title"> <strong>เอกสาร อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h6>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors text-center">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อเอกสาร</th>
                            <th>รายละเอียดเอกสาร</th>
                            <th>ดาวโหลด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dowload as $dowloads)
                        <tr>
                            <td class="text-center">{{ $dowload->firstItem()+$loop->index }}</td>
                            <td>{{ $dowloads->name }}</td>
                            <td>{{ $dowloads->title }}</td>
                            <td class="text-center">
                                <a href="{{ asset('uploadfile/'.$dowloads->file)}}" target="_blank">
                                    <div class="btn btn-success"><i class="fa fa-download"></i> ดาวโหลดเอกสาร</div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{ $dowload->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</div>



<br><br><br>
@include('layouts.font_end.footer')
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

    $(function() {
        bsCustomFileInput.init();
    });
</script>
<!-- ปิด DataTables  & Plugins -->

</html>
