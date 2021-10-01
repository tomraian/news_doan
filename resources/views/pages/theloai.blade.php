@extends('layout.index')
@section('title')
{{$ten}}
@endsection
@section('content')
<main>
    @include('layout.slide')
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- main post  -->
                <div class="col-xl-8">
                    <div class="page">
                        <p class="page-heading">Thể loại: {{$ten}}</p>
                    </div>
                    <div class="page-content">
                        @foreach($tintuc as $tt)
                        <div class="page-content__item">
                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"
                                class="page-content__item--img"><img src="upload/tintuc/{{$tt->Hinh}}"
                                    alt="{{$tt->TomTat}}" /></a>
                            <div class="page-content__item--info">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"
                                    class="page-content__item--link">{{$tt->TieuDe}}</a>
                                <p class="page-content__item--desc">
                                    {{$tt->TomTat}}
                                </p>
                                <div class="post-activity">
                                    <div class="post-activity__item">
                                        <i class="fas fa-bookmark"></i>
                                        <a href="">{{$tt->created_at}}</a>
                                    </div>
                                    <div class="post-activity__item">
                                        <i class="fas fa-folders"></i>
                                        <a
                                            href="the/{{$tt->loaitin->id}}/{{$tt->loaitin->TenKhongDau}}.html">{{$tt->loaitin->Ten}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$tintuc->links()}}
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