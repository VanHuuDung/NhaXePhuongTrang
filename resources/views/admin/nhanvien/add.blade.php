@extends('admin.main')


@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Họ Tên</label>
                        <input reqired type="text" name="hoten" value="{{ old('name') }}" class="form-control"  placeholder="Nhập tên Người Dùng">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Quyền</label>
                        <select class="form-control" name="quyen">
                            @foreach($quyens as $quyen)
                                <option value="{{ $quyen->MaQuyen }}">{{ $quyen->TenQuyen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Password</label>
                        <input reqired type="password" name="password" value="{{ old('password') }}" class="form-control"  placeholder="Nhập Mật Khẩu Người Dùng">
                    </div>
                </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Ngày Sinh</label>
                    <input reqired type="date" name="date" value="{{ old('date') }}" class="form-control"  placeholder="Nhập Ngày Sinh Người Dùng">
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="menu">SDT</label>
                    <input reqired type="number" name="sdt" value="{{ old('sdt') }}" class="form-control"  placeholder="Nhập SDT Người Dùng">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">CMND</label>
                    <input reqired type="number" name="cmnd" value="{{ old('cmnd') }}" class="form-control"  placeholder="Nhập CCCD Người Dùng">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Email</label>
                    <input reqired type="email" name="email" value="{{ old('email') }}" class="form-control"  placeholder="Nhập Email Người Dùng">
                </div>
            </div>
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Người Dùng</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection