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
                <th class="px-10 py-5">プロダクトID</th>
                <th class="px-10 py-5">プロダクト名</th>
                <th class="px-10 py-5">写真</th>
                <th class="px-10 py-5">個数</th>
            </tr>
            @foreach($stocks as $stock)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$stock->product_id}}</td>
                    <td>{{$stock->product->name}}</td>
                    <td>@foreach($stock->product->image as $image)
                        <img src="{{$image->filepath}}" alt="" width=150 heght=300>
                    @endforeach</td>
                    <td>{{$stock->stock}}</td>
                </tr>
            @endforeach
        </table>
    </div><br><br>

    <a href="purchase_list" class="flex justify-center">▶仕入れ一覧</a><br>
    <a href="sale_list" class="flex justify-center">▶売上一覧</a><br>
</body>
</html>
