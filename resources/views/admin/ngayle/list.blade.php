@extends('admin.main')

@section('content')
<table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Ngày Lễ</th>
            <th>Ngày</th>
            <th>Giá Tăng</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($ngayles as $key => $user)
            <tr>
                <td>{{ $user->Id }}</td>
                <td>{{ $user->TenNgayLe }}</td>
                <td>{{ $user->Ngay }}</td>
                <td>{{ number_format($user->GiaTang, 0, '', '.')}} vnđ</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/ngayle/edit/{{ $user->Id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$user->Id}}', '/admin/ngayle/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $ngayles->links('pagination::bootstrap-4') !!}
    </div>
@endsection


