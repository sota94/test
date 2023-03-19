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
    <title>給与情報</title>
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
        <h1>給与情報</h1>
            <p>---------------------------------------------------</p>
        </div>

    <?php
  $pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
  charset=utf8','LAA1417495','sotA1140');

  //wageの中身を全部持ってくる
  $sql="select * from wage order by human_id";
  $selectdata = $pdo->query($sql);
  foreach($selectdata as $row){

    $id = $row['human_id']; //従業員ID  

    //従業員の名前検索
    $sqll="select human_name from human where human_id = ?";
    $pss = $pdo->prepare($sqll);
      $pss->bindValue(1,$id,PDO::PARAM_STR);
      $pss->execute();
      foreach($pss as $roww){
          $name = $roww['human_name']; //名前
      }
  
echo     '<div class="sayuu">'.
        '<div class="top-20">'.
          '<h5>'.$name.'</h5>'.
        '</div>'.

        '<div class="top-20">'.
        '<div class="row mb-3 text-center">'.
          '<div class="col-4 themed-grid-col"><h5>勤務日数</h5></div>'.
          '<div class="col-4 themed-grid-col"><h5>勤務時間</h5></div>'.
          '<div class="col-4 themed-grid-col"><h5>休憩時間</h5></div>'.
        '</div>'.
        '</div>';
              $time=$row['wage_time'];
              $ji = floor($time / 60);
              $kan = $time % 60;

             $time=$row['total_subtraction'];
             $ji1 = floor($time / 60);
             $kan1 = $time % 60;
echo        '<div class="row mb-3 text-center">'.
          '<div class="col-4 themed-grid-col">'.$row['days']."日".'</div>'.
          '<div class="col-4 themed-grid-col">'.$ji."時間".$kan."分".'</div>'.
          '<div class="col-4 themed-grid-col">'.$ji1."時間".$kan1."分".'</div>'.
        '</div>';

echo        '<div class="row mb-3 text-center">'.
          '<div class="col-4 themed-grid-col"><h5>時給</h5></div>'.
          '<div class="col-4 themed-grid-col"><h5>総支給額</h5></div>'.
          '<div class="col-4 themed-grid-col"><h5>差引額</h5></div>'.
        '</div>';

echo        '<div class="row mb-3 text-center">'.
          '<div class="col-4 themed-grid-col">'.$row['hourly_wage'].'</div>'.
          '<div class="col-4 themed-grid-col">'.$row['total_wage'].'</div>'.
          '<div class="col-4 themed-grid-col">'.$row['total_subtraction'].'</div>'.
        '</div>';

echo        '<div class="row mb-3 text-center">'.
          '<div class="col-6  themed-grid-col"><h5>差引支給額</h5></div>';
          //<div class="col-6  themed-grid-col"><h5>前月給与比</h5></div>
echo        '</div>';

echo        '<div class="row mb-3 text-center">'.
          '<div class="col-6  themed-grid-col">'.$row['total'].'</div>';
          //<div class="col-6  themed-grid-col">109%</div>
echo        '</div>'.
    
     '</div>'.

     '<div class="kanri3_1"> '.
      '<p>---------------------------------------------------</p>'.
  '</div>';
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>