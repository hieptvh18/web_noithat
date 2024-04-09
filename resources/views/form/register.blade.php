@extends('form.layout')
@section('title' , 'Register')
@section('content')
<div class="container">
    <div class="authentication-wrapper mt-5 container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <!-- Logo -->
                <!-- Logo -->
                <div class="app-brand pt-4 justify-content-center">
                    <a href="/">
                        <img src="https://www.adina.vn/assets/images/logo.png" alt="">
                    </a>
                </div>
                <!-- /Logo -->
                <form class="mb-3 py-4 container" enctype=multipart/form-data action="{{route('register.save')}}"
                    method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="name"
                                    placeholder="Enter your username" autofocus />
                                @if ($errors->has('name'))
                                <span style="color: red">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                                @if ($errors->has('email'))
                                <span style="color: red">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    autofocus />
                                @if ($errors->has('password'))
                                <span style="color: red">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" placeholder="Address"
                                    autofocus />
                                @if ($errors->has('address'))
                                <span style="color: red">{{$errors->first('address')}}</span>
                                @endif
                            </div>
                            <div class="mb-3 pt-2">
                                <label for="username" class="form-label">Ảnh đại diện</label>
                                <br>
                                <input type="file" name="avatar" />
                                <br>
                                @if ($errors->has('avatar'))
                                <span style="color: red">{{$errors->first('avatar')}}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" />
                                @if ($errors->has('phone'))
                                <span style="color: red">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100" type="submit">Đăng ký</button>
                </form>
                <p class="text-center">
                    <span>Bạn đã có tài khoản?</span>
                    <a href="/login">
                        <span>Đăng nhập</span>
                    </a>
                </p>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
@endsection