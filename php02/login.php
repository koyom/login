<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .btn-register {
            width: 100%;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="form-signin">
    <h1 class="h3 mb-3 font-weight-normal">ログインしてください</h1>
    <form action="authenticate.php" method="post">
        <label for="username" class="sr-only">ユーザー名</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="ユーザー名" required autofocus>
        <label for="password" class="sr-only">パスワード</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="パスワード" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        <button class="btn btn-lg btn-secondary btn-block btn-register" type="button" onclick="location.href='register_user.php'">新規登録</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
