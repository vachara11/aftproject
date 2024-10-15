@extends('layouts.back_end.Master')
@section('contents')



<div class="row mt-2">
    <div class="col-12">
    <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">แก้ไขข้อมูลจิตอาสากิจกรรม PSC Happy Home</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="row g-3" action="{{ url('admin/happyhome/update/'.$happyhome->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="stu_card">รหัสนักเรียน นักศึกษา</label>
                            <input type="text" class="form-control" id="stu_card" name="stu_card" value="{{ $happyhome->stu_card }}">
                            @error('stu_card')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $happyhome->name }}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>สาขา</label>
                            <select class="form-control select" name="department" style="width: 100%;">
                                <option selected="selected">{{ $happyhome->department}}</option>
                                <option>การบัญชี</option>
                                <option>การตลาด</option>
                                <option>การจัดประชุมและนิทรรศการ</option>
                                <option>เทคโนโลยีสารสนเทศ</option>
                                <option>คอมพิวเตอร์กราฟิก</option>
                                <option>ดิจิทัลกราฟิก</option>
                                <option>การท่องเที่ยว</option>
                                <option>อาหารและโภชนาการ</option>
                            </select>
                            @error('department')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ระดับชั้น</label>
                            <select class="form-control select" name="class" style="width: 100%;">
                                <option selected="selected">{{ $happyhome->class}}</option>
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
                                <option selected="selected">{{ $happyhome->room }}</option>
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
                            <label for="activity">ชื่อกิจกรรมจิตอาสา</label>
                            <input type="text" class="form-control" id="activity" name="activity" value="{{ $happyhome->activity }}">
                            @error('activity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="time">วันที่ทำกิจกรรม</label>
                            <input type="date" class="form-control" id="time" name="time" value="{{ $happyhome->time}}">
                            @error('time')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="location">สถานที่ทำกิจกรรม</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ $happyhome->location }}">
                            @error('location')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="example-text-input" class="col-sm-5 col-form-label">รูปภาพกิจกรรม (ภาพที่1)</label>
                                <input name="file" class="form-control" type="file" id="image">
                            </div>
                        </div>
                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <!-- end row -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <img id="showImage" class="rounded avatar-lg" src="{{ asset('font_end/multi/'.$happyhome->file) }}"  width="250"
                                    alt="Card image cap" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="example-text-input" class="col-sm-5 col-form-label">รูปภาพกิจกรรม (ภาพที่2)</label>
                                <input name="file1" class="form-control" type="file" id="image1">
                            </div>
                        </div>
                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <!-- end row -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <img id="showImage1" class="rounded avatar-lg" src="{{ asset('font_end/multi/'.$happyhome->file1) }}" width="250"
                                    alt="Card image cap" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="example-text-input" class="col-sm-5 col-form-label">รูปภาพกิจกรรม (ภาพที่3)</label>
                                <input name="file2" class="form-control" type="file" id="image2">
                            </div>
                        </div>
                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <!-- end row -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <img id="showImage2" class="rounded avatar-lg" src="{{ asset('font_end/multi/'.$happyhome->file2) }}"  width="250"
                                    alt="Card image cap" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <label for="example-text-input" class="col-sm-5 col-form-label">รูปภาพกิจกรรม (ภาพที่4)</label>
                                <input name="file3" class="form-control" type="file" id="image3">
                            </div>
                        </div>
                        @error('file')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        <!-- end row -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <img id="showImage3" class="rounded avatar-lg" src="{{ asset('font_end/multi/'.$happyhome->file3) }}" " width="250"
                                    alt="Card image cap" >
                            </div>
                        </div>

                    
                        <div class="form-group">
                            <label for="benefit">สิ่งที่ได้จากการทำกิจกรรม</label>
                            <textarea type="text" class="form-control" id="benefit" name="benefit" rows="5">{{ $happyhome->benefit }} </textarea>
                            @error('benefit')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        </div>
                    </div>

            <!-- /.card-body -->
            <button type="submit" class="btn btn-primary">แก้ไข</button>
            <a href="{{route('admin.happyhome')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>


            </form>
        </div>

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image1').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image3').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image4').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage4').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif



@endsection

