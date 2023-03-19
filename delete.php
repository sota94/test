<?php
session_start();
echo $id=$_POST['id'];
$wage = 0;
$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

    $sql="select human_id from wage where human_id=? ";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$id,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $wage = $row['human_id'];
    }

    if($wage != 0 ){
        $sql = "DELETE FROM wage WHERE human_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$id,PDO::PARAM_STR);
        $ps->execute();
    }

    $sql="DELETE FROM human WHERE human_id = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$id,PDO::PARAM_STR);
    $ps->execute();

    header('Location:3_1管理者メニュー.php');
?>