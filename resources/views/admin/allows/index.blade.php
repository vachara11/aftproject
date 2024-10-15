@extends('layouts.back_end.Master')
@section('contents')
    <div class="col-12">
        <a href="{{ route('allows.insert') }}"> <button class="btn btn-primary">เพิ่มข้อมูล</button> </a>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>หนังสือขออนุญาตและอนุมัติจัดทำโครงการ</strong> </h3>
                    <div class="card-tools">
                     
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors">
                            <tr class="text-center">
                                <th>ลำดับ</th>
                                <th>ชื่อโครงการ</th>
                                <th>รายการ</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($allow as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url('admin/allows/reportpdf/'.$item->id) }}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                            หนังสือขออนุญาต
                                        </a>
                                        <a class="btn btn-success btn-sm" href="{{ url('admin/excuseme/reportpdf/'.$item->id) }}" target="_blank">
                                            <i class="fas fa-eye"></i>
                                            หนังสือขออนุมัติ
                                        </a>
                                        <a href="{{ url('admin/allows/edit/'.$item->id) }}"> <button class="btn btn-warning"><i
                                                    class="fas fa-pencil-alt"></i></button> </a>
                                        <a href="{{ url('admin/allows/delete/'.$item->id) }}"> <button class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button> </a>
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

    @if (session()->has('status'))
        <script>
            swal("<?php echo session()->get('status'); ?>", "", "success");
        </script>
    @endif
@endsection
