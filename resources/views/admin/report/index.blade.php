@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{route('createre')}}"> <button class="btn btn-success"><i class="fas fa-upload"></i> อัพไฟล์เอกสาร</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>ตรวจเอกสารรายงานซ่อมกิจกรรม</strong> </h3>
                <div style="float: right;">
                    <h3 class="card-title"> <strong> จํานวนทั้งหมด {{$statusre->count()}} รายการ</strong> </h3>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors text-center">
                        <tr>
                            <th>รหัสนักเรียน นักศึกษา</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>สาขาวิชา</th>
                            <th>ระดับชั้น</th>
                            <th>สถานะเอกสาร</th>
                            <th>สิ่งที่ต้องแก้ไข</th>
                            <th style="width: 200px;">การจัดการ</th>
                            <th style="width: 150px;">ตรวจเอกสาร</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statusre as $status)
                        <tr>
                            <td class="text-center">{{$status->std_id}}</td>
                            <td>{{$status->name}}</td>
                            <td>{{$status->phone}}</td>
                            <td>{{$status->department}}</td>
                            <td>{{$status->class}} / {{$status->room}}</td>
                            <td class="text-center text-success">{{$status->status}}</td>
                            <td class="text-danger">{{$status->comment}}</td>
                            <td class="text-center">
                                <a href="{{ asset('font_end/report/'.$status->file)}}" class="" target="_blank">
                                    <div class="btn btn-primary"><i class="fa fa-eye"></i></div>
                                </a>
                                <a href="{{url('admin/status/report/editre/'.$status->id)}}">
                                    <div class="btn btn-warning"><i class="fa fa-edit"></i></div>
                                </a>
                                <a href="{{url('admin/status/report/deletere/'.$status->id)}}">
                                    <div class="btn btn-danger"><i class="fa fa-trash"></i></div>
                                </a>
                                <a href="{{url('admin/status/commentre/'.$status->id)}}">
                                    <div class="btn btn-info"><i class="fa fa-comment-dots"></i></div>
                                </a>

                                @if ($status->edit == 0)
                                    <form action="{{ url('/admin/report/open/'.$status->id) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-danger" name="edit" value = "1">ปิดปุ่มแก้ไข</button>
                                    </form>
                                @elseif ( $status->edit == 1)
                                      <form action="{{ url('/admin/report/end/'.$status->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="edit" value = "0">เปิดปุ่มแก้ไข</button>
                                      </form>
                                @endif
                            </td>
                            <td>

                                <!-- <form action="" method="post">
                                @csrf
                            <input type="submit" class="btn btn-success" name="status" value="ดำเนินการแล้ว" />
                            </form> -->
                                <form action="{{url('admin/status/passre/'.$status->id)}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-success" name="status" value="ผ่าน" />
                                    <input type="submit" class="btn btn-danger" name="status" value="ไม่ผ่าน" />
                                    <input type="submit" class="btn btn-primary" name="status" value="ส่งคะแนนแล้ว" />
                                </form>
                            </td>

                        </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                    {{$statusre->links()}}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
