@extends('layouts.back_end.Master')
@section('contents')



<div class="row mt-2">
    <div class="col-12">
    <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">ส่งเอกสารขอซ่อมกิจกรรม</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="row g-3" action="{{route('adminstoreup')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="std_id">รหัสนักเรียน นักศึกษา</label>
                            <input type="text" class="form-control" id="std_id" name="std_id" placeholder="๐๒xxxx">
                            @error('std_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อ-นามสกุล (มีคำนำหน้าชื่อด้วย นาย/นางสาว)">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="กรอกเลขไทย">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ชมรมวิชาชีพ</label>
                            <select class="form-control select" name="department" style="width: 100%;">
                                <option selected="selected">กรุณาเลือกชมรมวิชาชีพ</option>
                                <option>การบัญชี</option>
                                <option>การตลาด</option>
                                <option>เทคโนโลยีธุรกิจดิจิทัล</option>
                                <option>เทคโนโลยีสารสนเทศ</option>
                                <option>คอมพิวเตอร์กราฟิก</option>
                                <option>การท่องเที่ยว</option>
                                <option>อาหารและโภชนาการ</option>
                                <option>ไมซ์และอีเว้นต์</option>
                            </select>
                            @error('department')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ระดับชั้น</label>
                            <select class="form-control select" name="class" style="width: 100%;">
                                <option selected="selected">กรุณาเลือกระดับชั้น</option>
                                <option>ปวช.๑</option>
                                <option>ปวช.๒</option>
                                <option>ปวช.๓</option>
                                <option>ปวส.๑</option>
                                <option>ปวส.๒</option>
                            </select>
                            @error('class')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ห้อง</label>
                            <select class="form-control select" name="room" style="width: 100%;">
                                <option selected="selected">กรุณาเลือกห้อง</option>
                                <option>๑</option>
                                <option>๒</option>
                                <option>๓</option>
                                <option>๔</option>
                                <option>๕</option>
                                <option>๖</option>
                                <option>๗</option>
                                <option>๘</option>
                                <option>๙</option>
                                <option>๑๐</option>
                                <option>๑๑</option>
                                <option>๑๒</option>
                                <option>๑๓</option>
                                <option>๑๔</option>
                                <option>๑๕</option>
                                <option>๑๖</option>
                                <option>๑๗</option>
                                <option>๑๘</option>
                                <option>๑๙</option>
                                <option>๒๐</option>
                            </select>
                            @error('room')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="file">ส่งเอกสารคำร้องขอซ่อมกิจกรรม ไฟล์ PDF</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>


                    </div>


            </div>


            <!-- /.card-body -->
            <button type="submit" class="btn btn-primary">ส่งเอกสาร</button>
            <a href="{{route('adminup')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>


            </form>
        </div>

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
