<?php
session_start();


$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');
    $manth = date('m');
    $total_time = date("Y/m/d");
    $sum = 0;//勤務時間(秒、休憩時間は引いている)
    $minutes_kyukei = 0;
    $wage_time = 0;
    $total_subtraction = 0;
    $total = 0;
    $wage_id = 0;

    //今回の勤務の時間を求める
    $sql="select check_in ,check_out ,rest_work from attendance 
        where human_id=? and kakunin = 2 and date_format(hiniti,'%m')=? and employee_id= (SELECT MAX(employee_id) FROM attendance); ";//出勤時間と退勤時間を持ってくる
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(2,$manth,PDO::PARAM_STR);
    $ps->execute();
    $time=0;

   foreach($ps as $row){
    $start_time=($row['check_in']);
    $end_time=($row['check_out']);
    $kyukei =($row['rest_work']); //休憩時間
  
    // 1つ目の時刻
    $timestamp = strtotime($start_time);

    // 2つ目の時刻
    $timestamp2 = strtotime($end_time);

    // 2つの時刻の差を計算
    $time = $timestamp2 - $timestamp;

    //時間に変換
    $hours = floor( $time / 3600 )."<br>";
    //分に変換
     $minutes = floor( ( $time / 60 ) )."<br>";

   }
    
    //↓ここで退勤データベースに全部の情報を上書き
    $minutes_int=(int)$minutes; //intに変換

    $sql="update attendance set sum_time = ? where kakunin = 2 and human_id=? and employee_id= (SELECT MAX(employee_id) FROM attendance); ";
    $ps = $pdo->prepare($sql);  
    $ps->bindValue(1,$minutes_int,PDO::PARAM_STR);
    $ps->bindValue(2,$_SESSION['id'],PDO::PARAM_STR);
    $ps->execute(); 


    //時給をとってくる
    $sql="select position_id from human where human_id = ?";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
    $position_id = $row['position_id'];
    }
    $sql="select hourly_wage from positions where position_id = ?";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$position_id,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $wage = $row['hourly_wage']; //時給
    }
    $wage1 = $wage; //一時間の時給
    $wage = floor($wage / 60); //一分あたりの時給   

    //勤務日数を計算する
    $sql = "select count(*) from attendance where human_id = ? and date_format(hiniti,'%m')=?";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(2,$manth,PDO::PARAM_STR);
    $ps->execute();
    foreach($ps as $row){
        $days = $row[0]; //勤務日数
    }
    
    //wageの前データをとってくる
    $sql="select * from wage where human_id = ? and date_format(hiniti,'%m')=?";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(2,$manth,PDO::PARAM_STR);
    $ps->execute();

    foreach($ps as $row){
        $wage_id = $row['human_id'];
        $wage_time = $row['wage_time']; 
        $total_wage = $row['total_wage'];
        $total_subtraction = $row['total_subtraction'];
        $total = $row['total'];       
    }
    //給料計算をする
    $wage_time1 = (int)$wage_time + $minutes_int."<br>"; //分時間合計
    $wage_time1_int = (int)$wage_time1; //int

    $total_wage1 = (int)$wage_time1 * $wage."<br>"; //総支給額
    $total_wage1_int =(int)$total_wage1; //int

    $total_subtraction1 = $total_subtraction + $kyukei;//差引額

    $total1 = $total+((int)$minutes_int*$wage)-((int)$total_subtraction1*$wage); //トータル金額

    if($wage_id != 0){
    $sql="update wage set human_id=?,days=?,wage_time=?,hourly_wage=?,total_wage=?,total_subtraction=?,total=?,hiniti=?
            where human_id = ? and date_format(hiniti,'%m')=?";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(2,$days,PDO::PARAM_STR);
    $ps->bindValue(3,$wage_time1_int,PDO::PARAM_STR);
    $ps->bindValue(4,$wage1,PDO::PARAM_STR);
    $ps->bindValue(5,$total_wage1_int,PDO::PARAM_STR);
    $ps->bindValue(6,$total_subtraction1,PDO::PARAM_STR);
    $ps->bindValue(7,$total1,PDO::PARAM_STR);
    $ps->bindValue(8,$total_time,PDO::PARAM_STR);
    $ps->bindValue(9,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(10,$manth,PDO::PARAM_STR);
    $ps->execute();

    }else{
    $sql="insert into wage(human_id,days,wage_time,hourly_wage,total_wage,total_subtraction,total,hiniti)
                value(?,?,?,?,?,?,?,?)";
    $ps = $pdo->prepare($sql); 
    $ps->bindValue(1,$_SESSION['id'],PDO::PARAM_STR);
    $ps->bindValue(2,$days,PDO::PARAM_STR);
    $ps->bindValue(3,$wage_time1_int,PDO::PARAM_STR);
    $ps->bindValue(4,$wage1,PDO::PARAM_STR);
    $ps->bindValue(5,$total_wage1_int,PDO::PARAM_STR);
    $ps->bindValue(6,$total_subtraction1,PDO::PARAM_STR);
    $ps->bindValue(7,$total1,PDO::PARAM_STR);
    $ps->bindValue(8,$total_time,PDO::PARAM_STR);
    $ps->execute();
    }

    session_destroy();

    header('Location:1_1メニュー.php');
?>