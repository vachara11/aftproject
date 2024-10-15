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
        <form action="{{url('membership/font-end/search/')}}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ค้นหาด้วยรหัสนักเรียน นักศึกษา" name="search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-info">
                    <img src="{{asset('back_end/image/search.png')}}" alt="">
                </button>
            </div>
        </form>

        <br><br><br>
    </div>
</div>
@include('layouts.font_end.footer')
@if(session()->has('status'))
<script>
    swal("<?php echo session()->get('status'); ?>", "", "success");
</script>
@endif

@if(session()->has('err'))
<script>
    swal("<?php echo session()->get('err'); ?>", "", "error");
</script>
@endif

</html>
