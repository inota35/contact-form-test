<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
</head>
<body>
    <h1>FashionablyLate</h1>
    <h2>Confirm</h2>

    <table>
        <tr>
            <th>お名前</th>
            <td>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                @if($contact['gender'] == 1) 男性
                @elseif($contact['gender'] == 2) 女性
                @else その他
                @endif
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $contact['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $contact['tel'] }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $contact['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $contact['building'] ?? '' }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ \App\Models\Category::find($contact['category_id'])->content }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $contact['detail'] }}</td>
        </tr>
    </table>

    <form action="/store" method="post">
        @csrf
        @foreach($contact as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
        <button type="submit">送信</button>
    </form>

    <form action="/" method="get">
        <button type="submit">修正</button>
    </form>
</body>
</html>