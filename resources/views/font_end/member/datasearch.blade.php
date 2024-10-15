<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<br><br><br><br><br><br><br>
<div class="container fontgoogle">
    <div class="py-12">
        <div class="text-center">
            <img src="{{asset('back_end/image/aft_logo_m.png')}}" alt=""> <br><br>
            <h4>ดาวโหลดใบสมัครชิกชมรมวิชาชีพ และ<br><br> อวท.วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</h4>
        </div> <br><br><br>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="bgcolortable">
                <tr>
                    <th>รหัสนักเรียน</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ระดับชั้น</th>
                    <th>สาขาวิชา</th>
                    <th>วันที่สมัคร</th>
                    <th>รายการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($memberships as $membership)
                <tr>
                    <td>{{$membership->student_id}}</td>
                    <td>{{$membership->name}}</td>
                    <td>{{$membership->classroom}}</td>
                    <td>{{$membership->department}}</td>
                    <td>
                        {{$membership->days}}
                        {{$membership->months}}
                        {{$membership->years}}
                    </td>
                    <td>
                        <a href="{{url('membership/Professional/font_end/edit/'.$membership->id)}}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                        <!-- <a href="{{url('membership/delete/'.$membership->id)}}" class="btn btn-danger">ลบ</a> -->
                        <a href="{{url('membership/PDF/'.$membership->id)}}" class="btn btn-success"><i class="fas fa-download"></i> แบบอวท.๐๖</a>
                        <a href="{{url('membership/PDF/AFT/'.$membership->id)}}" class="btn btn-danger"><i class="fas fa-download"></i> แบบอวท.๑๐</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br><br><br>
@include('layouts.font_end.footer')

</html>
