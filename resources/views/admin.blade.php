<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>FashionablyLate</h1>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>

    <h2>Admin</h2>
    <form action="/search" method="get">
        <input type="text" name="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
        <select name="gender">
            <option value="0">性別</option>
            <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category_id">
            <option value="">お問い合わせの種類</option>
            @foreach(\App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="/reset">リセット</a>
    </form>
    <a href="/export">エクスポート</a>

    <table border="1">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td><button onclick="showModal({{ $contact->id }})">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}

    <div id="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
        <div style="background:white; margin:100px auto; padding:20px; width:500px;">
            <button onclick="closeModal()">×</button>
            <table>
                <tr><th>お名前</th><td id="modal-name"></td></tr>
                <tr><th>性別</th><td id="modal-gender"></td></tr>
                <tr><th>メールアドレス</th><td id="modal-email"></td></tr>
                <tr><th>電話番号</th><td id="modal-tel"></td></tr>
                <tr><th>住所</th><td id="modal-address"></td></tr>
                <tr><th>建物名</th><td id="modal-building"></td></tr>
                <tr><th>お問い合わせの種類</th><td id="modal-category"></td></tr>
                <tr><th>お問い合わせ内容</th><td id="modal-detail"></td></tr>
            </table>
            <form id="delete-form" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" style="color:red">削除</button>
            </form>
        </div>
    </div>

    <script>
    const contacts = @json($contacts->items());

    function showModal(id) {
        const contact = contacts.find(c => c.id === id);
        document.getElementById('modal-name').textContent = contact.last_name + ' ' + contact.first_name;
        document.getElementById('modal-gender').textContent = contact.gender == 1 ? '男性' : contact.gender == 2 ? '女性' : 'その他';
        document.getElementById('modal-email').textContent = contact.email;
        document.getElementById('modal-tel').textContent = contact.tel;
        document.getElementById('modal-address').textContent = contact.address;
        document.getElementById('modal-building').textContent = contact.building ?? '';
        document.getElementById('modal-category').textContent = contact.category.content;
        document.getElementById('modal-detail').textContent = contact.detail;
        document.getElementById('delete-form').action = '/delete/' + contact.id;
        document.getElementById('modal').style.display = 'block';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
    </script>

</body>
</html>