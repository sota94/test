<?php
session_start();
if(isset($_SESSION["userid"])== true &&
    isset($_SESSION["userpass"])==true){
        header('Location:3_1管理者メニュー.php');
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ログイン画面</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
        <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
            <div class="container-fluid">
              <button class="mt-sm-4 btn btn-outline-light btn-sm" onclick="history.back(-1)">←</button>
            </div>
        </nav>

        <div class="kanri3_1">
            <h1>ログイン</h1>
                <p>---------------------------------------------------</p>
            </div>

        <div class="sayuu">

    <form method="POST"action="logincheck.php">

            <div class="top">
        <label  for="txt1"  class="form-label">ID</label>
            <input type="text"  class="form-control" id="txt1" name="id" required
                placeholder="半角数字で記入して下さい">
            </div>

            <div class="top">
                <label  for="txt1"  class="form-label">パスワード</label>
                    <input type="text"  class="form-control" id="txt1" name="pass" required
                        placeholder="">
                    </div>

                    <div class="top">
                <input class="col-4 btn btn-outline-dark" type="submit"value="送信" />   
                        </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>