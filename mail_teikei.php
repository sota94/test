<?php
session_start();

$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

$sql="select human_email from human where human_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_SESSION['userid'],PDO::PARAM_STR);
        $ps->execute();
    foreach($ps as $row){
        $email = $row['human_email'];
    }

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to = $_SESSION['email'];
$subject = "退勤予定時間を超えている件について";
$message = "お疲れ様です。退勤予定時間が過ぎてますが、どんな状況ですか？退勤忘れなら早めにお願いします。";
$headers = "From: ".$email;
mb_send_mail($to, $subject, $message, $headers); 
header('Location:3_1管理者メニュー.php');
?>