<!-- open div wrapper  -->
<div class="wrapper">
    <header>
        <div class="header-top">
            <div class="container header-item">
                @if(!Auth::user())
                <!-- chưa đăng nhâp  -->
                <div class="user">
                    <a href="dangnhap"><span>Đăng nhập</span>
                        <i class="far fa-sign-in-alt"></i>
                    </a>
                    <a href="dangky"><span>Đăng ký</span>
                        <i class="far fa-user-plus"></i>
                    </a>
                </div>
                @else
                <!-- đã đăng nhập  -->
                <div class="user">
                    <a href="thongtin/{{Auth::user()->name}}"><span>{{Auth::user()->name}}</span>
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <a href="dangxuat"><span>Đăng xuất</span>
                        <i class="far fa-sign-out-alt"></i>
                    </a>
                </div>
                @endif
                <div class="header-social">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li>
                            <a href="http://instagram.com/"><i class="fab fa-instagram-square"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="logo">
            <a href="trangchu"><img src="img/logo/logo.webp" alt="" /></a>
        </div>
        <div class="menu">
            <div class="container">
                <div class="menu-wrap">
                    <ul class="menu-list">
                        <li><a href="trangchu">Trang chủ</a></li>
                        @foreach($theloai as $tl)
                        <li><a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</a></li>
                        @endforeach
                        <li><a href="lienhe">Về chúng tôi</a></li>
                    </ul>
                    <div class="menu-mobile">
                        <div class="menu-mobile__icon">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                    <div class="search-bar">
                        <form action="timkiem" method="get">
                            <input type="text" placeholder="Tìm kiếm..." name="tukhoa" value="{{$tukhoa}}" />
                            <div class="search-btn">
                                <label for="search"><i class="fas fa-search"></i></label>
                                <button type="submit" id="search"></button>
                            </div>
                        </form>
                    </div>
                </div>
                <ul class="menu-mobile__list">
                    <li><a href="trangchu">Trang chủ</a></li>
                    @foreach($theloai as $tl)
                    <li><a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</a></li>
                    @endforeach
                    <li><a href="lienhe">Về chúng tôi</a></li>
                </ul>
            </div>
        </div>
    </header>