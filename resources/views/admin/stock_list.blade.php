<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧</title>
</head>
<body>
    <h1>在庫一覧</h1>
    <table border=1>
        <tr>
            <th>プロダクトID</th>
            <th>プロダクト名</th>
            <th>個数</th>
        </tr>
        @foreach($stocks as $stock)
            <tr>
                <td>{{$stock->product_id}}</td>
                <td>{{$stock->product->name}}</td>
                <td>{{$stock->stock}}</td>
            </tr>
        @endforeach
    </table>
    <a href="purchase_list">仕入れ一覧</a>
</body>
</html>
