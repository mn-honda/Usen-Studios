<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium"><br>
    <div class="text-right">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　仕入れ登録</a>
        <a href="purchase_list">　仕入れ一覧</a>
        <a href="stock_list">　在庫一覧</a>
        <a href="sale_list">　売上一覧　</a>
    </div>
    <div><br><h1 class="text-3xl flex justify-center">お問い合わせ一覧</h1><br></div>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">ID</th>
                <th class="px-10 py-5">メンバーID</th>
                <th class="px-10 py-5">日時</th>
                <th class="px-10 py-5">購入詳細ID</th>
                <th class="px-10 py-5">件名</th>
                <th class="px-10 py-5">詳細</th>
            </tr>
            @php $total = 0; @endphp
            @foreach($contacts as $contact)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->user_id}}</td>
                    <td>{{$contact->date->format('Y/m/d')}}</td>
                    <td>{{$contact->sale_detail_id}}</td>
                    <td>{{$contact->title}}</td>
                    <td>{{$contact->detail}}</td>
                </tr>
            @endforeach
        </table>
    </div><br><br>
    <div class="text-center border divide-x">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　　仕入れ登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="sale_list">　　売上一覧</a>
    </div><br>
    <div class="text-center border divide-x mb-4">
        <a href="/index">トップページ</a>
        <a href="/admin">　　管理者トップ</a>
    </div><br>
</body>
</html>
