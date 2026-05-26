<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="/register">register</a>
    </header>

    <main style="max-width:500px;">
        <h2>Login</h2>

        <div style="background:white; padding:40px; border-radius:4px;">
            <form action="/login" method="post">
                @csrf
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
                    </div>
                </div>
                <button type="submit" class="btn">ログイン</button>
            </form>
        </div>
    </main>
</body>
</html>