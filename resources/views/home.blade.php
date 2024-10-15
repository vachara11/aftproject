@extends('layouts.back_end.Master')
@section('contents')
<style>
    .gradiant-bg{
  font-size: 20px;
  font-weight: bold;
  background: linear-gradient( 45deg, #ec0a19, #f37106, #eb0606, #ee7a0d, #f50101);
  background-size: 40%;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

  animation: gradient 5s infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}
</style>
<div class="container">
    {{-- <div class="row">
        <div class="col-12">
                    <img class="img-fluid" src="{{asset('back_end/image/123.jpg')}}" alt="">
        </div>
    </div> --}}
    <!-- /.col -->
    <div class="row mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <strong>สถานะเล่มโครงการ ปีการศึกษา ๒๕๖๖</strong> </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead class="colors">
                            <tr class="text-center">
                                <th rowspan="2">ชื่อกิจกรรม</th>
                                <th rowspan="2">ภาคเรียน/ปีการศึกษา</th>
                                <th rowspan="2">วันที่ทำกิจกรรม</th>
                                <th colspan="3">ผู้เข้าร่วมกิจกรรม</th>
                                <th colspan="2">ความพึงใจ</th>
                                <th colspan="2">งบประมาณ</th>
                                <th rowspan="2">สถานะ</th>
                                
                  
                            </tr>
                            <tr class="text-center">
                                <th>ทั้งหมด</th>
                                <th>ผู้เข้าร่วม</th>
                                <th>ร้อยละ</th>
                                <th>ค่าเฉลี่ย</th>
                                <th>ร้อยละ</th>
                                <th>งบอนุมัติ</th>
                                <th>งบที่ใช้</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($project as $pro)
                                <tr>
                                    <td>{{ $pro->name }}</td>
                                    <td>{{ $pro->term }}</td>
                                    <td>{{ $pro->date }}</td>
                                    <td>{{ $pro->ptotal }}</td>
                                    <td>{{ $pro->pnumber }}</td>
                                    <td>{{ $pro->ppercen }}</td>
                                    <td>{{ $pro->knumber }}</td>
                                    <td>{{ $pro->kpercen }}</td>
                                    <td>{{ $pro->budget }}</td>
                                    <td>{{ $pro->jbudget }}</td>
                                   <td class="text-center" width="100px">
                                        @if ($pro->status =="เสร็จแล้ว")
                                        <span class="badge rounded-pill bg-success ">{{$pro->status}}</span> 
                                        @elseif ($pro->status =="กำลังดำเนินการ")
                                        <marquee behavior="alternate" width="30%">>></marquee> <span class="badge rounded-pill bg-primary">{{$pro->status}}</span><marquee behavior="alternate" width="30%"><<</marquee>
                                        @elseif ($pro->status =="ตามลายเซ็น")
                                        <span class="badge rounded-pill bg-warning">{{$pro->status}}</span>
                                        @else
                                        <span class="gradiant-bg">{{$pro->status}}</span>
                                        @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div style="float: right;">
                        {{ $project->links() }}
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>
</div>
<!-- /.row -->

@endsection
