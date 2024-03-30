@extends('admin.main')
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">Mã Loại Xe</th>
            <th>Số chỗ</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($loaixes as $loaixe)
            <tr>
                <td>{{ $loaixe->MaLoaiXe }}</td>
                <td>{{ $loaixe->SoCho }} Chỗ</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/loaixe/edit/{{$loaixe->MaLoaiXe}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$loaixe->MaLoaiXe}}', '/admin/loaixe/destroy')">
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
