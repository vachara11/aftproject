@extends('layouts.back_end.Master')
@section('contents')

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong>กล่องข้อความจากสมาชิก อวท.</strong> </h3>
                <div class="card-tools">
                    <form action="{{url('contact/search')}}" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="search" class="form-control float-right" placeholder="ชื่อ-นามสกุล">

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
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>อีเมล์</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>ข้อความ</th>
                        <th>สถานะ</th>
                        <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($contact as $contacts)
                    <tr>
                        <td>{{$contact->firstItem()+$loop->index}}</td>
                        <td>{{$contacts->name}}</td>
                        <td>{{$contacts->email}}</td>
                        <td>{{$contacts->phone}}</td>
                        <td>{{$contacts->message}}</td>
                        <td><strong class="text-primary">{{$contacts->status}}</strong></td>
                        <td>
                            <form action="{{url('contact/insert/status/'.$contacts->id)}}" method="post">
                                @csrf
                            <input type="submit" class="btn btn-success" name="status" value="ดำเนินการแล้ว" />
                            </form>
                            <form action="{{url('contact/delete/status/'.$contacts->id)}}" method="post">
                                @csrf
                            <input type="submit" class="btn btn-warning" name="status" value="ยังไม่ดำเนินการ">
                            </form>
                            <a href="{{url('contact/delete/'.$contacts->id)}}" class="btn btn-danger">ลบข้อมูล</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                {{ $contact->links() }}
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
