<?php
session_start();
$_SESSION['id']=$_POST['id'];

$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

    //出勤しているか確認する、もししてなかったら刺せない
    $sql = "select kakunin from attendance where human_id = ? and employee_id= (SELECT MAX(employee_id) FROM attendance);";
    $ps = $pdo->prepare($sql);  
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $kakunin = $row['kakunin'];
    }

    if(strcmp($kakunin,"1") !=0){
        header('Location:2_2退勤画面.php');
    }else{

    //退勤情報を入力
    $time=date("H:i:s");

    $sql="update attendance set check_out = ?,kakunin =2,rest_work=? where kakunin = 1 and human_id=?";
    $ps = $pdo->prepare($sql);  
    $ps->bindValue(1,$time,PDO::PARAM_STR);
    $ps->bindValue(2,$_POST['rest'],PDO::PARAM_STR);
    $ps->bindValue(3,$_SESSION['id'],PDO::PARAM_STR);
    $ps->execute();

    header('Location:salary.php');
    }
?>
