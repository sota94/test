<?php 
session_start();
$yaku_id = 0;
$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');
$id = $_POST['id'];
    $sql="select position_id from human where human_id = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$id,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $yaku_id=$row['position_id'];
    }
    $yaku_id."<br>";
    $sql="select administrator from positions where position_id=?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$yaku_id,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
     $kanri = $row['administrator'];
    }
    

    if($kanri != 1){
        header('Location:1_1メニュー.php');
        
    }else{

    $sql="select * from human where human_id = ?and human_pass = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$id,PDO::PARAM_STR);
    $ps->bindValue(2,$_POST['pass'],PDO::PARAM_STR);
    $ps->execute();
    $searchArray=$ps->fetchAll();
    foreach($searchArray as $row){
        $_SESSION['userid'] = $row['human_id'];
        $_SESSION['userpass'] = $row['human_pass'];
        header('Location:3_1管理者メニュー.php');
    }
}

    if(count($searchArray)==0){
        header('Location:ログイン.php');
    }
    
?>

