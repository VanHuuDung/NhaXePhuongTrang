@extends('admin.main')

@section('content')
<table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Họ Tên</th>
            <th>SDT</th>
            <th>CMND</th>
            <th>Ngày Sinh</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->Id }}</td>
                <td>{{ $user->HoTen }}</td>
                <td>{{ $user->SDT }}</td>
                <td>{{ $user->CMND }}</td>
                <td>{{ $user->NgaySinh }}</td>
                <td>{{ $user->Email }}</td>
                <td>{{ $user->quyen->TenQuyen }}</td>
                <td>{!! \App\Helpers\Helper::active($user->Active) !!}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/nhanvien/edit/{{ $user->Id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$user->Id}}', '/admin/nhanvien/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $users->links('pagination::bootstrap-4') !!}
    </div>
@endsection


