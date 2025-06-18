<?php
    session_start();
    if(isset($_SESSION['id'])){  //中身ではなく存在するかどうかの確認
        unset($_SESSION['id']);  //idの要素を空にする
    }
    header('Location:  login.php');
?>