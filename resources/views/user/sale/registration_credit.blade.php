<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お支払方法登録</title>
</head>
<body>
    {{-- ヘッダーのインポート --}}

    <h1>CONTACT</h1>
    <h2>お支払方法</h2>

    <div>
        <form action="" method="post">
            <div>
                <div>
                    <h2>クレジットカード</h2>
                    <div>
                        <h3>カード番号</h3>
                        @if( old('card_number') != '' )
                            <input type='number' name='card_number' value='{{old('card_name')}}'>
                        @elseif( isset($user->credit) && isset($user->credit->card_number) )
                            <input type='number' name='card_number' value='{{$user->credit->card_number}}'>
                        @else
                            <input type='number' name='card_number'>
                        @endif
                    </div>
                    <div>
                        <div> <h3>有効期限</h3> </div>
                            @if( old('expiration_yy') != '' && old('expiration_mm') != '' )
                                <input type='number' name='expiration_yy' value='{{old('expiration_yy'))}}'>
                                <input type='number' name='expiration_mm' value='{{old('expiration_mm'))}}'>
                            @if( isset($user->credit) && isset($user->credit->expiration) )
                                <input type='number' name='expiration_yy' value='{{date("yy", $user->credit->expiration)}}'>
                                <input type='number' name='expiration_mm' value='{{date("mm", $user->credit->expiration)}}'>
                            @else
                                <input type='number' name='expiration_yy'>
                                <input type='number' name='expiration_mm'>
                            @endif
                        <div> <h3>セキュリティコード</h3> </div>
                        @if( old('security_code') != '' )
                            <input type='number' name='security_code' value='{{old('security_code')}}'>
                        @elseif( isset($user->credit) && isset($user->credit->security_code) )
                            <input type='number' name='security_code' value='{{$user->credit->security_code}}'>
                        @else
                            <input type='number' name='security_code'>
                        @endif
                    </div>
                    <div>
                        <h3>カード名義</h3>
                        @if( old('card_name') != '' )
                            <input type='text' name='card_name' value='{{old('card_name')}}'>
                        @if( isset($user->credit) && isset($user->credit->name) )
                            <input type='text' name='card_name' value='{{$user->credit->name}}'>
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
            @csrf
            {{-- <button onclick="location.href='/sale/confirm'">購入確認画面へ</button> --}}
            <button type="submit">購入確認画面へ</button>
        </form>
    </div>


    {{-- フッターのインポート --}}
</body>
</html>
