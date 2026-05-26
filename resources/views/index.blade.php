<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>FashionablyLate</h1>
    </header>

    <main>
        <h2>Contact</h2>

        <form action="/confirm" method="post">
            @csrf
            <div class="form-group">
                <label>お名前<span>※</span></label>
                <div>
                    <input type="text" name="first_name" placeholder="例）山田" value="{{ old('first_name', session('first_name')) }}">
                    @error('first_name')<p style="color:red">{{ $message }}</p>@enderror
                    <input type="text" name="last_name" placeholder="例）太郎" value="{{ old('last_name', session('last_name')) }}">
                    @error('last_name')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>性別<span>※</span></label>
                <div>
                    <input type="radio" name="gender" value="1">男性
                    <input type="radio" name="gender" value="2">女性
                    <input type="radio" name="gender" value="3">その他
                    @error('gender')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>メールアドレス<span>※</span></label>
                <div>
                    <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email', session('email')) }}">
                    @error('email')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>電話番号<span>※</span></label>
                <div>
                    <input type="text" name="tel" placeholder="例）090" value="{{ old('tel', session('tel')) }}">
                    @error('tel')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>住所<span>※</span></label>
                <div>
                    <input type="text" name="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address', session('address')) }}">
                    @error('address')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>建物名</label>
                <div>
                    <input type="text" name="building" placeholder="例）千駄ヶ谷マンション101" value="{{ old('building', session('building')) }}">
                </div>
            </div>
            <div class="form-group">
                <label>お問い合わせの種類<span>※</span></label>
                <div>
                    <select name="category_id">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="form-group">
                <label>お問い合わせ内容<span>※</span></label>
                <div>
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', session('detail')) }}</textarea>
                    @error('detail')<p style="color:red">{{ $message }}</p>@enderror
                </div>
            </div>
            <button type="submit" class="btn">確認画面</button>
        </form>
    </main>
</body>
</html>