@extends('layouts.back_end.Master')
@section('contents')

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>เรื่องร้องเรียนปัญหาต่างๆ ภายในวิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
                    <div class="card-tools">
                        <form action="" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors">
                            <tr class="text-center">
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>สาขาวิชา</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>เรื่องที่ร้องเรียน</th>
                                <th>วันที่ส่ง</th>
                                <th>รายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($complaint as $com)
                                <tr>
                                    <td>{{ $complaint->firstItem() + $loop->index }}</td>
                                    <td>{{ $com->name }}</td>
                                    <td>{{ $com->major }}</td>
                                    <td>{{ $com->tel }}</td>
                                    <td>{{ $com->complaint }}</td>
                                    <td>{{ $com->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/complaint/delete/'.$com->id) }}" class="btn btn-danger">ลบข้อมูล</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div style="float: right;">
                        {{ $complaint->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    @if (session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif
@endsection
