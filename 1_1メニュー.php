<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>メニュー</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
        <div class="container-fluid">
          <button class="mt-sm-4 btn btn-outline-dark btn-sm" onclick=""></button>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="navbar-collapse collapse" id="navbarsExample01" style="">
            <ul class="navbar-nav me-auto mb-2">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="2_1出勤画面.php">出勤退勤登録</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="ログイン.php">管理者オーナー</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="従業員追加画面.php">従業員追加</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>

    <div class="container">
        <div class="me1-1">
    <div class="row m-2">
        <button class="mt-sm-4 btn btn-outline-dark btn-lg" onclick="location.href='2_1出勤画面.php'">出勤退勤登録</button><br>
        <div class="mt-3">
         </div>
        <button class="btn btn-outline-dark btn-lg" onclick="location.href='ログイン.php'">管理者オーナー</button>
            <div class="mt-3">
                </div>
            <button class="btn btn-outline-dark btn-lg" onclick="location.href='従業員追加画面.php'">従業員追加</button> 
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>