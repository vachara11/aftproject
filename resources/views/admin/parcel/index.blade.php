@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{ url('admin/parcel/create') }}"> <button class="btn btn-primary">เพิ่มพัสดุที่เบิก</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>เบิกพัสดุ อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr class="text-center">
                            <th>ปีการศึกษา</th>
                            <th>พัสดุที่เบิก</th>
                            <th>จำนวน</th>
                            <th>วันที่เบิก</th>
                            <th>ชื่อผู้เบิกพัสดุ</th>
                            <th>หมายเหตุ</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcel as $p )
                        <tr>
                            <td>{{ $p->year }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->number }}</td>
                            <td>{{ $p->date }}</td>
                            <td>{{ $p->name1 }}</td>
                            <td>{{ $p->note }}</td>
                            <td>
                                <a href="{{ url('admin/parcel/edit/'.$p->id) }}"> <button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </a>
                                <a href="{{ url('admin/parcel/delete/'.$p->id) }}"> <button class="btn btn-danger"><i class="fas fa-trash"></i></button> </a>
                        </tr>
                        @endforeach
                
                    
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                
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
