@extends('admin.main')
@section('content')
<table class="table table-success">
    <tr>
        <td class="table-dark" style="width: 10%">Tuyến</td>
        <td>{{ $chuyenxe->tuyenxe->TenTuyen }}</td>
    </tr>
    <tr>
        <td class="table-dark">Ngày Xuất Phát</td>
        <td>{{ date("d/m/Y", strtotime($chuyenxe->NgayXuatPhat)) }}</td>
    </tr>
    <tr>
        <td class="table-dark">Giờ Xuất Phát</td>
        <td>{{ date("H:i", strtotime($chuyenxe->NgayXuatPhat)) }}</td>
    </tr>
    <tr>
        <td class="table-dark">Nhân Viên</td>
        <td>{{ $chuyenxe->nhanvien->HoTen }}</td>
    </tr>
    <tr>
        <td class="table-dark">Biển Số Xe</td>
        <td>{{ $chuyenxe->xe->BienSoXe }}</td>
    </tr>

    <tr>
        <td class="table-dark">Tài Xế</td>
        <td>{{ $chuyenxe->taixe->TenTaiXe  }}</td>
    </tr>
</table>
@endsection