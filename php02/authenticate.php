<?php
session_start();
include 'db_config.php'; // データベース設定をインクルード

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ユーザー名に基づいてデータベースからユーザー情報を取得
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // ユーザーが存在し、かつパスワードが一致する場合
    if ($user && password_verify($password, $user['password'])) {
        // ログイン成功：ユーザーIDをセッションに保存
        $_SESSION['user_id'] = $user['id'];
        header("Location: view_bookmarks.php"); // ログイン後のリダイレクト先
        exit;
    } else {
        // ログイン失敗：エラーメッセージを表示
        echo "Invalid username or password";
    }
}
?>
