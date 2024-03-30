<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\LoaiXe\LoaiXeService;
use App\Models\loaixe;
use Illuminate\Http\Request;

class LoaiXeController extends Controller
{
    protected $loaiXeService;

    public function __construct(LoaiXeService $loaiXeService)
    {
        $this->loaiXeService = $loaiXeService;
    }
    public function index()
    {
        return view('admin.loaixe.list', [
            'title' => 'Danh sách loại xe',
            'loaixes' => $this->loaiXeService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.loaixe.add', [
            'title' => 'Thêm loại xe mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'SoCho' => 'required|numeric|min:1', // Thêm quy tắc kiểm tra như cần thiết
        ]);

        $result = $this->loaiXeService->insert($request);

        return $result;
    }

    public function show(loaixe $loaixe)
    {
        return view('admin.loaixe.edit', [
            'title' => 'Chỉnh Sửa Tuyến Xe ' . $loaixe->SoCho,
            'loaixe' => $loaixe
        ]);
    }

    public function update(Request $request, loaixe $loaixe)
    {
        $result = $this -> loaiXeService -> update($loaixe, $request);
        if ($result) {
            return redirect('/admin/loai/list');
        }else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this -> loaiXeService -> destroy($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Loại Xe Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
