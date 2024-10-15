@extends('layouts.back_end.Master')
@section('contents')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">เพิ่มรายรับ-รายจ่าย</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form class="row g-3" action="{{ url('/admin/bank/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">วัน/เดือน/ปี</label>
                            <input type="text" class="form-control" id="date" name="date">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">รายการ</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="in">รายรับ</label>
                            <input type="text" class="form-control" id="in" name="in">
                            @error('in')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="out">รายจ่าย</label>
                            <input type="text" class="form-control" id="out" name="out">
                            @error('out')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            <a href="{{ route('bank') }}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

            </form>
        </div>
    </div>
    </div>
    <!-- /.card -->
@endsection
