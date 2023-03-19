<?php
$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

$sql="insert into `positions`(`position_name`, `hourly_wage`,administrator) 
        VALUES(?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$_POST['name'],PDO::PARAM_STR);
        $ps->bindValue(2,$_POST['kyuryou'],PDO::PARAM_STR);
        if(!isset($_POST['sw'])){
            $sw = 2;
        }else{
            $sw =1;
        }
        $ps->bindValue(3,$sw,PDO::PARAM_STR);
        $ps->execute();
        header('Location:3_1管理者メニュー.php');
?>