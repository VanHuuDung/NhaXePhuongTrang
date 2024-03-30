<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\TaiXe\TaiXeService;
use App\Models\taixe;
use Illuminate\Http\Request;

class TaiXeController extends Controller
{
    protected $taixeService;

    public function __construct(TaiXeService $taixeService)
    {
        $this->taixeService = $taixeService;
    }
    public function index()
    {
        return view('admin.taixe.list', [
            'title' => 'Danh sách tài xế',
            'taixes' => $this->taixeService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.taixe.add', [
            'title' => 'Thêm tài xế mới'
        ]);
    }

    public function store(Request $request)
    {
       

        $result = $this->taixeService->insert($request);

        return $result;
    }

    public function show(taixe $taixe)
    {
        return view('admin.taixe.edit', [
            'title' => 'Chỉnh Sửa Tài Xế ' . $taixe->TenTaiXe,
            'user' => $taixe
        ]);
    }

    public function update(Request $request, taixe $taixe)
    {
        $result = $this -> taixeService -> update($taixe, $request);
        if ($result) {
            return redirect('/admin/taixe/list');
        }else {
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $result = $this -> taixeService -> destroy($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Tài Xế Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
