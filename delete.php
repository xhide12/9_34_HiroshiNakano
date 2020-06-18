<?php
require_once 'functions.php';

$pdo = connectDB();
$pdo1 = connectDB();

$sql = 'DELETE FROM images1 WHERE image_id = :image_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();

$sql1 = 'DELETE FROM images2 WHERE image_id = :image_id';
$stmt1 = $pdo1->prepare($sql1);
$stmt1->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt1->execute();

unset($pdo);
unset($pdo1);
header('Location:list.php');
exit();
?>