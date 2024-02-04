<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_config.php';

// URLからIDを取得
$id = $_GET['id'];

// データベースから特定のブックマークを取得
$stmt = $pdo->prepare('SELECT * FROM gs_book_table WHERE id = :id');
$stmt->execute(['id' => $id]);
$bookmark = $stmt->fetch();

if (!$bookmark) {
    echo "指定されたブックマークが見つかりません。";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ブックマーク編集</title>
    <!-- BootstrapなどのCSSをここに追加 -->
</head>
<body>

<div class="container mt-5">
    <h2>ブックマーク編集</h2>

    <form action="update_bookmark.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($bookmark['id']); ?>">

        <div class="form-group">
            <label for="title">書籍名:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($bookmark['title']); ?>" required>
        </div>

        <div class="form-group">
            <label for="author">著者:</label>
            <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($bookmark['author']); ?>">
        </div>

        <div class="form-group">
            <label for="comment">コメント:</label>
            <textarea class="form-control" id="comment" name="comment"><?php echo htmlspecialchars($bookmark['comment']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>

</body>
</html>
