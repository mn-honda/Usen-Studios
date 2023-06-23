<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>仕入れ一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">仕入れ一覧</h1><br></div>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">商品名</th>
                <th class="px-10 py-5">個数</th>
                <th class="px-10 py-5">日付</th>
            </tr>
            @foreach($purchases as $purchase)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$purchase->product_id}}</td>
                    <td>{{$purchase->product->name}}</td>
                    <td>{{$purchase->quantity}}</td>
                    <td>{{$purchase->date->format('Y/m/d')}}</td>
                </tr>
            @endforeach
        </table>
    </div><br><br>
    <a href="purchase_register" class="flex justify-center">▶仕入れ登録画面</a><br>
    <a href="stock_list" class="flex justify-center">▶在庫一覧</a>

</body>
</html>
