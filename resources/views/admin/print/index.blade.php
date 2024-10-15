@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{route('printcreate')}}"> <button class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มรายการปริ้น</button> </a>
     <a href="{{route('p.pdf')}}"> <button class="btn btn-warning"><i class="fas fa-print"></i> รายงาน PDF</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong> รายการปริ้นเอกสาร อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr>
                            <th>ลำดับ</th>
                            <th>วัน/เดือน/ปี</th>
                            <th>ภาคเรียน/ปีการศึกษา</th>
                            <th>ชื่อเอกสาร</th>
                            <th>จำนวนหน้า</th>
                            <th>ประเภทเอกสาร</th>
                            <th>ชื่อผู้สั่งปริ้น</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prints as $print)
                        <tr>
                            <td class="text-center">{{$prints->firstItem()+$loop->index}}</td>
                            <td>{{$print->updated_at}}</td>
                            <td>{{$print->year}}</td>
                            <td>{{$print->name}}</td>
                            <td>{{$print->count}}</td>
                            <td>{{$print->type}}</td>
                            <td>{{$print->fname}}</td>
                            <td>
                                <a href="{{url('admin/print/edit/'.$print->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{url('admin/print/delete/'.$print->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                    {{$prints->links()}}
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
