<?php 
  include 'includes/login.php';

    $fp = fopen("info.txt" , "r");
    $line  =array();   //配列用意(1行ずつ要素に確認)
    $body = '';
    if($fp){
      while(!feof($fp)){                    //into.txt あるまで配列格納
        $line[] = fgets($fp);
      }
      fclose($fp);
      }  
?>
<!doctype html>
<html lang="ja" >
  <head>
    <title>サークルサイト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>

    <?php include('navbar.php'); ?>

    <main role="main" class="container" style="padding:60px 15px 0">
      <div>
        <!-- ここから「本文」-->
        <p>ログイン中のユーザ:<?php echo $_SESSION['name'] ?></p>
        <h1>お知らせ</h1>
        <?php  
          if(count($line) > 0){
            for($i = 0 ; $i < count($line); $i++){
              if($i == 0){
                echo '<h2>'.$line[0].'</h2>';
              }else{
                $body .= $line[$i].'<br>';
              }
            }
          }else{
            $body = 'お知らせはありません';
          }
          echo '<p>'.$body.'</p>'
        ?>

        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
