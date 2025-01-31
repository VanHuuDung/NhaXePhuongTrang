
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.head')
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
                        <a class="nav-link" href="/admin/nhanvien/logout">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/carts">Giỏ Hàng</a>
                    </li>
                </ul>
            </div>
        </nav>
    
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
           
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            
            </ul>
        </nav>
        <!-- /.navbar -->
        @include('admin.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">   
                @include('admin.alert')
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- <a class="btn btn-primary btn-sm" href="/admin/nhanvien/logout">
                       Đăng Xuất
                    </a> -->
                    <!-- jquery validation -->
                    <div class="card card-primary mt-3">
                    
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    
                    @yield('content')  
                    </div>
                    <!-- /.card -->
                    </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
<!-- ./wrapper -->
 @include('admin.footer')
</body>
</html>
