@extends('form.layout')
@section('title' , 'Login')
@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="/">
                            <img src="https://www.adina.vn/assets/images/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div>

                    </div>

                    <form id="formAuthentication" class="mb-3" action="{{route('login.save')}}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email của bạn</label>
                            <input type="text" class="form-control" id="email" name="email_username"
                                placeholder="Email của bạn" autofocus />
                            @if ($errors->has('email_username'))
                            <span style="color: red">{{$errors->first('email_username')}}</span>
                            @endif
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Mật khẩu</label>
                                {{-- <a href="auth-forgot-password-basic.html">
                                    <small>Quên mật khẩu ?</small>
                                </a> --}}
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            @if ($errors->has('password'))
                                <span style="color: red">{{$errors->first('password')}}</span>
                                @endif
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Nhớ mật khẩu </label>
                            </div>
                        </div>
                        <div class="my-3">
                            <div class="col-6">
                                <a class="btn btn-danger text-white" href="{{route('login.getLoginGoogle')}}"><i class='bx bxl-google'></i> Google</a>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Đăng nhập</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Bạn chưa có tài khoản?</span>
                        <a href="/register">
                            <span>Tạo mới tài khoản</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<!-- /Logo -->

@endsection