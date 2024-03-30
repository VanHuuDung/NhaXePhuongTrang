@extends('main')
@section('content')


<style>
    .line {
        border-top: 3px solid #ddd;
        margin-top: 10px;
        margin-bottom: 10px;
        width: 100%;
        position: relative;
    }

    .time {
        position: absolute;
        top: -12px;
        background-color: #fff;
        padding: 0 10px;
    }

    .content {
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-time {
        position: absolute;
        left: 50%;
        top: -12px;
        transform: translateX(-50%);
        background-color: #fff;
        padding: 0 10px;
        white-space: nowrap;
    }

    .btn-booking {
        float: right;
        margin-top: 10px;
    }

    .additional-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .filter-sidebar {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin-right: 15px;
    }

    .filter-header {
        font-weight: bold;
    }

    .filter-options {
        margin-top: 10px;
    }

    .btn-filter {
        margin-top: 10px;
    }

    .card-custom {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
    }

    .custom-btn {
        background-color: azure;
        color: coral;
        border: 1px solid #007bff;
        padding: 5px 10px;
        border-radius: 20px;
        transition: background-color 0.3s ease;
    }

    /* Hiệu ứng hover */
    .custom-btn:hover {
        background-color: coral;
        color: #fff;
    }

    .pagination {
    display: flex;
    justify-content: center;
}

.pagination > li {
    display: inline-block;
    margin-right: 1px;
}

.pagination > li:last-child {
    margin-right: 0;
} 
</style>



<div class="container mt-5">
    <div class="row">

        <div class="col-md-3">
            <div class="filter-sidebar">
                <h4 class="filter-header">Bộ Lọc</h4>
                <form action="{{ route('search') }}" method="GET" novalidate="novalidate">

                <div class="filter-options">
                    <label for="from">Điểm Xuất Phát</label>
                    <select id="from" name="from" class="form-control search-slt">
                    @foreach($diemxuatphat as $key)
                        <option value="{{$key->MaDiaDiem}}" {{$key->MaDiaDiem == $from ? 'selected' : ''}}>
                            {{$key->TenDiaDiem}}
                        </option>
                    @endforeach

                    </select>
                </div>
                <div class="filter-options">
                    <label for="from">Điểm Đến</label>
                    <select id="to" name="to" class="form-control search-slt">
                    @foreach($diemden as $key)
                        <option value="{{$key->MaDiaDiem}}" {{$key->MaDiaDiem == $to ? 'selected' : ''}}>
                            {{$key->TenDiaDiem}}
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="filter-options">
                    <label for="date">Ngày:</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{$today}}">
                </div>
                <div class="filter-options">
                    <div class="form-check">
                        <input style="margin-left: 3px;" name="thoi_gian_xuatphat[]" class="form-check-input" type="checkbox" value="sang_som">
                        <label class="form-check-label" for="flexCheckDefault">
                        Sáng sớm 00:00 - 06:00
                        </label>
                    </div>
                    <div class="form-check">
                        <input style="margin-left: 3px;" name="thoi_gian_xuatphat[]" class="form-check-input" type="checkbox" value="buoi_sang">
                        <label class="form-check-label" for="flexCheckDefault">
                        Buổi sáng 06:00 - 12:00
                        </label>
                    </div>
                    <div class="form-check">
                        <input style="margin-left: 3px;" name="thoi_gian_xuatphat[]" class="form-check-input" type="checkbox" value="buoi_chieu">
                        <label class="form-check-label" for="flexCheckDefault">
                        Buổi chiều 12:00 - 18:00
                        </label>
                    </div>
                    <div class="form-check">
                        <input style="margin-left: 3px;" name="thoi_gian_xuatphat[]" class="form-check-input" type="checkbox" value="buoi_toi">
                        <label class="form-check-label" for="flexCheckDefault">
                        Buổi tối 18:00 - 24:00
                        </label>
                    </div>

                    <!-- <label>Chọn thời gian xuất phát:</label>
                    <select class="form-control" name="thoi_gian_xuatphat">
                        <option value="sang_som">Sáng sớm 00:00 - 06:00</option>
                        <option value="buoi_sang">Buổi sáng 06:00 - 12:00</option>
                        <option value="buoi_chieu">Buổi chiều 12:00 - 18:00</option>
                        <option value="buoi_toi">Buổi tối 18:00 - 24:00</option>
                    </select> -->
                </div>


                <!-- <button class="btn btn-primary btn-filter">Lọc Chuyến Xe</button> -->
                <!-- <button type="button" class="btn btn-outline-warning">Lọc Chuyến Xe</button> -->
                <button type="submit" class="btn btn-warning btn-filter">Lọc Chuyến Xe</button>
                <!-- <button class="btn btn-primary btn-filter">Lọc Chuyến Xe</button> -->
                </form>
            </div>
        </div>
    


        <div class="col-md-9 ml-auto">
            @forelse($tuyen as $key => $value)
            <div class="card mb-4 card-custom">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$value->XuatPhat}} - {{$value->Den}}</h5>
                    <div class="line">
                        @php
                        $ngayXuatPhat = strtotime($value->NgayXuatPhat);
                        $ngayDen =$ngayXuatPhat + $value->TongThoiGian * 3600;
                        $gia = $value->Gia + $value->GiaTang;

                        $sophut = $value->TongThoiGian*60;
                        $gio = floor($sophut/60);
                        $phut = $sophut%60;

                        $gheconlai = $value->SoCho - $value->ghe;
                        @endphp
                        <span class="time">{{date('H:i', strtotime($value->NgayXuatPhat))}}</span>
                        <span class="time" style="right: 0;">{{date('H:i', $ngayDen)}}</span>

                        @if($phut == 0)
                        <span class="total-time">{{$gio}} Giờ</span>
                        @else
                        <span class="total-time">{{$gio}} Giờ {{ $phut }} Phút</span>
                        @endif


                    </div> <!-- Đường kẻ ngang -->
                    <div class="content">
                        <div>
                            <p class="card-text mb-1"><strong>{{$value->XuatPhat}}</strong></p>
                            <p class="card-text mb-1">Xe {{$value->SoCho}} Chỗ</p>
                            <p style="color: coral;" class="card-text mb-1"><b>{{ number_format($gia, 0, ',', '.') }} VNĐ</b><b> -- {{ $value->TenTheLoai }} </b> <b> -- {{ $gheconlai }} Ghế Trống</b> </p>
                        </div>
                        <div class="destination">
                            <p class="card-text mb-1"><strong>{{$value->Den}}</strong></p>

                            <div class="additional-info">
                                <p class="card-tex mb-1t">{{$value->TenTaiXe}}</p>
                            </div>
                            <a href="/chuyenxetheotuyen/{{$value->MaChuyenXe}}" class="btn btn-primary btn-sm btn-booking custom-btn">Chọn Chuyến</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Hiển thị thông báo nếu không có kết quả -->
            <p>Không tìm thấy chuyến xe phù hợp.</p>
            @endforelse
        </div>
        
    </div>
    {{ $tuyen->appends(request()->query())->links() }}
</div>



@endsection