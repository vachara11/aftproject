@extends('layouts.back_end.Master')
@section('contents')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">แก้ไขเลขทะเบียนคุมเกียรติบัตร</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form class="row g-3" action="{{ url('admin/certificate/update/'.$certificate->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>ปีการศึกษา</label>
                        <select class="form-control select" name="year" style="width: 100%;">
                            <option value="{{ $certificate->year }}" selected >{{ $certificate->year }}</option>
                            <option>๒๕๖๕</option>
                            <option>๒๕๖๖</option>
                            <option>๒๕๖๗</option>
                            <option>๒๕๖๘</option>
                            <option>๒๕๖๙</option>
                            <option>๒๕๗๐</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="startnumber">เลขที่เกียรติบัตร</label>
                        <input type="text" class="form-control" id="startnumber" name="startnumber" value="{{ $certificate->startnumber }}">
                        @error('startnumber')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="endnumber">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="endnumber" name="endnumber" value="{{ $certificate->endnumber }}">
                        @error('endnumber')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">ให้ไว้ ณ วันที่</label>
                        <input type="text" class="form-control" id="date" name="date" value="{{ $certificate->date }}">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="name">ชื่อเกียรติบัตร</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $certificate->name }}">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="note">หมายเหตุ</label>
                        <input type="text" class="form-control" id="note" name="note" {{ $certificate->note }}>
                        @error('note')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label for="file">อัพโหลดไฟล์ PDF</label>
                    <div class="custom-file">
                      <input type="file" name="file"  class="custom-file-input" id="customFile" value="{{ $certificate->file }}">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>

                </div>
        </div>
        <!-- /.card-body -->

        <button type="submit" class="btn btn-primary">แก้ไขข้อมูล</button>


        </form>
    </div>
</div>
</div>
<!-- /.card -->
@endsection
