<?php
//1. Khai báo tài khoản
define('__smtp_gmail_account', 'abc@gmail.com'); // địa chỉ email: tốt nhất là tạo mới 1 cái gmail
define('__smtp_gmail_passwd', 'password ....'); // pass đăng nhập tài khoản gmail vừa tạo
define('__smtp_gmail_from_email', 'admin@snvn.net'); // địa chỉ email người gửi
define('__smtp_gmail_reply_to_email', 'admin@snvn.net'); // địa chỉ email khi người nhận bấm nút reply 
 
//2. cho hàm này vào thư viện
function Send_email_via_smtp_gmail($subject, $to, $content, $cc = array(), $bcc = array(), $from = null, $debug = 0) {
        $res = array('code' => 0, 'msg' => '');
        if (empty($to)) {
            $res['msg'] = 'Error: Email to ???';
            return $res;
        }

        if (empty($subject)) {
            $res['msg'] = 'Error: Subject empty';
            return $res;
        }
        if (empty($content)) {
            $res['msg'] = 'Error: Content empty';
            return $res;
        }

        require_once 'phpmailer/PHPMailerAutoload.php';


        $mail = new \PHPMailer();
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = $debug;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = "ssl://smtp.gmail.com";
        //Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 465;
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );


        //Username to use for SMTP authentication
        $mail->Username = __smtp_gmail_account;
        //Password to use for SMTP authentication
        $mail->Password = __smtp_gmail_passwd;
        //Set who the message is to be sent from
        if (empty($from))
            $mail->setFrom(__smtp_gmail_from_email, $subject);
        else
            $mail->setFrom($from, $subject);
        //Set an alternative reply-to address

        if (empty($reply))
            $mail->addReplyTo(__smtp_gmail_reply_to_email, $subject);
        else
            $mail->addReplyTo($reply, $subject);

        //Set who the message is to be sent to
        $mail->addAddress($to, 'Kính gửi: ');
        $strCC = '';
        $strBCC = '';
        // add cc
        if (count($cc) > 0) {
            foreach ($cc as $itemMailAdd) {
                $mail->addCC($itemMailAdd);
                $strCC .=$itemMailAdd . ', ';
            }
        }
        // add bcc
        if (count($bcc) > 0) {
            foreach ($bcc as $itemMailAdd) {
                $mail->addBCC($itemMailAdd);
                $strBCC .=$itemMailAdd . ', ';
            }
        }


        //Set the subject line
        $mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($content);
//        $mail->msgHTML($content, __root_path.'/static');
        //Replace the plain text body with one created manually
        $mail->AltBody = 'Đặt hàng';
        //Attach an image file
//        $mail->addAttachment('a.png');
        //send the message, check for errors
        if (!$mail->send()) {
            $res['msg'] = 'Send mail error. Contact admin ...';
            $res['code'] = 0;
            return $res;
        } else {
            $res['msg'] = 'Email sent ok!';
            $res['code'] = 1;
            return $res;
        }
    }

//3. Chỗ nào cần gửi mail thì viết đoạn code dưới đây

$subject ='Tiêu đề thư nhập ở đây';
$to = 'Địa chỉ email người nhận';
$content = "Nội dung thư gửi đi: <b> có thể viết thẻ html cho đẹp </b> ";
$from ='admin@snvn.net';


// hàm gửi mail sẽ trả về kết quả là 1 mảng gồm 2 thành phần: code và msg.
$sendMail = Send_email_via_smtp_gmail($subject, $to, $content, array(), array(), $from, 0);

    if ($sendMail['code'] == 1) {
        // gui mail thanh cong
        echo "<br>\nGui mail thanh cong: $to " .$sendMail['msg'];
        
    } else {
        echo "<br>\nLoi gui mail: " . $sendMail['msg'];
    } 
}


