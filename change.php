<?php
session_start();
$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

    $sql="select position_name from positions where position_id = ?";
    $ps = $pdo->prepare($sql);
    $yaku_id = $_POST['yaku'];
    $ps->bindValue(1,$yaku_id,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){ //役職の名前
        $_SESSION['yaku_name']=$row['position_name'];
    }

$_SESSION['pass']=$_POST['new_password']; //セッションパスワード

if(strcmp($yaku_id,"役職を選択") ==0){
    header('Location:3_2従業員一覧.php');
}

if(strcmp($_SESSION['pass'],$_POST['confirm_new_password'])!=0){
    header('Location:3_2従業員一覧.php');
}else{
    //echo $_SESSION['id']=$_POST['yaku'];
$sql="update human set human_name=?,human_pass=?,human_email=?,human_address=?,position_id=? where human_id = ?";
        $ps = $pdo->prepare($sql);

        $_SESSION['name']=$_POST['name'];
        $ps->bindValue(1,$_SESSION['name'],PDO::PARAM_STR);

        $ps->bindValue(2,$yaku_id,PDO::PARAM_STR);

        $_SESSION['email']=$_POST['email'];
        $ps->bindValue(3,$_SESSION['email'],PDO::PARAM_STR);

        $_SESSION['addres']=$_POST['addres'];
        $ps->bindValue(4,$_SESSION['addres'],PDO::PARAM_STR);

        $ps->bindValue(5,$yaku_id,PDO::PARAM_STR);

        $ps->bindValue(6,$_SESSION['id'],PDO::PARAM_STR);
        $ps->execute();

        header('Location:従業員情報変更確認画面.php');
}
?>