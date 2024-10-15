@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">แก้ไขหนังสือขอนุญาตและอนุมัติโครงการ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{ url('admin/allow/update/'.$allow->id) }}" method="POST" >
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="datewr1">วันที่เขียนขออนุมัติ</label>
                        <input type="text" class="form-control" id="datewr1" name="datewr1" value="{{ $allow->datewr1 }}">
                        @error('datewr1')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="datewr">วันที่เขียนขออนุญาต</label>
                        <input type="text" class="form-control" id="datewr" name="datewr" value="{{ $allow->datewr }}">
                        @error('datewr')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="number1">เลขที่หนังสือขออนุมัติ</label>
                        <input type="text" class="form-control" id="number1" name="number1" value="{{ $allow->number1 }}">
                        @error('number1')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="number">เลขที่หนังสือขออนุญาต</label>
                        <input type="text" class="form-control" id="number" name="number" value="{{ $allow->number }}">
                        @error('number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="name">ชื่อโครงการ</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $allow->name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="activity">ชื่อกิจกรรม (ถ้ามี) </label>
                        <textarea rows="3" class="form-control" id="activity" name="activity">{{ $allow->activity}}</textarea>
                        @error('activity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">วันที่จัดทำโครงการ </label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ $allow->date }}">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="location">สถานที่ทำโครงการ</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ $allow->location }}">
                        @error('location')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="objective">วัตถุประสงค์ของโครงการ</label>
                        <textarea rows="5" class="form-control" id="objective" name="objective">{{ $allow->objective}}</textarea>
                        @error('objective')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    

                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
        <a href="{{route('allows.index')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
