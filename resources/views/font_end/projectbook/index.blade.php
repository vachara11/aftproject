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
            <div class="row mt-3 text-center">
                @foreach ($pro as $p)
                    <div class="col-4 text-center">
                        <a href="{{ asset('back_end/image/projectbook/pdf/' . $p->file) }}" target="_blank">
                            <img src="{{ asset('back_end/image/projectbook/' . $p->image) }}" width="230" height="280"
                                alt="">
                            <p><h6>{{ $p->name }}</h6></p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div> <br><br><br>
    </div>
</div>
@include('layouts.font_end.footer')

</html>
