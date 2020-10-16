<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);
try {  
    $name=$_POST['fname'];
    $correo=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $body=$correo."  ".$message;
    //Server settings
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                         
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                
    $mail->Username   = 'testapijavamail@gmail.com';         
    $mail->Password   = 'muevecela04';                       
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      
    $mail->Port       = 587;                                 
    //Recipients
    $mail->setFrom('testapijavamail@gmail.com', 'Diego');
    $mail->addAddress('dambackg@gmail.com',$name);  
    // Content
    $mail->isHTML(true);                              
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->send();
    include("index.html");
    echo '<script language="javascript">alert("Enviado Correctamente");</script>';
    } catch (Exception $e) {
    echo '<script language="javascript">alert("Ocurrio un error");</script>';
    }
 ?>