@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{url('dowload/create')}}"> <button class="btn btn-primary"><i class="fas fa-upload"></i> อัพไฟล์เอกสาร</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>เอกสาร อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
                <div style="float: right;">
                    <h3 class="card-title"> <strong> จํานวนทั้งหมด {{ $dowload->total() }} ฉบับ</strong> </h3>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อเอกสาร</th>
                            <th>รายละเอียดเอกสาร</th>
                            <th>ดาวโหลด</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dowload as $dowloads)
                        <tr>
                            <td class="text-center">{{ $dowload->firstItem()+$loop->index }}</td>
                            <td>{{ $dowloads->name }}</td>
                            <td>{{ $dowloads->title }}</td>
                            <td>
                                <a href="{{ asset('uploadfile/'.$dowloads->file)}}">
                                    <div class="btn btn-success"><i class="fa fa-download"></i> ดาวโหลดเอกสาร</div>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url('/dowload/edit/'.$dowloads->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ url('/dowload/delete/'.$dowloads->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
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

@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif
@endsection
