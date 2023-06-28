<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お支払方法登録</title>
    <link rel="stylesheet" href="/css/registration_cregit.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <x-header-component></x-header-component>
    
    <div class="viewAll">
        <h1>ご注文情報</h1>
        <h2>お支払方法</h2>

        <div>
            <form action="" method="post">
                <div class="cashElement">
                    <div class="cashContainer">
                        <h2>クレジットカード</h2>
                        <div>
                            <h3>カード番号</h3>
                            @if( old('card_number_1') != '' || old('card_number_2') != '' || old('card_number_3') != '' || old('card_number_4') != '' )
                                <input type='text' name='card_number_1' value='{{old('card_name_1')}}'> -
                                <input type='text' name='card_number_2' value='{{old('card_name_2')}}'> -
                                <input type='text' name='card_number_3' value='{{old('card_name_3')}}'> -
                                <input type='text' name='card_number_4' value='{{old('card_name_4')}}'>
                            @elseif( isset($user->credit) && isset($user->credit->card_number) )
                                <input type='text' name='card_number_1' value='{{substr($user->credit->card_number, 0, 4)}}'> -
                                <input type='text' name='card_number_2' value='{{substr($user->credit->card_number, 4, 8)}}'> -
                                <input type='text' name='card_number_3' value='{{substr($user->credit->card_number, 8, 12)}}'> -
                                <input type='text' name='card_number_4' value='{{substr($user->credit->card_number, 12, 16)}}'>
                            @else
                                <input type='text' name='card_number_1'> -
                                <input type='text' name='card_number_2'> -
                                <input type='text' name='card_number_3'> -
                                <input type='text' name='card_number_4'>
                            @endif
                        </div>
                        <div>
                            <div> <h3>有効期限</h3> </div>
                                @if( old('expiration') != '' )
                                    <input type='month' name='expiration' value='{{old('expiration')}}'>
                                @elseif( isset($user->credit) && isset($user->credit->expiration) )
                                    <input type='month' name='expiration' value='{{$user->credit->expiration}}'>
                                @else
                                    <input type='month' name='expiration'>
                                @endif
                            <div> <h3>セキュリティコード</h3> </div>
                            @if( old('security_code') != '' )
                                <input type='text' name='security_code' value='{{old('security_code')}}'>
                            @elseif( isset($user->credit) && isset($user->credit->security_code) )
                                <input type='text' name='security_code' value='{{$user->credit->security_code}}'>
                            @else
                                <input type='text' name='security_code'>
                            @endif
                        </div>
                        <div>
                            <h3>カード名義</h3>
                            @if( old('card_name') != '' )
                                <input type='text' name='card_name' value='{{old('card_name')}}'>
                            @elseif( isset($user->credit) && isset($user->credit->name) )
                                <input type='text' name='card_name' value='{{$user->credit->name}}'>
                            @else
                                <input type='text' name='card_name'>
                            @endif
                        </div>
                    </div>
                    <div class="orderContainer">
                        <div>
                            <div>
                                ご注文概要
                                @if ( isset($user->cart->cart_details) )
                                    @foreach ($user->cart->cart_details as $cart_detail)
                                        <div>
                                            @foreach( $cart_detail->product->image as $image )
                                                <img src='{{asset($image->filepath)}}' alt="$image->explanation" class="inner_product_image">
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
                </div>
                @csrf
                {{-- <button onclick="location.href='/sale/confirm'">購入確認画面へ</button> --}}
                <button type="submit">購入確認画面へ</button>
            </form>
        </div>
    </div>

    {{-- フッターのインポート --}}
    @include("/header_footer.footer")
</body>
</html>
