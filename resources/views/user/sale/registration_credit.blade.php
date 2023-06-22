<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入確認</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    <h1>CONTACT</h1>
    <h2>お支払方法</h2>
    <div>
        <div>
            <h2>クレジットカード</h2>
            <div>
                <h3>カード番号</h3>
                @if( isset($user->credit) && isset($user->credit->card_number) )
                    <input type='text' name='card_number' value='{{$user->credit->card_number}}'>
                @else
                    <input type='text' name='card_numberh'>
                @endif
            </div>
            <div>
                <div> <h3>有効期限</h3> </div>
                @if( isset($user->credit) && isset($user->credit->expiration) )
                    <input type='text' name='expiration' value='{{$user->credit->expiration}}'>
                @else
                    <input type='text' name='expiration'>
                @endif
                <div> <h3>セキュリティコード</h3> </div>
                @if( isset($user->credit) && isset($user->credit->security_code) )
                    <input type='text' name='security_code' value='{{$user->credit->security_code}}'>
                @else
                    <input type='text' name='security_code'>
                @endif
            </div>
            <div>
                <h3>カード名</h3>
                @if( isset($user->credit) && isset($user->credit->card_name) )
                        <input type='text' name='card_name' value='{{$user->credit->card_name}}'>
                @else
                    <input type='text' name='card_name'>
                @endif
            </div>
        </div>
        <div>
            <div>
                ご注文概要
                @if ( isset($user->cart->cart_details) )
                    @foreach ($user->cart->cart_details as $cart_detail)
                        <div>
                            @if( isset($cart_detail->product->image->filepath) )
                                <img src='{{asset($cart_detail->product->image->filepath)}}'>
                            @else
                                <div> 画像 </div>
                            @endif
                        </div>
                        <div>
                            <p> 商品名 </p>
                            <p> {{$cart_detail->product->name}} </p>
                        </div>
                        <div>
                            {{-- <p> カラー: {{}} </p> --}}
                            <p> サイズ: {{$cart_detail->size->size}} </p>
                            <p> 数量: {{$cart_detail->quantity}} </p>
                        </div>
                        <div>
                            <p> ￥{{$cart_detail->amount}} </p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div>
            <p>
                <span>小計</span>
                    @if ( isset($user->cart->amount) )
                        <span>{{$user->cart->amount}}</span>
                    @else
                        <span>0</span>
                    @endif
                <br>
                <span>送料</span>
                <span>￥800</span>
            </p>
            <p>
                <span>合計</span>
                @if ( isset($user->cart->amount) )
                    <span>￥{{$user->cart->amount + 800}}</span>
                @else
                    <span>￥800</span>
                @endif
            </p>
        </div>
    </div>

    <button onclick="location.href='/sale/confirm'">購入確認画面へ</button>


    {{-- フッターのインポート --}}
</body>
</html>
