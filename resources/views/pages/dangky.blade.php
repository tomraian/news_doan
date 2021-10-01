@extends('layout.index')
@section('title')
Đăng ký
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
                                <!-- new account  -->
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
                                <div class="toast-message">
                                    <div class="toast-message--icon"></div>
                                    <div class="toast-message--content">
                                        {{session('thongbao')}}
                                    </div>
                                </div>
                                @endif
                                <div class="auth-tab__content">
                                    <form action="dangky" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <p class="auth-tab__content--heading">
                                            Tạo tài khoản
                                        </p>
                                        <div class="auth-tab__content--item">
                                            <input type="email" placeholder="Nhập email" name="Email" required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="text" placeholder="Tên của bạn" name="Name" required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="password" placeholder="Mật khẩu" name="Password" required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="password" name="PasswordAgain" placeholder="Nhập lại mật khẩu"
                                                required />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="submit" value="Tạo tài khoản" class="btn-auth btn-disabled" />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <div class="policy">
                                                Khi bấm tạo tài khoản bạn đã đồng ý với
                                                <a href="quydinh">quy định</a>
                                                của chúng tôi
                                            </div>
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