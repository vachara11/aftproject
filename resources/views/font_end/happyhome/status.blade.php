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
                    <h6 class="card-title"> <strong>ตรวจสอบสถานะเอกสารกิจกรรมจิตอาสา PSC Happy Home</strong> </h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="float: right;">
                        <a href="{{route('status')}}" class="btn btn-success">ย้อนกลับ</a>
                    </div> <br> <br>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors text-center">
                            <tr>
                                <th>รหัสนักเรียน นักศึกษา</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>สาขาวิชา</th>
                                <th>ระดับชั้น</th>
                                <th>สถานะเอกสาร</th>
                                <th>สิ่งที่ต้องแก้</th>
                                <th>แก้ไข</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($happyhome as $status)
                            <tr>
                                <td class="text-center">{{$status->stu_card }}</td>
                                <td>{{$status->name}}</td>
                                <td>{{$status->department}}</td>
                                <td>{{$status->class}} / {{$status->room}}</td>
                                <td class="text-center">
                                    @if ($status->status =="ผ่าน")
                                    <span class="badge rounded-pill bg-success ">{{$status->status}}</span> 
                                    @elseif ($status->status =="ไม่ผ่าน")
                                    <span class="badge rounded-pill bg-danger">{{$status->status}}</span>
                                    @else
                                    <span class="badge rounded-pill bg-info">{{$status->status}}</span>
                                    @endif
                                </td>
                                <td class="text-danger">{{$status->comment}}</td>
                                <td class="text-center">
                                @if ($status->edit == 0)
                                            <a href="{{ url('status/happyhome/statusedit/' . $status->id) }}">
                                                <div class="btn btn-warning"><i class="fa fa-edit"></i></div>
                                            </a>
                                        @endif
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div style="float: right;">
                        {{-- {{ $statusre->links() }} --}}
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
@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif
</html>
