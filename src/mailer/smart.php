<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$test1 = $_POST['sum'];
$test2 = $_POST['time'];
$test3 = $_POST['kind'];
$test4 = $_POST['object'];
$test5 = $_POST['send'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'never_off@list.ru';                 // Наш логин
$mail->Password = '123456';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('never_off@list.ru', 'Займы под залог');   // От кого письмо 
$mail->addAddress('neverov-ph@ya.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Займы под залог недвижимости';
$mail->Body    = '
		<u>Оставлена новая заявка</u> <br><br> 
	<b>Имя:</b> ' . $name . ' <br>
	<b>Номер телефона:</b> ' . $phone . '<br>
	<b>Город:</b> ' . $city . '<br>
	<b>Сумма займа:</b> ' . $test1 .'<br>
	<b>Срок займа:</b> ' . $test2 .'<br>
	<b>Вид займа:</b> ' . $test3 .'<br>
	<b>Объект залога:</b> ' . $test4 .'<br>
	<b>Удобный вид связи:</b> ' . $test5 .'';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>