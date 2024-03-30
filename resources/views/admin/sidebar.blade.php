 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/admin" class="brand-link">
         <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin Trang web bán hàng</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                 @if (session("loginId")->MaQuyen == 1)
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Quản lý nhân viên
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/nhanvien/list" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục nhân viên</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/nhanvien/add" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Thêm nhân viên</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-store-alt"></i>
                             <p> Quản lý chuyến xe
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/chuyenxe/chuyenxe" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục chuyến xe</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/chuyenxe/addchuyenxe" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Thêm chuyến xe</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-images"></i>
                             <p> Quản lý xe
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/xe/list" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục xe</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/xe/add" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Thêm xe</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-store-alt"></i>
                             <p> Quản lý vé xe
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/datve/datve" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục vé xe</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p> Quản lý loại xe
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/loaixe/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục loại xe</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/loaixe/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm loại xe</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p> Quản lý tài xế
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/taixe/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục tài xế</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/taixe/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm tài xế</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-clock"></i>
                            <p> Quản lý ngày lễ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/ngayle/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục ngày lễ</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/ngayle/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm ngày lễ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                 @else
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-store-alt"></i>
                             <p> Quản lý chuyến xe
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/chuyenxe/chuyenxe" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục chuyến xe</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/chuyenxe/addchuyenxe" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Thêm chuyến xe</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon fas fa-images"></i>
                             <p> Quản lý xe
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/xe/list" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Danh mục xe</p>
                                 </a>
                             </li>
                         </ul>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="/admin/xe/add" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Thêm xe</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p> Quản lý Tuyến xe
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/tuyenxe/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục Tuyến xe</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/tuyenxe/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm Tuyến xe</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p> Quản lý loại xe
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/loaixe/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục loại xe</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/loaixe/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm loại xe</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p> Quản lý tài xế
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/taixe/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục tài xế</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/taixe/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm tài xế</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-clock"></i>
                            <p> Quản lý ngày lễ
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/ngayle/list" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh mục ngày lễ</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/ngayle/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm ngày lễ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                 @endif
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
