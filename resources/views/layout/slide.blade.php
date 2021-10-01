<div class="carousel">
    <div class="container">
        <div class="carousel-wrap">
            <div class="carousel-play">
                @foreach($slide as $sl)
                <div class="carousel-item">
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