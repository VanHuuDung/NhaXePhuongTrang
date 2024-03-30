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
                        <input reqired type="text" name="TenTaiXe" value="{{ old('TenTaiXe') }}" class="form-control"  placeholder="Nhập tên ">
                    </div>
                </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Ngày Sinh</label>
                    <input reqired type="date" name="NgaySinh" value="{{ old('NgaySinh') }}" class="form-control"  placeholder="Nhập Ngày Sinh ">
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="menu">SDT</label>
                    <input reqired type="text" name="SDT" value="{{ old('SDT') }}" class="form-control"  placeholder="Nhập SDT ">
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">CMND</label>
                    <input reqired type="text" name="CMND" value="{{ old('CMND') }}" class="form-control"  placeholder="Nhập CCCD ">
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Tài Xế</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection