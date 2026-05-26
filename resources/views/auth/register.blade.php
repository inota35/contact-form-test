<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>FashionablyLate</h1>
    <h2>Register</h2>

    <form action="/register" method="post">
        @csrf
        <div>
            <label>お名前</label>
            <input type="text" name="name" placeholder="例）山田 太郎" value="{{ old('name') }}">
            @error('name')<p style="color:red">{{ $message }}</p>@enderror
        </div>
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
        <div>
        <label>パスワード確認</label>
        <input type="password" name="password_confirmation"
         placeholder="例）coachtech1106">
        </div>
        <button type="submit">登録</button>
    </form>

    <a href="/login">login</a>
</body>
</html>