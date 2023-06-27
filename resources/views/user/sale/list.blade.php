<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー画面</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">購入日時</th>
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">個数</th>
                <th class="px-10 py-5">サイズ</th>
                <th class="px-10 py-5">金額</th>
                <th class="px-10 py-5">配送状況</th>
            </tr>
            @foreach($user->sales as $sale)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$sale->date}}</td>
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
                        @if($sale->sale->delivery->is_delivered == 0)
                            配送前
                        @elseif($sale->sale->delivery->is_delivered == 1)
                            配送済み
                        @else
                            到着済み
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
