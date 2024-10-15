@extends('layouts.back_end.Master')
@section('contents')
    <div class="col-12">
        <a href="{{ url('admin/certificate/create') }}"> <button
                class="btn btn-primary">เพิ่มเลขทะเบียนคุมเกียรติบัตร</button> </a>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>เลขทะเบียนทะเบียนคุมเกียรติบัตร อวท.
                            วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors">
                            <tr class="text-center">
                                <th>ปีการศึกษา</th>
                                <th>เลขที่เกียรติบัตร</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ให้ไว้ ณ วันที่</th>
                                <th>ชื่อเกียรติบัตร</th>
                                <th>หมายเหตุ</th>
                                <th>ไฟล์ PDF</th>
                                <th>รายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificate as $item)
                                <tr>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->startnumber }}</td>
                                    <td>{{ $item->endnumber }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>
                                        @if ($item->file == 'ไม่พบไฟล์PDF')
                                        @else
                                            <a href="{{ asset('certificate/' . $item->file) }}" class="btn btn-primary"
                                                target="_blank">
                                                <i class="fas fa-eye"></i></a>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ url('admin/certificate/edit/' . $item->id) }}"> <button
                                                class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </a>
                                        <a href="{{ url('admin/certificate/delete/' . $item->id) }}"> <button
                                                class="btn btn-danger"><i class="fas fa-trash"></i></button> </a>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div style="float: right;">
                        {{ $certificate->links() }}
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
