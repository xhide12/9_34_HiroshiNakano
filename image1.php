<?php
require_once 'functions.php';

$pdo1 = connectDB();

$sql1 = 'SELECT * FROM images2 WHERE image_id = :image_id LIMIT 1';
$stmt1 = $pdo1->prepare($sql1);
$stmt1->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt1->execute();
$image1 = $stmt1->fetch();

header('Content-type: ' . $image1['image_type']);
echo $image1['image_content'];

unset($pdo1);
exit();
?>