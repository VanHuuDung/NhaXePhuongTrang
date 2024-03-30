@extends('main')
@section('content')
<h1>Xác Thực OTP</h1>

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<form method="post" action="{{ url('/verify-otp') }}">
    @csrf
    <label for="otp">Nhập mã OTP:</label>
    <input type="text" id="otp" name="otp" required>
    <button type="submit">Xác Thực</button>
</form>

@endsection