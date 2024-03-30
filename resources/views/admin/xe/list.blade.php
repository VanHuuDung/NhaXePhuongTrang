@extends('admin.main')
@section('content')
<table class="table">
        <thead>
        <tr>
            <th style="width: 50px">Mã xe</th>
            <th>Tên xe</th>
            <th>Biển số xe</th>
            <th>Hình ảnh</th>
            <th>Loại xe</th>
            <th>Active</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($xes as $xe)
            <tr>
                <td>{{ $xe->MaXe }}</td>
                <td>{{ $xe->TenXe }}</td>
                <td>{{ $xe->BienSoXe }}</td>
                <td>{{ $xe->HinhAnh }}</td>
                <td>{{ $xe->loaixe->SoCho }} chỗ</td>
                <td>{!! \App\Helpers\Helper::active($xe->Active) !!}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/xe/edit/{{$xe ->MaXe}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$xe->MaXe}}', '/admin/xe/destroy')">
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
