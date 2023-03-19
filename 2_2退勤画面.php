<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>退勤画面</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark" aria-label="First navbar example">
        <div class="container-fluid">
          <button class="mt-sm-4 btn btn-outline-light btn-sm" onclick="history.back(-1)">←</button>
        </div>
      </nav>
      
    <div class="container">
        <div class="top-20" ></div>
    <h1 class="kanri3_1">退勤登録をしてください</h1>

    <div class="kanri3_1">
        
            <p>--------------------------------------------------</p>
        </div>
    <form method="POST"action="taikin.php">

    <div class="sayuu">
        <div class="top">
    <label  for="txt1"  class="form-label">従業員ID</label>
        <input type="text"  class="form-control" id="txt1" name="id" required
            placeholder="IDを半角数字で記入してください">
        </div>

            <div class="top">
        <label  for="txt1"  class="form-label">日付</label><br>
        
        <?php

echo "出勤日付:".date("Y-m-d");
        
echo   '</div>'.

            '<div class="top">'.
        '<label  for="txt1"  class="form-label">時間</label>'."<br>";

         echo date('H:i');
echo            '</div>'.
            '<div class="top">'.
            '<label  for="txt1"  class="form-label"></label>休憩時間(分で記入して下さい)</label>'.
                    '<input type="text"  class="form-control" name="rest" id="txt1" value="0" required'.
                        'placeholder="例)1時間→60">'.
                                '</div>';
       ?>
            <div class="top">
            <p>送信ボタンを押した時の時間が登録されます</p>
        </div>
            <div class="top">
            <div class="row gx-1 ">
            <input class="col-6 btn btn-outline-dark" type="submit"value="送信" />   
        </div>
    </form>

</div>
    </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>