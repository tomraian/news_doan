<footer>
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <p class="main-footer__heading">Thẻ</p>
                    <div class="tagcloud-wrap">
                        @foreach($loaitin as $lt)
                        <a href="the/{{$lt->id}}/{{$lt->TenKhongDau}}.html" class="tagcloud">{{$lt->TenKhongDau}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 offset-xl-2">
                    <div class="categories">
                        <p class="main-footer__heading">Thể loại</p>
                        <form action="">
                            <div class="categories__icon">
                                <i class="far fa-angle-down"></i>
                            </div>
                            <select class="categories__select" onchange="location = this.value;">
                                <option selected disabled hidden>
                                    <span> Chọn thể loại</span>
                                </option>
                                @foreach($theloai as $tl)
                                <option value="theloai/{{$tl->id}}/{{$tl->TenKhongDau}}.html">{{$tl->Ten}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="to-top">
    <i class="far fa-chevron-up"></i>
</div>
<!-- close div wrapper  -->
</div>