<?php
header('Content-Type:text/html;charset=UTF-8');
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);
//データベース選択終了
$sql="CREATE TABLE mission40"
."("
."id INT AUTO_INCREMENT PRIMARY KEY,"
."name char(32),"
."comment TEXT,"
."password char(32),"
."date TEXT"
.");";
$stmt=$pdo->query($sql);
?>
.");";
$stmt=$pdo->query($sql);
?>