<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仕入れ一覧</title>
</head>
<body>
    <h1>仕入れ一覧</h1>
    <table border=1>
        <tr>
            <th>商品ID</th>
            <th>商品名</th>
            <th>個数</th>
            <th>日付</th>
        </tr>
        @foreach($purchases as $purchase)
            <tr>
                <td>{{$purchase->product_id}}</td>
                <td>{{$purchase->product->name}}</td>
                <td>{{$purchase->quantity}}</td>
                <td>{{$purchase->date->format('Y/m/d')}}</td>
            </tr>
        @endforeach
    </table>
    <a href="purchase_register">仕入れ登録画面</a>
    <a href="stock_list">在庫一覧</a>
</body>
</html>
