@extends('main')
@section('content')


@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- <form method="post" action="{{ url('/process-form') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Gửi Mã OTP</button>
</form> -->

<div class="container-fluid" style="padding-bottom: 30px;padding-top: 150px; margin-bottom: 50px;">
    <div class="row">
        <div class="m-auto w-50">
            <form method="post" action="{{ url('/process-form') }}">
            @csrf
                <h2 style="text-align: center;">Form Nhập Email</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your email" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>  
            </form>
        </div>
    </div>
</div>

@endsection