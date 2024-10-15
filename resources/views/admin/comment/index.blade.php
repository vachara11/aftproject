@extends('layouts.back_end.Master')
@section('contents')

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>กล่องรับแสดงความคิดเห็น</strong> </h3>
                    <div class="card-tools">
                        <form action="" method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="ชื่อ-นามสกุล">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
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
                                <th>หัวข้อ</th>
                                <th>ความคิดเห็น</th>
                                <th>วันที่ส่ง</th>
                                <th>รายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comment as $comments)
                                <tr>
                                    <td>{{ $comment->firstItem() + $loop->index }}</td>
                                    <td>{{ $comments->title }}</td>
                                    <td>{{ $comments->comment }}</td>
                                    <td>{{ $comments->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/comment/delete/'.$comments->id) }}" class="btn btn-danger">ลบข้อมูล</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div style="float: right;">
                        {{ $comment->links() }}
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
