<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>メール送信画面</title>
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
      <?php
    $_SESSION['id']=$_POST['id'];
    $pdo = new PDO('mysql:host=mysql213.phy.lolipop.lan;dbname=LAA1417495-kadai;
    charset=utf8','LAA1417495','sotA1140');
$sql="select human_email from human where human_id = ?";
$ps=$pdo->prepare($sql);
  $ps->bindValue(1,$_SESSION['id'], PDO::PARAM_INT);
  $ps->execute();
foreach($ps as $row){
    $_SESSION['email'] = $row['human_email'];
}
      ?>
      <div class="kanri3_1">
        <h1>メール送信フォーム</h1>
            <p>---------------------------------------------------</p>
        </div>

      <div class="sayuu">
    <form action="mail.php" method="post">

    <div class="top-20">
        <label  for="txt1"  class="form-label">送信先</label>
            <input type="text"  class="form-control" id="txt1" name="to" value="<?php echo $_SESSION['email']; ?>" required
                placeholder="">
            </div>

            <div class="top-20">
        <label  for="txt1"  class="form-label">メールタイトル</label>
            <input type="text"  class="form-control" id="txt1" name="title" required
                placeholder="">
            </div>
            <div class="top-20">
        <label  for="txt1"  class="form-label">本文</label>
            <textarea type="text"  class="form-control" id="txt1" name="content" cols="40" rows="3" required
                placeholder=""></textarea>
            </div>
      
      <div class="top-20">
                <input class="col-4 btn btn-outline-dark" type="submit"value="送信" />   
                        </div>
    </form>
    <div class="kanri3_1">
            <p>------------------------------------------------</p>
        </div>
        <h5>定型文を送る</h5>
        <div class="top-20">
        <form action="mail_teikei.php" method="post">
                <input class="col-4 btn btn-outline-dark" type="submit"value="定型文を送信" />   
                        </div>
</form>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>