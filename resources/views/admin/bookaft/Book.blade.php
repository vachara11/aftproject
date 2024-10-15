@extends('layouts.back_end.Master')
@section('contents')
    <div class="col-12">
        <a href="{{ url('admin/createBook') }}"> <button class="btn btn-primary">เพิ่มเลขที่หนังสือส่ง</button> </a>
        <a href="{{ url('admin/pdfreport') }}"> <button class="btn btn-warning">รายงาน PDF</button> </a>
    </div>

    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>เลขทะเบียนหนังสือส่ง อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors">
                            <tr class="text-center">
                                <th>เลขทะเบียนหนังสือส่ง</th>
                                <th>ลงวันที่</th>
                                <th>จาก</th>
                                <th>ถึง</th>
                                <th>เรื่อง</th>
                                <th>ปฏิบัติ</th>
                                <th>หมายเหตุ</th>
                                <th>ไฟล์ PDF</th>
                                <th>รายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $books)
                                <tr>
                                    <td>{{ $books->number }}</td>
                                    <td>{{ $books->date }}</td>
                                    <td>{{ $books->go }}</td>
                                    <td>{{ $books->to }}</td>
                                    <td>{{ $books->content }}</td>
                                    <td class="text-success"><strong>{{ $books->practice }}</strong></td>
                                    <td>{{ $books->note }}</td>
                                    <td>
                                        @if ($books->file == 'ไม่พบไฟล์PDF')
                                            
                                        @else
                                            <a href="{{ asset('file/' . $books->file) }}" class="btn btn-primary" target="_blank">
                                                <i class="fas fa-eye"></i></a>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ url('/admin/editBook/' . $books->id) }}"> <button
                                                class="btn btn-success"><i class="fas fa-pencil-alt"></i></button> </a>
                                        <a href="{{ url('/admin/delete/' . $books->id) }}"> <button
                                                class="btn btn-danger"><i class="fas fa-trash"></i></button> </a>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div style="float: right;">
                        {{ $book->links() }}
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
