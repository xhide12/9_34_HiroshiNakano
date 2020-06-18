<?php
// GETでidを取得
$id = $_GET["id"];

// DBに接続
require "functions.php";
$pdo = connectDB();

// 対象データ取得
$stmt = $pdo->prepare("SELECT * FROM images1 WHERE image_id = :id");
$stmt ->bindvalue(":id",$id,PDO::PARAM_INT);//PDO::PARAM_STR
$status = $stmt->execute();

//結果をfetch()
if ($status == false) { 
  //SQLエラー関数
  sql_error($stmt);
}else{
  $images = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Image Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
      .text{
        margin-top: 20px;
      }
      .onamae{
      padding-top: 20px;
      }
      .livehouse{
        width:250px;
      }

      .jumbotron {
        background-image: url("");
        background-size: cover;
        background-position: center 60%;
      }

      /* fieldset{
      display: flex;
      } */

      /* label{
        text-align: center;
      }

      .button{
        margin: 0 auto;
      } */

      .carousel img {
        max-height: 300px;
        margin: 0 auto;
      }




    </style>
</head>
<body>

<div id="carouselExampleFade" class="carousel carousel slide carousel-fade" data-ride="carousel" data-interval="1000" data-pause="hover">
  <div class="carousel-inner">
    <div class="carousel-item active" style="background-color: red;">
      <img src="img/Anonymous-Guy-Fawkes-1454485-wallhere.com.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
            <p class="display-3 font-weight-bold">メンズコスメ</p>
            <p class="display-3 font-weight-bold">ビフォーアフター</p>
        </div>  
    </div>
    <!-- <div class="carousel-item"  style="background-color: yellow;">
      <img src="img/black-monochrome-mask-typography-text-logo-250953-wallhere.com.jpg" class="d-block w-100" alt="...">
    </div> -->
    <div class="carousel-item"  style="background-color: blue;">
      <img src="img/white-black-monochrome-photography-Anonymous-Guy-Fawkes-149245-wallhere.com.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
        <p class="display-3 font-weight-bold">メンズコスメ</p>
            <p class="display-3 font-weight-bold">ビフォーアフター</p>
        </div>  
    </div>
  </div>
  <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a> -->
</div>

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="card">
   <fieldset>
    <div class="card-header">投稿の編集</div>
     <label class="font-weight-bold">名前：<br><input type="text" name="toukou" value="<?=$images['image_toukou']?>"></label><br>
     <label class="font-weight-bold">お悩み：<br><input type="text" name="house" value="<?=$images['image_house']?>"></label><br>
     <label class="font-weight-bold">メイクのポイント：<br><textArea name="coment" rows="4" cols="40"><?=$images['image_coment']?></textArea></label><br>
    <input type="hidden" name="id" value="<?=$images['image_id']?>">
    <input type="submit" value="送信" class="button">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>