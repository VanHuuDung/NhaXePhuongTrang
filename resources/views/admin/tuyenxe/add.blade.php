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
                        <label for="ten_tuyen">Tên Tuyến Xe</label>
                        <input required type="text" name="TenTuyen" value="{{ old('TenTuyen') }}" class="form-control" placeholder="Nhập tên Tuyến Xe">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Điểm Xuất Phát</label>
                        <select class="form-control" name="DiemXuatPhat">
                            @foreach($diadiems as $diadiem)
                                <option value="{{ $diadiem->MaDiaDiem }}">{{ $diadiem->TenDiaDiem }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diem_den">Điểm Đến</label>
                        <select class="form-control" name="DiemDen">
                            @foreach($diadiems as $diadiem)
                                <option value="{{ $diadiem->MaDiaDiem }}">{{ $diadiem->TenDiaDiem }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tong_thoi_gian">Tổng Thời Gian</label>
                        <input required type="text" name="TongThoiGian" value="{{ old('TongThoiGian') }}" class="form-control" placeholder="Nhập tổng thời gian">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gia">Giá</label>
                        <input required type="text" name="Gia" value="{{ old('Gia') }}" class="form-control" placeholder="Nhập giá">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Tuyến Xe</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
