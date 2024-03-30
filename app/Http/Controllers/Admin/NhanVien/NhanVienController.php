<?php

namespace App\Http\Controllers\Admin\NhanVien;

use App\Http\Controllers\Controller;
use App\Http\Services\NhanVien\NhanVienService;
use App\Models\nhanvien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    protected $nhanvienservice;
     public function __construct(NhanVienService $nhanvienservice){
        $this->nhanvienservice = $nhanvienservice;
      }
    public function index(){
        return view('admin.nhanvien.list',[
            'title'=>'Trang Quản Trị',
            'users'=> $this->nhanvienservice->getAll()
        ]);;
        //echo "Main Admin View";
    }
    public function create()
    {
       return view('admin.nhanvien.add',[
        'title'=>'Thêm Người Dùng Mới',
        'quyens'=> $this->nhanvienservice->getQuyen()
      ]);
    }

   
    public function store(Request $request)
    {
        $this->nhanvienservice->insert($request);
        return redirect()->back();
       
    }

   
    public function show(nhanvien $user)
    {
        return view('admin.nhanvien.edit',[
            'title'=>'Chỉnh Sửa Người Dùng '. $user->HoTen,
            'user'=> $user,
            'quyens'=> $this->nhanvienservice->getQuyen()
      ]);
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, nhanvien $user)
    {
        $result= $this->nhanvienservice->update($request,$user);  
        if($result)
        {
            return redirect('/admin/nhanvien/list');
        }
        else{
            return redirect()->back(); 
        }   
    }

    
    public function destroy(Request $request)
    {
        $result = $this->nhanvienservice->destroy($request);
        if($result==true){
           return response()->json([
              'error' => false,
              'message' => 'Xoá User Thành Công'
           ]);
        }
        return response()->json([
         'error' => true
         ]);
    }
}
