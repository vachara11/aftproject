@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">กรอกข้อมูลใบสมัคร</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{route('store.membership')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>วันที่สมัคร</label>
                        <select class="form-control select" name="days" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกวันที่</option>
                            <option>๐๑</option>
                            <option>๐๒</option>
                            <option>๐๓</option>
                            <option>๐๔</option>
                            <option>๐๕</option>
                            <option>๐๖</option>
                            <option>๐๗</option>
                            <option>๐๘</option>
                            <option>๐๙</option>
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
                            <option>๒๑</option>
                            <option>๒๒</option>
                            <option>๒๓</option>
                            <option>๒๔</option>
                            <option>๒๕</option>
                            <option>๒๖</option>
                            <option>๒๗</option>
                            <option>๒๘</option>
                            <option>๒๙</option>
                            <option>๓๐</option>
                            <option>๓๑</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>เดือนที่สมัคร</label>
                        <select class="form-control select" name="months" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกเดือน</option>
                            <option>มกราคม</option>
                            <option>กุมภาพันธ์</option>
                            <option>มีนาคม</option>
                            <option>เมษายน</option>
                            <option>พฤษภาคม</option>
                            <option>มิถุนายน</option>
                            <option>กรกฎาคม</option>
                            <option>สิงหาคม</option>
                            <option>กันยายน</option>
                            <option>ตุลาคม</option>
                            <option>พฤศจิกายน</option>
                            <option>ธันวาคม</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>พ.ศ.ที่สมัคร</label>
                        <select class="form-control select" name="years" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกพ.ศ.</option>
                            <option>๒๕๖๒</option>
                            <option>๒๕๖๓</option>
                            <option>๒๕๖๔</option>
                            <option>๒๕๖๕</option>
                            <option>๒๕๖๖</option>
                            <option>๒๕๖๗</option>
                            <option>๒๕๖๘</option>
                            <option>๒๕๖๙</option>
                            <option>๒๕๗๐</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="name">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="กรอกชื่อ-นามสกุล (มีคำนำหน้าชื่อด้วย นาย/นางสาว)">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>ระดับชั้น</label>
                        <select class="form-control select" name="classroom" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกระดับชั้น</option>
                            <option>ปวช.๑/๑</option>
                            <option>ปวช.๑/๒</option>
                            <option>ปวช.๑/๓</option>
                            <option>ปวช.๑/๔</option>
                            <option>ปวช.๑/๕</option>
                            <option>ปวช.๑/๖</option>
                            <option>ปวช.๑/๗</option>
                            <option>ปวช.๑/๘</option>
                            <option>ปวช.๑/๙</option>
                            <option>ปวช.๑/๑๐</option>
                            <option>ปวช.๑/๑๑</option>
                            <option>ปวช.๑/๑๒</option>
                            <option>ปวช.๑/๑๓</option>
                            <option>ปวช.๑/๑๔</option>
                            <option>ปวส.๑/๑</option>
                            <option>ปวส.๑/๒</option>
                            <option>ปวส.๑/๓</option>
                            <option>ปวส.๑/๔</option>
                            <option>ปวส.๑/๕</option>
                            <option>ปวส.๑/๖</option>
                            <option>ปวส.๑/๗</option>
                            <option>ปวส.๑/๘</option>
                            <option>ปวส.๑/๙</option>
                            <option>ปวส.๑/๑๐</option>
                            <option>ปวส.๑/๑๑</option>
                            <option>ปวส.๑/๑๒</option>
                            <option>ปวส.๑/๑๓</option>
                            <option>ปวส.๑/๑๔</option>
                            <option>ปวส.๑/๑๕</option>
                            <option>ปวส.๑/๑๖</option>
                            <option>ปวส.๑/๑๗</option>
                            <option>ปวส.๑/๑๘</option>
                            <option>ปวส.๑/๑๙</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="student_id">รหัสนักเรียน นักศึกษา</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter student_id" value="๐๒">
                        @error('student_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>สาขาวิชา</label>
                        <select class="form-control select" name="department" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกสาขาวิชา</option>
                            <option>การบัญชี</option>
                            <option>การตลาด</option>
                            <option>เทคโนโลยีสารสนเทศ</option>
                            <option>คอมพิวเตอร์กราฟิก</option>
                            <option>การท่องเที่ยว</option>
                            <option>อาหารและโภชนาการ</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>สาขางาน</label>
                        <select class="form-control select" name="major_works" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกสาขางาน</option>
                            <option>การบัญชี</option>
                            <option>การตลาด</option>
                            <option>เทคโนโลยีสารสนเทศ</option>
                            <option>การโปรแกรมคอมพิวเตอร์ เว็บ และอุปกรณ์เคลื่อนที่</option>
                            <option>คอมพิวเตอร์กราฟิก</option>
                            <option>มัลติมิเดีย</option>
                            <option>การท่องเที่ยว</option>
                            <option>อาหารและโภชนาการ</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>วันที่เกิด</label>
                        <select class="form-control select" name="day" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกวันที่</option>
                            <option>๐๑</option>
                            <option>๐๒</option>
                            <option>๐๓</option>
                            <option>๐๔</option>
                            <option>๐๕</option>
                            <option>๐๖</option>
                            <option>๐๗</option>
                            <option>๐๘</option>
                            <option>๐๙</option>
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
                            <option>๒๑</option>
                            <option>๒๒</option>
                            <option>๒๓</option>
                            <option>๒๔</option>
                            <option>๒๕</option>
                            <option>๒๖</option>
                            <option>๒๗</option>
                            <option>๒๘</option>
                            <option>๒๙</option>
                            <option>๓๐</option>
                            <option>๓๑</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>เดือนที่เกิด</label>
                        <select class="form-control select" name="month" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกเดือน</option>
                            <option>มกราคม</option>
                            <option>กุมภาพันธ์</option>
                            <option>มีนาคม</option>
                            <option>เมษายน</option>
                            <option>พฤษภาคม</option>
                            <option>มิถุนายน</option>
                            <option>กรกฎาคม</option>
                            <option>สิงหาคม</option>
                            <option>กันยายน</option>
                            <option>ตุลาคม</option>
                            <option>พฤศจิกายน</option>
                            <option>ธันวาคม</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>พ.ศ.ที่เกิด</label>
                        <select class="form-control select" name="year" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกพ.ศ.</option>
                            <option>๒๕๐๐</option>
                            <option>๒๕๐๑</option>
                            <option>๒๕๐๒</option>
                            <option>๒๕๐๓</option>
                            <option>๒๕๐๔</option>
                            <option>๒๕๐๕</option>
                            <option>๒๕๐๖</option>
                            <option>๒๕๐๗</option>
                            <option>๒๕๐๘</option>
                            <option>๒๕๐๙</option>
                            <option>๒๕๑๐</option>
                            <option>๒๕๑๑</option>
                            <option>๒๕๑๒</option>
                            <option>๒๕๑๓</option>
                            <option>๒๕๑๔</option>
                            <option>๒๕๑๕</option>
                            <option>๒๕๑๖</option>
                            <option>๒๕๑๗</option>
                            <option>๒๕๑๘</option>
                            <option>๒๕๑๙</option>
                            <option>๒๕๑๐</option>
                            <option>๒๕๒๐</option>
                            <option>๒๕๒๑</option>
                            <option>๒๕๒๒</option>
                            <option>๒๕๒๓</option>
                            <option>๒๕๒๔</option>
                            <option>๒๕๒๕</option>
                            <option>๒๕๒๖</option>
                            <option>๒๕๒๗</option>
                            <option>๒๕๒๘</option>
                            <option>๒๕๒๙</option>
                            <option>๒๕๓๐</option>
                            <option>๒๕๓๑</option>
                            <option>๒๕๓๒</option>
                            <option>๒๕๓๓</option>
                            <option>๒๕๓๔</option>
                            <option>๒๕๓๕</option>
                            <option>๒๕๓๖</option>
                            <option>๒๕๓๗</option>
                            <option>๒๕๓๘</option>
                            <option>๒๕๓๙</option>
                            <option>๒๕๔๐</option>
                            <option>๒๕๔๑</option>
                            <option>๒๕๔๒</option>
                            <option>๒๕๔๓</option>
                            <option>๒๕๔๔</option>
                            <option>๒๕๔๕</option>
                            <option>๒๕๔๖</option>
                            <option>๒๕๔๗</option>
                            <option>๒๕๔๘</option>
                            <option>๒๕๔๙</option>
                            <option>๒๕๕๐</option>
                            <option>๒๕๕๑</option>
                            <option>๒๕๕๒</option>
                            <option>๒๕๕๓</option>
                            <option>๒๕๕๔</option>
                            <option>๒๕๕๕</option>
                            <option>๒๕๕๖</option>
                            <option>๒๕๕๗</option>
                            <option>๒๕๕๘</option>
                            <option>๒๕๕๙</option>
                            <option>๒๕๖๐</option>
                            <option>๒๕๖๑</option>
                            <option>๒๕๖๒</option>
                            <option>๒๕๖๓</option>
                            <option>๒๕๖๔</option>
                            <option>๒๕๖๕</option>
                            <option>๒๕๖๖</option>
                            <option>๒๕๖๗</option>
                            <option>๒๕๖๘</option>
                            <option>๒๕๖๙</option>
                            <option>๒๕๗๐</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="house_number">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="house_number" name="house_number" placeholder="กรุณากรอกเป็นเลขไทย">
                        @error('house_number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="alley">ตรอก/ซอย</label>
                        <input type="text" class="form-control" id="alley" name="alley" placeholder="ถ้ามีตัวเลขกรุณากรอกเป็นเลขไทย">
                        @error('alley')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="road">ถนน/หมู่ที่</label>
                        <input type="text" class="form-control" id="road" name="road" placeholder="ถ้ามีตัวเลขกรุณากรอกเป็นเลขไทย">
                        @error('road')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="district">แขวง/ตำบล</label>
                        <input type="text" class="form-control" id="district" name="district" placeholder="กรุณากรอก แขวง/ตำบล">
                        @error('district')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="county">เขต/อำเภอ</label>
                        <input type="text" class="form-control" id="county" name="county" placeholder="กรุณากรอก เขต/อำเภอ">
                        @error('county')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="province">จังหวัด</label>
                        <input type="text" class="form-control" id="province" name="province" placeholder="กรุณากรอก จังหวัด">
                        @error('province')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="zip_code">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="กรุณากรอกเป็นเลขไทย">
                        @error('zip_code')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>เบอร์โทรศัพท์ (กรุณากรอกเป็นเลขไทย)</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text" id="phone" name="phone" class="form-control">
                        </div>
                        <!-- /.input group -->
                        @error('phone')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <!-- /.form group -->


                    <div class="form-group">
                        <label for="father">ชื่อบิดา</label>
                        <input type="text" class="form-control" id="father" name="father" placeholder="กรุณากรอกชื่อบิดา (มีคำนำหน้าชื่อด้วย นาย/นาง/นางสาว)">
                        @error('father')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="mother">ชื่อมารดา</label>
                        <input type="text" class="form-control" id="mother" name="mother" placeholder="กรุณากรอกชื่อมารดา (มีคำนำหน้าชื่อด้วย นาย/นาง/นางสาว)">
                        @error('mother')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>ชมรมวิชาชีพ</label>
                        <select class="form-control select" name="professional" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกชมรมวิชาชีพ</option>
                            <option>การบัญชี</option>
                            <option>การตลาด</option>
                            <option>เทคโนโลยีสารสนเทศ</option>
                            <option>คอมพิวเตอร์กราฟิก</option>
                            <option>การท่องเที่ยว</option>
                            <option>อาหารและโภชนาการ</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="parent">ชื่อผู้ปกครอง</label>
                        <input type="text" class="form-control" id="parent" name="parent" placeholder="กรุณากรอกชื่อผู้ปกครอง (มีคำนำหน้าชื่อด้วย นาย/นาง/นางสาว)">
                        @error('parent')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                </div>
        </div>
        <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
            <a href="{{route('all.membership')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection