<?php
header('Content-Type:text/html;charset=UTF-8');
$dsn='�f�[�^�x�[�X��';
$user='���[�U�[��';
$password='�p�X���[�h';
$pdo=new PDO($dsn,$user,$password);
//�f�[�^�x�[�X�I���I��
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