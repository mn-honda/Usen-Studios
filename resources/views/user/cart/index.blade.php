<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>カート</title>
    <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
    {{-- ヘッダーのインポート --}}

    {{-- < ショップに戻る --}}
    <a href='/'>
        <input type="image" src= '/icon/keyboard_arrow_left.png'>
        <span class='back_to_shop'> ショップに戻る </span>
    </a>

    @if ( isset($cart->cart_details) )
        @foreach ($cart->cart_details as $cart_detail)
            <div>
                <div>
                    <p class='product_in_cart'>カートに入っている商品</p>
                    <div class='close'>
                        <form action='/cart/delete/{{$cart_detail->id}}' method='post'>
                            @csrf
                            <input type="image" src= '/icon/close.png'>
                        </form>
                    </div>
                </div>
                <div>
                    <div class='product_image'>
                        @foreach( $cart_detail->product->image as $image )
                            <img src='{{asset($image->filepath)}}' alt={{$image->explanation}} class='inner_product_image'>
                        @endforeach
                    </div>
                    <div class='product_detail'>
                        <div>
                            <p> 商品名 </p>
                            <p> {{$cart_detail->product->name}} </p>
                        </div>
                        <div>
                            {{-- <p> カラー: {{}} </p> --}}
                            <p> サイズ: {{$cart_detail->size->size}} </p>
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        ￥{{$cart_detail->amount}}
                        {{-- プルダウン --}}
                        <form action='/cart/update' method='post' class='num_of_pulldown'>
                            <select name='cart_detail_quantity' onchange="submit(this.form)">
                                @for ($i = 1; $i <= 10; $i++)
                                    @if ($i == $cart_detail->quantity)
                                        <option value='{{$i}}' selected>{{$i}}</option>
                                    @else
                                        <option value='{{$i}}'>{{$i}}</option>
                                    @endif
                                    {{$cart_detail->quantity}}
                                @endfor
                                <input type="hidden" name='cart_detail_id' value='{{$cart_detail->id}}'>
                                @csrf
                            </select>
                        </form>
                    </p>
                </div>
            </div>
        @endforeach
    @endif
    

    <div class='amount'>
        <p>
            <span>小計</span>
                @if ( isset($cart->amount) )
                    <span>{{$cart->amount}}</span>
                @else
                    <span>0</span>
                @endif
            <br>
            <span>送料</span>
            <span>￥800</span>
        </p>
        <p>
            <span>合計</span>
            @if ( isset($cart->amount) )
                <span>￥{{$cart->amount + 800}}</span>
            @else
                <span>￥800</span>
            @endif
        </p>
    </div>


    <div class='href_button_rectangle'>
        <button onclick="location.href='/sale/confirm'">
            <span class='href_button_text'>購入画面へ</span>
        </button>
    <div>

    {{-- フッターのインポート --}}
</body>
</html>
