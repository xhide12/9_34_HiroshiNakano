<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

//1.POSTでデータを取得
$toukou = $_POST["toukou"];
$house = $_POST["house"];
$coment = $_POST["coment"];
$id = $_POST["id"];

//2.DB接続など
require "functions.php";
$pdo = connectDB();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れと同じです。
$stmt = $pdo->prepare("UPDATE images1 SET image_toukou=:toukou, image_house=:house, image_coment=:coment WHERE image_id=:id");
$stmt->bindValue(':toukou',$toukou , PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':house', $house, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':coment',$coment , PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',$id , PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

if($status==false) {
    //SQLエラー関数
    aql_error($stmt);
  }else{

   //一覧ページへ戻す
   header( "Location: list.php" ) ;
  }
?>