<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>従業員追加画面</title>
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
        <h1>新規従業員登録</h1>
            <p>---------------------------------------------------</p>
        </div>

        <div class="sayuu">

            <form method="POST"action="new_akaunto.php">
        
            <div class="top-10">
            <label  for="txt1"  class="form-label">名前</label>
                <input type="text"  class="form-control" id="txt1"  name="name" required
                    placeholder="例)山田太郎">
                </div>
            
        <div class="top-10">
		    <label for="new_password">パスワード:</label>
		    <input type="password" class="form-control" name="new_password" required><br>
            </div>

        <div class="top-10">
		    <label for="confirm_new_password">確認パスワード:</label>
		    <input type="password"class="form-control" name="confirm_new_password" required><br>
            </div>
            
            <div class="top-10">
            <label  for="txt1"  class="form-label">メールアドレス</label>
            <input type="email"  class="form-control" id="txt1" name="email" required
             placeholder="例)icloud.icloud.com">   
             </div>
                            
            <div class="top-10">
             <label  for="txt1"  class="form-label">住所</label>
             <input type="text"  class="form-control" id="txt1" name="addres" required
                 placeholder="例)福岡県福岡市博多区">
            </div>
            <div class="sita"></div>
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
                 
             </div>
                    
             
            </div>
            <div class="sita"></div>

             <div class="sayuu">
             <div class="top-20">
                <input class="col-4 btn btn-outline-dark" type="submit"value="登録" />   
            </div>
             </div>
        </form>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>