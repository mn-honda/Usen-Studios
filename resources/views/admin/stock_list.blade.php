<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">在庫一覧</h1><br></div>
        <table class="flex justify-center">
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">商品名</th>
                <th class="px-10 py-5">個数</th>
            </tr>
            @foreach($stocks as $stock)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td class="py-2">{{$stock->product_id}}</td>
                    <td class="py-2">{{$stock->product->name}}</td>
                    <td class="py-2">{{$stock->stock}}</td>
                </tr>
            @endforeach
        </table>
    </div><br><br>

    <a href="purchase_list" class="flex justify-center">▶仕入れ一覧</a>
</body>
</html>
