<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PhpmailerController extends Controller
{
    public function sendEmail (MailRequest $request) {
        // is method a POST ?
        if($request->isMethod('post')) {


            $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

            try {
                // Server settings
                $mail->SMTPDebug = 0;                                	// Enable verbose debug output
                $mail->isSMTP();                                     	// Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';												// Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                              	// Enable SMTP authentication
                $mail->Username = 'bootieschoolproject@gmail.com';             // SMTP username
                $mail->Password = 'bootieschoolproject2020';              // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('your-email@gmail.com', 'Mailer');
                $mail->addAddress('his-her-email@gmail.com', $request->input("Name"));	// Add a recipient, Name is optional
                $mail->addReplyTo('your-email@gmail.com', 'Mailer');
                $mail->addCC('his-her-email@gmail.com');
                $mail->addBCC('his-her-email@gmail.com');

                //Attachments (optional)
                // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

                //Content
                $mail->isHTML(true); 																	// Set email format to HTML
                $mail->Subject = $request->input('Subject');
                $mail->Body    = $request->input('Message');						// message

                $mail->send();
                return back()->with('success','Message has been sent!');
            } catch (Exception $e) {
                return back()->with('error',$e->getMessage());
            }
        }
        return view('pages.contact');
    }
}
