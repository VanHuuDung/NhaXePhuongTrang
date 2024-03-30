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
                        <label for="menu">Tên Ngày Lễ</label>
                        <input reqired type="text" name="TenNgayLe" value="{{ $user->TenNgayLe }}" class="form-control"  placeholder="Nhập tên">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Ngày Sinh</label>
                    <input reqired type="date" name="Ngay" value="{{ $user->Ngay }}" class="form-control"  placeholder="Nhập Ngày">
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <label for="menu">Giá Tăng</label>
                    <input reqired type="number" name="GiaTang" value="{{ $user->GiaTang }}" class="form-control"  placeholder="Nhập Giá">
                </div>
            </div>
           

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Ngày Lễ</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection