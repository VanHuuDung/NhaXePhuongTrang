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
                        <label for="ten_tuyen">Tên Tuyến</label>
                        <input required type="text" name="ten_tuyen" value="{{ $tuyenxe->TenTuyen }}" class="form-control" placeholder="Nhập tên tuyến xe">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diem_xuat_phat">Điểm Xuất Phát</label>
                        <select class="form-control" name="diem_xuat_phat">
                            @foreach($diadiems as $diadiem)
                                <option value="{{ $diadiem->MaDiaDiem }}" {{ $diadiem->MaDiaDiem == $tuyenxe->DiemXuatPhat ? 'selected' : '' }}>
                                    {{ $diadiem->TenDiaDiem }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="diem_den">Điểm Đến</label>
                <select class="form-control" name="diem_den">
                    @foreach($diadiems as $diadiem)
                        <option value="{{ $diadiem->MaDiaDiem }}" {{ $diadiem->MaDiaDiem == $tuyenxe->DiemDen ? 'selected' : '' }}>
                            {{ $diadiem->TenDiaDiem }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tong_thoi_gian">Tổng thời gian</label>
                <input required type="text" name="tong_thoi_gian" value="{{ $tuyenxe->TongThoiGian }}" class="form-control" placeholder="Nhập tổng thời gian">
            </div>

            <div class="form-group">
                <label for="gia">Giá</label>
                <input required type="text" name="gia" value="{{ $tuyenxe->Gia }}" class="form-control" placeholder="Nhập giá">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Tuyến Xe</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
