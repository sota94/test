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
    <title>授業員情報変更画面</title>
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

      <?php $_SESSION['id']=$_POST['yaku']; ?>
      <div class="kanri3_1">
        <h1>従業員情報変更画面</h1>
            <p>---------------------------------------------------</p>
        </div>
        <div class="sayuu">
            
            <form method="POST"action="change.php">
            <div class="top-10">
                <label  for="txt1"  class="form-label">名前</label>
                    <input type="text"  class="form-control" id="txt1" name="name" required
                        placeholder="山田太郎">
                    </div>
            
        <div class="top-10">
		    <label for="new_password">新しいパスワード:</label>
		    <input type="password" class="form-control" name="new_password" required><br>
            </div>

        <div class="top-10">
		    <label for="confirm_new_password">新しいパスワード:</label>
		    <input type="password"class="form-control" name="confirm_new_password" required><br>
            </div>
            
                 <div class="top-10">
                    <label  for="txt1"  class="form-label">メールアドレス</label>
                        <input type="text"  class="form-control" id="txt1" name="email" required
                            placeholder="abcd@icloud.com">
                        </div>

                 <div class="top-10">
                    <label  for="txt1"  class="form-label">住所</label>
                        <input type="text"  class="form-control" id="txt1" name="addres" required
                             placeholder="福岡県福岡市博多区">
                        </div>
                
                        <div class="top-10">
                    <label  for="txt1"  class="form-label">役職</label>
                    <select class="form-select" name="yaku" required>
                        <option selected>役職を選択</option>
                        <?php
                  $pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
                  charset=utf8','LAA1417495','sotA1140');

                  $sql="select * from positions order by position_id";
                    $ps=$pdo->query($sql);
                    $ps->execute();
                    $i =1;
                    foreach($ps->fetchAll() as $row){
                     echo   '<option value="'.$row["position_id"].'">'.$row["position_name"].'</option>';  
                     
                    }
                        ?>
                        </select>
               </div>
               

                <div class="top-20">
                    <input class="col-4 btn btn-outline-dark" type="submit"value="送信" />   
                </div>  
            </form>
            
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>