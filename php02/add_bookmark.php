<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare('INSERT INTO gs_book_table (title, author, comment) VALUES (:title, :author, :comment)');
    $stmt->execute(['title' => $title, 'author' => $author, 'comment' => $comment]);

    // データ追加後に view_bookmarks.php にリダイレクト
    header('Location: view_bookmarks.php');
    exit;
}
?>
