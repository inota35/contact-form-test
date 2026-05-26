<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>FashionablyLate</h1>
    <h2>Login</h2>

    <form action="/login" method="post">
        @csrf
        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
            @error('email')<p style="color:red">{{ $message }}</p>@enderror
        </div>
        <div>
            <label>パスワード</label>
            <input type="password" name="password" placeholder="例）coachtech1106">
            @error('password')<p style="color:red">{{ $message }}</p>@enderror
        </div>
        <button type="submit">ログイン</button>
    </form>

    <a href="/register">register</a>
</body>
</html>