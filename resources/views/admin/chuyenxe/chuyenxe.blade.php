@extends('admin.main')
@section('content')
    <form method="post" action="{{ route('updateStatus') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tuyến</th>
                    <th>Ngày Xuất Phát</th>
                    <th>Nhân Viên</th>
                    <th>Xe</th>
                    <th>Tài Xế</th>
                    <th>Ngày Lễ</th>
                    <th>Trạng Thái</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $user->MaChuyenXe }}</td>
                        <td><a href="/admin/chuyenxe/chuyenxe/{{ $user->MaChuyenXe }}">{{ $user->tuyenxe->TenTuyen }}</a>
                        </td>
                        <td>{{ $user->NgayXuatPhat }}</td>
                        <td>{{ $user->nhanvien->HoTen }}</td>
                        <td>{{ $user->xe->BienSoXe }}</td>
                        <td>{{ $user->taixe->TenTaiXe }}</td>
                        <td>{{ $user->ngayle->TenNgayLe }}</td>
                        <td>
                            @if ($user->DaChay == 0)
                                <select name="status[{{ $user->MaChuyenXe }}]">
                                    <option class="badge badge-success" value="0" {{ $user->DaChay == 0 ? 'selected' : '' }}>Chưa Khởi Hành</option>
                                    <option class="badge badge-danger" value="1" {{ $user->DaChay == 1 ? 'selected' : '' }}>Đã Khởi Hành</option>
                                </select>
                            @else
                                <span class="badge badge-danger">Đang Khởi Hành</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/chuyenxe/editchuyenxe/{{ $user->MaChuyenXe }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow('{{$user->MaChuyenXe}}', '/admin/chuyenxe/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card-footer clearfix">
            <button type="submit" class="btn btn-primary">Cập Nhật Trạng Thái</button>
        </div>
    </form>
@endsection