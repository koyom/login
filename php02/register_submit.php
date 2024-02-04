<?php
include 'db_config.php'; // データベースの設定ファイルをインクルード

$username = $_POST['username'];
$password = $_POST['password'];

// パスワードのハッシュ化
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// ユーザー情報をデータベースに登録
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
$stmt->execute(['username' => $username, 'password' => $hashed_password]);

// 登録完了後、login.phpにリダイレクト
header('Location: login.php');
exit;
?>
