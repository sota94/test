<?php
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      $to = $_POST['to'];
      $title = $_POST['title'];
      $content = $_POST['content'];
      mb_send_mail($to, $title, $content);
      header('Location:3_1管理者メニュー.php');
    ?>