<?php
session_start();
     //役職が選択させていなかったら前の画面に戻る
    $yaku = $_POST['yaku'];
    $_SESSION['pass'] = $_POST['new_password'];
    $pass2 = $_POST['confirm_new_password'];
 
    if(strcmp($yaku,"役職を選択") ==0){
        header('Location:従業員追加画面.php');
    }       

    if(strcmp($_SESSION['pass'],$pass2)!=0){
        header('Location:従業員追加画面.php');
    }else{
        
    //記入された情報をデータベースに登録
    $pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

    $sql="insert into human(human_name,human_pass,human_email,
            human_address,position_id)value(?,?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $_SESSION['name'] =$_POST['name'];
    $ps->bindValue(1,$_SESSION['name'],PDO::PARAM_STR);

        //$_SESSION['pass']=$_POST['new_password'];
    $ps->bindValue(2,$_SESSION['pass'],PDO::PARAM_STR);

        $_SESSION['email']=$_POST['email'];
    $ps->bindValue(3,$_SESSION['email'],PDO::PARAM_STR);

        $_SESSION['addres']=$_POST['addres'];
    $ps->bindValue(4,$_SESSION['addres'],PDO::PARAM_STR);

        $_SESSION['yaku']=$_POST['yaku'];
    $ps->bindValue(5,$_SESSION['yaku'],PDO::PARAM_STR);
    $ps->execute();

    $sql = "select human_id from human where human_name = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_SESSION['name'],PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $_SESSION['id']=$row['human_id'];
    }
    
    $sql = "select position_name, administrator from positions where position_id = ?";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(1,$_SESSION['yaku'],PDO::PARAM_STR);
    $ps->execute(); 
    foreach($ps as $row){
        $_SESSION['position_name']=$row['position_name'];
        $_SESSION['key']=$row['administrator'];
    }
    header('Location:従業員追加確認画面.php');
}

?>