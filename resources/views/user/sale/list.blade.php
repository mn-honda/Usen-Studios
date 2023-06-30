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
        <p style="text-align: center; font-size:20px">ユーザー情報</p>
        <div style="text-align: center">
            <table border=1 style="margin-left: auto; margin-right: auto">
                <tr style="background-color: rgb(219, 216, 216); padding: 20px"><th>お名前</th><td style="background-color: rgb(241, 238, 238); padding: 20px">{{$user->name}}</td></tr>
                <tr style="background-color: rgb(219, 216, 216); padding: 20px"><th>Eメールアドレス</th><td style="background-color: rgb(241, 238, 238); padding: 20px">{{$user->email}}</td></tr>
                <tr style="background-color: rgb(219, 216, 216); padding: 20px"><th>住所</th><td style="background-color: rgb(241, 238, 238); padding: 20px">〒{{$user->post_code}}<br>{{$user->address}}</td></tr>
            </table>
        </div><br>
        <div style="text-align: center">
            <form action="/user/edit_user" method="get">
                <input type="submit" value="編集" style="border: 2px solid gray; ">
            </form>
        </div>
        <br>
        @if($user->sale_details->first() != null)
        <p style="text-align: center; font-size:20px">購入履歴</p>
        <div style="text-align: center">
            <table border=1 style="margin-left: auto; margin-right: auto">
                <tr style="background-color: rgb(219, 216, 216)">
                    <th style="padding: 20px">購入日時</th>
                    <th style="padding: 20px">商品名</th>
                    <th style="padding: 20px">個数</th>
                    <th style="padding: 20px">サイズ</th>
                    <th style="padding: 20px">金額</th>
                    <th style="padding: 20px">配送状況</th>
                    <th style="padding: 20px">領収書</th>
                    <th style="padding: 20px">再度購入</th>
                </tr>
                @foreach($user->sale_details as $sale_detail)
                    <tr style="background-color: rgb(241, 238, 238)">
                        <td style="padding: 20px">{{$sale_detail->sale->date->format('Y/m/d')}}</td>
                            <td style="padding: 20px">{{$sale_detail->product->name}}</td>
                            <td style="padding: 20px">{{$sale_detail->quantity}}</td>
                            <td style="padding: 20px">{{$sale_detail->size->size}}</td>
                            <td style="padding: 20px">{{$sale_detail->amount}}円</td>
                        <td style="padding: 20px">
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
                        <td style="padding: 0px">
                            <form action="/sale/receipt/{{$sale_detail->sale_id}}" method="post">
                                @csrf
                                <button type="submit">
                                <img style="height: 20px; width: 20px" src="/icon/レシートの無料イラスト.png">
                                </button>
                            </form>
                        </td>
                        <td style="padding: 0px">
                            <form action="/cart/add" method="post">
                                @csrf
                                <input type="hidden" value="{{$sale_detail->product->id}}" name="product_id">
                                <input type="hidden" value="{{$sale_detail->size_id}}" name="size">
                                <input type="hidden" value="{{$sale_detail->quantity}}" name="quantity">
                                <button type="submit">
                                <img style="height: 20px; width: 20px" src="/icon/unnamed.png">
                                </button>
                                {{-- <input class="button" type="submit" value="もう一度買う"> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        @endif
        <br><br>
        @if($user->inquiries->first() != null)
            <p style="text-align: center; font-size:20px">お問い合わせ履歴</p>
            <div style="text-align: center">
                <table border=1 style="margin-left: auto; margin-right: auto">
                    <tr style="background-color: rgb(219, 216, 216)">
                        <th style="padding: 20px">送信日時</th>
                        <th style="padding: 20px">タイトル</th>
                        <th style="padding: 20px">詳細</th>
                    </tr>
                    @foreach($user->inquiries as $inquiry)
                        <tr style="background-color: rgb(241, 238, 238)">
                            <td style="padding: 20px">{{$inquiry->date->format('Y/m/d')}}</td>
                            <td style="padding: 20px">{{$inquiry->title}}</td>
                            <td style="padding: 20px">{{$inquiry->detail}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
        <br><br>
    @include("/header_footer.footer")
</body>

</html>
