<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入確認</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    <h1>CONTACT</h1>

        <div>
            ご注文概要
            @if ( isset($user->cart->cart_details) )
                @foreach ($user->cart->cart_details as $cart_detail)
                    <div>
                        @foreach( $cart_detail->product->image as $image )
                            <img src='{{asset($image->filepath)}}' alt="$image->explanation">
                        @endforeach
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

        <div>
            <div>
                <h2>配送先情報</h2>
                <div>
                    <h3>郵便番号</h3>
                    @if( isset($user->post_code) )
                        <input type='text' name='post_code' value='{{$user->post_code}}' readonly>
                    @else
                        <input type='text' name='post_code'>
                    @endif
                </div>
                <div>
                    <h3>郵便番号</h3>
                    @if( isset($user->address) )
                        <input type='text' name='address' value='{{$user->address}}' readonly>
                    @else
                        <input type='text' name='address'>
                    @endif
                </div>
            </div>

            <div>
                <h2>お支払方法</h2>
                <div>
                    <h2>クレジットカード</h2>
                    <div>
                        <h3>カード番号</h3>
                        @if( isset($user->credit) && isset($user->credit->card_number) )
                            <input type='text' name='card_number' value='{{$user->credit->card_number}}' readonly>
                        @else
                            <input type='text' name='card_numberh'>
                        @endif
                        {{-- <input type='text' name='card_number' value='{{$user->credit->card_number}}' readonly> --}}
                    </div>
                    <div>
                        <h3>カード名</h3>
                        @if( isset($user->credit) && isset($user->credit->card_name) )
                            <input type='text' name='card_name' value='{{$user->credit->card_name}}' readonly>
                        @else
                            <input type='text' name='card_name'>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    <form action="/sale/procedure" method="post">
        @csrf
        <button type="submit">購入画面へ</button>
    </form>


    {{-- フッターのインポート --}}
</body>
</html>
