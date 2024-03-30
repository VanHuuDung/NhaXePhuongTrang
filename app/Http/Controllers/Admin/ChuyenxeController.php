<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Chuyenxe\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\ChuyenXe\ChuyenXeService;
use App\Models\chuyenxe;

class ChuyenxeController extends Controller
{
    protected $chuyenxeservice;
     public function __construct(ChuyenXeService $chuyenxeservice){
        $this->chuyenxeservice = $chuyenxeservice;
    }
    public function index()
    {
        return view('admin.chuyenxe.chuyenxe',[  
            'title'=>'Danh sách chuyến xe',
            'users'=> $this->chuyenxeservice->getAll()
        ]);
    }

    public function create() {
        return view('admin.chuyenxe.addchuyenxe',[
            'title'=>'Thêm chuyến xe',
            'tuyenxe'=>$this->chuyenxeservice->getTuyenXe(),
            'xe'=>$this->chuyenxeservice->getXe(),
            'taixe'=>$this->chuyenxeservice->getTaiXe(),
            'ngayle' => $this->chuyenxeservice->getNgayLe()
        ]);
    }

    public function store(CreateFormRequest $request){
        $result = $this->chuyenxeservice->create($request);

        return redirect()->route('chuyenxe');
    }

    public function show($MaChuyenXe)
    {
        $chuyenxe =  chuyenxe::where('MaChuyenXe', '=', $MaChuyenXe)->select('*')->first();
        return view('/admin/chuyenxe/chuyenxedetail', [
            'title'=>'Chi tiết chuyến xe'
        ],compact('chuyenxe'));
    }

    public function edit($MaChuyenXe)
    {
        $chuyenxe = chuyenxe::find($MaChuyenXe);
        return view('admin.chuyenxe.editchuyenxe', [
            'title' => 'Chỉnh Sửa Chuyến Xe ',
            'chuyenxe' => $chuyenxe,
            'tuyenxe'=>$this->chuyenxeservice->getTuyenXe(),
            'xe'=>$this->chuyenxeservice->getXe(),
            'taixe'=>$this->chuyenxeservice->getTaiXe(),
            'ngayle' => $this->chuyenxeservice->getNgayLe()
        ]);
    }

    public function update(Request $request, $MaChuyenXe)
    {
        $chuyenxe = chuyenxe::find($MaChuyenXe);
        $result = $this->chuyenxeservice -> update($chuyenxe, $request);
        if ($result) {
            return redirect('/admin/chuyenxe/chuyenxe');
        }else {
            return redirect()->back();
        }
    }
    public function destroy(Request $request)
    {
        $result = $this->chuyenxeservice->destroy($request);
        if($result==true){
           return response()->json([
              'error' => false,
              'message' => 'Xoá Chuyến Xe Thành Công'
           ]);
        }
        return response()->json([
         'error' => true
         ]);
    }
    

    public function updateStatus(Request $request)
    {
        $statusData = $request->input('status');

        foreach ($statusData as $maChuyenXe => $status) {
            // Lấy dữ liệu từ CSDL theo $maChuyenXe và cập nhật trạng thái
            $chuyenXe = chuyenxe::find($maChuyenXe);
            $chuyenXe->DaChay = $status;
            $chuyenXe->save();
        }

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành công.');
    }
}
