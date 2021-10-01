@extends('layout.index')
@section('title')
Free Church
@endsection
@section('content')
<main>
    @include('layout.slide')
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- main post  -->
                <div class="col-xl-8">
                    <!-- lateset news  -->
                    <div class="latest-news">
                        <div class="latest-news__heading news-heading">Mới nhất</div>
                        <div class="latest-news__post">
                            <div class="row">
                                <!-- latest post  -->
                                <div class="col-xl-8">
                                    <?php
                                        $DataMoi = $tintuc->sortByDesc('created_at')->take(6);
                                        $TinMoi = $DataMoi->shift();
                                    ?>
                                    <div class="latest-news__post--item">
                                        <img src="upload/tintuc/{{$TinMoi->Hinh}}" alt="" />
                                        <a href="tintuc/{{$TinMoi->id}}/{{$TinMoi->	TieuDeKhongDau}}.html"
                                            class="post-item__link">{{$TinMoi->TieuDe}}</a>
                                        <div class="post-item__desc">{{$TinMoi->TomTat}}</div>
                                        <div class="post-item__activity post-activity">
                                            <div class=" post-item__activity--item post-activity__item">
                                                <i class="fas fa-bookmark"></i>
                                                <a href="">{{$TinMoi->created_at}}</a>
                                            </div>
                                            <div class="post-item__activity--item post-activity__item">
                                                <i class="fas fa-folders"></i>
                                                <a
                                                    href="the/{{$TinMoi->loaitin->id}}/{{$TinMoi->loaitin->TenKhongDau}}.html">{{$TinMoi->loaitin->Ten}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- news post item  -->
                                <div class="col-xl-4">
                                    <div class="news__post">
                                        @foreach($DataMoi->all() as $tintuc)
                                        <a href="tintuc/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html"
                                            class="news__post--item">
                                            <img src="upload/tintuc/{{$tintuc['Hinh']}}" alt="" class="item-img" />
                                            <p class="item-title">{{$tintuc['TieuDe']}}</p>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- recent-post  -->
                    <div class="recent-post">
                        <div class="row">
                            @foreach($theloai as $tl)
                            <div class="col-xl-6">
                                <a href="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html"
                                    class="news-heading">{{$tl->Ten}}</a>
                                <?php
                                            $data = $tl->tintuc->sortByDesc('created_at')->take(4);
                                            $TinDau = $data->shift();
                                        ?>
                                <div class="latest-news__post--item">
                                    <a href="tintuc/{{$TinDau['id']}}/{{$TinDau['TieuDeKhongDau']}}.html">
                                        <img src="upload/tintuc/{{$TinDau['Hinh']}}" alt="" />
                                    </a>
                                    <a href="tintuc/{{$TinDau['id']}}/{{$TinDau['TieuDeKhongDau']}}.html"
                                        class="post-item__link">{{$TinDau['TieuDe']}}</a>
                                    <div class="post-item__activity post-activity">
                                        <div class="
                                                post-item__activity--item
                                                post-activity__item
                                                ">
                                            <i class="fas fa-bookmark"></i>
                                            <a href="">{{$TinDau['created_at']}}</a>
                                        </div>
                                        <div class="
                                                post-item__activity--item
                                                post-activity__item
                                                ">
                                            <i class="fas fa-folders"></i>
                                            <a
                                                href="the/{{$TinDau->loaitin->id}}/{{$TinDau->loaitin->TenKhongDau}}.html">{{$TinDau->loaitin->Ten}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="news__post">
                                    @foreach($data->all() as $tintuc)
                                    <div class="news__post">
                                        <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html"
                                            class="news__post--item">
                                            <img src="upload/tintuc/{{$tintuc['Hinh']}}" alt="" class="item-img" />
                                            <p class="item-title">{{$tintuc['TieuDe']}}</p>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- carousel news sub  -->
                    <div class="carousel-news-sub">
                        <p class="news-heading">News</p>
                        <div class="carousel">
                            <div class="carousel-wrap">
                                <div class="carousel-play">
                                    @foreach($slide as $sl)
                                    <div class="carousel-item carousel-news-sub__item">
                                        <img src="upload/slide/{{$sl->Hinh}}" alt="{{$sl->NoiDung}}" />
                                        <div class="carousel-item__desc">
                                            <a href="">{{$sl->Ten}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="carousel-btn">
                                    <div class="carousel-btn__next">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                    <div class="carousel-btn__prev">
                                        <i class="fas fa-arrow-left"></i>
                                    </div>
                                </div>
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
    @if(session('thongbao'))
    <div class="toast-message">
        <div class="toast-message--icon"></div>
        <div class="toast-message--content">
            {{session('thongbao')}}
        </div>
    </div>
    @endif
</main>
@endsection()