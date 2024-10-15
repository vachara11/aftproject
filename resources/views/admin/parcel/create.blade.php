@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">เพิ่มพัสดุ</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{ url('admin/parcel/insert') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>ปีการศึกษา</label>
                        <select class="form-control select" name="year" style="width: 100%;">
                            <option selected="selected">๒๕๖๗</option>
                            <option>๒๕๖๘</option>
                            <option>๒๕๖๙</option>
                            <option>๒๕๗๐</option>
                            <option>๒๕๗๑</option>
                            <option>๒๕๗๒</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">พัสดุที่เบิก</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="number">จำนวน</label>
                        <input type="text" class="form-control" id="number" name="number">
                        @error('number')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">วันที่เบิก</label>
                        <input type="text" class="form-control" id="date" name="date">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>ชื่อผู้เบิก</label>
                        <select class="form-control select" name="name1" style="width: 100%;">
                            <option selected="selected">กรุณาเลือกชื่อผู้เบิก</option>
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
                            <option>นางสาวปาริชาติ   ปานมี</option>
                            <option>นายคุณากร  ผลโภค</option>
                            <option>อาจารย์วัชระ  เกตุแก้ว</option>
                            <option>อาจารย์ธัญลักษณ์  ดำสนิท</option>
                    
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note">หมายเหตุ</label>
                        <input type="text" class="form-control" id="note" name="note">
                        @error('note')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>


        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
