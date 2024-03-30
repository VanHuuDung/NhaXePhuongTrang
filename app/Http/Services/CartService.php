<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\chitietdatve;
use App\Models\chuyenxe;
use App\Models\datve;
use App\Models\khachhang;
use App\Models\ngayle;
use App\Models\nhanvien;
use App\Models\Product;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CartService
{
    public function create($request)
    {
        // dd($request->all());
        $dsghengoi= $request->input('selected_seats');//array("A01","B02","C03") ;
        $chuyenxe_id = (int)$request->input('machuyenxe');
        $chuyenxe = chuyenxe::where('MaChuyenXe', $chuyenxe_id)->with('tuyenxe')
                     ->with('xe')
                     ->with('taixe')
                     ->first();
        $giatang = 0;
        $date = ngayle::where('Ngay','=', $chuyenxe->NgayXuatPhat)->first();
        if($date){
            $giatang = $date->GiaTang;
        }
        if ($dsghengoi == [] || $chuyenxe_id <= 0) {
            Session::flash('error', 'Chưa chọn ghế hoặc chuyến xe không chính xác');
            return false;
        }
    
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                 $chuyenxe_id =>[
                    'tuyenxe' => $chuyenxe->tuyenxe->TenTuyen,
                    'ngayxuatphat'=>$chuyenxe->NgayXuatPhat,
                    'tongthoigian'=>$chuyenxe->tuyenxe->TongThoiGian,
                    'biensoxe'=>$chuyenxe->xe->BienSoXe,
                    'taixe'=>$chuyenxe->taixe->TenTaiXe,
                    'dsghe' => $dsghengoi,
                    'gia'=>$chuyenxe->tuyenxe->Gia + $giatang
                ]     
            ]);
            return true;
        }
        $exists = Arr::exists($carts, $chuyenxe_id);
        if ($exists) {
            $carts[$chuyenxe_id]['dsghe'] = Arr::collapse([$carts[$chuyenxe_id]['dsghe'] , $dsghengoi]);
            Session::put('carts', $carts);
            // Session::put('carts.7.dsghe', $dsghengoi);
            return true;
        }
    
        $carts[$chuyenxe_id] = 
        [
            'tuyenxe' => $chuyenxe->tuyenxe->TenTuyen,
            'ngayxuatphat'=>$chuyenxe->NgayXuatPhat,
            'tongthoigian'=>$chuyenxe->tuyenxe->TongThoiGian,
            'biensoxe'=>$chuyenxe->xe->BienSoXe,
            'taixe'=>$chuyenxe->taixe->TenTaiXe,
            'dsghe' => $dsghengoi,
            'gia'=>$chuyenxe->tuyenxe->Gia + $giatang
        ];
        Session::put('carts', $carts);
        return true;
    }
    
    // public function create($request)
    // {
    //     // dd($request->all());
    //     $dsghengoi= $request->input('selected_seats');//array("A01","B02","C03") ;
    //     $chuyenxe_id = (int)$request->input('machuyenxe');
    //     $chuyenxe = chuyenxe::where('MaChuyenXe', $chuyenxe_id)->with('tuyenxe')
    //                  ->with('xe')
    //                  ->with('taixe')
    //                  ->first();
    //     $giatang = 0;
    //     $date = Carbon::createFromFormat('Y-m-d H:i:s', $chuyenxe->NgayXuatPhat);
    //     $date1 = ngayle::whereDay('Ngay', $date->day)
    //         ->whereMonth('Ngay', $date->month)
    //         ->get()
    //         ->first();
    //     if($date1){
    //         $giatang = $date1->GiaTang;
    //     }
    //     if ($dsghengoi == [] || $chuyenxe_id <= 0) {
    //         Session::flash('error', 'Chưa chọn ghế hoặc chuyến xe không chính xác');
    //         return false;
    //     }
    
    //     $carts = Session::get('carts');
    //     if (is_null($carts)) {
    //         Session::put('carts', [
    //              $chuyenxe_id =>[
    //                 'tuyenxe' => $chuyenxe->tuyenxe->TenTuyen,
    //                 'ngayxuatphat'=>$chuyenxe->NgayXuatPhat,
    //                 'tongthoigian'=>$chuyenxe->tuyenxe->TongThoiGian,
    //                 'biensoxe'=>$chuyenxe->xe->BienSoXe,
    //                 'taixe'=>$chuyenxe->taixe->TenTaiXe,
    //                 'dsghe' => $dsghengoi,
    //                 'gia'=>$chuyenxe->tuyenxe->Gia + $giatang
    //             ]     
    //         ]);
    //         return true;
    //     }
    //     $exists = Arr::exists($carts, $chuyenxe_id);
    //     if ($exists) {
    //         $carts[$chuyenxe_id]['dsghe'] = Arr::collapse([$carts[$chuyenxe_id]['dsghe'] , $dsghengoi]);
    //         Session::put('carts', $carts);
    //         // Session::put('carts.7.dsghe', $dsghengoi);
    //         return true;
    //     }
    
    //     $carts[$chuyenxe_id] = 
    //     [
    //         'tuyenxe' => $chuyenxe->tuyenxe->TenTuyen,
    //         'ngayxuatphat'=>$chuyenxe->NgayXuatPhat,
    //         'tongthoigian'=>$chuyenxe->tuyenxe->TongThoiGian,
    //         'biensoxe'=>$chuyenxe->xe->BienSoXe,
    //         'taixe'=>$chuyenxe->taixe->TenTaiXe,
    //         'dsghe' => $dsghengoi,
    //         'gia'=>$chuyenxe->tuyenxe->Gia + $giatang
    //     ];
    //     Session::put('carts', $carts);
    //     return true;
    // }
    public function getChuyenXe()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $chuyenxeid = array_keys($carts);
        
        return chuyenxe::select('MaChuyenXe')
                ->whereIn('MaChuyenXe', $chuyenxeid)
                ->get();
    }


    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]); 

        Session::put('carts', $carts);
        return true;
    }



    private function sendOtpEmail($email, $dataArray)
    {
        $mail = new PHPMailer(true);
        $mail ->CharSet='UTF-8';

        try {

            $htmlBody = '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f4f4f4; border-radius: 10px;">';
            $htmlBody .= '<h2 style="color: #333; text-align: center;">Chi tiết chuyến xe</h2>';
    
            foreach ($dataArray as $chuyenXeId => $details) {
                $htmlBody .= '<div style="border: 1px solid #ccc; margin-bottom: 20px; padding: 10px; background-color: #fff; border-radius: 5px;">';
                $htmlBody .= '<h3 style="color: #555; margin-bottom: 10px;">Chuyến xe #' . $chuyenXeId . '</h3>';
                $htmlBody .= '<ul style="list-style: none; padding: 0;">';
    
                foreach ($details['dsghe'] as $ghe) {
                    $htmlBody .= '<li style="margin-bottom: 5px;"><span style="color: #777; font-weight: bold;">Ghế:</span> ' . $ghe . '</li>';
                }
    
                $htmlBody .= '</ul>';
                $htmlBody .= '</div>';
            }
    
            $htmlBody .= '</div>';
    
            // $htmlBody = '<h1>Thông tin đặt vé của bạn</h1>';

            // foreach ($dataArray as $chuyenXeId => $details) {
            //     $htmlBody .= '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">';
            //     $htmlBody .= '<h3>Chuyến xe #' . $chuyenXeId . '</h3>';
            //     $htmlBody .= '<ul>';
            //     foreach ($details['dsghe'] as $ghe) {
            //         $htmlBody .= '<li>' .'Mã Ghế' . $ghe . '</li>';
            //     }
            //     $htmlBody .= '</ul>';
            //     $htmlBody .= '</div>';
            // }

            // Cấu hình SMTP và gửi email giống như bước trước
            //Server settings

            // $mail->isSMTP();
            // $mail->Host = 'smtp.elasticemail.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'vanhau98.nhd@gmail.com';
            // $mail->Password = '5C7E9891E430D9493C191F8321CD8DABB058';
            // // $mail->SMTPSecure = 'tls'; // ssl or tls
            // $mail->Port = 2525; // Check the port used by your SMTP server

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'satthuhaohoatai@gmail.com';
            $mail->Password = 'djum oqaw hsvx wntl';
            // $mail->SMTPSecure = 'tls'; // ssl or tls
            $mail->Port = 587; // Check the port used by your SMTP server

            //Recipients
            $mail->setFrom('vanhau98.nhd@gmail.com', 'Phuong Trang');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Đặt Vé';
            $mail->Body = 'Thông tin đặt vé của bạn: ' . $htmlBody;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // public function processForm($request)
    // {

    //     $email = $request->input('email');
    //     $request->session()->put('otp', $otp);

    //     if ($this->sendOtpEmail($email, $otp)) {
    //         return redirect('/verify-otp')->with('success', 'Mã OTP đã được gửi đến email của bạn.');
    //     } else {
    //         return redirect()->route('form')->with('error', 'Failed to send OTP');
    //     }

    // }

    public function payment($request)
    {
        $dataArray = [];
        //lấy thông tin đơn hàng trong carts
        $carts = Session::get('carts');
        //kiểm tra khách hàng 
        $check = khachhang::where('Email','=', $request->email)->first();
        if($check){
            $id_khachhang = $check->MaKhachHang;
            // Session::flash('error','Đã tồn tại email này !!');
            // return redirect()->back();
        }
        else{
            //tạo một khách hàng mới 
            $user = new khachhang() ;
            $user->TenKhachHang = $request->name;
            $user->Password = "";
            $user->Email = $request->email;
            $user->Active = 1;
            $user->save();
            $id_khachhang = $user->MaKhachHang;
        }
        
            //tạo vé
            $newVe = new datve();
            $newVe -> NgayDat = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
            $newVe -> MaKhachHang = $id_khachhang;
            //tổng tiền sau khi thực hiện thêm chitietdatve
            $newVe -> TongTien = $request->tongtien ;
            $newVe -> save();
    
            $maDatVe = $newVe -> MaDatVe;
            //lấy thông tin của các id chuyến xe trong giỏ hàng
            $chuyenxeids = array_keys($carts);

        foreach( $chuyenxeids as $chuyenxeid)
        {
            //thêm chitietdatve
            foreach($carts[$chuyenxeid]['dsghe'] as $dsghe)
            {
                $chitietdatve = new chitietdatve();
                $chitietdatve -> MaChuyenXe = $chuyenxeid;
                $chitietdatve -> MaDatVe = $maDatVe;
                $chitietdatve -> MaGhe = $dsghe;
                $chitietdatve -> save();
                
            }
            $chuyen = chuyenxe::where('MaChuyenXe', $chuyenxeid)->with('tuyenxe')->first();
            $dataArray[$chuyen->tuyenxe->TenTuyen] = ['dsghe' => $carts[$chuyenxeid]['dsghe']];
            
        }
        $this->sendOtpEmail($request->email, $dataArray);
        session()->forget('carts');
        session()->flush();
        
        
        return true;
    }
}