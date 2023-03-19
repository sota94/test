<?php session_start();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>変更確認画面</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="kanri3_1">
        <h1>登録確認画面 </h1>
            <p>---------------------------------------------------</p>
        </div>
        <div class="top-20">
            <div class="sayuu">
    <h5>メモをお願いします</h5>
            </div>
        </div>
    <?php
echo    '<div class="sayuu">'.
    '<div class="top">';
echo    '<div class="top-20">';
echo "従業員ID：".$_SESSION['id'];
echo '</div>';
echo    '<div class="top-20">';
echo "名前：".$_SESSION['name'];
echo '</div>';
echo    '<div class="top-20">';
echo "パスワード：".$_SESSION['pass'];
echo '</div>';
echo    '<div class="top-20">';
echo "メールアドレス：".$_SESSION['email'];
echo '</div>';
echo    '<div class="top-20">';
echo "住所：".$_SESSION['addres'];
echo '</div>';
echo    '<div class="top-20">';
echo "役職：".$_SESSION['yaku_name'];
echo '</div>';

echo '</div>';
session_destroy();
?>
    <div class="top-20">
<button class="btn btn-outline-dark btn-lg" onclick="location.href='1_1メニュー.php'">確認</button>
</div>
   </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>