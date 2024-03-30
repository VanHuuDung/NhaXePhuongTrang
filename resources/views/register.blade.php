
<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-body">
      <p class="login-box-msg">Đăng Ký Người Dùng Mới</p>
      @include('admin.alert')
      <form action="/register/store" method="post">
        <div class="input-group mb-3">
          <input type="text" name="hoten" class="form-control" placeholder="Họ Tên">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>
      <a href="/admin/nhanvien/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  @include('admin.footer')
</body>
</html>
