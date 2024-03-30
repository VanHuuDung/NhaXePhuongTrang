<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        $this->otp = $otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.elasticemail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vanhuudung02@gmail.com';
            $mail->Password = '29C69C241A90FA20FF0D491D52440FE2447B';
            // $mail->SMTPSecure = 'tls'; // ssl or tls
            $mail->Port = 587; // Check the port used by your SMTP server

            //Recipients
            $mail->setFrom('vanhuudung02@gmail.com', 'Phương Trang');
            $mail->addAddress($this->to[0]['address'], $this->to[0]['name']); // To address

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Subject Here';
            $mail->Body = 'Your OTP Code is: ' . $this->otp;

            // $mail->Body = view('otp')->with(['otp' => $this->otp])->render();
        //     $mail->Body    = 'Xin chào,<br/>
        //     Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn.<br/>
        //     Nhập mã đặt lại mật khẩu sau đây: <b>'.$this->otp.'</b>';
        //    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
            // Handle exception
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        // return $this->subject('Mã OTP')->view('otp');
        // return $this->view('view.name');
    }
}
