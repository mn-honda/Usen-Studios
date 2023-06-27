<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売上履歴</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium">
    <div><br><h1 class="text-3xl flex justify-center">売上履歴</h1><br></div>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">ID</th>
                <th class="px-10 py-5">メンバーID</th>
                <th class="px-10 py-5">購入日時</th>
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">個数</th>
                <th class="px-10 py-5">サイズ</th>
                <th class="px-10 py-5">合計金額</th>
                <th class="px-10 py-5">配送有無</th>
                <th class="px-10 py-5">配送切り替え</th>
            </tr>
            @foreach($sales as $sale)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$sale->sale->id}}</td>
                    <td>{{$sale->sale->user_id}}</td>
                    <td>{{$sale->sale->date->format('Y/m/d')}}</td>
                    <td>{{$sale->product_id}}</td>
                    <td>{{$sale->quantity}}</td>
                    <td>
                        @if($sale->size_id==1)XS
                        @elseif($sale->size_id==2)S
                        @elseif($sale->size_id==3)M
                        @elseif($sale->size_id==4)L
                        @elseif($sale->size_id==5)XL
                        @endif
                    </td>
                    <td>{{$sale->amount}}</td>
                    <td>
                        @if($sale->sale->delivery->is_delivered== 1)
                            配送済み
                        @else
                            配送前
                        @endif
                    </td>
                    <td>
                        <form action="" method="post">
                        <input type="hidden" name="id" value="{{$sale->sale->id}}">
                        <input type="submit" value="配送済み" class="ml-2 rounded-lg bg-green-500 p-2 text-white hover:bg-green-600">
                        @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div><br><br>
    <a href="purchase_list" class="flex justify-center">▶仕入れ一覧</a><br>
    <a href="stock_list" class="flex justify-center">▶在庫一覧</a>

</body>
</html>
