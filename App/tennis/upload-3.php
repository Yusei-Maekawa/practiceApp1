<?php 
  include 'includes/login.php';

  $msg = null;
  $alert = null;

  date_default_timezone_set('Asia/Tokyo');                                //日本のタイムゾーンに設定

  if(isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
    $old_name = $_FILES['image']['tmp_name'];
    $new_name = date("YmdHis");
    $new_name .= mt_rand();
    $size = getimagesize($_FILES['image']['tmp_name']);
    switch($size[2]){
      case IMAGETYPE_JPEG:
        $new_name .= '.jpg';
        break;
      case IMAGETYPE_GIF:
        $new_name .= '.gif';
        break;
      case IMAGETYPE_PNG:
        $new_name .= '.png';
        break;
      default:
        header('Location: upload-3.php'); //upload-3.php をもう一回読む（拡張子一致しないと　元の画面読み直し）
        exit();
    }
    if(move_uploaded_file($old_name , 'album/'.$new_name)){
      $msg = 'アップロードしました。';
      $alert = 'success';
    }else{
      $msg = 'アップロードできませんでした';
      $alert = 'danger';
    }
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
        <h1>画像アップロード</h1>
        <?php
          if($msg){
            echo '<div class = "alert alert-'.$alert.'" role = "alert" > '.$msg.'</div>';
          }
        ?>

        <form action = "upload-3.php" method = "post" enctype = "multipart/form-data">
          <div class = "form-group">
            <label>アップロードファイル</label>
            <input type = "file" name = "image" class = "form-control-file">
          </div>
          <input type = "submit" value = "アップロードする" class = "btn btn-primary">
        </form>

        <!-- 本文ここまで -->
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
