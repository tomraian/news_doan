@extends('layout.index')
@section('title')
{{$tintuc->TieuDe}}
@endsection
@section('content')
<main>
    @include('layout.slide')
    <div class="content-area">
        <div class="container">
            <div class="row ">
                <!-- main post  -->
                <div class="col-xl-8">
                    <div class="page-post">
                        <div class="page-post__img">
                            <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="{{$tintuc->TomTat}}" />
                        </div>
                        <p class=" page-post__heading">{{$tintuc->TieuDe}}</p>
                        <div class="page-post__activity post-activity">
                            <!-- time  -->
                            <div class="post-activity__item">
                                <i class="fas fa-bookmark"></i>
                                <a href="">{{$tintuc->created_at}}</a>
                            </div>
                            <!-- author  -->
                            <div class="post-activity__item">
                                <i class="fas fa-user"></i>
                                <a href="">{{$tintuc->TacGia}}</a>
                            </div>
                            <!-- category  -->
                            <div class="post-activity__item">
                                <i class="fas fa-folders"></i>
                                <a
                                    href="the/{{$tintuc->loaitin->id}}/{{$tintuc->loaitin->TenKhongDau}}.html">{{$tintuc->loaitin->Ten}}</a>
                            </div>
                        </div>
                        <div class="page-post__info">
                            {!!$tintuc->NoiDung!!}
                        </div>
                        <div class="page-post__action">
                            <a href="tintuc/{{$tintuc->id}}/{{$tintuc->	TieuDeKhongDau}}.html"><i
                                    class="fas fa-arrow-left"></i>Next</a>
                            <a href="">Prev<i class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="user-comment">
                            @foreach($tintuc->comment as $cm)
                            <div class="user-comment__item">
                                <div class="user-comment__item--info">
                                    <div class="info-img">
                                        <img src="upload/user.png" alt="" />
                                    </div>
                                    <p class="info-name">{{$cm->user->name}}</p>
                                    <span>says</span>
                                </div>
                                <p class="user-comment__item--time">
                                    {{$cm->created_at}}
                                </p>
                                <div class="user-comment__item--text">{{$cm->NoiDung}}</div>
                            </div>
                            @endforeach
                        </div>
                        @if(Auth::user())
                        <div class="page-post__comment">
                            @if(session('thongbao'))
                            <div class="toast-message">
                                <div class="toast-message--icon"></div>
                                <div class="toast-message--content">
                                    {{session('thongbao')}}
                                </div>
                            </div>
                            @endif
                            <form action="comment/{{$tintuc->id}}" class="page-post__comment--form" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="comment" class="page-post__comment--heading">Bình luận</label>
                                <textarea name="NoiDung" id="comment" cols="" rows="3"></textarea>
                                <button type="submit">Đăng bình luận</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- end  -->
                <!-- sidebar  -->
                <!-- sidebar  -->
                <div class="col-xl-4">
                    <div class="sidebar">
                        <div class="sidebar-latest">
                            <p class="sidebar-heading">Tin nổi bật</p>
                            @foreach($tinnoibat as $tnb)
                            <div class="sidebar-latest__item">
                                <a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html"
                                    class="sidebar-latest__item--link">
                                    <img src="upload/tintuc/{{$tnb->Hinh}}" alt="{{$tnb->TomTat}}" />
                                </a>
                                <div class="sidebar-latest__item--info">
                                    <a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html" class="info-link">
                                        {{$tnb->TieuDe}}
                                    </a>
                                    <div class="info-time">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>{{$tnb->created_at}} </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sidebar-tabs">
                            <div class="sidebar-tabs__heading">
                                <ul>
                                    <li class="sidebar-tabs__link active">Thẻ</li>
                                    <li class="sidebar-tabs__link">Tin liên quan</li>
                                    <li class="sidebar-tabs__link">Bình luận</li>
                                </ul>
                            </div>
                            <div class="sidebar-tabs__content">
                                <!-- tab 1 -->
                                <div class="sidebar-tabs__content--wrap tagcloud-wrap active">
                                    @foreach($loaitin as $lt)
                                    <a href="the/{{$lt->id}}/{{$lt->TenKhongDau}}.html"
                                        class="sidebar-tabs__content--item tagcloud">{{$lt->TenKhongDau}}</a>
                                    @endforeach
                                </div>
                                <!-- end tab 1 -->
                                <!-- tab 2 -->
                                <div class="sidebar-tabs__content--wrap ">
                                    <div class="sidebar-latest ">
                                        @foreach($tinlienquan as $tlq)
                                        <div class="sidebar-latest__item">
                                            <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html"
                                                class="sidebar-latest__item--link">
                                                <img src="upload/tintuc/{{$tlq->Hinh}}" alt="{{$tlq->TomTat}}" />
                                            </a>
                                            <div class="sidebar-latest__item--info">
                                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html"
                                                    class="info-link">{{$tlq->TieuDe}}
                                                </a>
                                                <div class="info-time">
                                                    <i class="far fa-calendar-alt"></i>
                                                    <span> {{$tlq->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- end tab 2 -->
                            </div>
                        </div>
                        <!-- calendar  -->
                        <div class="sidebar-calendar">
                            <p class="sidebar-heading">CALENDAR</p>
                            <div class="calendar" id="table">
                                <table id="calendar">
                                    <tr class="weekends">
                                        <th>Cn</th>
                                        <th>T2</th>
                                        <th>T3</th>
                                        <th>T4</th>
                                        <th>T5</th>
                                        <th>T6</th>
                                        <th>T7</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button class="btn-day active">1</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn-day">2</button></td>
                                        <td><button class="btn-day">3</button></td>
                                        <td><button class="btn-day">4</button></td>
                                        <td><button class="btn-day">5</button></td>
                                        <td><button class="btn-day">6</button></td>
                                        <td><button class="btn-day">7</button></td>
                                        <td><button class="btn-day">8</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn-day">9</button></td>
                                        <td><button class="btn-day">10</button></td>
                                        <td><button class="btn-day">11</button></td>
                                        <td><button class="btn-day">12</button></td>
                                        <td><button class="btn-day">13</button></td>
                                        <td><button class="btn-day">14</button></td>
                                        <td><button class="btn-day">15</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn-day">16</button></td>
                                        <td><button class="btn-day">17</button></td>
                                        <td><button class="btn-day">18</button></td>
                                        <td><button class="btn-day">19</button></td>
                                        <td><button class="btn-day">20</button></td>
                                        <td><button class="btn-day">21</button></td>
                                        <td><button class="btn-day">22</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn-day">23</button></td>
                                        <td><button class="btn-day">24</button></td>
                                        <td><button class="btn-day">25</button></td>
                                        <td><button class="btn-day">26</button></td>
                                        <td><button class="btn-day">27</button></td>
                                        <td><button class="btn-day">28</button></td>
                                        <td><button class="btn-day">29</button></td>
                                    </tr>
                                    <tr>
                                        <td><button class="btn-day">30</button></td>
                                        <td><button class="btn-day">31</button></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="sidebar-categories categories">
                            <p class="sidebar-heading">Thể loại</p>

                            <form action="">
                                <div class="categories__icon">
                                    <i class="far fa-angle-down"></i>
                                </div>
                                <select name="" id="" class="categories__select">
                                    <option value="0" selected>
                                        <span>Chọn thể loại</span>
                                    </option>
                                    @foreach($theloai as $tl)
                                    <option value="1">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end  -->
            </div>
        </div>
    </div>
</main>
@endsection()