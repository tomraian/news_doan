@extends('layout.index')
@section('title')
Xin chào: {{Auth::user()->name}}
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
                                <div class="auth-tab__notify">
                                    @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                    @endforeach
                                </div>
                                @endif
                                @if(session('thongbao'))
                                <div class="auth-tab__notify --success">
                                    {{session(thongbao)}}
                                </div>
                                @endif
                                <div class="auth-tab__content">
                                    <form action="thongtin/{{Auth::user()->name}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <p class="auth-tab__content--heading">
                                            Thông tin tài khoản
                                        </p>
                                        <div class="auth-tab__content--item">
                                            <input type="text" placeholder="Tên" name="Name"
                                                value="{{Auth::user()->name}}" />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="email" placeholder="Email" name="email" readonly
                                                value="{{Auth::user()->email}}" />
                                        </div>
                                        <div class="auth-tab__content--item ">
                                            <p>Đổi mật khẩu </p>
                                            <label class="switch">
                                                <input type="checkbox" name="changePassword">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="password" placeholder="Mật khẩu" name="Password" required
                                                disabled class="password" />
                                        </div>
                                        <div class="auth-tab__content--item">
                                            <input type="password" placeholder="Nhập lại mật khẩu" required disabled
                                                class="password" name="PasswordAgain" />
                                        </div>
                                        <!-- btn  -->
                                        <div class="auth-tab__content--item">
                                            <input type="submit" value="Lưu thông tin" class="btn-auth btn-disabled" />
                                        </div>
                                        <!-- end  -->
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
@section('script')
<script>
// switch toggle button
$(function() {
    $(".switch input").on("click", function() {
        $(this).parent().toggleClass("active");
    });
    $(".switch input").change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled', '');
        }
    });
});
</script>
@endsection