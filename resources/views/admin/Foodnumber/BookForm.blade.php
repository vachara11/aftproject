@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">เพิ่มเลขที่หนังสือ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{url('admin/createFoodnumber')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="number">เลขทะเบียนส่ง</label>
                        <input type="text" class="form-control" id="number" name="number" value="อห.">
                        @error('number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date">ลงวันที่</label>
                        <input type="text" class="form-control" id="date" name="date">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="go">จาก</label>
                        <input type="text" class="form-control" id="go" name="go" value="ชมรมวิชาชีพอาหารและโภชนาการ">
                        @error('go')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="to">ถึง</label>
                        <input type="text" class="form-control" id="to" name="to" >
                        @error('to')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">เรื่อง</label>
                        <input type="text" class="form-control" id="content" name="content">
                        @error('content')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ปฏิบัติ</label>
                        <select class="form-control select" name="practice" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกการปฏิบัติ</option>
                            <option>ยังไม่ดำเนินการ</option>
                            <option>กำลังดำเนินการ</option>
                            <option>ดำเนินการแล้ว</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">หมายเหตุ</label>
                        <input type="text" class="form-control" id="note" name="note">
                        @error('note')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="file">อัพโหลดไฟล์ PDF</label>
                    <div class="custom-file">
                      <input type="file" name="file"  class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>

                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        <a href="{{url('admin/Foodnumber/')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
