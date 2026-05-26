<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="/login">login</a>
    </header>

    <main style="max-width:500px;">
        <h2>Register</h2>

        <div style="background:white; padding:40px; border-radius:4px;">
            <form action="/register" method="post">
                @csrf
                <div class="form-group">
                    <label>お名前</label>
                    <div>
                        <input type="text" name="name" placeholder="例）山田 太郎" value="{{ old('name') }}">
                        @error('name')<p style="color:red">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>メールアドレス</label>
                    <div>
                        <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
                        @error('email')<p style="color:red">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>パスワード</label>
                    <div>
                        <input type="password" name="password" placeholder="例）coachtech1106">
                        @error('password')<p style="color:red">{{ $message }}</p>@enderror