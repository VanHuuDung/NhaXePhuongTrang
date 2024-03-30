
<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/trangchu">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/nhanvien/login">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/admin/nhanvien/logout">Logout</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/carts">Giỏ Hàng</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->
        <!-- Content Wrapper. Contains page content -->
        
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                @yield('content')  
            </section>
<div style="margin-top: 10px;"  class="bg-dark mt-3 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <h4 class="text-success">0909123456</h4>
                <p style="color: #fff;" class="m-0 mt-3"> <b>Monday - Sunday.</b></p>
            </div>
            <div class="col-sm-6 col-md-4">

                <ul>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">About</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Blog</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Contact</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Sitemap</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-4">

                <ul>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Payment</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Order tracking</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Exchanges & returns</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Delivery</a></li>
                    <li style="margin-bottom: 10px;"><a style="color: #fff;" href="#">Terms & conditions</a></li>
                </ul>
            </div>
            <div style="margin: 0 auto;" class="col-sm-6 col-md-4">

                <form class="row row-cols-lg-auto g-3 align-items-center">
                    <div class="col-12">
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success w-100">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="padding: 20px;"  class="col-12">
        <p  class="text-center text-white py-1 mt-5 bg-secondary">NHÀ XE PHƯƠNG TRANG HÂN HẠNH PHỤC VỤ QUÝ KHÁCH</p>
    </div>
</div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


    </div>
<!-- ./wrapper -->

 @include('footer')
</body>
</html>