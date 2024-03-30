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
                        <input reqired type="text" name="TenTaiXe" value="{{ $user->TenTaiXe }}" class="form-control"  placeholder="Nhập tên">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Ngày Sinh</label>
                    <input reqired type="date" name="NgaySinh" value="{{ $user->NgaySinh }}" class="form-control"  placeholder="Nhập Ngày Sinh ">
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="menu">SDT</label>
                    <input reqired type="number" name="SDT" value="{{ $user->SDT }}" class="form-control"  placeholder="Nhập SDT">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">CMND</label>
                    <input reqired type="number" name="CMND" value="{{ $user->CMND }}" class="form-control"  placeholder="Nhập CCCD">
                </div>
            </div>
            <div class="col-md-6">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="Active"
                            {{ $user->Active == 1 ? 'checked' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="Active"
                            {{ $user->Active == 0 ? 'checked' : '' }}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Tài Xế</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection