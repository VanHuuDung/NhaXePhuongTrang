@extends('admin.main')
@section('content')
<table class="table">
        <thead>
        <tr>
            <th>Mã Vé</th>
            <th>Tuyến Xe</th>
            <th>Ghế</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
            @foreach($chitietdatve as $key => $ve)
            <tr>
                <td>{{ $ve->MaDatVe }}</td>
                <td>{{ $ve->Tuyen }}</td>
                <td>{{ $ve->MaGhe }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection