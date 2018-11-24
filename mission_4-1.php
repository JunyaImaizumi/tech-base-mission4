<?php
$name_php=$_POST['name'];
$comment_php=$_POST['comment'];
$password_php=$_POST['password'];
$editNum_php=$_POST['editNum'];
$editNum_sub_php=$_POST['editNum_sub'];
$delete_php=$_POST['delete'];
$password_delete_php=$_POST['password_delete'];
$password_edit_php=$_POST['password_edit'];
$editID_php;
$editName_php;
$editComment_php;
//phpコードの変数設定完了
header('Content-Type:text/html;charset=UTF-8');
$dsn='データベース名';
$user='ユーザー名';
$password='パスワード';
$pdo=new PDO($dsn,$user,$password);
//データベース選択終了
if(!empty($name_php) and !empty($comment_php) and !empty($password_php) and empty($editNum_sub_php)){
$sql=$pdo->prepare("INSERT INTO mission40 (name,comment,date,password) VALUES(:name,:comment,:date,:password)");
$sql->bindParam(':name', $name ,PDO::PARAM_STR);
$sql->bindParam(':comment',$comment,PDO::PARAM_STR);
$sql->bindParam(':date',$date,PDO::PARAM_STR);
$sql->bindParam(':password',$password,PDO::PARAM_STR);
//テーブルの変数をpho変数として表現
//投稿機能開始
$name=$name_php;
$comment=$comment_php;
$date=date("Y/m/d H:i:s");
$password=$password_php;
$sql->execute();
}
else{
if(empty($delete_php) and empty($editNum_php) and empty($editNum_sub_php)){
echo "正しく入力を行ってください";
}
}
//投稿機能終了
//削除機能開始
if(!empty($delete_php)){
$id=$delete_php;
$sql="SELECT*FROM mission40";
$result1=$pdo->query($sql);
foreach($result1 as $row1){
if($row1['id']==$id){
if($row1['password']==$password_delete_php){
$sql="delete from mission40 where id=$id";
$result=$pdo->query($sql);
}
else{
echo "パスワードが違います！";
}
}
}
}
//削除機能終了
//編集機能1開始(パスワード認証未設定)
if(!empty($editNum_php)){
$sql="SELECT*FROM mission40";
$result2=$pdo->query($sql);
foreach($result2 as $row2){
if($row2['id']==$editNum_php){
if($row2['password']==$password_edit_php){
$editID_php=$row2['id'];
$editName_php=$row2['name'];
$editComment_php=$row2['comment'];
}
else{
unset($editID_php);
echo "パスワードが違います！";
}
}
}
}
//編集機能1終了
?>
<html>
<body>
<form method="post">
名前<input type="text" name="name" value="<?php echo $editName_php; ?>"></br>
コメント<input type="text" name="comment" value="<?php echo $editComment_php; ?>"></br>
パスワード<input type="text" name="password" value=""></br>
<input type="text" name="editNum_sub" style="visibility:hidden" value="<?php echo $editID_php;　?>" ></br>
<input type="submit" value="送信"></br>
削除番号<input type="text" name="delete" value=""></br>
パスワード<input type="text" name="password_delete" value=""></br>
<input type="submit" value="削除"></br>
編集番号<input type="text" name="editNum" value=""></br>
パスワード<input type="text" name="password_edit" value=""></br>
<input type="submit" value="編集"></br>
</form>
<?php
//編集機能開始
if(!empty($editNum_sub_php)){
$nm=$name_php;
$kome=$comment_php;
$date1=date("Y/m/d H:i:s");
$sql="update mission40 set name='$nm',comment='$kome',date='$date1' where id=$editNum_sub_php";
$result=$pdo->query($sql);
}
//編集機能終了
//テーブルを表示
$sql='SELECT*FROM mission40';
$result3=$pdo->query($sql);
foreach($result3 as $row3){
echo $row3['id'].',';
echo $row3['name'].',';
echo $row3['comment'].',';
echo $row3['date'].'<br>';
}
?>
</body>
</html>
?>
</body>
</html>