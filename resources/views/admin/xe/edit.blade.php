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
                        <label for="menu">Tên Xe</label>
                        <input required type="text" name="TenXe" value="{{ $xe->TenXe }}" class="form-control"
                            placeholder="Nhập tên xe">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Biển Số Xe</label>
                        <input required type="text" name="BienSoXe" value="{{ $xe->BienSoXe }}" class="form-control"
                            placeholder="Nhập biển số xe">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="hinhanh" name="HinhAnh"
                            value="{{ $xe->HinhAnh }}">
                        <label class="custom-file-label" for="hinhanh">Chọn file</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Loại xe</label>
                        <select class="form-control" name="MaLoaiXe">
                            @foreach ($loaixes as $loaixe)
                                <option value="{{ $loaixe->MaLoaiXe }}"
                                    {{ $loaixe->MaLoaiXe == $xe->MaLoaiXe ? 'selected' : '' }}>
                                    {{ $loaixe->SoCho }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="Active"
                            {{ $xe->Active == 1 ? 'checked' : '' }}>
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="Active"
                            {{ $xe->Active == 0 ? 'checked' : '' }}>
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Xe</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
