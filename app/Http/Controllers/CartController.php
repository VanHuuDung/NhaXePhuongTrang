<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\tuyenxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {    
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $chuyenxes = $this->cartService->getChuyenXe();
        // dd($chuyenxes);
        //dd(session('lifetime'));
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'chuyenxes' => $chuyenxes,
            'carts' => Session::get('carts')
        ]);
    }

    // public function update(Request $request)
    // {
    //     $this->cartService->update($request);

    //     return redirect('/carts');
    // }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }
    public function payment(Request $request)
    {
        $result = $this->cartService->payment($request);
        if ($result === false) {    
            Session::flash("Thanh Toán Thất Bại!!");
            return redirect()->back();
        }
       

        //return redirect('/trangchu');
        return view('success');
            
    
    }

    // public function addCart(Request $request)
    // {
    //     $this->cartService->addCart($request);

    //     return redirect()->back();
    // }
}
