<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Mail\Mailable;

class EmailController extends Controller
{
    public function showForm()
    {
        return view('email');
    }

    private function sendOtpEmail($email, $otp)
    {
        $mail = new PHPMailer(true);

        try {
            // Cấu hình SMTP và gửi email giống như bước trước
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.elasticemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vanhau98.nhd@gmail.com';
            $mail->Password = '5C7E9891E430D9493C191F8321CD8DABB058';
            // $mail->SMTPSecure = 'tls'; // ssl or tls
            $mail->Port = 2525; // Check the port used by your SMTP server

            //Recipients
            $mail->setFrom('vanhau98.nhd@gmail.com', 'haudeptrai');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Subject Here';
            $mail->Body = 'Your OTP Code is: ' . $otp;

            // $mail->Body = view('otp')->with(['otp' => $this->otp])->render();
        //     $mail->Body    = 'Xin chào,<br/>
        //     Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.<br/>
        //     Nhập mã đặt lại mật khẩu sau đây: <b>'.$this->otp.'</b>';
        //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function processForm(Request $request)
    {

        $email = $request->input('email');
        $otp = $this->generateOtp(); // Thay thế hàm này bằng logic tạo mã OTP của bạn
        $request->session()->put('otp', $otp);

        if ($this->sendOtpEmail($email, $otp)) {
            return redirect('/verify-otp')->with('success', 'Mã OTP đã được gửi đến email của bạn.');
        } else {
            return redirect()->route('form')->with('error', 'Failed to send OTP');
        }

        // $request->validate([
        //     'email' => 'required|email',
        // ]);
    
        // $email = $request->input('email');
        // $otp = $this->generateOtp();
    
        // // Gửi mã OTP qua email
        // Mail::to($email)->send(new OtpMail($otp));
    
        // // Lưu trữ mã OTP trong Session
        // Session::put('otp', $otp);
    
        // // Thêm logic xử lý sau khi gửi mã OTP
    
        // return redirect('/verify-otp')->with('success', 'Mã OTP đã được gửi đến email của bạn.');
    }
    

    private function generateOtp($length = 6)
    {
        $characters = '0123456789';
        $otp = '';

        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $otp;
    }

    public function showOtpForm()
    {
        return view('verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $userEnteredOtp = $request->input('otp');
        $storedOtp = $request->session()->get('otp');

        if ($userEnteredOtp == $storedOtp) {
            // Mã OTP khớp
            return redirect('/chuyenxetheotuyen/6');
        } else {
            // Mã OTP không khớp
            return redirect('/verify-otp')->with('error', 'Mã OTP không đúng. Vui lòng thử lại.');
        }
    }
}