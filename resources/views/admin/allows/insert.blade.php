@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">เพิ่มหนังสือขอนุญาตและอนุมัติโครงการ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{ route('allows.create') }}" method="POST" >
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="datewr1">วันที่เขียนขออนุมัติ <b class="text-danger">*</b> </label>
                        <input type="text" class="form-control" id="datewr1" name="datewr1">
                        @error('datewr')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="datewr">วันที่เขียนขออนุญาต <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="datewr" name="datewr">
                        @error('datewr')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="number1">เลขที่หนังสือขออนุมัติ <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="number1" name="number1">
                        @error('number1')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="number">เลขที่หนังสือขออนุญาต <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="number" name="number">
                        @error('number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">ชื่อโครงการ <b class="text-danger">*</b></label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="activity">ชื่อกิจกรรม (ถ้ามี) </label>
                        <textarea rows="3" class="form-control" id="activity" name="activity"> </textarea>
                        @error('activity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">วันที่จัดทำโครงการ </label>
                        <input type="text" class="form-control" id="date" name="date">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">สถานที่ทำโครงการ</label>
                        <input type="text" class="form-control" id="location" name="location">
                        @error('location')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="objective">วัตถุประสงค์ของโครงการ <b class="text-danger">*</b></label>
                        <textarea rows="5" class="form-control" id="objective" name="objective"></textarea>
                        @error('objective')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
        <a href="{{route('allows.index')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
