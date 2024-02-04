<?php
include 'db_config.php';

$id = $_GET['id']; // URLパラメータからIDを取得

$stmt = $pdo->prepare('DELETE FROM gs_book_table WHERE id = :id');
$stmt->execute(['id' => $id]);

header('Location: view_bookmarks.php'); // 削除後に一覧ページにリダイレクト
exit;
?>
