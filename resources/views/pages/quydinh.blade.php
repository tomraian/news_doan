@extends('layout.index')
@section('title')
Quy định-Nội quy
@endsection
@section('content')
<main>
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- main post  -->
                <div class="col-xl-8">
                    <div class="policy">
                        <p class="policy-heading">Quy định</p>
                        <p class="policy-heading__desc">
                            Quy định về đăng ký tài khoản và nội dung "Bình luận" trên
                            Free Church
                        </p>
                        <ul class="policy-list">
                            <li class="policy-item">
                                Tên đăng ký không phản cảm, không có các thông tin bao
                                gồm: link web, số điện thoại, email hoặc tên riêng..mang
                                tính quảng cáo, thương mại cho cá nhân, tổ chức hoặc mang
                                nội dung gây hại cho các tổ chức, cá nhân khác.
                            </li>
                            <li class="policy-item">
                                Vì lý do bảo mật nên mỗi người dùng khi đăng ký sẽ không
                                thể chọn ảnh đại diện, ngày sinh và giới tính.
                            </li>
                            <li class="policy-item">
                                Nội dung bình luận không chia sẻ link, số điện thoại,
                                email hoặc quảng cáo cho bất cứ cá nhân, tổ chức nào.
                            </li>
                            <li class="policy-item">
                                Nội dung bình luận không vi phạm đạo đức, pháp luật, thuần
                                phong mỹ tục Việt Nam.
                            </li>
                            <li class="policy-item">
                                Nội dung bình luận không vu cáo, bôi nhọ, miệt thị, xuyên
                                tạc, gây hại cho tổ chức, cá nhân.
                            </li>
                            <li class="policy-item">
                                Nội dung bình luận không chửi bới, thô tục.
                            </li>
                            <li class="policy-item">
                                Nội dung bình luận nên có tính chất tham khảo, đóng góp ý
                                kiến thay vì chỉ trích.
                            </li>
                            <li class="policy-item">
                                Khi quy phạm các nội quy, tài khoản có thể bị xóa bình
                                luận để nhắc nhở. Nếu sự việc tiếp tục diễn ra có thể bị
                                xóa tài khoản mà không báo trước.
                            </li>
                        </ul>
                        <div class="policy-contact">
                            <span>Nếu tài khoản của bạn gặp vấn đề hãy liện hệ với chúng
                                tôi tại:</span><a href="mailto:duyhoangdinh281@gmail.com">duyhoangdinh281@gmail.com</a>
                            hoặc
                            <a href="tel:0394448743">0394448743</a>
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