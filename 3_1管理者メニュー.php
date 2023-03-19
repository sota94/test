<?php
session_start();
if(isset($_SESSION['userid'])==false ||
    isset($_SESSION['userpass'])==false){
      header('Location:ログイン.php');
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>管理者メニュー</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
    <div class="container-fluid">
      <button class="mt-sm-4 btn btn-outline-light btn-sm" onclick="history.back(-1)">←</button>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample01" style="">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="1_1メニュー.php">メニュー</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="3_2従業員一覧.php">従従業員一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="3_3給与情報.php">給与情報</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="3_4新規役職.php">役職追加</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="3_5従業員削除画面.php">従業員削除</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">ログアウト</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>
      <div class="kanri3_1">
        <h1>現在出勤中従業員</h1>
            <p>---------------------------------------------------</p>
        </div>
            

<?php

$pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');

$sql = "SELECT * FROM attendance WHERE kakunin=1 ORDER BY employee_id;";
$ps = $pdo->query($sql);

    foreach($ps as $row){
      echo      '<div class="container">'.
      //'<div class="row ml-1">'.
      '<div class="ryouhasi">';
      //'<div class="col-5">';
echo       "ID:".$id=$row['human_id'].
'<br>'.'従業員名前:'.$name=$row['human_name'].
'<br>'.'出勤 時間 :'.$syukin=$row['check_in'].
'<br>'.'退勤 予定 :'.$yotei=$row['work_predict'].'<br>';

   $time =date('H:i:s');
  $yotei=$row['work_predict'];
  
  $date1 = new DateTime($yotei);
  $date2 = new DateTime($time);
  if ($date1 < $date2) {
    echo '<br>'."予定退勤時間を超えています";
    $human_id=$row['human_id'];
    echo '<form action="メール送信画面.php" method="POST" >';
      echo  '<button class="btn btn-outline-dark type="hidden" name="id" value="'.$human_id.'"/>メール画面</button>';
      echo '</form>';
  } 
  



echo              '</div>'.
              '</div>'.
             ' <p>----------------------------------------------------</p>'.
            '</div>'.
      '</div>';
      
    }
  ?>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>