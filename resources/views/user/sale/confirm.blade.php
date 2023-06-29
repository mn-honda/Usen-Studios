<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>購入確認</title>
    <link rel="stylesheet" href="/css/confirm.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}
    <x-header-component></x-header-component>
    
    <div class="viewAll">
        <h2>ご注文情報</h2>

        <p class="order">ご注文概要</p>
            <div>
                @if ( isset($user->cart->cart_details) )
                    @foreach ($user->cart->cart_details as $cart_detail)
                    <div class="overView">
                        <div class="product_image">
                            @foreach( $cart_detail->product->image as $image )
                                <img class="img" src='{{asset($image->filepath)}}' alt="$image->explanation">
                            @endforeach
                        </div>
                        <div class="product_detail">
                            <div class="productName">
                                <p class="product"> 商品名: {{$cart_detail->product->name}} </p>
                                <!-- <p> {{$cart_detail->product->name}} </p> -->
                            </div>
                            <div>
                                {{-- <p> カラー: {{}} </p> --}}
                                <p> サイズ: {{$cart_detail->size->size}} </p>
                                <p> 数量: {{$cart_detail->quantity}} </p>
                            </div>
                            <div>
                                <p> ￥{{$cart_detail->amount}} </p>
                            </div>
                        </div>

                    </div>
                    @endforeach
                @endif
            </div>
            
            <div class='amount'>
                <div class="Sub">
                    <div class="subtotal">小計</div>
                        @if ( isset($user->cart->amount) )
                            <div>￥{{$user->cart->amount}}</div>
                        @else
                            <div>0</div>
                        @endif
                </div>
                <div class="Post">
                    <div class="postage">送料</div>
                    <div class="posNum">￥800</div>
                </div>
                <div class="Sum">
                    <div class="sum">合計</div>
                    @if ( isset($user->cart->amount) )
                        <div class="sumNum">￥{{$user->cart->amount + 800}}</span>
                    @else
                        <div>￥800</div>
                    @endif
                </div>
            </div>

            <div>
                <div>
                    <h2>配送先情報</h2>
                    <div class="deliveryContainer">
                        <h4>郵便番号</h4>
                        @if( isset($user->post_code) )
                            <input class="postcode" type='text' name='post_code' value='{{$user->post_code}}' readonly>
                        @else
                            <input class="postcode" type='text' name='post_code'>
                        @endif
                    </div>
                    <div class="deliveryContainer">
                        <h4>住所</h4>
                        @if( isset($user->address) )
                            <input class="address" type='text' name='address' value='{{$user->address}}' readonly>
                        @else
                            <input class="address" type='text' name='address'>
                        @endif
                    </div>
                </div>

                <div>
                    <h2>お支払情報</h2>
                    <div>
                        <h4>クレジットカード</h4>
                        <div class="deliveryContainer">
                            <h4>カード番号</h4>
                            @if( isset($card["number"]) )
                                <input class="card" type='text' name='card_number' value='{{$card["number"]}}' readonly>
                            @else
                                <input class="card" type='text' name='card_number'>
                            @endif
                        </div>
                        <div class="deliveryContainer">
                            <h4>カード名義</h4>
                            @if( isset($card["name"]) )
                                <input class="cardName" type='text' name='card_name' value='{{$card["name"]}}' readonly>
                            @else
                                <input class="cardName" type='text' name='card_name'>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        <form action="/sale/procedure" method="post">
            @csrf
            <button type="submit">購入確定</button>
        </form>
    </div>
    {{-- フッターのインポート --}}
    @include("/header_footer.footer")
</body>
</html>
