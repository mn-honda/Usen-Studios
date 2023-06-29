<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー画面</title>
</head>
<body>
    <x-header-component></x-header-component><br>
        <h1 style="text-align: center; font-size: 96px">UsenStudios</h1>
        <p style="text-align: center">ユーザー情報</p>
        <div style="text-align: center">
            <table border=1 style="margin-left: auto; margin-right: auto">
                <tr style="background-color: rgb(219, 216, 216)"><th>お名前</th><td style="background-color: rgb(241, 238, 238)">{{$user->name}}</td></tr>
                <tr style="background-color: rgb(219, 216, 216)"><th>Eメールアドレス</th><td style="background-color: rgb(241, 238, 238)">{{$user->email}}</td></tr>
                <tr style="background-color: rgb(219, 216, 216)"><th>住所</th><td style="background-color: rgb(241, 238, 238)">〒{{$user->post_code}}<br>{{$user->address}}</td></tr>
            </table>
        </div><br>
        <div style="text-align: center">
            <form action="/user/edit_user" method="get">
                <input type="submit" value="編集" class="ml-2 rounded-lg bg-gray-500 p-2 text-white hover:bg-gray-800">
            </form>
        </div>
        <br><br><br>
        <p style="text-align: center">購入履歴</p>
        <div style="text-align: center">
            <table border=1 style="margin-left: auto; margin-right: auto">
                <tr style="background-color: rgb(219, 216, 216)">
                    <th>購入日時</th>
                    <th>商品名</th>
                    <th>個数</th>
                    <th>サイズ</th>
                    <th>金額</th>
                    <th>配送状況</th>
                    <th>もう一度買う</th>
                </tr>
                @foreach($user->sale_details as $sale_detail)
                    <tr style="background-color: rgb(241, 238, 238)">
                        <td>{{$sale_detail->sale->date->format('Y/m/d')}}</td>
                            <td>{{$sale_detail->product->name}}</td>
                            <td>{{$sale_detail->quantity}}</td>
                            <td>
                                {{$sale_detail->size->size}}
                                {{-- @if($sale_detail->size_id==1)XS --}}
                                {{-- @elseif($sale_detail->size_id==2)S --}}
                                {{-- @elseif($sale_detail->size_id==3)M --}}
                                {{-- @elseif($sale_detail->size_id==4)L --}}
                                {{-- @elseif($sale_detail->size_id==5)XL --}}
                                {{-- @endif --}}
                            </td>
                            <td>{{$sale_detail->amount}}</td>
                        <td>
                            @if($sale_detail->sale->delivery->is_delivered==0)
                                準備中
                            @elseif($sale_detail->sale->delivery->is_delivered==1)
                                配達中
                            @elseif($sale_detail->sale->delivery->is_delivered==2)
                                到着済み
                            @else
                                返品済み
                            @endif
                        </td>
                        <td>
                            <form action="/cart/add" method="post">
                                @csrf
                                <input type="hidden" value="{{$sale_detail->product->id}}" name="product_id">
                                <input type="hidden" value="{{$sale_detail->size_id}}" name="size">
                                <input type="hidden" value="{{$sale_detail->quantity}}" name="quantity">
                                <button type="submit">もう一度買う</button>
                                {{-- <input class="button" type="submit" value="もう一度買う"> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div><br><br>
    @include("/header_footer.footer")
</body>

</html>
