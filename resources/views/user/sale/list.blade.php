<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー画面</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
        <div class="text-center text-9xl font-medium">UsenStudios</div><br><br>
        <p class="text-center text-3xl">ユーザー情報</p><br><br>
        <div class="flex justify-center">
            <table>
                <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">お名前</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5">{{$user->name}}</td></tr>
                <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">Eメールアドレス</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5">{{$user->email}}</td></tr>
                <tr><th class="bg-gray-300 border-b text-xl border border-gray-600 px-10 py-5">住所</th><td class="bg-gray-100 text-center border border-gray-600 px-10 py-5">{{$user->post_code}}{{$user->address}}</td></tr>
            </table>
        </div>
        <div class="flex justify-center">
            <form action="/user/edit_user" method="get">
                <input type="submit" value="編集" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
            </form>
        </div>
        <br><br><br>
        <p class="text-center text-3xl">購入履歴</p><br><br>
        <div class="flex justify-center">
            <table>
                <tr class="bg-gray-300 border-b text-xl border border-gray-600">
                    <th class="px-10 py-5">購入日時</th>
                    <th class="px-10 py-5">商品名</th>
                    <th class="px-10 py-5">個数</th>
                    <th class="px-10 py-5">サイズ</th>
                    <th class="px-10 py-5">金額</th>
                    <th class="px-10 py-5">配送状況</th>
                </tr>
                @foreach($user->sale_details as $sale_detail)
                    <tr class="bg-gray-100 text-center border border-gray-600">
                        <td>{{$sale_detail->sale->date->format('Y/m/d')}}</td>
                            <td>{{$sale_detail->product->name}}</td>
                            <td>{{$sale_detail->quantity}}</td>
                            <td>
                                @if($sale_detail->size_id==1)XS
                                @elseif($sale_detail->size_id==2)S
                                @elseif($sale_detail->size_id==3)M
                                @elseif($sale_detail->size_id==4)L
                                @elseif($sale_detail->size_id==5)XL
                                @endif
                            </td>
                            <td>{{$sale_detail->amount}}</td>
                        <td>
                            @if($sale_detail->sale->delivery->is_delivered==0)
                                準備中
                            @elseif($sale_detail->sale->delivery->is_delivered==1)
                                配達中
                            @else
                                到着済み
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div><br><br>
        <a href="/index" class="flex justify-center">戻る</a>
</body>
@include("/header_footer.footer")
</html>
