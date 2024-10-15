<!DOCTYPE html>
<html lang="en">
@include('layouts.font_end.header')
<br><br><br><br><br><br>
<div class="container d-flex align-items-center flex-column fontgoogle">
    <img class="masthead-avatar mb-5" src="{{asset('font_end/image/aft_logo_mini1.png')}}">
    <h1 class="masthead-heading text-uppercase mb-0">เข้าสู่ระบบ</h1>
    <br>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <div class="col-lg-8 col-xl-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-floating mb-5">
                <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                <label for="email" value="{{ __('Email') }}">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input class="form-control" id="password" type="password" name="password" name="password" required autocomplete="current-password" />
                <label for="password" value="{{ __('Password') }}">Password</label>
            </div>

            <button class="btn btn-primary " type="submit" href="{{ route('password.request') }}">Login</button>
        </form>

    </div>
</div>
<br><br><br><br>
@include('layouts.font_end.footer')

</body>

</html>
