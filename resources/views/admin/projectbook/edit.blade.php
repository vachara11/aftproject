@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">แก้ไขเล่มแสกนโครงการ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{url('admin/projectbook/update/'.$pro->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>ภาคเรียน/ปีการศึกษา</label>
                        <select class="form-control select" name="year" style="width: 100%;">
                            <option selected="selected">{{$pro->year}}</option>
                            <option>๑/๒๕๖๗</option>
                            <option>๒/๒๕๖๗</option>
                            <option>๑/๒๕๖๘</option>
                            <option>๒/๒๕๖๘</option>
                            <option>๑/๒๕๖๙</option>
                            <option>๒/๒๕๖๙</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="name">ชื่อกิจกรรม/โครงการ</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$pro->name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">วันที่ทำกิจกรรม</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{$pro->date}}">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file">ภาพปกกิจกรรม/โครงการ</label>
                        <div class="custom-file">
                          <input type="file" name="image"  class="custom-file-input" id="image2">
                          <label class="custom-file-label" for="customFile">{{$pro->image}}</label>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-12">
                            <img id="showImage2" class="rounded avatar-lg" src="{{ url('back_end/image/projectbook/'.$pro->image) }}" width="250"
                                alt="Card image cap" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">ไฟล์เล่มสแกนเป็นไฟล์ PDF เท่านั้น</label>
                        <div class="custom-file">
                          <input type="file" name="file"  class="custom-file-input">
                          <label class="custom-file-label" for="customFile">{{$pro->file}}</label>
                        </div>
                      </div>
                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        <a href="{{url('/admin/projectbook/index')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
@endsection
