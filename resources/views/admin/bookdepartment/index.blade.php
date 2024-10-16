@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{url('/admin/bookdepartment/insert')}}"> <button class="btn btn-primary"><i class="fas fa-plus"></i>เพิ่มเล่มโครงการ</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>เล่มแสกนโครงการชมรมวิชาชีพที่เสร็จสมบูรณ์แล้ว</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ภาคเรียน/ปีการศึกษา</th>
                            <th>ชื่อกิจกรรม/โครงการ</th>
                            <th>วันที่ดำเนินงาน</th>
                            <th>หน้าปก</th>
                            <th>ไฟล์เล่ม</th>
                            <th>หมายเหตุ</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($pro as $item)
                           
                      
                        <tr>
                            <td class="text-center">{{$pro->firstItem()+$loop->index}}</td>
                            <td>{{$item->year}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->date}}</td>
                            <td> <img src="{{asset('back_end/image/bookdepartment/'.$item->image)}}" width="100px" alt=""> 
                            </td>
                            <td>
                                @if ($item->file == 'ไม่พบไฟล์PDF')
                                            
                                @else
                                    <a href="{{ asset('back_end/image/bookdepartment/pdf/' . $item->file) }}" class="btn btn-primary" target="_blank">
                                        <i class="fas fa-eye"></i></a>
                                @endif
                            </td>
                            <td>{{$item->comnent}}</td>
                           
                            <td>
                                <a href="{{url('admin/bookdepartment/edit/'.$item->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{url('admin/bookdepartment/delete/'.$item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection
