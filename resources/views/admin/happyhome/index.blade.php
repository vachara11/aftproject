@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">

</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>ตรวจเอกสารรายงานจิตอาสากิจกรรม Happy Home</strong> </h3>
                <div style="float: right;">
                    <h3 class="card-title"> <strong> จํานวนทั้งหมด {{$happyhome->count()}} รายการ</strong> </h3>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors text-center">
                        <tr>
                            <th>รหัสนักเรียน นักศึกษา</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>สาขาวิชา</th>
                            <th>ระดับชั้น</th>
                            <th>สถานะเอกสาร</th>
                            <th>สิ่งที่ต้องแก้ไข</th>
                            <th style="width: 200px;">การจัดการ</th>
                            <th style="width: 150px;">ตรวจเอกสาร</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($happyhome as $item)
                        <tr>
                            <td class="text-center">{{$item->stu_card}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->department}}</td>
                            <td>{{$item->class}} / {{$item->room}}</td>
                            <td class="text-center">
                                @if ($item->status =="ผ่าน")
                                <span class="badge rounded-pill bg-success ">{{$item->status}}</span> 
                                @elseif ($item->status =="ไม่ผ่าน")
                                <span class="badge rounded-pill bg-danger">{{$item->status}}</span>
                                @else
                                <span class="badge rounded-pill bg-primary">{{$item->status}}</span>
                                @endif
                            </td>
                            <td class="text-danger">{{$item->comment}}</td>
                            <td class="text-center">
                                {{-- <a href="{{ asset('font_end/report/'.$item->file)}}" class="" target="_blank">
                                    <div class="btn btn-primary"><i class="fa fa-eye"></i></div>
                                </a> --}}
                                <a class="btn btn-primary" href="{{url('happyhome/PDF/'.$item->id)}}" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{url('admin/haapyhome/edit/'.$item->id)}}">
                                    <div class="btn btn-warning"><i class="fa fa-edit"></i></div>
                                </a>
                                <a href="{{url('admin/haapyhome/delete/'.$item->id)}}">
                                    <div class="btn btn-danger"><i class="fa fa-trash"></i></div>
                                </a>
                                <a href="{{url('admin/happyhome/comment/'.$item->id)}}">
                                    <div class="btn btn-info"><i class="fa fa-comment-dots"></i></div>
                                </a>
                                
                                @if ($item->edit == 0)
                                    <form action="{{ url('/admin/happyhome/open/'.$item->id) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-danger" name="edit" value = "1">ปิดปุ่มแก้ไข</button>
                                    </form>
                                @elseif ( $item->edit == 1)
                                      <form action="{{ url('/admin/happyhome/end/'.$item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success" name="edit" value = "0">เปิดปุ่มแก้ไข</button>
                                      </form>
                                @endif
                            </td>
                            <td>

                                <!-- <form action="" method="post">
                                {{-- @csrf --}}
                            <input type="submit" class="btn btn-success" name="item" value="ดำเนินการแล้ว" />
                            </form> -->
                                <form action="{{url('admin/happyhome/pass/'.$item->id)}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-success" name="status" value="ผ่าน" />
                                    <input type="submit" class="btn btn-danger" name="status" value="ไม่ผ่าน" />
                                    {{-- <input type="submit" class="btn btn-primary" name="status" value="ส่งคะแนนแล้ว" /> --}}
                                </form>
                            </td>

                        </tr>
                        @endforeach




                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                    {{-- {{$statusre->links()}} --}}
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
