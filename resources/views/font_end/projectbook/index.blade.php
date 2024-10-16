<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<style>
    a {
        text-decoration: none;
        color: rgb(108, 3, 3);
    }
</style>
<br><br><br><br><br><br><br>
<div class="container fontgoogle mt-4">
    <div class="py-12">
        <div class="text-center">
            <img src="{{ asset('back_end/image/aft_logo_m.png') }}" alt=""> <br><br>
            <h4>สรุปเล่มโครงการ</h4>
            <h4>อวท.วิทยาลัยเทคโนโลยีพงษ์สวัสดิ์ ประจำปีการศึษา ๒๕๖๗</h4>
            <div class="row">
                <div class="col">
                    <a href="{{ url('bookdepartment/academic') }}">
                        <img src="{{ asset('font_end/image/novel.png') }}" alt="">
                        <h5>เล่มสรุปโครงการวิชาการ (ชมรมวิชาชีพ)</h5>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('bookdepartment/activity') }}">
                        <img src="{{ asset('font_end/image/novel.png') }}" alt="">
                        <h5>เล่มสรุปโครงการกิจกรรม (อวท.)</h5>
                    </a>
                </div>
            </div>
        </div> <br><br><br>
    </div>
</div>
@include('layouts.font_end.footer')

</html>
