<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_config.php';

$id = $_POST['id']; // フォームからIDを取得
$title = $_POST['title'];
$author = $_POST['author'];
$comment = $_POST['comment'];

$stmt = $pdo->prepare('UPDATE gs_book_table SET title = :title, author = :author, comment = :comment WHERE id = :id');
$stmt->execute(['title' => $title, 'author' => $author, 'comment' => $comment, 'id' => $id]);

header('Location: view_bookmarks.php'); // 更新後に一覧ページにリダイレクト
exit;
?>
