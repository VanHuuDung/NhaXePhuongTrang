@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">Mã Tuyến Xe</th>
            <th>Tên Tuyến Xe</th>
            <th>Điểm Đến</th>
            <th>Điểm Xuất Phát</th>
            <th>Tổng thời gian</th>
            <th>Giá</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($tuyenxes as $tuyenxe)
            <tr>
                <td>{{ $tuyenxe->MaTuyenXe }}</td>
                <td>{{ $tuyenxe->TenTuyen }}</td>
                <td>{{ $tuyenxe->DiemDen }}</td>
                <td>{{ $tuyenxe->DiemXuatPhat }}</td>
                <td>{{ $tuyenxe->TongThoiGian }}</td>
                <td>{{ $tuyenxe->Gia }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/tuyenxe/edit/{{$tuyenxe->MaTuyen}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$tuyenxe->MaTuyen}}', '/admin/tuyenxe/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
    </div>
@endsection
