<div class="col-xl-4">
    <div class="sidebar">
        <div class="sidebar-latest">
            <p class="sidebar-heading">Tin nổi bật</p>
            @foreach($tinnoibat as $tintuc)
            <div class="sidebar-latest__item">
                <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html"
                    class="sidebar-latest__item--link">
                    <img src="upload/tintuc/{{$tintuc->Hinh}}" alt="{{$tintuc->TomTat}}" />
                </a>
                <div class="sidebar-latest__item--info">
                    <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html" class="info-link">
                        {{$tintuc->TieuDe}}
                    </a>
                    <div class="info-time">
                        <i class="far fa-calendar-alt"></i>
                        <span> {{$tintuc->created_at}}</span>
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
                <div class="sidebar-tabs__content--wrap">
                    <div class="sidebar-latest">

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