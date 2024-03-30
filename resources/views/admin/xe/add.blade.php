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
                        <input required type="text" name="TenXe" value="{{ old('TenXe') }}" class="form-control"
                            placeholder="Nhập tên xe">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Biển Số Xe</label>
                        <input required type="text" name="BienSoXe" value="{{ old('BienSoXe') }}" class="form-control"
                            placeholder="Nhập biển số xe">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>hình ảnh xe</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="HinhAnh" id="file">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Loại xe</label>
                        <select class="form-control" name="MaLoaiXe">
                            @foreach ($loaixes as $loaixe)
                                <option value="{{ $loaixe->MaLoaiXe }}">{{ $loaixe->SoCho }} chỗ</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Kích Hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="Active"
                            checked="">
                        <label for="active" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="Active">
                        <label for="no_active" class="custom-control-label">Không</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Xe</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
