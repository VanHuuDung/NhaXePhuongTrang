<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\tuyenXe\TuyenXeService;
use App\Models\tuyenxe;
use Illuminate\Http\Request;

class TuyenXeController extends Controller
{
    protected $tuyenXeService;

    public function __construct(TuyenXeService $tuyenXeService)
    {
        $this->tuyenXeService = $tuyenXeService;
    }

    public function index()
    {
        return view('admin.tuyenxe.list', [
            'title' => 'Danh Sách Tuyến Xe',
            'tuyenxes' => $this->tuyenXeService->getAll()
        ]);
    }

    public function create()
    {

        return view('admin.tuyenxe.add', [
            'title' => 'Thêm Tuyến Xe Mới',
            'diadiems' => $this -> tuyenXeService -> getDiaDiem()
        ]);
    }

    public function store(Request $request)
    {
        $this->tuyenXeService->insert($request);
        return redirect()->back();
    }

    public function show(tuyenxe $tuyenXe)
    {
        return view('admin.tuyenxe.edit', [
            'title' => 'Chỉnh Sửa Tuyến Xe ' . $tuyenXe->TenTuyen,
            'tuyenxe' => $tuyenXe,
            'diadiems' => $this -> tuyenXeService -> getDiaDiem()
        ]);
    }

    public function update(Request $request, tuyenxe $tuyenXe)
    {
        $result = $this->tuyenXeService->update($tuyenXe, $request);
        if ($result) {
            return redirect('/admin/tuyenxe/list');
        } else {
            return redirect()->back(); 
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->tuyenXeService->destroy($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Tuyến Xe Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
