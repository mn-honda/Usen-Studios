<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-medium"><br>
    <div class="text-right">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　仕入れ登録</a>
        <a href="purchase_list">　仕入れ一覧</a>
        <a href="sale_list">　売上一覧</a>
        <a href="contact_list">　お問い合わせ一覧　</a>
    </div>
    <div><br><h1 class="text-3xl flex justify-center">在庫一覧</h1><br></div>
        <table class="flex justify-center">
            @php $num = 0; @endphp
            @foreach($stocks as $stock)
                @if($num%5==0)
                    <tr class="bg-gray-100 border border-gray-600">
                @endif
                    <td class="border border-gray-600 text-center"><br>{{$stock->product_id}}
                    {{$stock->product->name}}
                    @foreach($stock->product->image as $image)
                    <div class="flex justify-center">
                        <img src="{{$image->filepath}}" alt="" width=150 heght=300>
                    </div>
                    @endforeach
                    <div class="text-xl">{{$stock->stock}}個</div><br></td>
                @if($num%5==4)
                    </tr>
                @endif
                @php $num += 1; @endphp
            @endforeach
        </table>
    </div><br><br>

    <div class="text-center border divide-x">
        <a href="product_register">商品登録</a>
        <a href="purchase_register">　　仕入れ登録</a>
        <a href="purchase_list">　　仕入れ一覧</a>
        <a href="sale_list">　　売上一覧</a>
        <a href="contact_list">　　お問い合わせ一覧</a>
    </div><br>
    <div class="text-center border divide-x">
        <a href="/index">トップページへ</a>
        <a href="/admin">　　管理者トップへ</a>
    </div><br>
</body>
</html>

