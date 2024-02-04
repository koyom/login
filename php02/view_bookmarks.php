<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ブックマーク一覧</title>
    <!-- Bootstrap CSSのリンク -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-button {
            position: fixed;
            right: 20px;
            bottom: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>ブックマーク一覧</h2>

    <a href="index.php" class="btn btn-primary mb-3">ホームに戻る</a>

    <form action="view_bookmarks.php" method="get" class="mb-4">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="検索キーワード">
        </div>
        <button type="submit" class="btn btn-primary">検索</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>著者</th>
                <th>コメント</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>

            <?php
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            
            include 'db_config.php';
            $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%%';
            $stmt = $pdo->prepare('SELECT id, title, author, comment FROM gs_book_table WHERE title LIKE :searchTitle OR author LIKE :searchAuthor OR comment LIKE :searchComment');
            $stmt->execute(['searchTitle' => $search, 'searchAuthor' => $search, 'searchComment' => $search]);
            

            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["title"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["author"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["comment"]) . "</td>";
                echo "<td>";
                echo "<a href='edit_bookmark.php?id=" . htmlspecialchars($row["id"]) . "'>編集</a> | ";
                echo "<a href='delete_bookmark.php?id=" . htmlspecialchars($row["id"]) . "' onclick='return confirm(\"本当に削除しますか？\")'>削除</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<form action="logout.php" method="post">
    <button type="submit" class="logout-button">ログアウト</button>
</form>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
