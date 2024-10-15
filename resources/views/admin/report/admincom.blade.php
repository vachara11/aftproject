@extends('layouts.back_end.Master')
@section('contents')



<div class="row mt-2">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">สิ่งที่ต้องแก้ไขเอกสาร</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('admin/status/insetcomre/'.$status->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="comment">สิ่งที่ต้องแก้ในเอกสาร (กรณีเอกสารไม่ผ่าน)</label>
                        <textarea class="form-control" id="comment" name="comment"  rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
                <a href="{{route('adminre')}}"><button type="button" class="btn btn-success"> ย้อนกลับหน้าหลัก</button> </a>
                </div>
                <!-- /.card-body -->




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
