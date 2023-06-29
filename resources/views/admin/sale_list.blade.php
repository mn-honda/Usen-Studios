<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>売上一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium"><br>
    <div class="text-right">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　仕入れ登録</a>
        <a href="purchase_list">　仕入れ一覧</a>
        <a href="stock_list">　在庫一覧</a>
        <a href="contact_list">　お問い合わせ一覧　</a>
    </div>
    <div><br><h1 class="text-3xl flex justify-center">売上一覧</h1><br></div>
    <div class="flex justify-center">
        <table>
            <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                <th class="px-10 py-5">ID</th>
                <th class="px-10 py-5">メンバーID</th>
                <th class="px-10 py-5">購入日時</th>
                <th class="px-10 py-5">商品ID</th>
                <th class="px-10 py-5">個数</th>
                <th class="px-10 py-5">サイズ</th>
                <th class="px-10 py-5">金額</th>
                <th class="px-10 py-5">配送状況</th>
                <th class="px-10 py-5">配送切り替え</th>
            </tr>
            @php $total = 0;
                $charges = 0;
            @endphp
            @foreach($saledetails as $saledetail)
                <tr class="bg-gray-100 text-center border border-gray-600">
                    <td>{{$saledetail->sale->id}}</td>
                    <td>{{$saledetail->sale->user_id}}</td>
                    <td>{{$saledetail->sale->date->format('Y/m/d')}}</td>
                    <td>{{$saledetail->product_id}}</td>
                    <td>{{$saledetail->quantity}}</td>
                    <td>
                        @if($saledetail->size_id==1)XS
                        @elseif($saledetail->size_id==2)S
                        @elseif($saledetail->size_id==3)M
                        @elseif($saledetail->size_id==4)L
                        @elseif($saledetail->size_id==5)XL
                        @endif
                    </td>
                    <td>{{$saledetail->amount}}</td>
                    <td>
                        @if($saledetail->sale->delivery->is_delivered == 0)
                            配送前
                        @elseif($saledetail->sale->delivery->is_delivered == 1)
                            配送済み
                        @else
                            到着済み
                        @endif
                    </td>
                    <td>
                        <form name="button" action="" method="post" id="btn">
                            <input type="hidden" name="id" value="{{$saledetail->sale->id}}">
                            @if($saledetail->sale->delivery->is_delivered == 0)
                                <input type="submit" name="deliveried" value="配達済み" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
                            @elseif($saledetail->sale->delivery->is_delivered == 1)
                                <input type="submit" name="arrived" value="到着済み" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
                            @else
                            @endif
                            @csrf
                        </form>
                    </td>
                </tr>
                @php $total = $total + $saledetail->amount @endphp
            @endforeach
        </table>
    </div><br><br>
    @foreach($sales as $sale)
        @php $charges += 800 @endphp
    @endforeach
    <p class="flex justify-center text-xl">合計売上金額:{{$total}}円</p><br>
    <p class="flex justify-center text-xl">（送料込み）合計金額:{{$total+$charges}}円</p><br>
    <div class="text-center border divide-x">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　　仕入れ登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="stock_list">　　在庫一覧</a>
        <a href="contact_list">　　お問い合わせ一覧</a>
    </div><br>
</body>
</html>
