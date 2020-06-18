<?php
require_once 'functions.php';

$pdo = connectDB();
$pdo1 = connectDB();

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    // 画像を取得
    $sql = 'SELECT * FROM images1 ORDER BY created_at DESC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll();

    $sql1 = 'SELECT * FROM images2 ORDER BY created_at DESC';
    $stmt1 = $pdo1->prepare($sql1);
    $stmt1->execute();
    $images1 = $stmt1->fetchAll();


} else {

    // 画像を保存
    if (!empty($_FILES['image']['name'])) {

        $name = $_FILES['image']['name'];
        $type = $_FILES['image']['type'];
        $content = file_get_contents($_FILES['image']['tmp_name']);
        $size = $_FILES['image']['size'];
        $coment = $_POST['coment'];
        $toukou = $_POST['toukou'];
        $house = $_POST['house'];

        $sql = 'INSERT INTO images1(image_name, image_type, image_content, image_size, image_coment, image_toukou, image_house, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, :coment, :toukou, :house, now())';
        // $sql = 'INSERT INTO images(image_name, image_type, image_content, image_size, created_at)
        // VALUES (:image_name, :image_type, :image_content, :image_size, now())';
$stmt = $pdo->prepare($sql);
        $stmt->bindValue(':image_name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':image_type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':image_content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image_size', $size, PDO::PARAM_INT);
        $stmt->bindValue(':coment', $coment, PDO::PARAM_STR);
        $stmt->bindValue(':toukou', $toukou, PDO::PARAM_STR);
        $stmt->bindValue(':house', $house, PDO::PARAM_STR);
        $stmt->execute();


        $name1 = $_FILES['image1']['name'];
        $type1 = $_FILES['image1']['type'];
        $content1 = file_get_contents($_FILES['image1']['tmp_name']);
        $size1 = $_FILES['image1']['size'];

        $sql1 = 'INSERT INTO images2(image_name, image_type, image_content, image_size, created_at)
                VALUES (:image_name, :image_type, :image_content, :image_size, now())';

$stmt1 = $pdo1->prepare($sql1);
        $stmt1->bindValue(':image_name', $name1, PDO::PARAM_STR);
        $stmt1->bindValue(':image_type', $type1, PDO::PARAM_STR);
        $stmt1->bindValue(':image_content', $content1, PDO::PARAM_STR);
        $stmt1->bindValue(':image_size', $size1, PDO::PARAM_INT);
        $stmt1->execute();


    }
    unset($pdo);
    unset($pdo1);
    header('Location:list.php');
    exit();
}

unset($pdo);
unset($pdo1);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Image Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



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

      .ajax-iine{
        margin-top:20px;  
      }

      .carousel img {
        max-height: 300px;
        margin: 0 auto;
        }

      .come {
        margin-bottom:30px;  
      }




    </style>


</head>
<body>

<!-- <div class="container text-center mt-5">
  <div class="text-center bg-dark h-100 pt-4 pb-4 jumbotron">
      <p class="display-3 center-block text-white">メンズコスメ</p>
      <p class="display-3 text-white">ビフォーアフター</p>
  </div>
</div> -->

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




<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 border-right">
            <ul class="list-unstyled">
                <?php for($i = 0; $i < count($images); $i++): ?>
                    <li class="media mt-5">
                        <div>
                            <div class="text-secondary font-weight-bold">BEFORE</div>
                            <img src="image.php?id=<?= $images[$i]['image_id']; ?>" width="200px" height="auto" class="mr-3">
                        </div>

                        <div>
                            <div class="text-secondary font-weight-bold">AFTER</div>
                            <img src="image1.php?id=<?= $images1[$i]['image_id']; ?>" width="200px" height="auto" class="mr-3">
                        </div>

                        <div class="media-body">
                            <h6 class="onamae font-weight-bold">名前：<?= $images[$i]['image_toukou']; ?></h6>
                            <h6 class="live font-weight-bold">悩み：<?= $images[$i]['image_house']; ?></h6>
                            <!-- <h5><?= $images[$i]['image_name']; ?> (<?= number_format($images[$i]['image_size']/1000, 2); ?> KB)</h5> -->
                            <h6 class="come"><?= $images[$i]['image_coment']; ?></h6>
                            <a href="javascript:void(0);" 
                                onclick="var ok = confirm('修正しますか？'); if (ok) location.href='detail.php?id=<?= $images[$i]['image_id']; ?>'">
                            <i class="fas fa-pencil-alt"></i> 修正</a>
                            <a href="javascript:void(0);" 
                                onclick="var ok = confirm('削除しますか？'); if (ok) location.href='delete.php?id=<?= $images[$i]['image_id']; ?>'">
                            <i class="far fa-trash-alt"></i> 削除</a>
                         
          
                        
                        </div>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="col-md-4 pt-4 pl-4">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <label class="text font-weight-bold">名前</label>
                    <input name="toukou" type="text" class="livehouse" required></input>
                    <br>
                    <label class="text font-weight-bold">お悩み</label>
                    <input name="house" type="text" class="livehouse" required></input>
                    <br>
                    <label class="text font-weight-bold">メイクのポイント</label>
                    <textArea name="coment" rows="4" cols="40"></textArea>
                    <br>           
                    <label class="text font-weight-bold">BEFORE画像</label>
                    <input type="file" name="image" required>
                    <br>                    
                    <label class="text font-weight-bold">AFTER画像</label>
                    <input type="file" name="image1" required>



                </div>
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
        </div>
    </div>
</div>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>