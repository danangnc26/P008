<?php
require dirname(__FILE__).DIRECTORY_SEPARATOR.'class/plugin/PHPMailer-master/PHPMailerAutoload.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'route.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';

$mail = new PHPMailer;

$surat = new SuratMasuk();
$data1 = $surat->findSuratMasuk($_GET['id_surat']);
$data2 = $surat->raw("SELECT tbl_penerima.email, tbl_penerima.nama, tbl_pivot_surat_penerima.id_surat_masuk, tbl_penerima.id_penerima FROM tbl_pivot_surat_penerima INNER JOIN tbl_penerima ON tbl_pivot_surat_penerima.id_penerima = tbl_penerima.id_penerima where tbl_pivot_surat_penerima.id_surat_masuk = '".$_GET['id_surat']."'");
$data3 = $surat->raw("SELECT * FROM tbl_lampiran where id_surat_masuk='".$_GET['id_surat']."'");
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();
	$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                                         // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mailsystem.sisidi@gmail.com';                 // SMTP username
$mail->Password = 'sisidi123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mailsystem.sisidi@gmail.com', 'Mail System SISIDI');
// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->addAddress('enncce@gmail.com', 'Joe User');     // Add a recipient
if($data1 == null){

}else{
	foreach ($data1 as $key1 => $value1) {
		$mail->addAddress('mailsystem.sisidi@gmail.com');
		$pen = [];
		if($data2 == null){
		}else{
			foreach ($data2 as $key2 => $value2) {
				$mail->addCC($value2['email']);
				$pen[] = '- '.$value2['nama'];
			}
		}

		$mail->addAttachment(dirname(__DIR__).DIRECTORY_SEPARATOR.'public/lembar_disposisi/'.str_replace('/', '_', $value1['no_agenda']).'.pdf');
		if($data3 == null){
		}else{
			foreach ($data3 as $key3 => $value3) {
				$mail->addAttachment(dirname(__DIR__).DIRECTORY_SEPARATOR.'public/lampiran/'.$value3['nama_lampiran']);
			}
		}

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Disposisi No. Agenda : '.$value1['no_agenda'];
		$mail->Body    = 'Kepada Yth. <br><br>'.implode('<br>', $pen).' <br><br>ditempat. <p>Berikut terlampir surat masuk dan lembar disposisi</p>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	}
}

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    // echo 'Message has been sent';
    return true;
}