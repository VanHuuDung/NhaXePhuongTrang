<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\NgayLe\NgayLeService;
use App\Models\ngayle;
use Illuminate\Http\Request;

class NgayLeController extends Controller
{
    protected $ngayleService;

    public function __construct(NgayLeService $ngayleService)
    {
        $this->ngayleService = $ngayleService;
    }
    public function index()
    {
        return view('admin.ngayle.list', [
            'title' => 'Danh sách ngày lễ',
            'ngayles' => $this->ngayleService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.ngayle.add', [
            'title' => 'Thêm ngày lễ mới'
        ]);
    }

    public function store(Request $request)
    {
       

        $result = $this->ngayleService->insert($request);

        return $result;
    }

    public function show(ngayle $ngayle)
    {
        return view('admin.ngayle.edit', [
            'title' => 'Chỉnh Sửa Ngày Lễ ' . $ngayle->TenNgayLe,
            'user' => $ngayle
        ]);
    }

    public function update(Request $request, ngayle $ngayle)
    {
        $result = $this -> ngayleService -> update($ngayle, $request);
        if ($result) {
            return redirect('/admin/ngayle/list');
        }else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this -> ngayleService -> destroy($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Ngày Lễ Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
