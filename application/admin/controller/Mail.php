<?php
namespace app\admin\controller;

use PHPMailer\PHPMailer\PHPMailer;
use think\Controller;

class Mail extends Controller
{
    public static  function send($toemail, $subject, $content){
       if (is_array($toemail)) {
           foreach ($toemail as $toemailv){
               $data['email'] = $toemailv;
               $data['status'] = self::sendmail($toemailv, $subject, $content);
               $result[]= $data;
           }
       }else {
           $data['email'] = $toemail;
           $data['status'] = self::sendmail($toemail, $subject, $content);
           $result[]= $data;
       }
       return $result;
    }
    public static function sendmail($toemail,$subject,$content)
    {
        $mail = new PHPMailer();
        $fromemail = 'newxstudio@163.com'; // 定义发件人的邮箱
        // 设置邮件使用SMTP
        $mail->isSMTP();
        // 设置邮件程序以使用SMTP
        $mail->Host = 'smtp.163.com';
        // 设置邮件内容的编码
        $mail->CharSet = 'UTF-8';
        // 启用SMTP验证
        $mail->SMTPAuth = true;
        // SMTP username
        $mail->Username = $fromemail;
        // SMTP password
        $mail->Password = 'wanghe241';
        // 启用TLS加密，`ssl`也被接受
        // $mail->SMTPSecure = 'tls';
        // 连接的TCP端口
        // $mail->Port = 587;
        // 设置发件人
        $mail->setFrom($fromemail, 'NEWX大学生网络文化工作室');
        // 添加收件人
            $mail->addReplyTo($fromemail, 'NEWX大学生网络文化工作室');
            // 抄送
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            // 附件
            // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
            // Content
            // 将电子邮件格式设置为HTML
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;
            $mail->AddAddress($toemail);
            // $mail->AltBody = '这是非HTML邮件客户端的纯文本';
            if(!$mail->Send()){
                return 0;
            }else {
                return 1;
            }
        }
    }
