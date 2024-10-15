@extends('layouts.back_end.Master')
@section('contents')



<div class="row mt-2">
    <div class="col-12">
    <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">แก้ไขการส่งเอกสารขอซ่อมกิจกรรม</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="row g-3" action="{{url('admin/status/report/reportre/'.$statusre->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="std_id">รหัสนักเรียน นักศึกษา</label>
                            <input type="text" class="form-control" id="std_id" name="std_id" value="{{$statusre->std_id}}">
                            @error('std_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$statusre->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$statusre->phone}}">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                             <div class="form-group">
                            <label>ชมรมวิชาชีพ</label>
                            <select class="form-control select" name="department" style="width: 100%;">
                                <option value="{{$statusre->department}}" selected >{{$statusre->department}}</option>
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
                                <option value="{{$statusre->class}}" selected>{{$statusre->class}}</option>
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
                                <option value="{{$statusre->room}}" selected>{{$statusre->room}}</option>
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
                            <label for="file">ส่งเอกสารรายงานซ่อมกิจกรรม ไฟล์ PDF</label>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">อัพโหลดไฟล์ใหม่</label> <br><br>

                            </div>
                        </div>


                    </div>


            </div>


            <!-- /.card-body -->
            <button type="submit" class="btn btn-primary">แก้ไข</button>
            <a href="{{route('adminre')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>


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
