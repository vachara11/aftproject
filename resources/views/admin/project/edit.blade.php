@extends('layouts.back_end.Master')
@section('contents')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">แก้ไขเล่มโครงการ</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form class="row g-3" action="{{ url('/admin/project/update/'.$pro->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">ชื่อกิจกรรม</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $pro->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>ปีการศึกษา/ภาคเรียน</label>
                            <select class="form-control select" name="term" style="width: 100%;">
                                <option selected="selected">{{ $pro->term }}</option>
                                <option>๒/๒๕๖๖</option>
                                <option>๑/๒๕๖๗</option>
                                <option>๒/๒๕๖๗</option>
                                <option>๑/๒๕๖๘</option>
                                <option>๒/๒๕๖๘</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date">วันที่จัดกิจกรรม</label>
                            <input type="text" class="form-control" id="date" name="date" value="{{ $pro->date }}">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ptotal">จำนวนผู้เข้าร่วมกิจกรรมทั้งหมด</label>
                            <input type="text" class="form-control" id="ptotal" name="ptotal" value="{{ $pro->ptotal }}">
                            @error('ptotal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pnumber">จำนวนผู้เข้าร่วมกิจกรรม</label>
                            <input type="text" class="form-control" id="pnumber" name="pnumber" value="{{ $pro->pnumber }}">
                            @error('pnumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ppercen">ร้อยละของผู้เข้าร่วมกิจกรรม</label>
                            <input type="text" class="form-control" id="ppercen" name="ppercen" value="{{ $pro->ppercen }}">
                            @error('ppercen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="knumber">ค่าเฉลี่ยความพึงพอใจ</label>
                            <input type="text" class="form-control" id="knumber" name="knumber" value="{{ $pro->knumber}}">
                            @error('knumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kpercen">ร้อยละความพึงพอใจ</label>
                            <input type="text" class="form-control" id="kpercen" name="kpercen" value="{{ $pro->kpercen}}">
                            @error('kpercen')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="budget">งบประมาณอนุมัติ</label>
                            <input type="text" class="form-control" id="budget" name="budget" value="{{ $pro->budget }}">
                            @error('budget')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jbudget">งบประมาณที่ใช้</label>
                            <input type="text" class="form-control" id="jbudget" name="jbudget" value="{{ $pro->jbudget }}">
                            @error('jbidget')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">อัพเดทข้อมูล</button>


            </form>
        </div>
    </div>
    </div>
    <!-- /.card -->
@endsection