@extends('admin.main')
@section('content')
    <form method="post" enctype="multipart/form-data" class="w-50 m-auto">
        <div style="margin-top:20px; margin-left: -10px;" class="form-group">   
            <div class="col-md-10">
                <label for="name" class="form-label">Tuyến Xe</label>
                <select class="form-control" name="MaTuyen" id="MaTuyen">
                    <option value="">Chọn Tuyến</option>
                    
                    @foreach($tuyenxe as $key)
                        <option value="{{$key->MaTuyen}}">{{$key->TenTuyen}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div style="margin-top:20px; margin-left: -10px;" class="form-group">   
            <div class="col-md-10">
                <label for="name" class="form-label">Ngày Xuất Phát</label>
                <input type="datetime-local" class="form-control" id="NgayXuatPhat" name="NgayXuatPhat"  min="2000-01-01" />
            </div>
        </div>
        <div style="margin-top:20px; margin-left: -10px;" class="form-group">   
            <div class="col-md-10">
                <label for="name" class="form-label">Xe</label>
                <select class="form-control" name="Maxe" id="Maxe">
                    <option value="">Chọn Xe</option>
                    @foreach($xe as $key)
                        <option value="{{$key->MaXe}}">{{$key->TenXe}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div style="margin-top:20px; margin-left: -10px;" class="form-group">   
            <div class="col-md-10">
                <label for="name" class="form-label">Tài Xế</label>
                <select class="form-control" name="MaTaiXe" id="MaTaiXe">
                    <option value="">Chọn Tài Xế</option>
                    @foreach($taixe as $key)
                        <option value="{{$key->MaTaiXe}}">{{$key->TenTaiXe}}</option>
                    @endforeach
                </select>
            </div>  
        </div>
        <div style="margin-top:20px; margin-left: -10px;" class="form-group">   
            <div class="col-md-10">
                <label for="name" class="form-label">Ngày Lễ</label>
                <select class="form-control" name="MaNgayLe" id="MaNgayle">
                    <option value="">Chọn Ngày Lễ</option>
                    @foreach($ngayle as $key)
                        <option value="{{$key->Id}}">{{$key->TenNgayLe}}</option>
                    @endforeach
                </select>
            </div>  
        </div>
        <button style="margin-bottom: 20px;" type="submit" name="submit" value="Submit" class="btn btn-primary">Thêm chuyến xe</button>
        @csrf
    </form>
@endsection