@extends('template.main')

@section('title', 'Login')

@section('content')

    <div class="main-wrapper my-lg-2 my-3">
        <div class="container">
            <div class="row login-wrapper align-items-center justify-content-between">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="d-flex align-items-center h-100">
                        <img class="img-fluid" src="{{asset('assets/images/ilustrasi/undraw_Login_re_4vu2.svg')}}">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="wrapper d-flex align-items-center">
                        <div class="card border-0 shadow-sm rounded-2">
                            <div class="card-header text-center pt-4 bg-transparent mx-4">
                                <img width="200" class="mb-3" src="{{ asset('assets/images/logo/logo_2.png')}}">
                                <h2>Selamat Datang</h2>
                                <p class="m-0">Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda melalui Username dan Password 🔔</p>
                            </div>
                            <div class="card-body">
                                <form class="login-form" action="{{ route('auth.postlogin') }}" method="post">
                                    {{ csrf_field() }}
                                    @if(isset($message))
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @endif
                                    <div class="form-group mb-4">
                                        <label class="control-label">Username / Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('username') ? 'border-danger' : '' }}"><i class="bi bi-person-fill"></i></span>
                                            <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username" type="text" placeholder="Username atau Email" autofocus>
                                        </div>  
                                        @if($errors->has('username'))
                                        <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('username')) }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="control-label">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-key-fill"></i></span>
                                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" placeholder="Password">
                                            <a href="#" class="input-group-text btn btn-light btn-toggle-password border {{ $errors->has('password') ? 'border-danger' : '' }}"><i class="bi bi-eye-fill"></i></a>
                                        </div>
                                        @if($errors->has('password'))
                                        <div class="form-control-feedback text-danger">{{ ucfirst($errors->first('password')) }}</div>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group">
                                        <a href="{{ route('auth.forgotpassword') }}" class="link-primary">Lupa Password?</a>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary rounded px-4 btn-block">Masuk</button>
                                        <p class="my-2 text-center">Belum punya akun?</p>
                                        <a href="{{ route('auth.register') }}" class="btn btn-secondary rounded px-4 btn-block">Daftar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css-extra')
<style>
    .login-wrapper{min-height: calc(100vh - 19rem)}
</style>
@endsection
@section('js-extra')
<script type="text/javascript">
$(document).on("click", ".btn-toggle-password", function(e){
    e.preventDefault();
    if(!$(this).hasClass("show")){
        $(this).parents(".input-group").find("input").attr("type","text");
        $(this).find(".bi").removeClass("bi-eye-fill").addClass("bi-eye-slash-fill");
        $(this).addClass("show");
    }
    else{
        $(this).parents(".input-group").find("input").attr("type","password");
        $(this).find(".bi").removeClass("bi-eye-slash-fill").addClass("bi-eye-fill");
        $(this).removeClass("show");
    }
});
</script>
@endsection
