@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{route('show.membership')}}"> <button class="btn btn-primary">กรอกข้อมูลสมัครสมาชิก</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>MemberShip</strong> </h3>
                <div class="card-tools">
                    <form action="{{url('membership/search/')}}" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="สาขาวิชา">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" >
                <thead class="colors">
                        <tr class="text-center">
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
                                <a class="btn btn-success btn-sm" href="{{url('membership/PDF/'.$membership->id)}}" target="_blank">
                                    <i class="fas fa-eye"></i>
                                    แบบอวท.06
                                </a>
                                <a class="btn btn-success btn-sm" href="{{url('membership/PDF/AFT/'.$membership->id)}}" target="_blank">
                                    <i class="fas fa-eye"></i>
                                    แบบอวท.10
                                </a>

                                <a class="btn btn-primary btn-sm" href="{{url('membership/Professional/edit/'.$membership->id)}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{url('membership/delete/'.$membership->id)}}">
                                    <i class="fas fa-trash">
                                    </i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
            {{ $memberships->links() }}
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
