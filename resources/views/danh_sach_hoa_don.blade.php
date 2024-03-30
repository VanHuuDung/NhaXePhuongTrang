@extends('main')
@section('content')


@foreach ($datVeList as $datVe)
    {{ $datVe->MaDatVe }} - {{ $datVe->NgayDat }} - {{ $datVe->TongTien }}
    <!-- Thêm thông tin khác nếu cần -->
@endforeach
<div class="container">
        <h1 class="text-center my-4">Danh Sách Hóa Đơn</h1>

        <div class="row">
            @foreach ($datVeList as $hoaDon)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mã Đặt Vé: {{ $hoaDon->MaDatVe }}</h5>
                            <p class="card-text">Ngày Đặt: {{ $hoaDon->NgayDat }}</p>
                            <p class="card-text">Tổng Tiền: {{ $hoaDon->TongTien }}</p>
                            {{-- Thêm các trường khác nếu cần --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Hóa Đơn Điện Tử</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="mb-4">Thông Tin Khách Hàng</h5>
                        <p><strong>Tên Khách Hàng:</strong> John Doe</p>
                        <p><strong>Email:</strong> john@example.com</p>
                        <p><strong>Địa Chỉ:</strong> 123 Main Street, City</p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <h5 class="mb-4">Thông Tin Hóa Đơn</h5>
                        <p><strong>Mã Hóa Đơn:</strong> HD123456</p>
                        <p><strong>Ngày Xuất:</strong> 01/01/2023</p>
                        <p><strong>Tổng Tiền:</strong> $100.00</p>
                    </div>
                </div>
                <hr>

                <h5 class="mb-3">Chi Tiết Hóa Đơn</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Đơn Giá</th>
                            <th scope="col">Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item 1</td>
                            <td>2</td>
                            <td>$50.00</td>
                            <td>$100.00</td>
                        </tr>
                        <!-- Thêm các dòng khác nếu cần -->
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted text-center">
                Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!
            </div>
        </div>
    </div>

@endsection