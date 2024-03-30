@extends('admin.main')
@section('content')
<table class="table">
        <thead>
        <tr>
            <th>Mã Vé</th>
            <th>Khách hàng</th>
            <th>Ngày Đặt</th>
            <th>Tổng Tiền</th>
            <th>Tình Trạng</th>
            <th>Xác Nhận</th>
            <th>Chi Tiết</th>
            &nbsp;
            
        </tr>
        </thead>
        <tbody>
            @foreach($vexe as $key => $ve)
            <tr>
                <td>{{ $ve->MaDatVe }}</td>
                <td>{{ $ve->khachhang->TenKhachHang }}</td>
                <td>{{ $ve->NgayDat }}</td>
                <td>{{number_format($ve->TongTien, 0, '', '.')}} vnđ</td>
                @if($ve->tinhtrang->DaNhanTien == 1)
                    <td style="font-size: 17px;"><span class="badge badge-success">Đã Xác Nhận</span></td>
                @else
                    <td style="font-size: 17px;"><span class="badge badge-danger">Chưa Xác Nhận</span></td>
                @endif
                @if($ve->tinhtrang->DaNhanTien != 1)
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/datve/xacnhan/{{$ve->MaDatVe}}">
                            <i class="fas fa-clipboard-check"></i>
                        </a>
                    </td>
                @else
                    <td></td>
                @endif
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/datve/datve/{{$ve->MaDatVe}}">
                        <i class="fas fa-edit"></i> 
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $vexe->links('pagination::bootstrap-4') !!}
    </div>
@endsection
