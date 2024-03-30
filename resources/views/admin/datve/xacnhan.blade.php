<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Admin - Xác Nhận Vé Đặt</title>
  <!-- Sử dụng Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .admin-container {
      max-width: 800px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .confirmation-list {
      list-style: none;
      padding: 0;
    }
    .confirmation-item {
      margin-bottom: 20px;
      padding: 15px;
      border: 1px solid #dee2e6;
      border-radius: 5px;
    }
    .confirm-btn {
      width: 100%;
    }
  </style>
</head>
<body >

  <div class="admin-container">
    <h2 class="text-center">Xác Nhận Vé Đặt Cho Khách Hàng {{$vedat->khachhang->TenKhachHang}}</h2>
    @php $total = 1;@endphp
    <!-- Danh sách xác nhận -->
  @foreach($chitietdatves as $key => $chitietdatve)
    <ul class="confirmation-list">
      <!-- Đơn hàng 1 -->
      <li class="confirmation-item">
        <h4>Vé số {{$total}}</h4>
        <p><strong>Mã Đơn Hàng:</strong> DH {{$vedat->MaDatVe}}</p>
        <p><strong>Ngày Đặt Hàng:</strong> {{$vedat->NgayDat}} </p>
        <p><strong>Tổng Tiền:</strong> {{number_format($vedat->TongTien, 0, '', '.')}} vnđ</p>
        <p><strong>Khách Hàng:</strong> {{$vedat->khachhang->TenKhachHang}}</p>
        <p><strong>Tổng Số Lượng Vé:</strong> {{count($chitietdatves)}} vé</p>
        <p><strong>Tuyến:</strong> {{$chitietdatve->Tuyen}}</p>
        <p><strong>Biển Số Xe:</strong> {{$chitietdatve->BienSoXe}}</p>
        <p><strong>Khởi Hành Vào:</strong> {{$chitietdatve->NgayXuatPhat}}</p>
        <p><strong>Số Ghế:</strong> {{$chitietdatve->MaGhe}}</p>
        <p><strong>Ghi Chú:</strong> Giá của 1 vé này là {{number_format($chitietdatve->Gia, 0, '', '.')}} vnđ</p>
      </li>
    </ul>
    @php
    $total++;
    @endphp
  @endforeach
 <a href="/admin/datve/savexacnhan/{{$vedat->MaDatVe}}" class="btn btn-success confirm-btn" >Xác Nhận Đơn Hàng </a>
