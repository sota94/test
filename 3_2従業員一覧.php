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
    <title>従業員一覧</title>
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
        <h1>従業員一覧</h1>
            <p>---------------------------------------------------</p>
        </div>

        <?php 
        $id = 0;
        $pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
charset=utf8','LAA1417495','sotA1140');
        $sql="select * from human ";
        $selectdata = $pdo->query($sql);
        foreach($selectdata as $row){
        
echo            '<div class="container">'.
              '<div class="row">'.

                '<div class="ryouhasi">'.

        'ID: ';
        echo  $id=$row['human_id'];

echo          '<br>'.'従業員名:';
echo        $name=$row['human_name'];

echo          '<br>'.'メールアドレス:';
echo          $me_ru=$row['human_email'];

echo          '<div class="row mb-3 ">'.
            '<div class="col-7 themed-grid-col">'.
              '<div class="pb-3">'.
              '<br>'.'役職'.
              '</div>'.
              '<div class="row">'.
                '<div class="col-7 themed-grid-col">';
                
                $sqll="select position_name from positions where position_id = ?";
                $pss = $pdo->prepare($sqll);
                $yaku_id=$row['position_id'];
                $pss->bindValue(1,$yaku_id,PDO::PARAM_STR);
                $pss->execute();
                foreach($pss as $roww){
                  $yaku_name = $roww['position_name'];
                }
                echo $yaku_name;
echo                '</div>'.
                
              '</div>'.
            '</div>'.
            '<div class="col-5 themed-grid-col">'.
                '<div class="top-20">';
                   
echo                '<form action="3_2_1従業員情報変更画面.php" method="POST">';
echo                    '<button class="btn btn-outline-dark type="hidden" name="yaku" value="'.$id.'"/>詳細設定変更</button>';
echo                '</form>'.
                '</div>'.
            '</div>'.
          '</div>'.

              '</div>'.
              '</div>'.
              '<p>--------------------------------------------------</p>'.
            '</div>'.
      '</div>';
        }
        ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>