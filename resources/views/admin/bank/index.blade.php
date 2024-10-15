@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{ url('/admin/bank/create') }}"> <button class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มรายรับ-รายจ่าย</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong> บัญชีรายรับ-รายจ่าย อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr>
                            <th>ลำดับ</th>
                            <th>วัน/เดือน/ปี</th>
                            <th>รายการ</th>
                            <th>รายรับ</th>
                            <th>รายจ่าย</th>
                            <th>คงเหลือ</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($bank as $b)
                        <tr>
                            <td class="text-center">{{$bank->firstItem()+$loop->index}}</td>
                            <td>{{ $b->date }}</td>
                            <td>{{ $b->name }}</td>
                            <td>{{ number_format($b->in) }}</td>
                            <td>{{ number_format($b->out) }}</td>
                            <td>{{ number_format($b->total)}}</td>
                            <td>
                                <a href="{{ url('/admin/bank/edit/'.$b->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ url('/admin/bank/delete/'.$b->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
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
