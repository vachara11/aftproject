@extends('layouts.back_end.Master')
@section('contents')

<div class="col-12">
    <a href="{{ route('pr.create') }}"> <button class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มข่าวประชาสัมพันธ์</button> </a>
</div>

<div class="row mt-2">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> <strong> ประชาสัมพันธ์กิจกรรม อวท. วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์</strong> </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead class="colors">
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อกิจกรรม</th>
                            <th>วันที่ทำกิจกรรม</th>
                            <th>รูปภาพ</th>
                            <th>วันที่โพสต์</th>
                            <th>รายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pr as $p)
                        <tr>
                            <td class="text-center">{{$pr->firstItem()+$loop->index}}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->date }}</td>
                            <td>
                                <img src="{{ asset('back_end/image/pr/resize/'.$p->file) }}" alt="" width="150">
                            </td>
                            <td>{{ $p->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/pr/edit/'.$p->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{ url('/admin/pr/delete/'.$p->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                @if ($p->status == 0)
                                    <form action="{{ url('/admin/pr/open/'.$p->id) }}" method="post">
                                      @csrf
                                      <button type="submit" class="btn btn-success" name="edit" value = "1">เปิด</button>
                                    </form>
                                @elseif ($p->status == 1)
                                      <form action="{{ url('/admin/pr/end/'.$p->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger" name="edit" value = "0">ปิด</button>
                                      </form>
                                @endif
                                
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div style="float: right;">
                 {{ $pr->links() }}
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
