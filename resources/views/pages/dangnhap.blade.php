@extends('layout.index')
@section('title')
Đăng nhập
@endsection
@section('content')
<main>
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- main post  -->
                <div class="col-xl-8">
                    <div class="user-modal">
                        <div class="user-modal__content">
                            <!-- user authentic -->
                            <div class="user-modal__content--auth">
                                <!-- login  -->
                                <!-- thông báo  -->
                                @if(count($errors) > 0)
                                <div class="toast-message warning">
                                    <div class="toast-message--icon warning"></div>
                                    <div class="toast-message--content">
                                        @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                        @endforeach
                                    </div>

                                </div>
                                @endif
                                @if(session('thongbao'))
                                <div class="toast-message warning">
                                    <div class="toast-message--icon warning"></div>
                                    <div class="toast-message--content">
                                        {{session('thongbao')}}
                                    </div>
                                </div>
                                @endif
                                <!-- end thông báo -->
                                <div class="auth-tab__content">
                                    <form action="dangnhap" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <p class="auth-tab__content--heading">
                                            Đăng nhập với email
                                        </p>
                                        <div class="auth-tab__content--item">
                                            <input type="email" name="email" placeholder="Email" required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="password" name="password" placeholder="Mật khẩu" required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="submit" value="Đăng nhập" class="btn-auth" />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <a href="">Quên mật khẩu</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- end  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end  -->
                <!-- sidebar  -->
                @include('layout.sidebar')
                <!-- end  -->
            </div>
        </div>
    </div>
</main>
@endsection()