<?php
session_start();
$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');
$name=0;
$id = $_POST['id'];
$stmt=$pdo->prepare("select human_name from human where human_id = ?");
$stmt->bindValue(1,$id, PDO::PARAM_INT);
$stmt->execute();

  foreach($stmt as $row){
    $name = $row['human_name'];
  }
//echo $name;

  if(strcmp($name,0) ==0){
    header('Location:2_1出勤画面.php');
  }else{

  $jikan = date("H:i:s");
  $hiniti = date("Y-m-d");
  $kakunin = "1";

  $sql ="insert into attendance(human_id,human_name,hiniti,check_in,work_predict,kakunin)value(?,?,?,?,?,?)";
  $ps = $pdo->prepare($sql);  
    $ps->bindValue(1,$id,PDO::PARAM_STR);
    $ps->bindValue(2,$name,PDO::PARAM_STR);
    $ps->bindValue(3,$hiniti,PDO::PARAM_STR);
    $ps->bindValue(4,$jikan,PDO::PARAM_STR);
    $ps->bindValue(5,$_POST['yotei'],PDO::PARAM_STR);
    $ps->bindValue(6,$kakunin,PDO::PARAM_STR);
    $ps->execute();

    header('Location:1_1メニュー.php');
  }
?>