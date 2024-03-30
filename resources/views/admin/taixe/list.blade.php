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
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($taixes as $key => $user)
            <tr>
                <td>{{ $user->MaTaiXe }}</td>
                <td>{{ $user->TenTaiXe }}</td>
                <td>{{ $user->SDT }}</td>
                <td>{{ $user->CMND }}</td>
                <td>{{ $user->NgaySinh }}</td>
                <td>{!! \App\Helpers\Helper::active($user->Active) !!}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/taixe/edit/{{ $user->MaTaiXe }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow('{{$user->MaTaiXe}}', '/admin/taixe/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $taixes->links('pagination::bootstrap-4') !!}
    </div>
@endsection


