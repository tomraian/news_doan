@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <canvas id="TongTin" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-3 col-md-6">
                <canvas id="TongLt" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-3 col-md-6">
                <canvas id="TongBl" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-3 col-md-6">
                <canvas id="Tongus" width="400" height="400"></canvas>
            </div>
            <div class="col-lg-3">
                <canvas width="400" height="400"></canvas>
            </div>
            <div class="col-lg-6">
                <canvas id="Tong" width="400" height="400"></canvas>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>
// tổng số tin tức 
var tt = document.getElementById("TongTin");
let datatin = [<?php echo $tongtin ?>];
var tongtin = new Chart(tt, {
    type: "bar",
    data: {
        labels: ["Tổng tin tức"],
        datasets: [{
            label: "Tổng tin tức",
            data: datatin,
            backgroundColor: [
                "rgba(54, 162, 235, 1)",
            ],
            borderColor: [
                "rgba(54, 162, 235, 0.2)",
            ],
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
// tổng số loại tin 

var tlt = document.getElementById("TongLt");
let datalt = [<?php echo $tonglt ?>];
var tonglt = new Chart(tlt, {
    type: "bar",
    data: {
        labels: ["Tổng số loại tin"],
        datasets: [{
            label: "Tổng số loại tin",
            data: datalt,
            backgroundColor: [
                'rgb(75, 192, 192)',
            ],
            borderColor: [
                'rgba(75, 192, 192, 0.2)',
            ],
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});

// tổng số bình luận 
var tbl = document.getElementById("TongBl");
let databl = [<?php echo $tongbl ?>];
var tongbl = new Chart(tbl, {
    type: "bar",
    data: {
        labels: ["Tổng bình luận"],
        datasets: [{
            label: "Tổng bình luận",
            data: databl,
            backgroundColor: [
                'rgb(153, 102, 255)',

            ],
            borderColor: [
                'rgba(153, 102, 255, 0.2)',
            ],
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
// tổng thể loại 
var ctx = document.getElementById('Tong').getContext('2d');
tongtl = <?php echo $tongtl ?>;
dataCG = [<?php echo $TinCongGiao?>];
dataTT = [<?php echo $TinTheGioi?>];
// tongtltin = ;
var Tong = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: tongtl,
        datasets: [{
            label: 'Tổng số tin',
            data: [dataCG, dataTT],
            backgroundColor: [
                'rgb(255, 205, 86)',
                'rgb(255, 99, 132)',

            ],
            borderColor: [
                'rgb(255, 205, 86)',
                'rgb(255, 99, 132)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
// tổng người dùng 
var tus = document.getElementById("Tongus");
let dataus = [<?php echo $tongus ?>];
var tongus = new Chart(tus, {
    type: "bar",
    data: {
        labels: ["Tổng số người đùng"],
        datasets: [{
            label: "Tổng số người đùng",
            data: dataus,
            backgroundColor: [
                'rgb(255, 159, 64)'

            ],
            borderColor: [
                'rgba(255, 159, 64, 0.2)',
            ],
            borderWidth: 1,
        }, ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
</script>
@endsection