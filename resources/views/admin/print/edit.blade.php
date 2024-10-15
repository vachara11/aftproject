@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">แก้ไขรายการปริ้นเอกสาร</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{url('admin/print/update/'.$prints->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>ภาคเรียน/ปีการศึกษา</label>
                        <select class="form-control select" name="year" style="width: 100%;">
                            <option selected="selected">{{$prints->year}}</option>
                            <option>1/2567</option>
                            <option>2/2567</option>
                            <option>1/2568</option>
                            <option>2/2568</option>
                            <option>1/2569</option>
                            <option>2/2569</option>
                            <option>1/2570</option>
                            <option>2/2570</option>
                        </select>
                        @error('year')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">ชื่อเอกสาร</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$prints->name}}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="count">จำนวนหน้า</label>
                        <input type="text" class="form-control" id="count" name="count" value="{{$prints->count}}">
                        @error('count')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ประเภทเอกสาร</label>
                        <select class="form-control select" name="type" style="width: 100%;">
                            <option selected="selected">{{$prints->type}}</option>
                            <option>ขาว-ดำ</option>
                            <option>สี</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ชื่อผู้สั่งปริ้น</label>
                        <select class="form-control select" name="fname" style="width: 100%;">
                            <option selected="selected">{{$prints->fname}}</option>
                            <option>นายวสุรัตน์  ครุฑสุวรรณ</option>
                            <option>นายธนภัทร  มุ้ยจีน</option>
                            <option>นางสาวณัฐนรี  ระหารนอก</option>
                            <option>นางสาวเมธินี  อยู่สำราญ</option>
                            <option>นางสาวจันทร์ทิพย์  พาหุพันธุ์โต</option>
                            <option>นายจิรเมธ   สีนวน</option>
                            <option>นายเตวิช  จุฑาสุวรรณ</option>
                            <option>นายณัฏฐกร  ทาเพ็ง</option>
                            <option>นายก้องภพ  พรมศรี</option>
                            <option>นายอภิชาติ  กาบบัวไข</option>
                            <option>นางสาวจิรภรณ์  สุขนิยม</option>
                            <option>นางสาวปุณยนุช  หนักแน่น</option>
                            <option>นางสาวบุณฐิยา  สุขะตุงคะ</option>
                    
                        </select>
                        @error('fname')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>
        <a href="{{route('print')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>

        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
