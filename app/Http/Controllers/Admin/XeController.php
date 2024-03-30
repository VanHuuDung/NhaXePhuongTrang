<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Xe\XeService;
use App\Models\xe;
use Illuminate\Http\Request;

class XeController extends Controller
{
    protected $xeService;

    public function __construct(XeService $xeService)
    {
        $this->xeService = $xeService;
    }

    public function index()
    {
        return view('admin.xe.list', [
            'title' => 'Danh Sách Xe',
            'xes' => $this->xeService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.xe.add', [
            'title' => 'Thêm Xe Mới',
            'loaixes' => $this->xeService->getLoaiXe()
        ]);
    }

    public function store(Request $request)
    {
        $this->xeService->insert($request);
        return redirect()->back();
    }

    public function show(xe $xe)
    {
        return view('admin.xe.edit', [
            'title' => 'Chỉnh Sửa Xe ' . $xe->TenXe,
            'xe' => $xe,
            'loaixes' => $this->xeService->getLoaiXe()
        ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, xe $xe)
    {
        $result = $this->xeService->update($xe, $request);

        if ($result) {
            return redirect('/admin/xe/list');
        } else {
            return redirect()->back(); 
        }
    }

    public function destroy(Request $request)
    {
        $result = $this->xeService->destroy($request);

        if ($result == true) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Xe Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
