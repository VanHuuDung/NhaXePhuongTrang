@extends('main')
@section('content')

<style>
.search-sec{
    padding: 2rem;
    margin-bottom: -100px;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}
</style>


<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="height: 300px;" src="{{ asset('image/1.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height: 300px;" src="{{ asset('image/2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img style="height: 300px;" src="{{ asset('image/3.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="search-sec">
    <div class="container">
        <form action="{{ route('search_index') }}" method="GET" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <label style="color: #fff;" for="from">Điểm Xuất Phát</label>
                            <select id="from" name="from" class="form-control search-slt">
                                @foreach($diemxuatphat as $key)
                                <option value="{{$key->MaDiaDiem}}">{{$key->TenDiaDiem}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <label style="color: #fff;" for="to">Điểm Đến</label>
                            <select id="to" name="to" class="form-control search-slt">
                                @foreach($diemden as $key)
                                <option value="{{$key->MaDiaDiem}}">{{$key->TenDiaDiem}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <label style="color: #fff;" for="date">Thời gian xuất phát</label>
                            <input type="date" id="date" name="date" class="form-control search-slt" min="2000-01-01">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



<script>
    // Lấy ngày hôm nay
    var today = new Date().toISOString().split('T')[0];

    // Đặt giá trị mặc định cho input date
    document.getElementById('date').value = today;
</script>


<div class="container">
    <div class="row">

        <!-- Thông tin về Tuyến Xe 1 -->
        <div class="col-md-4">
            <div class="card">
                <div class="container position-relative">
                    <h3 class="text-overlay">Tuyến xe từ<br /> <b>TP.HCM</b></h3>
                    <img class="img-fluid" src="https://storage.googleapis.com/futa-busline-cms-dev/Rectangle_23_2_8bf6ed1d78/Rectangle_23_2_8bf6ed1d78.png" alt="">
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Điểm Đến</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuyenHCM as $key => $hcm)
                            <?php
                            $sophut = $hcm->TongThoiGian * 60;
                            $gio = floor($sophut / 60);
                            $phut = $sophut % 60;
                            ?>

                            <tr>
                                <td><a href="/trangchu/{{$hcm->MaTuyen}}">{{ $hcm->Den }}</a></td>
                                @if($phut == 0)
                                <td>{{ $gio }} Giờ</td>
                                @else
                                <td>{{ $gio }} Giờ {{ $phut }} Phút</td>
                                @endif
                                <td>{{ number_format($hcm->Gia, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Thông tin về Tuyến Xe 2 -->
        <div class="col-md-4">
            <div class="card">
                <div class="container position-relative">
                    <h3 class="text-overlay">Tuyến xe từ<br /> <b>Vũng Tàu</b></h3>
                    <img class="img-fluid" src="https://storage.googleapis.com/futa-busline-cms-dev/Rectangle_23_2_8bf6ed1d78/Rectangle_23_2_8bf6ed1d78.png" alt="">
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Điểm Đến</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuyenVT as $key => $vt)
                            <?php
                            $sophut = $vt->TongThoiGian * 60;
                            $gio = floor($sophut / 60);
                            $phut = $sophut % 60;
                            ?>

                            <tr>
                                <td><a href="/trangchu/{{$vt->MaTuyen}}">{{ $vt->Den }}</a></td>
                                @if($phut == 0)
                                <td>{{ $gio }} Giờ</td>
                                @else
                                <td>{{ $gio }} Giờ {{ $phut }} Phút</td>
                                @endif
                                <td>{{ number_format($vt->Gia, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Thông tin về Tuyến Xe 3 -->
        <div class="col-md-4">
            <div class="card">
                <div class="container position-relative">
                    <h3 class="text-overlay">Tuyến xe từ<br /> <b>Đà Lạt</b></h3>
                    <img class="img-fluid" src="https://storage.googleapis.com/futa-busline-cms-dev/Rectangle_23_2_8bf6ed1d78/Rectangle_23_2_8bf6ed1d78.png" alt="">
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Điểm Đến</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tuyenDL as $key => $dl)
                            <?php
                            $sophut = $dl->TongThoiGian * 60;
                            $gio = floor($sophut / 60);
                            $phut = $sophut % 60;
                            ?>

                            <tr>
                                <td><a href="/trangchu/{{$dl->MaTuyen}}">{{ $dl->Den }}</a></td>
                                @if($phut == 0)
                                <td>{{ $gio }} Giờ</td>
                                @else
                                <td>{{ $gio }} Giờ {{ $phut }} Phút</td>
                                @endif
                                <td>{{ number_format($dl->Gia, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>





@endsection